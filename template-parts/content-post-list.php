<div class="row">
    <div class="column small-12">
        <br>
        <a href="<?php echo get_permalink(); ?>" style="display:inline-block;"><h4><?php the_title(); ?></h4></a>
        <br>
        <?php
        if (has_post_thumbnail()){
            ?>
            <a href="<?php echo get_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>" class="thumbnail_for_post_list">
            </a>
            <?php
        }
        ?>
        <?php
        if(empty(get_the_excerpt())) {
            echo 'No excerpt. This is a page with a complex Foundation styling or with empty content.';
        } else {
            echo get_the_excerpt();
        }
        ?>
    </div>
</div>


