<?php 

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}



function enqueue_my_custom_script() {
    if (is_front_page()){
        wp_enqueue_script( 'indexjs', get_template_directory_uri() . '/js/index.js',  ["jquery"], false, true );
    } else{
        wp_enqueue_script( 'singlejs', get_template_directory_uri() . '/js/single.js',  ["jquery"], false, true );

    }

    wp_enqueue_script( 'ligthboxjs', get_template_directory_uri() . '/js/lightbox.js', array(), '1.0', true);
    wp_enqueue_script( 'scriptjs', get_template_directory_uri() . '/js/script.js',  ["jquery"], false, true );

}

add_action( 'wp_enqueue_scripts', 'enqueue_my_custom_script' );

add_theme_support('title-tag');

// s'il y a plusieurs menus à rajouter, voici le code :
function register_my_menus() {
    register_nav_menus(
    array(
    'header-menu' => __( 'Menu Header' ),
    'footer-menu' => __( 'Menu Footer' ),
    )
    );
}
add_action( 'init', 'register_my_menus' );

