<?php
/**
 * Plugin Name:     Sunstone Term Analysis
 * Plugin URI:      http://sunstone.org
 * Description:     Addition of Terms for Sunstone
 * Author:          Jake Spurlock & Jake Frost
 * Author URI:      http://jakespurlock.com
 * Text Domain:     sunstone-terms
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Sunstone_Terms
 */

/**
 * Include the taxonomies
 */
include_once( 'taxonomies/good.php' );
include_once( 'taxonomies/location.php' );
include_once( 'taxonomies/occasion.php' );
include_once( 'taxonomies/organization.php' );
include_once( 'taxonomies/person.php' );
include_once( 'taxonomies/work-of-art.php' );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	include_once( 'lib/cli.php' );
}

class Sunstone_Terms {
	/**
	 * The one instance of Sunstone_Terms
	 *
	 * @var Sunstone_Terms
	 */
	private static $instance;
	/**
	 * Instantiate or return the one Sunstone_Terms instance.
	 *
	 * @return Sunstone_Terms
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Initiate actions.
	 *
	 * @return Sunstone_Terms
	 */
	public function __construct() {
		add_filter( 'tdc_enabled_taxonomies', array( $this, 'custom_tdc_taxonomies' ), 10, 1 );
	}

	/**
	 * Let's add our custom taxonomies for the filter.
	 * @param  [type] $taxonomies [description]
	 * @return [type]             [description]
	 */
	public function custom_tdc_taxonomies( $taxonomies ) {
	    $taxonomies[] = 'good';
	    $taxonomies[] = 'location';
	    $taxonomies[] = 'occasion';
	    $taxonomies[] = 'organization';
	    $taxonomies[] = 'person';
	    $taxonomies[] = 'work-of-art';
	    return $taxonomies;
	}
}
/**
 * Instantiate or return the one Sunstone_Terms instance.
 *
 * @return Sunstone_Terms
 */
function sunstone_terms_init() {
	return Sunstone_Terms::instance();
}
// Kick off the plugin on init
add_action( 'init', 'sunstone_terms_init' );