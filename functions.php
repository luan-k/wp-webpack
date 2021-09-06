<?php

function wkode_files(){

    wp_enqueue_script('wkode-anime', get_theme_file_uri('/js/anime-master/lib/anime.min.js'), NULL, '1.0', true);
    wp_enqueue_script('wkode-anime-file', get_theme_file_uri('/js/anime-master/lib/animations.js'), NULL, '1.0', true);
    wp_enqueue_script('wkode-carousel', get_theme_file_uri('/js/carousel.js'), NULL, '1.0', true);
    wp_enqueue_script( 'axios', 'https://unpkg.com/axios/dist/axios.min.js' );
    wp_enqueue_script('wkode-search', get_theme_file_uri('/js/Search.js'), NULL, '1.0', true);
    wp_enqueue_script('wkode-product-zoom-js', get_theme_file_uri('/js/jquery-zoom/jquery.exzoom.js'), NULL, '1.0', true);
    wp_enqueue_script('wkode-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', NULL, '1.0', true);
    wp_enqueue_script('wkode-font_awesome', '//kit.fontawesome.com/fde7c29e46.js', NULL, '1.0', true);
    wp_enqueue_script('wkode-js-bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', NULL, '1.0', true);
    wp_enqueue_script('slick-slider-js', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', NULL, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Didact+Gothic&display=swap');
    wp_enqueue_style('custom-google-fonts2', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    wp_enqueue_style('bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
    wp_enqueue_style('slick-slider-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('wkode-product-zoom-css', get_template_directory_uri() . '/js/jquery-zoom/jquery.exzoom.css');
    wp_enqueue_style('products-css', get_template_directory_uri() . '/css/products.css');
    wp_enqueue_style('navbar-css', get_template_directory_uri() . '/css/navbar.css');
    wp_enqueue_style('search-css', get_template_directory_uri() . '/css/search.css');
    wp_enqueue_style('servicos-css', get_template_directory_uri() . '/css/servicos.css');
    wp_enqueue_style('search-animation-css', get_template_directory_uri() . '/css/searchbar-animation.css');

    if (strstr($_SERVER['SERVER_NAME'], 'webpack-latest-theme.local/')) {
        wp_enqueue_script('main-wkode-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
      } else {
        wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.1fa169383e64a33bfd0c.js'), NULL, '1.0', true);
        wp_enqueue_script('main-wkode-js', get_theme_file_uri('/bundled-assets/scripts.302cddab6ef7ed2233e8.js'), NULL, '1.0', true);
        wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.302cddab6ef7ed2233e8.css'));
      }
    
      wp_localize_script('main-wkode-js', 'universityData', array(
        'root_url' => get_site_url()
      ));

}

add_action('wp_enqueue_scripts', 'wkode_files');

function wkode_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('ProductImageList', 500, 350, true);
    add_image_size('ProductImageSingle', 800, 1000, true);
}
add_action('after_setup_theme', 'wkode_features');


function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');