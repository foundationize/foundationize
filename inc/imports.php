<?php

function load_styles()
{
    wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300', array(), '1.0.0', 'all');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all');
    wp_enqueue_style('foundationcss', get_template_directory_uri() . '/bower_components/foundation-sites/dist/foundation.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('jssocials_css', get_template_directory_uri() . '/bower_components/jssocials/styles/jssocials.css', array(), '1.0.0', 'all');
    wp_enqueue_style('jssocials_flat_style', get_template_directory_uri() . '/bower_components/jssocials/styles/jssocials-theme-flat.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'load_styles');

function load_scripts()
{
    wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
    wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/components/smooth-scroll/smooth-scroll.js', array(), '1.0.0', true);
    wp_enqueue_script('foundationjs', get_template_directory_uri() . '/bower_components/foundation-sites/dist/foundation.min.js', array(), '1.0.0', true);
    wp_enqueue_script('jscocials_js', get_template_directory_uri() . '/bower_components/jssocials/dist/jssocials.min.js', array(), '1.0.0', true);
    wp_enqueue_script('theme_defaults_js', get_template_directory_uri() . '/js/theme_defaults.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'load_scripts');

function load_admin_styles_and_scripts($hook) {
    wp_register_style('chryssalis_admin_style', get_template_directory_uri() . '/css/admin.css',
        array(), '1.0.0', 'all');
    wp_enqueue_style('chryssalis_admin_style');
}
add_action('admin_enqueue_scripts', 'load_admin_styles_and_scripts');

function load_favicons()
{ ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/img/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="foundationize">
    <meta name="application-name" content="foundationize">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri() ?>/img/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri() ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
<?php }

add_action('wp_head', 'load_favicons');