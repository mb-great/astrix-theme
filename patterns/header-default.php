<?php
/**
 * Title: Astrix Header Default
 * Slug: astrix/header-default
 * Categories: astrix-headers, astrix
 * Block Types: core/template-part/header
 * Inserter: true
 */
?>
<!-- wp:html -->
<header class="astrix-site-header" style="position:fixed;top:0;left:0;right:0;z-index:900;background:rgba(245,241,234,0.88);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid rgba(33,28,23,0.06);">
  <div style="max-width:1440px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;padding:clamp(16px,2.2vh,22px) clamp(24px,4.5vw,64px);">
    <a href="/" class="brand" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
      <span style="font-family:'Instrument Serif',serif;font-size:26px;font-style:italic;font-weight:700;letter-spacing:-0.03em;color:#211C17;">astrix</span>
      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#C56A37;"></span>
    </a>

    <nav class="desktop-nav" style="display:flex;align-items:center;gap:36px;">
      <a href="/services" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Services</a>
      <a href="/studio" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Studio</a>
      <a href="/perspective" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Perspective</a>
      <a href="/work" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Work</a>
      <a href="/contact" style="font-size:13.5px;letter-spacing:0.04em;text-transform:uppercase;color:#211C17;text-decoration:none;font-weight:500;">Contact</a>
    </nav>

    <div class="header-cta" style="display:flex;align-items:center;gap:14px;">
      <a href="/contact" class="btn-pill" style="display:inline-flex;align-items:center;gap:8px;padding:9px 20px;border-radius:999px;background:#211C17;color:#F5F1EA;font-size:12.5px;letter-spacing:0.08em;text-transform:uppercase;text-decoration:none;font-weight:600;">
        <span>Book Session</span>
        <span style="font-size:14px;">→</span>
      </a>
    </div>
  </div>
</header>
<!-- /wp:html -->
