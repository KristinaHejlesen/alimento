<?php

function alimento_files()
{
    /*henter javscript filen, version er sat 1.0, wp spørger efter om du øsnker at køre js lige før </body> og true beyder ja det vil vi gerne, istedet for i toppen af sektionen */
    wp_enqueue_script('alimento-js', get_theme_file_uri('/assets/js/app.js'), array(), '1.0', true);
    /*henter stylesheet med vores css */
    wp_enqueue_style('alimento', get_theme_file_uri('/assets/css/style.css'));
    /*henter fontawesome */
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css');
    /*henter google fonts */
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=chef_hat'
    );
}
/*kører functionen fra php fil med wp_head(); */
add_action('wp_enqueue_scripts', 'alimento_files');
//tilføjer feated image til post types
add_theme_support('post-thumbnails');
