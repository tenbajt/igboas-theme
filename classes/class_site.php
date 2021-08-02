<?php

namespace TenbajtTheme;

class Site {

  public function get_contact_page_url() {
    $contact_page      = get_page_by_path( 'kontakt' );
    $contact_page_link = '';

    if ( $contact_page ) {
      $contact_page_link = get_page_link( $contact_page );
    }
    return $contact_page_link;
  }
}

?>