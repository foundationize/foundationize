<footer class="my_footer">
    <div class="row">
        <?php include get_template_directory() . '/template-parts/footer_widget_area.php' ?>
    </div>
    <hr>
    <div class="row pt_30">
        <div class="column small-12 text-center">
            <?php
            $default = get_option('footer_fb_default');
            if ($default == 1) {
                ?>
                <div class="social_icons_wrapper">
                    <ul>
                        <!--
                        I skipped the closing tag in purpose.
                        This tactic removes unwanted space between li elements.
                         -->
                        <li>
                            <a target="_blank" href="https://facebook.com/">
                                <i class="fa fa-facebook-square fa-2x"></i>
                            </a>

                        <li>
                            <a target="_blank" href="https://twitter.com/">
                                <i class="fa fa-twitter-square fa-2x"></i>
                            </a>

                        <li>
                            <a target="_blank" href="https://plus.google.com/">
                                <i class="fa fa-google-plus-square fa-2x"></i>
                            </a>

                        <li>
                            <a target="_blank" href="http://linkedin.com">
                                <i class="fa fa-linkedin-square fa-2x"></i>
                            </a>
                    </ul>
                </div>
                <?php
            } else {
                echo '<div class="social_icons_wrapper"><ul>';
                $options = get_option('footer_social_buttons');
                $links = get_option('footer_social_links');
                $fb_link = @$links['Facebook'];
                $tw_link = @$links['Twitter'];
                $gp_link = @$links['GooglePlus'];
                $li_link = @$links['LinkedIn'];
                $pi_link = @$links['Pinterest'];
                if (@$options['Facebook'] == 1) {
                    echo '<li><a target="_blank" href="'. $fb_link .'"><i class="fa fa-facebook-square fa-2x">
                            </i></a>';
                }
                if (@$options['Twitter'] == 1) {
                    echo '<li><a target="_blank" href="'. $tw_link .'"><i class="fa fa-twitter-square fa-2x"></i>
                        </a>';
                }
                if (@$options['GooglePlus'] == 1) {
                    echo '<li><a target="_blank" href="'. $gp_link .'">
                            <i class="fa fa-google-plus-square fa-2x"></i></a>';
                }
                if (@$options['LinkedIn'] == 1) {
                    echo '<li><a target="_blank" href="'. $li_link .'"><i class="fa fa-linkedin-square fa-2x"></i>
                        </a>';
                }
                if (@$options['Pinterest'] == 1) {
                    echo '<li><a target="_blank" href="'. $pi_link .'"><i class="fa fa-pinterest-square fa-2x">
                            </i></a>';
                }
                echo '</ul></div>';
            }
            ?>
            <div class="row">
                <div class="columns large-12">
                    <p>&copy; <?php echo date('Y'); ?> - <a href="<?php echo get_home_url(); ?>">
                            <?php echo get_bloginfo('name'); ?></a></p>
                </div>
            </div>
        </div>
        <div class="column small-12 bottom_small_text_wrapper">
            <a href="http://foundationize.com" class="bottom_small_text">
                Foundationized with <i class="fa fa-heart" aria-hidden="true"> </i>
            </a>
        </div>
    </div>
</footer>
</div><!-- div -->
</div><!-- off-canvas-content -->
</div><!-- off-canvas-wrapper-inner -->
</div><!-- off-canvas-wrapper -->
<?php wp_footer(); ?>
<script>
    jQuery(document).foundation();
</script>
</body>
</html>