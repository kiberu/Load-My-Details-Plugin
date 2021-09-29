/**
 * It’s a common practice that ensures jQuery runs in no conflict mode and in strict mode.
 * Strict mode helps out in a couple ways:
 * It catches some common coding bloopers, throwing exceptions.
 * It prevents, or throws errors, when relatively “unsafe” actions are taken (such as gaining access to the global object).
 * It disables features that are confusing or poorly thought out.
 */

(function( $ ) {
 
    "use strict";

    $(document).on('click', '.js_load_my_details', function(e){
        e.preventDefault();
        const user_id = 1;
        const lmd_button = $(this);

         // Declare checkout fields
        const first_name_field = $('#billing_first_name');
        const last_name_field = $('#billing_last_name');
        const company_field = $('#billing_company');
        const username_field = $('#billing_username');
        const address_field = $('#billing_address_1');
        const address_2_field = $('#billing_address_2');
        const city_field = $('#billing_city');
        const state_field = $('#billing_state');
        const phone_field = $('#billing_phone');
        const email_field = $('#billing_email');
        const website_field = $('#billing_website');
        const postcode_field = $('#billing_postcode');


        // Change button text to loading
        lmd_button.html("Loading...");

        // We are using axios to make use of its non blocking nature such that other users of the system are not affected by this process
        axios.get('https://jsonplaceholder.typicode.com/users')
        .then(response => {
            const result = response.data;
            const customer = result.find((single_customer) => single_customer.id === user_id);

            // Change button text to done
            lmd_button.html("Done");
            lmd_button.addClass("done")
            
            // Extract variables form customer object
            const { name, address, company, email, phone, username, website} = customer
            
            // Populate the fields with customer data from api
            first_name_field.val(name ? name.split(" ")[0] : " ")
            last_name_field.val(name ? name.split(" ")[1] : " ")
            company_field.val(company.name || "") 
            address_field.val(address.street || "")
            address_2_field.val(address.suite || "")
            city_field.val(address.city || "")
            state_field.val(address.city || "")
            phone_field.val(phone ? phone.split(" ")[0] : "")
            email_field.val(email || "")
            website_field.val(website || "")
            username_field.val(username || "")
            postcode_field.val(address.zipcode || "")

        })
        .catch(error => {
            alert("API fetch failed. Could be because of your internet or reource is no longer live")
            lmd_button.html("Load My Details");
            lmd_button.removeClass("done")
        });
        
    });
 
})(jQuery);