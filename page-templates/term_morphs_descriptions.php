<?php

namespace TenbajtTheme;

$term = new Term();
$term_descriptions = $term->get_term_descriptions();
$term_projects = $term->get_term_projects();

get_header(); ?>

<div class="hero">
	<div class="hero__inner">
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
<div class="descriptions-list">
	<div class="descriptions-list__inner">
		<div class="description-item">
			<h3 class="description-item__heading">
				<?= $term_descriptions->get_name(); ?>
			</h3>
			<?php foreach ( $term_descriptions->get_posts() as $post ): ?>
				<a class="morph-item" href="<?= $post->get_url(); ?>">
					<img class="morph-item__thumbnail" style="background-image:url(<?= $post->get_thumbnail_url(); ?>);">
					<h2 class="morph-item__heading">
						<?= $post->get_title(); ?>
					</h2>
					<p class="morph-item__lead">
						<?= $post->get_excerpt(); ?>
					</p>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="description-item">
			<h3 class="description-item__heading">
				<?= $term_projects->get_name(); ?>
			</h3>
			<?php foreach ( $term_projects->get_posts() as $post ): ?>
				<a class="morph-item" href="<?= $post->get_url(); ?>">
					<h2 class="morph-item__heading">
						<?= $post->get_title(); ?>
					</h2>
					<p class="morph-item__lead">
						<?= $post->get_excerpt(); ?>
					</p>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>