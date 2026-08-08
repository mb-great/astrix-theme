<?php
/**
 * Title: Astrix Custom <div> Container (12-Column Luxury Grid)
 * Slug: astrix/custom-div-block
 * Categories: astrix
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"astrix-custom-grid-block","style":{"spacing":{"padding":{"top":"clamp(80px, 12vh, 140px)","bottom":"clamp(80px, 12vh, 140px)","left":"clamp(28px, 5vw, 72px)","right":"clamp(28px, 5vw, 72px)"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#F5F1EA"}},"layout":{"type":"constrained","contentSize":"1440px"}} -->
<section class="wp-block-group alignfull astrix-custom-grid-block has-background" style="background-color:#F5F1EA;margin-top:0;margin-bottom:0;padding-top:clamp(80px, 12vh, 140px);padding-bottom:clamp(80px, 12vh, 140px);padding-left:clamp(28px, 5vw, 72px);padding-right:clamp(28px, 5vw, 72px);">
  <div style="display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(20px,3vw,36px);">
    <div style="grid-column:1 / span 12;margin-bottom:24px;">
      <div style="display:inline-flex;align-items:center;gap:12px;margin-bottom:12px;">
        <span style="display:inline-block;width:22px;height:1px;background:#C56A37;"></span>
        <span style="font-size:11.5px;letter-spacing:0.32em;font-weight:600;color:#7A6F63;text-transform:uppercase;">Custom Block Header</span>
      </div>
      <h2 style="font-size:clamp(32px,4.5vw,56px);font-weight:600;letter-spacing:-0.035em;line-height:1.1;color:#211C17;margin:0;">Write Custom Narrative Headline</h2>
    </div>

    <div style="grid-column:1 / span 6;background:#EDE8DF;border:1px solid #E5DEC9;border-radius:4px;padding:32px;">
      <h3 style="font-size:20px;font-weight:600;color:#211C17;margin:0 0 12px;">Column 1 · Content</h3>
      <p style="font-size:15px;line-height:1.7;color:#52473B;margin:0;">Insert bespoke copy, interactive diagrams, or custom markup here.</p>
    </div>

    <div style="grid-column:7 / span 6;background:#211C17;color:#F5F1EA;border-radius:4px;padding:32px;">
      <h3 style="font-size:20px;font-weight:600;color:#F5F1EA;margin:0 0 12px;">Column 2 · Dark Contrast</h3>
      <p style="font-size:15px;line-height:1.7;color:#A39B8F;margin:0;">Matches Astrix luxury design language with high contrast and smooth spacing.</p>
    </div>
  </div>
</section>
<!-- /wp:group -->
