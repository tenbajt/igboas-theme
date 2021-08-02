<div class="<?= $block_class ?>">
  <div class="category-feature__text">
    <h3 class="category-feature__title"><?= $title ?></h3>
    <?php if ( $intro ): ?>
      <h4 class="category-feature__intro"><?= $intro ?></h4>
    <?php endif; ?>
    <?php if ( $show_button ): ?>
      <a class="category-feature__btn--desktop" href="<?= $link ?>">Zobacz więcej</a>
    <?php endif; ?>
  </div>
  <div class="category-feature__media">
    <i class="category-feature__chevron material-icons">arrow_back</i>
    <div class="category-feature__posts">
      <?= $posts ?>
    </div>
    <i class="category-feature__chevron material-icons">arrow_forward</i>
    <?php if ( $show_button ): ?>
      <a class="category-feature__btn--mobile" href="<?= $link ?>">Zobacz więcej</a>
    <?php endif; ?>
    </div>
  </div>
</div>