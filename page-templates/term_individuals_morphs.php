<?php

namespace TenbajtTheme;

$term = new Term();

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
<div class="species-list">
  <div class="species-list__inner">
    <?php foreach ( $term->get_children() as $term_child ): ?>
      <div class="species-item">
        <h3 class="species-item__heading">
          <?= $term_child->get_name(); ?>
        </h3>
        <?php foreach ( $term_child->get_children() as $term_grandchild ): ?>
          <a class="morph-item" href="<?= $term_grandchild->get_url(); ?>">
            <img class="morph-item__thumbnail" style="background-image:url(<?= $term_grandchild->get_thumbnail_url(); ?>);">
            <h2 class="morph-item__heading">
              <?= $term_grandchild->get_name(); ?>
            </h2>
            <?php if ( $term_grandchild->has_description() ): ?>
              <p class="morph-item__lead">
                <?= $term_grandchild->get_description(); ?>
              </p>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php get_footer(); ?>