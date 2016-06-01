<h1 class="admin_page_title">Foundationize - Theme Options</h1><br>
<?php settings_errors(); ?>
<br>
<form method="post" action="options.php" class="general-options-form">
    <?php settings_fields('foundationize-settings-group'); ?>
    <?php do_settings_sections('foundationize_general_options') ?>
    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>