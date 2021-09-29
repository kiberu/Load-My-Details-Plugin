<?php
/**
 * Class Hooks
 *
 * @package Load_My_Details
 */

/**
 * Test Hooks Class.
 */
class LMD_Hooks_Test extends WP_UnitTestCase {
    
    /** 
     * Test if when woocommerce class is not there, add action will add new notification
     */
    public function test_if_hooks_exists() {
        global $wp_actions;

        $hooks = new LMD_Hooks();
        $hooks->action_hooks();

        $hook_methods = $this->get_methods_from_hook( 'woocommerce_before_checkout_billing_form' );
        // $this->assertTrue( in_array( 'check_if_woocommerce_installed', $hook_methods ) );
        
        $hook_methods = $this->get_methods_from_hook( 'init' );
        $this->assertTrue( in_array( 'add_load_my_details_button', $hook_methods ) );
        
        $hook_methods = $this->get_methods_from_hook( 'woocommerce_admin_order_data_after_billing_address' );
        $this->assertTrue( in_array( 'display_custom_fields_in_dashboard', $hook_methods ) );
        
        $hook_methods = $this->get_methods_from_hook( 'woocommerce_checkout_update_order_meta' );
        $this->assertTrue( in_array( 'save_order_custom_fields', $hook_methods ) );

    }

    /**
     * Get all methods in a hook
     *
     * @param [String] $hook
     *
     * @return void
     */
    private function get_methods_from_hook( $hook ) {
            global $wp_filter;

            $methods = [];

            if ( isset( $wp_filter[$hook]->callbacks ) ) {
                foreach( $wp_filter[$hook]->callbacks as $callback ) {
                    foreach ($callback as $key => $value) {
                        $methods[] = $value['function'][1];
                    }
                }
            }

            return $methods;
        }

}
