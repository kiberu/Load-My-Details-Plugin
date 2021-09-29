# LOAD MY DETAILS PLUGIN
The plugin Adds a load my details button on checkout page, adjusts checkout fields, and shows them in admin dashboard.

## Installation
Clone this repository and install it wordpress dashboard. You can follow this URL https://www.wpbeginner.com/beginners-guide/step-by-step-guide-to-install-a-wordpress-plugin-for-beginners/ for tutorials on how to install wordpress plugins

## Usage
Add a product to cart then proceed to checkout. You will see the button just before the checkout page. When clicked, it will populate the fields from the api data provided. Custom fields like website and username will be added.

## Developer
### File Structure
The main functionality is found in the classes folder of the plugin. The Activation file holds the functionality that is triggered when plugin is activated. Checkout Page file holds the functionality found on the checkout page. Hooks File contains all the actions and filters, Load my details file is the gateway into the plugin. Notification files contains the nptification mackup used in the plugin. Scripts holds the JS and CSS Enqueue code.

### Tests
To run tests, run 
```composer install```
This requires you have composer installed on your setup

Then run
```./vendor/bin/phpunit```
You must have the phpunit environment set up on your machine. If not, checkout this tutorial here: https://neliosoftware.com/blog/introduction-to-unit-testing-in-wordpress-phpunit/?nab=0