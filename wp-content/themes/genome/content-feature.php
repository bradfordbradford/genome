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
                    <a class='cover-content-inner' data-0='top:0px;' data-500='top:-40px;' href='#'>
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
                      <div class='author-attrib text-meta-highlight tertiary-text-color'>By <?php the_author(); ?></div><br>
                      <div class='author-attrib text-meta-highlight tertiary-text-color'><?php echo the_post_thumbnail_caption(); ?></div>
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
            <div id='rte-target'>
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
                <div class='content-row end-block block'>
                  <section class='collection grid-3-per with-dividers'>
                    <h2 class='section-title center'>
                      Related
                      <span>
                        Reading
                      </span>
                    </h2>
                    <hr class='thick neutral-light-bg partial'>

                        <?php
                    // Find Condition ID
                          foreach((get_the_category()) as $childcat) {
                            if (cat_is_ancestor_of(7, $childcat)) {
                              $catsIn[] = $childcat->cat_ID;
                            }
                          }
                    // Related Topics as a backup
                          $catsIn[] = $topicID;
                    // print_r( $catsIn );
                        ?>
                        <?php
                              $args = array(
                            'post_type'             => array( 'post', 'page' ),
                            'showposts'             => 3,
                            'category__in'          => $catsIn,
                            'ignore_sticky_posts'   => true,
                            'post__not_in'          => array( $post->ID ),
                            // 'orderby'               => 'comment_count',
                            //'order'                 => 'asc',
                            // 'date_query' => array(
                            //     array(
                            //         'after' => '1 week ago',
                            //     ),
                            // ),
                              );
                              $related = new WP_Query($args);
                          ?>
                        <?php while ( $related->have_posts() ): $related->the_post(); ?>
                          <?php
                            $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
                            if ($featured_img == '') {
                              $featured_img = get_stylesheet_directory_uri() . '/img/icons/article-img-placeholderRetina.png';
                            }
                          ?>
                          <div class='media-object with-large-image grid-element popup-content'>
                            <img alt='image title' style="width:274px; height:154px;" src='<?php echo $featured_img; ?>'>
                            <div class='popup-content-wrap'>
                              <div class='comment-counter-wrap'>
                                <a class='icon comment-counter' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                              </div>
                              <?php
                              // Display Topic
                                foreach((get_the_category()) as $childcat) {
                                  if (cat_is_ancestor_of(5, $childcat)) {
                                    echo "<a class='text-meta' href='".get_category_link($childcat->cat_ID)."'>";
                                    echo $childcat->cat_name . '</a>';
                                  }
                                }
                              ?>
                              <a class='media-copy' href='<?php echo get_permalink(); ?>'>
                                <h3 class='text-meta-header'><?php the_title(); ?></h3>
                                <p class='text-meta-sub light-text-color'>By <?php the_author(); ?><br></p>
                                <p class='text-meta-sub light-text-color sans-meta'>
                                  <?php
                                    remove_filter( 'the_excerpt', 'wpautop' );
                                    the_excerpt();
                                  ?>
                                </p>
                              </a>
                            </div>
                          </div>
                        <?php endwhile; ?>
                        <?php
                    // Reset WP_Query
                          wp_reset_query();
                        ?>

                  </section>
                </div>
                <?php comments_template(); ?>
              </section>
            </div>
          </div>
        </main>
      </div>