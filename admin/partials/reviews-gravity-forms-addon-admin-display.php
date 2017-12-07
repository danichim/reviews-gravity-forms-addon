<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/schiriacrobert/
 * @since      1.0.0
 *
 * @package    Reviews_Gravity_Forms_Addon
 * @subpackage Reviews_Gravity_Forms_Addon/admin/partials
 */
?>

<h1>
    Review Gravity Settings
</h1>

<php settings_errors(); ?>

<form method="POST" action="options.php">
    <?php 
        settings_fields( 'rgfa-settings-group' );
        do_settings_sections( 'options-general.php' );
        submit_button();
    ?>
</form>
