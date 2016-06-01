<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group" style="margin-bottom: 0">
        <input type="text" class="input-group-field" placeholder="Search" name="s" id="srch-term" value="<?php echo get_search_query(); ?>">
        <div class="input-group-button">
            <button class="button" type="submit">Search</button>
        </div>
    </div>
</form>