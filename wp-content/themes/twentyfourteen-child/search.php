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
									<?php printf( __( 'Search Results for: ', 'twentyfourteen' ) ); ?>
								</span>
			<?php printf( __( '%s', 'twentyfourteen' ), get_search_query() ); ?>

							</h2>
              <hr class='neutral-bg'>
            </header>
          </div>
          <div class='inner-bounds background-white card-block'>
            <div class='content-row'>
              <section class='collection grid-3-per'>
                <h2 class='section-title left smaller'>
                  <span>
                    Features
                  </span>
                </h2>
                <hr class='neutral-bg'>

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

						?>
									  </section>
			</div>
		  </div>
		  		<?php
					endwhile;
					
					// Previous/next post navigation.
					twentyfourteen_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						//get_template_part( 'content', 'none' );
						 ?>
								Sorry, no content was found.
									</h2>
              <hr class='neutral-bg'>
            </header>
          </div>

				<?php	endif;
				?>

		    <div class='inner-bounds background-white card-block'>
          <div class='content-row'>
            <h2 class='section-title left smaller'>
              Not what you were looking for? Let's try this again:
            </h2>
            <div class='form-box'>
              <form action=''>
                <a class='input-icon' data-icon='C' href='#'></a>
                <input id='search' placeholder='What were you looking for?' type='text'>
              </form>
            </div>
          </div>
        </div>

		</main>
	</div>

<?php
get_footer();
