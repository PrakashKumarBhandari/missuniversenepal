<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
<div class="breadcrumbs_area">
<div class="container container-flute">   
<div class="row">
	<div class="col-12">
	<div class="breadcrumb_content">
		<h3><?php single_cat_title(); // the_archive_title( '<h3 class="page-title">', '</h3>' );?></h3>
		<ul>
			<li><a href="<?php echo site_url(); ?>">HOME</a></li>
			<li><a href="<?php echo site_url('/shop'); ?>">Shop</a></li>
			<li><?php single_cat_title();?></li>
		</ul>
	</div>
	</div>
</div>
</div>         
</div>   

<?php
				
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//do_action( 'woocommerce_archive_description' );
	?>
<div class="shop_area shop_reverse mt-100 mb-100">
    <div class="container container-flute">
        <div class="row">
			<div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
				<?php
				do_action( 'woocommerce_sidebar' );
				?>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
				<?php
				if ( woocommerce_product_loop() ) {

				/**
				* Hook: woocommerce_before_shop_loop.
				*
				* @hooked woocommerce_output_all_notices - 10
				* @hooked woocommerce_result_count - 20
				* @hooked woocommerce_catalog_ordering - 30
				*/
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
				the_post();

				/**
				* Hook: woocommerce_shop_loop.
				*/
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product' );
				}
				}

				woocommerce_product_loop_end();

				/**
				* Hook: woocommerce_after_shop_loop.
				*
				* @hooked woocommerce_pagination - 10
				*/
				do_action( 'woocommerce_after_shop_loop' );
				} else {
				/**
				* Hook: woocommerce_no_products_found.
				*
				* @hooked wc_no_products_found - 10
				*/
				do_action( 'woocommerce_no_products_found' );
				}

				/**
				* Hook: woocommerce_after_main_content.
				*
				* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				*/
				do_action( 'woocommerce_after_main_content' );

				/**
				* Hook: woocommerce_sidebar.
				*
				* @hooked woocommerce_get_sidebar - 10
				*/
				?>
			</div>
		</div>
	</div>
</div>



<?php

get_footer( 'shop' );
