<?php
/**
 * Load scripts & styles
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inspiro
 * @since Inspiro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_Enqueue_Scripts' ) ) {

	/**
	 * Inspiro_Enqueue_Scripts initial setup
	 *
	 * @since 1.0.0
	 */
	class Inspiro_Enqueue_Scripts {

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

		}

		/**
		 * Enqueue scripts and styles for all admin pages.
		 */
		public function admin_scripts($hook) {

            wp_enqueue_style( 'inspiro-admin', get_template_directory_uri() . '/assets/admin/css/admin.css' );

            // if ( 'inspiro' === $hook ) {
            if ( 'appearance_page_page-inspiro' != $hook ) {

               wp_enqueue_script("jquery-ui");
               wp_enqueue_script("jquery-ui-tabs");

            }
		}


	}

	new Inspiro_Enqueue_Scripts();
}
