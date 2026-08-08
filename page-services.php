<?php
/**
 * Template Name: Services
 * Ported from ref/Astrix Services.dc.html
 */
global $astrix_nav_active;
$astrix_nav_active = 'services';
get_header();
$theme_uri = get_template_directory_uri();

$services = array(
  array('n' => '01', 'label' => 'Brand Strategy', 'outcome' => 'The reason people remember you.', 'body' => 'Positioning, narrative and identity that give a business a clear place in the mind of its market — and a reason to be chosen before anyone compares price.', 'word' => 'Meaning', 'img' => 'page-story.webp', 'caps' => array('Positioning & narrative', 'Naming & messaging', 'Visual identity systems', 'Brand architecture', 'Tone of voice')),
  array('n' => '02', 'label' => 'Creative Studio', 'outcome' => 'Work people stop for.', 'body' => 'Art direction, campaigns and content with craft you can feel. We make ideas that earn attention honestly — and carry meaning once they have it.', 'word' => 'Craft', 'img' => 'page-craft.webp', 'caps' => array('Art direction', 'Campaign concepts', 'Content & social', 'Film & motion', 'Editorial & photography')),
  array('n' => '03', 'label' => 'Digital Experience', 'outcome' => 'Trust, built into every click.', 'body' => 'Websites and products where clarity is the interface. Every interaction is designed to reduce doubt and make the next step feel obvious.', 'word' => 'Clarity', 'img' => 'page-clarity.webp', 'caps' => array('Web design & build', 'Product & UX', 'Prototyping', 'Design systems', 'Front-end engineering')),
  array('n' => '04', 'label' => 'Performance & AI Growth', 'outcome' => 'Momentum you can measure.', 'body' => 'Intelligent, AI-integrated growth systems that compound. We turn stories people remember into growth people can see on a dashboard.', 'word' => 'Momentum', 'img' => 'page-growth.webp', 'caps' => array('SEO & content engines', 'Paid media', 'Lifecycle & CRM', 'Analytics & attribution', 'AI growth systems')),
);

$process = array(
  array('n' => 'i', 'title' => 'Position', 'body' => 'We define the ground you win on — the sharp, ownable place in the market before any work begins.'),
  array('n' => 'ii', 'title' => 'Craft', 'body' => 'Strategy becomes story, identity and experience — made with the care that signals quality.'),
  array('n' => 'iii', 'title' => 'Launch', 'body' => 'We put the work into the world with the systems and rigour to make a strong first impression stick.'),
  array('n' => 'iv', 'title' => 'Compound', 'body' => 'We measure, learn and sharpen — turning one-off wins into durable, compounding preference.'),
);

$industries = array('SaaS & Technology', 'Fintech', 'Healthcare', 'Consumer & Retail', 'D2C & E-commerce', 'Hospitality', 'Real Estate', 'Professional Services', 'Education');

$faqs = array(
  array('q' => 'Do I have to buy all four disciplines?', 'a' => "No. We start where preference is leaking — positioning, a rebrand, a site, a growth engine — and connect the rest of the system as you grow. You never pay for scope you don't need."),
  array('q' => 'How long until we see results?', 'a' => "Positioning and identity land in weeks. Experience and growth systems build over a quarter, then compound. We're optimising for durable preference, not a one-week spike."),
  array('q' => 'Do you work on retainer or by project?', 'a' => "Both. Projects to launch something sharp; retainers to keep it compounding. We'll recommend the shape that fits your goals, not our billing."),
  array('q' => 'Can you plug into our existing team?', 'a' => 'Yes. We lead, co-pilot, or hand off cleanly with systems your team can run. Coherence is the point — we design for it either way.'),
);
?>

<div style="background: #F5F1EA;">

  <nav aria-label="Breadcrumb" style="display: flex; align-items: center; gap: 9px; padding: 18px clamp(28px,5vw,72px) 0; font-size: 11.5px; letter-spacing: 0.08em; color: #9A8E7D;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #9A8E7D;">Home</a>
    <span>/</span>
    <span style="color: #211C17;">Services</span>
  </nav>

  <header class="svc-header-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(48px,8vh,100px) clamp(28px,5vw,72px) clamp(50px,8vh,90px);">
    <div style="grid-column: 1 / span 9; display: flex; flex-direction: column; gap: clamp(24px,3.4vh,40px);">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">What We Do</span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(40px,6vw,104px); line-height: 1; letter-spacing: -0.04em; max-width: 15ch;">
        We don't sell services.<br>We sell <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">outcomes.</em>
      </h1>
      <p style="margin: 0; max-width: 54ch; font-size: clamp(16px,1.4vw,19px); line-height: 1.6; color: #7A6F63;">Four connected disciplines, one roof, one outcome — preference. Nothing is handed off, so nothing loses coherence between what you say and what people choose.</p>
    </div>
  </header>

  <section data-reveal style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: clamp(20px,3vw,44px); padding: clamp(22px,3.4vh,34px) clamp(28px,5vw,72px); border-top: 1px solid rgba(33,28,23,0.10); border-bottom: 1px solid rgba(33,28,23,0.10); background: #EFE9DF;">
    <span style="font-size: 11px; letter-spacing: 0.28em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">Trusted by</span>
    <div style="display: flex; align-items: center; gap: clamp(22px,3.4vw,54px); flex-wrap: wrap;">
      <span style="font-size: 15px; font-weight: 600; letter-spacing: 0.06em; color: #B3A794;">CLIENT ONE</span>
      <span style="font-size: 15px; font-weight: 600; letter-spacing: 0.06em; color: #B3A794;">CLIENT TWO</span>
      <span style="font-size: 15px; font-weight: 600; letter-spacing: 0.06em; color: #B3A794;">CLIENT THREE</span>
    </div>
    <a href="<?php echo esc_url(home_url('/work')); ?>" style="display: flex; align-items: baseline; gap: 10px;"><span style="font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(26px,3vw,40px); color: #C56A37;">+184%</span><span style="font-size: 13px; color: #7A6F63;">qualified pipeline, 9 months →</span></a>
  </section>

  <section style="display: flex; flex-direction: column;">
    <?php foreach ($services as $s): ?>
    <div data-reveal class="svc-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: clamp(32px,4vw,72px); align-items: center; padding: clamp(56px,9vh,110px) clamp(28px,5vw,72px); border-top: 1px solid rgba(33,28,23,0.10);">
      <div style="display: flex; flex-direction: column; gap: 22px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="font-size: 12px; font-weight: 600; letter-spacing: 0.1em; color: #B3A794;"><?php echo esc_html($s['n']); ?></span>
          <span style="font-size: 11.5px; letter-spacing: 0.28em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;"><?php echo esc_html($s['label']); ?></span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px,3.8vw,56px); line-height: 1.06; letter-spacing: -0.032em; max-width: 16ch; text-wrap: balance;"><?php echo esc_html($s['outcome']); ?></h2>
        <p style="margin: 0; font-size: 16px; line-height: 1.66; color: #7A6F63; max-width: 46ch; text-wrap: pretty;"><?php echo esc_html($s['body']); ?></p>
        <div style="display: flex; flex-direction: column; margin-top: 6px;">
          <?php foreach ($s['caps'] as $c): ?>
          <div class="cap"><span style="width: 5px; height: 5px; border-radius: 100px; background: #C56A37; display: block;"></span><?php echo esc_html($c); ?></div>
          <?php endforeach; ?>
          <div style="border-top: 1px solid rgba(33,28,23,0.10);"></div>
        </div>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="ax-underline-dark" style="display: inline-flex; align-items: center; gap: 10px; margin-top: 4px; align-self: flex-start; font-size: 14.5px; font-weight: 500; color: #211C17; border: none; border-bottom: 1px solid #C9BFAE; padding: 6px 0; transition: border-color 0.3s ease;">Explore <?php echo esc_html($s['label']); ?> <span style="font-size: 15px;">→</span></a>
      </div>
      <div class="svc-img ax-frame" style="border-radius: 4px; aspect-ratio: 1.06; min-height: clamp(320px,50vh,540px);">
        <img loading="lazy" decoding="async" class="ax-photo" style="animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/' . $s['img']); ?>" alt="<?php echo esc_attr($s['outcome']); ?>">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 18px; border: 1px solid rgba(245,241,234,0.20);"></div>
        <span class="ax-word" style="left: 22px; bottom: 16px; font-size: clamp(40px,4.4vw,80px); color: rgba(245,241,234,0.16);"><?php echo esc_html($s['word']); ?></span>
      </div>
    </div>
    <?php endforeach; ?>
    <div style="border-top: 1px solid rgba(33,28,23,0.10);"></div>
  </section>

  <section style="background: #EFE9DF; border-top: 1px solid rgba(33,28,23,0.05);">
    <div class="svc-how-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
      <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">How We Work</span>
      </div>
      <h2 data-reveal style="grid-column: 1 / span 8; margin: 30px 0 clamp(44px,7vh,84px); font-weight: 600; font-size: clamp(32px,4.2vw,62px); line-height: 1.04; letter-spacing: -0.035em;">One system, <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">four moves.</em></h2>
      <div class="svc-process-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: rgba(33,28,23,0.10);">
        <?php foreach ($process as $p): ?>
        <div data-reveal style="background: #EFE9DF; padding: clamp(28px,4vh,44px) clamp(20px,2vw,30px); display: flex; flex-direction: column; gap: 14px; min-height: 200px;">
          <span style="font-family: 'Instrument Serif', serif; font-style: italic; font-size: 26px; color: #C56A37;"><?php echo esc_html($p['n']); ?></span>
          <h3 style="margin: 0; font-size: clamp(19px,1.9vw,24px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($p['title']); ?></h3>
          <p style="margin: 0; font-size: 14px; line-height: 1.62; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html($p['body']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section style="background: #EFE9DF; border-top: 1px solid rgba(33,28,23,0.05);">
    <div class="svc-industries-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(84px,14vh,170px) clamp(28px,5vw,72px);">
      <div data-reveal style="grid-column: 1 / span 5; display: flex; flex-direction: column; gap: 22px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="width: 22px; height: 1px; background: #C56A37;"></span>
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Industries</span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px,3.8vw,56px); line-height: 1.06; letter-spacing: -0.035em; max-width: 15ch;">Built for brands that want to be first <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">choice.</em></h2>
        <p style="margin: 0; font-size: 15px; line-height: 1.68; color: #7A6F63; max-width: 40ch;">We work across categories where perception decides the winner — where being understood matters as much as being good.</p>
      </div>
      <div data-reveal style="grid-column: 7 / span 6; display: flex; flex-wrap: wrap; gap: 10px; align-content: center;">
        <?php foreach ($industries as $i): ?>
        <span class="ind"><?php echo esc_html($i); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="svc-faq-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,15vh,180px) clamp(28px,5vw,72px);">
    <div data-reveal class="sticky-col" style="grid-column: 1 / span 4; position: sticky; top: 14vh; align-self: start; display: flex; flex-direction: column; gap: 20px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Good To Know</span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px,3.6vw,52px); line-height: 1.06; letter-spacing: -0.035em;">How engagements work.</h2>
    </div>
    <div style="grid-column: 6 / span 7;">
      <?php foreach ($faqs as $i => $f): ?>
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

  <section style="position: relative; overflow: hidden; background: linear-gradient(150deg, #2A2019, #17130F 60%); color: #F5F1EA;">
    <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 88% 0%, rgba(197,106,55,0.28), rgba(197,106,55,0) 55%);"></div>
    <div data-reveal class="svc-cta-grid" style="position: relative; z-index: 1; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px,16vh,170px) clamp(28px,5vw,72px);">
      <div style="grid-column: 1 / span 9; display: flex; flex-direction: column; gap: clamp(28px,5vh,48px);">
        <span style="font-size: 11.5px; letter-spacing: 0.32em; color: #9A8E7D; text-transform: uppercase; font-weight: 500;">Ready When You Are</span>
        <p style="margin: 0; font-size: clamp(32px,4.6vw,68px); line-height: 1.06; letter-spacing: -0.03em; font-weight: 500; max-width: 18ch; text-wrap: balance;">Tell us what you want to be known <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">for.</em></p>
        <div style="display: flex; gap: 26px; align-items: center; flex-wrap: wrap;">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-outline-light" style="display: inline-flex; align-items: center; gap: 12px; background: #F5F1EA; color: #211C17; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">Start a Conversation <span style="font-size: 15px;">→</span></a>
          <a href="<?php echo esc_url(home_url('/work')); ?>" class="ax-underline-light" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; color: #F5F1EA; border: none; border-bottom: 1px solid rgba(245,241,234,0.28); padding: 6px 0; transition: border-color 0.3s ease;">See the Work</a>
        </div>
      </div>
    </div>
  </section>

</div>

<style>
.cap { font-size: 13.5px; color: #7A6F63; padding: 10px 0; border-top: 1px solid rgba(33,28,23,0.10); display: flex; align-items: center; gap: 10px; transition: color 0.3s ease, padding-left 0.3s ease; }
.cap:hover { color: #211C17; padding-left: 6px; }
.ind { font-size: 14px; font-weight: 500; color: #3A3229; padding: 11px 18px; border-radius: 100px; border: 1px solid rgba(33,28,23,0.14); background: transparent; transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease; }
.ind:hover { background: #211C17; color: #F5F1EA; border-color: #211C17; }
.faq-q { display: flex; align-items: center; justify-content: space-between; gap: 20px; width: 100%; text-align: left; background: transparent; border: none; cursor: pointer; padding: clamp(22px,3vh,30px) 0; font-family: inherit; }
@media (max-width: 900px) {
  .svc-row { grid-template-columns: 1fr !important; }
  .svc-img { order: -1; }
  .sticky-col { position: static !important; top: auto !important; }
  .svc-header-grid { grid-template-columns: 1fr !important; }
  .svc-header-grid > * { grid-column: 1 / -1 !important; }
  .svc-how-grid { grid-template-columns: 1fr !important; }
  .svc-how-grid > * { grid-column: 1 / -1 !important; }
  .svc-process-grid { grid-template-columns: 1fr !important; }
  .svc-industries-grid { grid-template-columns: 1fr !important; }
  .svc-industries-grid > * { grid-column: 1 / -1 !important; }
  .svc-faq-grid { grid-template-columns: 1fr !important; }
  .svc-faq-grid > * { grid-column: 1 / -1 !important; }
  .svc-cta-grid { grid-template-columns: 1fr !important; }
  .svc-cta-grid > * { grid-column: 1 / -1 !important; }
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
</script>

<?php
get_footer();
