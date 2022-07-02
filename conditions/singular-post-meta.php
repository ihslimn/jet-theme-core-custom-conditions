<?php
namespace Jet_Theme_Core\Template_Conditions;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Post_Meta extends Base {

	/**
	 * Condition slug
	 *
	 * @return string
	 */
	public function get_id() {
		return 'singular-post-meta';
	}

	/**
	 * Condition label
	 *
	 * @return string
	 */
	public function get_label() {
		return __( 'Post Meta Is', 'jet-theme-core' );
	}

	/**
	 * Condition group
	 *
	 * @return string
	 */
	public function get_group() {
		return 'singular';
	}

	/**
	 * @return string
	 */
	public function get_sub_group() {
		return 'post-singular';
	}

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
		return 'jet_single';
	}

	/**
	 * [get_control description]
	 * @return [type] [description]
	 */
	public function get_control() {
		return [
			'type'        => 'input',
			'placeholder' => __( 'Input meta_key|meta_value', 'jet-theme-core' ),
		];
	}

	/**
	 * [ajax_action description]
	 * @return [type] [description]
	 */
	public function ajax_action() {
		return 'get-posts';
	}

	/**
	 * [get_label_by_value description]
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function get_label_by_value( $value = '' ) {
		return get_the_title( $value );
	}

	/**
	 * Condition check callback
	 *
	 * @return bool
	 */
	public function check( $arg = '' ) {

		$arg = explode( '|', $arg );

		$meta_key   = $arg[0];
		$meta_value = $arg[1];

		if ( ! $meta_key || ! $meta_value ) {
			return false;
		}

		$value = get_post_meta( get_queried_object_id(), $meta_key, true );

		return is_singular() && $value == $meta_value;

	}

}
