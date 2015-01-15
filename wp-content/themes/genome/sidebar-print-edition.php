<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
                  <?php
                    $args = array(
                      'post_type'             => 'current_issue',
                      'showposts'             => 1,
                      'orderby'               => 'date',
                      'order'                 => 'dsc',
                    );
                    $current = new WP_Query($args);
                  ?>
                  <?php while ( $current->have_posts() ): $current->the_post(); ?>

                    <div class='aside-block'>
                      <div class='collapse-area'>
                        <header class='background-neutral collapse-header'>
                          <h2 class='section-title'>
                            Print
                            <span>
                              Edition
                            </span>
                          </h2>
                        </header>
                        <div class='media-object with-large-image collapse-content'>
                          <?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                          <img alt='image title' src='<?php echo $featured_img; ?>'>
                          <a class='text-meta' href='#'>genome magazine</a>
                          <div class='media-copy'>
                            <h3 class='text-meta-header'><?php the_title(); ?></h3>
                            <p class='text-meta-sub contrast'>
                              <?php
                                $content = get_the_content();
                                $content = preg_replace('/<p([^>]+)?>/', '', $content, 1);
                                $content = str_replace('</p>', '', $content);
                                echo $content;
                              ?>
                            </p>
                          </div>
                          <a class='primary btn' href='https://checkout.subscriptiongenius.com/bigsciencemedia.com/' target='_blank'>Subscribe</a>
                        </div>
                      </div>
                    </div>

                  <?php endwhile; ?>
                  <?php
                  // Reset WP_Query
                    wp_reset_query();
                  ?>
