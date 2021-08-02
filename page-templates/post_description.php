<?php
/**
 * Template Name: Odmiana barwna
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

if ( have_posts() ):
  while ( have_posts() ):
    the_post(); 
    
    $description = new Post(); ?>

    <div class="description-post">
      <img class="description-post__cover" style="background-image:url(<?= $description->get_thumbnail_url(); ?>);">
      <div class="description-post__inner">
        <h1 class="description-post__heading">
          <?= $description->get_title(); ?>
        </h1>
        <article class="description-post__content">
          <?= $description->get_content(); ?>
        </article>
      </div>
    </div>
  
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>