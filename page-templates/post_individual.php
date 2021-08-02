<?php
/**
 * Template Name: Osobnik
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

    $individual = new Post_Individual();
    $father = $individual->get_father();
    $mother = $individual->get_mother(); ?>

    <div class="individual-post">
      <div class="individual-post__inner">
        <div class="individual-properties">
          <div class="individual-properties__header">
            <h1 class="individual-properties__name">
              <?= $individual->get_name(); ?>
            </h1>
            <i class="individual-properties__gender <?= $individual->get_gender(); ?>"></i>
            <div class="individual-properties__morph">
              <?= $individual->get_morph(); ?>
            </div>
            <div class="individual-properties__year">
              <?= $individual->get_year(); ?>
            </div>
          </div>
          <label class="individual-properties__label">
            Genetyka
          </label>
          <div class="individual-properties__genetics">
            <?= $individual->get_genetics(); ?>
          </div>
          <label class="individual-properties__label">
            Rodzice
          </label>
          <a class="individual-properties__parent" href="<?= $father->get_url(); ?>">
            <div class="individual-properties__parent-name">
              <?= $father->get_name(); ?>
            </div>
            <i class="individual-properties__parent-gender <?= $father->get_gender(); ?>">
            </i>
            <div class="individual-properties__parent-morph">
              <?= $father->get_morph(); ?>
            </div>
          </a>
          <a class="individual-properties__parent" href="<?= $mother->get_url(); ?>">
            <div class="individual-properties__parent-name">
              <?= $mother->get_name(); ?>
            </div>
            <i class="individual-properties__parent-gender <?= $mother->get_gender(); ?>">
            </i>
            <div class="individual-properties__parent-morph">
              <?= $mother->get_morph(); ?>
            </div>
          </a>
          <?php if ( $individual->has_price() ): ?>
            <div class="individual-properties__purchase">
              <div class="individual-properties__price">
                <?= $individual->get_price(); ?>
              </div>
              <a class="btn btn-primary" href="<?= $individual->get_contact_page_url(); ?>">
                Kontakt
              </a>
            </div>
          <?php endif; ?>
        </div>
        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
          <ol class="carousel-indicators">
            <?php foreach ( $individual->get_images() as $key => $image ): ?>
              <li data-target="#carousel" data-slide-to="<?= $key ?>" <?= ( $key == 0 ) ? 'class="active"' : '' ?>></li>
            <?php endforeach; ?>
          </ol>
          <div class="carousel__items carousel-items">
            <?php foreach ( $individual->get_images() as $key => $image ): ?>
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
      </div>
    </div>
    
  <?php 
  
  endwhile;
endif;

get_footer(); ?>
