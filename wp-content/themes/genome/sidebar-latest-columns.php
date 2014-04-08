<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div class='aside-block with-top-border'>
                    <header>
                      <h2 class='section-title'>
                        Latest
                        <span>
                          Columns
                        </span>
                      </h2>
                    </header>
                    <ul class='featured-list author-list'>
                      <li>

                        <?php
                          $popular = new WP_Query( array(
                            'post_type'             => array( 'page' ),
                            'showposts'             => 3,
                            'category__not_in'      => 44,
                            'orderby'               => 'date',
                            'order'                 => 'dsc',
                            // 'tag__not_in'           => 24,
                            'meta_key'              => 'Subtitle',
                            'meta_query' => array(
                              array(
                                'key' => 'Feature Title',
                                'compare' => 'NOT EXISTS'
                              )
                            )
                          ) );
                        ?>
                        <?php while ( $popular->have_posts() ): $popular->the_post(); ?>

                          <div class='media-object author-type'>
                            <?php
                              if (function_exists('get_wp_user_avatar_src')) {
                                $avatar = get_wp_user_avatar_src($user_id);
                              } else {
                                $avatar = get_stylesheet_directory_uri() . '/img/icons/user-placeholderRetina.png';
                              }
                            ?>
                            <img alt='' class='author-pic circle' src='<?php echo $avatar; ?>'>
                            <div class='media-copy'>
                              <a href='<?php echo get_permalink(); ?>'>
                                <h3 class='author-attrib'>
                                  <?php the_author(); ?>
                                </h3>
                                <p class='text-meta-sub'>
                                  "<?php echo the_title(); ?>"
                                </p>
                              </a>
                            </div>
                          </div>

                        <?php endwhile; ?>

                      </li>
                    </ul>
                  </div>
