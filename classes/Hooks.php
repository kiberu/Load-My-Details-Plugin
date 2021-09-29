<?php

if ( ! class_exists( 'Hooks' ) ) {
    class Hooks {
        public function __construct () {
            $this->includes();
            $this->action_hooks();
        }

        public function includes() {
            require_once( LMD_PATH . 'classes/Activation.php' );
            require_once( LMD_PATH . 'classes/CheckoutButton.php' );
            require_once( LMD_PATH . 'classes/Scripts.php' );
        }

        public function action_hooks() {
            $activation = new Activation();
            $checkoutButton = new CheckoutButton();

            add_action( 'init', array( $activation, 'check_if_woocommerce_installed' ) );
            add_action( 'woocommerce_before_checkout_billing_form',  array( $checkoutButton, 'add_load_my_details_button' ) ); 
        }
    }    

    $hooks = new Hooks();
} 
