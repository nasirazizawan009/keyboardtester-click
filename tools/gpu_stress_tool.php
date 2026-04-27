<?php // gpu_stress_tool.php – heavy WebGL2 Mandelbrot shader ?>
<style>
  .gpu-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .gpu-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .gpu-card h3{margin:0 0 12px;font-size:16px}
  .gpu-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin-bottom:14px}
  .gpu-btn{padding:10px 18px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .gpu-btn-primary{background:linear-gradient(180deg,#db2777,#f472b6);color:#fff}
  .gpu-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .gpu-btn-danger{background:#ef4444;color:#fff}
  .gpu-field{display:flex;gap:6px;align-items:center;font-size:13px;color:#334155}
  .gpu-field input{padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px;background:#fff}
  .gpu-field input[type=number]{width:90px}
  .gpu-field input[type=range]{width:160px}
  .gpu-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:10px}
  .gpu-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .gpu-stat b{display:block;font-size:22px;color:#0f172a}
  .gpu-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .gpu-canvas{width:100%;max-width:100%;height:420px;display:block;border-radius:12px;background:#000}
  .gpu-info{background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:10px 12px;font-size:12px;color:#334155;margin-top:10px;font-family:Consolas,monospace}
  .gpu-info b{font-family:inherit;color:#0f172a}
  .gpu-warn{background:#fef3c7;border:1px dashed #fbbf24;color:#92400e;padding:10px 12px;border-radius:8px;font-size:13px;margin-top:10px}
</style>

<div class="gpu-wrap">
  <div class="gpu-card">
    <h3>Stress settings</h3>
    <div class="gpu-controls">
      <div class="gpu-field"><label for="gpu-iter">Iterations</label><input id="gpu-iter" type="range" min="100" max="5000" step="50" value="1500"><span id="gpu-iter-val">1500</span></div>
      <div class="gpu-field"><label for="gpu-res">Resolution</label><input id="gpu-res" type="range" min="0.5" max="2" step="0.1" value="1"><span id="gpu-res-val">1.0x</span></div>
      <button id="gpu-start" class="gpu-btn gpu-btn-primary">Start stress</button>
      <button id="gpu-stop" class="gpu-btn gpu-btn-danger" disabled>Stop</button>
    </div>
    <div class="gpu-warn">Warning: high iteration counts on integrated laptop GPUs can pull the system hot quickly. If you see major stutter or the browser tab crash, lower iterations and resolution and retry.</div>
  </div>

  <div class="gpu-card">
    <h3>Live results</h3>
    <div class="gpu-stats">
      <div class="gpu-stat"><b id="gpu-fps">&mdash;</b><span>FPS (instant)</span></div>
      <div class="gpu-stat"><b id="gpu-fpsavg">&mdash;</b><span>FPS (1s avg)</span></div>
      <div class="gpu-stat"><b id="gpu-frames">0</b><span>Frames</span></div>
      <div class="gpu-stat"><b id="gpu-elapsed">0</b><span>Elapsed (s)</span></div>
      <div class="gpu-stat"><b id="gpu-minfps">&mdash;</b><span>Min FPS</span></div>
    </div>
    <canvas id="gpu-canvas" class="gpu-canvas"></canvas>
    <div class="gpu-info" id="gpu-info">Waiting to initialize WebGL2...</div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const canvas=$('gpu-canvas'), info=$('gpu-info');
  const iterIn=$('gpu-iter'), iterVal=$('gpu-iter-val');
  const resIn=$('gpu-res'), resVal=$('gpu-res-val');
  iterIn.addEventListener('input',()=>{iterVal.textContent=iterIn.value; uniforms.iter=parseInt(iterIn.value,10);});
  resIn.addEventListener('input',()=>{resVal.textContent=parseFloat(resIn.value).toFixed(1)+'x'; fitCanvas();});

  let gl=null, program=null, vao=null, uniLoc={}, uniforms={iter:1500,t:0,res:[1,1]};
  let running=false, rafId=null, startT=0, frames=0, lastT=0, fpsHistory=[], minFps=Infinity;

  function fitCanvas(){
    const w=canvas.clientWidth, h=420;
    const scale=parseFloat(resIn.value)||1;
    canvas.width=Math.floor(w*scale); canvas.height=Math.floor(h*scale);
    uniforms.res=[canvas.width,canvas.height];
    if(gl){ gl.viewport(0,0,canvas.width,canvas.height); }
  }
  window.addEventListener('resize',fitCanvas);

  function initGL(){
    gl = canvas.getContext('webgl2', {antialias:false, powerPreference:'high-performance'});
    if(!gl){ info.innerHTML='<b>WebGL2 not available.</b> Your browser or GPU driver does not expose WebGL2. Try enabling hardware acceleration.'; return false; }
    const dbg=gl.getExtension('WEBGL_debug_renderer_info');
    const vendor=dbg?gl.getParameter(dbg.UNMASKED_VENDOR_WEBGL):gl.getParameter(gl.VENDOR);
    const renderer=dbg?gl.getParameter(dbg.UNMASKED_RENDERER_WEBGL):gl.getParameter(gl.RENDERER);
    const swRender = /swiftshader|software|llvmpipe/i.test(renderer||'');
    info.innerHTML=`<b>Vendor:</b> ${vendor||'hidden'}<br><b>Renderer:</b> ${renderer||'hidden'}<br><b>WebGL version:</b> ${gl.getParameter(gl.VERSION)}<br><b>Shading:</b> ${gl.getParameter(gl.SHADING_LANGUAGE_VERSION)}${swRender?'<br><b style="color:#dc2626">Warning: software rendering detected — not a hardware test.</b>':''}`;

    const vs = `#version 300 es
in vec2 a; void main(){ gl_Position=vec4(a,0.,1.); }`;
    const fs = `#version 300 es
precision highp float;
uniform float u_t;
uniform vec2 u_res;
uniform int u_iter;
out vec4 outColor;
void main(){
  vec2 uv = (gl_FragCoord.xy / u_res - 0.5) * 3.0;
  uv.x -= 0.7;
  vec2 c = uv + vec2(cos(u_t*0.3)*0.1, sin(u_t*0.4)*0.1);
  vec2 z = vec2(0.);
  float n = 0.;
  for(int i=0;i<5000;i++){
    if(i>=u_iter) break;
    z = vec2(z.x*z.x - z.y*z.y, 2.*z.x*z.y) + c;
    if(dot(z,z)>4.0){ n = float(i); break; }
  }
  float v = n / float(u_iter);
  vec3 col = vec3(0.5 + 0.5*cos(6.28*(v+u_t*0.05)+vec3(0.,0.6,1.2)));
  outColor = vec4(col*smoothstep(0.,0.05,v), 1.0);
}`;

    function compile(t,s){ const sh=gl.createShader(t); gl.shaderSource(sh,s); gl.compileShader(sh); if(!gl.getShaderParameter(sh,gl.COMPILE_STATUS)){ info.textContent='Shader compile error: '+gl.getShaderInfoLog(sh); return null; } return sh; }
    const v=compile(gl.VERTEX_SHADER,vs), f=compile(gl.FRAGMENT_SHADER,fs);
    if(!v||!f) return false;
    program=gl.createProgram(); gl.attachShader(program,v); gl.attachShader(program,f); gl.linkProgram(program);
    if(!gl.getProgramParameter(program,gl.LINK_STATUS)){ info.textContent='Program link error: '+gl.getProgramInfoLog(program); return false; }

    const buf=gl.createBuffer(); gl.bindBuffer(gl.ARRAY_BUFFER,buf);
    gl.bufferData(gl.ARRAY_BUFFER,new Float32Array([-1,-1, 3,-1, -1,3]),gl.STATIC_DRAW);
    vao=gl.createVertexArray(); gl.bindVertexArray(vao);
    const loc=gl.getAttribLocation(program,'a');
    gl.enableVertexAttribArray(loc); gl.vertexAttribPointer(loc,2,gl.FLOAT,false,0,0);
    uniLoc.t=gl.getUniformLocation(program,'u_t');
    uniLoc.res=gl.getUniformLocation(program,'u_res');
    uniLoc.iter=gl.getUniformLocation(program,'u_iter');
    fitCanvas();
    gl.useProgram(program); gl.bindVertexArray(vao);
    return true;
  }

  function renderFrame(t){
    if(!running) return;
    if(!startT){ startT=t; lastT=t; }
    const dt=t-lastT; lastT=t; frames++;
    uniforms.t=(t-startT)/1000;
    gl.uniform1f(uniLoc.t, uniforms.t);
    gl.uniform2f(uniLoc.res, uniforms.res[0], uniforms.res[1]);
    gl.uniform1i(uniLoc.iter, uniforms.iter);
    gl.drawArrays(gl.TRIANGLES,0,3);

    const inst=1000/dt;
    fpsHistory.push({t, inst});
    while(fpsHistory.length && t-fpsHistory[0].t>1000) fpsHistory.shift();
    const avg=fpsHistory.reduce((a,b)=>a+b.inst,0)/fpsHistory.length;
    $('gpu-fps').textContent=inst.toFixed(1);
    $('gpu-fpsavg').textContent=avg.toFixed(1);
    $('gpu-frames').textContent=frames;
    $('gpu-elapsed').textContent=((t-startT)/1000).toFixed(1);
    if(fpsHistory.length>30 && avg<minFps){ minFps=avg; $('gpu-minfps').textContent=avg.toFixed(1); }
    rafId=requestAnimationFrame(renderFrame);
  }

  function start(){
    if(!gl && !initGL()) return;
    running=true; startT=0; frames=0; fpsHistory=[]; minFps=Infinity;
    $('gpu-start').disabled=true; $('gpu-stop').disabled=false;
    rafId=requestAnimationFrame(renderFrame);
  }
  function stop(){
    running=false; cancelAnimationFrame(rafId);
    $('gpu-start').disabled=false; $('gpu-stop').disabled=true;
  }
  $('gpu-start').addEventListener('click',start);
  $('gpu-stop').addEventListener('click',stop);
  window.addEventListener('beforeunload',stop);
  initGL();
})();
</script>
