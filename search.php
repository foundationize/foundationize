<?php
get_header(); ?>
    <div class="row pb_3per">
        <!-- Check if the main sidebar is empty. -->
        <?php
        $main_sidebar_active = null;
        if ( is_active_sidebar( 'sidebar-main' ) ) {
            $main_sidebar_active = true;
        }
        ?>
        <div class="small-12 <?php if ($main_sidebar_active) { echo 'medium-9'; } ?> columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php if (have_posts()) { ?>
                        <h3>
                            <?php printf(__('Search results for: %s', 'foundationize'),
                                '<small>'
                                . esc_html(get_search_query()) .
                                '</small>'); ?>
                        </h3>

                        <?php
                        while (have_posts()): the_post(); ?>
                            <?php get_template_part('template-parts/content', 'search-result'); ?>
                        <?php endwhile;
                        my_wp_pagination();
                        ?>
                    <?php
                    } else {
                        ?>
                        <h3>
                            <?php printf(__('Search results for: %s', 'foundationize'),
                                '<small>'
                                . esc_html(get_search_query()) .
                                '</small>'); ?>
                        </h3>
                        <div style="margin-bottom: 200px;">
                            <p>
                                Sorry, no results found. Search for something else or navigate to another page.
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                </main>
            </div>
        </div>

        <?php
        if ($main_sidebar_active) {
            ?>
            <div class="small-12 medium-3 column my_main_sidebar">
                <?php include get_template_directory() . '/template-parts/main-sidebar.php' ?>
            </div>
            <?php
        }
        ?>

    </div>
<?php get_footer(); ?>