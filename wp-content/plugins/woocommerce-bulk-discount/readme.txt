﻿=== WooCommerce Bulk Discount ===
Contributors: Rene Puchinger
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=6VEQ8XXK6B3UE
Tags: woocommerce, bulk, discount
Requires at least: 3.6
Tested up to: 4.9.4
Stable tag: 2.4.5
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Apply fine-grained bulk discounts to items in the shopping cart.

== Description ==

WooCommerce Bulk Discount makes it possible to apply fine-grained bulk discounts to items in the shopping cart,
depending on the ordered quantity and on the specific product.

**WooCommerce Bulk Discount is compatible with WooCommerce 2.0 to 3.3.**

Let us examine some examples of usage.

*   You may want to feature the following discount policy in your store: if the customer
orders more than 5 items of a given product, he/she will pay the price of this order
line lowered by 10%.

*   Or you may want a different policy, for example offering a 5% discount if the customer
orders more than 10 items of a product and a 10% discount if he/she orders more than
20 items.

*   Bulk Discounts supports fixed and flat discounts in currency units as well,
enabling you to handle scenarios like deducting a specific value of, say $10 from the item subtotal.
For example, when the customer orders more than 10 items (say, 15, 20, etc.), a discount of $10
will be applied only on the subtotal price.

The settings for discounts are simple yet extensive, allowing wide range of discount
policies to be adopted in your store.

Here is the list of the main features:

*   Possibility to set percentage, fixed or flat bulk discount in currency units. (see FAQ section for details)
*   Possibility to set the discount individually per product.
*   Possibility to set the discount globally for all products.
*   Bulk discounts for product variations is supported to treat them separately or by shared quantity when discounting. 
*   Discount is better visible and is available on several locations (see below).
*   Discount is visible on the Checkout page.
*   Discount is visible on the Order Details page.
*   Discount is visible in WooCommerce order e-mails and invoices as well.
*   Showing the applied discount when hovering over the item price in the cart.   
*   Possibility of easily changing the CSS of the price before and after discount.
*   Bulk discount can or cannot be applied if a coupon code is used, depending on configuration.
*   HTML markup is allowed in information about the bulk discount offer in Product Description.
*   Bulk Discount can be disabled more easily in the Product Options page.

WooCommerce Bulk Discount has been localised to these languages:

*   English
*   Czech

Note: Due to important changes in the localization files (mainly with regards to the fixed / flat discount differences) I decided to drop
the other localizations. If you use any localization other than above make sure to check and edit your localization files.

**If you like WooCommerce Bulk Discount, please also check out these premium plugins:**

*   <a href="http://codecanyon.net/item/woocommerce-free-gift/6144902?ref=renp">WooCommerce Free Gift</a>
*   <a href="http://codecanyon.net/item/woocommerce-gift-coupons/6207561?ref=renp">WooCommerce Gift Coupons</a>

== Installation ==

1. Download the latest version and extract it in the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress

Once the plugin is activated, you can use it as follows:

1. First navigate to WooCommerce settings. Under the Bulk Discount tab, find the global
configuration for bulk discounts. Make sure "Bulk Discount enabled" is checked and optionally
fill information about discounts which will be visible on the cart page. You can include HTML
markup in the text - you can, for instance, include a link to your page with your discount
policy. Since version 2.0 you may choose to use a flat discount applied to the cart item subtotal. Optionally you may also
modify the CSS styles for the old value and the new value which is displayed in the cart.
Save the settings.

2. If you want to set the discount individually per product then navigate to Products and choose a product for which you want
to create a discount policy. In the Product Data panel, click Bulk Discount and optionally fill information about the discount
which will be visible in the product description. If you want to set the discount policy globally for all products, just create
a private product with the title 'wc_bulk_discount_configurer' (without quotes). In the bulk discount section of this private
product set the discount as in the case of any individual product (see step 3).

3. Click "Add discount line" button to create a policy. Quantity (min.) means minimal
number of ordered items so that the (second textbox) Discount applies. It is possible to
add up to five discount lines to fine-tune the discount setting.

== Frequently Asked Questions ==

= Are multiple discounts supported? How many levels of discounting may be applied? =

Yes, multiple discounts (related to a single product) are supported. Currently it is possible to
set up to 5 discount lines. That should be enough for reasonable fine-tuning of the discount.

= Is only a percentage discount implemented? =
Since version 2.0 another type of discount is added, allowing you to set a flat discount in currency units
for the cart item subtotal. Since version 2.4.2 you can add a fixed discount type which is a bit different than
the flat discount type - see below for examples.

= Will the discount be visible on WooCommerce e-mails and Order status as well? =
Yes. Since version 2.0, this feature has been implemented.

= Is it possible to handle discount for product variations as a whole? =
Yes, in case you have several product variations in your store and you need to apply the discount
to all the purchased variations, please upgrade to the latest version of Bulk Discount.
This functionality can be disabled in Bulk Discount settings.

= Is the plugin i18n ready? =
Yes, the plugin supports localization files. You can add support for your language as well by the standard process.

= Can you provide an example of setting a percentage bulk discount? =
Sure. Below is an example of setting a bulk discount for a product with three discount lines. 

1. Quantity (min.) = 3, Discount (%) = 5
2. Quantity (min.) = 8, Discount (%) = 10
3. Quantity (min.) = 15, Discount (%) = 15

If the customer orders, say, 12 items of the product which costs $15 per item, the second
discount line will apply. The customer then pays 12 * 15 = 225 dollars in total minus
10%, which yields $202.5. Note that this discount policy only applies to the concrete product -- other
products may have their own (possibly different) discount policies.

= Can you provide an example of setting a flat bulk discount? =
Example for flat discount follows:

1. Quantity (min.) = 10, Discount ($) = 10
2. Quantity (min.) = 30, Discount ($) = 20

If the customer orders, say, 15 items of the product which costs $10 per item, the first discount
line will apply and the customer will pay (15 * 10) - 10 dollars. If the customers orders
50 items, the second discount line will apply and the final price will be (50 * 10) - 20 dollars.

= Can you provide an example of setting a fixed bulk discount? =
Example for fixed discount follows:

1. Quantity (min.) = 10, Discount ($) = 2
2. Quantity (min.) = 30, Discount ($) = 3

If the customer orders, say, 15 items of the product which costs $10 per item, the first discount
line will apply and the customer will pay (15 * 10) - (15 * 2) = 15 * (10 - 2) dollars. If the customers orders
50 items, the second discount line will apply and the final price will be (50 * 10) - (50 * 3) =  50 * (10 - 3) dollars.
**Note the difference between fixed and flat discount types!!! Flat discount is a discount from the line subtotal while fixed discount is applied on each individual quantity.**

= What does mean the "Treat the variations separately" checkbox? =
To illustrate what the setting means, let's have two variations: A and B of some product. Both have this bulk discount setting:
quantity = 10, discount = 10%
quantity = 20, discount = 50%.
If we have "Treat variations separately" checked, then when we order 10 times variation A and 10 times variation B, then 10% bulk discount will be applied on both cart lines.
If we have "Treat variations separately" unchecked, then when we order 10 times variation A and 10 times variation B, it will count the discount to 10 + 10 items,
i.e. 20 items together and now the discount 50% will apply to both cart lines.
Therefore in the first case we treated the variations separately in the computation of the discount and in the second case we treat them as shared.

= How do I set the discount globally for all products? =
This feature has been added to version 2.4.0 of WooCommerce Bulk Discount. If you want to set the discount policy globally for all products,
just create a private product with the title 'wc_bulk_discount_configurer' (without quotes). See <a href="https://codex.wordpress.org/Content_Visibility">https://codex.wordpress.org/Content_Visibility</a> how to make a post (and also product) private.
In the bulk discount section of this private product set the discount as in the case of any individual product. This discount configuration will override all individual discounts set on products (if they have been set).

== Screenshots ==

1. Bulk Discount Settings page.
2. Setting the discount lines (see FAQ for further explanation). Often only one discount line is sufficient.
3. Showing an example of flat bulk discount visibility on the cart page.
4. Bulk discount is visible on the Checkout Page as well.
5. Bulk Discount is visible in WooCommerce e-mails.
6. Example of percentage bulk discount visibility on the cart page.

== Changelog ==

= 2.4.5 =
* (09 Apr 2017) Compatibility issues with WooCommerce 3.0 resolved.

= 2.4.4 =
* (20 Feb 2017) Making the plugin compatible with WooCommerce 2.7 (tested with 2.7 Beta 3).

= 2.4.3 =
* (17 Feb 2017) Making the plugin compatible with WooCommerce 2.7 (tested with 2.7 Beta 2).

= 2.4.2 =
* (25 May 2016) Testing the plugin with WooCommerce 2.6.
* Added another type of discount - check carefully the FAQ section to learn the differences between the supported discount types: percentage, flat and fixed.
* Fixed the issue of showing wrong discount when AJAX cart is enabled.

= 2.4.1 =
* (20 Feb 2016) Removed unnecessary setting field for enabling/disabling the plugin core functionality.

= 2.4.0 =
* (12 Feb 2016) new feature - it is now possible to set the discount globally for all products.

= 2.3.2 =
* (4 Feb 2016) Bugfix - the discount was not applied when the user created an account during checkout.

= 2.3.1 =
* (28 Sep 2014) Bugfix - settings tab was not working in WooCommerce 2.0.x

= 2.3 =
* (11 Sep 2014) Compatibility issues with WooCommerce 2.2 resolved.
* Added Spanish translation.

= 2.2.1 =
* (16 Aug 2014) Added German and Polish translations.

= 2.2 =
* (22 Feb 2014) WooCommerce 2.1 compatibility issues resolved.

= 2.1.5 =
* (7 Dec 2013) It is now possible to disable the feature of removing bulk discounts when a coupon code is applied.
* Minor code cleanup and optimization.

= 2.1.4 =
* (23 Nov 2013) Corrected an issue of forcing Bulk Discount disabled on products after updating from previous versions of Bulk Discount.

= 2.1.3 =
* (18 Nov 2013) Corrected a bug of being not able to disable Bulk Discount on products.

= 2.1.2 =
* (15 Nov 2013) Localisation updated (Portuguese, Czech).
* CSS admin tab alignment correction.

= 2.1.1 =
* (13 Nov 2013) Feature of product variations reverted to 2.0 version state.

= 2.1 =
* (12 Nov 2013) Bulk discount is not applied if coupon code is used.
* HTML markup is allowed in information about the bulk discount offer in Product Description.
* Bulk Discount can be disabled more easily in the Product Options page.
* There are further settings for applying bulk discount to product variations.

= 2.0.12 =
* (23 Oct 2013) Added Swedish translation.

= 2.0.11 =
* (16 Oct 2013) Redesigning input of discounts on Bulk Discount tab to be more user friendly.
* Minor code formatting changes.

= 2.0.10 =
* (10 Oct 2013) Fixing a bug which might have resulted in collision with few other WooCommerce plugins.

= 2.0.9 =
* (9 Oct 2013) Translations updated.
* Minor code formatting changes.

= 2.0.8 =
* (6 Oct 2013) Refined discount precision for percentage discounts with decimal point (no impact on integer discounts).
* Translations updated.

= 2.0.7 =
* (29 Sep 2013) Added configuration of the locations on which the discount information should be visible.

= 2.0.6 =
* (18 Sep 2013) Added Portuguese translation.

= 2.0.5 =
* (12 Sep 2013) Fixed a bug of incorrect discount displayed (no impact on discount computations).

= 2.0.4 =
* (11 Sep 2013) *unstable*

= 2.0.3 =
* (11 Sep 2013) *unstable*

= 2.0.2 =
* (5 Sep 2013) Important maintenance release. Now the bulk discount metadata are stored to orders as well, making it possible to correctly display discounts for past orders. You can also change the plugin settings any time.
* Added quick link to settings on Wordpress > Plugins page.

= 2.0.1 =
* (3 Sep 2013) Added a warning for changing discount type on a site with existing orders (currently it is safe to change discount type only for the first time after installing the plugin or on fresh WooCommerce installation with no orders).

= 2.0 =
* (3 Sep 2013) Possibility of setting a flat discount in currency units.
* Discount is better visible and is available on more lcoations (see below).
* Discount is visible on the Checkout page
* Discount is visible on the Order Details page
* Discount is visible in WooCommerce order e-mails and invoices as well.
* Possibility of easily changing the CSS of the price before and after discount.

= 1.2.2 =
* (2 Sep 2013) Changing default state of product variation setting checkbox for default behaviour of previous versions.

= 1.2.1 =
* (26 Aug 2013) Making the plugin i18n ready, currently there are English and Czech locales.

= 1.2 =
* (24 Aug 2013) Possibility to treat product variations as a whole when discounting.
* CSS changes.
* Showing the applied discount in percentages when hovering over the item price in the cart.

= 1.1.1 =
* (21 Aug 2013) Plugin settings moved to separate tab under WooCommerce > Settings.
* CSS refined.
* code cleanup.
* more code comments added.

= 1.1 =
* (7 Jul 2013) resolved major issues of incorrect discount application in some cases.
* code optimization.
* cleaned up some code.

= 1.0.1 =
* (5 Jul 2013) *unstable*

= 1.0 =
* Initial version.

== Upgrade Notice ==

= 2.4.5 =
Bugfix release.

= 2.4.4 =
Maintenance release.

= 2.4.3 =
Maintenance release.

= 2.4.2 =
New features release.

= 2.4.1. =
Maintenance release.

= 2.4.0 =
New feature release.

= 2.3.2 =
Bugfix release.

= 2.3.1 =
Bugfix release.

= 2.3 =
Maintenance release.

= 2.2.1 =
Language translation release.

= 2.2 =
Maintenance release.

= 2.1.5 =
Maintenance release.

= 2.1.4 =
Bugfix release. Please update immediately.

= 2.1.3 =
Bugfix release. Please update immediately.

= 2.1.2 =
Maintenance release.

= 2.1.1 =
Maintenance release.

= 2.1 =
Release with new features.

= 2.0.12 =
Language translation release.

= 2.0.11 =
More friendly UI.

= 2.0.10 =
Bugfix release.

= 2.0.9 =
Maintenance release.

= 2.0.8 =
Maintenance release.

= 2.0.7 =
Release with new features.

= 2.0.6 =
Minor maintenance release.

= 2.0.5 =
Bugfix release. Please update immediately.

= 2.0.2 =
Important maintenance release. Please update immediately.

= 2.0.1 =
Maintenance release.

= 2.0 =
Major release with new features.

= 1.2.2 =
Maintenance release.

= 1.2.1 =
Release with i18n feature.

= 1.2 =
Release with new features.

= 1.1.1 =
Maintenance release.

= 1.1 =
Important bugfix release. Upgrading recommended as soon as possible.

= 1.0 =
Initial version.
