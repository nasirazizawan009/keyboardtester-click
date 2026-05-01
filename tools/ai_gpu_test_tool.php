<?php // Browser AI GPU readiness tester. Logic lives in assets/js/ai-gpu-test.js ?>
<div class="ai-gpu-tool" data-ai-gpu-tool>
    <section class="ai-gpu-panel ai-gpu-panel--summary" aria-labelledby="ai-gpu-summary-title">
        <div class="ai-gpu-summary-main">
            <p class="ai-gpu-eyebrow">Readiness verdict</p>
            <h3 id="ai-gpu-summary-title">Browser AI GPU check</h3>
            <p id="ai-gpu-verdict-copy">Run detection to see whether this browser can use GPU acceleration for local AI and heavy graphics workloads.</p>
        </div>
        <div class="ai-gpu-score" aria-live="polite">
            <span id="ai-gpu-score-value">--</span>
            <small>AI readiness score</small>
        </div>
    </section>

    <section class="ai-gpu-grid" aria-label="GPU capability checks">
        <article class="ai-gpu-card" data-check-card="webgpu">
            <span class="ai-gpu-check" id="ai-gpu-webgpu-state">--</span>
            <h4>WebGPU compute</h4>
            <p id="ai-gpu-webgpu-copy">Not checked yet.</p>
        </article>
        <article class="ai-gpu-card" data-check-card="webgl">
            <span class="ai-gpu-check" id="ai-gpu-webgl-state">--</span>
            <h4>WebGL graphics</h4>
            <p id="ai-gpu-webgl-copy">Not checked yet.</p>
        </article>
        <article class="ai-gpu-card" data-check-card="webnn">
            <span class="ai-gpu-check" id="ai-gpu-webnn-state">--</span>
            <h4>WebNN / NPU API</h4>
            <p id="ai-gpu-webnn-copy">Not checked yet.</p>
        </article>
        <article class="ai-gpu-card" data-check-card="fallback">
            <span class="ai-gpu-check" id="ai-gpu-fallback-state">--</span>
            <h4>Software fallback</h4>
            <p id="ai-gpu-fallback-copy">Not checked yet.</p>
        </article>
    </section>

    <section class="ai-gpu-panel">
        <div class="ai-gpu-panel-head">
            <div>
                <p class="ai-gpu-eyebrow">Safe AI-style compute</p>
                <h3>Matrix compute benchmark</h3>
                <p>Runs matrix multiplication through WebGPU. Matrix multiplication is the core operation behind transformer and vision-model inference, so this is a practical browser AI readiness signal.</p>
            </div>
            <div class="ai-gpu-controls">
                <label for="ai-gpu-size">Load</label>
                <select id="ai-gpu-size">
                    <option value="128">Light 128 x 128</option>
                    <option value="192" selected>Standard 192 x 192</option>
                    <option value="256">Heavy 256 x 256</option>
                </select>
                <button type="button" class="ai-gpu-btn ai-gpu-btn-primary" id="ai-gpu-run">Run AI GPU test</button>
            </div>
        </div>

        <div class="ai-gpu-metrics">
            <div class="ai-gpu-metric"><b id="ai-gpu-gflops">--</b><span>GFLOPS estimate</span></div>
            <div class="ai-gpu-metric"><b id="ai-gpu-time">--</b><span>Compute time</span></div>
            <div class="ai-gpu-metric"><b id="ai-gpu-size-result">--</b><span>Matrix size</span></div>
            <div class="ai-gpu-metric"><b id="ai-gpu-checksum">--</b><span>Validation checksum</span></div>
        </div>
        <div class="ai-gpu-progress" aria-hidden="true"><span id="ai-gpu-progress-bar"></span></div>
        <p class="ai-gpu-note" id="ai-gpu-benchmark-note">The benchmark is idle. Results are browser-relative, not a replacement for native 3DMark, FurMark, or MLPerf scores.</p>
    </section>

    <section class="ai-gpu-panel ai-gpu-panel--split">
        <div>
            <p class="ai-gpu-eyebrow">Adapter details</p>
            <h3>Detected browser GPU path</h3>
            <dl class="ai-gpu-details">
                <div><dt>WebGPU adapter</dt><dd id="ai-gpu-adapter">Not checked</dd></div>
                <div><dt>WebGL renderer</dt><dd id="ai-gpu-renderer">Not checked</dd></div>
                <div><dt>WebGPU backend limits</dt><dd id="ai-gpu-limits">Not checked</dd></div>
                <div><dt>Useful features</dt><dd id="ai-gpu-features">Not checked</dd></div>
            </dl>
        </div>
        <div>
            <p class="ai-gpu-eyebrow">Graphics sanity check</p>
            <h3>WebGL visual test</h3>
            <canvas id="ai-gpu-canvas" class="ai-gpu-canvas" width="720" height="320" aria-label="Animated WebGL GPU test canvas"></canvas>
            <div class="ai-gpu-canvas-actions">
                <button type="button" class="ai-gpu-btn ai-gpu-btn-ghost" id="ai-gpu-graphics">Run 10 second graphics test</button>
                <span id="ai-gpu-fps-result">FPS: --</span>
            </div>
        </div>
    </section>

    <noscript>
        <p class="ai-gpu-noscript">JavaScript is required because browser GPU APIs are only exposed to client-side code.</p>
    </noscript>
</div>
