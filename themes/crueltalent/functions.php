<?php

function ct_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('navbar', 'desktop menu');
    register_nav_menu('footer', 'social menu');
    register_nav_menu('mobile', 'mobile menu');
}

function posts_link_next_class($format){
  $format = str_replace('href=', 'class="circle right" href=', $format);
  return $format;
}

function posts_link_prev_class($format){
  $format = str_replace('href=', 'class="circle left" href=', $format);
  return $format;
}

add_filter('next_post_link', 'posts_link_next_class');
add_filter('previous_post_link', 'posts_link_prev_class');


function ct_register_assets ()
{
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_register_style('ct_css', get_template_directory_uri() . '/assets/css/global.css');
    wp_register_style('ct_home', get_template_directory_uri() . '/assets/css/home.css');
    wp_register_style('ct_aboutus', get_template_directory_uri() . '/assets/css/about.css');
    wp_register_style('ct_contact', get_template_directory_uri() . '/assets/css/contact.css');
    wp_register_style('ct_castingDirectory', get_template_directory_uri() . '/assets/css/castingDirectory.css');
    wp_register_style('ct_actorDetails', get_template_directory_uri() . '/assets/css/actorDetails.css');

    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.1.0.js', [], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', [], false, true);
    //wp_register_script('swup', 'https://unpkg.com/swup@latest/dist/swup.min.js', [], false, true);
    wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js', [], false, true);
    wp_register_script('app', get_template_directory_uri() . '/assets/js/app.js', [], false, true);
    wp_register_script('actorDetails', get_template_directory_uri() . '/assets/js/actorDetails.js', [], false, true);
    wp_register_script('castingDirectory', get_template_directory_uri() . '/assets/js/castingDirectory.js', [], false, true);
    wp_register_script('contact', get_template_directory_uri() . '/assets/js/contact.js', [], false, true);
    wp_register_script('homePanel', get_template_directory_uri() . '/assets/js/homePanel.js', [], false, true);
    wp_register_script('overlay', get_template_directory_uri() . '/assets/js/overlay.js', [], false, true);
    wp_register_script('contact', get_template_directory_uri() . '/assets/js/contact.js', [], false, true);
    wp_register_script('about', get_template_directory_uri() . '/assets/js/about.js', [], false, true);
    wp_register_script('barbajs', 'https://unpkg.com/@barba/core', [], false, true);

    //wp_enqueue_script('swup');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('ct_css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('popper');

    wp_enqueue_script('bootstrap');
    
    wp_enqueue_script('gsap');
    wp_enqueue_script('barbajs');
    
    

    if (is_home()) {
      //wp_enqueue_script('homePanel');
      //wp_enqueue_script('overlay');
      //wp_enqueue_style('ct_home');
    }

    if (is_single()) {
      // wp_enqueue_script('actorDetails');
      //wp_enqueue_style('ct_actorDetails');
    }

    if (is_page('casting-directory')) {
      //wp_enqueue_script('castingDirectory');
      //wp_enqueue_style('ct_castingDirectory');
    }

    if (is_page('contact-us')) {
      wp_enqueue_style('ct_contact');
      // wp_enqueue_script('contact');
    }

    if (is_page('about-us')) {
      //wp_enqueue_style('ct_aboutus');
      //wp_enqueue_script('about');
    }

    
    wp_enqueue_script('app');


    
}

add_action('after_setup_theme', 'ct_supports');
add_action('wp_enqueue_scripts', 'ct_register_assets');
