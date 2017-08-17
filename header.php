<?php
/**
 * Created by PhpStorm.
 * User: vol4n3
 * Date: 17/08/2017
 * Time: 21:37
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="top-header shadow-light">
        <div class="jc_container">
            <nav class="box y-center">
                <div class="logo">
                    <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    if($image) : ?>
                    <img class="logo" src="<?php echo $image[0]; ?>">
                    <?php endif;?>
                </div>
                <?php dynamic_sidebar( 'header-widget' ); ?>
                <nav class="right">
	                <?php wp_nav_menu(array(
	                        'theme_location' => 'header-menu',
                            'container' => 'ul',
                            'menu_class' => 'list box wrap nav-effect-cut',

	                )); ?>
                </nav>
            </nav>
            <div class="box y-center between big-title">
                <div class="header-hide-effect"></div>
                <div>
                    <h1><?php  echo bloginfo( 'name' ); ?></h1>
                    <h2><?php echo get_bloginfo( 'description', 'display' ); ?></h2>
                </div>
            </div>
        </div>

    </div>
    <div class="fix-top-header"></div>
    <div class="bottom-header box y-center center">
        <div class="title-caption move-down box down y-center ">
            <h2 class="light margin-y">Code is my passion</h2>
            <div>
                <span class="btn margin-x btn-primary text-uppercase">Know more</span>
                <span class="btn margin-x text-uppercase">Hire me</span>
            </div>
        </div>
    </div>

</header>
