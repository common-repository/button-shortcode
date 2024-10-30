<?php
 
 /**
 * Plugin Name: Button Shortcode
 * Plugin URI: https://wordpress.org/plugins/button-shortcode/
 * Description: The Button Shortcode plugin adds a customizable button via a shortcode inside your WordPress content. The shortcode is [button].
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Ashok Kumar
 * Author URI: https://profiles.wordpress.org/ak0ashokkumar/
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

 


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Function to create the button shortcode
function bs_button_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'text' => 'Click Me',
            'url' => '#',
            'new_window' => 'no',
            'class' => 'button-shortcode wp-element-button'
        ), 
        $atts, 
        'button'
    );

    $target = $atts['new_window'] === 'yes' ? '_blank' : '_self';

    return '<a href="' . esc_url($atts['url']) . '" target="' . esc_attr($target) . '" class="' . esc_attr($atts['class']) . '">' . esc_html($atts['text']) . '</a>';
}

// Register the shortcode
function register_bs_button_shortcode() {
    add_shortcode('button', 'bs_button_shortcode');
}
add_action('init', 'register_bs_button_shortcode');