<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id='site-wrap-inner'>
        <main id='content-wrap' role='main'>
          <div class='inner-bounds remove-footer-offset block'>
            <header class='section-header add-bleed'>
              <h2 class='section-title left smaller'>

			<?php if ( have_posts() ) : ?>
								<span>
									<?php printf( __( 'Showing Results for: ', 'twentyfourteen' ) ); ?>
								</span>
                <?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?>

							</h2>
              <hr class='neutral-bg'>
            </header>
          </div>

        <?php
          $feature = get_post_meta( get_the_ID(), 'Feature Title', true );
          if (have_posts() && ! empty( $feature )) :
        ?>


          <div class='inner-bounds background-white card-block'>
            <div class='content-row'>
              <section class='collection grid-3-per'>
                <h2 class='section-title left smaller'>
                  <span>
                    From The blog
                  </span>
                </h2>
                <hr class='neutral-bg'>

                  <?php
                  // Start the Loop.
                  $blog = $post->post_type;
                  while ( have_posts() && $blog == 'post' ) : the_post(); ?>

                          <?php 
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', 'search' );
                          ?>

                  <?php endwhile; ?>

              </section>
            </div>
          </div>

        <?php
          endif;
          $feature = get_post_meta( get_the_ID(), 'Feature Title', true );
          $column = get_post_meta( get_the_ID(), 'Subtitle', true );
          $blog = $post->post_type;
          if (have_posts() && empty( $feature ) && ! empty( $column ) && $blog == 'page') :
        ?>

          <div class='inner-bounds background-white card-block'>
            <div class='content-row'>
              <section class='collection grid-3-per'>
                <h2 class='section-title left smaller'>
                  <span>
                    Columns & Departments
                  </span>
                </h2>
                <hr class='neutral-bg'>

                  <?php
                  // Start the Loop.
                  $feature = get_post_meta( get_the_ID(), 'Feature Title', true );
                  $column = get_post_meta( get_the_ID(), 'Subtitle', true );
                  $blog = $post->post_type;
                  while ( have_posts() && empty( $feature ) && ! empty( $column ) && $blog == 'page' ) : the_post(); ?>

                          <?php 
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', 'search' );
                          ?>

                  <?php endwhile; ?>

              </section>
            </div>
          </div>

        <?php 
          endif;
          $blog = $post->post_type;
          if (have_posts() && $blog == 'post') :
        ?>

          <div class='inner-bounds background-white card-block'>
            <div class='content-row'>
              <section class='collection grid-3-per'>
                <h2 class='section-title left smaller'>
                  <span>
                    From The blog
                  </span>
                </h2>
                <hr class='neutral-bg'>

                  <?php
                  // Start the Loop.
                  $blog = $post->post_type;
                  while ( have_posts() && $blog == 'post' ) : the_post(); ?>

                          <?php 
          									/*
          									 * Include the post format-specific template for the content. If you want to
          									 * use this in a child theme, then include a file called called content-___.php
          									 * (where ___ is the post format) and that will be used instead.
          									 */
          									get_template_part( 'content', 'search' );
                          ?>

                  <?php endwhile; ?>

              </section>
            </div>
          </div>

        <?php endif; ?>

		  		<?php
					
					// Previous/next post navigation.
					// twentyfourteen_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						//get_template_part( 'content', 'none' );
						 ?>
								Sorry, no content was found.
									</h2>
              <hr class='neutral-bg'>
            </header>
          </div>

				<?php	endif; ?>

		    <div class='inner-bounds background-white card-block'>
          <div class='content-row'>
            <h2 class='section-title left smaller'>
              Not what you were looking for? Let's try this again:
            </h2>
            <div class='form-box'>
              <form role='search' method='get' action='<?php echo site_url(); ?>'>
                <input class='input-icon' data-icon='C' type='submit' value='Search'>
                <input id='search' name='s' placeholder='What were you looking for?' type='text'>
              </form>
            </div>
          </div>
        </div>

		</main>
	</div>

<?php
get_footer();
