<?php
/*
Plugin Name: WordPress Shortcode-Helper
Author: Yanik Peiffer
Version: 1.4

WordPress Shortcode-Helper is a plugin that helps you to make your shortcodes easier for clients. Make them avialble through a dropdown-list in the WordPress-Editor.

Features include:

* NEW: JSON-Generator (create valid JSON-Code within the backend)
* Media-Field: Choose an image from the media-popup (option-type: media)
* Unlimited shortcodes
* Comes without annoying standard shortcodes
* Choose your own description for every code
* Multiple input-fields for attributes
* Many settings to provide the best UI for your shortcodes

Comming soon:

* Multilingual descriptions
* More input-fields
* Any ideas? 

Installation:

Download the ZIP-File and extract it to your computer. Than upload it via FTP to your plugins-folder of WordPress (wp-content/plugins).
In your WordPress-Backend you have to activate the plugin.
Last step is to create the JSON-File in your template-folder. Create a new folder called 'shortcodes' and then create a file called 'shortcodes.json'. You can also copy the example-file included in the download.
After that, all is set up and you can see the plugin in action when you edit or create a new post/page.

*/


add_action('admin_head', 'wp_shortcode_helper_add_tinymce_button');
function wp_shortcode_helper_add_tinymce_button() {
    global $typenow;
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }

  	if ( get_user_option('rich_editing') == 'true') {
  		add_filter("mce_external_plugins", "wp_shortcode_helper_add_plugin");
  		add_filter('mce_buttons', 'wp_shortcode_helper_register_button');
  	}
}

//Button-Script
function wp_shortcode_helper_add_plugin($plugin_array) {
   	$plugin_array['shortcode_button'] = plugins_url( '/assets/js/shortcode-button.js', __FILE__ );
   	return $plugin_array;
}

//Adds the Button
function wp_shortcode_helper_register_button($buttons) {
   array_push($buttons, "shortcode_button");
   return $buttons;
}


//Template-Path
function localize_vars() {
    $value = esc_attr(get_option('wp_shortcode_helper_path'));
    if($value == 'plugin_path') {
      $directory = plugins_url().'/wp-shortcode-helper/';
    } else {
      $directory = get_stylesheet_directory_uri();
    }
    return array(
        'stylesheet_directory' => $directory
    );
}

function wp_shortcode_helper_load_scripts() {
  wp_register_script( 'shortcode_script', plugins_url( 'wp-shortcode-helper/assets/js/shortcode-button.js' , dirname(__FILE__) ), array('jquery'), false );
  wp_localize_script( 'shortcode_script', 'template_path', localize_vars() );
  wp_enqueue_script( 'shortcode_script');
  wp_enqueue_script('jquery');

  wp_enqueue_script('thickbox');
  wp_enqueue_style('thickbox');

  wp_enqueue_script('media-upload');
  wp_enqueue_script('wptuts-upload');
  
  wp_enqueue_style( 'shortcode_css', plugins_url( 'assets/css/shortcode_helper.css', __FILE__ ) );
  
}
add_action('admin_init', 'wp_shortcode_helper_load_scripts');

function wp_shortcode_helper_settings() {
    register_setting('wp-shortcode-helper-group', 'wp_shortcode_helper_path');

    add_settings_section(
      'wp-shortcode-helper-section',
      'WP-Shortcode-Helper Settings',
      'wp_shortcode_helper_section_callback',
      'wp_shortcode_helper_settings'
    );

    add_settings_field(
      'wp_shortcode_helper_path',
      'JSON-Path',
      'wp_shortcode_helper_setting_select_input',
      'wp_shortcode_helper_settings',
      'wp-shortcode-helper-section',
      array(
        'name' => 'wp_shortcode_helper_path',
        'options' => array(
          'theme_path' => 'Theme-Directory',
          'plugin_path' => 'Plugin-Directory',
        )
      )
    );

    
}
add_action('admin_init', 'wp_shortcode_helper_settings');

function wp_shortcode_helper_setting_select_input($args) {

    $name = $args['name'];
    $options = $args['options'];
    $input = '';
    $value = esc_attr(get_option($name));

    $input .= '<select id="'.$name.'" name="'.$name.'">';
      foreach($options as $key => $option) {
        if($key == $value) {
          $input .= '<option value="'.$key.'" selected>'.$option.'</option>'; 
        } else {
          $input .= '<option value="'.$key.'">'.$option.'</option>';
        }
        
      }
    $input .= '</select>';

    echo $input;


  }

function wp_shortcode_helper_section_callback() {
  echo '';
}

add_action('admin_menu', 'wp_shortcode_helper_menu');

function wp_shortcode_helper_menu() {
  add_options_page('Shortcode Helper', 'Shortcode Helper', 'manage_options', __FILE__, 'wp_shortcode_helper_page');
}

function wp_shortcode_helper_page() {
  require_once('page.php');
}


add_action( 'wp_ajax_sh_save_json', 'sh_save_json' );

function sh_save_json() {
  global $wpdb; // this is how you get access to the database

  $jsonString = $_POST['jsonString'];

  $value = esc_attr(get_option('wp_shortcode_helper_path'));
  if($value == 'plugin_path') {
    $json = plugins_url().'/wp-shortcode-helper/shortcodes.json';
  } else {
    $json = get_stylesheet_directory_uri().'/shortcodes.json';
  }

  $fp = fopen($json, "w");
  // clear content to 0 bits
  fwrite($fp, $jsonString);
  //close file
  fclose($fp);

  wp_die(); // this is required to terminate immediately and return a proper response
}

?>