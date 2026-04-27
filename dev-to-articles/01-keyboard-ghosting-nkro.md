---
title: How to Test a Mechanical Keyboard for Ghosting and N-Key Rollover (Without Buying Software)
description: A practical guide to diagnosing keyboard ghosting and measuring N-key rollover using only your browser. Includes the matrix-scanning theory, real key combos to try, and how to interpret the results.
tags: keyboards, hardware, webdev, testing
canonical_url: https://keyboardtester.click/keyboard-ghosting-test.php
---

If you've ever been mid-sprint in a game, holding W, A, and Shift, only for your character to stop dead because the keyboard "ate" your sprint key — congratulations, you've met **keyboard ghosting** in person.

It feels like a software bug. It isn't. It's a 40-year-old electrical compromise baked into the hardware, and the only fix is either a better keyboard or knowing exactly which combos your current keyboard can't handle.

This post explains what's actually happening inside the keyboard, how to test for ghosting and N-key rollover (NKRO) using nothing but a browser, and what the results actually mean.

## What ghosting really is

Keyboards don't have a wire per key. That would mean ~104 wires per board, which is wasteful and impossible to manufacture cheaply. Instead, keys sit on a **switch matrix** — a grid of rows and columns, with one switch at each intersection.

The keyboard's microcontroller scans this grid hundreds of times per second:

1. Power one row.
2. Read which columns have current flowing.
3. Any row+column intersection with current = a pressed key.
4. Move to the next row.

This works perfectly for one or two simultaneous keys. The problem starts at three.

Imagine three keys pressed at the same time, each at a unique row+column intersection. If the geometry of those intersections forms three corners of a rectangle, the matrix can't tell whether you pressed three keys or four — because current can flow through the matrix in ways that look identical to either case. The fourth, never-pressed key is the **ghost**.

Different keyboard firmware handles this differently:

- **Cheap keyboards:** the firmware just reports the ambiguous state, and one of your real keys gets dropped.
- **Anti-ghosting keyboards:** the firmware detects the ambiguity and refuses to report any key from that combination — so you get a "blocked" key instead of a phantom one.
- **NKRO keyboards:** a hardware diode at every switch makes the matrix unambiguous regardless of how many keys are pressed.

The diode trick is the only real fix. Everything else is firmware patching around the limitation.

## Testing for ghosting in the browser

Here's the diagnostic approach that takes 30 seconds:

**Test 1 — The WASD+Shift combo.** This is the most common ghosting failure point because it's where 90% of cheap keyboards put their matrix boundary.

Open any browser-based keyboard tester. Press **W + A + Shift** all at once. If all three light up, your keyboard handles the most common gaming combo. If Shift drops, you have ghosting on this combination.

**Test 2 — The 3-letter cluster.** Press any three letters in the same physical zone of the keyboard simultaneously. For example: **Q + W + E**, then **A + S + D**, then **Z + X + C**.

If any test loses a key, you've found a ghosting zone.

**Test 3 — Add a modifier.** Take whatever 3-key cluster passed Test 2 and add Shift, then Ctrl, then Alt. The most common failures are modifier-on-letter combos in tight matrix zones.

**Test 4 — Cross-zone.** Try **Spacebar + W + A + D** simultaneously. This is the "I'm sprinting, jumping, and turning" gaming scenario. Even mid-tier keyboards sometimes drop one of these.

If you want to do this systematically, the [keyboard ghosting test](https://keyboardtester.click/keyboard-ghosting-test.php) tool I built shows every key registering live, so you can see exactly which key in a combo gets eaten. (Disclosure: I'm the developer.)

## Measuring N-Key Rollover

NKRO is the answer to "how many keys can my keyboard register at once?" Possible answers:

- **2KRO / 3KRO** — typical for cheap membrane keyboards. Press more than 2-3 keys, things start dropping.
- **6KRO** — the standard for most gaming keyboards because USB HID's basic boot protocol allows 6 simultaneous keys plus modifiers.
- **NKRO (full N-key rollover)** — every key independent, no upper limit. Requires either USB N-key rollover protocol (extended HID) or PS/2 (which inherently supports it).

The browser test for NKRO is simple but tedious:

1. Hold down keys one at a time without releasing any.
2. Watch the on-screen keyboard.
3. The maximum number that all stay highlighted simultaneously = your keyboard's rollover.
4. Once you exceed it, new keys you press won't register.

Important nuance: **the result depends on which keys you choose**. A 6KRO keyboard will register six modifiers (Shift, Ctrl, Alt × 2 each) plus 6 letters because modifiers don't count toward the 6KRO limit on most firmware. So "6KRO" can in practice support 10+ keys if you're using modifiers efficiently.

If you've never tested it, try: hold down all of A, S, D, F, J, K, L, ; — eight letter keys. If all eight light up, you have at least 8KRO. If only 6 light up, you have 6KRO. If fewer than 6, you have something less.

## Why your specific keyboard fails (or doesn't) in browsers

Even if your keyboard has full NKRO at the hardware level, **the browser may not see all of it**. Here's why:

USB keyboards default to the standard 6-key HID boot protocol. A keyboard with hardware NKRO can negotiate the extended protocol, but it requires both:

1. Your keyboard's firmware supporting the extended USB HID descriptor.
2. The host (and browser) accepting it.

Modern Chrome, Firefox, Safari, and Edge all handle the extended protocol fine. Older browsers, virtual machines, or certain USB hubs in compatibility mode can downgrade you to 6KRO even on a hardware-NKRO board.

If you're getting 6KRO in a browser test on a keyboard advertised as NKRO, the suspect order is: USB hub → keyboard firmware mode (some boards have a switch) → browser/OS (rare).

## Latency, while you're at it

If you're already testing the keyboard, also measure **per-key latency**. Browser-side, you can measure the time from `keydown` event arrival to JavaScript event-loop processing. This isn't the full hardware-to-pixel chain, but it's a reproducible relative metric.

```javascript
let lastKeyTime = 0;
document.addEventListener('keydown', e => {
  const now = performance.now();
  if (lastKeyTime) {
    console.log(`Inter-key delay: ${(now - lastKeyTime).toFixed(2)}ms`);
  }
  lastKeyTime = now;
});
```

Typical browser-measured values:

| Keyboard type | Typical browser latency |
|---------------|--------------------------|
| Wired gaming mechanical | 1–5ms |
| Wired office mechanical | 5–15ms |
| 2.4GHz wireless | 5–15ms |
| Bluetooth wireless | 15–30ms |
| Fading switches / failing PCB | 40ms+ inconsistent |

Note: this measures **browser-to-render latency only** — not USB polling delay (1ms at 1000Hz, 8ms at 125Hz) or monitor refresh delay. For absolute hardware specs you need a tool like NVIDIA LDAT. For comparing keyboard A vs keyboard B on the same machine, browser timing is reliable.

## What to do if your keyboard fails

If your keyboard ghosts on combos you actually use:

1. **Remap the failing keys** in the affected game or app to ones outside the ghosting zone. Most modern games allow rebinding.
2. **Switch USB ports.** Sometimes a USB hub or shared root hub causes downgraded reporting. Try a port directly on the motherboard.
3. **Check for an NKRO/6KRO toggle.** Many gaming keyboards ship in 6KRO mode for compatibility and have a Fn+key shortcut to enable NKRO.
4. **Replace the keyboard.** If your daily-use combos are consistently ghosting, no software fix exists. Any modern mechanical keyboard with diode-per-switch wiring will solve it permanently.

If your keyboard fails the simple stuck-key or repeat tests (a single key triggering twice on one press, or appearing to hold itself down), the problem is mechanical wear, not matrix design. That's usually a switch replacement on a hot-swap board, or a board replacement on a soldered one.

## Wrapping up

Keyboard ghosting is one of those topics where the failure mode is invisible until it bites you in a high-stakes moment. Five minutes of browser testing tells you exactly which combos to trust on your current keyboard, and saves you from the "why didn't my sprint key work?" rage moments.

If you maintain a keyboard tester in your bookmarks alongside the typing-speed test you used in school, you'll catch most hardware degradation before it becomes a problem. Mechanical keyboards lose precision gradually — a key that takes 50% more force to register today is a key that fails completely in six months.

Test before you upgrade. The keyboard you already own may be fine for everything except one specific combo, and a remap is much cheaper than a new board.

---

*I maintain [KeyboardTester.click](https://keyboardtester.click), an open-source browser-based hardware diagnostic suite. The [keyboard ghosting test](https://keyboardtester.click/keyboard-ghosting-test.php) and [N-key rollover test](https://keyboardtester.click/n-key-rollover-test.php) tools are built from the same matrix-scanning principles described above. Source code on GitHub.*
