<?php
/**
 * Title: Slide 5: Hero / Prologue (The Belief)
 * Slug: astrix/hero-section
 * Categories: astrix
 * Inserter: true
 */
$theme_uri = get_template_directory_uri();
?>
<!-- wp:html -->
<section class="sec-hero-wrap" style="position:relative;background:#F5F1EA;color:#211C17;padding:clamp(100px,14vh,160px) clamp(24px,4.5vw,64px) clamp(60px,8vh,100px);overflow:hidden;">
  <div style="max-width:1440px;margin:0 auto;display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(24px,3.5vw,48px);align-items:center;">
    <div style="grid-column:1 / span 7;display:flex;flex-direction:column;gap:clamp(20px,3vh,32px);">
      <div style="display:inline-flex;align-items:center;gap:12px;">
        <span style="display:inline-block;width:22px;height:1px;background:#C56A37;"></span>
        <span style="font-size:11.5px;letter-spacing:0.32em;font-weight:600;color:#7A6F63;text-transform:uppercase;">A Business Transformation Partner</span>
      </div>

      <h1 style="font-size:clamp(40px,5.4vw,84px);font-weight:600;line-height:1.02;letter-spacing:-0.035em;color:#211C17;margin:0;">
        Where strategy meets story.<br>
        Built as <em style="font-family:'Instrument Serif',serif;font-style:italic;font-weight:400;color:#C56A37;">one.</em>
      </h1>

      <p style="font-size:clamp(16px,1.4vw,20px);line-height:1.55;font-weight:500;color:#3A3229;max-width:46ch;margin:0;">
        Strategy, brand, technology, and marketing were never meant to operate in separate rooms. At Astrix, we bring them together as one connected growth ecosystem.
      </p>

      <div style="margin-top:8px;display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
        <a href="/contact" style="display:inline-flex;align-items:center;gap:12px;background:#211C17;color:#F5F1EA;font-size:13.5px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;padding:16px 32px;border-radius:999px;text-decoration:none;">
          <span>Start a Conversation</span>
          <span>→</span>
        </a>
        <a href="/work" style="font-size:13.5px;font-weight:600;letter-spacing:0.04em;color:#211C17;text-decoration:underline;text-underline-offset:4px;">
          View Selected Work
        </a>
      </div>
    </div>

    <div style="grid-column:8 / span 5;position:relative;border-radius:4px;overflow:hidden;min-height:clamp(380px,55vh,620px);background:#EFE9DF;">
      <img src="<?php echo esc_url($theme_uri . '/assets/deck-01-hero.webp'); ?>" alt="Astrix Hero" style="width:100%;height:100%;object-fit:cover;display:block;">
    </div>
  </div>
</section>
<!-- /wp:html -->
