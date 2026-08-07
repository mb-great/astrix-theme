<?php
/**
 * Template Name: Work
 * Ported from ref/Astrix Work.dc.html
 */
global $astrix_nav_active;
$astrix_nav_active = 'work';
get_header();
$theme_uri = get_template_directory_uri();
?>

<div style="background: #F5F1EA;">

  <!-- ── Header ── -->
  <header class="header-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: end; padding: clamp(64px,11vh,130px) clamp(28px,5vw,72px) clamp(40px,6vh,70px);">
    <div style="grid-column: 1 / span 8; display: flex; flex-direction: column; gap: clamp(22px,3.2vh,36px);">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Selected Work</span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(44px,7vw,120px); line-height: 0.98; letter-spacing: -0.04em;">Proof, not <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">promises.</em></h1>
    </div>
    <p style="grid-column: 9 / span 4; margin: 0; font-size: 15.5px; line-height: 1.66; color: #7A6F63;">A selection of brands we've moved from overlooked to chosen — across strategy, creative, experience and growth.</p>
  </header>

  <!-- ── Featured Case (no case-study detail page yet, so non-clickable) ── -->
  <div data-reveal class="ax-card-static" style="display: block; padding: clamp(20px,3vh,40px) clamp(28px,5vw,72px) clamp(40px,6vh,70px);">
    <div class="feat-row" style="display: grid; grid-template-columns: 1.35fr 1fr; gap: clamp(28px,3.5vw,56px); align-items: center;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.5; min-height: clamp(300px,52vh,560px);">
        <img class="ax-photo" style="animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/page-vision2.webp'); ?>" alt="Meridian Financial — from overlooked to category default">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 18px; border: 1px solid rgba(245,241,234,0.22);"></div>
        <span style="position: absolute; left: 24px; top: 24px; z-index: 3; font-size: 10.5px; letter-spacing: 0.28em; text-transform: uppercase; color: rgba(245,241,234,0.9); font-weight: 500; display: flex; align-items: center; gap: 10px;"><span style="width: 18px; height: 1px; background: #C56A37;"></span>Featured Case</span>
        <span class="ax-word" style="left: 22px; bottom: 18px; font-size: clamp(40px,4.6vw,84px); color: rgba(245,241,234,0.16);">Meridian</span>
      </div>
      <div style="display: flex; flex-direction: column; gap: 22px;">
        <span style="font-size: 12.5px; letter-spacing: 0.16em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">Meridian Financial · Fintech</span>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(28px,3.4vw,50px); line-height: 1.06; letter-spacing: -0.03em; text-wrap: balance;">From overlooked to the category <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">default.</em></h2>
        <p style="margin: 0; font-size: 15.5px; line-height: 1.66; color: #7A6F63; max-width: 42ch;">A full reposition, identity and growth system that turned a quiet challenger into the name buyers shortlist first.</p>
        <div style="display: flex; gap: 40px; margin-top: 6px;">
          <div style="display: flex; flex-direction: column; gap: 4px;"><span style="font-size: clamp(30px,3vw,44px); font-weight: 600; letter-spacing: -0.03em; color: #C56A37;">+240%</span><span style="font-size: 12.5px; color: #9A8E7D;">Qualified pipeline</span></div>
          <div style="display: flex; flex-direction: column; gap: 4px;"><span style="font-size: clamp(30px,3vw,44px); font-weight: 600; letter-spacing: -0.03em; color: #211C17;">3.1×</span><span style="font-size: 12.5px; color: #9A8E7D;">Brand recall</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Filter Chips ── -->
  <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: 0 clamp(28px,5vw,72px) clamp(30px,4vh,50px); border-top: 1px solid rgba(33,28,23,0.10); padding-top: clamp(30px,4vh,50px);">
    <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D; margin-right: 8px;">Filter</span>
    <button class="chip is-active" data-filter="All">All</button>
    <button class="chip" data-filter="Brand">Brand</button>
    <button class="chip" data-filter="Creative">Creative</button>
    <button class="chip" data-filter="Digital">Digital</button>
    <button class="chip" data-filter="Performance">Performance</button>
  </div>

  <!-- ── Case Grid ── -->
  <?php
  $cases = array(
    array('client' => 'Lumen Health', 'title' => 'A clinic people trust before they arrive.', 'tag' => 'Brand', 'metric' => '3.1×', 'cat' => 'Brand', 'img' => 'page-clarity.webp'),
    array('client' => 'Atlas Logistics', 'title' => 'A platform that sells itself.', 'tag' => 'Digital', 'metric' => '+68%', 'cat' => 'Digital', 'img' => 'page-disciplines.webp'),
    array('client' => 'Verde Foods', 'title' => 'The shelf you reach for first.', 'tag' => 'Brand', 'metric' => '2.4×', 'cat' => 'Brand', 'img' => 'page-craft.webp'),
    array('client' => 'Northwind', 'title' => 'Growth that compounds quietly.', 'tag' => 'Performance', 'metric' => '−38%', 'cat' => 'Performance', 'img' => 'page-momentum.webp'),
    array('client' => 'Solstice Retail', 'title' => 'Commerce, clarified.', 'tag' => 'Digital', 'metric' => '+52%', 'cat' => 'Digital', 'img' => 'page-possibility.webp'),
    array('client' => 'Cadence Studio', 'title' => 'A rebrand people quoted.', 'tag' => 'Creative', 'metric' => '18M', 'cat' => 'Creative', 'img' => 'page-vision.webp'),
  );
  ?>
  <section class="card-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: clamp(24px,2.4vw,40px) clamp(24px,2vw,32px); padding: 0 clamp(28px,5vw,72px) clamp(80px,13vh,150px);">
    <?php foreach ($cases as $c): ?>
    <div data-reveal class="ax-card-static" data-cat="<?php echo esc_attr($c['cat']); ?>">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.14;">
        <img class="ax-photo" style="animation: kenburns 28s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/' . $c['img']); ?>" alt="<?php echo esc_attr($c['client']); ?>">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 14px; border: 1px solid rgba(245,241,234,0.18);"></div>
        <span style="position: absolute; right: 16px; top: 14px; z-index: 3; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; color: rgba(245,241,234,0.85); font-weight: 500; border: 1px solid rgba(245,241,234,0.3); border-radius: 100px; padding: 4px 10px;"><?php echo esc_html($c['tag']); ?></span>
        <span class="ax-word" style="left: 16px; bottom: 12px; font-size: clamp(26px,3vw,44px); color: rgba(245,241,234,0.9); font-weight: 600; text-shadow: 0 1px 20px rgba(0,0,0,0.25);"><?php echo esc_html($c['metric']); ?></span>
      </div>
      <div style="display: flex; flex-direction: column; gap: 8px; margin-top: 18px;">
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px;">
          <span style="font-size: 12.5px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;"><?php echo esc_html($c['client']); ?></span>
        </div>
        <h3 style="margin: 0; font-size: clamp(18px,1.7vw,22px); font-weight: 600; letter-spacing: -0.02em; line-height: 1.18; text-wrap: pretty;"><?php echo esc_html($c['title']); ?></h3>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <!-- ── CTA ── -->
  <section style="position: relative; overflow: hidden; background: linear-gradient(150deg, #2A2019, #17130F 60%); color: #F5F1EA;">
    <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 88% 0%, rgba(197,106,55,0.28), rgba(197,106,55,0) 55%);"></div>
    <div data-reveal class="cta-grid" style="position: relative; z-index: 1; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(80px,14vh,160px) clamp(28px,5vw,72px);">
      <div style="grid-column: 1 / span 9; display: flex; flex-direction: column; gap: clamp(26px,4vh,44px);">
        <span style="font-size: 11.5px; letter-spacing: 0.32em; color: #9A8E7D; text-transform: uppercase; font-weight: 500;">Your Brand, Next</span>
        <p style="margin: 0; font-size: clamp(30px,4.4vw,64px); line-height: 1.06; letter-spacing: -0.03em; font-weight: 500; max-width: 20ch; text-wrap: balance;">The next case study could be <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">yours.</em></p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-outline-light" style="display: inline-flex; align-self: flex-start; align-items: center; gap: 12px; background: #F5F1EA; color: #211C17; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">Start a Conversation <span style="font-size: 15px;">→</span></a>
      </div>
    </div>
  </section>

</div>

<style>
.chip { font-size: 13px; font-weight: 500; letter-spacing: 0.02em; padding: 9px 18px; border-radius: 100px; border: 1px solid rgba(33,28,23,0.16); color: #7A6F63; cursor: pointer; transition: all 0.3s ease; background: transparent; font-family: inherit; }
.chip:hover { border-color: #211C17; color: #211C17; }
.chip.is-active { background: #211C17; border-color: #211C17; color: #F5F1EA; }
.ax-card-static { display: flex; flex-direction: column; gap: 18px; }
.ax-card-static .ax-frame { transition: transform 0.5s cubic-bezier(0.16,1,0.3,1); }
.ax-card-static:hover .ax-frame { transform: translateY(-6px); }
@media (max-width: 900px) {
  .feat-row { grid-template-columns: 1fr !important; }
  .card-grid { grid-template-columns: 1fr !important; }
  .header-grid { grid-template-columns: 1fr !important; }
  .header-grid > * { grid-column: 1 / -1 !important; }
  .cta-grid { grid-template-columns: 1fr !important; }
  .cta-grid > * { grid-column: 1 / -1 !important; }
}
</style>
<script>
document.querySelectorAll('.chip').forEach(function (chip) {
  chip.addEventListener('click', function () {
    document.querySelectorAll('.chip').forEach(function (c) { c.classList.remove('is-active'); });
    chip.classList.add('is-active');
    var filter = chip.getAttribute('data-filter');
    document.querySelectorAll('.card-grid > [data-cat]').forEach(function (card) {
      card.style.display = (filter === 'All' || card.getAttribute('data-cat') === filter) ? '' : 'none';
    });
  });
});
</script>

<?php
get_footer();
