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
<?php echo '<p>' . __( '<b>📟 Font Color</b><br />Change the font colour inside the gauge element - <b>[sentiment-gauge font-color="#000"]</b>. Defaults to "inherit".', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>🛡️ Border Color</b><br />Border colour outside the gauge element - <b>[sentiment-gauge border-color="#ccc"]</b>. Defaults to #333.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>🖌️ Background Color</b><br />Background colour of gauge - <b>[sentiment-gauge background-color="blue"]</b>. Defaults to white.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>📏 Margin</b><br />Alters the margin of the gauge inside the container - <b>[sentiment-gauge margin="50px"]</b>. Defaults to 10px. Accepts string with units.', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<p>' . __( '<b>↔️ Max Width</b><br />The maximum width of the "gauge" element inside the container - <b>[sentiment-gauge max-width="50%"]</b>. Defaults to 100%. Accepts integer or string (for %).', 'sentiment-gauge' ) . '</p>'; ?>
<?php echo '<hr />'; ?>