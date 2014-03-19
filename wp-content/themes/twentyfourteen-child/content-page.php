<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

	<div id='site-wrap-inner'>
	<main id='content-wrap' role='main'>
	  <section class='primary_layout article_layout no-photo'>
	    <div class='inner-bounds block background-white'>
	      <div class='content-row'>
	        <header class='article-header'>
	          <h2><?php the_title(); ?></h2>
	        </header>
	      </div>
	      <div class='content-row'>
	        <article class='primary-content article-body-copy'>

						<?php
							the_content();
						?>

                </article>
                <?php get_sidebar( 'utility' ); ?>

              </div>
            </div>
          </section>
        </main>
      </div>