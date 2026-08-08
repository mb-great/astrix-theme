<?php
/**
 * Title: Astrix Header Default
 * Slug: astrix/header-default
 * Categories: astrix-headers, astrix
 * Block Types: core/template-part/header
 * Inserter: true
 */
$theme_uri = get_template_directory_uri();
?>
<!-- wp:html -->
<header class="astrix-site-header" style="position:fixed;top:0;left:0;right:0;z-index:900;background:rgba(245,241,234,0.92);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid rgba(33,28,23,0.06);">
  <div style="max-width:1440px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;padding:18px clamp(24px,4.5vw,64px);">
    <a href="/" style="display:flex;align-items:center;gap:14px;text-decoration:none;">
      <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix" style="width:clamp(44px,4.5vw,56px);height:clamp(44px,4.5vw,56px);display:block;object-fit:contain;">
      <span style="font-weight:700;font-size:clamp(18px,1.8vw,22px);letter-spacing:0.22em;color:#211C17;text-transform:uppercase;">ASTRIX</span>
      <span style="width:1px;height:16px;background:#D6CDBE;display:block;"></span>
      <span style="font-size:clamp(11px,1.1vw,13px);letter-spacing:0.28em;color:#9A8E7D;font-weight:500;text-transform:uppercase;">MEDIA</span>
    </a>

    <nav class="desktop-nav" style="display:flex;align-items:center;gap:clamp(20px,2.8vw,36px);">
      <a href="/services" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Services</a>
      <a href="/studio" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Studio</a>
      <a href="/perspective" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Perspective</a>
      <a href="/work" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Work</a>
      <a href="/contact" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Contact</a>
    </nav>

    <div class="header-cta" style="display:flex;align-items:center;gap:14px;">
      <a href="/contact" class="axnav-cta" style="display:inline-flex;align-items:center;gap:8px;padding:9px 22px;border-radius:100px;border:1px solid #D6CDBE;color:#211C17;font-size:13px;letter-spacing:0.04em;text-decoration:none;font-weight:500;transition:all 0.3s ease;">
        <span>Let's Connect!</span>
        <span style="font-size:14px;">→</span>
      </a>
    </div>
  </div>
</header>
<!-- /wp:html -->
