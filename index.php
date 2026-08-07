<?php
/**
 * Fallback Template for Astrix Media (posts, search, archives, 404)
 */
get_header();
?>

<div style="position: relative; background: #F5F1EA; overflow: hidden;">
  <div style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(140px, 20vh, 220px) clamp(28px, 5vw, 72px) clamp(90px, 13vh, 150px);">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article style="grid-column: 1 / span 10; margin-bottom: clamp(50px, 8vh, 90px); padding-bottom: clamp(50px, 8vh, 90px); border-bottom: 1px solid rgba(33,28,23,0.12);">
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(get_the_date()); ?></span>
          <h2 style="margin: 12px 0 20px; font-weight: 600; font-size: clamp(28px, 3.6vw, 48px); line-height: 1.1; letter-spacing: -0.03em;">
            <a href="<?php the_permalink(); ?>" style="color: #211C17;"><?php the_title(); ?></a>
          </h2>
          <div style="font-size: 15.5px; line-height: 1.7; color: #3A3229; max-width: 68ch;">
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <div style="grid-column: 1 / span 10;">
        <h1 style="margin: 0 0 20px; font-weight: 600; font-size: clamp(34px, 4.6vw, 72px); line-height: 1.05; letter-spacing: -0.035em;">Nothing here.</h1>
        <p style="font-size: 16px; line-height: 1.7; color: #3A3229;">The page you're looking for doesn't exist. <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #C56A37;">Back to home →</a></p>
      </div>
    <?php endif; ?>

  </div>
</div>

<?php
get_footer();
