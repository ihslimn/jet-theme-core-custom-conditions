<?php
namespace Jet_Theme_Core\Template_Conditions;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Is_Blog_Page extends Base {

	/**
	 * Condition slug
	 *
	 * @return string
	 */
	public function get_id() {
		return 'is-blog-page';
	}

	/**
	 * Condition label
	 *
	 * @return string
	 */
	public function get_label() {
		return __( 'Is Blog Page', 'jet-theme-core' );
	}

	/**
	 * Condition group
	 *
	 * @return string
	 */
	public function get_group() {
		return 'archive';
	}

	/**
	 * @return string
	 */

	/**
	 * @return int
	 */
	public  function get_priority() {
		return 30;
	}

	/**
	 * @return string
	 */
	public function get_body_structure() {
		return 'jet_archive';
	}



	/**
	 * Condition check callback
	 *
	 * @return bool
	 */
	public function check( $arg = '' ) {
		
		global $wp_query;

		if ( isset( $wp_query ) && (bool) $wp_query->is_posts_page ) {
    		
    		return true;
		} else {
			return false;
		}

	}

}
