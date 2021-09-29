<?php

if ( ! class_exists( 'Scripts' ) ) {
    class Scripts {
        public function __construct() {
            $this->enqueue_hooks();
        }

        public function enqueue_js_scripts() {
            wp_enqueue_script( 'axios', 'https://unpkg.com/axios/dist/axios.min.js' );
            wp_enqueue_script( 'load-my-details-script', LMD_URL . '/js/load-my-details.js', array( 'jquery' ) );
        
        }

        public function enqueue_css_styles() {
            wp_enqueue_style( 'load-my-details-style',  LMD_URL . "/css/load-my-details.css" );
        }

        public function enqueue_hooks() {
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js_scripts' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css_styles' ) );
        }
    }

    $scripts = new Scripts();
}