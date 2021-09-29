<?php
/**
 * Files holds the notifications class
 * @author Kiberu Sharif <kiberusharif@gmail.com>
 */

if ( ! class_exists('LMD_Notifications') ) {
    /**
     * Contains the Notifications markup
     */
    class LMD_Notifications {
        public function the_woocommerce_is_required_notice() {
            $class = 'notice notice-error is-dismissible';
            $message = __( 'Load my details plugin requires the woocommerce plugin. You might want to install it', LMD_SLUG );
            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
        }

    }
}