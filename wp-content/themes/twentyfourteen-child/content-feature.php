<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

      <div id='site-wrap-inner'>
        <main id='content-wrap' role='main'>
          <div class='background-white'>
            <header class='hero hero-featured-article background-size-full center hero-tall'>
              <div class='story-cover-content single-col-layout'>
                <div class='align-middle'>
                  <div class='align-block'>
                    <a class='cover-content-inner' data-0='top:0px;' data-500='top:-40px;' href='https://www.google.com/'>
                      <h2>
                        <?php //the_title(); ?>
                        <?php
                          $title = get_post_meta( get_the_ID(), 'Feature Title', true );
                          //echo wpautop($title);
                          $title = nl2br($title);
                          echo $title;
                        ?>
                      </h2>
                      <hr class='white-bg partial'>
                      <p class='sans lead'>
                        <?php echo get_post_meta( get_the_ID(), 'Subtitle', true ); ?>
                      </p>
                      <div class='author-attrib text-meta-highlight tertiary-text-color'>By <?php the_author(); ?></div>
                      <div class='content-row'>
                        <a class='arrow-down' data-icon='E' href=''></a>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
              <?php 
                if( class_exists('Dynamic_Featured_Image') ) {
                  global $dynamic_featured_image;
                    $featured_images = $dynamic_featured_image->get_featured_images( $postId );

                    //print_r($featured_images);
                    $featured_img_2 = $featured_images[0][full];
                 }
              ?>
              <div class='story-cover-image' data-0='opacity:1;' data-140='opacity:0;' style='background-image: url(<?php echo $featured_img; ?>);'></div>
              <div class='story-cover-image-transition' style='background-image: url(<?php echo $featured_img_2; ?>);'></div>
            </header>
            <div id='read-time-wrap'>
              <section class='featured_layout inner-bounds block' id='top'>
                <section class='primary-content'>
                  <div class='content-row'>
                    <article class='article-body-copy'>
                      <?php
// Content
                        $content = get_the_content() . " <span class='light-text-color inline-block end-mark' data-icon='G'></span>" ;
                        echo apply_filters('the_content',$content);
                      ?>
                    </article>
                  </div>
                </section>
              </section>
            </div>
          </div>
        </main>
      </div>