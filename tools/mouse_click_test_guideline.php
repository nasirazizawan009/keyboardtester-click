<?php
ob_start();
?>

<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header">
        <h2>Online Mouse Tester Guide</h2>
        <p>Use this free online mouse tester to check mouse buttons, scroll wheel direction, and click accuracy in seconds.</p>
    </div>

    <div class="help-grid">
        <div class="help-card">
            <h3>Run a mouse button test</h3>
            <ol>
                <li>Click inside the tester and press left, middle, and right buttons.</li>
                <li>Confirm each button highlights and the counter updates.</li>
                <li>Use Reset to clear results and start over.</li>
            </ol>
        </div>
        <div class="help-card">
            <h3>Verify scroll wheel direction</h3>
            <ul>
                <li>Scroll up and down to check direction detection.</li>
                <li>Watch the scroll indicator to confirm input.</li>
                <li>Compare counts for consistent wheel response.</li>
            </ul>
        </div>
        <div class="help-card">
            <h3>Check accuracy + responsiveness</h3>
            <ul>
                <li>Look for missed clicks or delayed response.</li>
                <li>Test rapid clicks if you suspect double click issues.</li>
                <li>Retest after cleaning or updating drivers.</li>
            </ul>
        </div>
    </div>

    <div class="help-accordion">
        <details>
            <summary>Why is my mouse button not registering?</summary>
            <p>Make sure the page is focused, then test again. If it still fails, try a different USB port or device.</p>
        </details>
        <details>
            <summary>How do I test my mouse scroll wheel?</summary>
            <p>Scroll up and down and watch the direction indicator and count to confirm consistent wheel input.</p>
        </details>
        <details>
            <summary>Can I test double click issues?</summary>
            <p>Yes. Rapidly click the button and watch the counter for unexpected extra clicks.</p>
        </details>
        <details>
            <summary>Does the mouse tester work on laptops and touchpads?</summary>
            <p>It works with trackpads too, but external mice give the most accurate results.</p>
        </details>
        <details>
            <summary>How do I reset the mouse test?</summary>
            <p>Click Reset to clear the counters and start a fresh mouse test.</p>
        </details>
        <details>
            <summary>Is the mouse test private?</summary>
            <p>All testing runs in your browser and does not upload data.</p>
        </details>
    </div>

    <div class="help-footer">
        <p>Need more tools? Explore keyboard, audio, and display testers in the tools list below.</p>
    </div>
</section>

<?php
echo ob_get_clean();
?>
