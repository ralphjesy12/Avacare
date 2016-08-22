<?php if(!defined('ABSPATH')) die('Fatal Error');
/*
Plugin Name: AVACARE - Support Chat Plugin
Plugin URI: http://github.com/ralphjesy12
Description: A Customer Support Chat Plugin
Author: ralphjesy@gmail.com
Version: 1.0
Author URI: http://github.com/ralphjesy12
*/
define( 'AVACARE_VERSION', '1.0' );
define( 'AVACARE_MIN_WP_VERSION', '4.4' );
define( 'AVACARE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AVACARE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AVACARE_DEBUG' , true );
define( 'AVACARE_DEBUG_LOG' , true );

require_once( AVACARE_PLUGIN_DIR . 'lib/class.avacare.php');

if(class_exists('AVACARE')){

  // register_activation_hook( __FILE__ , [ 'AVACARE' , 'activate' ] );
  // register_deactivation_hook( __FILE__ , [ 'AVACARE' , 'deactivate' ] );
  $AVACARE = new AVACARE();

}
