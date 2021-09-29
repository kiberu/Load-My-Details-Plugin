<?php
/**
 * Load My Details Plugin File.
 * @author Kiberu Sharif <kiberusharif@gmail.com>
 * 
 */

if ( ! class_exists( 'LMD' ) ) {
    
    /**
     * Contains Plugin Functionality.
     * @version 1.0.0
     */
    class LMD {

        /**
         * Class Constructor Method.
         * The gateway to the plugin. It includes the required files for the functionality.
         */
        public function __construct() {
            $this->includes();
        }

        
        /**
         * Plugin File Includes.
         *
         * @return void
         */
        public function includes() {
            require_once( LMD_PATH . 'classes/Scripts.php' );
            require_once( LMD_PATH . 'classes/Hooks.php' );
        }
    }

    // Instatiate Plugin Class.
    $loadMyDetails = new LMD();

}

