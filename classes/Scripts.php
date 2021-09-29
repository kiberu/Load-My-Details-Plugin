<?php
/**
 * Includes Css And Javascript Enqueue Scripts Class.
 * @author Kiberu Sharif <kiberusharif@gmail.com>
 */

if ( ! class_exists( 'LMD_Scripts' ) ) {

    /**
     * JS and CSS Scripts Class.
     * @version 1.0.0
     */
    class LMD_Scripts {

        /**
         * Constructor Function.
         * Calls the enqueue hooks for the plugin.
         */
        public function __construct() {
            $this->enqueue_hooks();
        }

        /**
         * Enqueue JS Scripts.
         *
         * @return void
         */
        public function enqueue_js_scripts() {
            wp_enqueue_script( 'axios', 'https://unpkg.com/axios/dist/axios.min.js' );
            wp_enqueue_script( 'load-my-details-script', LMD_URL . '/js/load-my-details.js', array( 'jquery' ) );
        
        }

        /**
         * Enqueue CSS Style Scripts.
         *
         * @return void
         */
        public function enqueue_css_styles() {
            wp_enqueue_style( 'load-my-details-style',  LMD_URL . "/css/load-my-details.css" );
        }

        /**
         * Enqueue Script Hooks.
         *
         * @return void
         */
        public function enqueue_hooks() {
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js_scripts' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css_styles' ) );
        }
    }

    // Instatiate the scripts class.
    $scripts = new LMD_Scripts();
}