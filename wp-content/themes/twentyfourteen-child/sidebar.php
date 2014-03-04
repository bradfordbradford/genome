<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
	
                  <aside class='aside-column-primary'>
                    <div class='aside-block double-spaced'>
                      <header class='background-neutral'>
                        <h2 class='section-title'>
                          Top
                          <span>
                            Stories
                          </span>
                        </h2>
                      </header>
                      <ul class='featured-list'>
                        <li>
                          <div class='media-object reversed'>
                            <a class='text-meta' href='http://link/…'>science</a>
                            <div class='media-copy'>
                              <h3 class='text-meta-header small'>
                                <a href='http://link/…'>
                                  Rewriting the Brain
                                </a>
                              </h3>
                              <p class='text-meta-sub light-text-color'>
                                <a href='http://link/…'>
                                  By Author Rightspoke
                                </a>
                                <a href='http://link/…'>
                                  <span class='icon' data-icon='F'></span>
                                  3 min read
                                </a>
                              </p>
                            </div>
                          </div>
                        </li>
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
                        <li>
                          <div class='media-object reversed'>
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
                                <a href='http://link/…'>
                                  By <?php the_author(); ?>
                                </a>
                                <a href='http://link/…'>
                                  <span class='icon' data-icon='F'></span>
                                  <?php echo get_post_meta( get_the_ID(), 'Read Time', true ); ?> read
                                </a>
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
                          <img alt='image title' src='http://localhost:8888/GenomeCMS/wp-content/themes/twentyfourteen-child/img/content/cover-placeholder.jpg'>
                          <a class='text-meta' href='http://link/…'>genome magazine</a>
                          <div class='media-copy'>
                            <h3 class='text-meta-header'>NSA and Online Medical Records Privacy</h3>
                            <p class='text-meta-sub contrast'>
                              Preasent dapibd, neque id curscu faucibu  torot neq e gasut auge, eiu vluate magna opus atlas.
                            </p>
                          </div>
                          <a class='primary btn' href='http://link/…'>Subscribe</a>
                        </div>
                      </div>
                    </div>
                  </aside>