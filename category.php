<?php
/**
 * Category router.
 * 
 * @link https://tenbajt.pl
 * 
 * @package Tenbajt
 * @subpackage IGBoas
 * @since 1.0.0
 */

namespace TenbajtTheme;

get_template_part( 'page-templates/term_' . get_field( 'template', 'term_' . $cat ) );

?>