<?php
/* Template Name: Shop Page 
 */

get_header();
?>
<div class="breadcrumbs_area">
    <div class="container container-flute">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
				    <h3><?php the_title(); ?></h3>
                    <ul>
                        <li><a href="<?php echo site_url(); ?>">HOME</a></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<div class="munAbout-contents">
    <div class="container container-flute">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">                
                <?php echo do_shortcode('[woocommerce_my_account]');?>                
            </div>
        </div>
    </div>
</div>
<?php
get_footer();