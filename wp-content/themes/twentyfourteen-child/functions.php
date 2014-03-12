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
	global $wpdb;
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead-with-drop-cap">', $content, 1);
}
// if (is_page_template('column-article.php') {
// 	add_filter('the_content', 'first_paragraph');
// }

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
   extract(shortcode_atts(array(
      'align'    => 'center',
   ), $atts));

   if ($align != 'center') {
   	$return_string = "<blockquote class='with-Qmark Q-" . $align . " pull-out-" . $align . "'>" . $content . "</blockquote>";
   } else {
   	$return_string = "<blockquote class='small-block'>" . $content . "</blockquote>";
   }
   
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

function video_function($atts, $content = null) {
	extract(shortcode_atts(array(
	  'align'    => 'right',
	  'vimeo_id' => '11111111',
	), $atts));

	if ($align == 'left') {
		$return_string = "<div class='pull-out-left'>
  <div class='article-photo with-bottom-border'>" . $content . "<a class='btn media-action overlay-watch-video' data-icon='j' href='https://vimeo.com/" . $vimeo_id . "'>
      <span>
        Watch Video
      </span>
    </a>
  </div>
</div>";
	} else {
		$return_string = "<div class='pull-out-right'>
  <div class='article-photo with-bottom-border'>" . $content . "<a class='btn media-action overlay-watch-video' data-icon='j' href='https://vimeo.com/" . $vimeo_id . "'>
      <span>
        Watch Video
      </span>
    </a>
  </div>
</div>";
	}

	return $return_string;
}

function i_can_be_your_hero_baby_function($atts){
   extract(shortcode_atts(array(
      'title'    => 'Title',
      'author'   => 'Author',
      'subtitle' => 'Subtitle',
      'vimeo_id' => ''
   ), $atts));
   $return_string = "                    </article>
                  </div>
                </section>
              </section>
              <header class='hero hero-article-section background-size-full center'>
                <div class='story-cover-content single-col-layout'>
                  <div class='align-middle'>
                    <div class='align-block'>
                      <h2>
                        " . $title . "
                      </h2>
                      <hr class='thick white-bg partial'>
                      <a class='author-attrib text-meta-highlight tertiary-text-color' href='#'>" . $author . "</a>
                      <p class='italic lead'>
                        " . $subtitle . "
                      </p>
                      <a class='special btn neutral overlay-watch-video icon-camera-video' href='https://vimeo.com/" . $vimeo_id . "'>
                        <span>
                          Watch Video
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </header>
              <section class='featured_layout inner-bounds block'>
                <section class='primary-content'>
                  <div class='content-row'>
                    <article class='article-body-copy'>";
   return $return_string;
}

 // init process for registering our button
 add_action('init', 'wpse72394_shortcode_button_init');
 function wpse72394_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "wpse72394_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'wpse72394_add_tinymce_button');
}


//This callback registers our plug-in
function wpse72394_register_tinymce_plugin($plugin_array) {
    $plugin_array['wpse72394_button'] = '../../../wp-content/themes/twentyfourteen-child/shortcodes/hero.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function wpse72394_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "wpse72394_button";
    $buttons[] = "wpse72395_button";
    $buttons[] = "wpse72396_button";
    $buttons[] = "wpse72397_button";
    $buttons[] = "wpse72398_button";
    $buttons[] = "wpse72399_button";
    $buttons[] = "wpse72400_button";
    return $buttons;
}

function register_shortcodes(){
	add_shortcode('hr-break', 'hr_article_break_function');
	add_shortcode('hr-thick', 'hr_thick_function');
	add_shortcode('small-caps', 'lead_small_caps_function');
	add_shortcode('block-small', 'small_block_function');
	add_shortcode('block-left', 'left_block_function');
	add_shortcode('heading', 'h3_function');
	add_shortcode('video', 'video_function');
	add_shortcode('hero', 'i_can_be_your_hero_baby_function');
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
		'columns'    => 1,
		'size'       => 'original',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	if ($columns == 1) {
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
	} else {
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
	$gallery_div = "                      <div class='pull-out-left'>
                        <div class='article-photo'>
                          <img alt='' class='load' data-original='http://cleave.co/genome/wp-content/uploads/2014/03/Repubblica-30-dicembre-2012.jpg' src='http://cleave.co/genome/wp-content/uploads/2014/03/Repubblica-30-dicembre-2012.jpg'>
                          <div class='overlay-view-slideshow'>
                            <a class='btn media-action slide' data-icon='c' href='http://cleave.co/genome/wp-content/uploads/2014/03/Repubblica-30-dicembre-2012.jpg' title='Lorem Ipsum is simply dummy text of the printing and typesetting industry.'>
                              <span>
                                View Slideshow
                              </span>
                            </a>
                          ";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	// $output .= "<{$itemtag} class='slides'>";

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		$image_output = wp_get_attachment_link( $id, $size, false, false, '&nbsp;' );
		$image_output = str_replace('<a href', "<a class='mfp-hide slide' href", $image_output);

		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "
	              	
                        $image_output";


	}
		$output .= "</div>
                        </div>
                        <div class='article-photo-caption with-bottom-border'>
                          <div class='text-meta-sub'>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                          </div>
                        </div>
                      </div>";

	return $output;
	}

}
add_filter("post_gallery", "fix_my_gallery",10,2);

// Image attachement
////////////////////////



/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 **/
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'none',
		'width'	=> '200',
		'caption' => ''
	), $attr));

	$align = str_replace('align', '', $align);
	
// 	if ( 1 > (int) $width || empty($caption) )
// 		return $val;

// 	$capid = '';
// 	if ( $id ) {
// 		$id = esc_attr($id);
// 		$capid = 'id="figcaption_'. $id . '" ';
// 		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
// 	}

	//$content = get_the_content();
	//$src = preg_match( '/src="([^"]*)"/i', $content );
	
	$src = $content;

	//$src = wp_get_attachment_image_src( $src );
	//$src = "ho";

	if ($align != 'none') {
		$output = "<div class='pull-out-" . $align . "'>
			       <div class='article-photo'>
		  " . $src . "
		  	</div>
		  	<div class='article-photo-caption with-bottom-border'>
	            	<p class='text-meta-sub smaller'>
	              	" . $caption . '
	            	</p>
	        	</div>
	        </div>';
	} else {
		$output = "       <div class='article-photo with-top-border'>
		  " . $src . "
		  </div>
		  <div class='article-photo-caption with-bottom-border'>
	            <p class='text-meta-sub smaller'>
	              " . $caption . '
	            </p>
	        </div>';
	}

  return $output;

}



?>