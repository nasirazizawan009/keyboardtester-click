(function () {
    'use strict';

    const layouts = {
        arabic: {
            base: {
                Backquote: 'ذ', Digit1: '١', Digit2: '٢', Digit3: '٣', Digit4: '٤', Digit5: '٥',
                Digit6: '٦', Digit7: '٧', Digit8: '٨', Digit9: '٩', Digit0: '٠', Minus: '-', Equal: '=',
                KeyQ: 'ض', KeyW: 'ص', KeyE: 'ث', KeyR: 'ق', KeyT: 'ف', KeyY: 'غ', KeyU: 'ع',
                KeyI: 'ه', KeyO: 'خ', KeyP: 'ح', BracketLeft: 'ج', BracketRight: 'د',
                KeyA: 'ش', KeyS: 'س', KeyD: 'ي', KeyF: 'ب', KeyG: 'ل', KeyH: 'ا', KeyJ: 'ت',
                KeyK: 'ن', KeyL: 'م', Semicolon: 'ك', Quote: 'ط',
                KeyZ: 'ئ', KeyX: 'ء', KeyC: 'ؤ', KeyV: 'ر', KeyB: 'لا', KeyN: 'ى', KeyM: 'ة',
                Comma: 'و', Period: 'ز', Slash: 'ظ', Space: 'مسافة', Enter: 'إدخال', Backspace: 'حذف'
            },
            shift: {
                Backquote: 'ّ', Digit1: '!', Digit2: '@', Digit3: '#', Digit4: '$', Digit5: '%',
                Digit6: '^', Digit7: '&', Digit8: '*', Digit9: ')', Digit0: '(', Minus: '_', Equal: '+'
            }
        },
        french: {
            base: {
                Backquote: '²', Digit1: '&', Digit2: 'é', Digit3: '"', Digit4: "'", Digit5: '(',
                Digit6: '-', Digit7: 'è', Digit8: '_', Digit9: 'ç', Digit0: 'à', Minus: ')', Equal: '=',
                KeyQ: 'A', KeyW: 'Z', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Y', KeyU: 'U',
                KeyI: 'I', KeyO: 'O', KeyP: 'P', BracketLeft: '^', BracketRight: '$', Backslash: '*',
                KeyA: 'Q', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J',
                KeyK: 'K', KeyL: 'L', Semicolon: 'M', Quote: 'ù',
                KeyZ: 'W', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B', KeyN: 'N', KeyM: ',',
                Comma: ';', Period: ':', Slash: '!', Space: 'Espace', Enter: 'Entrée', Backspace: 'Retour'
            },
            shift: {
                Digit1: '1', Digit2: '2', Digit3: '3', Digit4: '4', Digit5: '5', Digit6: '6',
                Digit7: '7', Digit8: '8', Digit9: '9', Digit0: '0', Minus: '°', Equal: '+',
                BracketLeft: '¨', BracketRight: '£', Backslash: 'µ', Quote: '%', Comma: '?', Period: '.', Slash: '§'
            }
        },
        german: {
            base: {
                Backquote: '^', Digit1: '1', Digit2: '2', Digit3: '3', Digit4: '4', Digit5: '5',
                Digit6: '6', Digit7: '7', Digit8: '8', Digit9: '9', Digit0: '0', Minus: 'ß', Equal: "'",
                KeyQ: 'Q', KeyW: 'W', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Z', KeyU: 'U',
                KeyI: 'I', KeyO: 'O', KeyP: 'P', BracketLeft: 'Ü', BracketRight: '+', Backslash: '#',
                KeyA: 'A', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J',
                KeyK: 'K', KeyL: 'L', Semicolon: 'Ö', Quote: 'Ä',
                IntlBackslash: '<', KeyZ: 'Y', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B',
                KeyN: 'N', KeyM: 'M', Comma: ',', Period: '.', Slash: '-', Space: 'Leertaste',
                Enter: 'Eingabe', Backspace: 'Löschen'
            },
            shift: {
                Backquote: '°', Digit1: '!', Digit2: '"', Digit3: '§', Digit4: '$', Digit5: '%',
                Digit6: '&', Digit7: '/', Digit8: '(', Digit9: ')', Digit0: '=', Minus: '?',
                Equal: '`', BracketRight: '*', Backslash: "'", IntlBackslash: '>', Comma: ';', Period: ':', Slash: '_'
            }
        },
        japanese: {
            base: {
                Backquote: '半角/全角', Digit1: 'ぬ', Digit2: 'ふ', Digit3: 'あ', Digit4: 'う', Digit5: 'え',
                Digit6: 'お', Digit7: 'や', Digit8: 'ゆ', Digit9: 'よ', Digit0: 'わ', Minus: 'ほ', Equal: 'へ',
                IntlYen: '¥', KeyQ: 'た', KeyW: 'て', KeyE: 'い', KeyR: 'す', KeyT: 'か', KeyY: 'ん',
                KeyU: 'な', KeyI: 'に', KeyO: 'ら', KeyP: 'せ', BracketLeft: '゛', BracketRight: '゜',
                KeyA: 'ち', KeyS: 'と', KeyD: 'し', KeyF: 'は', KeyG: 'き', KeyH: 'く', KeyJ: 'ま',
                KeyK: 'の', KeyL: 'り', Semicolon: 'れ', Quote: 'け', Backslash: 'む',
                KeyZ: 'つ', KeyX: 'さ', KeyC: 'そ', KeyV: 'ひ', KeyB: 'こ', KeyN: 'み', KeyM: 'も',
                Comma: 'ね', Period: 'る', Slash: 'め', IntlRo: 'ろ', NonConvert: '無変換',
                Space: 'スペース', Convert: '変換', KanaMode: 'かな', Enter: 'Enter', Backspace: 'Backspace'
            },
            shift: {
                Digit1: '!', Digit2: '"', Digit3: '#', Digit4: '$', Digit5: '%', Digit6: '&',
                Digit7: "'", Digit8: '(', Digit9: ')', Minus: '=', Equal: '~', IntlYen: '|',
                Semicolon: '+', Quote: '*', Backslash: '}', Comma: '<', Period: '>', Slash: '?', IntlRo: '_'
            }
        },
        korean: {
            base: {
                KeyQ: 'ㅂ', KeyW: 'ㅈ', KeyE: 'ㄷ', KeyR: 'ㄱ', KeyT: 'ㅅ', KeyY: 'ㅛ', KeyU: 'ㅕ',
                KeyI: 'ㅑ', KeyO: 'ㅐ', KeyP: 'ㅔ', KeyA: 'ㅁ', KeyS: 'ㄴ', KeyD: 'ㅇ', KeyF: 'ㄹ',
                KeyG: 'ㅎ', KeyH: 'ㅗ', KeyJ: 'ㅓ', KeyK: 'ㅏ', KeyL: 'ㅣ', KeyZ: 'ㅋ', KeyX: 'ㅌ',
                KeyC: 'ㅊ', KeyV: 'ㅍ', KeyB: 'ㅠ', KeyN: 'ㅜ', KeyM: 'ㅡ',
                Space: '스페이스', Enter: 'Enter', Backspace: '백스페이스'
            },
            shift: { KeyQ: 'ㅃ', KeyW: 'ㅉ', KeyE: 'ㄸ', KeyR: 'ㄲ', KeyT: 'ㅆ', KeyO: 'ㅒ', KeyP: 'ㅖ' }
        },
        portuguese: {
            base: {
                Backquote: '\\', Digit1: '1', Digit2: '2', Digit3: '3', Digit4: '4', Digit5: '5',
                Digit6: '6', Digit7: '7', Digit8: '8', Digit9: '9', Digit0: '0', Minus: "'", Equal: '+',
                KeyQ: 'Q', KeyW: 'W', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Y', KeyU: 'U',
                KeyI: 'I', KeyO: 'O', KeyP: 'P', BracketLeft: '+', BracketRight: '´', Backslash: ']',
                KeyA: 'A', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J',
                KeyK: 'K', KeyL: 'L', Semicolon: 'Ç', Quote: '~', IntlBackslash: '<',
                KeyZ: 'Z', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B', KeyN: 'N', KeyM: 'M',
                Comma: ',', Period: '.', Slash: '-', Space: 'Espaço', Enter: 'Enter', Backspace: 'Retrocesso'
            },
            shift: {
                Backquote: '|', Digit1: '!', Digit2: '"', Digit3: '#', Digit4: '$', Digit5: '%',
                Digit6: '&', Digit7: '/', Digit8: '(', Digit9: ')', Digit0: '=', Minus: '?', Equal: '*',
                BracketLeft: '`', BracketRight: '*', Backslash: '}', Quote: '^', IntlBackslash: '>',
                Comma: ';', Period: ':', Slash: '_'
            }
        },
        russian: {
            base: {
                Backquote: 'Ё', KeyQ: 'Й', KeyW: 'Ц', KeyE: 'У', KeyR: 'К', KeyT: 'Е', KeyY: 'Н',
                KeyU: 'Г', KeyI: 'Ш', KeyO: 'Щ', KeyP: 'З', BracketLeft: 'Х', BracketRight: 'Ъ',
                KeyA: 'Ф', KeyS: 'Ы', KeyD: 'В', KeyF: 'А', KeyG: 'П', KeyH: 'Р', KeyJ: 'О',
                KeyK: 'Л', KeyL: 'Д', Semicolon: 'Ж', Quote: 'Э', KeyZ: 'Я', KeyX: 'Ч', KeyC: 'С',
                KeyV: 'М', KeyB: 'И', KeyN: 'Т', KeyM: 'Ь', Comma: 'Б', Period: 'Ю',
                Space: 'Пробел', Enter: 'Enter', Backspace: 'Backspace'
            },
            shift: {
                Digit1: '!', Digit2: '"', Digit3: '№', Digit4: ';', Digit5: '%', Digit6: ':',
                Digit7: '?', Digit8: '*', Digit9: '(', Digit0: ')', Minus: '_', Equal: '+', Slash: ','
            }
        },
        spanish: {
            base: {
                Backquote: '|', Digit1: '1', Digit2: '2', Digit3: '3', Digit4: '4', Digit5: '5',
                Digit6: '6', Digit7: '7', Digit8: '8', Digit9: '9', Digit0: '0', Minus: "'", Equal: '¡',
                KeyQ: 'Q', KeyW: 'W', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Y', KeyU: 'U',
                KeyI: 'I', KeyO: 'O', KeyP: 'P', BracketLeft: '`', BracketRight: '+', Backslash: ']',
                KeyA: 'A', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J',
                KeyK: 'K', KeyL: 'L', Semicolon: 'Ñ', Quote: '{', KeyZ: 'Z', KeyX: 'X', KeyC: 'C',
                KeyV: 'V', KeyB: 'B', KeyN: 'N', KeyM: 'M', Comma: ',', Period: '.', Slash: '-',
                Space: 'Espacio', Enter: 'Enter', Backspace: 'Retroceso'
            },
            shift: {
                Backquote: '°', Digit1: '!', Digit2: '"', Digit3: '#', Digit4: '$', Digit5: '%',
                Digit6: '&', Digit7: '/', Digit8: '(', Digit9: ')', Digit0: '=', Minus: '?', Equal: '¿',
                BracketLeft: '^', BracketRight: '*', Backslash: '}', Quote: '[', Comma: ';', Period: ':', Slash: '_'
            }
        }
    };

    function getLocale() {
        const root = document.querySelector('.keyboard-tester');
        if (root && root.dataset.keyboardLocale) return root.dataset.keyboardLocale;
        const match = window.location.pathname.match(/\/languages\/([^/]+)/);
        return match ? match[1].toLowerCase() : 'english';
    }

    function isShifted(event) {
        return !!(event.shiftKey || (event.getModifierState && event.getModifierState('Shift')));
    }

    function fromVisibleKey(keyEl) {
        if (!keyEl) return '';
        const preferred = keyEl.querySelector('.ar, .hangul, .dual small:last-child');
        const text = (preferred || keyEl).textContent || '';
        return text.replace(/\s+/g, ' ').trim();
    }

    function getEntry(event, keyEl) {
        const code = event.code || (keyEl && keyEl.dataset ? keyEl.dataset.key : '');
        const layout = layouts[getLocale()];
        if (layout && code) {
            if (isShifted(event) && layout.shift && Object.prototype.hasOwnProperty.call(layout.shift, code)) {
                return layout.shift[code];
            }
            if (layout.base && Object.prototype.hasOwnProperty.call(layout.base, code)) {
                return layout.base[code];
            }
        }
        if (event.key && event.key.length === 1) return event.key;
        return fromVisibleKey(keyEl) || code || event.key || '';
    }

    window.KbtLocalizedKeyboardHistory = { getEntry };
}());
