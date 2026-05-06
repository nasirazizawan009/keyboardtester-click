<section class="guidelines landing-guide" id="guidelines">
  <div class="help-header">
    <h2>Keyboard and Mouse Latency Test Guide</h2>
    <p>Use the latency checker to sample keyboard input delay, mouse click latency, jitter, and response-time consistency on the same computer.</p>
  </div>

  <div class="help-grid">
    <div class="help-card">
      <h3>Start the latency test</h3>
      <ol>
        <li>Focus the page and start the live tester.</li>
        <li>Use Keyboard mode for key presses or Mouse click mode for the click pad.</li>
        <li>Reset and repeat after changing keyboard, mouse, browser, or connection type.</li>
      </ol>
    </div>
    <div class="help-card">
      <h3>Reduce noisy results</h3>
      <ul>
        <li>Close heavy tabs, games, and background apps before testing.</li>
        <li>Use the same browser when comparing two keyboards or two mice.</li>
        <li>Test wired, 2.4 GHz, and Bluetooth modes separately if your device supports them.</li>
      </ul>
    </div>
    <div class="help-card">
      <h3>Review results</h3>
      <ul>
        <li>Use the average to judge normal delay.</li>
        <li>Use jitter, best, and worst values to spot inconsistent spikes.</li>
        <li>Compare multiple runs before blaming the keyboard or mouse.</li>
      </ul>
    </div>
  </div>

  <div class="help-grid">
    <div class="help-card">
      <h3>What this test measures</h3>
      <p>This browser tool measures the delay from keyboard or pointer event timestamps to JavaScript processing. It is best for comparing keyboard MS, mouse click delay, response time, or connection modes on the same machine.</p>
    </div>
    <div class="help-card">
      <h3>What it cannot measure</h3>
      <p>It cannot directly measure exact physical switch actuation, mouse switch travel, USB polling packets, monitor refresh, or full end-to-end photon response.</p>
    </div>
    <div class="help-card">
      <h3>How to lower input delay</h3>
      <p>Use a wired or low-latency 2.4 GHz connection, avoid overloaded USB hubs, disable aggressive power saving, and retest when system load is low.</p>
    </div>
  </div>

  <div class="help-accordion">
    <details>
      <summary>Why is the latency test not responding?</summary>
      <p>Make sure the page is focused, the test is started, and the correct Keyboard or Mouse click mode is selected.</p>
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
      <p>Run another sample set, close heavy background apps, try a different browser, and compare against another keyboard or mouse on the same machine.</p>
    </details>
  </div>

  <div class="help-footer">
    <p>Need more tools? Use the mouse latency mode, mouse tester, polling-rate test, and reaction-time test links near the live tool.</p>
  </div>
</section>
