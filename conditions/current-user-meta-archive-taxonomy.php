<?php
namespace Jet_Theme_Core\Template_Conditions;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Current_User_Meta_Tax extends Base {

	/**
	 * Condition slug
	 *
	 * @return string
	 */
	public function get_id() {
		return 'current-user-meta-taxonomy';
	}

	/**
	 * Condition label
	 *
	 * @return string
	 */
	public function get_label() {
		return __( 'Taxonomy', 'jet-theme-core' );
	}

	/**
	 * Condition group
	 *
	 * @return string
	 */
	public function get_group() {
		return 'advanced';
	}

	public function get_sub_group() {
		return 'user-meta';
	}

	/**
	 * @return int
	 */
	public  function get_priority() {
		return 100;
	}

	/**
	 * @return string
	 */
	public function get_body_structure() {
		return 'jet_page';
	}

	/**
	 * [get_control description]
	 * @return [type] [description]
	 */
	public function get_control() {
		return [
			'type'        => 'input',
			'placeholder' => __( 'Input meta_key|meta_value|taxonomy|term_slug(optional)', 'jet-theme-core' ),
		];
	}

	/**
	 * Condition check callback
	 *
	 * @return bool
	 */
	public function check( $arg = '' ) {

		$user_id = get_current_user_id();

		if ( ! $user_id ) {
			return false;
		}

		$arg = explode( '|', $arg );

		$meta_key   = $arg[0];
		$meta_value = $arg[1];
		$tax        = $arg[2];
		$term       = $arg[3] ?? '';

		if ( ! $meta_key || ! $meta_value || ! $tax ) {
			return false;
		}

		$value = get_user_meta( $user_id, $meta_key, true );

		return $value && ( $value == $meta_value ) && ( is_category( $term ) || is_tag( $term ) || is_tax( $tax, $term ) );

	}

}
