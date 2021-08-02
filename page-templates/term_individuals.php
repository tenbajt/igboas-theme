<?php

namespace TenbajtTheme;

$term = new Term();

get_header(); ?>

<div class="hero" style="background-image:url(<?= $term->get_thumbnail_url(); ?>);">
	<div class="hero__overlay"></div>
	<div class="hero__inner">
		<h6 class="hero__badge">
			<?= $term->get_top_most_parent()->get_name(); ?>
		</h6>
		<h1 class="hero__heading">
			<?= $term->get_name(); ?>
		</h1>
		<?php if ( $term->has_description() ): ?>
			<p class="hero__lead">
				<?= $term->get_description(); ?>
			</p>
		<?php endif; ?>
	</div>
</div>
<div class="individuals-list">
	<div class="individuals-list__inner">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/miniature_individual' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
