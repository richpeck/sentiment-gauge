<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.github.com/richpeck
 * @since      1.0.0
 *
 * @package    Sentiment_Gauge
 * @subpackage Sentiment_Gauge/public/partials
 */
?>

<?php
    // Title 
    // Because we need to ensure the title is formatted properly
    $title = $a['title'] == "" ? '&nbsp;' : '<div class="title">' . $a['title'] . '</div>';
?>

<div class="gauge <?php esc_html_e( $a['align'], 'sentiment-gauge' ); ?>" style="--percent: <?php esc_html_e( $a['percent'], 'sentiment-gauge' ); ?>; --color: <?php esc_html_e( $a['color'], 'sentiment-gauge' ); ?>; --margin: <?php esc_html_e( $a['margin'], 'sentiment-gauge' ); ?>; --max-width: <?php esc_html_e( $a['max-width'], 'sentiment-gauge' ); ?>; --background-color: <?php esc_html_e( $a['background-color'], 'sentiment-gauge' ); ?>; --font-color: <?php esc_html_e( $a['font-color'], 'sentiment-gauge' ); ?>; --border-color: <?php esc_html_e( $a['border-color'], 'sentiment-gauge' ); ?>;">
    <div class="element" data-percent="<?php esc_html_e( $a['percent'], 'sentiment-gauge' ); ?>">
        <? esc_html_e( $title, 'sentiment-gauge' ); ?>
    </div>
</div>
