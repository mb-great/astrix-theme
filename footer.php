<?php
/**
 * Footer template for Astrix Media
 */
$theme_uri = get_template_directory_uri();
?>
<footer style="position: relative; overflow: hidden; background: linear-gradient(160deg, #221C16, #14100C 72%); color: #F5F1EA;">
  <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(70% 90% at 6% 0%, rgba(197,106,55,0.16), rgba(197,106,55,0) 55%);"></div>

  <div style="position: relative; z-index: 1; padding: clamp(70px,11vh,120px) clamp(28px,5vw,72px) 0;">
    <div class="ft-grid" style="display: grid; grid-template-columns: 1.6fr 1fr 1fr 1.1fr; gap: clamp(36px,4vw,64px);">

      <div class="ft-brand" style="display: flex; flex-direction: column; gap: 22px;">
        <div style="display: flex; align-items: center; gap: 12px;">
          <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix Media logo" style="width: clamp(52px, 5vw, 67.5px); height: clamp(52px, 5vw, 67.5px); object-fit: contain; display: block;">
          <span style="font-weight: 700; font-size: clamp(20px, 2vw, 25.3px); letter-spacing: 0.22em;">ASTRIX</span>
          <span style="width: 1px; height: 15px; background: rgba(245,241,234,0.3); display: block;"></span>
          <span style="font-size: clamp(11px, 1.15vw, 14.4px); letter-spacing: 0.28em; color: rgba(245,241,234,0.6); font-weight: 500;">MEDIA</span>
        </div>
        <p style="margin: 0; max-width: 34ch; font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(22px,2.4vw,30px); line-height: 1.2; color: #F5F1EA;">
          We turn businesses into the brands people <span style="color: #C56A37;">choose.</span>
        </p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="ax-cta-outline-light" data-magnetic style="display: inline-flex; align-items: center; gap: 10px; align-self: flex-start; margin-top: 4px; color: #F5F1EA; font-size: 14px; font-weight: 500; border: 1px solid rgba(245,241,234,0.24); border-radius: 100px; padding: 12px 24px; transition: background 0.35s ease, color 0.35s ease, border-color 0.35s ease;">
          Start a Conversation <span>→</span>
        </a>
      </div>

      <div style="display: flex; flex-direction: column; gap: 16px;">
        <span style="font-size: 11px; letter-spacing: 0.28em; text-transform: uppercase; color: rgba(245,241,234,0.45); font-weight: 500;">Explore</span>
        <?php /* Deck slide 19: About Us · Our work · Our Expertise · Lets Talk */ ?>
        <div style="display: flex; flex-direction: column; gap: 4px;">
          <a href="<?php echo esc_url(home_url('/studio')); ?>" class="ft-link">About Us</a>
          <a href="<?php echo esc_url(home_url('/work')); ?>" class="ft-link">Our Work</a>
          <a href="<?php echo esc_url(home_url('/our-expertise')); ?>" class="ft-link">Our Expertise</a>
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="ft-link">Let's Talk</a>
        </div>
      </div>

      <div style="display: flex; flex-direction: column; gap: 16px;">
        <?php /* Deck slide 19 renames this column and its three items */ ?>
        <span style="font-size: 11px; letter-spacing: 0.28em; text-transform: uppercase; color: rgba(245,241,234,0.45); font-weight: 500;">Capabilities</span>
        <div style="display: flex; flex-direction: column; gap: 4px;">
          <a href="<?php echo esc_url(home_url('/services')); ?>" class="ft-link">Brand Strategy</a>
          <a href="<?php echo esc_url(home_url('/services')); ?>" class="ft-link">GTM Strategy</a>
          <a href="<?php echo esc_url(home_url('/services')); ?>" class="ft-link">Digital Strategy</a>
        </div>
      </div>

      <div style="display: flex; flex-direction: column; gap: 16px;">
        <span style="font-size: 11px; letter-spacing: 0.28em; text-transform: uppercase; color: rgba(245,241,234,0.45); font-weight: 500;">Connect</span>
        <a href="mailto:<?php echo esc_attr(astrix_setting('email')); ?>" style="color: #F5F1EA; font-size: 15px; font-weight: 500;"><?php echo esc_html(astrix_setting('email')); ?></a>
        <a href="<?php echo esc_url(astrix_tel('phone_primary')); ?>" style="color: #F5F1EA; font-size: 15px; font-weight: 500;"><?php echo esc_html(astrix_setting('phone_primary')); ?></a>
        <a href="<?php echo esc_url(astrix_tel('phone_secondary')); ?>" style="color: #F5F1EA; font-size: 15px; font-weight: 500;"><?php echo esc_html(astrix_setting('phone_secondary')); ?></a>
        <?php /* Deck slide 19: "Remove Studio in India", add the real registered address. */ ?>
        <p style="margin: 0; font-size: 13.5px; line-height: 1.65; color: rgba(245,241,234,0.6);">
          <?php echo astrix_address_html(); // already escaped per line ?>
        </p>
        <div style="display: flex; gap: 10px; margin-top: 4px;">
          <a href="<?php echo esc_url(astrix_tel('phone_primary')); ?>" class="ft-social" aria-label="Call us">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.24.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2Z" fill="currentColor"/></svg>
          </a>
          <a href="<?php echo esc_url(astrix_whatsapp_url()); ?>" target="_blank" rel="noopener" class="ft-social" aria-label="WhatsApp">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.9 11.9L4 20l4.2-1.1a7.9 7.9 0 0 0 3.85 1h.01a7.94 7.94 0 0 0 5.54-13.58ZM12.05 18.53h-.01a6.6 6.6 0 0 1-3.36-.92l-.24-.14-2.5.65.67-2.43-.16-.25a6.58 6.58 0 0 1 10.2-8.15 6.53 6.53 0 0 1 1.95 4.66 6.6 6.6 0 0 1-6.55 6.58Z" fill="currentColor"/></svg>
          </a>
          <a href="<?php echo esc_url(astrix_setting('instagram')); ?>" target="_blank" rel="noopener" class="ft-social" aria-label="Instagram">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2.5" y="2.5" width="19" height="19" rx="5.5" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4.3" stroke="currentColor" stroke-width="1.6"/><circle cx="17.4" cy="6.6" r="1.15" fill="currentColor"/></svg>
          </a>
          <a href="<?php echo esc_url(astrix_setting('linkedin')); ?>" target="_blank" rel="noopener" class="ft-social" aria-label="LinkedIn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.98 3.5a2.48 2.48 0 1 0 0 4.96 2.48 2.48 0 0 0 0-4.96ZM3 9.98h3.96V21H3V9.98ZM10.02 9.98h3.79v1.51h.05c.53-.99 1.82-2.03 3.75-2.03 4.01 0 4.75 2.56 4.75 5.9V21h-3.96v-5.02c0-1.2-.02-2.74-1.68-2.74-1.68 0-1.94 1.3-1.94 2.65V21h-3.96V9.98Z" fill="currentColor"/></svg>
          </a>
          <a href="<?php echo esc_url(astrix_setting('facebook')); ?>" target="_blank" rel="noopener" class="ft-social" aria-label="Facebook">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 21v-7.6h2.6l.4-3h-3v-1.9c0-.87.24-1.46 1.5-1.46h1.6V4.35c-.28-.04-1.23-.12-2.34-.12-2.31 0-3.9 1.4-3.9 3.98v2.2H8.75v3h2.61V21h3.14Z" fill="currentColor"/></svg>
          </a>
        </div>
      </div>

    </div>

    <div style="display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; flex-wrap: wrap; margin-top: clamp(50px,8vh,90px); padding-bottom: clamp(28px,4vh,44px);">
      <span style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; font-size: clamp(64px,15vw,220px); line-height: 0.82; letter-spacing: -0.03em; color: rgba(245,241,234,0.09); user-select: none;">Astrix</span>
    </div>

    <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap; padding: 22px 0 30px; border-top: 1px solid rgba(245,241,234,0.12); font-size: 12.5px; color: rgba(245,241,234,0.5);">
      <span>&copy; <?php echo date('Y'); ?> <?php echo esc_html(astrix_setting('copyright')); ?></span>
      <div style="display: flex; gap: 24px; align-items: center; flex-wrap: wrap;">
        <a href="#" class="ax-footer-meta-link" style="color: rgba(245,241,234,0.5);">Privacy</a>
        <a href="#" class="ax-footer-meta-link" style="color: rgba(245,241,234,0.5);">Terms</a>
        <a href="#" class="ax-footer-meta-link" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;" style="color: rgba(245,241,234,0.5);">Back to top ↑</a>
      </div>
    </div>
  </div>
</footer>

<!-- ── Floating WhatsApp + Call buttons (hidden once the footer scrolls into view) ── -->
<div id="astrix-float-group" style="position: fixed; right: clamp(14px, 3vw, 28px); bottom: clamp(14px, 3vw, 28px); z-index: 9998; display: flex; flex-direction: column; gap: 12px; align-items: center; opacity: 1; transform: translateY(0); transition: opacity 0.3s ease, transform 0.3s ease;">
  <a href="<?php echo esc_url(astrix_whatsapp_url()); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp" class="ax-float-btn" style="background: #25D366;">
    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.9 11.9L4 20l4.2-1.1a7.9 7.9 0 0 0 3.85 1h.01a7.94 7.94 0 0 0 5.54-13.58ZM12.05 18.53h-.01a6.6 6.6 0 0 1-3.36-.92l-.24-.14-2.5.65.67-2.43-.16-.25a6.58 6.58 0 0 1 10.2-8.15 6.53 6.53 0 0 1 1.95 4.66 6.6 6.6 0 0 1-6.55 6.58Zm3.6-4.93c-.2-.1-1.17-.58-1.35-.64-.18-.07-.32-.1-.45.1-.13.2-.51.64-.63.77-.11.13-.23.14-.43.05a5.4 5.4 0 0 1-1.59-.98 5.98 5.98 0 0 1-1.1-1.37c-.12-.2 0-.3.09-.4.09-.1.2-.23.3-.35.1-.11.13-.2.2-.32.06-.13.03-.24-.02-.34-.05-.1-.45-1.08-.61-1.48-.16-.39-.33-.33-.45-.34h-.38c-.13 0-.34.05-.52.24-.18.2-.68.66-.68 1.6 0 .95.7 1.86.79 1.99.1.13 1.37 2.09 3.32 2.93.46.2.83.32 1.11.41.47.15.9.13 1.24.08.38-.06 1.17-.48 1.33-.94.17-.46.17-.86.12-.94-.05-.09-.18-.14-.38-.24Z" fill="#fff"/></svg>
  </a>
  <a href="<?php echo esc_url(astrix_tel('phone_primary')); ?>" aria-label="Call us" class="ax-float-btn" style="background: #211C17;">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.24.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2Z" fill="#F5F1EA"/></svg>
  </a>
</div>
<style>
.ax-float-btn { width: 54px; height: 54px; border-radius: 100px; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 24px -6px rgba(0,0,0,0.4); transition: transform 0.3s cubic-bezier(0.16,1,0.3,1), box-shadow 0.3s ease; }
.ax-float-btn:hover { transform: translateY(-3px) scale(1.06); box-shadow: 0 12px 30px -6px rgba(0,0,0,0.5); }
#astrix-float-group.ax-float-hidden { opacity: 0; transform: translateY(12px); pointer-events: none; }
@media (max-width: 640px) {
  .ax-float-btn { width: 46px; height: 46px; }
  .ax-float-btn svg { width: 20px; height: 20px; }
}
</style>
<script>
(function () {
  var group = document.getElementById('astrix-float-group');
  var footerEl = document.querySelector('footer');
  if (!group || !footerEl || !('IntersectionObserver' in window)) return;
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      group.classList.toggle('ax-float-hidden', entry.isIntersecting);
    });
  }, { root: null, threshold: 0, rootMargin: '0px' });
  observer.observe(footerEl);
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
