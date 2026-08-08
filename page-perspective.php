<?php
/**
 * Template Name: Perspective
 * Ported from ref/Astrix Perspective.dc.html
 */
global $astrix_nav_active;
$astrix_nav_active = 'perspective';
get_header();
$theme_uri = get_template_directory_uri();

$posts = array(
  array('num' => '01', 'cat' => 'Strategy', 'read' => '6 min read', 'title' => 'The Clarity Gap™: why great businesses go unnoticed.', 'excerpt' => 'The distance between value created and value understood — and how to close it.'),
  array('num' => '02', 'cat' => 'Brand', 'read' => '4 min read', 'title' => 'Stop being louder. Start being clearer.', 'excerpt' => 'Volume is a tax. Clarity is an asset. A short case for restraint.'),
  array('num' => '03', 'cat' => 'Growth', 'read' => '7 min read', 'title' => 'What AI can’t do for your brand — yet.', 'excerpt' => 'Where automation compounds, and where judgement still wins.'),
  array('num' => '04', 'cat' => 'Strategy', 'read' => '5 min read', 'title' => 'The economics of being remembered.', 'excerpt' => 'Why memory is the cheapest growth channel you’re not investing in.'),
  array('num' => '05', 'cat' => 'Experience', 'read' => '4 min read', 'title' => 'Design is how trust feels.', 'excerpt' => 'Every interaction is a promise. Here’s how to keep it.'),
  array('num' => '06', 'cat' => 'Growth', 'read' => '6 min read', 'title' => 'From campaign to compounding.', 'excerpt' => 'How to turn a one-off spike into a durable growth system.'),
);

$categories = array('All', 'Strategy', 'Brand', 'Growth', 'Experience');

$downloads = array(
  array('num' => 'i', 'title' => 'The Preference Playbook', 'meta' => 'Guide · 24 pages · PDF'),
  array('num' => 'ii', 'title' => 'Brand Clarity Audit Framework', 'meta' => 'Worksheet · 6 pages · PDF'),
  array('num' => 'iii', 'title' => 'State of Being Chosen 2026', 'meta' => 'Report · 40 pages · PDF'),
);
?>

<div style="background: #F5F1EA;">

  <!-- ── Breadcrumb ── -->
  <nav aria-label="Breadcrumb" style="display: flex; align-items: center; gap: 9px; padding: 18px clamp(28px,5vw,72px) 0; font-size: 11.5px; letter-spacing: 0.08em; color: #9A8E7D;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #9A8E7D;">Home</a>
    <span>/</span>
    <span style="color: #211C17;">Insights</span>
  </nav>

  <!-- ── Header ── -->
  <header class="perspective-header" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: end; padding: clamp(48px,8vh,100px) clamp(28px,5vw,72px) clamp(40px,6vh,70px);">
    <div style="grid-column: 1 / span 8; display: flex; flex-direction: column; gap: clamp(22px,3.2vh,36px);">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Perspective</span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(44px,7vw,120px); line-height: 0.98; letter-spacing: -0.04em;">Ideas on being <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">chosen.</em></h1>
    </div>
    <p style="grid-column: 9 / span 4; margin: 0; font-size: 15.5px; line-height: 1.66; color: #7A6F63;">Sharp, useful thinking on brand, clarity and growth. No fluff, no buzzwords — one idea worth your time.</p>
  </header>

  <!-- ── Featured Post (no article page yet, so non-clickable) ── -->
  <div data-reveal class="ax-card-static" style="display: block; padding: clamp(10px,2vh,30px) clamp(28px,5vw,72px) clamp(50px,8vh,90px);">
    <div class="feat-row" style="display: grid; grid-template-columns: 1.3fr 1fr; gap: clamp(28px,3.5vw,56px); align-items: center;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.5; min-height: clamp(300px,50vh,540px);">
        <img loading="lazy" decoding="async" class="ax-photo" style="animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/page-clarity.webp'); ?>" alt="Attention is cheap, preference is the moat">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 18px; border: 1px solid rgba(245,241,234,0.22);"></div>
        <span style="position: absolute; left: 24px; top: 24px; z-index: 3; font-size: 10.5px; letter-spacing: 0.24em; text-transform: uppercase; color: rgba(245,241,234,0.9); font-weight: 500; display: flex; align-items: center; gap: 10px;"><span style="width: 18px; height: 1px; background: #C56A37;"></span>Editor's Pick</span>
      </div>
      <div style="display: flex; flex-direction: column; gap: 20px;">
        <span style="font-size: 12px; letter-spacing: 0.14em; text-transform: uppercase; color: #9A8E7D;">Strategy · 8 min read</span>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(28px,3.4vw,52px); line-height: 1.06; letter-spacing: -0.032em; text-wrap: balance;">Attention is cheap. Preference is the only <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">moat.</em></h2>
        <p style="margin: 0; font-size: 15.5px; line-height: 1.66; color: #7A6F63; max-width: 44ch;">Ad budgets buy reach. They don't buy the thing that actually protects a business: being the name people reach for without thinking. Here's how preference is built.</p>
        <span style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500;">Read the essay <span>↗</span></span>
      </div>
    </div>
  </div>

  <!-- ── Topic Filter Chips ── -->
  <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: clamp(30px,4vh,50px) clamp(28px,5vw,72px) 0; border-top: 1px solid rgba(33,28,23,0.10);">
    <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D; margin-right: 8px;">Topics</span>
    <?php foreach ($categories as $cat): ?>
    <button class="chip<?php echo $cat === 'All' ? ' is-active' : ''; ?>" data-filter="<?php echo esc_attr($cat); ?>"><?php echo esc_html($cat); ?></button>
    <?php endforeach; ?>
  </div>

  <!-- ── Post Grid (no article pages yet, so non-clickable) ── -->
  <section class="post-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: clamp(28px,2.6vw,44px) clamp(24px,2vw,32px); padding: clamp(30px,4vh,50px) clamp(28px,5vw,72px) clamp(80px,13vh,150px);">
    <?php foreach ($posts as $p): ?>
    <div data-reveal class="ax-card-static" data-cat="<?php echo esc_attr($p['cat']); ?>">
      <div class="ax-ph" style="border-radius: 4px; aspect-ratio: 1.35;">
        <span style="position: absolute; left: 18px; bottom: 16px; z-index: 2; font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(30px,3vw,46px); color: rgba(33,28,23,0.14);"><?php echo esc_html($p['num']); ?></span>
        <span style="position: absolute; right: 16px; top: 14px; z-index: 2; font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: #9A8E7D; border: 1px solid rgba(33,28,23,0.16); border-radius: 100px; padding: 4px 10px;"><?php echo esc_html($p['cat']); ?></span>
      </div>
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <span style="font-size: 12px; letter-spacing: 0.08em; color: #9A8E7D; text-transform: uppercase;"><?php echo esc_html($p['read']); ?></span>
        <h3 style="margin: 0; font-size: clamp(19px,1.8vw,24px); font-weight: 600; letter-spacing: -0.022em; line-height: 1.16; text-wrap: pretty;"><?php echo esc_html($p['title']); ?></h3>
        <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html($p['excerpt']); ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <!-- ── Free Resources ── -->
  <section style="background: #EFE9DF; border-top: 1px solid rgba(33,28,23,0.05);">
    <div class="resources-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(84px,14vh,170px) clamp(28px,5vw,72px);">
      <div data-reveal class="resources-sticky" style="grid-column: 1 / span 4; position: sticky; top: 14vh; align-self: start; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="width: 22px; height: 1px; background: #C56A37;"></span>
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Free Resources</span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px,3.6vw,52px); line-height: 1.06; letter-spacing: -0.035em;">Deeper reads, <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">on us.</em></h2>
        <p style="margin: 0; font-size: 15px; line-height: 1.68; color: #7A6F63; max-width: 34ch;">Guides, reports and frameworks we use with clients — no gate, no fluff.</p>
      </div>
      <div data-reveal style="grid-column: 6 / span 7;">
        <?php foreach ($downloads as $d): ?>
        <div class="dl-row">
          <span style="font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(26px,3vw,40px); color: rgba(33,28,23,0.18);"><?php echo esc_html($d['num']); ?></span>
          <div style="display: flex; flex-direction: column; gap: 6px;">
            <h3 style="margin: 0; font-size: clamp(19px,1.9vw,24px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($d['title']); ?></h3>
            <span style="font-size: 13.5px; color: #7A6F63;"><?php echo esc_html($d['meta']); ?></span>
          </div>
          <span class="dl-arrow" style="font-size: 18px; color: #C56A37;">↓</span>
        </div>
        <?php endforeach; ?>
        <div style="border-top: 1px solid rgba(33,28,23,0.14);"></div>
      </div>
    </div>
  </section>

  <!-- ── Newsletter ── -->
  <section style="position: relative; overflow: hidden; background: linear-gradient(150deg, #2A2019, #17130F 62%); color: #F5F1EA;">
    <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(80% 120% at 88% 0%, rgba(197,106,55,0.24), rgba(197,106,55,0) 55%);"></div>
    <div data-reveal class="news-row" style="position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr; gap: clamp(32px,4vw,64px); align-items: center; padding: clamp(70px,12vh,140px) clamp(28px,5vw,72px);">
      <div style="display: flex; flex-direction: column; gap: 20px;">
        <span style="font-size: 11.5px; letter-spacing: 0.32em; color: #9A8E7D; text-transform: uppercase; font-weight: 500;">The Preference Letter</span>
        <p style="margin: 0; font-size: clamp(28px,3.6vw,52px); line-height: 1.08; letter-spacing: -0.03em; font-weight: 500; max-width: 16ch; text-wrap: balance;">One idea worth your time. <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">Monthly.</em></p>
        <p style="margin: 0; font-size: 15px; line-height: 1.6; color: rgba(245,241,234,0.68); max-width: 40ch;">A short letter on brand, clarity and growth. No noise. Unsubscribe anytime.</p>
      </div>
      <div style="display: flex; flex-direction: column; gap: 14px;">
        <div id="ax-newsletter-thanks" style="display: none;">
          <p style="margin: 0; font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(22px,2.4vw,30px); color: #F5F1EA;">Thank you. Watch your inbox — <span style="color: #C56A37;">we keep it worth opening.</span></p>
        </div>
        <div id="ax-newsletter-form">
          <div style="display: flex; gap: 10px; flex-wrap: wrap; border-bottom: 1px solid rgba(245,241,234,0.28); padding-bottom: 14px;">
            <input id="ax-newsletter-email" type="email" placeholder="you@company.com" style="flex: 1; min-width: 200px; background: transparent; border: none; outline: none; color: #F5F1EA; font-family: 'Geist', sans-serif; font-size: 17px; padding: 8px 0;">
            <button type="button" id="ax-newsletter-submit" data-magnetic class="ax-cta-light" style="background: #F5F1EA; color: #211C17; border: none; font-family: 'Geist', sans-serif; font-size: 14px; font-weight: 500; padding: 12px 24px; border-radius: 100px; cursor: pointer; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">Subscribe →</button>
          </div>
          <span style="font-size: 12px; color: rgba(245,241,234,0.5);">Join 4,000+ founders and marketers.</span>
        </div>
      </div>
    </div>
  </section>

</div>

<style>
.chip { font-size: 13px; font-weight: 500; letter-spacing: 0.02em; padding: 9px 18px; border-radius: 100px; border: 1px solid rgba(33,28,23,0.16); color: #7A6F63; cursor: pointer; transition: all 0.3s ease; background: transparent; font-family: inherit; }
.chip:hover { border-color: #211C17; color: #211C17; }
.chip.is-active { background: #211C17; border-color: #211C17; color: #F5F1EA; }
.ax-ph { position: relative; overflow: hidden; background: linear-gradient(150deg, #ECE5D9, #E4DBCC); }
.ax-ph::after { content: ""; position: absolute; inset: 0; background: radial-gradient(80% 70% at 100% 0%, rgba(224,150,86,0.18), rgba(224,150,86,0) 55%); }
.ax-card-static { display: flex; flex-direction: column; gap: 18px; }
.ax-card-static .ax-ph, .ax-card-static .ax-frame { transition: transform 0.5s cubic-bezier(0.16,1,0.3,1); }
.ax-card-static:hover .ax-ph, .ax-card-static:hover .ax-frame { transform: translateY(-6px); }
.ax-card-static h3 { transition: color 0.3s ease; }
.ax-card-static:hover h3 { color: #C56A37; }
.dl-row { display: grid; grid-template-columns: auto 1fr auto; gap: clamp(18px,2.4vw,36px); align-items: center; padding: clamp(24px,3.4vh,36px) 0; border-top: 1px solid rgba(33,28,23,0.14); }
.dl-row .dl-arrow { transition: transform 0.4s cubic-bezier(0.16,1,0.3,1); }
.dl-row:hover .dl-arrow { transform: translateY(3px); }
@media (max-width: 640px) { .dl-row { grid-template-columns: auto 1fr !important; } .dl-row .dl-arrow { display: none; } }
@media (max-width: 900px) {
  .feat-row { grid-template-columns: 1fr !important; }
  .post-grid { grid-template-columns: 1fr !important; }
  .news-row { grid-template-columns: 1fr !important; }
  .perspective-header { grid-template-columns: 1fr !important; }
  .perspective-header > * { grid-column: 1 / -1 !important; }
  .resources-grid { grid-template-columns: 1fr !important; }
  .resources-grid > * { grid-column: 1 / -1 !important; }
  .resources-sticky { position: static !important; top: auto !important; }
}
</style>
<script>
document.querySelectorAll('.chip').forEach(function (chip) {
  chip.addEventListener('click', function () {
    document.querySelectorAll('.chip').forEach(function (c) { c.classList.remove('is-active'); });
    chip.classList.add('is-active');
    var filter = chip.getAttribute('data-filter');
    document.querySelectorAll('.post-grid > [data-cat]').forEach(function (card) {
      card.style.display = (filter === 'All' || card.getAttribute('data-cat') === filter) ? '' : 'none';
    });
  });
});

(function () {
  var form = document.getElementById('ax-newsletter-form');
  var thanks = document.getElementById('ax-newsletter-thanks');
  var email = document.getElementById('ax-newsletter-email');
  var submit = document.getElementById('ax-newsletter-submit');
  if (!form || !thanks || !email || !submit) return;
  submit.addEventListener('click', function () {
    var v = email.value || '';
    if (v.indexOf('@') > 0) {
      form.style.display = 'none';
      thanks.style.display = 'block';
    }
  });
})();
</script>

<?php
get_footer();
