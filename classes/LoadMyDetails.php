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
            $this->includes();
        }

        
        /**
         * Plugin file includes
         *
         * @return void
         */
        public function includes() {
            require_once( LMD_PATH . 'classes/Scripts.php' );
            require_once( LMD_PATH . 'classes/Hooks.php' );
        }
    }

    $loadMyDetails = new LoadMyDetails();

}

