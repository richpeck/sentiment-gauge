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

<?php echo '<p>' . __( 'This is the settings page for the "Sentiment Gauge" Wordpress plugin.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( 'The plugin takes the "gauge" code I created in <a href="https://jsfiddle.net/8brLx2na/" target="_blank">JSFiddle</a> and attaches it to the <b>[sentiment-gauge]</b> shortcode:-', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo do_shortcode("[sentiment-gauge title='This is the title']"); ?>
<?php echo '<p>' . __( 'The structure of the plugin is that an element is added to the page when the shortcode is invoked. This is then styled to provide the illusion of the gauge.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( 'The CSS works by taking a base element and applying a series of CSS gradients to provide the outline and inner gradient.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<hr />'; ?>