<a href="<?php echo get_permalink(); ?>" style="display:inline-block;"><h4><?php the_title(); ?></h4></a>
<br>
<?php
if(empty(get_the_excerpt())) {
    echo 'No excerpt. This is a page with a complex Foundation styling or with empty content.';
} else {
    echo get_the_excerpt();
}
?>
<br><br>
