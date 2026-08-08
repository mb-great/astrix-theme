<?php
/**
 * Generic Page Template for Astrix Media
 */
get_header();
?>

<?php
if (!astrix_render_page_blocks()) :
?>
<div style="position: relative; background: #F5F1EA; overflow: hidden;">
  <div style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(140px, 20vh, 220px) clamp(28px, 5vw, 72px) clamp(90px, 13vh, 150px);">

    <?php while (have_posts()) : the_post(); ?>
      <div style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px; margin-bottom: clamp(24px, 3vh, 36px);">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Astrix Media</span>
      </div>
      <h1 style="grid-column: 1 / span 10; margin: 0 0 clamp(36px, 6vh, 64px); font-weight: 600; font-size: clamp(34px, 4.6vw, 72px); line-height: 1.05; letter-spacing: -0.035em;"><?php the_title(); ?></h1>
      <div style="grid-column: 1 / span 8; font-size: 16px; line-height: 1.75; color: #3A3229; max-width: 68ch;">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>

  </div>
</div>
<?php endif; ?>

<?php
get_footer();
