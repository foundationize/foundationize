<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php
        bloginfo('name');
        wp_title('-');
        ?></title>
    <meta name="description" content="<?php
    if (is_front_page()) {
        bloginfo('description');
    } else if (is_single()) {
        single_post_title('', true);
        echo ' - ';
        bloginfo('description');
    } else if (is_archive()) {
        single_cat_title('', true);
        echo ' - ';
        bloginfo('description');
    } else {
        the_title();
        echo ' - ';
        bloginfo('description');
    }
    ?>">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <?php if (is_singular() && pings_open(get_queried_object())) { ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php } ?>
</head>
<body>
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!--=========================== Off canvas sidebar ===========================-->
        <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
            <!-- Menu -->
            <?php
            $home_link = get_home_url();
            wp_nav_menu(array(
                    'menu' => 'primary',
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => '',
                    'items_wrap' => '<ul id="%1$s" class="vertical menu" data-drilldown>%3$s</ul>',
                    'fallback_cb' => 'wp_navwalker::fallback',
                    'walker' => new wp_navwalker())
            );
            ?>
        </div>
        <!--=========================== Off canvas content ===========================-->
        <div class="off-canvas-content" data-off-canvas-content>
            <div class="top-bar show-for-large">
                <div class="row">
                    <div class="top-bar-left">
                        <?php
                        $home_link = get_home_url();
                        $blog_name = get_bloginfo('name');
                        wp_nav_menu(array(
                                'menu' => 'primary',
                                'theme_location' => 'primary',
                                'depth' => 2,
                                'container' => 'div',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => '',
                                'items_wrap' => '<ul id="%1$s" class="dropdown menu" data-dropdown-menu><li class="menu-text">
                                    <a href="" class="top_bar_logo_link">'.$blog_name.'</a></li>%3$s</ul>',
                                'fallback_cb' => 'wp_navwalker::fallback',
                                'walker' => new wp_navwalker())
                        );
                        ?>
                    </div>
                    <!--========================================= JsSocials initialization ==========================================-->
                    <?php
                    $twitter_default = get_option('twitter_default');
                    $buttons_to_show = array();
                    if ($twitter_default == 1) {
                        $buttons_to_show = array("twitter", "googleplus", "facebook");
                    } else {
                        $options = get_option('social_buttons');
                        $buttons = array('Twitter', 'Facebook', 'GooglePlus', 'LinkedIn', 'Pinterest');
                        $output = '';
                        foreach ($buttons as $button) {
                            $checked = (@$options[$button] == 1 ? 'checked' : '');
                            if ($checked == 'checked') {
                                array_push($buttons_to_show, strtolower($button));
                            }
                        }
                    }
                    $result = null;
                    foreach ($buttons_to_show as $button) {
                        $result .= '"' . $button . '",';
                    }
                    ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $("#share").jsSocials({
                                shares: [<?php echo $result; ?>]
                            });
                        });
                    </script>
                    <div class="top-bar-right">
                        <ul class="menu">
                            <li>
                                <div id="share">
                            </li>
                            <?php
                            $show_top_search_bar = get_option('top_search_bar');
                            if ($show_top_search_bar == 1) {
                                ?>
                                <li>&nbsp;&nbsp;</li>
                                <li>
                                    <?php get_search_form(); ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="title-bar hide-for-large">
                <div class="title-bar-left">
                    <button class="menu-icon" type="button" data-open="offCanvas"></button>
                    <a href="<?php echo get_home_url(); ?>">
                        <span class="title-bar-title">
                            <?php
                            echo get_bloginfo('name');
                            ?>
                        </span>
                    </a>
                </div>
            </div>
            <div class="mt_3per">
                    <!-- Look on the footer for the closing divs -->