<?php
/**
 * Plugin Name: JetThemeCore - Custom conditions
 * Plugin URI:
 * Description:
 * Version:     1.0.0
 * Author:      
 * Author URI:  
 * Text Domain: 
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

add_action( 'init', 'jet_theme_core_conditions' );

function jet_theme_core_conditions() {

	define( 'JET_TCC__FILE__', __FILE__ );
	define( 'JET_TCC_PATH', plugin_dir_path( JET_TCC__FILE__ ) );

	add_filter( 'jet-theme-core/template-conditions/condition-sub-groups', function( $groups ) {
		$groups[ 'user-meta' ] = array(
			'label'  => __( 'If User Meta Is', 'jet-theme-core' ),
			'options' => [],
		);
		return $groups;
	} );

	add_filter( 'jet-theme-core/template-conditions/conditions-list', function( $conditions ) {

		$conditions[ '\Jet_Theme_Core\Template_Conditions\Current_User_Meta_Single' ]  = JET_TCC_PATH . '/conditions/' . 'current-user-meta-single-post.php';
		$conditions[ '\Jet_Theme_Core\Template_Conditions\Current_User_Meta_CPT' ]     = JET_TCC_PATH . '/conditions/' . 'current-user-meta-single-post-type.php';
		$conditions[ '\Jet_Theme_Core\Template_Conditions\Current_User_Meta_Tax' ]     = JET_TCC_PATH . '/conditions/' . 'current-user-meta-archive-taxonomy.php';
		$conditions[ '\Jet_Theme_Core\Template_Conditions\Post_Meta' ]                 = JET_TCC_PATH . '/conditions/' . 'singular-post-meta.php';
		$conditions[ '\Jet_Theme_Core\Template_Conditions\Is_Blog_Page' ]              = JET_TCC_PATH . '/conditions/' . 'is-blog-page.php';

		return $conditions;

	} );

}
