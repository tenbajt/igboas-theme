<?php

namespace TenbajtTheme;

class Page_Contact extends Post {

  public function get_content() {
    if ( ! isset( $this->content ) ) {
      $content = post::get_content();
      $content = strip_tags( $content );
      $content = trim( $content );
      $this->content = $content;
    }
    return $this->content;
  }

  public function get_company_data() {
    $street_address = $this->get_meta( 'company_data_street_address' );
    $phone_number = $this->get_meta( 'company_data_phone_number' );
    $email_address = $this->get_meta( 'company_data_email_address' );

    $company_data = array(
      (object) array(
        'icon'   => 'business',
        'label'  => 'Adres',
        'link'   => 'https://maps.google.com/?q=' . $street_address,
        'target' => '_blank',
        'value'  => $street_address,
      ),
      (object) array(
        'icon'   => 'phone',
        'label'  => 'Telefon',
        'link'   => 'tel:' . $phone_number,
        'target' => '',
        'value'  => $phone_number,
      ),
      (object) array(
        'icon'   => 'mail',
        'label'  => 'E-mail',
        'link'   => 'mailto:' . $email_address,
        'target' => '',
        'value'  => $email_address,
      ),
    );
    return $company_data;
  }

  public function get_form_shortcode() {
    return do_shortcode( '[contact-form-7 id="5" title="Kontakt"]' );
  }

  public function get_map_url() {
    return $this->get_meta( 'contact_map_url' );
  }
}

?>