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

<div class="gauge <?php echo $a['align']; ?>" style="--percent: <?php echo $a['percent']; ?>; --color: <?php echo $a['color']; ?>; --margin: <?php echo $a['margin']; ?>; --max-width: <?php echo $a['max-width']; ?>; --background-color: <?php echo $a['background-color']; ?>; --font-color: <?php echo $a['font-color']; ?>; --border-color: <?php echo $a['border-color']; ?>;">
    <div class="element" data-percent="<?php echo $a['percent']; ?>">
        <? echo $title; ?>
    </div>
</div>
