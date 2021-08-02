<?php

namespace TenbajtTheme;

class Post_Individual extends Post {

  public function get_name() {
    return $this->get_title();
  }

  public function get_gender() {
    return $this->get_meta( 'gender' );
  }

  public function get_morph() {
    return $this->get_meta( 'morph' );
  }

  public function get_year() {
    return $this->get_meta( 'year' );
  }

  public function get_genetics() {
    return $this->get_meta( 'genetics' );
  }

  public function get_father() {
    return $this->get_parent( 'father' );
  }

  public function get_mother() {
    return $this->get_parent( 'mother' );
  }

  public function get_price() {
    if ( ! isset( $this->price ) ) {
      $price = $this->get_meta( 'price' );
      $this->price = $price;
    }
    return $this->price;
  }

  public function has_price() {
    return ! empty( $this->get_price() );
  }

  private function get_parent( $property_name ) {
    $parent_id = $this->get_meta( $property_name )[0];
    return new Post_Individual( $parent_id );
  }
}

?>