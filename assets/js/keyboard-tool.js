/**
 * KeyboardTester.Click - Keyboard Tester Tool Script
 * Shared functionality for all keyboard tester pages
 * Version: 2.0
 */

(function() {
    'use strict';

    // State
    const keyPressCount = {};
    
    // DOM Elements (will be set after DOM ready)
    let keyHistory = null;
    let capsLockLight = null;
    let scrollLockLight = null;
    let numLockLight = null;

    /**
     * Initialize the keyboard tester
     */
    function init() {
        // Get DOM elements
        keyHistory = document.getElementById('key-history');
        capsLockLight = document.getElementById('caps-lock-light');
        scrollLockLight = document.getElementById('scroll-lock-light');
        numLockLight = document.getElementById('num-lock-light');

        // Setup event listeners
        setupKeyboardListeners();
        setupResetButton();
        setupHelpButton();
    }

    /**
     * Setup keyboard event listeners
     */
    function setupKeyboardListeners() {
        document.addEventListener('keydown', handleKeyDown);
        document.addEventListener('keyup', handleKeyUp);
    }

    /**
     * Handle key down event
     */
    function handleKeyDown(event) {
        const key = event.code;
        const keyElement = document.querySelector(`[data-key="${key}"]`);

        if (keyElement) {
            event.preventDefault();
            
            // Update press count
            keyPressCount[key] = (keyPressCount[key] || 0) + 1;
            const activeLevel = ((keyPressCount[key] - 1) % 5) + 1;

            // Update key visual state
            keyElement.className = keyElement.className.replace(/active-\d/g, '').trim();
            keyElement.classList.add(`active-${activeLevel}`);

            // Update key count display
            updateKeyCount(keyElement, keyPressCount[key]);

            // Update key history
            if (keyHistory) {
                const displayKey = getDisplayKey(event);
                keyHistory.value += displayKey + ' ';
                keyHistory.scrollTop = keyHistory.scrollHeight;
            }

            // Update indicator lights for lock keys
            updateIndicatorLights(key, event);
        }
    }

    /**
     * Handle key up event (optional visual feedback)
     */
    function handleKeyUp(event) {
        // Optional: Add visual feedback for key release
        // Currently keys stay colored after press
    }

    /**
     * Get display text for a key
     */
    function getDisplayKey(event) {
        if (event.key === ' ') return '␣';
        if (event.key.length > 1) return `[${event.code}]`;
        return event.key;
    }

    /**
     * Update key press count display
     */
    function updateKeyCount(keyElement, count) {
        let keyCountElement = keyElement.querySelector('.key-count');
        if (!keyCountElement) {
            keyCountElement = document.createElement('span');
            keyCountElement.className = 'key-count';
            keyElement.appendChild(keyCountElement);
        }
        keyCountElement.textContent = count;
    }

    /**
     * Update indicator lights for Caps Lock, Num Lock, Scroll Lock
     */
    function updateIndicatorLights(key, event) {
        // Note: getModifierState gives the state BEFORE the keypress
        // So we toggle on keydown
        if (key === 'CapsLock' && capsLockLight) {
            capsLockLight.classList.toggle('active');
        }
        if (key === 'ScrollLock' && scrollLockLight) {
            scrollLockLight.classList.toggle('active');
        }
        if (key === 'NumLock' && numLockLight) {
            numLockLight.classList.toggle('active');
        }
    }

    /**
     * Setup reset button
     */
    function setupResetButton() {
        const resetButton = document.getElementById('reset-button');
        if (resetButton) {
            resetButton.addEventListener('click', resetKeyboard);
        }
    }

    /**
     * Reset keyboard to initial state
     */
    function resetKeyboard() {
        // Reset all keys
        const keys = document.querySelectorAll('.key');
        keys.forEach(key => {
            key.className = key.className.replace(/active-\d/g, '').trim();
            const keyCountElement = key.querySelector('.key-count');
            if (keyCountElement) {
                keyCountElement.remove();
            }
        });

        // Clear key history
        if (keyHistory) {
            keyHistory.value = '';
        }

        // Reset indicator lights
        if (capsLockLight) capsLockLight.classList.remove('active');
        if (scrollLockLight) scrollLockLight.classList.remove('active');
        if (numLockLight) numLockLight.classList.remove('active');

        // Clear press counts
        for (const key in keyPressCount) {
            delete keyPressCount[key];
        }
    }

    /**
     * Setup help button to scroll to guidelines
     */
    function setupHelpButton() {
        const helpButton = document.getElementById('help-button');
        const guidelinesSection = document.getElementById('guidelines') || 
                                   document.querySelector('.guidelines-section');
        
        if (helpButton && guidelinesSection) {
            helpButton.addEventListener('click', () => {
                guidelinesSection.scrollIntoView({ behavior: 'smooth' });
            });
        }
    }

    /**
     * Check initial state of lock keys
     */
    function checkInitialLockState() {
        // Try to detect initial state (not always possible)
        // This is a best-effort approach
        document.addEventListener('keydown', function checkLocks(e) {
            if (capsLockLight && e.getModifierState('CapsLock')) {
                capsLockLight.classList.add('active');
            }
            if (numLockLight && e.getModifierState('NumLock')) {
                numLockLight.classList.add('active');
            }
            if (scrollLockLight && e.getModifierState('ScrollLock')) {
                scrollLockLight.classList.add('active');
            }
            // Remove this listener after first key press
            document.removeEventListener('keydown', checkLocks);
        }, { once: true });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            init();
            checkInitialLockState();
        });
    } else {
        init();
        checkInitialLockState();
    }

    // Expose API globally for custom implementations
    window.KBTKeyboard = {
        reset: resetKeyboard,
        getKeyPressCount: (key) => keyPressCount[key] || 0,
        getAllPresses: () => ({ ...keyPressCount })
    };

})();
