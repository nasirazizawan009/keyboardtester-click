(function () {
    'use strict';

    const root = document.querySelector('[data-ai-gpu-tool]');
    if (!root) return;

    const $ = (id) => document.getElementById(id);
    const state = {
        webgpu: false,
        webgl2: false,
        webnn: false,
        softwareRenderer: false,
        device: null,
        adapter: null,
        gl: null,
        score: 0,
        lastGflops: 0,
    };

    const els = {
        score: $('ai-gpu-score-value'),
        verdict: $('ai-gpu-verdict-copy'),
        run: $('ai-gpu-run'),
        load: $('ai-gpu-size'),
        progress: $('ai-gpu-progress-bar'),
        gflops: $('ai-gpu-gflops'),
        time: $('ai-gpu-time'),
        size: $('ai-gpu-size-result'),
        checksum: $('ai-gpu-checksum'),
        note: $('ai-gpu-benchmark-note'),
        graphics: $('ai-gpu-graphics'),
        fps: $('ai-gpu-fps-result'),
        adapter: $('ai-gpu-adapter'),
        renderer: $('ai-gpu-renderer'),
        limits: $('ai-gpu-limits'),
        features: $('ai-gpu-features'),
    };

    function setCard(name, status, label, copy) {
        const card = root.querySelector('[data-check-card="' + name + '"]');
        const badge = $('ai-gpu-' + name + '-state');
        const body = $('ai-gpu-' + name + '-copy');
        if (!card || !badge || !body) return;
        card.classList.remove('is-good', 'is-warn', 'is-bad');
        card.classList.add(status === 'good' ? 'is-good' : status === 'warn' ? 'is-warn' : 'is-bad');
        badge.textContent = label;
        body.textContent = copy;
    }

    function setScore(value, reason) {
        state.score = Math.max(0, Math.min(100, Math.round(value)));
        els.score.textContent = String(state.score);
        els.score.parentElement.style.setProperty('--ai-score', state.score + '%');
        if (state.score >= 80) {
            els.verdict.textContent = 'Strong result. This browser exposes the right GPU path for WebGPU-based AI demos and local acceleration experiments.';
        } else if (state.score >= 55) {
            els.verdict.textContent = 'Usable result. Light browser AI workloads should work, but heavy local models may be slow or limited by memory and browser overhead.';
        } else {
            els.verdict.textContent = reason || 'Limited result. WebGPU, WebGL hardware acceleration, or the browser AI path is missing or blocked.';
        }
    }

    function formatBytes(n) {
        if (!Number.isFinite(n)) return 'unknown';
        if (n >= 1073741824) return (n / 1073741824).toFixed(1) + ' GB';
        if (n >= 1048576) return (n / 1048576).toFixed(0) + ' MB';
        return Math.round(n / 1024) + ' KB';
    }

    async function detectWebGPU() {
        if (!('gpu' in navigator)) {
            setCard('webgpu', 'bad', 'No', 'navigator.gpu is not available. Use a newer Chrome/Edge/Safari/Firefox build with WebGPU support.');
            els.adapter.textContent = 'WebGPU not exposed by this browser.';
            return 0;
        }

        try {
            const adapter = await navigator.gpu.requestAdapter({ powerPreference: 'high-performance' });
            if (!adapter) {
                setCard('webgpu', 'bad', 'No', 'The browser exposes WebGPU but could not request a GPU adapter.');
                els.adapter.textContent = 'No adapter returned.';
                return 8;
            }

            state.adapter = adapter;
            const device = await adapter.requestDevice();
            state.device = device;
            state.webgpu = true;

            const info = adapter.info || {};
            const adapterText = [
                info.vendor || info.architecture || info.device || info.description
                    ? [info.vendor, info.architecture, info.device, info.description].filter(Boolean).join(' / ')
                    : 'Adapter available; exact GPU name may be hidden for privacy',
            ].join('');

            els.adapter.textContent = adapterText;
            const limits = adapter.limits || {};
            els.limits.textContent = 'Max buffer ' + formatBytes(limits.maxBufferSize) + ', max texture ' + (limits.maxTextureDimension2D || 'unknown') + ', workgroup invocations ' + (limits.maxComputeInvocationsPerWorkgroup || 'unknown');
            const featureList = Array.from(adapter.features || []).filter((name) => /float|timestamp|texture|shader|subgroup/i.test(name)).slice(0, 7);
            els.features.textContent = featureList.length ? featureList.join(', ') : 'No optional high-value WebGPU features exposed.';

            setCard('webgpu', 'good', 'Yes', 'WebGPU adapter and device are available. This is the main browser API for GPU compute and local AI acceleration.');
            device.lost.then((infoLost) => {
                els.note.textContent = 'WebGPU device was lost: ' + (infoLost && infoLost.message ? infoLost.message : 'unknown reason') + '. Reload before testing again.';
                setCard('webgpu', 'warn', 'Lost', 'The WebGPU device was lost during the session. Reload and retry with a lighter benchmark.');
            });
            return 42;
        } catch (err) {
            setCard('webgpu', 'bad', 'Error', 'WebGPU failed to initialize: ' + (err && err.message ? err.message : String(err)));
            els.adapter.textContent = 'WebGPU initialization failed.';
            return 6;
        }
    }

    function detectWebGL() {
        const canvas = $('ai-gpu-canvas');
        let gl = null;
        try {
            gl = canvas.getContext('webgl2', { antialias: false, powerPreference: 'high-performance' });
        } catch (err) {
            gl = null;
        }

        if (!gl) {
            setCard('webgl', 'bad', 'No', 'WebGL2 is not available. Graphics acceleration is disabled or unsupported.');
            setCard('fallback', 'warn', '?', 'Cannot check renderer because WebGL2 is unavailable.');
            els.renderer.textContent = 'WebGL2 not available.';
            return 0;
        }

        state.gl = gl;
        state.webgl2 = true;
        const debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
        const vendor = debugInfo ? gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL) : gl.getParameter(gl.VENDOR);
        const renderer = debugInfo ? gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL) : gl.getParameter(gl.RENDERER);
        const rendererText = [vendor, renderer].filter(Boolean).join(' / ') || 'Renderer hidden';
        const isSoftware = /swiftshader|llvmpipe|software|mesa offscreen|basic render/i.test(rendererText);
        state.softwareRenderer = isSoftware;

        els.renderer.textContent = rendererText;
        setCard('webgl', 'good', 'Yes', 'WebGL2 is available, so this browser can use GPU-backed graphics paths.');
        if (isSoftware) {
            setCard('fallback', 'bad', 'CPU', 'Software rendering detected. Results are CPU-bound, not real GPU acceleration.');
            return 8;
        }
        setCard('fallback', 'good', 'GPU', 'No obvious SwiftShader, llvmpipe, or software renderer string detected.');
        return 24;
    }

    function detectWebNN() {
        if ('ml' in navigator) {
            state.webnn = true;
            setCard('webnn', 'good', 'Yes', 'navigator.ml is available. Browser neural-network acceleration may be available depending on backend support.');
            return 12;
        }
        setCard('webnn', 'warn', 'No', 'WebNN is not exposed. This is common; WebGPU or WASM can still run many browser AI workloads.');
        return 2;
    }

    async function runDetection() {
        setScore(0, 'Checking browser GPU capabilities...');
        const webglScore = detectWebGL();
        const webnnScore = detectWebNN();
        const webgpuScore = await detectWebGPU();
        const softwarePenalty = state.softwareRenderer ? -18 : 0;
        setScore(webgpuScore + webglScore + webnnScore + softwarePenalty);
    }

    function makeMatrix(size, seed) {
        const total = size * size;
        const buffer = new ArrayBuffer(8 + total * 4);
        const header = new Uint32Array(buffer, 0, 2);
        const data = new Float32Array(buffer, 8, total);
        header[0] = size;
        header[1] = size;
        let x = seed >>> 0;
        for (let i = 0; i < total; i++) {
            x = (1664525 * x + 1013904223) >>> 0;
            data[i] = ((x & 1023) / 1023) - 0.5;
        }
        return buffer;
    }

    async function ensureWebGPUDevice() {
        if (state.device) return state.device;
        await detectWebGPU();
        return state.device;
    }

    async function runComputeBenchmark() {
        const device = await ensureWebGPUDevice();
        if (!device) {
            els.note.textContent = 'Cannot run the AI GPU benchmark because WebGPU is not available in this browser.';
            return;
        }

        const size = parseInt(els.load.value, 10) || 192;
        const iterations = size >= 256 ? 2 : 3;
        const bytes = 8 + size * size * 4;
        const usage = GPUBufferUsage.STORAGE | GPUBufferUsage.COPY_DST;

        els.run.disabled = true;
        els.note.textContent = 'Preparing GPU buffers...';
        root.style.setProperty('--ai-progress', '10%');
        els.gflops.textContent = '--';
        els.time.textContent = '--';
        els.size.textContent = size + ' x ' + size;
        els.checksum.textContent = '--';

        try {
            const aBuffer = device.createBuffer({ size: bytes, usage });
            const bBuffer = device.createBuffer({ size: bytes, usage });
            const resultBuffer = device.createBuffer({
                size: bytes,
                usage: GPUBufferUsage.STORAGE | GPUBufferUsage.COPY_SRC,
            });
            const readBuffer = device.createBuffer({
                size: bytes,
                usage: GPUBufferUsage.COPY_DST | GPUBufferUsage.MAP_READ,
            });

            device.queue.writeBuffer(aBuffer, 0, makeMatrix(size, 17));
            device.queue.writeBuffer(bBuffer, 0, makeMatrix(size, 91));

            const shader = device.createShaderModule({
                label: 'AI GPU test matrix multiply',
                code: `
struct Matrix {
  size: vec2<u32>,
  numbers: array<f32>,
}
@group(0) @binding(0) var<storage, read> firstMatrix: Matrix;
@group(0) @binding(1) var<storage, read> secondMatrix: Matrix;
@group(0) @binding(2) var<storage, read_write> resultMatrix: Matrix;

@compute @workgroup_size(8, 8)
fn main(@builtin(global_invocation_id) global_id: vec3<u32>) {
  let row = global_id.y;
  let col = global_id.x;
  let width = secondMatrix.size.y;
  let shared = firstMatrix.size.y;
  if (row >= firstMatrix.size.x || col >= width) {
    return;
  }
  var sum = 0.0;
  for (var i = 0u; i < shared; i = i + 1u) {
    let a = firstMatrix.numbers[row * shared + i];
    let b = secondMatrix.numbers[i * width + col];
    sum = sum + a * b;
  }
  if (row == 0u && col == 0u) {
    resultMatrix.size = vec2<u32>(firstMatrix.size.x, secondMatrix.size.y);
  }
  resultMatrix.numbers[row * width + col] = sum;
}
`,
            });

            const pipeline = device.createComputePipeline({
                label: 'AI GPU matrix pipeline',
                layout: 'auto',
                compute: { module: shader, entryPoint: 'main' },
            });

            const bindGroup = device.createBindGroup({
                label: 'AI GPU matrix bind group',
                layout: pipeline.getBindGroupLayout(0),
                entries: [
                    { binding: 0, resource: { buffer: aBuffer } },
                    { binding: 1, resource: { buffer: bBuffer } },
                    { binding: 2, resource: { buffer: resultBuffer } },
                ],
            });

            root.style.setProperty('--ai-progress', '35%');
            els.note.textContent = 'Dispatching matrix compute workload...';
            const start = performance.now();
            for (let i = 0; i < iterations; i++) {
                const encoder = device.createCommandEncoder({ label: 'AI GPU benchmark encoder' });
                const pass = encoder.beginComputePass({ label: 'AI GPU matrix pass' });
                pass.setPipeline(pipeline);
                pass.setBindGroup(0, bindGroup);
                pass.dispatchWorkgroups(Math.ceil(size / 8), Math.ceil(size / 8));
                pass.end();
                if (i === iterations - 1) {
                    encoder.copyBufferToBuffer(resultBuffer, 0, readBuffer, 0, bytes);
                }
                device.queue.submit([encoder.finish()]);
            }
            await device.queue.onSubmittedWorkDone();
            const elapsed = performance.now() - start;
            root.style.setProperty('--ai-progress', '80%');

            await readBuffer.mapAsync(GPUMapMode.READ);
            const mapped = new Float32Array(readBuffer.getMappedRange());
            const sampleStep = Math.max(1, Math.floor((size * size) / 16));
            let checksum = 0;
            for (let i = 2; i < mapped.length; i += sampleStep) {
                checksum += mapped[i];
            }
            readBuffer.unmap();

            const operations = 2 * Math.pow(size, 3) * iterations;
            const gflops = operations / (elapsed / 1000) / 1e9;
            state.lastGflops = gflops;
            els.gflops.textContent = gflops.toFixed(2);
            els.time.textContent = elapsed.toFixed(0) + ' ms';
            els.checksum.textContent = checksum.toFixed(2);

            const computeScore = Math.min(28, Math.max(4, gflops * 4));
            const baseScore = (state.webgpu ? 42 : 0) + (state.webgl2 ? 24 : 0) + (state.webnn ? 12 : 2) + (state.softwareRenderer ? -18 : 0);
            setScore(baseScore + computeScore);
            root.style.setProperty('--ai-progress', '100%');
            els.note.textContent = 'Benchmark complete. Repeat with the same load setting if you want a more stable average.';
        } catch (err) {
            els.note.textContent = 'Benchmark failed: ' + (err && err.message ? err.message : String(err));
            root.style.setProperty('--ai-progress', '0%');
        } finally {
            els.run.disabled = false;
        }
    }

    function runGraphicsTest() {
        const canvas = $('ai-gpu-canvas');
        const gl = state.gl || canvas.getContext('webgl2', { antialias: false, powerPreference: 'high-performance' });
        if (!gl) {
            els.fps.textContent = 'FPS: WebGL2 unavailable';
            return;
        }
        state.gl = gl;

        const vertexSrc = `#version 300 es
in vec2 position;
void main() { gl_Position = vec4(position, 0.0, 1.0); }`;
        const fragmentSrc = `#version 300 es
precision highp float;
uniform float t;
uniform vec2 resolution;
out vec4 outColor;
void main() {
  vec2 uv = (gl_FragCoord.xy / resolution.xy) * 2.0 - 1.0;
  float v = 0.0;
  for (int i = 0; i < 64; i++) {
    float fi = float(i);
    v += sin(uv.x * (fi + 2.0) + t * 1.7) * cos(uv.y * (fi + 3.0) - t);
  }
  vec3 color = 0.5 + 0.5 * cos(vec3(0.0, 1.6, 3.2) + v * 0.12 + t);
  outColor = vec4(color, 1.0);
}`;

        function compile(type, source) {
            const shader = gl.createShader(type);
            gl.shaderSource(shader, source);
            gl.compileShader(shader);
            if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
                throw new Error(gl.getShaderInfoLog(shader) || 'shader compile failed');
            }
            return shader;
        }

        try {
            const program = gl.createProgram();
            gl.attachShader(program, compile(gl.VERTEX_SHADER, vertexSrc));
            gl.attachShader(program, compile(gl.FRAGMENT_SHADER, fragmentSrc));
            gl.linkProgram(program);
            if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
                throw new Error(gl.getProgramInfoLog(program) || 'program link failed');
            }

            const buffer = gl.createBuffer();
            gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
            gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 3, -1, -1, 3]), gl.STATIC_DRAW);
            const loc = gl.getAttribLocation(program, 'position');
            gl.enableVertexAttribArray(loc);
            gl.vertexAttribPointer(loc, 2, gl.FLOAT, false, 0, 0);
            const tLoc = gl.getUniformLocation(program, 't');
            const resLoc = gl.getUniformLocation(program, 'resolution');

            const dpr = Math.min(window.devicePixelRatio || 1, 2);
            const rect = canvas.getBoundingClientRect();
            canvas.width = Math.max(320, Math.round(rect.width * dpr));
            canvas.height = Math.max(180, Math.round(rect.height * dpr));
            gl.viewport(0, 0, canvas.width, canvas.height);
            gl.useProgram(program);

            els.graphics.disabled = true;
            els.fps.textContent = 'FPS: running...';
            const start = performance.now();
            let frames = 0;
            let raf = 0;
            function frame(now) {
                frames++;
                gl.uniform1f(tLoc, (now - start) / 1000);
                gl.uniform2f(resLoc, canvas.width, canvas.height);
                gl.drawArrays(gl.TRIANGLES, 0, 3);
                if (now - start < 10000) {
                    raf = requestAnimationFrame(frame);
                } else {
                    const fps = frames / ((now - start) / 1000);
                    els.fps.textContent = 'FPS: ' + fps.toFixed(1) + ' avg';
                    els.graphics.disabled = false;
                    cancelAnimationFrame(raf);
                }
            }
            raf = requestAnimationFrame(frame);
        } catch (err) {
            els.fps.textContent = 'FPS: test failed';
            els.note.textContent = 'Graphics test failed: ' + (err && err.message ? err.message : String(err));
            els.graphics.disabled = false;
        }
    }

    els.run.addEventListener('click', runComputeBenchmark);
    els.graphics.addEventListener('click', runGraphicsTest);
    runDetection();
})();
