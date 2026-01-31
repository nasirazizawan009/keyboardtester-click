/**
 * KeyboardTester.Click - Unified Theme Manager
 * Handles light/dark theme switching consistently across all pages
 * Version: 2.0
 */

(function() {
    'use strict';

    const STORAGE_KEY = 'kbt-theme';
    const DARK_CLASS = 'dark-theme';
    const DARK_ATTR = 'dark';

    /**
     * Get the current theme from localStorage or system preference
     */
    function getStoredTheme() {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored) return stored;
        
        // Check system preference
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            return 'dark';
        }
        return 'light';
    }

    /**
     * Apply theme to the document (supports both old and new theme systems)
     */
    function applyTheme(theme) {
        const isDark = theme === 'dark';
        
        // New system: html class
        document.documentElement.classList.toggle(DARK_CLASS, isDark);
        
        // Legacy system: data-theme attribute (for backward compatibility)
        document.documentElement.setAttribute('data-theme', theme);
        if (document.body) {
            document.body.setAttribute('data-theme', theme);
        } else {
            document.addEventListener('DOMContentLoaded', () => {
                if (document.body) {
                    document.body.setAttribute('data-theme', theme);
                }
            }, { once: true });
        }
        
        // Store preference
        localStorage.setItem(STORAGE_KEY, theme);
        
        // Dispatch event for other scripts that might need to know
        window.dispatchEvent(new CustomEvent('themechange', { detail: { theme } }));
    }

    /**
     * Toggle between light and dark themes
     */
    function toggleTheme() {
        const currentTheme = document.documentElement.classList.contains(DARK_CLASS) ? 'dark' : 'light';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        applyTheme(newTheme);
        return newTheme;
    }

    /**
     * Initialize theme on page load
     */
    function init() {
        // Apply stored/preferred theme immediately
        const theme = getStoredTheme();
        applyTheme(theme);

        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', setupToggleButtons);
        } else {
            setupToggleButtons();
        }

        // Listen for system theme changes
        if (window.matchMedia) {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (!localStorage.getItem(STORAGE_KEY)) {
                    applyTheme(e.matches ? 'dark' : 'light');
                }
            });
        }
    }

    /**
     * Setup click handlers for theme toggle buttons
     */
    function setupToggleButtons() {
        // Support multiple selector patterns used across the site
        const selectors = [
            '.theme-toggle',
            '#theme-toggle',
            '[data-theme-toggle]',
            '.dark-mode-toggle',
            '#darkModeToggle'
        ];

        selectors.forEach(selector => {
            document.querySelectorAll(selector).forEach(button => {
                if (button.dataset.themeBound === 'true') {
                    return;
                }
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    toggleTheme();
                });
                button.dataset.themeBound = 'true';
            });
        });
    }

    // Initialize immediately
    init();

    // Expose API globally for manual control
    window.KBTTheme = {
        toggle: toggleTheme,
        set: applyTheme,
        get: () => document.documentElement.classList.contains(DARK_CLASS) ? 'dark' : 'light',
        STORAGE_KEY
    };

})();
