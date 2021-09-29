<?php
/**
 * Class Activation
 *
 * @package Load_My_Details
 */

/**
 * Test Activation Class.
 */
class LMD_Activation_Test extends WP_UnitTestCase {
    
    /** 
     * Test if when woocommerce class is not there, add action will add new notification
     */
    public function test_if_woocommerce_class_exists() {
        global $wp_filter;

        $activation = new LMD_Activation();
        $activation->check_if_woocommerce_installed();
        
        $hook_methods = $this->get_methods_from_hook( 'admin_notices' );
        print_r($hook_methods);
        $this->assertFalse( in_array( 'the_woocommerce_is_required_notice', $hook_methods ) );


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
