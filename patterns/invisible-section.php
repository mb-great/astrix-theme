<?php
/**
 * Title: Slide 7-8: Chapter 2 (Why Businesses Stay Invisible)
 * Slug: astrix/invisible-section
 * Categories: astrix
 * Inserter: true
 */
$theme_uri = get_template_directory_uri();
?>
<!-- wp:html -->
<section class="sec-invisible-wrap" style="position:relative;background:#F5F1EA;padding:clamp(100px,16vh,180px) clamp(24px,4.5vw,64px);overflow:hidden;">
  <div style="max-width:1440px;margin:0 auto;display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(24px,3.5vw,48px);">
    <div style="grid-column:1 / span 12;display:flex;align-items:center;gap:12px;">
      <span style="display:inline-block;width:22px;height:1px;background:#C56A37;"></span>
      <span style="font-size:11.5px;letter-spacing:0.32em;font-weight:600;color:#7A6F63;text-transform:uppercase;">Chapter Two · Why Businesses Stay Invisible</span>
    </div>

    <h2 style="grid-column:1 / span 11;font-size:clamp(36px,5vw,80px);font-weight:600;line-height:1.06;letter-spacing:-0.035em;color:#211C17;margin:16px 0 36px;">
      Great work nobody knows about isn't rare. It's the default.
    </h2>

    <div style="grid-column:1 / span 12;border-radius:4px;overflow:hidden;aspect-ratio:16/9;min-height:300px;background:#EDE8DF;position:relative;">
      <img src="<?php echo esc_url($theme_uri . '/assets/deck-02-invisible.webp'); ?>" alt="Astrix Chapter 2" style="width:100%;height:100%;object-fit:cover;display:block;">
    </div>

    <div style="grid-column:2 / span 10;margin-top:clamp(40px,6vh,72px);">
      <p style="margin:0;font-family:'Instrument Serif',serif;font-style:italic;font-size:clamp(28px,4.2vw,62px);line-height:1.18;color:#211C17;">
        The gap between an extraordinary product and market preference is rarely quality. It is almost always narrative, presence, and distribution.
      </p>
    </div>
  </div>
</section>
<!-- /wp:html -->
