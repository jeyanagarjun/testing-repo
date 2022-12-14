<?php
/**
 *  rekord woocommerce configration 
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */

add_theme_support('woocommerce');

if (!class_exists('Woocommerce'))
    return;


/*----------------------------------------------------------------
 * Styles Hooks Filters & Actions
 *
 * @overiding  -Disable the default stylesheet for woocommerce
 *-----------------------------------------------------------------*/

add_filter('woocommerce_enqueue_styles', 'rekord_wc_dequeue_styles');
function rekord_wc_dequeue_styles($enqueue_styles)
{
    unset($enqueue_styles['woocommerce-general']); 
    
    return $enqueue_styles;
}

/**
 * Add Bootstrap form styling to WooCommerce fields
 */
function rekord_wc_bootstrap_form_field_args($args, $key, $value)
{
    
    $args['input_class'][] = 'form-control';
    return $args;
}
add_filter('woocommerce_form_field_args', 'rekord_wc_bootstrap_form_field_args', 10, 3);

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'rekord_loop_columns', 999);
if (!function_exists('loop_columns')) {
    function rekord_loop_columns()
    {
        return 4; 
    }
}

/**
 * Define image sizes
 */
add_theme_support('woocommerce', array(
    'gallery_thumbnail_image_width' => 100,
    'single_image_width' => 470
));


add_action('after_setup_theme', 'rekord_wc_setup');
function rekord_wc_setup()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-slider');
}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


/*----------------------------------------------------------------
 * Wrapper
 *-----------------------------------------------------------------*/

add_action('woocommerce_before_main_content', 'rekord_woocommerce_before_main_content_wrapper', 5);
function rekord_woocommerce_before_main_content_wrapper()
{
    echo '<div class="container-fluid relative animatedParent animateOnce">
            <div class="animated fadeInUpShort p-md-5 p-3">';
}


add_action('woocommerce_after_main_content', 'rekord_woocommerce_after_main_content_wrapper', 15);
function rekord_woocommerce_after_main_content_wrapper()
{
    echo '</div><!--@animated--></div><!--@container-fluid-->';
}

/**
 * Filter just the args for adding a custom data attribute
 */
add_filter('woocommerce_loop_add_to_cart_args', 'rekord_filter_woocommerce_loop_add_to_cart_args', 10, 2);
function rekord_filter_woocommerce_loop_add_to_cart_args($args, $product)
{
    $args['class'] = 'button product_type_simple add_to_cart_button ajax_add_to_cart btn btn-outline-primary btn-sm no-ajaxy';
    return $args;
}



/*----------------------------------------------------------------
 * Catalog Page Hooks Filters & Action
 *-----------------------------------------------------------------*/


add_action('woocommerce_before_shop_loop_item', 'rekord_woocommerce_before_shop_loop_item', 5);
function rekord_woocommerce_before_shop_loop_item()
{
    echo '<div class="pb-3">';
}

add_action('woocommerce_after_shop_loop_item', 'rekord_woocommerce_after_shop_loop_item', 15);
function rekord_woocommerce_after_shop_loop_item()
{
    echo '</div>';
}
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);



/*----------------------------------------------------------------
 * Single Page Hooks Filters & Actions
 *
 * @overiding  - Woo hooks filter and actions for single page
 *-----------------------------------------------------------------*/



add_action('woocommerce_before_single_product_summary', 'rekord_woo_before_show_product_images_column', 10);
function rekord_woo_before_show_product_images_column()
{
    echo '<div class="row"> <div class="col-xs-12 col-sm-4">';
}


add_action('woocommerce_before_single_product_summary', 'rekord_woo_after_show_product_images', 25);
function rekord_woo_after_show_product_images()
{
    echo '</div>';
}


add_action('woocommerce_before_single_product_summary', 'rekord_woo_before_single_product_summary', 30);
function rekord_woo_before_single_product_summary()
{
    echo '<div class="col-xs-12 col-sm-7 col-md-offset-1">';
}

add_action('woocommerce_after_single_product_summary', 'rekord_woo_after_single_product_summary', 30);
function rekord_woo_after_single_product_summary()
{
    echo '</div><!-- .col -->
        </div><!-- end row--> ';
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 45);