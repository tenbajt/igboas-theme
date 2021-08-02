<?php
/**
 * Template for home page
 * 
 * @link https://tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage IGBoas
 * @since 1.0.0
 */
?>

<div class="hero">
	<div class="hero__background" style="background-image:url(<?= $hero->get_background_image_url(); ?>);"></div>
	<div class="hero__wrapper">
		<h1 class="hero__title"><?= $hero->get_title(); ?></h1>
		<?php if ( $hero->get ): ?>
			<h2 class="hero__intro"><?= $hero->get_intro(); ?></h2>
		<?php endif; ?>
	</div>
</div>

<div class="collection-feature">
  <div class="collection-feature__description">
    <h3 class="collection-feature__title"><?= $collection_feature->title ?></h3>
    <?php if ( $collection_feature->intro ): ?>
      <h4 class="collection-feature__intro"><?= $collection_feature_intro ?></h4>
    <?php endif; ?>
    <a class="collection-feature__btn--desktop" href="<?= $collection_feature_link ?>">Zobacz więcej</a>
  </div>
  <div class="collection-feature__media">
    <i class="collection-feature__chevron material-icons">arrow_back</i>
    <div class="collection-feature__posts">
      <?php foreach ( $collection_posts as $collection_post ): ?>

      <?php endforeach; ?>
    </div>
    <i class="collection-feature__chevron material-icons">arrow_forward</i>
    <a class="collection-feature__btn--mobile" href="<?= $link ?>">Zobacz więcej</a>
    </div>
  </div>
</div>