<?php

if ( ! class_exists( 'Hooks' ) ) {
    class Hooks {

        public function __construct () {
            $this->includes();

            // Create class instances
            $this->activation = new Activation();
            $this->checkoutPage = new CheckoutPage();

            $this->action_hooks();
            $this->filter_hooks();

            
        }

        public function includes() {
            require_once( LMD_PATH . 'classes/Activation.php' );
            require_once( LMD_PATH . 'classes/CheckoutPage.php' );
            require_once( LMD_PATH . 'classes/Scripts.php' );
        }

        public function action_hooks() {

            add_action( 'init', array( $this->activation, 'check_if_woocommerce_installed' ) );
            add_action( 'woocommerce_before_checkout_billing_form',  array( $this->checkoutPage, 'add_load_my_details_button' ) ); 
        }

        public function filter_hooks() {
            add_filter( 'woocommerce_checkout_fields' , array( $this->checkoutPage, 'remove_unrequired_fields' ) );
            add_filter( 'woocommerce_checkout_fields' , array( $this->checkoutPage, 'add_custom_fields' ) );
        }
    }    

    $hooks = new Hooks();
} 
