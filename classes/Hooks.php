<?php
/**
 * File contains the plugin hooks class.
 * @author Sharif Kiberu <kiberusharif@gmail.com>
 * 
 */

if ( ! class_exists( 'LMD_Hooks' ) ) {

    /**
     * This is a collection of all the hooks used in the plugin functionality
     * @version 1.0.0
     */
    class LMD_Hooks {

        /**
         * Class Constructor Method.
         * Calls the includes method that hold the functionality.
         * Creates class instances for the various functionalities.
         */
        public function __construct () {
            $this->includes();

            // Create class instances
            $this->activation = new LMD_Activation();
            $this->checkoutPage = new LMD_Checkout();

            $this->action_hooks();
            $this->filter_hooks();

        }

        /**
         * Calls the class files required in the plugin.
         *
         * @return void
         */
        public function includes() {
            require_once( LMD_PATH . 'classes/Activation.php' );
            require_once( LMD_PATH . 'classes/CheckoutPage.php' );
        }

        /**
         * Holds the action hooks of the plugin
         *
         * @return void
         */
        public function action_hooks() {
            add_action( 'init', array( $this->activation, 'check_if_woocommerce_installed' ) );
            add_action( 'woocommerce_before_checkout_billing_form',  array( $this->checkoutPage, 'add_load_my_details_button' ) ); 
            add_action( 'woocommerce_admin_order_data_after_billing_address', array( $this->checkoutPage, 'display_custom_fields_in_dashboard' ), 10, 1 );
            add_action( 'woocommerce_checkout_update_order_meta', array( $this->checkoutPage, 'save_order_custom_fields' ) );
        }

        /**
         * Holds the filter hooks of the plugin.
         *
         * @return void
         */
        public function filter_hooks() {
            add_filter( 'woocommerce_checkout_fields' , array( $this->checkoutPage, 'remove_unrequired_fields' ) );
            add_filter( 'woocommerce_checkout_fields' , array( $this->checkoutPage, 'add_custom_fields' ) );
        }
    }    

    // Instatitate hooks class
    $hooks = new LMD_Hooks();
} 
