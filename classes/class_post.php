<?php

namespace TenbajtTheme;

class Post extends Site {

  public function __construct( $post = null ) {
    $this->post = get_post( $post );
  }

  public function get_url() {
    return get_permalink( $this->post );
  }

  public function get_title() {
    return get_the_title( $this->post );
  }

  public function get_excerpt() {
    return get_the_excerpt( $this->post );
  }

  public function get_thumbnail_url() {
    return get_the_post_thumbnail_url( $this->post, 'full' );
  }

  public function get_content() {
    if ( ! isset( $this->content ) ) {
      $this->content = get_the_content( $this->post );
    }
    return $this->content;
  }

  public function has_content() {
    return ! empty( $this->get_content() );
  }

  public function get_images() {
    $images_ids  = $this->get_meta( 'gallery' );
    $images_urls = array();
    
    foreach ( $images_ids as $image_id ) {
      $image_url = wp_get_attachment_image_url( $image_id, 'full' );
      array_push( $images_urls, $image_url );
    }
    return $images_urls;
  }

  public function get_meta( $key ) {
    return get_post_meta( $this->post->ID, $key, true );
  }
}

?>