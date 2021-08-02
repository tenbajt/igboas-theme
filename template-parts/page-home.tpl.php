<?php
/**
 * View for homepage
 * 
 * @link https://tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage IGBoas
 * @since 1.0.0
 */
?>

<div class="hero" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);">
	<div class="hero__wrapper">
		<h1 class="hero__title"><?php the_title(); ?></h1>
		<?php if ( get_the_content() ): ?>
			<h2 class="hero__intro"><?php the_content(); ?></h2>
		<?php endif; ?>
	</div>
</div>

<div class="py-16 px-4">
	<div class="mx-auto max-w-page">
		<h3 class="text-black text-4xl md:text-5xl leading-none font-extrabold md:text-center">
			<?= $birth_category_title ?>
		</h3>
		<h4 class="mt-6 mx-auto max-w-2xl text-black-medium text-lg leading-snug md:text-center">
			<?= $birth_category_intro ?>
		</h4>
		<div class="mt-2 relative" data-tb-hook="tb-horizontal-scroll">
			<i class="material-icons tb-chevron">chevron_left</i>
			<ul class="row -mx-4 flex-no-wrap overflow-auto scrollbar-none">
				<?php foreach ( $birth_category_posts as $post ): setup_postdata( $post ); ?>
				<?php for ( $i = 0; $i < 8; $i++ ) : ?>
				<li class="col-12 col-sm-6 col-md-4 col-lg-3 px-4">
					<?php get_template_part( 'template-parts/excerpt_new-born' ); ?>
				</li>
				<?php endfor; ?>
				<?php wp_reset_postdata(); endforeach; ?>
			</ul>
			<i class="material-icons tb-chevron right-0">chevron_right</i>
		</div>
	</div>
</div>

<?php

$category = get_field( 'collection-category' );
$posts = get_field( 'collection-category-posts' );

?>

<div class="category-preview">
	<div class="category-preview__text">
		<h3 class="category-preview__title"><?= $category->name; ?></h3>
		<?php if ( $category->description ): ?>
			<h4 class="category-preview__intro"><?= $category->description; ?></h4>
		<?php endif; ?>
		<a class="category-preview__btn category-preview__btn--desktop" href="<?= get_category_link( $category ); ?>">Zobacz więcej</a>
	</div>
	<div class="category-preview__media">
		<i class="category-preview__chevron material-icons">arrow_back</i>
		<div class="category-preview__posts">
			<?php
			foreach ( $collection_category_posts as $post ):
				setup_postdata( $post );
				get_template_part( 'template-parts/excerpt_individual' );
				wp_reset_postdata();
			endforeach;
			?>
		</div>
		<i class="category-preview__chevron material-icons">arrow_forward</i>
		<div class="category-preview__btn-container">
			<a class="category-preview__btn category-preview__btn--mobile" href="<?= $collection_category_link ?>">Zobacz więcej</a>
		</div>
	</div>
</div>

<hr class="separator">

<div class="category-preview category-preview--reversed">
	<div class="category-preview__text">
		<h3 class="category-preview__title"><?= $available_category_title ?></h3>
		<?php if ( $available_category_has_intro ): ?>
			<h4 class="category-preview__intro"><?= $available_category_intro ?></h4>
		<?php endif; ?>
		<a class="category-preview__btn category-preview__btn--desktop" href="<?= $available_category_link ?>">Zobacz więcej</a>
	</div>
	<div class="category-preview__media">
		<i class="category-preview__chevron material-icons">arrow_back</i>
		<div class="category-preview__posts">
			<?php
			foreach ( $available_category_posts as $post ):
				setup_postdata( $post );
				for ( $i = 0; $i < 4; $i++ ):
					get_template_part( 'template-parts/excerpt_individual' );
				endfor;
				wp_reset_postdata();
			endforeach;
			?>
		</div>
		<i class="category-preview__chevron material-icons">arrow_forward</i>
		<div class="category-preview__btn-container">
			<a class="category-preview__btn category-preview__btn--mobile" href="<?= $available_category_link ?>">Zobacz więcej</a>
		</div>
	</div>
</div>

<div class="py-20 px-4">
<div class="mx-auto max-w-page">
<?php $new_born_category = get_field( 'new_born_category' ); ?>
<h3 class="text-black text-4xl md:text-5xl leading-none font-extrabold md:text-center"><?= $new_born_category->name; ?></h3>
<p class="mt-6 mx-auto max-w-2xl text-black-medium text-lg leading-snug md:text-center"><?= $new_born_category->description; ?></p>
<?php $new_born_posts = get_field( 'new_born_posts' ); ?>
<?php if ( $new_born_posts ) : ?>
<div class="mt-2 relative" data-tb-hook="tb-horizontal-scroll">
	<i class="material-icons tb-chevron">chevron_left</i>
	<ul class="row -mx-4 flex-no-wrap overflow-auto scrollbar-none">
		<?php foreach ( $new_born_posts as $post ) : ?>
		<?php setup_postdata( $post ); ?>
		<?php for ( $i = 0; $i < 8; $i++ ) : ?>
		<li class="col-12 col-sm-6 col-md-4 col-lg-3 px-4">
			<?php get_template_part( 'template-parts/excerpt_new-born' ); ?>
		</li>
		<?php endfor; ?>
		<?php wp_reset_postdata(); ?>
		<?php endforeach; ?>
	</ul>
	<i class="material-icons tb-chevron right-0">chevron_right</i>
</div>
<?php endif; ?>
</div>
</div>
<?php /* Category: Morphs */ ?>
<div class="px-4">
<hr class="mx-auto max-w-page">
</div>
<div class="py-16 px-4">
<div class="mx-auto max-w-page">
<div class="row -mx-4 items-center">
	<div class="col-12 col-md-6 py-12 px-4">
		<?php $morph_category = get_field( 'morph_category' ); ?>
		<h3 class="text-black text-4xl md:text-5xl leading-none font-extrabold"><?= $morph_category->name; ?></h3>
		<p class="mt-6 max-w-2xl text-black-medium text-lg leading-snug"><?= $morph_category->description; ?></p>
		<a class="btn mt-8 py-3 px-6 bg-green-700 hover:bg-green-800 text-white text-sm font-semibold uppercase" href="<?= get_category_link( $morph_category->term_id ) ?>">Zobacz więcej</a>
	</div>
	<div class="col-12 col-md-6 py-12 px-4">
		<?php $morph_posts = get_field( 'morph_posts' ); ?>
		<?php if ( $morph_posts ) : ?>
		<?php foreach ( $morph_posts as $post ) : ?>
		<?php setup_postdata( $post ); ?>
		<?php for ( $i = 0; $i < 3; $i++ ) : ?>
		<a class="mb-4 last:mb-0 md:mb-0 block py-4 px-6 shadow rounded-lg transition-shadow-transform hover:no-underline hover:shadow-xl hover:-translate-y-1" href="<?= get_permalink() ?>">
			<div class="row -mx-4 items-center">
				<div class="col-12 col-sm-4 py-2 px-4">
					<div class="w-full pt-46% rounded bg-cover bg-center" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div>
				</div>
				<div class="col-12 col-md-8 py-2 px-4">
					<h3 class="text-black text-lg md:text-xl font-normal"><?php the_title(); ?></h3>
					<?php if ( get_field( 'description' ) ) : ?>
					<p class="mt-2 text-black-medium text-sm md:text-base"><?php the_field( 'description' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</a>
		<?php endfor; ?>
		<?php wp_reset_postdata(); ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
</div>
</div>
	
<?php get_footer(); ?>

