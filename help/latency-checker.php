<section class="guidelines landing-guide" id="guidelines">
  <div class="help-header">
    <h2>Keyboard Latency Test Guide</h2>
    <p>Use the latency checker to sample keyboard input delay in milliseconds and compare repeated runs on the same computer.</p>
  </div>

  <div class="help-grid">
    <div class="help-card">
      <h3>Start the latency test</h3>
      <ol>
        <li>Focus the page and start the live tester.</li>
        <li>Press the same key several times to collect enough samples.</li>
        <li>Reset and repeat after changing keyboard, browser, or connection type.</li>
      </ol>
    </div>
    <div class="help-card">
      <h3>Reduce noisy results</h3>
      <ul>
        <li>Close heavy tabs, games, and background apps before testing.</li>
        <li>Use the same browser when comparing two keyboards.</li>
        <li>Test wired, 2.4 GHz, and Bluetooth modes separately if your keyboard supports them.</li>
      </ul>
    </div>
    <div class="help-card">
      <h3>Review results</h3>
      <ul>
        <li>Use the average to judge normal delay.</li>
        <li>Use the best and worst values to spot jitter or spikes.</li>
        <li>Compare multiple runs before blaming the keyboard.</li>
      </ul>
    </div>
  </div>

  <div class="help-grid">
    <div class="help-card">
      <h3>What this test measures</h3>
      <p>This browser tool measures the delay from the keyboard event timestamp to JavaScript processing. It is best for comparing keyboards or connection modes on the same machine.</p>
    </div>
    <div class="help-card">
      <h3>What it cannot measure</h3>
      <p>It cannot directly measure the exact physical switch actuation point, USB polling packet, monitor refresh, or full end-to-end photon response.</p>
    </div>
    <div class="help-card">
      <h3>How to lower input delay</h3>
      <p>Use a wired or low-latency 2.4 GHz connection, avoid overloaded USB hubs, disable aggressive power saving, and retest when system load is low.</p>
    </div>
  </div>

  <div class="help-accordion">
    <details>
      <summary>Why is the keyboard latency test not responding?</summary>
      <p>Make sure the page is focused, click inside the tester, and confirm another app is not capturing the key press first.</p>
    </details>
    <details>
      <summary>How do I reset the test?</summary>
      <p>Use the reset button to clear results and start over.</p>
    </details>
    <details>
      <summary>Does this work on mobile devices?</summary>
      <p>Mobile browsers may not expose physical keyboard timing consistently, so desktop results are more useful for latency comparisons.</p>
    </details>
    <details>
      <summary>Can I run multiple tests in a row?</summary>
      <p>Yes. Reset after each run to compare results.</p>
    </details>
    <details>
      <summary>Is the latency test private?</summary>
      <p>Testing runs locally in your browser and is not uploaded.</p>
    </details>
    <details>
      <summary>What should I do if latency results look wrong?</summary>
      <p>Run another sample set, close heavy background apps, try a different browser, and compare against another keyboard on the same machine.</p>
    </details>
  </div>

  <div class="help-footer">
    <p>Need more tools? Explore keyboard, mouse, audio, and utility testers in the tools list below.</p>
  </div>
</section>
