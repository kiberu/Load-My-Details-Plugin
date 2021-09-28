<?php

if ( ! class_exists('Notifications') ) {
    class Notifications {
        public function woocommerce_is_required_notice() {
            $class = 'notice notice-error is-dismissible';
            $message = __( 'Load my details plugin requires the woocommerce plugin. You might want to install it', LMD_SLUG );
            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
        }

    }
}