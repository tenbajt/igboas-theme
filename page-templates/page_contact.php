<?php
/**
 * Template Name: Strona: Kontakt
 * Template Post Type: page
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
    
    $contact_page = new Page_contact(); ?>
    
    <div class="hero">
      <div class="hero__inner">
        <h1 class="hero__heading">
          <?= $contact_page->get_title(); ?>
        </h1>
        <?php if ( $contact_page->has_content() ): ?>
          <p class="hero__lead">
            <?= $contact_page->get_content(); ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
    <div class="contact-forms">
      <div class="contact-forms__inner">
        <div class="company-data">
          <?php foreach ( $contact_page->get_company_data() as $data ): ?>
            <div class="company-data__item">
              <i class="company-data__icon material-icons">
                <?= $data->icon ?>
              </i>
              <label class="company-data__label">
                <?= $data->label ?>
              </label>
              <a class="company-data__value" href="<?= $data->link ?>" target="<?= $data->target ?>">
                <?= $data->value ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <?= $contact_page->get_form_shortcode(); ?>
      </div>
    </div>
    <div class="map-container">
      <iframe class="map" src="<?= $contact_page->get_map_url(); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

  <?php 
    
  endwhile;
endif;

get_footer(); ?>