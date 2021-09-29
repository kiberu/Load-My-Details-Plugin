<?php
/**
 * Load my details plugin file
 */

if ( ! class_exists( 'LoadMyDetails' ) ) {
    
    /**
     * Contains plugin functionality
     * @author Sharif Kiberu <kiberusharif@gmail.com>
     * @version 1.0.0
     */
    class LoadMyDetails {
        public function __construct() {
            $this->define_constants();
            $this->includes();
            $this->setup();

        }

        /**
         * Contains plugin setup functions
         *
         * @return void
         */
        public function setup() {
            
        }

        /**
         * Define Plugin Constants
         *
         * @return void
         */
        public function define_constants() {
            define( "LMD_PATH", plugin_dir_path( __FILE__ ) ) ;
            define( "LMD_URL", plugin_dir_url( __FILE__ ) ) ;
            define( "LMD_SLUG", 'lmd' );
        }

        /**
         * Plugin file includes
         *
         * @return void
         */
        public function includes() {
            require_once( LMD_PATH . 'Hooks.php' );
        }
    }

    $loadMyDetails = new LoadMyDetails();

}

