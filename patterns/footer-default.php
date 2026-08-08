<?php
/**
 * Title: Astrix Footer Default
 * Slug: astrix/footer-default
 * Categories: footer, astrix
 * Block Types: core/template-part/footer
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"footer","align":"full","className":"astrix-site-footer","style":{"spacing":{"padding":{"top":"clamp(60px, 9vh, 96px)","bottom":"clamp(32px, 4.5vh, 48px)","left":"clamp(24px, 4.5vw, 64px)","right":"clamp(24px, 4.5vw, 64px)"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#211C17","text":"#F5F1EA"}},"layout":{"type":"constrained","contentSize":"1440px"}} -->
<footer class="wp-block-group alignfull astrix-site-footer has-background" style="background-color:#211C17;color:#F5F1EA;margin-top:0;margin-bottom:0;padding-top:clamp(60px, 9vh, 96px);padding-bottom:clamp(32px, 4.5vh, 48px);padding-left:clamp(24px, 4.5vw, 64px);padding-right:clamp(24px, 4.5vw, 64px);">
  <div style="display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(24px,3.5vw,48px);margin-bottom:clamp(48px,6vh,72px);">
    <div style="grid-column:1 / span 5;">
      <div style="font-family:'Instrument Serif',serif;font-size:36px;font-style:italic;font-weight:700;color:#F5F1EA;margin-bottom:16px;">astrix<span style="color:#C56A37;">.</span></div>
      <p style="font-size:14.5px;line-height:1.7;color:#A39B8F;max-width:38ch;margin-bottom:24px;">Architecture, Intelligence & Cinematic Digital Production for market leaders and visionaries.</p>
      <div style="display:flex;align-items:center;gap:12px;">
        <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:#10b981;box-shadow:0 0 10px #10b981;"></span>
        <span style="font-size:12.5px;letter-spacing:0.06em;color:#A39B8F;text-transform:uppercase;">Accepting Select Engagements Q3/Q4</span>
      </div>
    </div>

    <div style="grid-column:6 / span 2;">
      <h4 style="font-size:11.5px;letter-spacing:0.28em;text-transform:uppercase;color:#C56A37;margin-bottom:18px;font-weight:600;">Ecosystem</h4>
      <div style="display:flex;flex-direction:column;gap:10px;">
        <a href="<?php echo esc_url(home_url('/services')); ?>" style="color:#E5DEC9;text-decoration:none;font-size:14px;">Services</a>
        <a href="<?php echo esc_url(home_url('/studio')); ?>" style="color:#E5DEC9;text-decoration:none;font-size:14px;">Studio</a>
        <a href="<?php echo esc_url(home_url('/perspective')); ?>" style="color:#E5DEC9;text-decoration:none;font-size:14px;">Perspective</a>
        <a href="<?php echo esc_url(home_url('/work')); ?>" style="color:#E5DEC9;text-decoration:none;font-size:14px;">Work</a>
      </div>
    </div>

    <div style="grid-column:8 / span 2;">
      <h4 style="font-size:11.5px;letter-spacing:0.28em;text-transform:uppercase;color:#C56A37;margin-bottom:18px;font-weight:600;">Social</h4>
      <div style="display:flex;flex-direction:column;gap:10px;">
        <a href="https://linkedin.com" target="_blank" rel="noopener" style="color:#E5DEC9;text-decoration:none;font-size:14px;">LinkedIn ↗</a>
        <a href="https://instagram.com" target="_blank" rel="noopener" style="color:#E5DEC9;text-decoration:none;font-size:14px;">Instagram ↗</a>
        <a href="https://x.com" target="_blank" rel="noopener" style="color:#E5DEC9;text-decoration:none;font-size:14px;">X / Twitter ↗</a>
      </div>
    </div>

    <div style="grid-column:10 / span 3;">
      <h4 style="font-size:11.5px;letter-spacing:0.28em;text-transform:uppercase;color:#C56A37;margin-bottom:18px;font-weight:600;">Direct Contact</h4>
      <p style="font-size:14px;color:#A39B8F;line-height:1.6;margin-bottom:8px;">Studio 402, Highline Tower<br>London & New York</p>
      <a href="mailto:hello@astrixmedia.com" style="color:#F5F1EA;font-size:14.5px;text-decoration:none;font-weight:500;">hello@astrixmedia.com</a>
    </div>
  </div>

  <div style="display:flex;align-items:center;justify-content:space-between;border-top:1px solid rgba(245,241,234,0.12);padding-top:24px;font-size:12.5px;color:#7A6F63;flex-wrap:wrap;gap:14px;">
    <div>© <?php echo date('Y'); ?> Astrix Media. All Rights Reserved. Built for Leaders.</div>
    <div style="display:flex;align-items:center;gap:20px;">
      <a href="<?php echo esc_url(home_url('/privacy')); ?>" style="color:#7A6F63;text-decoration:none;">Privacy Policy</a>
      <a href="<?php echo esc_url(home_url('/terms')); ?>" style="color:#7A6F63;text-decoration:none;">Terms of Service</a>
    </div>
  </div>
</footer>
<!-- /wp:group -->
