<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpnewstart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" rel="shortcut icon" type="image/png">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site page">
        <!-- HEADER -->
        <header>
            <div class="container">
                <div class="brand">
                    <?php if (is_front_page() && is_home() ) {?>
                    <?php if (ot_get_option( 'logo_upload' )) {?>
                    <h1 class="brand_me"><img src="<?php echo ot_get_option('logo_upload');?>" alt=""></h1>
                    <?php }else { ?>
                    <h1 class="brand_name">
                        <a href="<?php echo home_url(); ?>">
                            <?php bloginfo('name');?></a> </h1>
                    <?php }?>
                    <?php } else {?>
                    <div class="brand_name"><a href="<?php echo home_url();?>"><?php
					blog_info('name');?></a></div>
                    <?php }?>
                    <?php if (ot_get_option( 'desc_on_off' ) != 'off') {?>
                    <p class="br
					and_slogan"><?php bloginfo('description');?>
                    </p>
                    <?php }?>
                </div>
                <?php if (ot_get_option( 'contact_phone' )) {?>
                <a href="callto:<?php echo str_replace (['-', ')','(', ' ', '_'], "", ot_get_option( 'contact_phone' ));?>"
                    class="fa-phone"><?php echo ot_get_option('contact_phone');?></a>
                <?php } ?>
                <?php if (ot_get_option( 'contact_open' )) {?>
                <p><?php echo ot_get_option('contact_open');?></p>
                <!-- One of our representatives will happily contact you within 24 hours. For urgent needs call us at -->
                <?php } ?>
            </div>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <nav class="nav">
                        <ul data-type="navbar" class="sf-menu">
                            <li class="active"><a href="./">Home</a>
                            </li>
                            <li><a href="index-1.html">About</a>
                                <ul>
                                    <li><a href="#">Lorem ipsum dolor</a></li>
                                    <li><a href="#">Conse ctetur adipisicing</a></li>
                                    <li><a href="#">Elit sed do eiusmod
                                            <ul>
                                                <li><a href="#">Lorem ipsum</a></li>
                                                <li><a href="#">Conse adipisicing</a></li>
                                                <li><a href="#">Sit amet dolore</a></li>
                                            </ul></a></li>
                                    <li><a href="#">Incididunt ut labore</a></li>
                                    <li><a href="#">Et dolore magna</a></li>
                                    <li><a href="#">Ut enim ad minim</a></li>
                                </ul>
                            </li>
                            <li><a href="index-2.html">Services</a>
                            </li>
                            <li><a href="index-3.html">FAQS</a>
                            </li>
                            <li><a href="index-4.html">Contacts</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>





        <!-- . <a class="skip-link screen-reader-text" -->
        <!-- href="#content"><?php //esc_html_e( 'Skip to content', 'wpnewstart' ); ?></a> -->

        <!-- <header id="masthead" class="site-header"> -->
        <!-- <div class="site-branding"> -->
        <!-- <?php
        //the_custom_logo();
        //if ( is_front_page() && is_home() ) :
        ?>
        <h1 class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"
                rel="home"><?php //bloginfo( 'name' ); ?></a></h1>
        <?php
			//else :
				?>
        <p class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"
                rel="home"><?php //bloginfo( 'name' ); ?></a></p>
        <?php
			//endif;
		//	$wpnewstart_description = get_bloginfo( 'description', 'display' );
		//	if ( $wpnewstart_description || is_customize_preview() ) :
				?>
        <p class="site-description"><?php //echo $wpnewstart_description; /* WPCS: xss ok. */ ?></p>
        <?php //endif; ?>
    </div>.site-branding -->

        <!-- <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'wpnewstart' ); ?></button>
                <?php
			//wp_nav_menu( array(
				//'theme_location' => 'menu-1',
				//'menu_id'        => 'primary-menu',
			//) );
			?>
            </nav>< #site-navigation -->
        <!-- </header>#masthead -->

        <!--<div id="content" class="site-content"> -->