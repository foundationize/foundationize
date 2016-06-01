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
                <?php
                if (have_posts()) {
                    while (have_posts()): the_post(); ?>
                        <?php get_template_part('template-parts/content', 'page'); ?>
                    <?php endwhile; ?>
                <?php } ?>
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