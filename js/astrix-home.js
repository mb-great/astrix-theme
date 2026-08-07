/**
 * Astrix Media — Homepage Interactive Engine
 * Pure Vanilla JavaScript conversion of DCLogic runtime
 */

(function () {
  'use strict';

  // Global accent color
  const ACCENT = '#C56A37';

  // Stage dataset for accordion & ecosystem canvas
  const stageData = [
    {
      num: '01',
      name: 'Discover',
      tag: 'Evidence before opinion',
      line: 'We start by knowing more than the room, about your buyers, your category, and where value is leaking.',
      caps: ['Research', 'Customer insight', 'Market & competitor analysis', 'Business audit']
    },
    {
      num: '02',
      name: 'Define',
      tag: 'Decide the ground you win on',
      line: 'Positioning is a decision, not a document. We make it, with you, before anything gets made.',
      caps: ['Positioning', 'Brand strategy', 'Messaging', 'Business direction']
    },
    {
      num: '03',
      name: 'Design',
      tag: 'Make the strategy visible',
      line: 'Identity, experience and content that carry the decision into the world, recognisably, everywhere.',
      caps: ['Identity', 'UI/UX & experience design', 'Campaigns', 'Content & packaging']
    },
    {
      num: '04',
      name: 'Develop',
      tag: 'Engineer it for real life',
      line: 'The design becomes software, fast, accessible, maintainable, and owned by your team.',
      caps: ['Websites & web apps', 'Front-end engineering', 'Back-end & APIs', 'Commerce & CMS']
    },
    {
      num: '05',
      name: 'Deploy',
      tag: 'Reach the right people',
      line: 'Distribution designed like the product: deliberate channels, native messages, honest budgets.',
      caps: ['SEO', 'Google & Meta ads', 'Social & content distribution', 'Email & lifecycle']
    },
    {
      num: '06',
      name: 'Optimise',
      tag: 'Let the data argue',
      line: 'One version of the truth, then relentless small corrections, the unglamorous part that compounds.',
      caps: ['Analytics', 'Conversion optimisation', 'Automation', 'CRM & journeys']
    },
    {
      num: '07',
      name: 'Scale',
      tag: 'Compound what works',
      line: 'AI and automation applied where they multiply judgement, not replace it.',
      caps: ['AI integration', 'Marketing automation', 'Performance intelligence', 'Continuous innovation']
    }
  ];

  let currentStage = 0;
  let onStageChangeCallback = null;

  function hexA(hex, a) {
    const n = parseInt(hex.slice(1), 16);
    return 'rgba(' + ((n >> 16) & 255) + ',' + ((n >> 8) & 255) + ',' + (n & 255) + ',' + a + ')';
  }

  /* ─────────────────────────────────────────────────────────────
     1. Hero Particle Canvas Animation
     ───────────────────────────────────────────────────────────── */
  function initHeroCanvas() {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let W = 0, H = 0, dpr = Math.min(window.devicePixelRatio || 1, 2);
    let pts = [], ctr = {}, spk = {};
    const mouse = { x: 0.5, y: 0.5, tx: 0.5, ty: 0.5 };
    let scrollOrder = 0;
    let once = false;

    function build() {
      const count = 110;
      const cx = W * 0.76, cy = H * 0.44;
      const SPOKE = Math.PI / 3, PIN = 0.26;
      const maxR = Math.min(W, H) * 0.60, gap0 = maxR * 0.14;
      pts = [];
      for (let i = 0; i < count; i++) {
        const k = i % 6, th = k * SPOKE + PIN;
        const along = gap0 + Math.pow((Math.floor(i / 6) % 8) / 8 + Math.random() * 0.14, 0.9) * (maxR - gap0);
        const tan = (Math.random() - 0.5) * (maxR * 0.05);
        pts.push({
          hx: W * (0.30 + Math.random() * 0.72),
          hy: H * (Math.random() * 1.02 - 0.02),
          ox: cx + Math.sin(th) * along + Math.cos(th) * tan,
          oy: cy - Math.cos(th) * along * 0.9 + Math.sin(th) * tan,
          ph: Math.random() * Math.PI * 2,
          sp: 0.3 + Math.random() * 0.7,
          r: 1 + Math.random() * 1.6,
          warm: Math.random() < 0.055
        });
      }
      ctr = { cx, cy };
      spk = { SPOKE, PIN, maxR, gap0 };
    }

    function resize() {
      const r = canvas.getBoundingClientRect();
      W = r.width; H = r.height;
      canvas.width = W * dpr; canvas.height = H * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      build();
    }

    resize();
    window.addEventListener('resize', resize);
    window.addEventListener('mousemove', (e) => {
      mouse.tx = e.clientX / window.innerWidth;
      mouse.ty = e.clientY / window.innerHeight;
    });
    window.addEventListener('scroll', () => {
      scrollOrder = Math.min(window.scrollY / Math.max(window.innerHeight * 0.9, 1), 1);
    }, { passive: true });

    let t = 0;
    function frame() {
      requestAnimationFrame(frame);
      const crect = canvas.getBoundingClientRect();
      if ((crect.bottom < 0 || crect.top > window.innerHeight) && once) return;

      t += reduced ? 0 : 0.004;
      mouse.x += (mouse.tx - mouse.x) * 0.04;
      mouse.y += (mouse.ty - mouse.y) * 0.04;
      const px = (mouse.x - 0.5) * 18, py = (mouse.y - 0.5) * 14;
      const baseOrder = 0.35 + 0.15 * Math.sin(t * 0.5);
      const order = Math.min(baseOrder + scrollOrder * (1 - baseOrder), 1);

      ctx.clearRect(0, 0, W, H);
      const pos = [];
      for (let i = 0; i < pts.length; i++) {
        const p = pts[i], wob = reduced ? 0 : 1;
        const dx = Math.sin(t * p.sp + p.ph) * 14 * wob, dy = Math.cos(t * p.sp * 0.8 + p.ph) * 12 * wob;
        const local = Math.max(0, Math.min(1, order * 1.35 - (1 - p.hx / W) * 0.45));
        pos.push({
          x: p.hx + (p.ox - p.hx) * local + dx * (1 - local * 0.7) + px,
          y: p.hy + (p.oy - p.hy) * local + dy * (1 - local * 0.7) + py,
          p
        });
      }

      const { cx, cy } = ctr, { SPOKE, PIN, maxR, gap0 } = spk;
      for (let k = 0; k < 6; k++) {
        const th = k * SPOKE + PIN;
        ctx.beginPath();
        ctx.moveTo(cx + Math.sin(th) * gap0 + px, cy - Math.cos(th) * gap0 * 0.9 + py);
        ctx.lineTo(cx + Math.sin(th) * maxR + px, cy - Math.cos(th) * maxR * 0.9 + py);
        ctx.strokeStyle = 'rgba(33,28,23,' + (0.045 * order) + ')';
        ctx.setLineDash([2, 7]);
        ctx.lineWidth = 1;
        ctx.stroke();
        ctx.setLineDash([]);
      }

      for (let i = 0; i < pos.length; i++) {
        const jmax = Math.min(pos.length, i + 24);
        for (let j = i + 1; j < jmax; j++) {
          const a = pos[i], b = pos[j];
          const ddx = a.x - b.x, ddy = a.y - b.y, d2 = ddx * ddx + ddy * ddy;
          if (d2 < 110 * 110) {
            ctx.beginPath();
            ctx.moveTo(a.x, a.y);
            ctx.lineTo(b.x, b.y);
            ctx.strokeStyle = 'rgba(33,28,23,' + ((1 - Math.sqrt(d2) / 110) * 0.10) + ')';
            ctx.lineWidth = 1;
            ctx.stroke();
          }
        }
      }

      for (const q of pos) {
        ctx.beginPath();
        ctx.arc(q.x, q.y, q.p.warm ? q.p.r + 0.8 : q.p.r, 0, Math.PI * 2);
        ctx.fillStyle = q.p.warm ? hexA(ACCENT, 0.85) : 'rgba(33,28,23,0.34)';
        ctx.fill();
        if (q.p.warm) {
          ctx.beginPath();
          ctx.arc(q.x, q.y, q.p.r + 5, 0, Math.PI * 2);
          ctx.strokeStyle = hexA(ACCENT, 0.25);
          ctx.lineWidth = 1;
          ctx.stroke();
        }
      }

      const grad = ctx.createLinearGradient(0, 0, W * 0.62, 0);
      grad.addColorStop(0, 'rgba(245,241,234,0.92)');
      grad.addColorStop(1, 'rgba(245,241,234,0)');
      ctx.fillStyle = grad;
      ctx.fillRect(0, 0, W * 0.62, H);
      once = true;
    }
    frame();
  }

  /* ─────────────────────────────────────────────────────────────
     2. Chapter Three Live Ecosystem Canvas Animation
     ───────────────────────────────────────────────────────────── */
  function initEcoCanvas() {
    const canvas = document.getElementById('eco-canvas');
    const section = document.getElementById('engine');
    if (!canvas || !section) return;
    const ctx = canvas.getContext('2d');
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let W = 0, H = 0, dpr = Math.min(window.devicePixelRatio || 1, 2);

    function resize() {
      const r = canvas.getBoundingClientRect();
      W = r.width; H = r.height;
      canvas.width = W * dpr; canvas.height = H * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }
    resize();
    window.addEventListener('resize', resize);

    const logo = new Image();
    const logoSrc = canvas.getAttribute('data-logo-src') || 'assets/Astrix Logo-01.webp';
    logo.src = logoSrc;
    let logoReady = false;
    logo.onload = () => { logoReady = true; };

    const mouse = { x: -1, y: -1 };
    window.addEventListener('mousemove', (e) => {
      const r = canvas.getBoundingClientRect();
      mouse.x = e.clientX - r.left;
      mouse.y = e.clientY - r.top;
    });

    const names = stageData.map((s) => s.name.toUpperCase());
    const capCounts = stageData.map((s) => s.caps.length);
    const smooth = new Array(7).fill(0);
    let t = 0;
    let ecoHoverLock = false;
    let ecoOnce = false;

    function loop() {
      requestAnimationFrame(loop);
      const sr = section.getBoundingClientRect();
      const vh = window.innerHeight;
      if (sr.bottom < 0 || sr.top > vh) return;

      const prog = Math.max(0, Math.min(1, (vh * 0.85 - sr.top) / (vh * 0.9)));
      t += reduced ? 0 : 0.005;
      const ink = (a) => 'rgba(33,28,23,' + a + ')';
      const cx = W * 0.5, cy = H * 0.5;
      const R = Math.min(W, H) * 0.34;
      ctx.clearRect(0, 0, W, H);

      const nodes = [];
      for (let i = 0; i < 7; i++) {
        const a = -Math.PI / 2 + (i / 7) * Math.PI * 2;
        nodes.push({ x: cx + Math.cos(a) * R, y: cy + Math.sin(a) * R, a, i });
      }

      let hover = -1;
      for (const nd of nodes) {
        if (Math.hypot(mouse.x - nd.x, mouse.y - nd.y) < 34) hover = nd.i;
      }
      const sel = hover >= 0 ? hover : currentStage;
      if (hover >= 0 && currentStage !== hover && !ecoHoverLock) {
        ecoHoverLock = true;
        setStage(hover);
        setTimeout(() => { ecoHoverLock = false; }, 120);
      }

      for (let i = 0; i < 7; i++) {
        const seq = Math.max(0, Math.min(1, prog * 5 - i * 0.5));
        smooth[i] += ((sel === i ? 1 : seq * 0.55) - smooth[i]) * 0.1;
      }

      // Ring connections
      for (let i = 0; i < 7; i++) {
        const a = nodes[i], b = nodes[(i + 1) % 7];
        const act = Math.min(smooth[i], smooth[(i + 1) % 7]);
        ctx.beginPath(); ctx.moveTo(a.x, a.y);
        const mx = (a.x + b.x) / 2 + (cx - (a.x + b.x) / 2) * 0.12, my = (a.y + b.y) / 2 + (cy - (a.y + b.y) / 2) * 0.12;
        ctx.quadraticCurveTo(mx, my, b.x, b.y);
        ctx.strokeStyle = hexA(ACCENT, 0.12 + 0.3 * act);
        ctx.lineWidth = 1;
        ctx.stroke();
      }

      // Spokes to centre
      for (const nd of nodes) {
        ctx.beginPath(); ctx.moveTo(cx, cy); ctx.lineTo(nd.x, nd.y);
        ctx.strokeStyle = ink(0.05 + 0.10 * smooth[nd.i]);
        ctx.setLineDash([2, 6]);
        ctx.lineWidth = 1;
        ctx.stroke();
        ctx.setLineDash([]);
      }

      // Travelling pulse around the cycle
      if (!reduced && prog > 0.3) {
        const tp = (t * 0.25) % 1, seg = Math.floor(tp * 7), f = tp * 7 - seg;
        const a = nodes[seg], b = nodes[(seg + 1) % 7];
        const sx = a.x + (b.x - a.x) * f, sy = a.y + (b.y - a.y) * f;
        ctx.beginPath(); ctx.arc(sx, sy, 2.6, 0, Math.PI * 2); ctx.fillStyle = hexA(ACCENT, 0.85); ctx.fill();
        ctx.beginPath(); ctx.arc(sx, sy, 8, 0, Math.PI * 2); ctx.fillStyle = hexA(ACCENT, 0.12); ctx.fill();
      }

      // Centre logo watermark
      const gap0 = R * 0.22;
      if (logoReady) {
        const s = gap0 * 2.2 * (1 + (reduced ? 0 : 0.04 * Math.sin(t * 2)));
        ctx.save();
        ctx.globalAlpha = 0.45 + 0.55 * prog;
        ctx.drawImage(logo, cx - s / 2, cy - s / 2, s, s);
        ctx.restore();
      }
      ctx.textAlign = 'center';
      ctx.font = '600 10px Geist, sans-serif';
      ctx.fillStyle = ink(0.55);
      ctx.fillText('BUSINESS STRATEGY', cx, cy + gap0 + 18);

      // Stage nodes + orbiting capability dots
      for (const nd of nodes) {
        const act = smooth[nd.i], isSel = sel === nd.i;
        for (let c = 0; c < capCounts[nd.i]; c++) {
          const oa = nd.a + t * 0.35 + (c / capCounts[nd.i]) * Math.PI * 2;
          const orad = 20 + 6 * act;
          const oxp = nd.x + Math.cos(oa) * orad, oyp = nd.y + Math.sin(oa) * orad;
          ctx.beginPath(); ctx.arc(oxp, oyp, 1.6, 0, Math.PI * 2);
          ctx.fillStyle = isSel ? hexA(ACCENT, 0.7) : ink(0.18 + 0.2 * act);
          ctx.fill();
        }
        const rad = 5 + 3 * act;
        ctx.beginPath(); ctx.arc(nd.x, nd.y, rad + 10 * act, 0, Math.PI * 2);
        ctx.fillStyle = hexA(ACCENT, 0.08 * act); ctx.fill();
        ctx.beginPath(); ctx.arc(nd.x, nd.y, rad, 0, Math.PI * 2);
        ctx.fillStyle = '#F5F1EA'; ctx.fill();
        ctx.strokeStyle = isSel ? hexA(ACCENT, 1) : ink(0.35 + 0.3 * act); ctx.lineWidth = 1.4; ctx.stroke();
        ctx.beginPath(); ctx.arc(nd.x, nd.y, 1.5, 0, Math.PI * 2);
        ctx.fillStyle = isSel ? hexA(ACCENT, 1) : ink(0.5); ctx.fill();
        const lx = nd.x + Math.cos(nd.a) * (rad + 24), ly = nd.y + Math.sin(nd.a) * (rad + 24);
        ctx.font = isSel ? '600 11.5px Geist, sans-serif' : '500 10.5px Geist, sans-serif';
        ctx.fillStyle = isSel ? hexA(ACCENT, 1) : ink(0.45 + 0.3 * act);
        ctx.fillText(names[nd.i], lx, ly + 3.5);
      }
      ctx.textAlign = 'start';
      ecoOnce = true;
    }
    loop();
  }

  /* ─────────────────────────────────────────────────────────────
     3. Continuous SVG Thread Scroll Animation
     ───────────────────────────────────────────────────────────── */
  function initThread() {
    const path = document.getElementById('thread-path');
    const svg = document.getElementById('thread-svg');
    if (!path || !svg || !path.getTotalLength) return;

    const L = path.getTotalLength();
    path.style.strokeDasharray = String(L);
    path.style.strokeDashoffset = String(L);

    let raf = 0;
    const onScroll = () => {
      const r = svg.getBoundingClientRect();
      const vh = window.innerHeight;
      const p = Math.max(0, Math.min(1, (vh * 0.9 - r.top) / (vh * 0.7)));
      path.style.strokeDashoffset = String(L * (1 - p));
    };

    onScroll();
    window.addEventListener('scroll', () => {
      if (raf) return;
      raf = requestAnimationFrame(() => {
        raf = 0;
        onScroll();
      });
    }, { passive: true });
  }

  /* ─────────────────────────────────────────────────────────────
     4. Chapter Three Stage Accordion
     ───────────────────────────────────────────────────────────── */
  function setStage(idx) {
    currentStage = idx;
    const items = document.querySelectorAll('.stage-item');
    items.forEach((item, i) => {
      const btn = item.querySelector('.stage-btn');
      const body = item.querySelector('.stage-body');
      const num = item.querySelector('.stage-num');
      const name = item.querySelector('.stage-name');
      const icon = item.querySelector('.stage-icon');

      const isCurrent = i === currentStage;
      if (isCurrent) {
        body.style.maxHeight = '220px';
        if (icon) icon.style.transform = 'rotate(45deg)';
        if (num) num.style.color = ACCENT;
        if (name) name.style.color = ACCENT;
      } else {
        body.style.maxHeight = '0px';
        if (icon) icon.style.transform = 'rotate(0deg)';
        if (num) num.style.color = '#B3A794';
        if (name) name.style.color = '#211C17';
      }
    });
  }

  function initAccordion() {
    const items = document.querySelectorAll('.stage-item');
    items.forEach((item, i) => {
      const btn = item.querySelector('.stage-btn');
      if (btn) {
        btn.addEventListener('click', () => {
          setStage(currentStage === i ? -1 : i);
        });
      }
    });
    setStage(0); // Default open first stage
  }

  /* ─────────────────────────────────────────────────────────────
     5. Scroll Reveal System
     ───────────────────────────────────────────────────────────── */
  function initReveal() {
    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            const spins = entry.target.querySelectorAll('[data-spin]');
            spins.forEach((sp) => {
              sp.style.transform = 'rotate(0deg)';
            });
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

      els.forEach((el) => observer.observe(el));
    } else {
      els.forEach((el) => el.classList.add('revealed'));
    }
  }

  /* ─────────────────────────────────────────────────────────────
     6. Video Autoplay Safeguard
     ───────────────────────────────────────────────────────────── */
  function initVideo() {
    const vid = document.getElementById('ch1-video');
    if (!vid) return;

    // iOS Safari needs these set as JS properties too, not just HTML attrs,
    // and is unreliable about autoplaying elements that aren't yet visible.
    vid.muted = true;
    vid.defaultMuted = true;
    vid.playsInline = true;
    vid.setAttribute('webkit-playsinline', 'true');

    const attemptPlay = () => {
      const p = vid.play();
      if (p && p.catch) p.catch(() => {});
    };

    attemptPlay();

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && vid.paused) attemptPlay();
        });
      }, { threshold: 0.1 });
      io.observe(vid);
    }

    // Last-resort fallback: some iOS configurations (e.g. Low Power Mode)
    // block autoplay entirely until a genuine user gesture occurs anywhere.
    const unlockOnGesture = () => {
      if (vid.paused) attemptPlay();
      window.removeEventListener('touchstart', unlockOnGesture);
      window.removeEventListener('click', unlockOnGesture);
    };
    window.addEventListener('touchstart', unlockOnGesture, { once: true, passive: true });
    window.addEventListener('click', unlockOnGesture, { once: true });
  }

  /* ─────────────────────────────────────────────────────────────
     7. Magnetic CTA & Mobile Navigation
     ───────────────────────────────────────────────────────────── */
  function initNav() {
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      document.querySelectorAll('[data-magnetic]').forEach((el) => {
        el.addEventListener('mousemove', (e) => {
          const r = el.getBoundingClientRect();
          const x = (e.clientX - r.left - r.width / 2) * 0.28;
          const y = (e.clientY - r.top - r.height / 2) * 0.4;
          el.style.transform = 'translate(' + x + 'px,' + y + 'px)';
        });
        el.addEventListener('mouseleave', () => {
          el.style.transform = 'translate(0,0)';
        });
      });
    }

    const burger = document.getElementById('nav-burger');
    const sheet = document.getElementById('nav-sheet');
    const closeBtn = document.getElementById('nav-close');
    if (!burger || !sheet) return;

    const openMenu = () => {
      sheet.classList.add('is-open');
      burger.setAttribute('aria-expanded', 'true');
      burger.setAttribute('aria-label', 'Close menu');
      document.body.classList.add('nav-open');
    };

    const closeMenu = () => {
      sheet.classList.remove('is-open');
      burger.setAttribute('aria-expanded', 'false');
      burger.setAttribute('aria-label', 'Open menu');
      document.body.classList.remove('nav-open');
    };

    burger.addEventListener('click', () => {
      sheet.classList.contains('is-open') ? closeMenu() : openMenu();
    });

    if (closeBtn) closeBtn.addEventListener('click', closeMenu);

    // Close when a destination is chosen
    sheet.querySelectorAll('a').forEach((a) => a.addEventListener('click', closeMenu));

    // Escape closes
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && sheet.classList.contains('is-open')) closeMenu();
    });

    // Never leave the sheet stranded open when resizing up to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth > 900 && sheet.classList.contains('is-open')) closeMenu();
    });
  }

  /* ── Boot on DOM ready ── */
  function boot() {
    initHeroCanvas();
    initEcoCanvas();
    initThread();
    initAccordion();
    initReveal();
    initVideo();
    initNav();
  }

  // This script is enqueued in the footer. If it executes AFTER DOMContentLoaded
  // has already fired (common on live/cached/slow connections), a plain
  // addEventListener('DOMContentLoaded') never fires and NOTHING initialises —
  // leaving all 40 [data-reveal] sections stuck at opacity:0, i.e. a blank page.
  // Observed on astrixmedia.in 2026-08-07. Always gate on readyState.
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
