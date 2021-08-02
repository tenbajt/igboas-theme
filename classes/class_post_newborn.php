<?php

namespace TenbajtTheme;

class Post_Newborn extends Post {

  public function get_mother_title() {
    return $this->get_meta( 'mother_title' );
  }

  public function get_mother_description() {
    return $this->get_meta( 'mother_description' );
  }

  public function get_father_title() {
    return $this->get_meta( 'father_title' );
  }

  public function get_father_description() {
    return $this->get_meta( 'father_description' );
  }
}

?>