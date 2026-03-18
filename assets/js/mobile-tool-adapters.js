(function () {
  const packs = {
    en: {
      mouseTester: {
        title: "Touch alternative",
        body: "Phones and tablets do not expose separate left, right, middle, or wheel events. Use this pad to test taps, double taps, long presses, and swipes instead.",
        pad: "Tap or drag here",
        taps: "Taps",
        doubleTaps: "Double taps",
        longPresses: "Long presses",
        swipes: "Swipes",
        lastLabel: "Last gesture",
        ready: "Ready",
        tap: "Tap detected",
        doubleTap: "Double tap detected",
        longPress: "Long press detected",
        swipe: "Swipe detected"
      },
      ghost: {
        title: "Mobile tap mode",
        body: "On touch devices this checker works as a rapid-tap detector. Very fast repeated taps are flagged the same way as rapid clicks.",
        idle: "Tap here to begin",
        active: "Tap as you normally would"
      },
      latency: {
        title: "Touch response alternative",
        body: "Phones do not expose keyboard events here without an input field. Use the pad below to sample touch event processing delay instead.",
        pad: "Tap here after you press Start",
        activePad: "Tap to capture a sample",
        activeStatus: "Status: Testing (tap the pad)",
        stoppedStatus: "Status: Stopped",
        readyStatus: "Status: Ready",
        logIdle: "Press Start and then tap the pad to capture samples.",
        logActive: "Tap the pad to capture touch-response samples.",
        logEntry: "Tap sample"
      },
      trail: {
        title: "Touch trail enabled",
        body: "Drag your finger inside the area to draw the trail on phones and tablets.",
        active: "Touch trail points: {count}",
        cleared: "Trail cleared. Drag again to start a new path."
      }
    },
    ar: {
      mouseTester: {
        title: "بديل اللمس",
        body: "الهواتف والاجهزة اللوحية لا تعرض احداث النقر الايسر او الايمن او الاوسط او عجلة التمرير بشكل منفصل. استخدم هذه المنطقة لاختبار اللمس والنقر المزدوج والضغط المطول والسحب.",
        pad: "المس او اسحب هنا",
        taps: "لمسات",
        doubleTaps: "نقر مزدوج",
        longPresses: "ضغط مطول",
        swipes: "سحبات",
        lastLabel: "اخر حركة",
        ready: "جاهز",
        tap: "تم تسجيل اللمس",
        doubleTap: "تم تسجيل النقر المزدوج",
        longPress: "تم تسجيل الضغط المطول",
        swipe: "تم تسجيل السحب"
      },
      ghost: {
        title: "وضع اللمس",
        body: "على الاجهزة اللمسية تعمل هذه الاداة ككاشف للنقرات السريعة. التكرارات السريعة جدا يتم تعليمها مثل النقرات السريعة.",
        idle: "المس هنا للبدء",
        active: "المس بشكل طبيعي"
      },
      latency: {
        title: "بديل استجابة اللمس",
        body: "في الهاتف لا تكون احداث لوحة المفاتيح متاحة هنا دائما من دون حقل ادخال. استخدم منطقة اللمس لقياس تاخير معالجة اللمس.",
        pad: "المس هنا بعد البدء",
        activePad: "المس لالتقاط عينة",
        activeStatus: "الحالة: جار الاختبار (المس المنطقة)",
        stoppedStatus: "الحالة: متوقف",
        readyStatus: "الحالة: جاهز",
        logIdle: "اضغط ابدأ ثم المس المنطقة لالتقاط العينات.",
        logActive: "المس المنطقة لالتقاط عينات استجابة اللمس.",
        logEntry: "عينة لمس"
      },
      trail: {
        title: "تم تفعيل مسار اللمس",
        body: "اسحب اصبعك داخل المنطقة لرسم المسار على الهاتف او الجهاز اللوحي.",
        active: "نقاط مسار اللمس: {count}",
        cleared: "تم مسح المسار. اسحب مرة اخرى للبدء من جديد."
      }
    }
  };

  const emojiTrails = {
    sparkles: "✨",
    fire: "🔥",
    star: "⭐",
    sun: "☀️",
    moon: "🌙",
    heart: "❤️",
    lightning: "⚡",
    snowflake: "❄️",
    rocket: "🚀",
    rainbow: "🌈"
  };

  const lang = (document.documentElement.lang || "en").toLowerCase().split("-")[0];
  const pack = packs[lang] || packs.en;
  const rtl = lang === "ar";

  function isPrimaryTouchEnvironment() {
    if (!window.matchMedia) {
      return navigator.maxTouchPoints > 0;
    }

    return window.matchMedia("(pointer: coarse)").matches ||
      (!window.matchMedia("(hover: hover)").matches && navigator.maxTouchPoints > 0);
  }

  function format(template, values) {
    return template.replace(/\{(\w+)\}/g, function (_, key) {
      return values[key] != null ? values[key] : "";
    });
  }

  function createElement(tagName, className, text) {
    const element = document.createElement(tagName);
    if (className) {
      element.className = className;
    }
    if (typeof text === "string") {
      element.textContent = text;
    }
    if (rtl) {
      element.dir = "rtl";
    }
    return element;
  }

  function createAdapter(title, body) {
    const adapter = createElement("div", "kbt-mobile-adapter");
    adapter.appendChild(createElement("h3", "kbt-mobile-adapter__title", title));
    adapter.appendChild(createElement("p", "kbt-mobile-adapter__body", body));
    return adapter;
  }

  function prependLog(target, text, limit) {
    if (!target) {
      return;
    }

    const item = document.createElement("div");
    item.textContent = text;
    if (rtl) {
      item.dir = "rtl";
    }
    target.prepend(item);

    while (target.children.length > limit) {
      target.removeChild(target.lastChild);
    }
  }

  function updateLatencyStats(tool, samples, currentValue) {
    const currentEl = tool.querySelector("#latency-current");
    const avgEl = tool.querySelector("#latency-avg");
    const minEl = tool.querySelector("#latency-min");
    const maxEl = tool.querySelector("#latency-max");
    const countEl = tool.querySelector("#latency-count");

    if (!currentEl || !avgEl || !minEl || !maxEl || !countEl) {
      return;
    }

    currentEl.textContent = typeof currentValue === "number" ? currentValue.toFixed(2) + " ms" : "-- ms";
    if (!samples.length) {
      avgEl.textContent = "-- ms";
      minEl.textContent = "-- ms";
      maxEl.textContent = "-- ms";
      countEl.textContent = "0";
      return;
    }

    const sum = samples.reduce(function (accumulator, value) {
      return accumulator + value;
    }, 0);

    avgEl.textContent = (sum / samples.length).toFixed(2) + " ms";
    minEl.textContent = Math.min.apply(null, samples).toFixed(2) + " ms";
    maxEl.textContent = Math.max.apply(null, samples).toFixed(2) + " ms";
    countEl.textContent = String(samples.length);
  }

  function adaptMouseTester() {
    document.querySelectorAll(".mouse-tester").forEach(function (container) {
      const canvas = container.querySelector("#mouse-canvas");
      const results = container.querySelector(".results");
      const status = container.querySelector(".status");
      const resetButton = container.querySelector("#reset-button");

      if (!canvas || !results || !status || container.dataset.mobileAdapted === "true") {
        return;
      }

      container.dataset.mobileAdapted = "true";
      container.classList.add("kbt-mobile-tool");
      canvas.classList.add("kbt-mobile-hidden");
      results.classList.add("kbt-mobile-hidden");
      status.classList.add("kbt-mobile-hidden");

      const adapter = createAdapter(pack.mouseTester.title, pack.mouseTester.body);
      const pad = createElement("div", "kbt-mobile-adapter__pad", pack.mouseTester.pad);
      pad.setAttribute("role", "button");
      pad.setAttribute("tabindex", "0");
      adapter.appendChild(pad);

      const stats = createElement("div", "kbt-mobile-adapter__stats");
      const labels = [
        ["taps", pack.mouseTester.taps],
        ["doubleTaps", pack.mouseTester.doubleTaps],
        ["longPresses", pack.mouseTester.longPresses],
        ["swipes", pack.mouseTester.swipes]
      ];
      const values = {};

      labels.forEach(function (pair) {
        const stat = createElement("div", "kbt-mobile-adapter__stat");
        stat.appendChild(createElement("span", "kbt-mobile-adapter__stat-label", pair[1]));
        const value = createElement("strong", "kbt-mobile-adapter__stat-value", "0");
        stat.appendChild(value);
        values[pair[0]] = value;
        stats.appendChild(stat);
      });

      adapter.appendChild(stats);
      const lastGesture = createElement("div", "kbt-mobile-adapter__last", pack.mouseTester.lastLabel + ": " + pack.mouseTester.ready);
      adapter.appendChild(lastGesture);
      container.insertBefore(adapter, container.firstChild);

      const state = {
        taps: 0,
        doubleTaps: 0,
        longPresses: 0,
        swipes: 0,
        lastTapTime: 0,
        activePointer: null,
        startX: 0,
        startY: 0,
        moved: false,
        longPressDetected: false,
        timer: null
      };

      function render(label) {
        values.taps.textContent = String(state.taps);
        values.doubleTaps.textContent = String(state.doubleTaps);
        values.longPresses.textContent = String(state.longPresses);
        values.swipes.textContent = String(state.swipes);
        lastGesture.textContent = pack.mouseTester.lastLabel + ": " + label;
      }

      function clearPointerState() {
        if (state.timer) {
          window.clearTimeout(state.timer);
          state.timer = null;
        }
        state.activePointer = null;
        state.moved = false;
        state.longPressDetected = false;
        pad.classList.remove("is-active");
      }

      pad.addEventListener("pointerdown", function (event) {
        if (event.pointerType === "mouse") {
          return;
        }

        state.activePointer = event.pointerId;
        state.startX = event.clientX;
        state.startY = event.clientY;
        state.moved = false;
        state.longPressDetected = false;
        pad.classList.add("is-active");

        if (state.timer) {
          window.clearTimeout(state.timer);
        }

        state.timer = window.setTimeout(function () {
          if (!state.moved && state.activePointer !== null) {
            state.longPressDetected = true;
            state.longPresses += 1;
            render(pack.mouseTester.longPress);
          }
        }, 450);
      });

      pad.addEventListener("pointermove", function (event) {
        if (event.pointerId !== state.activePointer) {
          return;
        }

        const distance = Math.hypot(event.clientX - state.startX, event.clientY - state.startY);
        if (distance > 18) {
          state.moved = true;
          if (state.timer) {
            window.clearTimeout(state.timer);
            state.timer = null;
          }
        }
      });

      pad.addEventListener("pointerup", function (event) {
        if (event.pointerId !== state.activePointer) {
          return;
        }

        const now = performance.now();
        const distance = Math.hypot(event.clientX - state.startX, event.clientY - state.startY);

        if (state.timer) {
          window.clearTimeout(state.timer);
          state.timer = null;
        }

        if (state.longPressDetected) {
          clearPointerState();
          return;
        }

        if (distance > 28) {
          state.swipes += 1;
          render(pack.mouseTester.swipe);
          clearPointerState();
          return;
        }

        state.taps += 1;
        if (state.lastTapTime && now - state.lastTapTime < 320) {
          state.doubleTaps += 1;
          state.lastTapTime = 0;
          render(pack.mouseTester.doubleTap);
        } else {
          state.lastTapTime = now;
          render(pack.mouseTester.tap);
        }

        clearPointerState();
      });

      ["pointercancel", "pointerleave"].forEach(function (eventName) {
        pad.addEventListener(eventName, clearPointerState);
      });

      if (resetButton) {
        resetButton.addEventListener("click", function () {
          state.taps = 0;
          state.doubleTaps = 0;
          state.longPresses = 0;
          state.swipes = 0;
          state.lastTapTime = 0;
          clearPointerState();
          render(pack.mouseTester.ready);
        });
      }
    });
  }

  function adaptGhostTool() {
    document.querySelectorAll(".kbt-ghost-tool").forEach(function (tool) {
      if (tool.dataset.mobileAdapted === "true") {
        return;
      }

      const firstCard = tool.querySelector(".kbt-tool-card");
      const area = tool.querySelector("#ghost-click-area");
      const startButton = tool.querySelector("#ghost-start");
      const resetButton = tool.querySelector("#ghost-reset");

      if (!firstCard || !area || !startButton || !resetButton) {
        return;
      }

      tool.dataset.mobileAdapted = "true";
      firstCard.insertBefore(createAdapter(pack.ghost.title, pack.ghost.body), firstCard.firstChild);
      area.textContent = pack.ghost.idle;

      startButton.addEventListener("click", function () {
        area.textContent = pack.ghost.active;
      });

      resetButton.addEventListener("click", function () {
        area.textContent = pack.ghost.idle;
      });
    });
  }

  function adaptLatencyTool() {
    document.querySelectorAll(".kbt-latency-tool").forEach(function (tool) {
      const grid = tool.querySelector(".kbt-tool-grid");
      const firstCard = grid ? grid.firstElementChild : null;
      const startButton = tool.querySelector("#latency-start");
      const stopButton = tool.querySelector("#latency-stop");
      const clearButton = tool.querySelector("#latency-clear");
      const statusEl = tool.querySelector("#latency-status");
      const logEl = tool.querySelector("#latency-log");

      if (!firstCard || !startButton || !stopButton || !clearButton || !statusEl || !logEl || tool.dataset.mobileAdapted === "true") {
        return;
      }

      tool.dataset.mobileAdapted = "true";
      const adapter = createAdapter(pack.latency.title, pack.latency.body);
      const pad = createElement("div", "kbt-mobile-adapter__pad kbt-mobile-adapter__pad--tap", pack.latency.pad);
      adapter.appendChild(pad);
      firstCard.appendChild(adapter);

      let active = false;
      let samples = [];

      startButton.addEventListener("click", function () {
        active = true;
        pad.textContent = pack.latency.activePad;
        statusEl.textContent = pack.latency.activeStatus;
        logEl.textContent = pack.latency.logActive;
      });

      stopButton.addEventListener("click", function () {
        active = false;
        pad.textContent = pack.latency.pad;
        statusEl.textContent = pack.latency.stoppedStatus;
      });

      clearButton.addEventListener("click", function () {
        samples = [];
        updateLatencyStats(tool, samples);
        pad.textContent = active ? pack.latency.activePad : pack.latency.pad;
        statusEl.textContent = active ? pack.latency.activeStatus : pack.latency.readyStatus;
        logEl.textContent = active ? pack.latency.logActive : pack.latency.logIdle;
      });

      pad.addEventListener("pointerdown", function (event) {
        pad.classList.add("is-active");
        if (event.pointerType === "mouse" || !active) {
          return;
        }

        const latency = Math.max(0, performance.now() - event.timeStamp);
        samples.push(latency);
        updateLatencyStats(tool, samples, latency);
        prependLog(logEl, pack.latency.logEntry + ": " + latency.toFixed(2) + " ms", 10);
      });

      ["pointerup", "pointercancel", "pointerleave"].forEach(function (eventName) {
        pad.addEventListener(eventName, function () {
          pad.classList.remove("is-active");
        });
      });
    });
  }

  function adaptTrailTool() {
    document.querySelectorAll(".game-container").forEach(function (container) {
      const gameArea = container.querySelector("#gameArea");
      const trailSelect = container.querySelector("#trailSelect");
      const clearButton = container.querySelector("#clearTrailBtn");
      const result = container.querySelector("#result");
      const options = container.querySelector(".game-options");

      if (!gameArea || !trailSelect || !options || container.dataset.mobileAdapted === "true") {
        return;
      }

      container.dataset.mobileAdapted = "true";
      container.classList.add("kbt-touch-trail-ready");
      const adapter = createAdapter(pack.trail.title, pack.trail.body);
      adapter.classList.add("kbt-mobile-trail-note");
      options.insertAdjacentElement("afterend", adapter);

      let drawing = false;
      let activePointer = null;
      let touchCount = 0;
      let lastPoint = null;

      function renderResult(message) {
        if (result) {
          result.textContent = message;
        }
      }

      function trimTrails() {
        while (gameArea.querySelectorAll(".trail").length > 100) {
          const firstTrail = gameArea.querySelector(".trail");
          if (!firstTrail) {
            return;
          }
          firstTrail.remove();
        }
      }

      function placeTrail(x, y) {
        const trail = document.createElement("div");
        trail.className = "trail";
        trail.style.left = (x - 15) + "px";
        trail.style.top = (y - 15) + "px";
        trail.innerHTML = emojiTrails[trailSelect.value] || emojiTrails.sparkles;
        gameArea.appendChild(trail);
        trimTrails();
        touchCount += 1;
        renderResult(format(pack.trail.active, { count: touchCount }));
      }

      function getLocalPosition(event) {
        const rect = gameArea.getBoundingClientRect();
        return {
          x: event.clientX - rect.left,
          y: event.clientY - rect.top
        };
      }

      gameArea.addEventListener("pointerdown", function (event) {
        if (event.pointerType === "mouse") {
          return;
        }

        drawing = true;
        activePointer = event.pointerId;
        lastPoint = getLocalPosition(event);
        placeTrail(lastPoint.x, lastPoint.y);
      });

      gameArea.addEventListener("pointermove", function (event) {
        if (!drawing || event.pointerId !== activePointer || event.pointerType === "mouse") {
          return;
        }

        const point = getLocalPosition(event);
        if (!lastPoint || Math.hypot(point.x - lastPoint.x, point.y - lastPoint.y) > 10) {
          placeTrail(point.x, point.y);
          lastPoint = point;
        }
      });

      ["pointerup", "pointercancel", "pointerleave"].forEach(function (eventName) {
        gameArea.addEventListener(eventName, function (event) {
          if (event.pointerId === activePointer) {
            drawing = false;
            activePointer = null;
            lastPoint = null;
          }
        });
      });

      if (clearButton) {
        clearButton.addEventListener("click", function () {
          touchCount = 0;
          renderResult(pack.trail.cleared);
        });
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!isPrimaryTouchEnvironment()) {
      return;
    }

    adaptMouseTester();
    adaptGhostTool();
    adaptLatencyTool();
    adaptTrailTool();
  });
})();
