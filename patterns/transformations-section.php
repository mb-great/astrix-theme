<?php
/**
 * Title: Slide 16: Chapter 6 (Transformations & Case Studies)
 * Slug: astrix/transformations-section
 * Categories: astrix
 * Inserter: true
 */
$theme_uri = get_template_directory_uri();
?>
<!-- wp:html -->
<section class="sec-transformations-wrap" style="position:relative;background:#F5F1EA;padding:clamp(100px,16vh,180px) clamp(24px,4.5vw,64px);overflow:hidden;">
  <div style="max-width:1440px;margin:0 auto;display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(24px,3.5vw,48px);">
    <div style="grid-column:1 / span 12;display:flex;align-items:center;gap:12px;margin-bottom:12px;">
      <span style="display:inline-block;width:22px;height:1px;background:#C56A37;"></span>
      <span style="font-size:11.5px;letter-spacing:0.32em;font-weight:600;color:#7A6F63;text-transform:uppercase;">Chapter Six · Transformations</span>
    </div>

    <h2 style="grid-column:1 / span 10;font-size:clamp(36px,4.5vw,72px);font-weight:600;line-height:1.05;letter-spacing:-0.035em;color:#211C17;margin:0 0 clamp(36px,5vh,64px);">
      Proof in the work. Results in the market.
    </h2>

    <div style="grid-column:1 / span 6;background:#EDE8DF;border:1px solid #E5DEC9;border-radius:4px;overflow:hidden;display:flex;flex-direction:column;">
      <div style="aspect-ratio:16/10;background:#DDD5C7;position:relative;overflow:hidden;">
        <img src="<?php echo esc_url($theme_uri . '/assets/deck-01-hero.webp'); ?>" alt="Nexus Capital" style="width:100%;height:100%;object-fit:cover;display:block;">
      </div>
      <div style="padding:clamp(24px,3vw,36px);display:flex;flex-direction:column;gap:12px;flex:1;">
        <span style="font-size:11px;letter-spacing:0.24em;color:#C56A37;text-transform:uppercase;font-weight:600;">Fintech & Private Capital</span>
        <h3 style="font-size:24px;font-weight:600;color:#211C17;margin:0;">Nexus Capital Platform</h3>
        <p style="font-size:14.5px;line-height:1.65;color:#52473B;margin:0;">Complete institutional brand overhaul and global wealth portal resulting in +340% inbound deal velocity within 9 months.</p>
      </div>
    </div>

    <div style="grid-column:7 / span 6;background:#211C17;border-radius:4px;overflow:hidden;display:flex;flex-direction:column;color:#F5F1EA;">
      <div style="aspect-ratio:16/10;background:#1A1611;position:relative;overflow:hidden;">
        <img src="<?php echo esc_url($theme_uri . '/assets/deck-02-invisible.webp'); ?>" alt="Aura Health" style="width:100%;height:100%;object-fit:cover;display:block;">
      </div>
      <div style="padding:clamp(24px,3vw,36px);display:flex;flex-direction:column;gap:12px;flex:1;">
        <span style="font-size:11px;letter-spacing:0.24em;color:#C56A37;text-transform:uppercase;font-weight:600;">AI Biotechnology</span>
        <h3 style="font-size:24px;font-weight:600;color:#F5F1EA;margin:0;">Aura Health Intelligence</h3>
        <p style="font-size:14.5px;line-height:1.65;color:#A39B8F;margin:0;">Brand architecture, interactive 3D science visualizer, and Series B investor narrative securing $42M funding round.</p>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
