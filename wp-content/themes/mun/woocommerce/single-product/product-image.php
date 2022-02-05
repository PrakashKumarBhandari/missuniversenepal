<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();

global $product;

$attachment_ids = $product->get_gallery_image_ids();
?>
<!--woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images-->
<div class="prakash product-details-tab woocommerce-product-gallery woocommerce-product-gallery--columns-4 images <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>">
    <figure class="woocommerce-product-gallery__wrapper">
    <div id="img-1" class="zoomWrapper single-zoom">
        <a href="#">
            <?php 	
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
            ?>
            <img id="zoom1" src="<?php echo $featured_img_url;?>" data-zoom-image="<?php echo $featured_img_url;?>" alt="big-1">
        </a>
    </div>
    <?php
    if(is_array($attachment_ids) && count($attachment_ids)>0){
    ?>
    <div class="single-zoom-thumb">
        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
            <?php
            	foreach ( $attachment_ids as $attachment_id ) {
            	  $t_image = wp_get_attachment_image_url ($attachment_id,$size = 'thumbnail');
                  $f_image = wp_get_attachment_image_url ($attachment_id,'full');
            ?>
            <li>
                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo $f_image;?>" data-zoom-image="<?php echo $f_image;?>">
                    <img src="<?php echo $t_image;?>" alt="zo-th-1"/>
                </a>

            </li>
            <?php 
            }
            ?>
            
        </ul>
    </div>
    <?php
    }?>
    </figure>
</div>

                    
