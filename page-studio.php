<?php
/**
 * Template Name: Studio
 * Ported from ref/Astrix Studio.dc.html
 */
global $astrix_nav_active;
$astrix_nav_active = 'studio';
get_header();
$theme_uri = get_template_directory_uri();

$beliefs = array(
  array('n' => '01', 'title' => 'Value that isn’t understood rarely gets chosen.', 'body' => 'Most businesses don’t have a quality problem. They have a clarity problem. We exist to close the distance between the value a company creates and the value its market actually perceives.'),
  array('n' => '02', 'title' => 'Attention is cheap. Preference is earned.', 'body' => 'Anyone can buy a moment of visibility. We build the understanding, trust and memory that make a brand the default choice — long after the campaign ends.'),
  array('n' => '03', 'title' => 'Brands are built by systems, not campaigns.', 'body' => 'One-off wins fade. We design connected systems across strategy, story, experience and growth so that being chosen compounds into momentum.'),
);

$principles = array(
  array('n' => 'i', 'title' => 'Strategy leads the work.', 'body' => 'We define the ground you win on before a single pixel is drawn. Direction first, decoration never.'),
  array('n' => 'ii', 'title' => 'Less, but sharper.', 'body' => 'We remove everything that doesn’t earn its place. Clarity is a design decision, not an afterthought.'),
  array('n' => 'iii', 'title' => 'One team, one standard.', 'body' => 'Brand, creative, experience and growth sit under one roof — so coherence is never lost in a handoff.'),
  array('n' => 'iv', 'title' => 'Accountable to outcomes.', 'body' => 'We translate stories people remember into growth people can measure. Impressions aren’t the goal; preference is.'),
);

$founders = array(
  array('name' => 'Bhupesh Kaushal', 'role' => 'Co-Founder & Creative Strategist', 'ph' => '[Founder portrait]', 'bio' => 'Bhupesh sets the direction — the positioning, the narrative and the creative standard that make a brand impossible to overlook. He protects the idea from the moment it’s born to the moment it ships.'),
  array('name' => 'Sunny Sehgal', 'role' => 'Co-Founder & Business Head', 'ph' => '[Founder portrait]', 'bio' => 'Sunny turns direction into results — owning growth, partnerships and delivery. He protects the outcome, making sure the work doesn’t just look right, but moves the numbers that matter.'),
);

$journey = array(
  array('step' => 'Move 01', 'title' => 'Listen', 'body' => 'We start with your goals, not our services. A sharp diagnosis of where you are and where preference is leaking.'),
  array('step' => 'Move 02', 'title' => 'Position', 'body' => 'We define the ownable ground you win on — the reason to be chosen before anyone compares price.'),
  array('step' => 'Move 03', 'title' => 'Build', 'body' => 'Strategy becomes story, identity, experience and growth — one connected system, made with care.'),
  array('step' => 'Move 04', 'title' => 'Compound', 'body' => 'We measure, learn and sharpen — turning first wins into durable, compounding momentum.'),
);

$faqs = array(
  array('q' => 'What does Astrix actually do?', 'a' => 'We build preference. Across strategy, creative, digital experience and growth, we make the value a business creates impossible to overlook — and easy to choose.'),
  array('q' => 'How is a studio different from an agency?', 'a' => 'Agencies staff a brief. A studio holds a standard. The same senior team stays with the work end to end, so nothing is handed off and nothing loses coherence between what you say and what people choose.'),
  array('q' => 'Do you only work with big brands?', 'a' => 'No. We work with ambitious businesses that know they’re better than their reputation — from funded startups to established companies ready to be chosen, not just seen.'),
  array('q' => 'Where are you based?', 'a' => 'We work from India with brands worldwide, across time zones. Distance has never been the thing that decides whether work is good.'),
);

$stats = array(
  array('value' => 60, 'suffix' => '+', 'label' => 'Brands guided from overlooked to chosen.'),
  array('value' => 4, 'suffix' => '', 'label' => 'Connected disciplines under one roof.'),
  array('value' => 12, 'suffix' => 'yrs', 'label' => 'Of combined craft across strategy and growth.'),
);
?>

<div style="background: #F5F1EA;">

  <nav aria-label="Breadcrumb" style="display: flex; align-items: center; gap: 9px; padding: 18px clamp(28px,5vw,72px) 0; font-size: 11.5px; letter-spacing: 0.08em; color: #9A8E7D;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #9A8E7D;">Home</a>
    <span>/</span>
    <span style="color: #211C17;">Studio</span>
  </nav>

  <!-- ── Header ── -->
  <header class="studio-hero-grid" style="position: relative; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: center; padding: clamp(48px,8vh,100px) clamp(28px,5vw,72px) clamp(50px,8vh,90px);">
    <div style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: clamp(24px,3.4vh,38px);">
      <div style="display: flex; align-items: center; gap: 14px; opacity: 0; animation: riseIn 1s cubic-bezier(0.16,1,0.3,1) 0.1s forwards;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Who We Are</span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(40px,5.6vw,92px); line-height: 1.02; letter-spacing: -0.038em; max-width: 15ch; text-wrap: balance;">
        <span style="display: block; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16,1,0.3,1) 0.25s forwards;">We exist to make good businesses</span>
        <span style="display: block; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16,1,0.3,1) 0.42s forwards;">impossible to <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">overlook.</em></span>
      </h1>
      <p style="margin: 0; max-width: 52ch; font-size: clamp(16px,1.4vw,19px); line-height: 1.6; color: #7A6F63; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16,1,0.3,1) 0.62s forwards;">Astrix is a brand, creative and growth studio built around one belief: businesses don't grow because they speak louder — they grow because people choose them.</p>
    </div>
    <div class="ax-frame" style="grid-column: 8 / span 5; align-self: stretch; border-radius: 4px; min-height: clamp(320px,52vh,540px); opacity: 0; animation: fadeIn 1.6s ease 0.5s forwards;">
      <img class="ax-photo" style="animation: kenburns 24s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/page-possibility.webp'); ?>" alt="A studio built on belief and possibility">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 18px; border: 1px solid rgba(245,241,234,0.22);"></div>
      <span class="ax-word" style="left: 22px; bottom: 20px; font-size: clamp(42px,4.6vw,78px); color: rgba(245,241,234,0.16);">Belief</span>
    </div>
  </header>

  <!-- ── Our Belief statement ── -->
  <section class="ax-frame" style="position: relative; color: #F5F1EA; padding: clamp(90px,16vh,180px) clamp(28px,5vw,72px); background: linear-gradient(150deg, #2A2019, #17130F 62%);">
    <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 84% 8%, rgba(197,106,55,0.26), rgba(197,106,55,0) 55%);"></div>
    <div class="ax-grain-layer"></div>
    <div data-reveal style="position: relative; z-index: 3; max-width: 22ch; margin: 0 auto; text-align: center;">
      <span style="font-size: 11.5px; letter-spacing: 0.32em; color: rgba(245,241,234,0.6); text-transform: uppercase; font-weight: 500;">Our Belief</span>
      <p style="margin: 26px 0 0; font-size: clamp(30px,4.6vw,66px); line-height: 1.14; letter-spacing: -0.028em; font-weight: 500;">Astrix doesn't create content. Astrix creates <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">preference.</em></p>
    </div>
  </section>

  <!-- ── Why We Exist / Beliefs ── -->
  <section class="beliefs-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
    <div data-reveal class="sticky-col" style="grid-column: 1 / span 4; position: sticky; top: 14vh; align-self: start; display: flex; flex-direction: column; gap: 20px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Why We Exist</span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(34px,4vw,58px); line-height: 1.06; letter-spacing: -0.035em;">Three convictions we build on.</h2>
    </div>
    <div style="grid-column: 6 / span 7; display: flex; flex-direction: column;">
      <?php foreach ($beliefs as $b): ?>
      <div data-reveal style="display: grid; grid-template-columns: 48px 1fr; gap: 24px; padding: clamp(30px,5vh,46px) 0; border-top: 1px solid rgba(33,28,23,0.12);">
        <span style="font-size: 12px; font-weight: 600; letter-spacing: 0.1em; color: #B3A794; padding-top: 8px;"><?php echo esc_html($b['n']); ?></span>
        <div style="display: flex; flex-direction: column; gap: 12px;">
          <h3 style="margin: 0; font-size: clamp(22px,2.4vw,32px); font-weight: 600; letter-spacing: -0.025em; line-height: 1.12;"><?php echo esc_html($b['title']); ?></h3>
          <p style="margin: 0; font-size: 15.5px; line-height: 1.7; color: #7A6F63; max-width: 46ch; text-wrap: pretty;"><?php echo esc_html($b['body']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
      <div style="border-top: 1px solid rgba(33,28,23,0.12);"></div>
    </div>
  </section>

  <!-- ── How We Think / Principles ── -->
  <section style="background: #EFE9DF; border-top: 1px solid rgba(33,28,23,0.05); border-bottom: 1px solid rgba(33,28,23,0.05);">
    <div class="principles-outer-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
      <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">How We Think</span>
      </div>
      <h2 data-reveal style="grid-column: 1 / span 8; margin: 30px 0 clamp(40px,7vh,80px); font-weight: 600; font-size: clamp(34px,4.4vw,66px); line-height: 1.04; letter-spacing: -0.035em;">Principles before <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">process.</em></h2>
      <div class="principle-cards-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: repeat(2, 1fr); gap: 1px; background: rgba(33,28,23,0.10);">
        <?php foreach ($principles as $p): ?>
        <div data-reveal class="principle-card" style="background: #EFE9DF; padding: clamp(30px,5vh,48px) clamp(24px,3vw,40px); display: flex; flex-direction: column; gap: 14px; transition: background 0.4s ease, opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1);">
          <span style="font-family: 'Instrument Serif', serif; font-style: italic; font-size: 22px; color: #C56A37;"><?php echo esc_html($p['n']); ?></span>
          <h3 style="margin: 0; font-size: clamp(19px,1.9vw,24px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($p['title']); ?></h3>
          <p style="margin: 0; font-size: 14.5px; line-height: 1.66; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html($p['body']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── The Founders ── -->
  <section class="founders-outer-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; flex-wrap: wrap; margin-bottom: clamp(40px,7vh,72px);">
      <div style="display: flex; flex-direction: column; gap: 26px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="width: 22px; height: 1px; background: #C56A37;"></span>
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">The Founders</span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(34px,4.4vw,66px); line-height: 1.04; letter-spacing: -0.035em; max-width: 16ch;">Two disciplines. One table.</h2>
      </div>
      <p style="margin: 0; max-width: 34ch; font-size: 15px; line-height: 1.68; color: #7A6F63;">Astrix was founded on a simple pairing — a strategist who protects the idea, and a builder who protects the outcome. You work with both.</p>
    </div>
    <div class="founders-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: repeat(2, 1fr); gap: clamp(28px,3vw,56px);">
      <?php foreach ($founders as $m): ?>
      <div data-reveal class="founder" style="display: grid; grid-template-columns: minmax(160px, 220px) 1fr; gap: clamp(20px,2.4vw,32px); align-items: start;">
        <div class="ax-ph" style="border-radius: 4px; aspect-ratio: 0.82;">
          <span class="ax-ph-label"><?php echo esc_html($m['ph']); ?></span>
        </div>
        <div style="display: flex; flex-direction: column; gap: 12px;">
          <div style="display: flex; flex-direction: column; gap: 4px;">
            <span style="font-size: clamp(20px,2vw,26px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($m['name']); ?></span>
            <span style="font-size: 12.5px; color: #C56A37; letter-spacing: 0.02em; font-weight: 500;"><?php echo esc_html($m['role']); ?></span>
          </div>
          <p style="margin: 0; font-size: 14.5px; line-height: 1.66; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html($m['bio']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ── How We Work / Journey ── -->
  <section style="background: #EFE9DF; border-top: 1px solid rgba(33,28,23,0.05); border-bottom: 1px solid rgba(33,28,23,0.05);">
    <div class="journey-outer-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
      <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px; margin-bottom: 30px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">How We Work</span>
      </div>
      <h2 data-reveal style="grid-column: 1 / span 8; margin: 0 0 clamp(44px,7vh,84px); font-weight: 600; font-size: clamp(32px,4.2vw,62px); line-height: 1.04; letter-spacing: -0.035em;">A partnership, in <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">four movements.</em></h2>
      <div class="journey-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: rgba(33,28,23,0.10);">
        <?php foreach ($journey as $j): ?>
        <div data-reveal style="background: #EFE9DF; padding: clamp(28px,4vh,44px) clamp(20px,2vw,30px); display: flex; flex-direction: column; gap: 14px; min-height: 210px;">
          <div style="display: flex; align-items: center; gap: 10px;">
            <span style="width: 8px; height: 8px; border-radius: 100px; background: #C56A37;"></span>
            <span style="font-size: 11px; letter-spacing: 0.22em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;"><?php echo esc_html($j['step']); ?></span>
          </div>
          <h3 style="margin: 0; font-size: clamp(19px,1.9vw,24px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($j['title']); ?></h3>
          <p style="margin: 0; font-size: 14px; line-height: 1.62; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html($j['body']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Good To Know / FAQ ── -->
  <section class="faq-outer-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
    <div data-reveal class="sticky-col" style="grid-column: 1 / span 4; position: sticky; top: 14vh; align-self: start; display: flex; flex-direction: column; gap: 20px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Good To Know</span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px,3.6vw,52px); line-height: 1.06; letter-spacing: -0.035em;">Questions, answered.</h2>
    </div>
    <div style="grid-column: 6 / span 7;">
      <?php foreach ($faqs as $f): ?>
      <div class="faq-item" style="border-top: 1px solid rgba(33,28,23,0.14);">
        <button class="faq-q" type="button">
          <span style="font-size: clamp(18px,1.8vw,23px); font-weight: 500; letter-spacing: -0.02em; color: #211C17;"><?php echo esc_html($f['q']); ?></span>
          <span class="faq-icon" style="font-size: 22px; color: #C56A37; line-height: 1; transition: transform 0.3s ease;">+</span>
        </button>
        <div class="faq-body" style="max-height: 0px; overflow: hidden; transition: max-height 0.45s cubic-bezier(0.16,1,0.3,1);">
          <p style="margin: 0; padding: 0 0 26px; font-size: 15.5px; line-height: 1.7; color: #7A6F63; max-width: 52ch;"><?php echo esc_html($f['a']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
      <div style="border-top: 1px solid rgba(33,28,23,0.14);"></div>
    </div>
  </section>

  <!-- ── Stats ── -->
  <section style="background: linear-gradient(150deg, #2A2019, #17130F 60%); color: #F5F1EA;">
    <div data-reveal class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; padding: clamp(70px,12vh,130px) clamp(28px,5vw,72px);">
      <?php foreach ($stats as $s): ?>
      <div style="display: flex; flex-direction: column; gap: 12px; border-left: 1px solid rgba(245,241,234,0.16); padding-left: 24px;">
        <span data-count="<?php echo esc_attr($s['value']); ?>" data-suffix="<?php echo esc_attr($s['suffix']); ?>" style="font-size: clamp(46px,6vw,88px); font-weight: 600; letter-spacing: -0.04em; line-height: 1; color: #F5F1EA;"><?php echo esc_html($s['suffix']); ?></span>
        <span style="font-size: 14px; color: rgba(245,241,234,0.7); line-height: 1.5; max-width: 26ch;"><?php echo esc_html($s['label']); ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ── CTA ── -->
  <section style="position: relative; overflow: hidden; background: #F5F1EA;">
    <div data-reveal class="cta-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: center; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
      <div style="grid-column: 1 / span 8; display: flex; flex-direction: column; gap: clamp(26px,4vh,44px);">
        <span style="font-size: 11.5px; letter-spacing: 0.32em; color: #7A6F63; text-transform: uppercase; font-weight: 500;">Work With The Studio</span>
        <p style="margin: 0; font-size: clamp(32px,4.6vw,68px); line-height: 1.06; letter-spacing: -0.03em; font-weight: 500; max-width: 18ch; text-wrap: balance;">Let's build the brand people <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">choose.</em></p>
        <div style="display: flex; gap: 26px; align-items: center; flex-wrap: wrap;">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #2A2019, #1A1611); color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">Start a Conversation <span style="font-size: 15px;">→</span></a>
          <a href="<?php echo esc_url(home_url('/work')); ?>" class="ax-underline-dark" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; border-bottom: 1px solid #C9BFAE; padding: 6px 0; transition: border-color 0.3s ease;">See the Work</a>
        </div>
      </div>
    </div>
  </section>

</div>

<style>
.ax-ph { position: relative; overflow: hidden; background: linear-gradient(150deg, #ECE5D9, #E4DBCC); }
.ax-ph::after { content: ""; position: absolute; inset: 0; background: radial-gradient(80% 70% at 100% 0%, rgba(224,150,86,0.20), rgba(224,150,86,0) 55%); }
.ax-ph-label { position: absolute; left: 20px; bottom: 18px; z-index: 2; font-size: 11px; letter-spacing: 0.16em; text-transform: uppercase; color: #9A8E7D; font-weight: 500; }
.founder { transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1); }
.founder .ax-ph { transition: transform 0.5s cubic-bezier(0.16,1,0.3,1); }
.founder:hover .ax-ph { transform: translateY(-6px); }
.principle-card:hover { background: #F5F1EA; }
.faq-q { display: flex; align-items: center; justify-content: space-between; gap: 20px; width: 100%; text-align: left; background: transparent; border: none; cursor: pointer; padding: clamp(22px,3vh,30px) 0; font-family: inherit; }
@media (max-width: 900px) {
  .founders-grid { grid-template-columns: 1fr !important; }
  .founder { grid-template-columns: 120px 1fr !important; }
  .journey-grid { grid-template-columns: 1fr !important; }
  .sticky-col { position: static !important; top: auto !important; }
  .studio-hero-grid { grid-template-columns: 1fr !important; }
  .studio-hero-grid > * { grid-column: 1 / -1 !important; }
  .beliefs-grid { grid-template-columns: 1fr !important; }
  .beliefs-grid > * { grid-column: 1 / -1 !important; }
  .principles-outer-grid { grid-template-columns: 1fr !important; }
  .principles-outer-grid > * { grid-column: 1 / -1 !important; }
  .principle-cards-grid { grid-template-columns: 1fr !important; }
  .founders-outer-grid { grid-template-columns: 1fr !important; }
  .founders-outer-grid > * { grid-column: 1 / -1 !important; }
  .journey-outer-grid { grid-template-columns: 1fr !important; }
  .journey-outer-grid > * { grid-column: 1 / -1 !important; }
  .faq-outer-grid { grid-template-columns: 1fr !important; }
  .faq-outer-grid > * { grid-column: 1 / -1 !important; }
  .stats-grid { grid-template-columns: 1fr !important; }
  .cta-grid { grid-template-columns: 1fr !important; }
  .cta-grid > * { grid-column: 1 / -1 !important; }
}
</style>
<script>
document.querySelectorAll('.faq-item').forEach(function (item) {
  var btn = item.querySelector('.faq-q');
  var body = item.querySelector('.faq-body');
  var icon = item.querySelector('.faq-icon');
  btn.addEventListener('click', function () {
    var isOpen = body.style.maxHeight === '240px';
    document.querySelectorAll('.faq-body').forEach(function (b) { b.style.maxHeight = '0px'; });
    document.querySelectorAll('.faq-icon').forEach(function (ic) { ic.style.transform = 'rotate(0deg)'; });
    if (!isOpen) { body.style.maxHeight = '240px'; icon.style.transform = 'rotate(45deg)'; }
  });
});

(function () {
  var nodes = Array.prototype.slice.call(document.querySelectorAll('[data-count]'));
  if (!nodes.length || !('IntersectionObserver' in window)) return;
  function run(el) {
    var target = parseFloat(el.getAttribute('data-count'));
    var suffix = el.getAttribute('data-suffix') || '';
    var dur = 1400;
    var start = performance.now();
    function tick(now) {
      var p = Math.min(1, (now - start) / dur);
      var e = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(target * e) + suffix;
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) { run(entry.target); io.unobserve(entry.target); }
    });
  }, { threshold: 0.4 });
  nodes.forEach(function (n) { io.observe(n); });
})();
</script>

<?php
get_footer();
