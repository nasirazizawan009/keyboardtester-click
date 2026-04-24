<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header"><h2>WebRTC Leak Test Guide</h2><p>Detect IP leaks through your browser WebRTC API, understand the result, and fix it per browser.</p></div>
    <div class="help-grid">
        <div class="help-card">
            <h3>Run the test</h3>
            <ol>
                <li>Connect to your VPN (if you use one).</li>
                <li>Press <strong>Start scan</strong>.</li>
                <li>Your browser sends a STUN request; every IP WebRTC exposes is listed.</li>
                <li>The banner turns red if a leak is detected. A fix panel opens below the results with per-browser steps.</li>
            </ol>
        </div>
        <div class="help-card">
            <h3>Reading the result</h3>
            <ul>
                <li><strong>Public IP matches your VPN server</strong> &rarr; safe.</li>
                <li><strong>Public IP is your ISP IP</strong> &rarr; VPN is leaking, fix it below.</li>
                <li><strong>Local IP is a <code>.local</code> hash</strong> &rarr; safe. That is Chrome mDNS privacy.</li>
                <li><strong>Local IP is <code>192.168.x</code> or <code>10.x</code></strong> &rarr; exposed to anyone running a script on the page.</li>
                <li><strong>IPv6 shown while your VPN is v4-only</strong> &rarr; v6 leak, disable IPv6 in OS or pick a v6-capable VPN.</li>
            </ul>
        </div>
        <div class="help-card">
            <h3>Fix on Chrome / Edge</h3>
            <ol>
                <li>Chrome has no native switch. Install Google's official <strong>WebRTC Network Limiter</strong> extension from the Chrome Web Store.</li>
                <li>Or use <strong>uBlock Origin</strong>: Dashboard &gt; Settings &gt; tick <em>Prevent WebRTC from leaking local IP addresses</em>.</li>
                <li>Easier option: use a VPN with built-in WebRTC blocking (Mullvad, ProtonVPN, NordVPN, ExpressVPN).</li>
            </ol>
        </div>
        <div class="help-card">
            <h3>Fix on Firefox</h3>
            <ol>
                <li>Type <code>about:config</code> in the address bar and accept the warning.</li>
                <li>Search for <code>media.peerconnection.enabled</code>.</li>
                <li>Double-click to flip it to <strong>false</strong>.</li>
                <li>Rescan &mdash; public and local IPs should now read &ldquo;None exposed.&rdquo;</li>
                <li>Caveat: Meet, Discord web, and WhatsApp Web will stop working until you set it back to true.</li>
            </ol>
        </div>
        <div class="help-card">
            <h3>Fix on Brave</h3>
            <ol>
                <li>Paste <code>brave://settings/privacy</code> into the address bar.</li>
                <li>Find <strong>WebRTC IP handling policy</strong>.</li>
                <li>Switch to <strong>Disable Non-Proxied UDP</strong>.</li>
                <li>Brave is the only major browser with this in-UI &mdash; no extension needed.</li>
            </ol>
        </div>
        <div class="help-card">
            <h3>Fix on Safari (macOS &amp; iOS)</h3>
            <ol>
                <li><strong>macOS:</strong> Safari &gt; Settings &gt; Advanced &gt; enable <em>Show features for web developers</em>, then Develop &gt; Feature Flags &gt; disable <em>WebRTC Platform UDP Sockets</em>.</li>
                <li><strong>iOS:</strong> Settings &gt; Safari &gt; Advanced &gt; Experimental Features &gt; enable <em>WebRTC mDNS ICE candidates</em>.</li>
                <li>Safari masks local IPs by default; the steps above further harden public IP exposure.</li>
            </ol>
        </div>
        <div class="help-card">
            <h3>Is my VPN enough?</h3>
            <ul>
                <li>Good consumer VPNs block WebRTC leaks at the app or tunnel level. Cheap or free VPNs often do not.</li>
                <li>Mobile VPN apps (iOS/Android) usually protect WebRTC better than browser VPN extensions.</li>
                <li>If the scan still shows your real IP with a paid VPN on, raise a support ticket &mdash; their leak protection is broken.</li>
            </ul>
        </div>
        <div class="help-card">
            <h3>Common misconceptions</h3>
            <ul>
                <li><strong>Incognito does not block WebRTC.</strong> It only clears history and cookies.</li>
                <li><strong><code>.local</code> is not a leak.</strong> It is a hashed mDNS string Chrome uses since 2019 to hide your real local IP.</li>
                <li><strong>Disabling WebRTC is not always the right answer</strong> &mdash; it also disables video calls in the browser.</li>
            </ul>
        </div>
    </div>
</section>
