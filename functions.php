<?php
/**
 * wpnewstart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpnewstart
 */


/**
 * Required: set 'ot_theme_mode' filter to true.
 */
//подключаем optionTree
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_show_pages', '__return_false' );//убирает из админ панели плагин

//перенесем наше меню настроек плагина вниз админы
function theme_options_parent($parent) {
	$parent = '';
	return $parent;
}
add_filter('ot_theme_options_parent_slug', 'theme_options_parent', 20);

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

require( trailingslashit(  get_template_directory() ) . 'functions/theme-options.php');
require( trailingslashit(  get_template_directory() ) . 'functions/meta-boxes.php');
// require( trailingslashit(  get_template_directory() ) . 'meta-boxes.php');
// if ( ! function_exists( 'wpnewstart_setup' ) ) :
	//функция поддержки дочерних тем
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpnewstart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpnewstart, use a find and replace
		 * to change 'wpnewstart' to the name of your theme in all the template files.
		 */

		// load_theme_textdomain( 'wpnewstart', get_template_directory() . '/languages' ); //для перевода темы не мультиязычность

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' );//автоматические ссылки-восновном требуются для блога

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );//автораставление тайтлов на стр

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );//поддержка миниатюр

		// This theme uses wp_nav_menu() in one location.
		//регистрация меню
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'wpnewstart' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		//поддержка комментов галерей и подписей для картинок
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	

		// Set up the WordPress core custom background feature
		
		//поддержка произвольног бэкграйнда
		// add_theme_support( 'custom-background', apply_filters( 'wpnewstart_custom_background_args', array(
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// ) ) );

		// Add theme support for selective refresh for widgets
		
		//поддержка кастомных виджетов через кастомайзер
		// add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

}
// endif;
add_action( 'after_setup_theme', 'wpnewstart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

//регулирование контента ширины
// function wpnewstart_content_width() {
// 	// This variable is intended to be overruled from themes.
// 	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
// 	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
// 	$GLOBALS['content_width'] = apply_filters( 'wpnewstart_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'wpnewstart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//регистрация сайдбаров-область виджетов в админке(внешний вид/виджеты)
function wpnewstart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Виджеты', 'wpnewstart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpnewstart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

//создание виджетов для футера
	register_sidebar( array(
		'name'          => 'Подвал слева',
		'id'            => 'footer-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

register_sidebar( array(
		'name'          => 'Подвал центр',
		'id'            => 'footer-center',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );


	register_sidebar( array(
		'name'          => 'Подвал справо',
		'id'            => 'footer-right',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) ); 
}
add_action( 'widgets_init', 'wpnewstart_widgets_init' );








//подключение стилей

// function wpnewstart_style() { 	
// 	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
// 	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css' );
// 	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
// 	wp_enqueue_style( 'colorScheme-4', get_template_directory_uri() . '/css/colorScheme-4.css' );
// 	wp_enqueue_style( 'camera', get_template_directory_uri() . '/css/camera.css' );
// 	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css' );

// }
// add_action( 'wp_enqueue_style', 'wpnewstart_style' );
/**
 * Enqueue scripts and styles.
 */

//подключение стилей
function wpnewstart_style() {	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css' );
	wp_enqueue_style( 'font', 'http://fonts.googleapis.com/css?family=Roboto:400,500,700' );
	wp_enqueue_style( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'colorScheme-4', get_template_directory_uri() . '/css/colorScheme-4.css' );
	wp_enqueue_style( 'camera', get_template_directory_uri() . '/css/camera.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css' );	
	wp_enqueue_style( 'magnific', get_template_directory_uri() . '/css/magnific-popup.css' );	
	
	
	//подкл скриптов	
	//говорит что только после  array('jquery')
	// wp_enqueue_script('jquery_js', get_template_directory_uri() . '/js/jquery.js', array(), '', true);
	// wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array('jquery_js'), '', true );

	//сцуко не работает
	// <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	// wp_enqueue_script( 'jq-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'mag', get_template_directory_uri() . '/js/mag.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery_js'), '', true );

	// wp_enqueue_script( 'device-js', get_template_directory_uri() . '/js/device.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jquery-form', get_template_directory_uri() . '/js/mailform/jquery.form.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jquery-rd-mailform', get_template_directory_uri() . '/js/mailform/jquery.rd-mailform.min.c.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq-mob-custom', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'recaptcha', 'http://www.google.com/recaptcha/api/js/recaptcha_ajax.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'maps', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq-map', get_template_directory_uri() . '/js/jquery.rd-google-map.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq-navbar', get_template_directory_uri() . '/js/jquery.rd-navbar.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery_js'), '', true );
	
	// wp_enqueue_script( 'jquery_easing_1_3', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jquery_cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq-smoothscroll', get_template_directory_uri() . '/js/jquery.simplr.smoothscroll.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jquery-rd-mailform', get_template_directory_uri() . '/js/mailform/jquery.rd-mailform.min.c.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery_js'), '', true );
	// wp_enqueue_script( 'jq-equalheights', get_template_directory_uri() . '/js/jquery.equalheights.js', array('jquery_js'), '', true );

	// wp_enqueue_script( 'jq-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'wpnewstart_style' );

//подкл скриптов
function wpnewstart_scripts() {	
	// wp_enqueue_script('jquery_js', get_template_directory_uri() . '/js/jquery.js', array('jquery'), '', true);
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true );

	wp_enqueue_script('jquery_rd_navbar', get_template_directory_uri() . '/js/jquery.rd-navbar.js', array('jquery'), '', true);
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), '', true);
	wp_enqueue_script('tmstickup', get_template_directory_uri() . '/js/tmstickup.js', array('jquery'), '', true);
	wp_enqueue_script( 'jq-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
// 
	//скрипт который подтягивае коментарии
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if(!is_admin()) {
		wp_deregister_script('jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', [], '', true );
		 wp_enqueue_script( 'jquery');
	}
}
add_action( 'wp_enqueue_scripts', 'wpnewstart_scripts' );

//фильтр and function для присвоения класса активноу ли
function artbt_filter_current_item_menu_header($classes) {
if ( in_array('current-menu-item', $classes) ) {
	$classes[] = 'active';
}
return $classes;
}
add_filter('nav_menu_css_class', ' artbt_filter_current_item_menu_header' );

/**
 * Implement the Custom Header feature.
 */
//в нашем случае не нужны подключение файлов если сразу откл появятся ошибки
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
// 
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
