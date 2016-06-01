<div class="row">
    <div class="column small-12">
        <hr>
        <nav>
            <ul class="pager" style="list-style: none; margin-left: 0">
                <?php
                $my_array = array(

                );
                $next_post = get_next_post();
                if (!empty($next_post)) {
                    if (isset(get_adjacent_post(false, $my_array, false)->ID)) {
                        $adjacent_post_id = get_adjacent_post(false, $my_array, false)->ID;
                        $next_post_url = get_permalink($adjacent_post_id);
                        ?>
                        <li class="pull-left"><a class="small button" href="<?php echo $next_post_url ?>">« Previous</a></li>
                        <?php
                    }
                }
                ?>
                <?php
                $previous_post = get_previous_post();
                if (!empty($previous_post)) {
                    if (isset(get_adjacent_post(false, $my_array, true)->ID)) {
                        $previous_post_url = get_permalink(get_adjacent_post(false, $my_array, true)->ID);
                        ?>
                        <li class="pull-right"><a class="small button" href="<?php echo $previous_post_url ?>">Next »</a></li>
                        <?php
                    }
                }
                ?>

            </ul>
        </nav>
    </div>
</div>