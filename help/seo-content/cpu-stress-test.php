<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>How The CPU Stress Test Works</h2>
      <p>The test spawns a configurable number of WebWorkers (defaulting to <code>navigator.hardwareConcurrency</code>, which matches your logical core count). Each worker runs a tight <code>while</code> loop that feeds the previous hash into a new <code>crypto.subtle.digest('SHA-256', data)</code> call, so every iteration is dependent on the last and the CPU cannot optimize it away. Every 500&nbsp;ms, each worker posts its operation count and timestamp to the main thread, which converts that to operations per second and sums across threads. SHA-256 was chosen because it is implemented in hardware on every modern CPU, so the throughput ceiling reflects real compute capability rather than JavaScript engine overhead.</p>
    </article>
    <article class="seo-article">
      <h2>What The Test Measures (And What It Doesn't)</h2>
      <p>This tool measures <em>sustained integer throughput</em> across multiple cores. It is a good proxy for workloads like compilation, compression, video encode, and 3D rendering &mdash; all of which are multi-threaded and compute-bound. It is a poor proxy for single-thread gaming performance, memory bandwidth, or GPU-bound work. For a comprehensive picture, pair this test with our <a href="<?php echo url('gpu-stress-test.php'); ?>">GPU stress test</a> (which exercises the graphics pipeline) and <a href="<?php echo url('memory-test.php'); ?>">memory test</a> (which tracks allocation and heap behavior). Numbers from this browser test are not directly comparable to native benchmarks like Cinebench or Geekbench, but they <em>are</em> comparable across runs on the same machine and browser, which is what matters for throttling detection.</p>
    </article>
    <article class="seo-article">
      <h2>Spotting Thermal And Power Throttling</h2>
      <p>The single most informative pattern in this test is a full-speed burst followed by a sustained drop. A thin-and-light laptop will typically hold peak ops/sec for 20-40 seconds, then step down 30-50% as the CPU hits its thermal envelope. Desktop gaming rigs with good cooling should hold steady throughout. If you see throttling on a desktop, check: CPU cooler fans spinning, thermal paste age, case airflow, or an overclock that was stable on short benchmarks but falls over on sustained load. On laptops, plugging in vs battery makes a huge difference; "power saver" profiles cap clocks below thermal limits.</p>
    </article>
    <article class="seo-article">
      <h2>Hybrid CPUs And Per-Thread Variance</h2>
      <p>On Intel 12th-gen and later, Apple Silicon (M1/M2/M3/M4), and various mobile SoCs, not all cores are equal. "Performance" cores (Intel P-cores, Apple P-cores) run at 3-5&nbsp;GHz and handle heavy threads; "efficiency" cores (E-cores) run at 2-3&nbsp;GHz and handle background work. When you spawn one worker per logical core, you will see the P-cores hitting 2-3&times; the ops/sec of the E-cores &mdash; that is working as designed. For the most useful benchmark of a hybrid CPU, limit threads to the P-core count and run again.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('gpu-stress-test.php'); ?>">GPU Stress Test</a></li>
        <li><a href="<?php echo url('memory-test.php'); ?>">Memory Test</a></li>
        <li><a href="<?php echo url('keyboard-polling-rate-test.php'); ?>">Keyboard Polling Rate Test</a></li>
        <li><a href="<?php echo url('latency-checker.php'); ?>">Input Latency Checker</a></li>
      </ul>
    </article>
  </div>
</section>
