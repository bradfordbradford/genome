<?php

// Clean up wp_head - wrap in function?
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'rel_canonical');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function the_post_thumbnail_caption() {
  global $post;

  $thumb_id = get_post_thumbnail_id($post->id);

  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	); 

   $thumbnail_image = get_posts($args);

   if ($thumbnail_image && isset($thumbnail_image[0])) {
     //Uncomment to show the thumbnail caption
     echo $thumbnail_image[0]->post_excerpt;
   
     //show thumbnail title
//      echo $thumbnail_image[0]->post_title; 

     //Uncomment to show the thumbnail alt field
     //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
     //if(count($alt)) echo $alt;

  }
}

function the_post_thumbnail_description() {
  global $post;

  $thumb_id = get_post_thumbnail_id($post->id);

  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	); 

   $thumbnail_image = get_posts($args);

   if ($thumbnail_image && isset($thumbnail_image[0])) {

     //Uncomment to show the thumbnail description
     echo $thumbnail_image[0]->post_content; 
     
  }
}

// Post types
function myplugin_settings() {  
	// Add tag metabox to page
	register_taxonomy_for_object_type('post_tag', 'page'); 
	// Add category metabox to page
	register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of your theme functions.php file 
add_action( 'admin_init', 'myplugin_settings' );

// Content filters
function first_paragraph($content){
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead-with-drop-cap">', $content, 1);
}
//add_filter('the_content', 'first_paragraph');

// Shortcodes
function hr_article_break_function() {
	$return_string = "<hr class='article-break health-journal-hr'>";
	return $return_string;
}

function hr_thick_function() {
	$return_string = "<hr class='thick partial neutral-light-bg'>";
	return $return_string;
}

function lead_small_caps_function($atts, $content = null) {
   $return_string = "<span class='lead-with-small-caps tertiary-text-color'>" . $content . "</span>";
   return $return_string;
}

function small_block_function($atts, $content = null) {
   $return_string = "<blockquote class='small-block'>" . $content . "</blockquote>";
   return $return_string;
}

function left_block_function($atts, $content = null) {
   $return_string = "<blockquote class='with-Qmark Q-left pull-out-left'>" . $content . "</blockquote>";
   return $return_string;
}

function h3_function($atts, $content = null) {
   $return_string = "<h3>" . $content . "</h3>";
   return $return_string;
}

function register_shortcodes(){
	add_shortcode('hr-break', 'hr_article_break_function');
	add_shortcode('hr-thick', 'hr_thick_function');
	add_shortcode('small-caps', 'lead_small_caps_function');
	add_shortcode('small-block', 'small_block_function');
	add_shortcode('left-block', 'left_block_function');
	add_shortcode('heading', 'h3_function');
}
add_action( 'init', 'register_shortcodes');

?>