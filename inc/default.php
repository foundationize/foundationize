<?php
/*======================================= Set default navigation menu ============================================*/
function default_nav()
{
    // If the Primary Menu doesn't exist, let's create it
    if ( ! is_nav_menu( 'Default' ) ) {

        // Create menu
        $menu_id = wp_create_nav_menu ( 'Default' );

        // Add menu items
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Home'),
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish'));

        $first_item = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('One'),
            'menu-item-url' => home_url('/one'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('1A'),
            'menu-item-url' => home_url('/1a'),
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $first_item));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('1B'),
            'menu-item-url' => home_url('/1b'),
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $first_item));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('1C'),
            'menu-item-url' => home_url('/1c'),
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $first_item));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Two'),
            'menu-item-url' => home_url('/two'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Three'),
            'menu-item-url' => home_url('/three'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Posts'),
            'menu-item-url' => home_url('/posts'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Contact'),
            'menu-item-url' => home_url('/contact'),
            'menu-item-status' => 'publish'));

        // Lower case theme_name
        $theme = strtolower ( str_replace ( ' ', '_', wp_get_theme() ) );

        // Get the theme options
        $theme_mods = get_option ( 'theme_mods_' . $theme );

        // Set the location of the primary menu
        $theme_mods['nav_menu_locations'] = array ( 'primary' => $menu_id );

        // Update the theme options
        update_option ( 'theme_mods_' . $theme, $theme_mods );

    }
}
add_action('init', 'default_nav');

/*================================================= Create default pages =========================================*/
function default_pages() {
    $default_home_page_name = 'Foundationize';
    $default_posts_page_name = 'Posts';
    if (isset($_GET['activated']) && is_admin()) {
        $page_home_title = $default_home_page_name;
        $page_one_title = 'One';
        $page_1a_title = '1A';
        $page_1b_title = '1B';
        $page_1c_title = '1C';
        $page_two_title = 'Two';
        $page_three_title = 'Three';
        $page_contact_title = 'Contact';
        $page_thanks_title = 'Thank you';
        $page_posts_title = $default_posts_page_name;
        $new_page_content = '<p>Lorem ipsum dolor sit amet, te etiam iriure voluptua has, percipit invidunt instructior ius no, nulla mollis contentiones pri ne. At altera delicata expetenda his, ius ut viris oportere. Prompta eligendi concludaturque in has. Te vitae dicam inimicus eos. Et ridens nostro est. Sed minim exerci legendos an, eum id luptatum invenire similique. Vis te posse theophrastus necessitatibus, at his quaeque vituperatoribus, vix decore labore honestatis eu. Quaestio prodesset pri id, animal fabulas laboramus in per. Ad usu detracto hendrerit vituperatoribus, vix liber graeco utamur et.</p>
        <p>Et dicit suscipiantur nec. Vero erant simul ius ei, et enim invidunt mel. Ne percipit necessitatibus nam. Mei in ceteros omittam.</p>
        <p>Maecenas nec varius nisl. Nunc varius, mauris ut suscipit sollicitudin, nulla tortor varius magna, vitae placerat metus tellus at sapien. Sed pretium massa nec interdum gravida. Ut fermentum ut felis non dapibus. Ut accumsan efficitur condimentum. Aenean ultrices odio lobortis lectus aliquam efficitur. Fusce in elit non diam volutpat venenatis vitae ut elit. Pellentesque at lacinia velit. Cras risus purus, lobortis a ante id, sollicitudin rhoncus lacus. Maecenas at turpis ac lacus elementum mollis. Quisque fermentum massa urna, pulvinar ultrices arcu eleifend vel. Curabitur eleifend ac tellus sit amet bibendum. Nulla semper felis quis felis molestie lacinia. In mauris nibh, finibus sed urna vel, dictum porta mi. Nullam ac tempus mi. Donec dapibus vel mauris at lobortis.</p>
        <p>Nullam pharetra lectus eget elit imperdiet vehicula. Mauris ac orci sit amet turpis condimentum iaculis. Fusce rhoncus massa est, eu ullamcorper lorem mollis a. Cras quis finibus dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum condimentum tincidunt nibh id suscipit. Praesent bibendum convallis hendrerit. Nunc accumsan nisl nulla, et efficitur lacus elementum eu. Nam varius maximus tortor eget laoreet. Vivamus placerat ligula ut urna luctus ultricies vel sed turpis. Curabitur pellentesque orci id sem sodales, ullamcorper bibendum mi varius. Sed non gravida orci, nec commodo velit. Fusce tempus risus nunc, tincidunt vehicula nulla dignissim venenatis.</p>';
        $page_contact_content = '<p>Lorem ipsum dolor sit amet, te etiam iriure voluptua has, percipit invidunt instructior ius no, nulla mollis contentiones pri ne. At altera delicata expetenda his, ius ut viris oportere. Prompta eligendi concludaturque in has. Te vitae dicam inimicus eos. Et ridens nostro est. Sed minim exerci legendos an, eum id luptatum invenire similique. Vis te posse theophrastus necessitatibus, at his quaeque vituperatoribus, vix decore labore honestatis eu. Quaestio prodesset pri id, animal fabulas laboramus in per. Ad usu detracto hendrerit vituperatoribus, vix liber graeco utamur et.</p>
        <p>Et dicit suscipiantur nec. Vero erant simul ius ei, et enim invidunt mel. Ne percipit necessitatibus nam. Mei in ceteros omittam.</p>[my_contact_form]';
        $page_home_content = '[div class=\'callout secondary\']

Welcome to the Foundationize WordPress Starter theme featuring <a href="http://foundation.zurb.com/" target="_blank">Foundation 6</a>.

For more info on configurations, please see the <a href="http://foundationize.com/wordpress" target="_blank">Foundationize WordPress theme homepage</a>.



[/div]

[div class=\'callout large\']

Once you\'ve exhausted the fun in this document, you should check out:

[row]

[column class=\'large-4 medium-4 column\']

<a href="http://foundation.zurb.com/sites/docs/" target="_blank">Foundation Documentation</a>

Everything you need to know about using the framework.

[/column]

[column class=\'large-4 medium-4 column\']

<a href="http://zurb.com/university/code-skills" target="_blank">Foundation Code Skills</a>

These online courses offer you a chance to better understand how Foundation works and how you can master it to create awesome projects.

[/column]

[column class=\'large-4 medium-4 column\']

<a href="http://foundation.zurb.com/forum" target="_blank">Foundation Forum</a>

Join the Foundation community to ask a question or show off your knowlege.

[/column]

[/row]

[row]

[column class=\'large-4 medium-4  medium-push-2 column\']

<a href="http://github.com/zurb/foundation" target="_blank">Foundation on Github</a>

Latest code, issue reports, feature requests and more.

[/column]

[column class=\'large-4 medium-4  medium-pull-2 column\']

<a href="https://twitter.com/ZURBfoundation" target="_blank">@zurbfoundation</a>

Ping us on Twitter if you have questions. When you build something with this we\'d love to see it (and send you a totally boss sticker).

[/column]

[/row]

[/div]

[row]

[column class=\'column large-8 medium-8\']
<h5>Here\'s your basic grid:</h5>
[row2]

[column2 class=\'large-12 column\']

[div class=\'callout\']

<strong>This is a twelve column section in a row.</strong> Each of these includes a div.callout element so you can see where the columns are - it\'s not required at all for the grid.

[/div]

[/column2]

[/row2]

[row2]

[column2 class=\'large-6 medium-6 column\']

[div class=\'callout\']

Six columns

[/div]

[/column2]

[column2 class=\'large-6 medium-6 column\']

[div class=\'callout\']

Six columns

[/div]

[/column2]

[/row2]

[row2]

[column2 class=\'large-4 medium-4 small-4 column\']

[div class=\'callout\']

Four columns

[/div]

[/column2]

[column2 class=\'large-4 medium-4 small-4 column\']

[div class=\'callout\']

Four columns

[/div]

[/column2]

[column2 class=\'large-4 medium-4 small-4 column\']

[div class=\'callout\']

Four columns

[/div]

[/column2]

[/row2]

[example_form]

[/column]

[column class=\'column large-4 medium-4\']
<h5>Try one of these buttons:</h5>
[button href=\'#\' class=\'small\']Simple button[/button]

[button href=\'#\' class=\'medium success\']Success button[/button]

[button href=\'#\' class=\'medium alert\']Alert button[/button]

[button href=\'#\' class=\'medium secondary\']Secondary button[/button]

[div class=\'callout\']
<h5>So many components, girl!</h5>
A whole kitchen sink of goodies comes with Foundation. Check out the docs to see them all, along with details on making them your own.

[button href=\'http://foundation.zurb.com/docs/\' class=\'small\']Go to Foundation Docs[/button]

[/div]

[/column]

[/row]';
        $page_thanks_content = 'Thanks for contacting us!';
        $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
        //don't change the code bellow, unless you know what you're doing
        $page_home_check = get_page_by_title($page_home_title);
        $page_one_check = get_page_by_title($page_one_title);
        $page_1a_check = get_page_by_title($page_1a_title);
        $page_1b_check = get_page_by_title($page_1b_title);
        $page_1c_check = get_page_by_title($page_1c_title);
        $page_two_check = get_page_by_title($page_two_title);
        $page_three_check = get_page_by_title($page_three_title);
        $page_contact_check = get_page_by_title($page_contact_title);
        $page_thanks_check = get_page_by_title($page_thanks_title);
        $page_posts_check = get_page_by_title($page_posts_title);
        $page_home = array(
            'post_type' => 'page',
            'post_title' => $page_home_title,
            'post_content' => $page_home_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_posts = array(
            'post_type' => 'page',
            'post_title' => $page_posts_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_one = array(
            'post_type' => 'page',
            'post_title' => $page_one_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_1a = array(
            'post_type' => 'page',
            'post_title' => $page_1a_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_1b = array(
            'post_type' => 'page',
            'post_title' => $page_1b_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_1c = array(
            'post_type' => 'page',
            'post_title' => $page_1c_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_two = array(
            'post_type' => 'page',
            'post_title' => $page_two_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_three = array(
            'post_type' => 'page',
            'post_title' => $page_three_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_contact = array(
            'post_type' => 'page',
            'post_title' => $page_contact_title,
            'post_content' => $page_contact_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $page_thanks = array(
            'post_type' => 'page',
            'post_title' => $page_thanks_title,
            'post_content' => $page_thanks_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        if (!isset($page_home_check->ID)) {
            $new_page_id = wp_insert_post($page_home);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
            /*======================================= Set default front page =========================================*/
            $homepage = get_page_by_title( $default_home_page_name );
            if ( $homepage )
            {
                update_option( 'page_on_front', $homepage->ID );
                update_option( 'show_on_front', 'page' );
            }
        }
        if (!isset($page_posts_check->ID)) {
            $new_page_id = wp_insert_post($page_posts);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
            /*======================================= Set default front page =========================================*/
            $my_posts_page = get_page_by_title( $default_posts_page_name );
            if ( $my_posts_page )
            {
                $blog   = get_page_by_title( $default_posts_page_name );
                update_option( 'page_for_posts', $blog->ID );
            }
        }
        if (!isset($page_one_check->ID)) {
            $new_page_id = wp_insert_post($page_one);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_1a_check->ID)) {
            $new_page_id = wp_insert_post($page_1a);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_1b_check->ID)) {
            $new_page_id = wp_insert_post($page_1b);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_1c_check->ID)) {
            $new_page_id = wp_insert_post($page_1c);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_two_check->ID)) {
            $new_page_id = wp_insert_post($page_two);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_three_check->ID)) {
            $new_page_id = wp_insert_post($page_three);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_contact_check->ID)) {
            $new_page_id = wp_insert_post($page_contact);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        if (!isset($page_thanks_check->ID)) {
            $new_page_id = wp_insert_post($page_thanks);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
    }
}
add_action('init', 'default_pages');


class foundationize_footer_area_widget extends WP_Widget {

    // widget constructor
    public function __construct(){
        parent::__construct(
            'foundationize_footer_area_widget_name',
            __( 'Foundationize Footer Area Widget'),
            array(
                'classname'   => 'foundationize_footer_area_widget_classname',
                'description' => __( 'This is a widget that allows inserting text/html sections into the footer.' )
            )
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters( 'widget_title', $instance['title'] );

        $before_widget = $args['before_widget'];
        $before_title = $args['before_title'];
        $after_title = $args['after_title'];
        $after_widget = $args['after_widget'];

        $widget_content = isset( $instance['widget_content'] ) ? $instance['widget_content'] : '';

        echo $before_widget;
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        echo $widget_content;
        echo $after_widget;
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $widget_content = isset( $instance['widget_content'] ) ? esc_attr( $instance['widget_content'] ) : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('widget_content'); ?>"><?php _e('Content:'); ?></label>
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('widget_content'); ?>"
                      name="<?php echo $this->get_field_name('widget_content'); ?>"><?php echo $widget_content; ?></textarea>
        </p>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['widget_content'] = $new_instance['widget_content'];
        return $instance;
    }
}

function foundationize_default_widgets()
{
    // Register our own widget.
    register_widget( 'foundationize_footer_area_widget' );

    // We don't want to undo user changes, so we look for changes first.
    $active_widgets = get_option( 'sidebars_widgets' );

    if ( ! empty ( $active_widgets[ 'my-sidebar-footer' ] )) {
        // Okay, no fun anymore. There is already some content.
        return;
    }

    // The sidebars are empty, let's put something into them.

    // Note that widgets are numbered. We need a counter:
    $counter = 1;

    // Add a 'demo' widget
    $active_widgets[ 'my-sidebar-footer' ][0] = 'foundationize_footer_area_widget_name-' . $counter;
    // … and write some text into it:
    $demo_widget_content[ $counter ] = array ( 'title' => "Footer Nav 1", 'widget_content' => "
    <ul>
    <li><a href='#'>Nav link 1</a></li>
    <li><a href='#'>Nav link 2</a></li>
    <li><a href='#'>Nav link 3</a></li>
    </ul>
    " );
    update_option( 'widget_foundationize_footer_area_widget_name', $demo_widget_content );

    $counter++;

    // Okay, now to our second sidebar. We make it short.
    $active_widgets[ 'my-sidebar-footer' ][] = 'foundationize_footer_area_widget_name-' . $counter;
    $demo_widget_content[ $counter ] = array ( 'title' => "Footer Nav 2", 'widget_content' => '
    <ul>
    <li><a href=\'#\'>Nav link 1</a></li>
    <li><a href=\'#\'>Nav link 2</a></li>
    <li><a href=\'#\'>Nav link 3</a></li>
    </ul>
    ' );
    update_option( 'widget_foundationize_footer_area_widget_name', $demo_widget_content );

    $counter++;

    // Okay, now to our second sidebar. We make it short.
    $active_widgets[ 'my-sidebar-footer' ][] = 'foundationize_footer_area_widget_name-' . $counter;
    $demo_widget_content[ $counter ] = array ( 'title' => "Footer Nav 3", 'widget_content' => '
    <ul>
    <li><a href=\'#\'>Nav link 1</a></li>
    <li><a href=\'#\'>Nav link 2</a></li>
    <li><a href=\'#\'>Nav link 3</a></li>
    </ul>
    ' );
    update_option( 'widget_foundationize_footer_area_widget_name', $demo_widget_content );

    $counter++;

    // Okay, now to our second sidebar. We make it short.
    $active_widgets[ 'my-sidebar-footer' ][] = 'foundationize_footer_area_widget_name-' . $counter;
    $demo_widget_content[ $counter ] = array ( 'title' => "Footer Nav 4", 'widget_content' => '
    <ul>
    <li><a href=\'#\'>Nav link 1</a></li>
    <li><a href=\'#\'>Nav link 2</a></li>
    <li><a href=\'#\'>Nav link 3</a></li>
    </ul>
    ' );
    update_option( 'widget_foundationize_footer_area_widget_name', $demo_widget_content );

    // Now save the $active_widgets array.
    update_option( 'sidebars_widgets', $active_widgets );
}

add_action( 'widgets_init', 'foundationize_default_widgets' );

/*=================== Deactivate default widgets =================================*/
function acme_remove_default_widgets() {
    if ( ! get_option( 'acme_cleared_widgets' ) ) {
        update_option( 'sidebars_widgets', array() );
        update_option( 'acme_cleared_widgets', true );
    }
}
add_action( 'after_setup_theme', 'acme_remove_default_widgets' );
