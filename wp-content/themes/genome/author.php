<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id='site-wrap-inner'>
        <main id='content-wrap' role='main'>
          <section class='primary_layout article_layout no-photo'>
            <div class='inner-bounds block background-white'>
              <div class='content-row'>
                <section class='primary-content'>

								<?php if ( have_posts() ) : ?>

                  <ul class='roll-list slats'>

                    <li class='title'>
                      <div class='media-object with-med-image'>
                        <?php
                        	if (function_exists('get_wp_user_avatar_src')) {
														$avatar = get_wp_user_avatar_src($author->id);
													} else {
														$avatar = get_stylesheet_directory_uri() . '/img/icons/user-placeholderRetina.png';
													}
                        ?>
                        <img alt='' class='load author-pic' data-original='<?php echo $avatar; ?>' src='<?php echo $avatar; ?>'>
                        <div class='media-copy'>
                          <h2 class='text-meta-header' href='#'>
                            <?php the_author_meta( 'display_name' ); ?>
                          </h2>
                          <p class='sans'>
                            <?php if ( get_the_author_meta( 'description' ) ) : ?>
															<?php the_author_meta( 'description' ); ?>
														<?php endif; ?>
                          </p>
                        </div>
                      </div>
                    </li>

										<?php
											/*
											 * Queue the first post, that way we know what author
											 * we're dealing with (if that is the case).
											 *
											 * We reset this later so we can run the loop properly
											 * with a call to rewind_posts().
											 */

											//the_post();
										?>
				

										<?php
											/*
											 * Since we called the_post() above, we need to rewind
											 * the loop back to the beginning that way we can run
											 * the loop properly, in full.
											 */
											rewind_posts();

											// Start the Loop.
											while ( have_posts() ) : the_post();

												$feature = get_post_meta( get_the_ID(), 'Feature Title', true );
          							$column = get_post_meta( get_the_ID(), 'Subtitle', true );

												if ( !empty($feature) || !empty($column) ) {
													/*
												 * Include the post format-specific template for the content. If you want to
												 * use this in a child theme, then include a file called called content-___.php
												 * (where ___ is the post format) and that will be used instead.
												 */
												get_template_part( 'content', 'list' );

												} else {
													
												}

										?>

                    <?php
												endwhile;
												// Previous/next page navigation.
												//paging_nav();

											else :
												// If no content, include the "No posts found" template.
												get_template_part( 'content', 'none' );

											endif;
										?>

                  </ul>
                  
                </section>
              </div>
            </div>
          </section>
        </main>
      </div>

<?php
get_footer();
