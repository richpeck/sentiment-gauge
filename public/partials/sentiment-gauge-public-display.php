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

<div
    class="gauge"
    style="--percent: <?php echo $a['percent']; ?>; --color: <?php echo $a['color']; ?>;"
    onclick="
        var math = Math.floor(Math.random() * 100);
        var element = this.querySelector('.element');
        
        this.setAttribute('style', '--percent: ' + math + '; --color: <? echo $a['color']; ?>;');
        element.setAttribute('data-percent', math);"
    >
    <div class="element" data-percent="<?php echo $a['percent']; ?>">
        <? echo $title; ?>
    </div>
</div>
