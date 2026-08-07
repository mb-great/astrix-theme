<?php
/**
 * Template Name: Contact
 * Ported from ref/Astrix Contact.dc.html
 */
global $astrix_nav_active;
$astrix_nav_active = 'contact';
get_header();
$theme_uri = get_template_directory_uri();

$budgets = array('Under ₹10L', '₹10–25L', '₹25–50L', '₹50L+');

$timelines = array('ASAP', 'This quarter', 'Next 6 months', 'Just exploring');

$faqs = array(
  array('q' => 'What kind of businesses do you work with?', 'a' => "Ambitious businesses that know they're better than their reputation — from funded startups to established companies ready to be chosen, not just seen."),
  array('q' => 'How do engagements start?', 'a' => 'With strategy, never deliverables. We begin by defining the ground you win on, then design the work around it. The first conversation is about your goals, not our services.'),
  array('q' => 'What does it cost?', 'a' => "Projects typically start in the mid five figures; retainers are scoped to outcomes. After the first conversation we'll give you a clear, honest range — no surprises."),
  array('q' => 'How fast will I hear back?', 'a' => 'A real human replies within one business day. No auto-responders, no funnels — just a considered reply from someone who read what you wrote.'),
);
?>

<div style="background: #F5F1EA; min-height: 100vh;">

  <nav aria-label="Breadcrumb" style="display: flex; align-items: center; gap: 9px; padding: 18px clamp(28px,5vw,72px) 0; font-size: 11.5px; letter-spacing: 0.08em; color: #9A8E7D;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #9A8E7D;">Home</a>
    <span>/</span>
    <span style="color: #211C17;">Contact</span>
  </nav>

  <header style="padding: clamp(48px,8vh,100px) clamp(28px,5vw,72px) clamp(30px,5vh,56px);">
    <div data-reveal style="display: flex; align-items: center; gap: 14px; margin-bottom: clamp(22px,3vh,34px);">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Start a Conversation</span>
    </div>
    <h1 data-reveal style="margin: 0; font-weight: 600; font-size: clamp(40px,6vw,104px); line-height: 0.98; letter-spacing: -0.04em; max-width: 14ch;">Let's build something <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">meaningful.</em></h1>
  </header>

  <section class="contact-split" style="display: grid; grid-template-columns: 1.25fr 1fr; gap: clamp(40px,5vw,90px); padding: clamp(20px,3vh,40px) clamp(28px,5vw,72px) clamp(70px,11vh,130px);">

    <div data-reveal>
      <?php if (isset($_GET['sent'])) : ?>
        <div style="border: 1px solid rgba(33,28,23,0.14); border-radius: 6px; padding: clamp(40px,6vh,70px); display: flex; flex-direction: column; gap: 18px; background: #EFE9DF;">
          <span style="font-size: 12px; letter-spacing: 0.28em; text-transform: uppercase; color: #C56A37; font-weight: 500;">Message Received</span>
          <p style="margin: 0; font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(26px,3vw,40px); line-height: 1.16;">Thank you<?php echo (isset($_GET['sent_name']) && $_GET['sent_name'] !== '') ? ', ' . esc_html(sanitize_text_field(wp_unslash($_GET['sent_name']))) : ''; ?>. We'll read this properly and reply within one business day.</p>
          <p style="margin: 0; font-size: 15px; line-height: 1.6; color: #7A6F63; max-width: 42ch;">In the meantime, wander through <a href="<?php echo esc_url(home_url('/work')); ?>" style="color: #C56A37;">the work</a> or read our <a href="<?php echo esc_url(home_url('/perspective')); ?>" style="color: #C56A37;">perspective</a>.</p>
        </div>
      <?php else : ?>

        <?php if (isset($_GET['error'])) : ?>
          <div style="font-size: 13.5px; color: #C56A37; margin-bottom: 20px;">Please add your name and a valid email, and try again.</div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display: flex; flex-direction: column; gap: clamp(26px,3.5vh,38px);">
          <input type="hidden" name="action" value="astrix_contact_submit">
          <?php wp_nonce_field('astrix_contact_submit', 'astrix_contact_nonce'); ?>
          <div style="position:absolute;left:-9999px;" aria-hidden="true"><label>Leave this empty: <input type="text" name="astrix_hp" tabindex="-1" autocomplete="off"></label></div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="contact-name" style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Your name</label>
              <input id="contact-name" class="fld" type="text" name="name" placeholder="Jane Doe" required>
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="contact-company" style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Company</label>
              <input id="contact-company" class="fld" type="text" name="company" placeholder="Company name">
            </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="contact-email" style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Work email</label>
            <input id="contact-email" class="fld" type="email" name="email" placeholder="you@company.com" required>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="contact-industry" style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Industry</label>
              <input id="contact-industry" class="fld" type="text" name="industry" placeholder="e.g. Fintech, D2C, SaaS">
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="contact-site" style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Website <span style="text-transform: none; letter-spacing: 0;">(optional)</span></label>
              <input id="contact-site" class="fld" type="text" name="site" placeholder="yourbrand.com">
            </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 6px;">
            <label for="contact-message" style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">What do you want to be known for?</label>
            <textarea id="contact-message" class="fld" name="message" rows="3" placeholder="Tell us the brand you want to become — and what's in the way." style="resize: vertical; min-height: 84px;"></textarea>
          </div>

          <div style="display: flex; flex-direction: column; gap: 14px;">
            <label style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Investment range</label>
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
              <?php foreach ($budgets as $b) : ?>
              <button type="button" class="budget" data-group="budget" data-value="<?php echo esc_attr($b); ?>"><?php echo esc_html($b); ?></button>
              <?php endforeach; ?>
            </div>
            <input type="hidden" name="budget" id="budget-field" value="">
          </div>

          <div style="display: flex; flex-direction: column; gap: 14px;">
            <label style="font-size: 12px; letter-spacing: 0.06em; color: #9A8E7D; text-transform: uppercase;">Timeline</label>
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
              <?php foreach ($timelines as $t) : ?>
              <button type="button" class="budget" data-group="timeline" data-value="<?php echo esc_attr($t); ?>"><?php echo esc_html($t); ?></button>
              <?php endforeach; ?>
            </div>
            <input type="hidden" name="timeline" id="timeline-field" value="">
          </div>

          <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap; margin-top: 4px;">
            <button type="submit" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #2A2019, #1A1611); color: #F5F1EA; border: none; font-family: inherit; font-size: 14.5px; font-weight: 500; padding: 16px 32px; border-radius: 100px; cursor: pointer; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">Send it over <span style="font-size: 15px;">→</span></button>
          </div>
        </form>

      <?php endif; ?>
    </div>

    <aside data-reveal style="display: flex; flex-direction: column; gap: clamp(30px,4vh,44px);">
      <div style="display: flex; flex-direction: column; gap: 14px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 22px;">
        <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">Prefer email?</span>
        <a href="mailto:hello@astrixmedia.in" style="font-size: clamp(19px,1.8vw,24px); font-weight: 500; letter-spacing: -0.01em;">hello@astrixmedia.in</a>
      </div>
      <div style="display: flex; flex-direction: column; gap: 12px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 22px;">
        <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">Call or message</span>
        <a href="tel:+919000000000" style="font-size: clamp(19px,1.8vw,24px); font-weight: 500; letter-spacing: -0.01em;">+91 90000 00000</a>
        <a href="https://wa.me/919000000000" data-magnetic class="whatsapp-link" style="display: inline-flex; align-self: flex-start; align-items: center; gap: 10px; border: 1px solid rgba(33,28,23,0.2); border-radius: 100px; padding: 11px 20px; font-size: 13.5px; font-weight: 500; transition: background 0.35s ease, color 0.35s ease, border-color 0.35s ease;">WhatsApp us <span>→</span></a>
      </div>
      <div style="display: flex; flex-direction: column; gap: 14px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 22px;">
        <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">Book a call</span>
        <a href="#" data-magnetic class="calendly-link" style="display: inline-flex; align-self: flex-start; align-items: center; gap: 10px; border: 1px solid rgba(33,28,23,0.2); border-radius: 100px; padding: 12px 22px; font-size: 14px; font-weight: 500; transition: background 0.35s ease, color 0.35s ease, border-color 0.35s ease;">30-min intro via Calendly <span>→</span></a>
        <span style="font-size: 12.5px; color: #9A8E7D;">[Calendly scheduler embeds here]</span>
      </div>
      <div style="display: flex; flex-direction: column; gap: 14px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 22px;">
        <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">Studio</span>
        <p style="margin: 0; font-size: 15px; line-height: 1.6; color: #211C17;">India — working with brands worldwide, across time zones.</p>
        <div style="position: relative; overflow: hidden; border-radius: 4px; height: 150px; background: linear-gradient(150deg, #ECE5D9, #E4DBCC); border: 1px solid rgba(33,28,23,0.08);">
          <div style="position: absolute; inset: 0; background-image: linear-gradient(rgba(33,28,23,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(33,28,23,0.05) 1px, transparent 1px); background-size: 26px 26px;"></div>
          <span style="position: absolute; left: 50%; top: 46%; transform: translate(-50%,-50%); width: 12px; height: 12px; border-radius: 100px; background: #C56A37; box-shadow: 0 0 0 6px rgba(197,106,55,0.22);"></span>
          <span style="position: absolute; left: 16px; bottom: 12px; font-size: 11px; letter-spacing: 0.16em; text-transform: uppercase; color: #9A8E7D;">[Interactive map]</span>
        </div>
      </div>
      <div style="display: flex; gap: 26px; flex-wrap: wrap; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 22px;">
        <div style="display: flex; flex-direction: column; gap: 4px;"><span style="font-size: 22px; font-weight: 600; letter-spacing: -0.02em; color: #C56A37;">&lt;1 day</span><span style="font-size: 12px; color: #9A8E7D;">Reply time</span></div>
        <div style="display: flex; flex-direction: column; gap: 4px;"><span style="font-size: 22px; font-weight: 600; letter-spacing: -0.02em;">Senior</span><span style="font-size: 12px; color: #9A8E7D;">team, always</span></div>
        <div style="display: flex; flex-direction: column; gap: 4px;"><span style="font-size: 22px; font-weight: 600; letter-spacing: -0.02em;">No</span><span style="font-size: 12px; color: #9A8E7D;">obligation</span></div>
      </div>
    </aside>
  </section>

  <section style="background: #EFE9DF; border-top: 1px solid rgba(33,28,23,0.05);">
    <div class="contact-outer-grid" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(70px,12vh,150px) clamp(28px,5vw,72px);">
      <div data-reveal class="contact-sticky" style="grid-column: 1 / span 4; position: sticky; top: 14vh; align-self: start; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="width: 22px; height: 1px; background: #C56A37;"></span>
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Before You Ask</span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px,3.6vw,52px); line-height: 1.06; letter-spacing: -0.035em;">Questions, answered.</h2>
      </div>
      <div style="grid-column: 6 / span 7;">
        <?php foreach ($faqs as $f) : ?>
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
    </div>
  </section>

</div>

<style>
.fld { width: 100%; box-sizing: border-box; background: transparent; border: none; border-bottom: 1px solid rgba(33,28,23,0.18); outline: none; color: #211C17; font-family: inherit; font-size: 17px; padding: 12px 0; transition: border-color 0.3s ease; }
.fld::placeholder { color: #B3A794; }
.fld:focus { border-bottom-color: #C56A37; }
.budget { font-size: 13px; font-weight: 500; padding: 9px 16px; border-radius: 100px; border: 1px solid rgba(33,28,23,0.16); color: #7A6F63; cursor: pointer; background: transparent; transition: all 0.3s ease; font-family: inherit; }
.budget:hover { border-color: #211C17; color: #211C17; }
.budget.is-active { background: #211C17; border-color: #211C17; color: #F5F1EA; }
.faq-q { display: flex; align-items: center; justify-content: space-between; gap: 20px; width: 100%; text-align: left; background: transparent; border: none; cursor: pointer; padding: clamp(22px,3vh,30px) 0; font-family: inherit; }
.whatsapp-link:hover, .calendly-link:hover { background: #211C17; color: #F5F1EA; border-color: #211C17; }
@media (max-width: 900px) {
  .contact-split { grid-template-columns: 1fr !important; }
  .contact-sticky { position: static !important; top: auto !important; grid-column: 1 / -1 !important; }
  .contact-outer-grid { grid-template-columns: 1fr !important; }
  .contact-outer-grid > * { grid-column: 1 / -1 !important; }
}
</style>
<script>
document.querySelectorAll('.budget[data-group]').forEach(function (chip) {
  chip.addEventListener('click', function () {
    var group = chip.getAttribute('data-group');
    var value = chip.getAttribute('data-value');
    var field = document.getElementById(group + '-field');
    if (field) { field.value = value; }
    document.querySelectorAll('.budget[data-group="' + group + '"]').forEach(function (c) { c.classList.remove('is-active'); });
    chip.classList.add('is-active');
  });
});
document.querySelectorAll('.faq-item').forEach(function (item) {
  var btn = item.querySelector('.faq-q');
  var body = item.querySelector('.faq-body');
  var icon = item.querySelector('.faq-icon');
  btn.addEventListener('click', function () {
    var isOpen = body.style.maxHeight === '320px';
    document.querySelectorAll('.faq-body').forEach(function (b) { b.style.maxHeight = '0px'; });
    document.querySelectorAll('.faq-icon').forEach(function (ic) { ic.style.transform = 'rotate(0deg)'; });
    if (!isOpen) { body.style.maxHeight = '320px'; icon.style.transform = 'rotate(45deg)'; }
  });
});
</script>

<?php
get_footer();
