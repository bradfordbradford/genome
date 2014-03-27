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

                  <div class='aside-block with-top-border'>
                    <header>
                      <h2 class='section-title'>
                        Current
                        <span>
                          Issue
                        </span>
                      </h2>
                    </header>
                    <div class='media-object with-large-image'>
                      <?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                      <img alt='' src='<?php echo $featured_img; ?>'>
                      <a class='text-meta' href='#'>issue <?php echo get_post_meta( get_the_ID(), 'current_issue', true ); ?></a>
                      <div class='media-copy'>
                        <h3 class='text-meta-header'><?php the_title(); ?></h3>
                        <p class='text-meta-sub contrast sans-meta'>
                          <?php
                            remove_filter( 'the_excerpt', 'wpautop' );
                            the_excerpt();
                          ?>
                        </p>
                      </div>
                      <a class='special primary btn icon-glasses' href='https://www.google.com/'>
                        <span>
                          Explore this Issue
                        </span>
                      </a>
                    </div>
                  </div>

                  <?php endwhile; ?>
                  <?php
                  // Reset WP_Query
                    wp_reset_query();
                  ?>