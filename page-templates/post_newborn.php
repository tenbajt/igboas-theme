<?php
/**
 * Template Name: Noworodek
 * Template Post Type: post
 * 
 * @link https://tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage IGBoas
 * @since 1.0.0
 */

namespace TenbajtTheme;

get_header();

if( have_posts() ):
  while( have_posts() ):
    the_post(); 
    
    $newborn = new Post_Newborn(); ?>

    <div class="newborn-post">
      <img class="newborn-post__cover" style="background-image:url(<?= $newborn->get_thumbnail_url(); ?>);">
      <div class="newborn-post__inner">
        <div class="newborn-post__header">
          <div class="newborn-post__parent">
            <h1 class="newborn-post__parent-title"><?= $newborn->get_mother_title(); ?></h1>
            <p class="newborn-post__parent-description"><?= $newborn->get_mother_description(); ?></p>
          </div>
          <i class="newborn-post__cross fas fa-times"></i>
          <div class="newborn-post__parent">
            <h1 class="newborn-post__parent-title"><?= $newborn->get_father_title(); ?></h1>
            <p class="newborn-post__parent-description"><?= $newborn->get_father_description(); ?></p>
          </div>
        </div>
        <article class="newborn-post__content">
          <?= $newborn->get_content(); ?>
          <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
            <ol class="carousel-indicators">
              <?php foreach ( $newborn->get_images() as $key => $image ): ?>
                <li data-target="#carousel" data-slide-to="<?= $key ?>" <?= ( $key == 0 ) ? 'class="active"' : '' ?>></li>
              <?php endforeach; ?>
            </ol>
            <div class="carousel__items carousel-items">
              <?php foreach ( $newborn->get_images() as $key => $image ): ?>
                <div class="carousel__item carousel-item <?= ( $key == 0 ) ? 'active' : '' ?>">
                  <img class="carousel__image" src="<?= $image ?>">
                </div>
              <?php endforeach; ?>
            </div>
            <a class="carousel__arrow-wrap carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <i class="carousel__arrow material-icons">arrow_back</i>
            </a>
            <a class="carousel__arrow-wrap carousel-control-next" href="#carousel" role="button" data-slide="next">
              <i class="carousel__arrow material-icons">arrow_forward</i>
            </a>
          </div>
        </article>
      </div>
    </div>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>