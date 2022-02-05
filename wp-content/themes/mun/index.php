<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mun
 */

get_header();
?>
  <!-- body -->
  <main class="mun_main">
        <div class="mun_bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/backdrop.svg);">
            <div class="bg_abstract" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/bg-abstract.png);"></div>
            <div class="tabs_bg">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link active" id="tab-mission" data-toggle="pill" href="#mission" role="tab" aria-controls="mission" aria-selected="true"> <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/mission.png" alt=""> <label for="">Mission</label></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-ambassadors" data-toggle="pill" href="#ambassadorse" role="tab" aria-controls="ambassadors" aria-selected="false"><img src="<?php echo get_template_directory_uri();?>/assets/img/icons/ambassadors.png" alt=""> <label for="">Ambassadors</label></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-participate" data-toggle="pill" href="#participate" role="tab" aria-controls="participate" aria-selected="false"><img src="<?php echo get_template_directory_uri();?>/assets/img/icons/participate.png" alt=""> <label for="">Participants</label></a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" id="tab-avatar" data-toggle="pill" href="#avatar" role="tab" aria-controls="avatar" aria-selected="false"><img src="<?php echo get_template_directory_uri();?>/assets/img/icons/avatar.png" alt=""> <label for="">Avatars</label></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="tab-kpi" data-toggle="pill" href="#kpi" role="tab" aria-controls="kpi" aria-selected="false"><img src="<?php echo get_template_directory_uri();?>/assets/img/icons/kpi.png" alt=""> <label for="">KPI's</label></a>
                    </li> -->
                </ul>
            </div>
            <div class="bg_manadala">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/half-mandala.png" alt="">
            </div>
        </div>

        <div class="bg_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="logo_bg">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/mun-logo.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Mission -->
                            <div class="tab-pane fade show active" id="mission" role="tabpanel" aria-labelledby="tab-mission">
                                <div class="main_heading mb-30">
                                    <h2>Mission</h2>
                                </div>
                                <div uk-lightbox class="slider-ambassdor owl-carousel owl-theme">
                                    <?php
                                    $args_mission = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'mission'
                                    );
                                    $the_query_m = new WP_Query($args_mission);
                                    if ($the_query_m->have_posts()):
                                    while ($the_query_m->have_posts()): $the_query_m->the_post();                       
                                    $video = get_field('video');
                                    $featured_image = get_field('thumbnail');                            
                                    $video_thumbnail = $featured_image['sizes']['video_thumbnail'];
                                    ?>
                                    <a  class="uk-button item-img item" href="<?php echo $video['url'];?>" style="background-image: url(<?php echo $video_thumbnail;?>);" >
                                        <div class="">
                                            <div class="play_icon">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/play.svg" alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                    endwhile;
                                    endif;
                                    ?>
                                </div>   
                            </div>

                            <!-- Ambassadors -->
                            <div class="tab-pane fade" id="ambassadorse" role="tabpanel" aria-labelledby="tab-ambassadors">
                                <div class="main_heading mb-30">
                                    <h2>Ambassadors</h2>
                                </div>
                                <div class="slider-mission owl-carousel owl-theme">
                                    <?php
                                    $args_ambassadors = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'ambassadors'
                                    );
                                    $the_query_a = new WP_Query($args_ambassadors);
                                    if ($the_query_a->have_posts()):
                                        while ($the_query_a->have_posts()): $the_query_a->the_post();                       
                                        $video = get_field('video');
                                        $isVideo = get_field('video_or_bio');
                                        $featured_image = get_field('thumbnail');                            
                                        $video_thumbnail = $featured_image['sizes']['video_thumbnail'];
                                       
                                        if($isVideo =='Video'){?>
                                        <div uk-lightbox class="item">
                                            <a class="uk-button item item-img" href="<?php echo $video['url'];?>" style="background-image: url(<?php echo $video_thumbnail;?>);" >
                                                <div class="">
                                                    <div class="play_icon">
                                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/play.svg" alt="">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        else
                                        {
                                            $small_thumbnail = $featured_image['sizes']['thumbnail'];
                                            $title = get_the_title();
                                            $bio = get_field('bio');       
                                        ?>
                                        <div class="item">
                                            <a class="uk-button item item-img btn btn-primary modalPop" data-title="<?php echo $title;?>" data-bio="<?php echo $bio;?>" data-thumburl="<?php echo $small_thumbnail;?>"  type="button"  data-toggle="modal"   style="background-image: url(<?php echo $video_thumbnail;?>);" >
                                                <div class="">
                                                    <div class="play_icon">
                                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/link.svg" alt="">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        endwhile;
                                        endif;
                                        ?>                                   
                                  
                                </div>  
                            </div>

                            <!-- Partcipate -->
                            <div class="tab-pane fade" id="participate" role="tabpanel" aria-labelledby="tab-participate">
                                <div class="main_heading mb-30">
                                    <h2>Participants</h2>
                                </div>

                                <div uk-lightbox class="slider-partcipate owl-carousel owl-theme">
                                    <?php
                                    $args_contestants = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'contestants'
                                    );
                                    $the_query_c = new WP_Query($args_contestants);
                                    if ($the_query_c->have_posts()):
                                    while ($the_query_c->have_posts()): $the_query_c->the_post();                        
                                    $video = get_field('video');
                                    $featured_image = get_field('thumbnail');                            
                                    $video_thumbnail = $featured_image['sizes']['video_thumbnail'];
                                    ?>
                                    <a  class="uk-button item-img item" href="<?php echo $video['url'];?>" style="background-image: url(<?php echo $video_thumbnail;?>);" >
                                        <div class="">
                                            <div class="play_icon">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/play.svg" alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                    endwhile;
                                    endif;
                                    ?>



                                   
                                </div>                                
                            </div>

                             <!-- Avtar0 -->
                             <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="tab-participate">
                                <div class="main_heading mb-30">
                                    <h2>Avatar</h2>
                                </div>
                                <div class="avatar-slider owl-carousel owl-theme">
                                    <?php
                                    $args_avatars = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'avatars'
                                    );
                                    $the_query_a = new WP_Query($args_avatars);
                                    if ($the_query_a->have_posts()):
                                    while ($the_query_a->have_posts()): $the_query_a->the_post();                       
                                    $video = get_field('video');
                                    $isVideo = get_field('video_or_bio');
                                    $featured_image = get_field('thumbnail');                            
                                    $video_thumbnail = $featured_image['sizes']['video_thumbnail'];
                                   
                                    if($isVideo =='Video'){?>
                                    <div uk-lightbox class="item">
                                        <a class="uk-button item item-img" href="<?php echo $video['url'];?>" style="background-image: url(<?php echo $video_thumbnail;?>);" >
                                            <div class="">
                                                <div class="play_icon">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/play.svg" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                        $small_thumbnail = $featured_image['sizes']['thumbnail'];
                                        $title = get_the_title();
                                        $bio = get_field('bio');       
                                    ?>
                                    <div class="item">
                                        <a class="uk-button item item-img btn btn-primary modalPop" data-title="<?php echo $title;?>" data-bio="<?php echo $bio;?>" data-thumburl="<?php echo $small_thumbnail;?>"  type="button"  data-toggle="modal"   style="background-image: url(<?php echo $video_thumbnail;?>);" >
                                            <div class="">
                                                <div class="play_icon">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/link.svg" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    endwhile;
                                    endif;
                                    ?>
                                </div>  
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


<!-- Modal -->
<div class="modal fade" id="modalPopDynamic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bio-content">
        <button type="button" class="close btn_close" data-dismiss="modal" aria-label="Close">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/icons/close.svg" alt="">
        </button>
        <div class="modal-body">
        <div  id="model_description" class="bio_description">
        </div>
        <div class="cont-pro">
            <div class="img-cont"   ><img src="" id="model_image"></div>
            <div id="model_title" class="name-conts">
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
<script>
jQuery(document).on("click", ".modalPop", function () {
    var model_title = jQuery(this).attr('data-title');
    var model_description = jQuery(this).attr('data-bio');
    var model_image = jQuery(this).attr('data-thumburl');

    jQuery('#model_title').html(model_title);
    jQuery('#model_description').html(model_description);
    jQuery("#model_image").attr("src",model_image);
    jQuery('#modalPopDynamic').modal('show');
});
</script>
<?php
//get_sidebar();
get_footer();