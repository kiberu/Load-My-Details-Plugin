<?php

if ( ! class_exists( 'Hooks' ) ) {
    class Hooks {
        public function __construct () {
            $this->includes();
            $this->action_hooks();
        }

        public function includes() {
            require_once( LMD_PATH . '/Activation.php' );
        }

        public function action_hooks() {
            $activation = new Activation();
            add_action( 'init', array( $activation, 'check_if_woocommerce_installed' ) );
        }
    }    

    $hooks = new Hooks();
} 
