<?php

function alimento_files()
{
    wp_enqueue_style('alimento', get_theme_file_uri('/css/style.css'));
}
add_action('wp_enqueue_scripts', 'alimento_files');
//tilføjer feated image til post types
add_theme_support('post-thumbnails');
