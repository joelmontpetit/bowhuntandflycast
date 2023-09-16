<?php 

/*Theme Support*/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );


/* Enqueue JS and CSS files */
function wp_base_style() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/style.css');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('jqueryui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js', array(), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/dist/main.js');
}
add_action( 'wp_enqueue_scripts', 'wp_base_style' );

/*Navigation*/
register_nav_menus(array(
    'main-menu' => __('Main Menu', 'SquadWebCorpo'),
    'sub-menu' => __('Sub Menu', 'SquadWebCorpo')
));

require_once locate_template('functions/acf/add-options-header.php');

require_once locate_template('functions/remove-id-and-class.php');
require_once locate_template('functions/remove-json-rankmath.php');


function token( $wp_customize ) {

    $wp_customize->add_setting('api-tk');
    $wp_customize->add_setting('jump-link');

	$wp_customize->add_section( 
        'liveporn_body_options', 
        array(
            'title'       => __( 'API', 'livepornteen' ),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        ) 
    );
 
    $wp_customize->add_control( 'api-token-id', array(
        'type' => 'text',
        'section' => 'liveporn_body_options',
        'label' => 'API Token',
        'settings' => 'api-tk',
      ) );

      $wp_customize->add_control( 'jump-jumppage-id', array(
        'type' => 'text',
        'section' => 'liveporn_body_options',
        'label' => 'Affiliates jump page',
        'settings' => 'jump-link',
        ) );           
}

function get_jumppage() {
    $jumppage= get_theme_mod('jump-link');
    return $jumppage;
  }

  function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Reviews';
    $submenu['edit.php'][5][0] = 'Reviews';
    $submenu['edit.php'][10][0] = 'Add New Review';
    $submenu['edit.php'][15][0] = 'Categories Reviews'; // Change name for categories
    $submenu['edit.php'][16][0] = 'Tags Reviews'; // Change name for tags
    echo '';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Reviews';
    $labels->singular_name = 'Review';
    $labels->add_new = 'Add New Review';
    $labels->add_new_item = 'New Review';
    $labels->edit_item = 'Edit Reviews';
    $labels->new_item = 'Review';
    $labels->view_item = 'View Review';
    $labels->search_items = 'Search Reviews';
    $labels->not_found = 'No Reviews found';
    $labels->not_found_in_trash = 'No Reviews found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
