<?php
/**
 * Title: Astrix Footer Default
 * Slug: astrix/footer-default
 * Categories: astrix-footers, astrix
 * Block Types: core/template-part/footer
 * Inserter: true
 */
$theme_uri = get_template_directory_uri();
?>
<!-- wp:html -->
<footer style="position:relative;background:#17130F;color:#F5F1EA;padding:clamp(60px,10vh,100px) clamp(28px,5vw,72px) 36px;overflow:hidden;border-top:1px solid rgba(245,241,234,0.08);">
  <div style="max-width:1440px;margin:0 auto;display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(24px,3.5vw,48px);">
    <div style="grid-column:1 / span 4;display:flex;flex-direction:column;gap:20px;">
      <a href="/" style="display:flex;align-items:center;gap:14px;text-decoration:none;">
        <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix" style="width:48px;height:48px;object-fit:contain;">
        <span style="font-weight:700;font-size:20px;letter-spacing:0.22em;color:#F5F1EA;text-transform:uppercase;">ASTRIX</span>
        <span style="width:1px;height:16px;background:rgba(245,241,234,0.2);display:block;"></span>
        <span style="font-size:12px;letter-spacing:0.28em;color:rgba(245,241,234,0.6);font-weight:500;text-transform:uppercase;">MEDIA</span>
      </a>
      <p style="font-size:14px;line-height:1.65;color:rgba(245,241,234,0.65);max-width:32ch;margin:0;">
        A business transformation partner. We integrate strategy, brand, technology, and growth into one connected engine.
      </p>
      <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 14px;background:rgba(245,241,234,0.06);border-radius:100px;width:fit-content;margin-top:4px;">
        <span style="width:7px;height:7px;border-radius:50%;background:#38A169;box-shadow:0 0 8px #38A169;"></span>
        <span style="font-size:11.5px;letter-spacing:0.06em;color:rgba(245,241,234,0.8);text-transform:uppercase;font-weight:500;">Accepting Q3/Q4 Partnerships</span>
      </div>
    </div>

    <div style="grid-column:6 / span 2;display:flex;flex-direction:column;gap:12px;">
      <span style="font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#C56A37;font-weight:600;">Ecosystems</span>
      <a href="/services" class="ft-link">Brand Launch</a>
      <a href="/services" class="ft-link">Digital Growth</a>
      <a href="/services" class="ft-link">Commerce</a>
      <a href="/services" class="ft-link">Lead Generation</a>
      <a href="/services" class="ft-link">AI Marketing</a>
      <a href="/services" class="ft-link">Corporate Brand</a>
    </div>

    <div style="grid-column:8 / span 2;display:flex;flex-direction:column;gap:12px;">
      <span style="font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#C56A37;font-weight:600;">Studio</span>
      <a href="/studio" class="ft-link">Philosophy</a>
      <a href="/studio" class="ft-link">Methodology</a>
      <a href="/work" class="ft-link">Transformations</a>
      <a href="/perspective" class="ft-link">Perspectives</a>
      <a href="/contact" class="ft-link">Careers</a>
    </div>

    <div style="grid-column:10 / span 3;display:flex;flex-direction:column;gap:16px;">
      <span style="font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#C56A37;font-weight:600;">Direct Inquiries</span>
      <a href="mailto:hello@astrixmedia.com" style="font-size:16px;font-weight:500;color:#F5F1EA;text-decoration:none;">hello@astrixmedia.com</a>
      <div style="display:flex;gap:10px;margin-top:6px;">
        <a href="https://linkedin.com" target="_blank" rel="noopener" class="ft-social">LI</a>
        <a href="https://x.com" target="_blank" rel="noopener" class="ft-social">X</a>
        <a href="https://instagram.com" target="_blank" rel="noopener" class="ft-social">IG</a>
      </div>
    </div>

    <div style="grid-column:1 / span 12;border-top:1px solid rgba(245,241,234,0.08);padding-top:24px;margin-top:24px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;font-size:12px;color:rgba(245,241,234,0.45);">
      <span>&copy; <?php echo esc_html(date('Y')); ?> Astrix Media Group. All rights reserved.</span>
      <div style="display:flex;gap:20px;">
        <a href="/privacy-policy" style="color:rgba(245,241,234,0.45);text-decoration:none;">Privacy Policy</a>
        <a href="/terms" style="color:rgba(245,241,234,0.45);text-decoration:none;">Terms of Engagement</a>
      </div>
    </div>
  </div>
</footer>
<!-- /wp:html -->
