<?php

function foundationize_add_admin_page()
{
    add_menu_page('Foundationize Theme Options', 'Foundationize', 'manage_options', 'foundationize_general_options',
        'foundationize_create_general_options_page', 'dashicons-palmtree', 110);
    add_submenu_page('foundationize_general_options', 'Foundationize General Options', 'General', 'manage_options',
        'foundationize_general_options', 'foundationize_create_general_options_page');

    add_action('admin_init', 'foundationize_custom_settings');
}

add_action('admin_menu', 'foundationize_add_admin_page');

function foundationize_custom_settings()
{
    register_setting('foundationize-settings-group', 'social_buttons');
    register_setting('foundationize-settings-group', 'top_search_bar');
    register_setting('foundationize-settings-group', 'footer_social_buttons');
    register_setting('foundationize-settings-group', 'footer_social_links');
    /* Contact settings */
    register_setting('foundationize-settings-group', 'mail_host');
    register_setting('foundationize-settings-group', 'mail_username');
    register_setting('foundationize-settings-group', 'mail_pass');
    register_setting('foundationize-settings-group', 'mail_smtp_secure');
    register_setting('foundationize-settings-group', 'mail_port');
    register_setting('foundationize-settings-group', 'mail_subject');
    register_setting('foundationize-settings-group', 'mail_from_name');
    register_setting('foundationize-settings-group', 'mail_from_mail');
    register_setting('foundationize-settings-group', 'mail_receiver_mail');
    register_setting('foundationize-settings-group', 'mail_receiver_name');
    register_setting('foundationize-settings-group', 'mail_redirect');

    add_settings_section('foundationize-header-section-id', 'Header', 'foundationize_header_options_callback',
        'foundationize_general_options');
    add_settings_section('foundationize-footer-section-id', 'Footer', 'foundationize_footer_options_callback',
        'foundationize_general_options');
    add_settings_section('foundationize-contact-section-id', 'Contact form', 'foundationize_contact_options_callback',
        'foundationize_general_options');

    add_settings_field('social-buttons', 'Social buttons', 'social_buttons_callback', 'foundationize_general_options',
        'foundationize-header-section-id');
    add_settings_field('top-search-bar', 'Search Bar', 'top_search_bar_callback', 'foundationize_general_options',
        'foundationize-header-section-id');
    add_settings_field('footer-social-buttons-id', 'Social buttons', 'footer_social_buttons_callback',
        'foundationize_general_options', 'foundationize-footer-section-id');
    add_settings_field('footer-social-links-id', 'Links for social buttons', 'footer_social_links_callback',
        'foundationize_general_options', 'foundationize-footer-section-id');
    add_settings_field('mail-provider-settings-id', 'Email provider settings', 'mail_provider_settings_callback',
        'foundationize_general_options', 'foundationize-contact-section-id');
    add_settings_field('mail-details-settings-id', 'Email details', 'mail_details_settings_callback',
        'foundationize_general_options', 'foundationize-contact-section-id');
}

function foundationize_header_options_callback()
{
    echo 'Customize your Header section';
}

function foundationize_footer_options_callback()
{
    echo 'Customize your Footer section';
}

function foundationize_contact_options_callback() {
    echo 'Customize your contact forms options';
}

function social_buttons_callback()
{
    $options = get_option('social_buttons');
    $buttons = array('Twitter', 'Facebook', 'GooglePlus', 'LinkedIn', 'Pinterest');
    $output = '';

    foreach ($buttons as $button) {
        /* With the '@' we are checking if the variable exists. */
        $checked = (@$options[$button] == 1 ? 'checked' : '');
        if (get_option('twitter_default') == 1 && $checked == 'checked') {
            update_option('twitter_default', 0);
            update_option('fb_default', 0);
            update_option('gp_default', 0);
        }
        if (get_option('fb_default') == 1 && $checked == 'checked') {
            update_option('twitter_default', 0);
            update_option('fb_default', 0);
            update_option('gp_default', 0);
        }
        if (get_option('gp_default') == 1 && $checked == 'checked') {
            update_option('twitter_default', 0);
            update_option('fb_default', 0);
            update_option('gp_default', 0);
        }
        $output .= '
            <label><input type="checkbox" id="' . $button . '" name="social_buttons[' . $button . ']" value="1" ' . $checked . '/>' . $button . '</label><br>
            ';
    }
    echo $output;
}

function footer_social_buttons_callback() {
    $options = get_option('footer_social_buttons');
    $buttons = array('Facebook', 'Twitter', 'GooglePlus', 'LinkedIn', 'Pinterest');
    $output = '';

    foreach ($buttons as $button) {
        /* With the '@' we are checking if the variable exists. */
        $checked = (@$options[$button] == 1 ? 'checked' : '');
        if (get_option('footer_fb_default') == 1 && $checked == 'checked') {
            update_option('footer_fb_default', 0);
            update_option('footer_twitter_default', 0);
            update_option('footer_gp_default', 0);
            update_option('footer_li_default', 0);
        }
        if (get_option('footer_twitter_default') == 1 && $checked == 'checked') {
            update_option('footer_fb_default', 0);
            update_option('footer_twitter_default', 0);
            update_option('footer_gp_default', 0);
            update_option('footer_li_default', 0);
        }
        if (get_option('footer_gp_default') == 1 && $checked == 'checked') {
            update_option('footer_fb_default', 0);
            update_option('footer_twitter_default', 0);
            update_option('footer_gp_default', 0);
            update_option('footer_li_default', 0);
        }
        if (get_option('footer_li_default') == 1 && $checked == 'checked') {
            update_option('footer_fb_default', 0);
            update_option('footer_twitter_default', 0);
            update_option('footer_gp_default', 0);
            update_option('footer_li_default', 0);
        }
        $output .= '
            <label><input type="checkbox" id="' . $button . '" name="footer_social_buttons[' . $button . ']" value="1" ' . $checked . '/>' . $button . '</label><br>
            ';
    }
    echo $output;
}

function footer_social_links_callback() {
    $options = get_option('footer_social_links');
    $links = array('Facebook', 'Twitter', 'GooglePlus', 'LinkedIn', 'Pinterest');
    $output = '';

    foreach ($links as $link) {
        $output .= '
            <label for="'. $link .'-link">' . $link . '</label><br><textarea id="'. $link .'-link" 
            name="footer_social_links['. $link .']" rows="" cols="30">'. @$options[$link] .'</textarea><br>
            ';
    }

    echo $output;
}

function top_search_bar_callback() {
    $show_top_search_bar = get_option('top_search_bar');
    if ($show_top_search_bar == 1) {
        $checked = 'checked';
    } else {
        $checked = '';
    }
    echo '
            <label><input type="checkbox" id="top_search_bar" name="top_search_bar" value="1" ' . $checked . '/>Header search bar</label><br>
            ';
}

function mail_provider_settings_callback() {
    $mail_host = get_option('mail_host');
    $mail_username = get_option('mail_username');
    $mail_pass = get_option('mail_pass');
    $mail_smtp_secure = get_option('mail_smtp_secure');
    $mail_port = get_option('mail_port');

    echo '
        <label for="mail_host-id">Host</label><br>
        <input type="text" placeholder="Host" size="30" name="mail_host" value="' .$mail_host. '" id="mail_host-id" /><br>
        <label for="mail_username-id">Username</label><br>
        <input type="text" placeholder="Username" size="30" name="mail_username" value="' .$mail_username. '" id="mail_username-id" /><br>
        <label for="mail_pass-id">Password</label><br>
        <input type="password" placeholder="Password" size="30" name="mail_pass" value="' .$mail_pass. '" id="mail_pass-id" /><br>
        <label for="mail_smtp_secure-id">SMTP (ssl/tls)</label><br>
        <input type="text" size="30" placeholder="True/False" name="mail_smtp_secure" value="' .$mail_smtp_secure. '" id="mail_smtp_secure-id" /><br>
        <label for="mail_port-id">Port</label><br>
        <input type="text" size="30" placeholder="Port" name="mail_port" value="' .$mail_port. '" id="mail_port-id" /><br>
    ';
}

function mail_details_settings_callback() {
    $mail_subject = get_option('mail_subject');
    $mail_from_name = get_option('mail_from_name');
    $mail_receiver_mail = get_option('mail_receiver_mail');
    $mail_redirect = get_option('mail_redirect');

    echo '
        <label for="mail_subject-id">Email Subject</label><br>
        <input type="text" placeholder="Subject" size="30" name="mail_subject" value="' .$mail_subject. '" id="mail_subject-id" /><br>
        <label for="mail_from_name-id">From (name)</label><br>
        <input type="text" placeholder="Name" size="30" name="mail_from_name" value="' .$mail_from_name. '" id="mail_from_name-id" /><br>
        <label for="mail_receiver_mail-id">Receiver email</label><br>
        <input type="text" size="30" placeholder="Email" name="mail_receiver_mail" value="' .$mail_receiver_mail. '" id="mail_receiver_mail-id" /><br>
        <label for="mail_redirect-id">Thank you page (url)</label><br>
        <input type="text" size="30" placeholder="Url" name="mail_redirect" value="' .$mail_redirect. '" id="mail_redirect-id" /><br>
    ';
}

function foundationize_create_general_options_page()
{
    require_once(get_template_directory() . '/inc/templates/general-options.php');
}

/*============================================ Generate default values ===============================================*/
function generate_default_values()
{
    /*=========== Social buttons ===========*/
    $buttons = array('twitter_default', 'fb_default', 'gp_default');
    foreach ($buttons as $button) {
        add_option( $button , 1 );
    }

    /*=========== Footer social buttons ===========*/
    $footer_buttons = array( 'footer_fb_default', 'footer_twitter_default', 'footer_gp_default', 'footer_li_default');
    foreach ($footer_buttons as $button) {
        add_option( $button , 1 );
    }

    /*============ Top search bar ===========*/
    add_option('top_search_bar', 1);
}

add_action('after_setup_theme', 'generate_default_values');