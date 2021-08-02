<?php 

namespace TenbajtTheme; 

$individual = new Post_Individual(); ?>

<a class="individual-item" href="<?= $individual->get_url(); ?>">
  <img class="individual-item__thumbnail" style="background-image:url(<?= $individual->get_thumbnail_url(); ?>);">
  <div class="individual-item__name">
    <?= $individual->get_name(); ?>
  </div>
  <i class="individual-item__gender <?= $individual->get_gender(); ?>"></i>
  <div class="individual-item__morph">
    <?= $individual->get_morph(); ?>
  </div>
  <div class="individual-item__year">
    <?= $individual->get_year(); ?>
  </div>
</a>