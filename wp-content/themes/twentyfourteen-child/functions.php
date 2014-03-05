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
	add_shortcode('block-small', 'small_block_function');
	add_shortcode('block-left', 'left_block_function');
	add_shortcode('heading', 'h3_function');
}
add_action( 'init', 'register_shortcodes');

// Gallery
//////////////
function fix_my_gallery($output, $attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	//$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'ul',
		'icontag'    => 'li',
		'captiontag' => 'figcaption',
		'columns'    => 3,
		'size'       => 'original',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "    </article>
	          </div>
	        </section>
	      </section>
              <section class='hero center hero-slideshow-section background-size-full center'>
                <div class='slideshow-wrap'>
                  <div class='slideshow'>
                    ";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$output .= "<{$itemtag} class='slides'>";

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ( ! empty( $link ) && 'file' === $link )
			$image_output = wp_get_attachment_link( $id, $size, false, false );
		elseif ( ! empty( $link ) && 'none' === $link )
			$image_output = wp_get_attachment_image( $id, $size, false );
		else
			$image_output = wp_get_attachment_link( $id, $size, true, false );

		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "
	              <{$icontag}>
                        $image_output";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
                        <{$captiontag}>
                          " . wptexturize($attachment->post_excerpt) . "
                        </{$captiontag}>";
		}
		$output .= "
                      </{$icontag}>";
	}
		$output .= "
	            </{$itemtag}>";

	$output .= "
	          </div>
	        </div>
	      </section>
	      <section class='featured_layout inner-bounds'>
                <section class='primary-content'>
                  <div class='content-row'>
                    <article class='article-body-copy add-space-t'>";

	return $output;
}
add_filter("post_gallery", "fix_my_gallery",10,2);

// Image attachement
////////////////////////

/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 **/
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
// 	if ( 1 > (int) $width || empty($caption) )
// 		return $val;

// 	$capid = '';
// 	if ( $id ) {
// 		$id = esc_attr($id);
// 		$capid = 'id="figcaption_'. $id . '" ';
// 		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
// 	}

	return "       <div class='article-photo with-top-border'>
	  " . do_shortcode( $content ) . "
	  </div>
	  <div class='article-photo-caption with-bottom-border'>
            <p class='text-meta-sub smaller'>
              " . $caption . '
            </p>
        </div>';
}



?>