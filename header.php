<?php
/**
 * Template part for website header
 * 
 * @link https://tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage IGBoas
 * @since 1.0.0
 */

namespace TenbajtTheme; ?>

<!doctype html>
<html <?= site_lang_attr(); ?> >
  <head>
    <meta charset="<?= site_charset(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
      <div class="site-header__navbar navbar navbar-expand-lg">
				<a class="site-header__logo-link--mobile" href="<?= site_home_url(); ?>" rel="home">
					<img class="site-header__logo--mobile" src="<?= site_logo_url(); ?>" alt="<?= site_logo_alt(); ?>">
				</a>
        <button class="site-header__toggler navbar-toggler collapsed" ontouchstart="" data-toggle="collapse" data-target="#site-header__collapse">
					<div></div>
          <div></div>
          <div></div>
				</button>
        <div id="site-header__collapse" class="site-header__collapse navbar-collapse collapse">
					<ul class="site-header__nav-menu--left navbar-nav col">
						<?php foreach ( site_menu( 'site-header__nav-menu--left' ) as $menu_item ): ?>
							<?php if ( $menu_item->children ): ?>
								<li class="site-header__nav-item nav-item dropdown">
									<a class="site-header__nav-link--dropdown nav-link dropdown-toggle" href="#" id="<?= $menu_item->ID ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?= $menu_item->title ?>
									</a>
									<div class="site-header__dropdown-menu dropdown-menu" aria-labelledby="<?= $menu_item->id ?>">
										<?php foreach ( $menu_item->children as $child ): ?>
											<a class="site-header__dropdown-item dropdown-item" href="<?= $child->url ?>">
												<?= $child->title ?>
											</a>
										<?php endforeach; ?>
									</div>
								</li>
							<?php else: ?>
								<li class="site-header__nav-item nav-item">
									<a class="site-header__nav-link nav-link" href="<?= $menu_item->url ?>">
										<?= $menu_item->title ?>
									</a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<a class="site-header__logo-link--desktop" href="<?= site_home_url(); ?>" rel="home">
						<img class="site-header__logo--desktop" src="<?= site_logo_url(); ?>" alt="<?= site_logo_alt(); ?>">
					</a>
					<ul class="site-header__nav-menu--right navbar-nav col">
						<?php foreach ( site_menu( 'site-header__nav-menu--right' ) as $menu_item ): ?>
							<?php if ( $menu_item->children ): ?>
								<li class="site-header__nav-item nav-item dropdown">
									<a class="site-header__nav-link--dropdown nav-link dropdown-toggle" href="#" id="<?= $menu_item->ID ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?= $menu_item->title ?>
									</a>
									<div class="site-header__dropdown-menu dropdown-menu" aria-labelledby="<?= $menu_item->id ?>">
										<?php foreach ( $menu_item->children as $child ): ?>
											<a class="site-header__dropdown-item dropdown-item" href="<?= $child->url ?>">
												<?= $child->title ?>
											</a>
										<?php endforeach; ?>
									</div>
								</li>
							<?php else: ?>
								<li class="site-header__nav-item nav-item">
									<a class="site-header__nav-link nav-link" href="<?= $menu_item->url ?>">
										<?= $menu_item->title ?>
									</a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
        </div>
      </div>
    </header>
    <main>