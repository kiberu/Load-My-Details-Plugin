<?php

if ( ! class_exists( 'CheckoutPage' ) ) {
    class CheckoutPage {
        public function add_load_my_details_button() {
            $class = "js_load_my_details";
            $button_text = "Load My Details";
            printf( '<div><button class="%1$s">%2$s</button></div>', esc_attr( $class ), esc_html( $button_text ) ); 
        }

        public function remove_unrequired_fields( $fields ) {
            unset( $fields['billing']['billing_state'] );
            return $fields;
        }

        public function add_custom_fields( $fields ) {
            // Website field
            $fields['billing']['billing_website'] = array(
                'label'         =>  __( 'Website', LMD_SLUG ),
                'placeholder'   =>  _x( 'Website', 'placeholder', LMD_SLUG ),
                'required'      => true,
                'class'         =>  ['form-row-wide'],
                'clear'         => true
            );

            // Username field
            $fields['billing']['billing_username'] = array(
                'label'         =>  __( 'Username', LMD_SLUG ),
                'placeholder'   =>  _x( 'Username', 'placeholder', LMD_SLUG ),
                'required'      => true,
                'class'         =>  ['form-row-wide'],
                'clear'         => true
            );

            return $fields;
        }

        public function save_order_custom_fields( $order_id ) {
            if ( ! empty( $_POST['billing_username'] ) ) {
                update_post_meta( $order_id, '_lmd_billing_username', sanitize_text_field( $_POST['billing_username'] ) );
            }

            if ( ! empty( $_POST['billing_website'] ) ) {
                update_post_meta( $order_id, '_lmd_billing_website', sanitize_text_field( $_POST['billing_username'] ) );
            }
}
    }
}