<?php

class CheckoutButton {
    public function add_load_my_details_button () {
        $class = "js_load_my_details";
        $button_text = "Load My Details";
        printf( '<div><button class="%1$s">%2$s</button></div>', esc_attr( $class ), esc_html( $button_text ) ); 
    }
}