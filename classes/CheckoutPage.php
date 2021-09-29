<?php
/**
 * File holds the custom checkout functionality of the plugin
 * @author Kiberu Sharif <kiberusharif@gmail.com>
 */

if ( ! class_exists( 'LMD_Checkout' ) ) {

    /**
     * Class contains the checkout form customization functions of the plugin
     * @version 1.0.0
     */
    class LMD_Checkout {

        /**
         * Add the LMD Button HTML just above the checkout form.
         *
         * @return void
         */
        public function add_load_my_details_button() {
            $class = "js_load_my_details";
            $button_text = "Load My Details";
            printf( '<div><button class="%1$s">%2$s</button></div>', esc_attr( $class ), esc_html( $button_text ) ); 
        }

        /**
         * Remove unrequired default checkout fields.
         *
         * @param [array] $fields
         *
         * @return void
         */
        public function remove_unrequired_fields( $fields ) {
            unset( $fields['billing']['billing_state'] );
            return $fields;
        }

        /**
         * Add custom checkout fields as per the API
         *
         * @param [array] $fields
         *
         * @return void
         */
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

        /**
         * Save the custom checkout fields
         *
         * @param [integer] $order_id
         *
         * @return void
         */
        public function save_order_custom_fields( $order_id ) {
            if ( ! empty( $_POST['billing_username'] ) ) {
                update_post_meta( $order_id, '_lmd_billing_username', sanitize_text_field( $_POST['billing_username'] ) );
            }

            if ( ! empty( $_POST['billing_website'] ) ) {
                update_post_meta( $order_id, '_lmd_billing_website', sanitize_text_field( $_POST['billing_website'] ) );
            }
        }

        /**
         * Display the custom checkout fields in admin dashboard
         *
         * @param [type] $order
         *
         * @return void
         */
        public function display_custom_fields_in_dashboard( $order ) {
            printf( '<p><strong>%1$s:</strong> <a href="%2$s">%3$s</a>', __('Website'), esc_url( get_post_meta( $order->get_id(), '_lmd_billing_website', true ) ), get_post_meta( $order->get_id(), '_lmd_billing_website', true ) );
            echo '<p><strong>'.__('Username').':</strong> ' . get_post_meta( $order->get_id(), '_lmd_billing_username', true ) . '</p>';
        }
    }
}