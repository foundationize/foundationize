<h1><?php the_title(); ?></h1>
<?php
if (has_post_thumbnail()){
    ?>
    <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" class="thumbnail_img_for_posts_single_page">
    <?php
}
?>
<?php the_content(); ?>
<!-- ====================================- Next/Previous post ===================================================- -->
<?php include get_template_directory(). '/template-parts/next_previous_template.php' ?>