<?php
/**
 * Plugin Name: Chat Without Contact
 * Plugin URI:        https://wordpress.org/plugins/chat-without-contact
 * Description: A custom WhatsApp Web plugin that send text message without saving contact number on mobile devise. just enter mobile number and text then send through WhatsApp web. Short code 👉 [wawc_form]
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sumanta Dhank
 * Author URI:        https://itsumanta.wordpress.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sdcwc
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


// Add shortcode for contact form
function sdcwc_contact_form_shortcode() {
    ob_start();
    include('contact-form.php');
    return ob_get_clean();
  }
  add_shortcode('wawc_form', 'sdcwc_contact_form_shortcode');

?>
