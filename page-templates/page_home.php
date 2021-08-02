<?php
/**
 * Template Name: Strona główna
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
    
    $home_page = new Page_Home(); ?>

    <div class="hero" style="background-image:url(<?= $home_page->get_thumbnail_url(); ?>);">
      <div class="hero__overlay"></div>
      <div class="hero__inner">
        <h1 class="hero__heading--centered">
          <?= $home_page->get_title(); ?>
        </h1>
        <?php if ( $home_page->has_content() ): ?>
          <h2 class="hero__lead--centered">
            <?= $home_page->get_content(); ?>
          </h2>
        <?php endif; ?>
      </div>
    </div>

    <?php $collection_term = $home_page->get_collection_term(); ?>

    <div class="term-feature">
      <div class="term-feature__inner">
        <h3 class="term-feature__heading">
          <?= $collection_term->get_name(); ?>
        </h3>
        <p class="term-feature__lead">
          <?= $collection_term->get_description(); ?>
        </p>
        <a class="term-feature__btn btn btn-primary" href="<?= $collection_term->get_url(); ?>">
          Więcej
        </a>
        <div class="term-feature__posts">
          <i id="collection-slider__previous" class="term-feature__arrow material-icons">arrow_back</i>
          <div id="collection-slider" class="term-feature__slider">
            <div class="term-feature__items">
              <?php foreach ( $home_page->get_collection_posts() as $post ): ?>
                <?php setup_postdata( $post ); ?>
                <div class="term-feature__item">
                  <?php get_template_part( 'template-parts/miniature_individual' ); ?>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
          <i id="collection-slider__next" class="term-feature__arrow material-icons">arrow_forward</i>
        </div>
      </div>
    </div>

    <?php $birth_term = $home_page->get_birth_term(); ?>

    <div class="term-feature--reversed">
      <div class="term-feature__inner">
        <h3 class="term-feature__heading">
          <?= $birth_term->get_name(); ?>
        </h3>
        <p class="term-feature__lead">
          <?= $birth_term->get_description(); ?>
        </p>
        <div class="term-feature__posts">
          <i id="birth-slider__previous" class="term-feature__arrow material-icons">arrow_back</i>
          <div id="birth-slider" class="term-feature__slider">
            <div class="term-feature__items">
              <?php foreach ( $home_page->get_birth_posts() as $post ): ?>
                <?php setup_postdata( $post ); ?>
                <div class="term-feature__item">
                  <?php get_template_part( 'template-parts/miniature_newborn' ); ?>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
          <i id="birth-slider__next" class="term-feature__arrow material-icons">arrow_forward</i>
        </div>
      </div>
    </div>

    <?php $available_term = $home_page->get_available_term(); ?>

    <div class="term-feature">
      <div class="term-feature__inner">
        <h3 class="term-feature__heading">
          <?= $available_term->get_name(); ?>
        </h3>
        <p class="term-feature__lead">
          <?= $available_term->get_description(); ?>
        </p>
        <a class="term-feature__btn btn btn-primary" href="<?= $available_term->get_url(); ?>">
          Więcej
        </a>
        <div class="term-feature__posts">
          <i id="available-slider__previous" class="term-feature__arrow material-icons">arrow_back</i>
          <div id="available-slider" class="term-feature__slider">
            <div class="term-feature__items">
              <?php foreach ( $home_page->get_available_posts() as $post ): ?>
                <?php setup_postdata( $post ); ?>
                <div class="term-feature__item">
                  <?php get_template_part( 'template-parts/miniature_individual' ); ?>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
          <i id="available-slider__next" class="term-feature__arrow material-icons">arrow_forward</i>
        </div>
      </div>
    </div>

    <?php $morphs_term = $home_page->get_morphs_term(); ?>

    <div class="term-feature--inverted">
      <div class="term-feature__inner">
        <h3 class="term-feature__heading">
          <?= $morphs_term->get_name(); ?>
        </h3>
        <p class="term-feature__lead">
          <?= $morphs_term->get_description(); ?>
        </p>
        <a class="term-feature__btn btn btn-primary" href="<?= $morphs_term->get_url(); ?>">
          Więcej
        </a>
        <div class="term-feature__posts">
          <i id="morphs-slider__previous" class="term-feature__arrow material-icons">arrow_back</i>
          <div id="morphs-slider" class="term-feature__slider">
            <div class="term-feature__items">
              <?php foreach ( $home_page->get_morphs_posts() as $post ): ?>
                <?php setup_postdata( $post ); ?>
                <div class="term-feature__item">
                  <?php get_template_part( 'template-parts/miniature_morphs' ); ?>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
          <i id="morphs-slider__next" class="term-feature__arrow material-icons">arrow_forward</i>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

