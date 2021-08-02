<?php 

namespace TenbajtTheme; 

$newborn = new Post_Newborn(); ?>

<a class="newborn-item" href="<?= $newborn->get_url(); ?>">
  <img class="newborn-item__thumbnail" style="background-image:url(<?= $newborn->get_thumbnail_url(); ?>);">
  <div class="newborn-item__mother-title">
    <?= $newborn->get_mother_title(); ?>
  </div>
  <i class="newborn-item__cross fas fa-times"></i>
  <div class="newborn-item__father-title">
    <?= $newborn->get_father_title(); ?>
  </div>
</a>