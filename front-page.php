<?php
/**
 * Front Page Template for Astrix Media (Home V8)
 */
get_header();
$theme_uri = get_template_directory_uri();
$front_id = (int) get_option('page_on_front');
?>

<!-- ── 6-Hour Intro Animation Gate (Homepage only) ── -->
<div id="astrix-intro-overlay" style="position: fixed; inset: 0; z-index: 9999; background: #0a0805; display: none; opacity: 1; transition: opacity 0.7s ease;">
  <iframe id="astrix-intro-frame" src="<?php echo esc_url($theme_uri . '/assets/astrix-intro.html'); ?>" style="width: 100%; height: 100%; border: none; display: block;" title="Astrix Intro"></iframe>
</div>
<script>
(function () {
  var KEY = 'astrixIntroTimestamp';
  var SIX_HOURS = 6 * 60 * 60 * 1000;
  var last = localStorage.getItem(KEY);
  var now = Date.now();
  if (last && now - parseInt(last, 10) <= SIX_HOURS) return;
  localStorage.setItem(KEY, String(now));
  var overlay = document.getElementById('astrix-intro-overlay');
  overlay.style.display = 'block';
  window.addEventListener('message', function (e) {
    if (e.data === 'introComplete') {
      overlay.style.opacity = '0';
      overlay.style.pointerEvents = 'none';
      setTimeout(function () { overlay.style.display = 'none'; }, 800);
    }
  });
})();
</script>

<!-- ── Prologue · The Belief (Hero Section) ── -->
<div id="hero" style="min-height: 100vh; background: #F5F1EA; overflow: hidden; position: relative;" data-screen-label="Prologue · The Belief">
  <canvas id="hero-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; display: block; opacity: 0; animation: fadeIn 2.4s ease 0.5s forwards;"></canvas>

  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(40px, 7vh, 90px) clamp(28px, 5vw, 72px) 0; align-items: center;">
    <div style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: clamp(26px, 3.6vh, 40px);">
      <div style="display: flex; align-items: center; gap: 14px; opacity: 0; animation: riseIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.35s forwards;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(get_field('hero_eyebrow', $front_id)); ?></span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(42px, 5.2vw, 88px); line-height: 1.03; letter-spacing: -0.035em; max-width: 15ch; text-wrap: balance;">
        <span style="display: block; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.5s forwards;"><?php echo esc_html(get_field('hero_h1_line1', $front_id)); ?></span>
        <span style="display: block; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.68s forwards;"><?php echo esc_html(get_field('hero_h1_line2', $front_id)); ?> <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; letter-spacing: -0.01em; color: #C56A37;"><?php echo esc_html(get_field('hero_h1_emphasis', $front_id)); ?></em> <?php echo esc_html(get_field('hero_h1_line2_end', $front_id)); ?></span>
      </h1>
      <div style="opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.9s forwards; display: flex; flex-direction: column; gap: 16px;">
        <p style="margin: 0; font-size: clamp(17px, 1.5vw, 21px); line-height: 1.5; font-weight: 500; color: #211C17; max-width: 46ch;"><?php echo esc_html(get_field('hero_para', $front_id)); ?></p>
      </div>
      <div style="display: flex; align-items: center; gap: 28px; flex-wrap: wrap; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 1.1s forwards;">
        <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #2A2019, #1A1611); color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;">
          Book a Discovery Session <span style="font-size: 15px;">→</span>
        </a>
        <a href="#engine" class="ax-underline-dark" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; color: #211C17; padding: 6px 0; border: none; border-bottom: 1px solid #C9BFAE; transition: border-color 0.3s ease;">
          See the Engine ↓
        </a>
      </div>
    </div>
    
    <div class="ax-frame" style="grid-column: 8 / span 5; align-self: stretch; border-radius: 4px; min-height: clamp(360px, 62vh, 660px); opacity: 0; animation: fadeIn 1.6s ease 0.7s forwards;">
      <img class="ax-photo" style="animation: kenburns 22s ease-in-out infinite alternate; object-position: 22% 28%;" src="<?php echo esc_url($theme_uri . '/assets/high-technology-digital-graph-presentation-by-businesswoman.webp'); ?>" alt="Reading the signal in the noise">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 18px; border: 1px solid rgba(245,241,234,0.24);"></div>
      <span class="ax-word" style="left: 22px; bottom: 68px; font-size: clamp(46px, 5vw, 84px); color: rgba(245,241,234,0.16);">System</span>
      <div style="position: absolute; left: 26px; right: 26px; bottom: 24px; z-index: 3; display: flex; align-items: center; gap: 10px;">
        <span style="width: 18px; height: 1px; background: #C56A37;"></span>
        <p style="margin: 0; font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(16px, 1.3vw, 20px); line-height: 1.25; color: #F5F1EA;">One engine. Every part load-bearing.</p>
      </div>
    </div>
  </div>

  <div style="position: relative; z-index: 2; display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; padding: clamp(30px, 5vh, 60px) clamp(28px, 5vw, 72px) 40px; opacity: 0; animation: fadeIn 1.4s ease 1.5s forwards;">
    <div style="display: flex; gap: clamp(16px, 2.5vw, 36px); flex-wrap: wrap; font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">
      <span>Strategy</span><span>Brand</span><span>Experience</span><span>Technology</span><span>Growth</span><span>AI</span>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
      <span style="font-size: 10px; letter-spacing: 0.26em; color: #9A8E7D; text-transform: uppercase;">Scroll</span>
      <span style="width: 1px; height: 34px; background: #C0B4A2; display: block; animation: cueDrop 2.6s cubic-bezier(0.65, 0, 0.35, 1) 2s infinite;"></span>
    </div>
  </div>
</div>

<!-- ── Chapter One · The Modern Business Challenge (Video Background) ── -->
<div class="ax-frame" style="position: relative; color: #F5F1EA; min-height: clamp(520px, 78vh, 760px); display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: end; padding: clamp(70px, 12vh, 130px) clamp(28px, 5vw, 72px);" data-screen-label="Chapter One · The Modern Business Challenge">
  <video id="ch1-video" class="ax-photo" src="<?php echo esc_url($theme_uri . '/assets/456247_Bangkok_Thailand_1280x720.mp4'); ?>" autoplay muted loop playsinline webkit-playsinline="true" preload="auto" style="position: absolute; inset: 0; z-index: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 40%; filter: grayscale(0.5) contrast(1.05) brightness(0.9) saturate(0.85);"></video>
  <div style="position: absolute; inset: 0; z-index: 1; pointer-events: none; background: linear-gradient(130deg, rgba(197,106,55,0.34), rgba(150,78,42,0.14) 52%, rgba(30,22,16,0.28));"></div>
  <div style="position: absolute; inset: 0; z-index: 2; pointer-events: none; background: linear-gradient(180deg, rgba(23,19,15,0) 34%, rgba(23,19,15,0.5) 70%, rgba(23,19,15,0.86));"></div>
  <div class="ax-grain-layer"></div>
  <span class="ax-word" style="right: clamp(28px, 5vw, 72px); top: clamp(60px, 12vh, 120px); font-size: clamp(64px, 9vw, 168px); color: rgba(245,241,234,0.12); text-align: right;">Terrain</span>
  <div style="position: relative; z-index: 3; grid-column: 1 / span 10; display: flex; flex-direction: column; gap: 24px;">
    <span style="font-size: 11.5px; letter-spacing: 0.32em; color: rgba(245,241,234,0.7); text-transform: uppercase; font-weight: 500;"><?php echo esc_html(get_field('ch1_eyebrow', $front_id)); ?></span>
    <p style="margin: 0; font-size: clamp(28px, 3.6vw, 54px); line-height: 1.18; letter-spacing: -0.025em; font-weight: 500; max-width: 24ch; text-wrap: balance;"><?php echo wp_kses_post(get_field('ch1_headline', $front_id)); ?></p>
  </div>
</div>

<!-- ── Chapter Two · Why Businesses Stay Invisible ── -->
<section style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Two · Why Businesses Stay Invisible">
  <div style="position: absolute; top: 0; left: 0; right: 0; height: 220px; background: linear-gradient(rgba(26,22,17,0.55), rgba(245,241,234,0)); z-index: 1; pointer-events: none;"></div>
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(120px, 20vh, 220px) clamp(28px, 5vw, 72px) clamp(70px, 11vh, 130px);">
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px;">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(get_field('ch2_eyebrow', $front_id)); ?></span>
    </div>
    <h2 data-reveal style="grid-column: 1 / span 11; margin: clamp(24px, 3vh, 40px) 0 clamp(40px, 7vh, 80px); font-weight: 600; font-size: clamp(38px, 5.4vw, 88px); line-height: 1.04; letter-spacing: -0.035em;"><?php echo wp_kses_post(get_field('ch2_headline', $front_id)); ?></h2>
    
    <div data-reveal class="ax-frame" style="grid-column: 1 / span 5; border-radius: 4px; aspect-ratio: 0.92; min-height: clamp(300px, 44vh, 480px);">
      <img class="ax-photo" style="animation: kenburns 24s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/revolution-still-life-design (2).webp'); ?>" alt="Doing more, being heard less">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.20);"></div>
      <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 68px); color: rgba(245,241,234,0.16);">Louder</span>
    </div>

    <div data-reveal class="ax-frame" style="grid-column: 8 / span 5; margin-top: clamp(40px, 6vh, 80px); border-radius: 4px; aspect-ratio: 1; min-height: clamp(280px, 40vh, 440px);">
      <img class="ax-photo" style="animation: kenburns 28s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/medium-shot-human-silhouette-nature-f54279f8.webp'); ?>" alt="The decision-maker inside the noise">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.20);"></div>
      <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 64px); color: rgba(245,241,234,0.16);">Noise</span>
    </div>

    <div data-reveal style="grid-column: 2 / span 10; margin: clamp(60px, 10vh, 130px) 0 0;">
      <p style="margin: 0; font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; font-size: clamp(30px, 4.4vw, 66px); line-height: 1.16; letter-spacing: -0.01em; color: #211C17; max-width: 20ch; text-wrap: balance;"><?php echo wp_kses_post(get_field('ch2_pullquote', $front_id)); ?></p>
    </div>
  </div>
</section>

<!-- ── Chapter Two (Part B) · The Missing Connection (Continuous Thread SVG) ── -->
<section style="position: relative; background: #EFE9DF; overflow: hidden; border-top: 1px solid rgba(33,28,23,0.05);" data-screen-label="Chapter Two · The Missing Connection">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px);">
    <h2 data-reveal style="grid-column: 1 / span 9; margin: clamp(24px, 3vh, 40px) 0 clamp(20px, 3vh, 32px); font-weight: 600; font-size: clamp(34px, 4.4vw, 68px); line-height: 1.05; letter-spacing: -0.035em;">Strategy, design, technology and growth usually live in different <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">buildings.</em></h2>
    
    <div data-reveal class="handoff-row" style="grid-column: 1 / span 12; display: flex; align-items: stretch; gap: 14px;">
      <div style="flex: 1; display: flex; flex-direction: column; gap: 10px; border: 1px dashed rgba(33,28,23,0.28); border-radius: 4px; padding: clamp(20px, 3vh, 30px) clamp(18px, 2vw, 26px); background: rgba(245,241,234,0.5);">
        <span style="font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">The consultancy</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Strategy</span>
        <span style="font-size: 13px; line-height: 1.55; color: #7A6F63;">A deck nobody downstream reads twice.</span>
      </div>
      <div style="flex: 1; display: flex; flex-direction: column; gap: 10px; border: 1px dashed rgba(33,28,23,0.28); border-radius: 4px; padding: clamp(20px, 3vh, 30px) clamp(18px, 2vw, 26px); background: rgba(245,241,234,0.5);">
        <span style="font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">The agency</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Design</span>
        <span style="font-size: 13px; line-height: 1.55; color: #7A6F63;">Beautiful files, briefed second-hand.</span>
      </div>
      <div style="flex: 1; display: flex; flex-direction: column; gap: 10px; border: 1px dashed rgba(33,28,23,0.28); border-radius: 4px; padding: clamp(20px, 3vh, 30px) clamp(18px, 2vw, 26px); background: rgba(245,241,234,0.5);">
        <span style="font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">The dev shop</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Technology</span>
        <span style="font-size: 13px; line-height: 1.55; color: #7A6F63;">Built to spec, blind to the strategy.</span>
      </div>
      <div style="flex: 1; display: flex; flex-direction: column; gap: 10px; border: 1px dashed rgba(33,28,23,0.28); border-radius: 4px; padding: clamp(20px, 3vh, 30px) clamp(18px, 2vw, 26px); background: rgba(245,241,234,0.5);">
        <span style="font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">The media buyer</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Growth</span>
        <span style="font-size: 13px; line-height: 1.55; color: #7A6F63;">Spending against a story it never heard.</span>
      </div>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; justify-content: center; padding: clamp(18px, 3vh, 30px) 0;">
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #C56A37; font-weight: 500;">↓ The Astrix alternative ↓</span>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; border: 1px solid rgba(33,28,23,0.22); border-radius: 4px; background: #F5F1EA; padding: clamp(24px, 4vh, 38px) clamp(20px, 3vw, 36px); display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
      <div style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Strategy</span><span style="color: #C56A37;">·</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Design</span><span style="color: #C56A37;">·</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Technology</span><span style="color: #C56A37;">·</span>
        <span style="font-size: clamp(17px, 1.6vw, 21px); font-weight: 600; letter-spacing: -0.015em;">Growth</span>
      </div>
      <span style="font-size: 13.5px; color: #7A6F63;">One team. One thread. Nothing lost in translation.</span>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; margin-top: clamp(50px, 8vh, 100px); display: flex; flex-direction: column; gap: 14px;">
      <svg id="thread-svg" viewBox="0 0 1200 260" style="width: 100%; height: auto; display: block;" role="img" aria-label="One continuous thread through eight disciplines">
        <path id="thread-path" d="M70,80 L221,180 L373,80 L524,180 L676,80 L827,180 L979,80 L1130,180" fill="none" stroke="#C56A37" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        <circle cx="70" cy="80" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="221" cy="180" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="373" cy="80" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="524" cy="180" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="676" cy="80" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="827" cy="180" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="979" cy="80" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <circle cx="1130" cy="180" r="5" fill="#F5F1EA" stroke="#211C17" stroke-width="1.2"></circle>
        <text x="70" y="55" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">STRATEGY</text>
        <text x="221" y="212" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">BRAND</text>
        <text x="373" y="55" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">UX</text>
        <text x="524" y="212" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">FRONT-END</text>
        <text x="676" y="55" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">BACK-END</text>
        <text x="827" y="212" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">AI</text>
        <text x="979" y="55" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">MARKETING</text>
        <text x="1130" y="212" text-anchor="middle" class="thread-label" style="font: 500 12px 'Geist Mono', monospace; fill: #7A6F63; letter-spacing: 0.08em;">ANALYTICS</text>
      </svg>
      <span style="font-size: 11px; letter-spacing: 0.28em; color: #9A8E7D; text-transform: uppercase; text-align: center;">One line, never lifted · eight disciplines</span>
    </div>
  </div>
</section>

<!-- ── Chapter Three · The Transformation Engine™ ── -->
<section id="engine" style="position: relative; background: #F5F1EA; overflow: hidden; border-top: 1px solid rgba(33,28,23,0.04);" data-screen-label="Chapter Three · The Transformation Engine">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px) clamp(70px, 11vh, 130px); align-items: start;">
    
    <div style="grid-column: 1 / span 5; display: flex; flex-direction: column; gap: clamp(24px, 4vh, 40px);">
      <div data-reveal style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(get_field('ch3_eyebrow', $front_id)); ?></span>
      </div>
      <h2 data-reveal style="margin: 0; font-weight: 600; font-size: clamp(38px, 4.6vw, 72px); line-height: 1.04; letter-spacing: -0.035em;"><?php echo esc_html(get_field('ch3_headline', $front_id)); ?><span style="font-size: 0.34em; font-weight: 500; vertical-align: super; color: #9A8E7D;">™</span></h2>
      <p data-reveal style="margin: 0; font-size: 15.5px; line-height: 1.72; color: #7A6F63; max-width: 46ch; text-wrap: pretty;"><?php echo esc_html(get_field('ch3_body', $front_id)); ?></p>
      
      <div data-reveal class="ax-frame" style="border-radius: 4px; aspect-ratio: 16/7;">
        <img class="ax-photo" style="filter: grayscale(0.2) contrast(1.0) brightness(1.05);" src="<?php echo esc_url($theme_uri . '/assets/crumpled-papers-with-directional-arrows-pointing-toward-light-bulb-white-background-777d965a.webp'); ?>" alt="Iteration becoming an idea">
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 12px; border: 1px solid rgba(33,28,23,0.08);"></div>
      </div>

      <!-- 7 Stages Accordion -->
      <div data-reveal style="display: flex; flex-direction: column;">
        <?php
        $stage_posts = get_posts(array('post_type' => 'engine_stage', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
        foreach ($stage_posts as $i => $stage_post):
          $caps_lines = array_filter(array_map('trim', explode("\n", get_field('capabilities', $stage_post->ID))));
        ?>
        <div class="stage-item" style="border-top: 1px solid rgba(33,28,23,0.10);">
          <button class="stage-btn" type="button">
            <div style="display: grid; grid-template-columns: 40px 1fr auto; gap: 18px; align-items: baseline; padding: clamp(16px, 2.4vh, 22px) 0;">
              <span class="stage-num" style="font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; color: <?php echo $i === 0 ? '#C56A37' : '#B3A794'; ?>;"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
              <div style="display: flex; align-items: baseline; gap: 14px; flex-wrap: wrap;">
                <span class="stage-name" style="font-size: clamp(19px, 1.9vw, 25px); font-weight: 600; letter-spacing: -0.02em; color: <?php echo $i === 0 ? '#C56A37' : '#211C17'; ?>; transition: color 0.3s ease;"><?php echo esc_html(get_the_title($stage_post)); ?></span>
                <span style="font-size: 12.5px; color: #9A8E7D;"><?php echo esc_html(get_field('tag', $stage_post->ID)); ?></span>
              </div>
              <span class="stage-icon" style="font-size: 18px; color: #C56A37; transition: transform 0.3s ease; display: inline-block;">+</span>
            </div>
          </button>
          <div class="stage-body" style="max-height: <?php echo $i === 0 ? '220px' : '0px'; ?>; overflow: hidden; transition: max-height 0.5s cubic-bezier(0.16,1,0.3,1);">
            <div style="display: flex; flex-direction: column; gap: 12px; padding: 0 0 22px 58px;">
              <p style="margin: 0; font-size: 14.5px; line-height: 1.6; color: #3A3229; max-width: 44ch;"><?php echo esc_html(get_field('line', $stage_post->ID)); ?></p>
              <p style="margin: 0; font-size: 13px; line-height: 1.8; color: #7A6F63;"><?php echo esc_html(implode('  ·  ', $caps_lines)); ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <div style="border-top: 1px solid rgba(33,28,23,0.10);"></div>
      </div>
    </div>

    <!-- Right Live Ecosystem Canvas (Sticky) -->
    <div class="sticky-col" data-reveal style="grid-column: 7 / span 6; position: sticky; top: 10vh; align-self: start;">
      <div style="position: relative; border: 1px solid rgba(33,28,23,0.10); border-radius: 4px; background: linear-gradient(150deg, #F5F1EA, #EFE9DF); overflow: hidden;">
        <canvas id="eco-canvas" data-logo-src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" style="display: block; width: 100%; height: clamp(480px, 76vh, 820px);"></canvas>
        <span style="position: absolute; left: 20px; top: 16px; font-size: 10px; letter-spacing: 0.28em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">The ecosystem, live</span>
        <span style="position: absolute; right: 20px; bottom: 14px; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; color: #B3A794;">Hover a stage</span>
      </div>
    </div>
  </div>
</section>

<!-- ── Chapter Four · What We Build (Working Ecosystems) ── -->
<section style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Four · What We Build">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(70px, 11vh, 130px) clamp(28px, 5vw, 72px);">
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; flex-wrap: wrap; margin-bottom: clamp(36px, 6vh, 64px);">
      <div style="display: flex; flex-direction: column; gap: 24px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="width: 22px; height: 1px; background: #C56A37;"></span>
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(get_field('ch4_eyebrow', $front_id)); ?></span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(34px, 4.4vw, 66px); line-height: 1.04; letter-spacing: -0.035em; max-width: 17ch;"><?php echo wp_kses_post(get_field('ch4_headline', $front_id)); ?></h2>
      </div>
      <p style="margin: 0; max-width: 36ch; font-size: 15px; line-height: 1.68; color: #7A6F63;"><?php echo esc_html(get_field('ch4_body', $front_id)); ?></p>
    </div>

    <div data-reveal class="ax-frame" style="grid-column: 1 / span 12; border-radius: 4px; aspect-ratio: 16/6; min-height: 240px; margin-bottom: clamp(24px, 4vh, 44px);">
      <img class="ax-photo" style="object-position: center 62%; filter: grayscale(0.1) contrast(1.0) saturate(1.05); animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/geometric-paper-shapes-coral-background-f9c5fe8a.webp'); ?>" alt="One sheet, deliberately folded">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.24);"></div>
      <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 64px); color: rgba(245,241,234,0.2);">Craft</span>
    </div>

    <div class="eco-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: rgba(33,28,23,0.10);">
      <?php
      $ecosystem_posts = get_posts(array('post_type' => 'ecosystem', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
      foreach ($ecosystem_posts as $eco_post):
      ?>
      <div data-reveal class="ax-eco-card" style="background: #F5F1EA; padding: clamp(28px, 4.4vh, 44px) clamp(22px, 2.4vw, 34px); display: flex; flex-direction: column; gap: 14px; min-height: 220px; transition: background 0.4s ease;">
        <span style="font-family: 'Instrument Serif', serif; font-style: italic; font-size: 22px; color: #C56A37;"><?php echo esc_html(get_field('numeral', $eco_post->ID)); ?></span>
        <h3 style="margin: 0; font-size: clamp(19px, 1.9vw, 24px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html(get_the_title($eco_post)); ?></h3>
        <p style="margin: 0; font-size: 13.5px; line-height: 1.62; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html(get_field('parts', $eco_post->ID)); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── Chapter Five · The Stack (Technology matrix) ── -->
<section id="stack" style="position: relative; overflow: hidden; background: linear-gradient(150deg, #2A2019, #17130F 62%); color: #F5F1EA;" data-screen-label="Chapter Five · The Stack">
  <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 84% 0%, rgba(197,106,55,0.22), rgba(197,106,55,0) 55%);"></div>
  <div class="ax-grain-layer"></div>
  <img src="<?php echo esc_url($theme_uri . '/assets/celebration-labour-day-with-monochrome-view-woman-working-her-job-ef340072.webp'); ?>" alt="" aria-hidden="true" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.07; z-index: 0; pointer-events: none;">
  <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-02.webp'); ?>" alt="" aria-hidden="true" style="position: absolute; right: clamp(20px, 4vw, 56px); bottom: clamp(20px, 4vw, 56px); width: clamp(80px, 10vw, 150px); opacity: 0.08; z-index: 0; pointer-events: none;">
  
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px);">
    
    <div class="sticky-col" data-reveal style="grid-column: 1 / span 4; position: sticky; top: 12vh; align-self: start; display: flex; flex-direction: column; gap: 22px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: rgba(245,241,234,0.6); text-transform: uppercase;"><?php echo esc_html(get_field('ch5_eyebrow', $front_id)); ?></span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(32px, 4vw, 58px); line-height: 1.05; letter-spacing: -0.035em;"><?php echo wp_kses_post(get_field('ch5_headline', $front_id)); ?></h2>
      <p style="margin: 0; font-size: 15px; line-height: 1.7; color: rgba(245,241,234,0.68); max-width: 38ch; text-wrap: pretty;"><?php echo esc_html(get_field('ch5_body', $front_id)); ?></p>
      
      <div data-reveal class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.3;">
        <img class="ax-photo" style="animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/double-exposure-engineer-holding-blueprints-city-skyline-ai-generated-696183aa.webp'); ?>" alt="Engineering as half the argument">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 14px; border: 1px solid rgba(245,241,234,0.22);"></div>
      </div>
    </div>

    <div style="grid-column: 6 / span 7; display: flex; flex-direction: column;">
      <?php
      $tech_posts = get_posts(array('post_type' => 'tech_capability', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
      foreach ($tech_posts as $tech_post):
        $tech_items = array_filter(array_map('trim', explode("\n", get_field('items', $tech_post->ID))));
      ?>
      <div data-reveal style="display: grid; grid-template-columns: minmax(150px, 1fr) 2.2fr; gap: clamp(16px, 3vw, 36px); padding: clamp(26px, 4vh, 38px) 0; border-top: 1px solid rgba(245,241,234,0.14);">
        <div style="display: flex; flex-direction: column; gap: 8px;">
          <h3 style="margin: 0; font-size: clamp(17px, 1.7vw, 22px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html(get_the_title($tech_post)); ?></h3>
        </div>
        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div style="display: flex; flex-wrap: wrap; gap: 8px;">
            <?php foreach ($tech_items as $item): ?>
            <span style="font-size: 12px; font-weight: 500; letter-spacing: 0.04em; color: rgba(245,241,234,0.85); border: 1px solid rgba(245,241,234,0.22); border-radius: 100px; padding: 7px 14px;"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
          <p style="margin: 0; font-size: 13.5px; line-height: 1.6; color: rgba(245,241,234,0.55); max-width: 44ch;"><?php echo esc_html(get_field('subtitle', $tech_post->ID)); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
      <div style="border-top: 1px solid rgba(245,241,234,0.14);"></div>
    </div>

  </div>
</section>

<!-- ── Chapter Six · Transformations, Not Portfolios ── -->
<section id="work" style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Six · Transformations">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px) clamp(50px, 8vh, 90px);">
    <?php /* Temporarily disabled per request (2026-08-07) — mobile layout issue, kept in place for re-enable, not deleted. Flip `false` to `true` to restore. */ ?>
    <?php if (false): ?>
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px; margin-bottom: clamp(30px, 5vh, 50px);">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(get_field('ch6_eyebrow', $front_id)); ?></span>
    </div>

    <?php
    $proof_posts = get_posts(array(
      'post_type' => 'case_study', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC',
      'meta_query' => array(array('key' => 'show_on_homepage', 'value' => '1', 'compare' => '=')),
    ));
    foreach ($proof_posts as $proof_post):
    ?>
    <a href="<?php echo esc_url(home_url('/work')); ?>" data-reveal class="proof-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: clamp(20px, 3vw, 48px); align-items: center; padding: clamp(30px, 5vh, 48px) 0; border-top: 1px solid rgba(33,28,23,0.12);">
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <span style="font-size: 12px; letter-spacing: 0.14em; text-transform: uppercase; color: #9A8E7D;"><?php echo esc_html(get_field('client', $proof_post->ID)); ?></span>
      </div>
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="font-size: 14px; color: #7A6F63;"><?php echo esc_html(get_field('from_text', $proof_post->ID)); ?></span>
        <span style="color: #C56A37; font-size: 16px;">→</span>
        <span style="font-size: 14px; font-weight: 500; color: #211C17;"><?php echo esc_html(get_field('to_text', $proof_post->ID)); ?></span>
      </div>
      <div style="display: flex; align-items: center; justify-content: flex-end; gap: clamp(20px, 3vw, 40px);">
        <div style="display: flex; flex-direction: column; gap: 2px; text-align: right;">
          <span style="font-size: clamp(24px, 2.4vw, 36px); font-weight: 600; letter-spacing: -0.03em; color: #C56A37;"><?php echo esc_html(get_field('metric', $proof_post->ID)); ?></span>
          <span style="font-size: 12px; color: #9A8E7D;"><?php echo esc_html(get_field('metric_label', $proof_post->ID)); ?></span>
        </div>
        <span style="font-size: 15px; color: #B3A794;">↗</span>
      </div>
    </a>
    <?php endforeach; ?>
    <div style="grid-column: 1 / span 12; border-top: 1px solid rgba(33,28,23,0.12);"></div>
    <?php endif; ?>

    <!-- 3-Column Progression Imagery -->
    <div data-reveal style="grid-column: 1 / span 4; margin-top: clamp(28px, 4vh, 48px); display: flex; flex-direction: column; gap: 10px;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 0.9;">
        <img class="ax-photo" style="animation: kenburns 27s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/urban-double-exposure-collage-concept (1)-6b4ee822.webp'); ?>" alt="Before: a business as silhouette">
        <div class="ax-grain-layer"></div>
      </div>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">01 · Before</span>
    </div>

    <div data-reveal style="grid-column: 5 / span 4; margin-top: clamp(28px, 4vh, 48px); display: flex; flex-direction: column; gap: 10px;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 0.9;">
        <img class="ax-photo" style="animation: kenburns 25s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/urban-double-exposure-collage-concept-8aae1a3e.webp'); ?>" alt="Insight: structure where there was silhouette">
        <div class="ax-grain-layer"></div>
      </div>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">02 · Insight</span>
    </div>

    <div data-reveal style="grid-column: 9 / span 4; margin-top: clamp(28px, 4vh, 48px); display: flex; flex-direction: column; gap: 10px;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 0.9;">
        <img class="ax-photo" style="filter: grayscale(0) contrast(1.02) saturate(1.05); animation: kenburns 24s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/anaglyph-effect-man-with-arrow-f809dd38.webp'); ?>" alt="Impact: momentum, in motion">
        <div class="ax-grain-layer"></div>
        <span class="ax-word" style="left: 16px; bottom: 12px; font-size: clamp(28px, 3vw, 48px); color: rgba(245,241,234,0.2);">Momentum</span>
      </div>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #C56A37;">03 · Impact</span>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; margin-top: clamp(20px, 3vh, 32px);">
      <a href="<?php echo esc_url(home_url('/work')); ?>" class="ax-underline-dark" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; border: none; border-bottom: 1px solid #C9BFAE; padding: 6px 0; transition: border-color 0.3s ease;">All transformations →</a>
      <span style="font-size: 11px; letter-spacing: 0.28em; color: #9A8E7D; text-transform: uppercase;">The thinking behind the work</span>
    </div>
  </div>
</section>

<!-- ── Chapter Seven · Knowledge & Recognition ── -->
<section id="knowledge" style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Seven · Knowledge & Recognition">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(80px, 13vh, 160px) clamp(28px, 5vw, 72px); align-items: start;">
    
    <div data-reveal style="grid-column: 1 / span 4; display: flex; flex-direction: column; gap: 22px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo wp_kses_post(get_field('ch7_eyebrow', $front_id)); ?></span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px, 3.6vw, 54px); line-height: 1.06; letter-spacing: -0.032em;"><?php echo wp_kses_post(get_field('ch7_headline', $front_id)); ?></h2>
      <p style="margin: 0; font-size: 15px; line-height: 1.68; color: #7A6F63; max-width: 36ch;"><?php echo esc_html(get_field('ch7_body', $front_id)); ?></p>
      
      <div style="display: flex; flex-direction: column; gap: 6px; margin-top: 10px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 16px;">
        <span style="font-size: 10.5px; letter-spacing: 0.28em; text-transform: uppercase; color: #B3A794; font-weight: 500;">Recognition</span>
        <div style="display: flex; align-items: center; gap: 12px;">
          <img src="<?php echo esc_url($theme_uri . '/assets/still-life-small-decorative-objects (1)-d3b82e55.webp'); ?>" alt="The plinth, waiting" style="width: 56px; height: 70px; object-fit: cover; border-radius: 3px; border: 1px solid rgba(33,28,23,0.12);">
          <span style="font-size: 13.5px; line-height: 1.55; color: #9A8E7D;">Shelf space reserved. Awards and press land here.</span>
        </div>
      </div>
    </div>

    <a href="<?php echo esc_url(home_url('/perspective')); ?>" data-reveal style="grid-column: 6 / span 4; display: flex; flex-direction: column; gap: 18px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: clamp(24px, 4vh, 36px);">
      <span style="font-size: 12px; letter-spacing: 0.14em; text-transform: uppercase; color: #9A8E7D;"><?php echo esc_html(get_field('essay_kicker', $front_id)); ?></span>
      <h3 style="margin: 0; font-weight: 600; font-size: clamp(26px, 3vw, 46px); line-height: 1.08; letter-spacing: -0.028em; max-width: 20ch; text-wrap: balance;"><?php echo wp_kses_post(get_field('essay_headline', $front_id)); ?></h3>
      <span style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; color: #211C17;">Read the essay <span>↗</span></span>
    </a>

    <div data-reveal class="ax-frame" style="grid-column: 10 / span 3; border-radius: 4px; aspect-ratio: 0.67;">
      <img class="ax-photo" style="filter: grayscale(0.1) contrast(1.0) saturate(1.05); animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/side-view-man-posing-with-sunflowers-610791cf.webp'); ?>" alt="Publishing as practice">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 14px; border: 1px solid rgba(245,241,234,0.22);"></div>
    </div>
  </div>
</section>

<!-- ── Animated Spinning Astrix Mark ── -->
<div data-reveal style="display: flex; align-items: center; justify-content: center; padding: clamp(44px, 7vh, 84px) 0; background: #F5F1EA;">
  <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="" aria-hidden="true" data-spin style="width: 54px; height: 54px; object-fit: contain; transform: rotate(-60deg); transition: transform 1.4s cubic-bezier(0.16,1,0.3,1);">
</div>

<!-- ── Epilogue · The Discovery Session (CTA) ── -->
<section id="contact" style="position: relative;" data-screen-label="Epilogue · The Discovery Session">
  <div style="position: relative; z-index: 2; background: linear-gradient(150deg, #2A2019, #17130F 60%); color: #F5F1EA; overflow: hidden;">
    <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 88% 0%, rgba(197,106,55,0.28), rgba(197,106,55,0) 55%);"></div>
    
    <div class="grid-12" style="position: relative; z-index: 1; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 16vh, 170px) clamp(28px, 5vw, 72px);">
      <div data-reveal style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: clamp(28px, 5vh, 48px);">
        <span style="font-size: 11.5px; letter-spacing: 0.32em; color: #9A8E7D; text-transform: uppercase; font-weight: 500;"><?php echo esc_html(get_field('epilogue_eyebrow', $front_id)); ?></span>
        <p style="margin: 0; font-size: clamp(34px, 4.6vw, 68px); line-height: 1.08; letter-spacing: -0.03em; font-weight: 500; max-width: 18ch; text-wrap: balance;"><?php echo wp_kses_post(get_field('epilogue_headline', $front_id)); ?></p>
        <p style="margin: 0; font-size: 15.5px; line-height: 1.7; color: rgba(245,241,234,0.72); max-width: 52ch;"><?php echo esc_html(get_field('epilogue_body', $front_id)); ?></p>
        <div style="display: flex; align-items: center; gap: 28px; flex-wrap: wrap; margin-top: 4px;">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-light" style="display: inline-flex; align-items: center; gap: 12px; background: #F5F1EA; color: #211C17; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">
            Book a Discovery Session <span style="font-size: 15px;">→</span>
          </a>
          <a href="mailto:info@astrixmedia.in" class="ax-underline-light" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; color: #F5F1EA; padding: 6px 0; border: none; border-bottom: 1px solid rgba(245,241,234,0.28); transition: border-color 0.3s ease;">
            info@astrixmedia.in
          </a>
        </div>
      </div>

      <div data-reveal class="ax-frame" style="grid-column: 9 / span 4; border-radius: 4px; aspect-ratio: 0.78; min-height: clamp(320px, 46vh, 540px);">
        <img class="ax-photo" style="filter: grayscale(0.05) contrast(1.02) saturate(1.05); animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/magnific_a-burnt-orange-umbrella-s_kLCvZVE16B-f346e31a.webp'); ?>" alt="The one the crowd notices">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.22);"></div>
        <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 64px); color: rgba(245,241,234,0.22);">Chosen</span>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
