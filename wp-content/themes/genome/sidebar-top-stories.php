<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div class='aside-block <?php if (is_front_page()) { echo "with-top-border"; } else { echo "double-spaced"; } ?>'>
                    <header>
                      <h2 class='section-title'>
                        Top
                        <span>
                          Stories
                        </span>
                      </h2>
                    </header>
                    <ul class='featured-list with-shares'>

                    <?php
                      $popular = new WP_Query( array(
                        'post_type'             => array( 'page', 'post' ),
                        'showposts'             => 3,
                        // 'cat'                   => 'MyCategory',
                        'orderby'               => 'date',
                        'order'                 => 'dsc',
                        'tag'                   => 'top-story',
                        'tag__not_in'           => 24,
                      ) );
                    ?>
                    <?php while ( $popular->have_posts() ): $popular->the_post(); ?>

                      <li>
                        <div class='media-object'>
                          <?php
                            // Get Topic Info
                            foreach((get_the_category()) as $childcat) {
                              if (cat_is_ancestor_of(5, $childcat)) {
                                $topicLink = get_category_link($childcat->cat_ID);
                                $topicName = $childcat->cat_name;
                                $topicID   = $childcat->cat_ID;
                              }
                            }
                          ?>
                          <a class='text-meta' href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                          <div class='media-copy'>
                            <h3 class='text-meta-header small'>
                              <a href='<?php echo get_permalink(); ?>'>
                                <?php echo the_title(); ?>
                              </a>
                            </h3>
                            <p class='text-meta-sub light-text-color'>
                              <a href='<?php echo site_url() . "/author/" . get_the_author_meta( 'user_nicename' ); ?>'>
                                By <?php the_author(); ?>
                              </a>
                              <a href=''>
                                <span class='icon' data-icon='A'></span>
                                <span class='share-count'>getting shares &hellip;</span>
                              </a>
                            </p>
                          </div>
                        </div>
                      </li>

                    <?php endwhile; ?>

                      <div class='view-all'>
                        <a class='italic serif smaller' href='#'>
                          View All &#187;
                        </a>
                      </div>
                    </ul>
                  </div>