<?php
/*========================================== My custom search results options ========================================*/
function search_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_search) {
            $query->set('posts_per_page', '8');
        } else {
            $query->set('posts_per_archive_page', '8');
        }
    }
}
add_action('pre_get_posts','search_filter');

/*=========================================== My custom pagination ===================================================*/
function my_wp_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
        'prev_text' => '« Previous',
        'next_text' => 'Next »'
    ) );

    if( is_array($page_format) ) {
        echo '<nav><ul class="pagination">';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></nav>';
    }
}

/*=========================================== My phpmailer settings ==================================================*/

function my_phpmailer_settings( $phpmailer ) {
    $mail_host = get_option('mail_host');
    $mail_username = get_option('mail_username');
    $mail_pass = get_option('mail_pass');
    $mail_smtp_secure = get_option('mail_smtp_secure');
    $mail_port = get_option('mail_port');
    $mail_from_name = get_option('mail_from_name');

    $phpmailer->isSMTP();
    $phpmailer->Host = $mail_host;
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = $mail_port;
    $phpmailer->Username = $mail_username;
    $phpmailer->Password = $mail_pass;

    // Additional settings…
    $phpmailer->SMTPSecure = $mail_smtp_secure; // Choose SSL or TLS, if necessary for your server
    $phpmailer->FromName = !empty($mail_from_name) ? $mail_from_name : 'Website form';


}add_action( 'phpmailer_init', 'my_phpmailer_settings' );

/*========================= Allow html content for the wp_mail function. =============================================*/
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {
    return 'text/html';
}
