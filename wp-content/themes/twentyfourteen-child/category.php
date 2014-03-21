<?php
/**
 * The template for displaying Category pages
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
          <section class='primary_layout article_layout'>
            <div class='inner-bounds block background-white'>
              <div class='content-row'>
                <section class='primary-content'>
                  <ul class='featured-list roll-list with-shares'><?php if ( have_posts() ) : ?>
											<?php // printf( __( 'Category Archives: %s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?><?php
	// Show an optional term description.
	$term_description = term_description();
	if ( ! empty( $term_description ) ) :
		printf( '<div class="taxonomy-description">%s</div>', $term_description );
	endif;
?>

		    <?php
												// Start the Loop.
												while ( have_posts() ) : the_post();

												/*
												 * Include the post format-specific template for the content. If you want to
												 * use this in a child theme, then include a file called called content-___.php
												 * (where ___ is the post format) and that will be used instead.
												 */
												get_template_part( 'content', get_post_format() );

												endwhile;
												// Previous/next page navigation.
												twentyfourteen_paging_nav();

											else :
												// If no content, include the "No posts found" template.
												get_template_part( 'content', 'none' );

											endif;
										?>

  		  </ul>
		</section><?php
		get_sidebar( 'archive' );
		?>


	      </div>
      </div>
	  </section>
 </main>
</div>

<?php
get_footer();
