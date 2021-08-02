<?php

namespace TenbajtTheme;

class Term extends Site {

  public function __construct( $term = null ) {
    if ( ! $term ) {
      $term = get_queried_object();
    }
    $this->term = get_term( $term );
  }

  public function get_url() {
    return get_term_link( $this->term );
  }

  public function get_name() {
    return $this->term->name;
  }

  public function has_description() {
    return ! empty( $this->get_description() );
  }

  public function get_description() {
    if ( ! isset( $this->description ) ) {
      $this->description = $this->term->description;
    }
    return $this->description;
  }

  public function get_children() {
    $args = array(
      'parent' 		 => $this->term->term_id,
      'taxonomy'	 => 'category',
      'hide_empty' => false,
    );

    $wp_terms = get_terms( $args );
    $terms = array();

    foreach ( $wp_terms as $term ) {
      array_push( $terms, new Term( $term ) );
    }
	  return $terms;
  }

  public function get_thumbnail_url() {
    $thumbnail_id = $this->get_meta( 'thumbnail' );
    $thumbnail_url = wp_get_attachment_url( $thumbnail_id );
    return $thumbnail_url;
  }

  public function get_top_most_parent() {
    $parents_ids = $this->get_parents_ids();
    $top_most_parent_id = end( $parents_ids );
    return new Term( $top_most_parent_id );
  }

  public function get_direct_parent() {
    $direct_parent_id = $this->get_parents_ids()[0];
    return new Term( $direct_parent_id );
  }

  public function get_term_descriptions() {
    $term_descriptions_id = $this->get_meta( 'morph_descriptions' );
    return new Term( $term_descriptions_id );
  }

  public function get_term_projects() {
    $term_projects_id = $this->get_meta( 'morph_projects' );
    return new Term( $term_projects_id );
  }

  public function get_posts() {
    $args = array(
      'category'    => $this->term->term_id,
      'numberposts' => -1,
    );

    $wp_posts = get_posts( $args );
    $posts = array();

    foreach ( $wp_posts as $post ) {
      array_push( $posts, new Post( $post ) );
    }
    return $posts;
  }

  private function get_meta( $key ) {
    return get_term_meta( $this->term->term_id, $key, true );
  }

  private function get_parents_ids() {
    return get_ancestors( $this->term->term_id, 'category' );
  }
}