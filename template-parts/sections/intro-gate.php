<?php
/**
 * Section: Intro Gate
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── 6-Hour Intro Animation Gate (Homepage only) ── -->
<div id="astrix-intro-overlay" style="position: fixed; inset: 0; z-index: 9999; background: #0a0805; display: none; opacity: 1; transition: opacity 0.7s ease;">
  <iframe id="astrix-intro-frame" src="<?php echo esc_url($theme_uri . '/assets/astrix-intro.html'); ?>" style="width: 100%; height: 100%; border: none; display: block;" title="Astrix Intro"></iframe>
</div>
<script>
(function () {
  var KEY = 'astrixIntroTimestamp';
  var SIX_HOURS = 6 * 60 * 60 * 1000;
  var last = localStorage.getItem(KEY);
  var now = Date.now();
  if (last && now - parseInt(last, 10) <= SIX_HOURS) return;
  localStorage.setItem(KEY, String(now));
  var overlay = document.getElementById('astrix-intro-overlay');
  overlay.style.display = 'block';
  window.addEventListener('message', function (e) {
    if (e.data === 'introComplete') {
      overlay.style.opacity = '0';
      overlay.style.pointerEvents = 'none';
      setTimeout(function () { overlay.style.display = 'none'; }, 800);
    }
  });
})();
</script>
