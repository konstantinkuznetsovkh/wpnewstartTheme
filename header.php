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





              <!-- вставляем вывод конт формы -->
                <?php 
                if (ot_get_option( 'header_feedback_on_off')  != 'off') { ?>
               <p> <a href="#header-feedback-form" class="feedback-form"><?php echo ot_get_option('feedback_title');?></a>     </p>                 
                <div id="header-feedback-form" class="white-popup-block mfp-hide ">
                    <?php if (ot_get_option( 'feedback_form' )) { ?>
                    <?php echo do_shortcode( ot_get_option('feedback_form')) ;?>               <!-- One of our representatives will happily contact you within 24 hours. For urgent needs call us at -->
                    <?php } ?>
                </div>               
                <?php } ?>
            </div>
            
            <!-- <a class="popup-with-form" href="#test-form">Open form</a>

            <form id="test-form" class="mfp-hide white-popup-block">
	<h1>Form</h1>
	<fieldset style="border:0;">
		<p>Lightbox has an option to automatically focus on the first input. It's strongly recommended to use <code>inline</code> popup type for lightboxes with form instead of <code>ajax</code> (to keep entered data if the user accidentally refreshed the page).</p>
		<ol>
			<li>
				<label for="name">Name</label>
				<input id="name" name="name" type="text" placeholder="Name" required="">
			</li>
			<li>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="example@domain.com" required="">
			</li>
			<li>
				<label for="phone">Phone</label>
				<input id="phone" name="phone" type="tel" placeholder="Eg. +447500000000" required="">
			</li>
			<li>
				<label for="textarea">Textarea</label><br>
				<textarea id="textarea">Try to resize me to see how popup CSS-based resizing works.</textarea>
			</li>
		</ol>
	</fieldset>
</form> -->
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