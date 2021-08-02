<?php

namespace TenbajtTheme;

$term = new Term();

get_header(); ?>

<div class="hero">
  <div class="hero__inner">
    <h1 class="hero__heading">
      <?= $term->get_direct_parent()->get_name() . ' ' . $term->get_name() ?>
    </h1>
    <?php if ( $term->has_description() ): ?>
      <p class="hero__lead">
        <?= $term->get_description(); ?>
      </p>
    <?php endif; ?>
  </div>
</div>
<div class="newborns-list">
  <div class="newborns-list__inner">
    <?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/miniature_newborn' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
