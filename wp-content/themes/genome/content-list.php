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

                    <li>
                      <div class='media-object-horizontal-layout'>
                        <header>
                          <h4 class='text-meta-header'><?php the_title(); ?></h4>
                          <p class='text-meta-sub light-text-color'>
                            <?php echo get_the_time('F j, Y'); ?>
                          </p>
                        </header>
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
                    </li>