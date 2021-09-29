<?php
/**
 * Class Checkout Page
 *
 * @package Load_My_Details
 */

/**
 * Test Checkout Page Class.
 */
class LMD_Checkout_Page_Test extends WP_UnitTestCase {

	/**
     * Test that billing state field is removed
     *
     * @return void
     */
    public function test_remove_unrequired_fields() {
        $checkout_page  = new LMD_Checkout();
        $fields = WC()->checkout->get_checkout_fields();

        $checkout_page->remove_unrequired_fields( $fields );
        $this->assertFalse( array_key_exists( 'billing_state', $fields['billing'] ) );
    }

    /**
     * Test that billing website and billing username fields are added
     *
     * @return void
     */
    public function test_add_custom_fields() {
        $checkout_page  = new LMD_Checkout();
        $fields = WC()->checkout->get_checkout_fields();
        $checkout_page->add_custom_fields($fields);
        $this->assertArrayHasKey('billing_website', $fields['billing']);
        $this->assertArrayHasKey('billing_username', $fields['billing']);
    }

    /**
     * Test that custom fields are saved
     *
     * @return void
     */
    public function test_save_order_custom_fields() {
        $checkout_page  = new LMD_Checkout();
        $_POST['billing_username'] = "Abu";
        $_POST['billing_website'] = "abu.com";

        $order = $this->create_new_order();
        
        $checkout_page->save_order_custom_fields( $order->get_id() );

        $this->assertEquals( "Abu", get_post_meta( $order->get_id(), '_lmd_billing_username', true ) );
        $this->assertEquals( "abu.com", get_post_meta( $order->get_id(), '_lmd_billing_website', true ) );
    }
    
    private function create_new_order() {
        $address = array(
            'first_name' => 'Test',
            'last_name'  => 'Test',
            'company'    => 'Test Society',
            'email'      => 'joe@testing.com',
            'phone'      => '760-555-1212',
            'address_1'  => '123 Main st.',
            'address_2'  => '104',
            'city'       => 'San Diego',
            'state'      => 'Ca',
            'postcode'   => '92121',
            'country'    => 'US'
        );

        // Now we create the order
        $order = wc_create_order();

        // The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
        $order->add_product( $this->create_product(), 1); // This is an existing SIMPLE product
        $order->set_address( $address, 'billing' );
        //
        $order->calculate_totals();

        return $order;

    }

    private function create_product() {
        $post_id = wp_insert_post( array(
            'post_title' => 'Test Product',
            'post_type' => 'product',
            'post_status' => 'publish',
            'post_content' => 'Test Description',
        ));
        $product = wc_get_product( $post_id );
        $product->save();

        return $product;
    }

}
