<?php

/**
 * Plugin Name: Cruel talents manager
 * Description: A management plugin for "cruel talents"
 * Version: 0.0.1
 * Author: Animadraw.fr
 */

 function ct_plugin_support()
 {
    add_theme_support( 'featured-audio' );
 }

 function ct_plugin_assets()
 {
     wp_register_script('testing', 'http://localhost/CruelTalent/wp-content/plugins/featured-audio/featured-audio-admin.js?ver=5.5', [], false, true);
 }

 add_action('after_setup_theme', 'ct_plugin_support');
 add_action('wp_enqueue_scripts', 'ct_register_assets');

// init plugin
function cruel_talent_manager_init()
{
    // new post type
    register_post_type('Talents', [
        'label' => 'Talents',
        'description' => 'Register your talent\'s sheet',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-awards',
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => ['Promote']
    ]);
}
function cruel_talent_manager_on_activate()
{
    flush_rewrite_rules();
}

// action on plugin is activated
register_activation_hook(__FILE__, 'cruel_talent_manager_on_activate');

//action on plugin is deactivated
register_deactivation_hook(__FILE__, 'cruel_talent_manager_on_deactivation');


// create custom box
function cruel_talent_manager_add_custom_box()
{
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

    if ($post_id == 15) {
        add_meta_box('_about_citation', 'Ajouter une citation', 'cruel_talent_manager_render_about_citation', 'page');
        add_meta_box('_about_author_citation', 'Auteur de la citation', 'cruel_talent_manager_render_about_author_citation', 'page');
    }

    add_meta_box('_talent_video', 'Video de démonstration', 'cruel_talent_manager_render_video_demo', 'Talents', 'side');
    add_meta_box('_talent_audio', 'Fichier audio de démonstration', 'cruel_talent_manager_render_audio_demo', 'Talents', 'side');

    add_meta_box('_talent_promote', 'Mettre en avant', 'cruel_talent_manager_render_candidat_promote', 'Talents', 'side');
    add_meta_box('_talent_eye_color', 'Couleur des yeux', 'cruel_talent_manager_render_candidat_meta_age', 'Talents');
    add_meta_box('_talent_height', 'Taille du candidat', 'cruel_talent_manager_render_candidat_meta_height', 'Talents');
    add_meta_box('_talent_playing_ages', 'Ages jouables', 'cruel_talent_manager_render_candidat_meta_playing_age', 'Talents');
    add_meta_box('_talent_mother_tongue', 'Langue maternelle', 'cruel_talent_manager_render_candidat_meta_mother_tongue', 'Talents');
    add_meta_box('_talent_languages', 'Langue(s) parlée(s)', 'cruel_talent_manager_render_candidat_meta_languages', 'Talents');
}

function cruel_talent_manager_render_about_author_citation($page)
{
    $author = get_post_meta($page->ID, '_about_author_citation', true);

?>
    <input type="text" name="_about_author_citation" id="_about_author_citation" placeholder="<?= $author ?>">
<?php

}

function cruel_talent_manager_render_about_citation($page)
{
    $citation = get_post_meta($page->ID, '_about_citation', true);
?>
    <textarea name="_about_citation" id="_about_citation" cols="100" rows="10" placeholder="<?= $citation ?>"></textarea>
<?php
}

function cruel_talent_manager_render_video_demo($post)
{
    $video = get_post_meta($post->ID, '_talent_video', true);
?>
    <input type="text" name="_talent_video" id="_talent_video" placeholder="<?= $video ?>">
<?php
}

function cruel_talent_manager_render_audio_demo($post)
{
    $audio = get_post_meta($post->ID, '_talent_audio', true);
?>
    <input type="text" name="_talent_audio" id="_talent_audio" placeholder="<?= $audio ?>">
<?php
}

// render checkbox to promote a talent
function cruel_talent_manager_render_candidat_promote($post)
{
    $value = get_post_meta($post->ID, '_talent_promote', true);
?>
    <input type="hidden" value="0" name="_talent_promote" />
    <input id="_talent_promote" type="checkbox" value="1" name="_talent_promote" <?php checked($value, '1') ?> />
    <label>Mettre en avant</label>
<?php
}


// render all information's talents input
function cruel_talent_manager_render_candidat_meta_age($post)
{
    $age = get_post_meta($post->ID, '_talent_eye_color', true);
?>
    <input id="_talent_eye_color" type="text" min="0" name="_talent_eye_color" placeholder="<?= $age ?>" />
<?php
}

function cruel_talent_manager_render_candidat_meta_height($post)
{
    $value = get_post_meta($post->ID, '_talent_height', true);
?>
    <input id="_talent_height" type="text" name="_talent_height" placeholder="<?= $value ?>" />
<?php
}

function cruel_talent_manager_render_candidat_meta_playing_age($post)
{
    $value = get_post_meta($post->ID, '_talent_playing_ages', true);
?>
    <input id="_talent_playing_ages" type="text" name="_talent_playing_ages" placeholder="<?= $value ?>" />
<?php
}

function cruel_talent_manager_render_candidat_meta_mother_tongue($post)
{
    $value = get_post_meta($post->ID, '_talent_mother_tongue', true);
?>
    <input id="_talent_mother_tongue" type="text" name="_talent_mother_tongue" placeholder="<?= $value ?>" />
<?php
}

function cruel_talent_manager_render_candidat_meta_languages($post)
{
    $value = get_post_meta($post->ID, '_talent_languages', true);
?>
    <input id="_talent_languages" type="text" name="_talent_languages" placeholder="<?= $value ?>" />
<?php
}

// save talent's informations on database
function cruel_talent_manager_save_post($post_id)
{
    if (current_user_can('edit_post', $post_id)) {

        if (array_key_exists('_about_citation', $_POST)) {
            if ($_POST['_about_citation']) {
                update_post_meta($post_id, '_about_citation', $_POST['_about_citation']);
            } else {
                delete_post_meta($post_id, '_about_citation', 1);
            }
        }

        if (array_key_exists('_about_author_citation', $_POST)) {
            if ($_POST['_about_author_citation']) {
                update_post_meta($post_id, '_about_author_citation', $_POST['_about_author_citation']);
            } else {
                delete_post_meta($post_id, '_about_author_citation', 1);
            }
        }


        if (array_key_exists('_talent_video', $_POST)) {
            if ($_POST['_talent_video']) {
                update_post_meta($post_id, '_talent_video', $_POST['_talent_video']);
            } else {
                delete_post_meta($post_id, '_talent_video', 1);
            }
        }

        if (array_key_exists('_talent_audio', $_POST)) {
            if ($_POST['_talent_audio']) {
                update_post_meta($post_id, '_talent_audio', $_POST['_talent_audio']);
            } else {
                delete_post_meta($post_id, '_talent_audio', 1);
            }
        }

        if (array_key_exists('_talent_promote', $_POST)) {
            if ($_POST['_talent_promote']) {
                update_post_meta($post_id, '_talent_promote', $_POST['_talent_promote']);
            } else {
                delete_post_meta($post_id, '_talent_promote', 1);
            }
        }

        if (array_key_exists('_talent_eye_color', $_POST)) {
            if ($_POST['_talent_eye_color']) {
                update_post_meta($post_id, '_talent_eye_color', $_POST['_talent_eye_color']);
            }
        }

        if (array_key_exists('_talent_height', $_POST)) {
            if ($_POST['_talent_height']) {
                update_post_meta($post_id, '_talent_height', $_POST['_talent_height']);
            }
        }

        if (array_key_exists('_talent_playing_ages', $_POST)) {
            if ($_POST['_talent_playing_ages']) {
                update_post_meta($post_id, '_talent_playing_ages', $_POST['_talent_playing_ages']);
            }
        }

        if (array_key_exists('_talent_mother_tongue', $_POST)) {
            if ($_POST['_talent_mother_tongue']) {
                update_post_meta($post_id, '_talent_mother_tongue', $_POST['_talent_mother_tongue']);
            }
        }

        if (array_key_exists('_talent_languages', $_POST)) {
            if ($_POST['_talent_languages']) {
                update_post_meta($post_id, '_talent_languages', $_POST['_talent_languages']);
            }
        }
    }
}

// actions
add_action('init', 'cruel_talent_manager_init');
add_action('add_meta_boxes', 'cruel_talent_manager_add_custom_box');
add_action('save_post', 'cruel_talent_manager_save_post');

//  add columns to talents in admin panel
add_filter('manage_talents_posts_columns', function ($columns) {
    return [
        'cb' => $columns['cb'],
        'thumbnail' => 'Miniature',
        'title' => 'Nom / Prénom',
        'age' => 'Age',
        'height' => 'Taille',
        'playingAges' => 'Ages joués',
        'motherTongue' => 'Langue maternelle',
        'languages' => 'Langue(s) parlée(s)',
        'promoted' => 'Mise en avant',
        'date' => $columns['date']
    ];
});

add_filter('manage_talents_posts_custom_column', function ($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            the_post_thumbnail('thumbnail', $post_id);
            break;
        case 'age':
            echo get_post_meta($post_id, '_talent_eye_color', true);
            break;
        case 'height':
            echo get_post_meta($post_id, '_talent_height', true);
            break;
        case 'playingAges':
            echo get_post_meta($post_id, '_talent_playing_ages', true);
            break;
        case 'motherTongue':
            echo get_post_meta($post_id, '_talent_mother_tongue', true);
            break;
        case 'languages':
            echo get_post_meta($post_id, '_talent_languages', true);
            break;
        case 'promoted':
            $isPromoted = get_post_meta($post_id, '_talent_promote', true);
            if ($isPromoted) {
                echo 'mis en avant';
            } else {
                echo 'non mis en avant';
            }
            break;
    }
}, 10, 2);

// register admin.css
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('admin_cruel_talent', get_template_directory_uri() . '/assets/admin.css');
});
