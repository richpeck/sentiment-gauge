<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.github.com/richpeck
 * @since      1.0.0
 *
 * @package    Sentiment_Gauge
 * @subpackage Sentiment_Gauge/admin/partials
 */
 
 // Excellent Tutorial
 // https://flowygo.com/en/blog/create-settings-page-for-wordpress-plugin/
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <?php do_settings_sections( $this->plugin_name ); ?>
</div>
