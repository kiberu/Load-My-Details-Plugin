<?php

if ( ! class_exists( 'Activation' ) ) {
    class Activation {
        public function __construct() {
            $this->includes();
        }
        public function check_if_woocommerce_installed() {
            if ( ! class_exists( 'WooCommerce' ) ) {
                $notifications = new Notifications();
                add_action( 'admin_notices', array( $notifications, 'woocommerce_is_required_notice' ) );
            } 
        }

        public function includes() {
            require_once( LMD_PATH . 'classes/Notifications.php' );
        }
    }    
} 
