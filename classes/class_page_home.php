<?php

namespace TenbajtTheme;

class Page_Home extends Post {

  public function get_content() {
    if ( ! isset( $this->content ) ) {
      $content = post::get_content();
      $content = strip_tags( $content );
      $content = trim( $content );
      $this->content = $content;
    }
    return $this->content;
  }

  public function get_collection_term() {
    $collection_term_id = $this->get_meta( 'collection_term' );
    return new Term( $collection_term_id );
  }

  public function get_birth_term() {
    $birth_term_id = $this->get_meta( 'birth_term' );
    return new Term( $birth_term_id );
  }

  public function get_available_term() {
    $available_term_id = $this->get_meta( 'available_term' );
    return new Term( $available_term_id );
  }

  public function get_morphs_term() {
    $morphs_term_id = $this->get_meta( 'morphs_term' );
    return new Term( $morphs_term_id );
  }

  public function get_collection_posts() {
    $collection_posts_ids = $this->get_meta( 'collection_posts' );
    return $collection_posts_ids;
  }

  public function get_birth_posts() {
    $birth_posts_ids = $this->get_meta( 'birth_posts' );
    return $birth_posts_ids;
  }

  public function get_available_posts() {
    $available_posts_ids = $this->get_meta( 'available_posts' );
    return $available_posts_ids;
  }

  public function get_morphs_posts() {
    $morphs_posts_ids = $this->get_meta( 'morphs_posts' );
    return $morphs_posts_ids;
  }
}