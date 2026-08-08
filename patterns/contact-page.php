<?php
/**
 * Title: Astrix Contact Page
 * Slug: astrix/contact-page
 * Categories: astrix-pages, astrix
 * Inserter: true
 */
?>
<!-- wp:html -->
<section style="position:relative;background:#F5F1EA;padding:clamp(120px,16vh,200px) clamp(24px,4.5vw,64px) clamp(100px,14vh,160px);overflow:hidden;">
  <div style="max-width:1440px;margin:0 auto;display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(24px,3.5vw,48px);">
    <div style="grid-column:1 / span 6;display:flex;flex-direction:column;gap:24px;">
      <div style="display:inline-flex;align-items:center;gap:12px;">
        <span style="display:inline-block;width:22px;height:1px;background:#C56A37;"></span>
        <span style="font-size:11.5px;letter-spacing:0.32em;font-weight:600;color:#7A6F63;text-transform:uppercase;">Initiate Contact</span>
      </div>

      <h1 style="font-size:clamp(38px,5vw,76px);font-weight:600;line-height:1.04;letter-spacing:-0.035em;color:#211C17;margin:0;">
        Let's build something <em style="font-family:'Instrument Serif',serif;font-style:italic;font-weight:400;color:#C56A37;">unforgettable.</em>
      </h1>

      <p style="font-size:16.5px;line-height:1.65;color:#52473B;max-width:44ch;margin:0;">
        We accept a limited number of high-conviction partnerships each quarter. Share your vision and timeline with our senior partners.
      </p>

      <div style="margin-top:20px;border-top:1px solid rgba(33,28,23,0.12);padding-top:24px;display:flex;flex-direction:column;gap:12px;">
        <span style="font-size:11.5px;letter-spacing:0.2em;text-transform:uppercase;color:#7A6F63;font-weight:600;">Direct Inquiries</span>
        <a href="mailto:hello@astrixmedia.com" style="font-size:18px;font-weight:600;color:#211C17;text-decoration:none;">hello@astrixmedia.com</a>
      </div>
    </div>

    <div style="grid-column:7 / span 6;background:#211C17;color:#F5F1EA;border-radius:6px;padding:clamp(28px,4vw,48px);">
      <h3 style="font-size:22px;font-weight:600;color:#F5F1EA;margin:0 0 20px;">Send a Direct Message</h3>
      <form class="astrix-contact-form" style="display:flex;flex-direction:column;gap:16px;">
        <div>
          <label style="display:block;font-size:11.5px;letter-spacing:0.18em;text-transform:uppercase;color:#A39B8F;margin-bottom:6px;">Your Name</label>
          <input type="text" name="lead_name" required style="width:100%;padding:14px 18px;background:rgba(245,241,234,0.06);border:1px solid rgba(245,241,234,0.15);border-radius:4px;color:#F5F1EA;font-size:15px;outline:none;">
        </div>
        <div>
          <label style="display:block;font-size:11.5px;letter-spacing:0.18em;text-transform:uppercase;color:#A39B8F;margin-bottom:6px;">Work Email</label>
          <input type="email" name="lead_email" required style="width:100%;padding:14px 18px;background:rgba(245,241,234,0.06);border:1px solid rgba(245,241,234,0.15);border-radius:4px;color:#F5F1EA;font-size:15px;outline:none;">
        </div>
        <div>
          <label style="display:block;font-size:11.5px;letter-spacing:0.18em;text-transform:uppercase;color:#A39B8F;margin-bottom:6px;">Project Overview</label>
          <textarea name="lead_message" rows="4" required style="width:100%;padding:14px 18px;background:rgba(245,241,234,0.06);border:1px solid rgba(245,241,234,0.15);border-radius:4px;color:#F5F1EA;font-size:15px;outline:none;resize:vertical;"></textarea>
        </div>
        <button type="submit" style="background:#F5F1EA;color:#211C17;font-size:13px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;padding:16px 28px;border:none;border-radius:999px;cursor:pointer;align-self:flex-start;margin-top:8px;">
          Submit Inquiry →
        </button>
      </form>
    </div>
  </div>
</section>
<!-- /wp:html -->
