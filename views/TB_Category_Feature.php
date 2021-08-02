<?php
/**
 * Logic for Category Preview block
 * 
 * @link https://tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage IGBoas
 * @since 1.0.0
 */

TB_Utils::require_view_once( 'TB_Individual_Excerpt_View' );

class TB_Category_Feature {

  private $category;
  private $posts;
  private $category_feature_class = 'category-feature';
  private $link;

  public function __construct( $data ) {
    extract( $data );

    $category_feature_class = 'category-feature';

    if ( isset( $category_feature_class) ) {
      $this->$category_feature_class = $category_feature_class;
    }

    extract( $collection_feature );

    /*TB_Utils::render_template( 'category_feature', array(
      'class' => ,
			'title' => $this->get_title(),
			'intro' => $this->get_intro(),
			'link'  => $this->get_link(),
			'posts' => $this->get_posts(),
    ));*/
  }

  public function set_category_and_posts( $field ) {
    $this->category = $fields;
  }

  public function setClass( $class ) {
    $this->class = $class;
  }

  public function setLink( $link ) {
    $this->link = $link;
  }

  private function get_class() {
    $class = $this->class;

    if ( isset( $class) ) {
      return $class;
    }

    return 'category-preview';
  }

  private function get_title() {
    return $this->category->name;
  }

  private function get_intro() {
    $intro = $this->category->description;

    if ( empty( $intro ) ) {
      return false;
    }

    return $intro;
  }

  private function get_link() {
    $link = $this->link;

    if ( isset( $link ) ) {
      return $link;
    }

    $link = get_category_link( $this->category );
    $link = esc_url( $link );
    return $link;
  }

  private function get_posts() {
    $posts = $this->posts;

    foreach ( $posts as $post ) {
      //$excerpt_individual_view = 
    }
  }

  public function get_output() {
    return parent::get_template( 'category-preview', array(
      'class' => $this->get_class(),
			'title' => $this->get_title(),
			'intro' => $this->get_intro(),
			'link'  => $this->get_link(),
			'posts' => $this->get_posts(),
    ));
  }

  public function render() {
    echo get_output();
  }
}
?>