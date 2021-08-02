<?php
/**
 * Functions.php
 * 
 * @link https://www.tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage Tenbajt_IGBoas
 * @since 1.0.0
 */

namespace TenbajtTheme;

spl_autoload_register( function( $class_name ) {
	if ( strpos( $class_name, __NAMESPACE__ ) !== false ) {
		$class_name_parts = explode( '\\', $class_name );
		$class_name = end( $class_name_parts );
		$class_name = strtolower( $class_name );
		require_once get_template_directory() . '/classes/class_' . $class_name . '.php';
	}
});

add_action( 'after_setup_theme', function() {
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1568, 9999 );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'site-header__nav-menu--left'  => 'Menu główne - lewa strona',
			'site-header__nav-menu--right' => 'Menu główne - prawa strona',
		)
	);
	// Add support for core custom logo.
	add_theme_support( 'custom-logo',
		array(
			'width'       => 150,
			'height'      => 150,
			'flex-width'  => true,
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
});

add_action( 'wp_enqueue_scripts', function() {
	// Enqueue fonts.
	wp_enqueue_style( 'tenbajt_open_sans_font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap', false );
	wp_enqueue_style( 'tenbajt_roboto_font', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap', false );
	// Enqueue CSS stylesheets.
	wp_enqueue_style( 'tenbajt_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	wp_enqueue_style( 'tenbajt_bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'tenbajt_custom_css', get_stylesheet_uri(), array(), '1.0', false );
	// Enqueue Font Awesome.
	wp_enqueue_script( 'tenbajt_font_awesome', 'https://kit.fontawesome.com/be14e31dde.js', array(), '1.0', false );
	// Enqueue JS scripts.
	wp_enqueue_script( 'tenbajt_jquery_js', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '1.0', false );
	wp_enqueue_script( 'tenbajt_popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1.0', false );
	wp_enqueue_script( 'tenbajt_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '1.0', false );
	wp_enqueue_script( 'tenbajt_custom_js', get_theme_file_uri( '/js/tenbajt.js' ), array(), '1.0', true );
});

add_action( 'init', function() {
	remove_post_type_support( 'post', 'revisions' );
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'trackbacks' );
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
});

add_filter( 'excerpt_length', function() {
	return 25;
}, 10 );

add_filter( 'excerpt_more', function() {
	return '...';
}, 10 );

add_filter( 'wp_nav_menu', function() {
	extract( (array) $args );

	if ( has_nav_menu( $theme_location ) ) {
		$menu_items = array();
		
		foreach ( wp_get_nav_menu_items( $menu ) as $wp_menu_item ) {
			$menu_item = (object) array(
				'id' 			 => $wp_menu_item->ID,
				'title' 	 => $wp_menu_item->title,
				'url' 		 => $wp_menu_item->url,
				'children' => array(),
			);

			$wp_menu_item_id = $wp_menu_item->ID;
			$wp_menu_item_parent_id = $wp_menu_item->menu_item_parent;

			if ( $wp_menu_item_parent_id ) {
				$menu_items[$wp_menu_item_parent_id]->children[] = $menu_item;
			} else {
				$menu_items[$wp_menu_item_id] = $menu_item;
			}
		}

		$args = array(
			'list_class' => $theme_location,
			'menu_items' => $menu_items,
		);
		return get_template_part_xxx( $tenbajt_template_name, $args );
	}
}, 10, 2 );

function site_lang_attr() {
	$lang_attr = get_language_attributes( 'html' );
	return esc_attr( $lang_attr );
}

function site_charset() {
	$site_info = get_bloginfo( 'charset' );
	return esc_attr( $site_info );
}

function site_home_url() {
	$home_url = get_home_url( null, '/' );
	return esc_url( $home_url );
}

function site_logo_url() {
	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return '';
	}

	$logo_url = wp_get_attachment_url( $logo_id );

	return esc_url( $logo_url );
}

function site_logo_alt() {
	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return '';
	}

	$logo_alt = get_post_meta( $logo_id, '_wp_attachment_image_alt', true );

	if ( empty( $logo_alt ) ) {
		$logo_alt = get_bloginfo( 'name', 'display' );
	}

	return esc_attr( $logo_alt );
}

function site_menu( $menu_location ) {
	if ( ! has_nav_menu( $menu_location ) ) {
		return array();
	}

	$menu_name = wp_get_nav_menu_name( $menu_location );
	$menu_items = array();
	$wp_menu_items = wp_get_nav_menu_items( $menu_name );

	foreach ( $wp_menu_items as $key => $wp_menu_item ) {
		$menu_item = (object) array(
			'id' 			 => esc_html( $wp_menu_item->ID ),
			'title' 	 => esc_html( $wp_menu_item->title ),
			'url' 		 => esc_url( $wp_menu_item->url ),
			'children' => array(),
		);

		$item_id = $wp_menu_item->ID;
		$parent_id = $wp_menu_item->menu_item_parent;

		if ( $parent_id ) {
			$menu_items[$parent_id]->children[] = $menu_item;
		} else {
			$menu_items[$item_id] = $menu_item;
		}
	}
	return $menu_items;
}

class Theme {

	public function get_category_feature( $args ) {
		$block_class = 'category-feature';
		$show_button = true;

		extract( $args );
		extract( $acf_group );

		$title = $this->get_category_name( array(
			'category' => $category,
		));
		$intro = $this->get_category_description( array(
			'category' => $category,
		));
		$link = $this->get_category_link( array(
			'category' => $category,
		));

		$args = get_defined_vars();

		$this->get_template_part( 'category-feature', $args );
	}
}