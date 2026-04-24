<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What Is N-Key Rollover?</h2>
      <p>N-key rollover, commonly abbreviated NKRO, describes how many keys a keyboard can register simultaneously and report to the computer without dropping any input. A full NKRO keyboard can report every single key independently no matter how many are held at once, while lower rollover designs stop after two, six, or some other limited count of simultaneous presses.</p>
      <p>This matters for competitive gamers who need sprint, crouch, and ability keys held together, fast typists whose finger overlap generates multiple simultaneous signals, rhythm game players who hold several notes at once, and professionals who rely on complex multi-key shortcuts.</p>
    </article>

    <article class="seo-article">
      <h2>USB vs PS/2 — Why Protocol Limits Matter for Rollover</h2>
      <p>The original PS/2 keyboard interface transmitted each key state independently in a continuous stream, so a PS/2 keyboard could naturally report every key held simultaneously — true NKRO by design. USB changed this.</p>
      <p>The USB Human Interface Device (HID) specification for keyboards uses a fixed-size report packet. The standard boot-protocol packet reserves six bytes for simultaneous non-modifier key codes. That is where the "6KRO" limit for most USB keyboards comes from — not a hardware flaw, but a protocol constraint baked into the original HID report descriptor.</p>
      <p>Keyboard manufacturers can work around this in two ways. First, they can define a custom HID report descriptor that uses a bitmask covering every key on the board, allowing NKRO over USB. Second, they can expose a PS/2-compatible mode over USB using an adapter. Both methods exist and work, but they require deliberate engineering choices. A budget USB keyboard that ships with the default boot-protocol descriptor will be limited to 6KRO for regular keys regardless of whether it uses mechanical switches.</p>
    </article>

    <article class="seo-article">
      <h2>2KRO, 6KRO, and NKRO Explained</h2>
      <ul>
        <li><strong>2KRO:</strong> Only two non-modifier keys are guaranteed to register simultaneously. Modifier keys (Shift, Ctrl, Alt, Win) are usually handled separately and do not count against this limit. Common on very old or inexpensive membrane keyboards.</li>
        <li><strong>6KRO:</strong> Up to six non-modifier keys are registered at once. This is the USB HID default and is sufficient for the vast majority of typing and most gaming scenarios.</li>
        <li><strong>NKRO:</strong> The keyboard can register every key on the board simultaneously. Required for rhythm games, advanced gaming combos, and professional use cases where many keys are held at once.</li>
      </ul>
      <p>Even keyboards marketed for gaming can behave differently depending on the specific keys involved. A keyboard that claims anti-ghosting may only guarantee NKRO in a specific gaming cluster (WASD, a few function keys) while the rest of the board stays at 6KRO. A live test is always more reliable than a marketing claim.</p>
    </article>

    <article class="seo-article">
      <h2>How to Find Your Keyboard's Rollover Limit</h2>
      <p>Use the live tester above. Start with two keys held simultaneously, then three, then four, increasing until the on-screen keyboard stops matching what your fingers are pressing. When one of the held keys disappears from the display, you have found the practical rollover limit for that particular combination and zone.</p>
      <p>Important: rollover limits are often zone-specific. The WASD cluster may handle more simultaneous keys than the number row, or a keyboard may show full NKRO in a diode-protected gaming zone and 6KRO everywhere else. Test the specific keys you care about.</p>
      <p>For a focused combo check instead of a maximum-capacity check, use the <a href="keyboard-ghosting-test.php">keyboard ghosting test</a>. For checking individual stuck or repeating keys, see the <a href="stuck-key-test.php">stuck key test</a>.</p>
    </article>

    <article class="seo-article">
      <h2>Common Problems and Solutions</h2>
      <ul>
        <li><strong>Rollover limit drops after connecting via USB hub:</strong> Powered USB hubs generally do not affect HID rollover. Unpowered or poorly shielded hubs can occasionally corrupt HID packets. Test directly in a motherboard USB port to rule out the hub.</li>
        <li><strong>Keyboard advertises NKRO but test shows 6KRO:</strong> Many keyboards require a firmware switch or a special key combination to enable NKRO mode (often a Fn + key combo listed in the manual). Check the manufacturer's documentation for a gaming mode or NKRO toggle.</li>
        <li><strong>Modifier keys seem to reduce the non-modifier limit:</strong> Modifiers use separate bytes in the HID report, so they typically do not consume the six non-modifier slots. If you see limit changes with modifiers held, the keyboard may have a firmware quirk rather than a protocol issue.</li>
        <li><strong>Test shows fewer keys on wireless mode than wired:</strong> Wireless HID profiles sometimes use compressed report formats to reduce packet overhead. Check whether the keyboard has a wired + NKRO mode option that can be enabled via firmware.</li>
      </ul>
    </article>

    <article class="seo-article seo-faq">
      <h2>N-Key Rollover FAQ</h2>
      <div class="faq-list">
        <details class="faq-item">
          <summary>Do I need NKRO for normal typing?</summary>
          <p>Usually not. Most everyday typing and office shortcuts work comfortably within the 6KRO limit, since it is rare to hold six non-modifier keys simultaneously during normal text input. Gamers, rhythm game players, and users with complex shortcut needs are the most likely to benefit from full NKRO.</p>
        </details>
        <details class="faq-item">
          <summary>Why does the rollover result change with different keys?</summary>
          <p>Because the internal keyboard matrix assigns keys to different rows and columns. Rollover limits are often enforced per matrix zone rather than globally. Some rows and columns have diodes protecting every intersection; others rely on the default protocol limit.</p>
        </details>
        <details class="faq-item">
          <summary>Can I test rollover on a laptop keyboard?</summary>
          <p>Yes. Laptop keyboards are often exactly where users notice rollover and ghosting limits, particularly during gaming. The slim switch mechanisms and compact matrix designs in laptops frequently show lower rollover than standalone gaming keyboards.</p>
        </details>
        <details class="faq-item">
          <summary>Is 6KRO enough for gaming?</summary>
          <p>For most games, yes. Typical real-time game inputs rarely exceed four or five simultaneous keys. 6KRO becomes insufficient in rhythm games, fighting games with complex input sequences, or MMOs where many ability bindings are held together with modifiers.</p>
        </details>
        <details class="faq-item">
          <summary>How is N-key rollover different from anti-ghosting?</summary>
          <p>Anti-ghosting is a hardware design that prevents false phantom key signals in a matrix keyboard by adding diodes. NKRO is the practical result: with full anti-ghosting across every key, the keyboard can report all simultaneously held keys without dropping any. A keyboard can have partial anti-ghosting (only in specific zones) and therefore not achieve full NKRO on the whole board.</p>
        </details>
      </div>
    </article>
  </div>
</section>
