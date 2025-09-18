<?php

function alimento_files()
{
    wp_enqueue_style('alimento', get_theme_file_uri('/assets/css/style.css'));
    /*henter fontawesome */
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'alimento_files');
//tilføjer feated image til post types
add_theme_support('post-thumbnails');
