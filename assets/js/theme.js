/**
 * KeyboardTester.Click - Unified Theme Manager
 * Handles light/dark theme switching consistently across all pages
 * Version: 2.1
 */

(function() {
    'use strict';

    const STORAGE_KEY = 'kbt-theme';
    const DARK_CLASS = 'dark-theme';
    const DEBUG = true; // Enable debugging

    function log(...args) {
        if (DEBUG) console.log('[Theme]', ...args);
    }

    /**
     * Get the current theme from localStorage or system preference
     */
    function getStoredTheme() {
        const stored = localStorage.getItem(STORAGE_KEY);
        log('getStoredTheme:', stored || 'none (using system preference)');
        if (stored) return stored;

        // Check system preference
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            return 'dark';
        }
        return 'light';
    }

    /**
     * Apply theme to the document
     */
    function applyTheme(theme) {
        log('applyTheme called with:', theme);
        const isDark = theme === 'dark';

        // Apply to html element
        document.documentElement.classList.remove('dark-theme', 'light-theme');
        document.documentElement.classList.add(isDark ? 'dark-theme' : 'light-theme');
        document.documentElement.setAttribute('data-theme', theme);

        // Apply to body if exists
        if (document.body) {
            document.body.classList.remove('dark-theme', 'light-theme');
            document.body.classList.add(isDark ? 'dark-theme' : 'light-theme');
            document.body.setAttribute('data-theme', theme);

            // Force style recalculation
            document.body.offsetHeight;
        }

        // Store preference
        localStorage.setItem(STORAGE_KEY, theme);
        log('Theme stored in localStorage:', theme);
        log('HTML classes:', document.documentElement.className);
        log('HTML data-theme:', document.documentElement.getAttribute('data-theme'));

        // Log computed background color to verify CSS is responding
        if (document.body) {
            const bgColor = getComputedStyle(document.body).backgroundColor;
            const textColor = getComputedStyle(document.body).color;
            log('Body background color:', bgColor);
            log('Body text color:', textColor);
        }

        // Update theme toggle button icon
        const buttons = document.querySelectorAll('.theme-toggle, #themeToggle, [data-theme-toggle]');
        buttons.forEach(btn => {
            btn.textContent = isDark ? '☀️' : '🌙';
            log('Updated button icon to:', btn.textContent);
        });

        // Dispatch event for other scripts
        window.dispatchEvent(new CustomEvent('themechange', { detail: { theme } }));
    }

    /**
     * Toggle between light and dark themes
     */
    function toggleTheme() {
        const currentTheme = document.documentElement.classList.contains(DARK_CLASS) ? 'dark' : 'light';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        log('toggleTheme: switching from', currentTheme, 'to', newTheme);
        applyTheme(newTheme);
        return newTheme;
    }

    /**
     * Initialize theme on page load
     */
    function init() {
        log('init() called, readyState:', document.readyState);

        // Apply stored/preferred theme immediately
        const theme = getStoredTheme();
        applyTheme(theme);

        // Setup toggle buttons
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
        log('setupToggleButtons() called');

        // Find all theme toggle buttons
        const selectors = [
            '.theme-toggle',
            '#theme-toggle',
            '#themeToggle',
            '[data-theme-toggle]',
            '.dark-mode-toggle',
            '#darkModeToggle'
        ];

        let buttonsFound = 0;
        selectors.forEach(selector => {
            const buttons = document.querySelectorAll(selector);
            buttons.forEach(button => {
                if (button.dataset.themeBound === 'true') {
                    log('Button already bound:', selector);
                    return;
                }
                buttonsFound++;
                log('Binding click handler to:', selector, button);

                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    log('Button clicked!');

                    // Visual feedback
                    button.style.transform = 'scale(0.9)';
                    setTimeout(() => { button.style.transform = ''; }, 100);

                    toggleTheme();
                });
                button.dataset.themeBound = 'true';
            });
        });

        log('Total buttons bound:', buttonsFound);

        if (buttonsFound === 0) {
            log('WARNING: No theme toggle buttons found!');
        }
    }

    // Initialize immediately
    init();

    // Expose API globally for manual control
    window.KBTTheme = {
        toggle: toggleTheme,
        set: applyTheme,
        get: () => document.documentElement.classList.contains(DARK_CLASS) ? 'dark' : 'light',
        debug: () => {
            log('Current state:');
            log('- localStorage:', localStorage.getItem(STORAGE_KEY));
            log('- HTML class:', document.documentElement.className);
            log('- data-theme:', document.documentElement.getAttribute('data-theme'));
            log('- Body bg:', document.body ? getComputedStyle(document.body).backgroundColor : 'no body');
        },
        STORAGE_KEY
    };

    log('Theme.js loaded successfully');

})();
