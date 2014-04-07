<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
                    <li class='media-object-horizontal-layout'>
                      <div class='content-row'>
                        <header>
                          <?php
                      // Display Topic
                            foreach((get_the_category()) as $childcat) {
                              if (cat_is_ancestor_of(5, $childcat)) {
                                echo "<a class='text-meta' href='".get_category_link($childcat->cat_ID)."'>";
                                echo $childcat->cat_name . '</a>';
                              }
                            }
                          ?>
                          <h3 class='text-meta-header'><?php the_title(); ?></h3>
                          <p class='text-meta-sub light-text-color'>
                            <a href='<?php echo site_url() . "/author/" . get_the_author_meta( 'user_nicename' ); ?>'>By <?php the_author(); ?></a>
                            <span class='interpunct'>&#183</span>
                            <?php echo get_the_time('F j, Y'); ?>
                            <span class='interpunct'>&#183</span>
                            <span class='icon' data-icon='A'></span>
                            <span class='share-count'>getting shares &hellip;</span>
                          </p>
                        </header>
                      </div>
                      <div class='grid-2-per major-r'>
                        <div class='grid-element image-content'>
                          <?php
                            $featured_img = wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
                            if ($featured_img == '') {
                              $featured_img = get_stylesheet_directory_uri() . '/img/icons/article-img-placeholderRetina.png';
                            }
                          ?>
                          <img alt='image title' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                        </div>
                        <div class='grid-element'>
                          <div class='media-copy'>
                            <p class='text-meta-sub'>
                              <?php
                                remove_filter( 'the_excerpt', 'wpautop' );
                                the_excerpt();
                              ?>
                              <a class='text-meta continue-reading' href='<?php echo get_permalink(); ?>'>
                                Continue Reading
                                <span class='double-quote-right'>
                                  &#187;
                                </span>
                              </a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </li>