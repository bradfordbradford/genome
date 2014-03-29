<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

                    <div class='aside-block double-spaced'>
                      <header class='background-neutral'>
                        <h2 class='section-title'>
                          Most
                          <span>
                            Popular
                          </span>
                        </h2>
                      </header>
                      <ul class='featured-list with-shares'>
                        <?php
                          $popular = new WP_Query( array(
                            'post_type'             => array( 'post' ),
                            'showposts'             => 3,
                            // 'cat'                   => 'MyCategory',
                            'ignore_sticky_posts'   => true,
                            'orderby'               => 'comment_count',
                            'order'                 => 'dsc',
                            // 'date_query' => array(
                            //     array(
                            //         'after' => '1 week ago',
                            //     ),
                            // ),
                          ) );
                        ?>
                        <?php while ( $popular->have_posts() ): $popular->the_post(); ?>
                        <li class='rte-remote' data-file='<?php echo get_permalink(); ?>' data-target='#rte-target'>
                          <div class='media-object'>
                            <?php
                            // Display Topic
                              foreach((get_the_category()) as $childcat) {
                                if (cat_is_ancestor_of(5, $childcat)) {
                                  echo "<a class='text-meta' href='".get_category_link($childcat->cat_ID)."'>";
                                  echo $childcat->cat_name . "</a>";
                                }
                              }
                            ?>
                            <div class='media-copy'>
                              <h3 class='text-meta-header small'>
                                <a href='<?php echo get_permalink(); ?>'>
                                  <?php the_title(); ?>
                                </a>
                              </h3>
                              <p class='text-meta-sub light-text-color'>
                                <a href='<?php echo site_url() . "/author/" . get_the_author_meta( 'user_nicename' ); ?>'>
                                  By <?php the_author(); ?>
                                </a>
                                <span class='action' data-icon='F' href='#'>
                                  <span class='eta'>&hellip;</span>
                                </span>
                              </p>
                            </div>
                          </div>
                        </li>
                        <?php
                          endwhile;
                          wp_reset_query();
                        ?>
                      </ul>
                    </div>
