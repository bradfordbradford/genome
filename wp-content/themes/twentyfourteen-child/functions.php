<?php

add_filter( 'img_caption_shortcode', 'remove_thumbnail_dimensions');
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}

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

function h4_function($atts, $content = null) {
   $return_string = "<h4 class='small-block'>" . $content . "</h4>";
   return $return_string;
}

function email_function($atts, $content = null) {
   //$content = "john.mueller@hello.ab.com";
   $parts = explode('@', $content);
   $name = $parts[0];
   $parts = explode('.', $parts[1]);
   if (sizeof($parts) > 2) {
     $domain = $parts[0] . "." . $parts[1];
   } else {
     $domain = $parts[0];
   }
   
   $ending = $parts[sizeof($parts)-1];
   // $name = $tokens[sizeof($tokens)-2];
   $return_string = $name;
   $return_string .= " {at} ";
   $return_string .= $domain;
   $return_string .= " (dot) ";
   $return_string .= $ending;
   return $return_string;
}

function video_function($atts, $content = null) {
	extract(shortcode_atts(array(
	  'align'    => 'right',
	  'vimeo_id' => '11111111',
	), $atts));

	$content = preg_replace( '/(width|height)=\"\d*\"\s/', "", $content );
  $content = preg_replace( '/(width|height)=\"\d*\"\s/', "", $content );

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

function contribs_function($atts, $content = null) {
   $return_string = "<ul class='slats'>" . $content . "</ul>";
   return $return_string;
}

function contrib_function($atts){
	extract(shortcode_atts(array(
		'author' => '',
		//'title'  => '',
		'pos'  => '',
		'posts'  => ''
	), $atts));

	$author = get_user_by('login', $author);

	// print_r($author);

	// echo $author->display_name;

	if (function_exists('get_wp_user_avatar_src')) {
		$avatar = get_wp_user_avatar_src($author->id);
	} else {
		$avatar = '';
	}

	if ($pos == 'first' && $posts == '') {
		$return_string = "<ul class='slats'>";
	}
	if ($pos == 'first' && $posts != '') {
		$return_string = "<ul class='roll-list slats'>";
	}
	
	$return_string .= "                    <li class='title'>
                      <div class='media-object with-med-image'>
                        <img alt='' class='load author-pic circle' data-original='" . $avatar . "' src='" . $avatar . "'>
                        <div class='media-copy'>
                          <h3 class='text-meta-header' href='#'>
                            <a href='#'>
                              " . $author->display_name . "
                            </a>
                          </h3>
                          <p class='sans'>
                            " . $author->description . "
                          </p>
                          <div class='view-all'>
                            <a class='italic serif' href='#'>
                              View All Articles
                              <span class='double-quote-right'>
                                &#187;
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </li>";


    if ($posts != '') {

    					$num_posts = 3;
                          $popular = new WP_Query( array(
                            'post_type'             => array( 'page', 'post' ),
                            'showposts'             => $num_posts,
                            // 'cat'                   => 'MyCategory',
                            //'ignore_sticky_posts'   => true,
                            'orderby'               => 'comment_count',
                            'order'                 => 'dsc',
                            // 'date_query' => array(
                            //     array(
                            //         'after' => '1 week ago',
                            //     ),
                            // ),
                            'author'                => $author->id,
                          ) );

		while ( $popular->have_posts() ): $popular->the_post();
                        
        	// $return_string .= "<li>
         //                  <div class='media-object reversed'>";
                            // Display Topic
                              // foreach((get_the_category()) as $childcat) {
                              //   if (cat_is_ancestor_of(5, $childcat)) {
                              //     $return_string .= "<a class='text-meta' href='".get_category_link($childcat->cat_ID)."'>";
                              //     $return_string .= $childcat->cat_name . "</a>";
                              //   }
                              // }

                        //     $return_string .= "<div class='media-copy'>
                        //       <h3 class='text-meta-header small'>
                        //         <a href='" . get_permalink() . "'>"
                        //           . the_title('','',FALSE) . "
                        //         </a>
                        //       </h3>
                        //       <p class='text-meta-sub light-text-color'>
                        //         <a href='http://link/…'>
                        //           By " . the_author('','',FALSE) . "
                        //         </a>
                        //         <a href='http://link/…'>
                        //           <span class='icon' data-icon='F'></span>
                        //           " . get_post_meta( get_the_ID(), 'Read Time', true ) . " read
                        //         </a>
                        //       </p>
                        //     </div>
                        //   </div>
                        // </li>";




    	$return_string .= "
    				<li>
                      <div class='media-object-horizontal-layout'>
                        <header>
                          <h4 class='text-meta-header'>" . the_title('','',FALSE) . "</h4>
                          <p class='text-meta-sub light-text-color'>
                            " . the_date('','','',FALSE) . "
                          </p>
                        </header>
                        <div class='media-copy'>
                          <p class='text-meta-sub'>
                            " . get_the_excerpt() . "
                            <a class='text-meta continue-reading' href='" . get_permalink() . "'>
                              Continue Reading
                              <span class='double-quote-right'>
                                &#187;
                              </span>
                            </a>
                          </p>
                        </div>
                      </div>
                    </li>";




    	endwhile;
        wp_reset_query();
    }

    if ($pos == 'last') {
		$return_string .= "</ul>";
	}             

	return $return_string;

}

function person_function($atts){
  extract(shortcode_atts(array(
    'name' => '',
    'title'  => '',
    'link'  => '',
    'position'  => ''
  ), $atts));

  if ($position == 'first') {
    $return_string = "<ul class='slats'>";
  }
  
  $return_string .= "                    <li>
                      <div class='media-object'>
                        <div class='media-copy'>
                          <h3 class='text-meta-header small' href='#'>
                            <a href='" . $link . "'>
                              " . $name . "
                            </a>
                          </h3>
                          <p class='sans'>
                            " . $title . "
                          </p>
                        </div>
                      </div>
                    </li>";

    if ($position == 'last') {
    $return_string .= "</ul>";
  }             

  return $return_string;

}

function contact_function($atts){
  extract(shortcode_atts(array(
    'name' => '',
    'phone'  => '',
    'email'  => '',
    'position'  => ''
  ), $atts));

  if ($position == 'first') {
    $return_string = "<ul class='contact-list'>";
  }
  
  $return_string .= "                    <li class='vcard inline'>
                      <span class='fn'>
                        " . $name . ":
                      </span>
                      <span class='tel'>
                        " . $phone . "
                      </span>";

    if ($position == 'last') {
    $return_string .= "</ul>";
  }             

  return $return_string;

}

function vcard_function($atts){
  extract(shortcode_atts(array(
    'name' => '',
    'address1'  => '',
    'address2'  => '',
    'address3'  => ''
  ), $atts));

  
  $return_string .= "                  <div class='vcard dis-block'>
                    <span class='org'>" . $name . "</span>
                    <span class='street-address'>" . $address1 . "</span>
                    <span class='street-address'>" . $address2 . "</span>
                    <span class='locality region postal-code'>" . $address3 . "</span>
                  </div>";          

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
	add_shortcode('h3', 'h3_function');
  add_shortcode('h4', 'h4_function');
  add_shortcode('email', 'email_function');
	add_shortcode('video', 'video_function');
	add_shortcode('hero', 'i_can_be_your_hero_baby_function');
	add_shortcode('contributor', 'contrib_function');
	add_shortcode('contributors', 'contribs_function');
  add_shortcode('person', 'person_function');
  add_shortcode('contact', 'contact_function');
  add_shortcode('vcard', 'vcard_function');
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
				$image_output = preg_replace( '/(width|height)=\"\d*\"\s/', "", $image_output );
  			$image_output = preg_replace( '/(width|height)=\"\d*\"\s/', "", $image_output );

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
		$key = array_keys($attachments);
		$ok = $attachments[$key[0]];
		//print_r($attachments);
		$gallery_div = "                      <div class='pull-out-left'>
	                        <div class='article-photo'>
	                          <img alt='' class='load' data-original='" . $ok->guid . "' src='" . $ok->guid . "'>
	                          <div class='overlay-view-slideshow'>
	                            <a class='btn media-action slide' data-icon='c' href='" . $ok->guid . "' title='" . $ok->post_excerpt . "'>
	                              <span>
	                                View Slideshow
	                              </span>
	                            </a>
	                          ";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

		// $output .= "<{$itemtag} class='slides'>";

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {

			if ($id == $ok->ID) {
				# code...
			} else {

				$image_output = wp_get_attachment_link( $id, $size, false, false, '&nbsp;' );
				$image_output = str_replace('<a href', "<a class='mfp-hide slide' href", $image_output);
				$image_output = preg_replace( '/(width|height)=\"\d*\"\s/', "", $image_output );
  			$image_output = preg_replace( '/(width|height)=\"\d*\"\s/', "", $image_output );

				$image_meta  = wp_get_attachment_metadata( $id );

				$orientation = '';
				if ( isset( $image_meta['height'], $image_meta['width'] ) )
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

				$output .= "
			              	
		                        $image_output";

			}
		}
		$output .= "</div>
                        </div>
                        <div class='article-photo-caption with-bottom-border'>
                          <div class='text-meta-sub'>
                            " . $ok->post_excerpt . "
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
	
	// $src = do_shortcode( $content );
	$src = $content;

	$src = preg_replace( '/(width|height)=\"\d*\"\s/', "", $src );
  	$src = preg_replace( '/(width|height)=\"\d*\"\s/', "", $src );

	$src = str_replace('<a', "<a class='overlay-view-image' title='" . $caption . "'", $src);

	$src = str_replace('<img', "<span class='btn media-action no-text' data-icon='b'></span>
	    <img", $src);
    // $src =
    // $src =
    //     preg_replace(
    //         array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
    //             '{ wp-image-[0-9]*" /></a>}'),
    //         array('<img','" />'),
    //         $src
    //     );

  // $src = preg_replace_callback(
  //   '{<a\s+(?:[^>]*?\s+)?href="([^"]*)">}',
  //   function($m) {
  //   		//$falsetto = $src;
  //       $falsetto .= "<himg>".$m[1]."</himg>";
  //       preg_replace('</a>', $m[1], $falsetto);
  //       return $falsetto;
  //   },
  //   $src);


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

function add_lazyload($content) {
     $dom = new DOMDocument();
     @$dom->loadHTML($content);

     foreach ($dom->getElementsByTagName('img') as $node) {
         $oldsrc = $node->getAttribute('src');
         $node->setAttribute("data-original", $oldsrc );
         //$newsrc = ''.get_template_directory_uri().'/library/images/nothing.gif';
         $node->setAttribute("src", $oldsrc);
         $node->setAttribute("class", "load");
     }
     return preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
     // $newHtml = $dom->saveHtml();
     // return $newHtml;
}

add_filter('the_content', 'add_lazyload');

// function k99_image_link_void( $content ) {
//     $content =
//         preg_replace(
//             array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
//                 '{ wp-image-[0-9]*" /></a>}'),
//             array('<img','" />'),
//             $content
//         );
//     return $content;
// }

// add_filter( 'the_content', 'k99_image_link_void' );

function filter_image_send_to_editor($html, $id, $caption, $title, $align, $url, $size, $alt) {
  //$html = str_replace('<img ', '<img id="yay" ', $html);
  if ($url != '') {
//   	$html = "[caption id='id' align='".$align."' width='width']<img alt='".$alt."' class='load' data-original='".$url."' src='".$url."'>
// <a class='btn media-action no-text overlay-view-image' data-icon='b' href='".$url."' title='".$title."'></a>".$caption."[/caption]";

  	//$html = '<img alt="'.$alt.'" class="load" data-original="'.$url.'" src="'.$url.'">
//<a class="btn media-action no-text overlay-view-image" data-icon="b" href="'.$url.'" title="'.$title.'">&nbsp;</a>';

  	//$html .= "<a class='btn media-action no-text overlay-view-image' data-icon='b' href='".$url."' title='".$title."'>&nbsp;</a>";

  	//$html = "<a href='google.com'>Hi</a>";

  	$html = "                      <div class='pull-out-right'>
                        <div class='article-photo'>
                          <img alt='' class='load' data-original='".$url."' src='".$url."'>
                          <a class='btn media-action no-text overlay-view-image' data-icon='b' href='".$url."' title='".$caption."'> </a>
                        </div>
                        <div class='article-photo-caption with-bottom-border'>
                          <p class='text-meta-sub smaller'>
                            ".$caption."
                          </p>
                        </div>
                      </div>";

  	return $html;

  } else {
  	return $html;
  }

}
//add_filter('image_send_to_editor', 'filter_image_send_to_editor', 10, 8);
//add_filter('the_content', 'filter_image_send_to_editor', 10, 8);

function custom_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

if ( ! function_exists( 'twentyfourteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function paging_nav() {
  // Don't print empty markup if there's only one page.
  if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
    return;
  }

  $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
  $pagenum_link = html_entity_decode( get_pagenum_link() );
  $query_args   = array();
  $url_parts    = explode( '?', $pagenum_link );

  if ( isset( $url_parts[1] ) ) {
    wp_parse_str( $url_parts[1], $query_args );
  }

  $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
  $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

  $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
  $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

  // Set up paginated links.
  $links = paginate_links( array(
    'base'     => $pagenum_link,
    'format'   => $format,
    'total'    => $GLOBALS['wp_query']->max_num_pages,
    'current'  => $paged,
    'mid_size' => 1,
    'add_args' => array_map( 'urlencode', $query_args ),
    'prev_next' => False,
    'prev_text' => __( 'Older Entries' ),
    'next_text' => __( 'Newer Entries' ),
    'type'     => 'list'
  ) );

  if ( $links ) :

  ?>
<?php 
  $next = get_next_posts_link( "Older Entries
                      <span data-icon='r'></span>" );
  $next = str_replace("<a", "<a class='page-prev directional-nav'", $next);

  $prev = get_previous_posts_link( "Newer Entries
                    <span data-icon='q'></span>" );

  $prev = str_replace("<a", "<a class='page-new directional-nav'", $prev);

  $links = str_replace("ul>", "ol>", $links);
  $links = str_replace("<ul", "<ol", $links);
?>
<div class='content-row'>
                <div class='pagination-wrap'>
                  <?php echo $next; ?>
                  <?php echo $prev; ?>

      <?php //print_r($links); 
      // Maybe use array and regex preg_match_return?
      ?>

      <?php echo $links; ?>

  <?php
  endif;
}
endif;

add_action('init', 'current_issue_register');
function current_issue_register() {
 
  $labels = array(
    'name' => _x('Current Issue', 'post type general name'),
    'singular_name' => _x('Current Issue', 'post type singular name'),
    'add_new' => _x('Add New', 'Current Issue'),
    'add_new_item' => __('Add New Current Issue'),
    'edit_item' => __('Edit Current Issue'),
    'new_item' => __('New Current Issue'),
    'view_item' => __('View Current Issue'),
    'search_items' => __('Search Current Issue'),
    'not_found' =>  __('Nothing found'),
    'not_found_in_trash' => __('Nothing found in Trash'),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'menu_icon' => 'dashicons-format-aside',
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail')
    ); 
 
  register_post_type( 'current_issue' , $args );
}

add_action('admin_init', 'admin_init1');
function admin_init1(){
  add_meta_box("issue_number-meta", "Issue Number", "issue_number", "current_issue", "side", "low");
  //add_meta_box("credits_meta", "Design &amp; Build Credits", "credits_meta", "portfolio", "normal", "low");
}
 
function issue_number(){
  global $post;
  $custom = get_post_custom($post->ID);
  $issue_number = $custom["issue_number"][0];
  ?>
  <label>#:</label>
  <input name="issue_number" value="<?php echo $issue_number; ?>" />
  <?php
}

add_action('save_post', 'save_details1');

function save_details1(){
  global $post;
 
  update_post_meta($post->ID, "issue_number", $_POST["issue_number"]);

}

add_action("manage_posts_custom_column",  "portfolio_custom_columns1");
add_filter("manage_edit-current_issue_columns", "portfolio_edit_columns1");
 
function portfolio_edit_columns1($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "title" => "Current Issue Title",
    "description" => "Description",
    "issue_number" => "Issue Number",
  );
 
  return $columns;
}
function portfolio_custom_columns1($column){
  global $post;
 
  switch ($column) {
    case "description":
      the_excerpt();
      break;
    case "issue_number":
      $custom = get_post_custom();
      echo $custom["issue_number"][0];
      break;
  }
}

add_theme_support('post-thumbnails');

?>