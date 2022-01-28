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

<?php echo '<p>' . __( 'There are <b>3</b> options which can be used presently (we can add more): -', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>✅ Title</b><br />Add a title by using the title="x" attribute inside the shortcode - <b>[sentiment-gauge title="x"]</b>. Leave blank to omit.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>🎨 Color</b><br />Change the colour of the pin/circle inside the element - <b>[sentiment-gauge color="blue"]</b>. Defaults to red. Accepts CSS-compatible colours (hex or text).', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>🔴 Percent</b><br />Change the percentage shown on init with the percent="x" attribute inside the shortcode - <b>[sentiment-gauge percent="50"]</b>. Defaults to 50.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<hr />'; ?>