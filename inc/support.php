<?php

function foundationize_theme_support_setup () {
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    /*
     * Convert my form from html4 to html5
     * */
    add_theme_support('html5', array('search-form'));

    /*
     * Register a menu programmatically so that i can use different menus for different sections.
     * */
    register_nav_menu('primary', 'My primary navigation');
    register_nav_menu('secondary', 'My footer navigation');

    $options = get_option('post_formats');
    if (!empty($options)) {
        $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
        $output = array();
        foreach ($formats as $format) {
            $output[] = (@$options[$format] == 1 ? $format : '');
        }
        add_theme_support('post-formats', $output);
    }

    $header = get_option('custom_header');
    if (@$header == 1) {
        add_theme_support('custom-header');
    }

    $background = get_option('custom_background');
    if (@$background == 1) {
        add_theme_support('custom-background');
    }
}
add_action('init', 'foundationize_theme_support_setup');

/*
 * ------------------------------------------- Filter the except length to 20 characters.
 */

/*============================ My custom trimming function ========================*/
function foundationize_text_trimming ($text, $length) {
    $string = substr($text, 0, $length);
    $string_trimmed = substr($string, 0, strrpos($string, ' ')) . " ...";
    echo $string_trimmed;
}
/*
 * ------------------------------------------- Widgets - Sidebars ------------------------------------------------------
 *
 * For the 'class' argument i only inserted the name 'custom' because wp automatically adds the word 'sidebar' before.
 * For this example the class will be 'sidebar-custom'.
 * */
function foundationize_widget_setup () {
    register_sidebar (
        array(
            'name' => 'Footer Area',
            'id' => 'my-sidebar-footer',
            'class' => 'custom',
            'description' => 'Standard Widget Area',
            'before_widget' => '<div class="small-12 medium-3 column text-center footer_section">
                <aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside></div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar (
        array(
            'name' => 'Right Sidebar',
            'id' => 'sidebar-main',
            'class' => 'custom',
            'description' => 'Standard Widget Area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s sidebar_widget">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init', 'foundationize_widget_setup');
