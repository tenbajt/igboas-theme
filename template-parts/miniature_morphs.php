<?php 

namespace TenbajtTheme; ?>

<a class="morphs-miniature" href="<?php the_permalink(); ?>">
  <img class="morphs-miniature__thumbnail" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);">
  <h4 class="morphs-miniature__heading">
    <?php the_title(); ?>
  </h4>
</a>