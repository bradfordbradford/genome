<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id='site-wrap-inner'>
        <main id='content-wrap' role='main'>
          <header class='hero hero-featured-article background-size-full center'>

          <?php // Get Issue #
            $args = array(
              'post_type' => 'current_issue',
              'orderby'   => 'date',
              'order'     => 'dsc',
              'showposts' => 1,
            );

            // The Query
            $the_query = new WP_Query( $args );

            // Not an acutal Loop, only display the most recent values
            //print_r($the_query);
            while ( $the_query->have_posts() ): $the_query->the_post();
              $issue = get_post_meta( get_the_ID(), 'issue_number', true );
              $issueLink = get_post_meta( get_the_ID(), 'issue_link', true );
            endwhile;
          ?>

        	<?php
        		$args = array(
        			'post_type' => 'page',
        			'tag'				=> 'homepage',
        			'orderby'   => 'date',
              'order'     => 'dsc'
        		);

						// The Query
						$the_query = new WP_Query( $args );

						// Not an acutal Loop, only display the most recent values
						//print_r($the_query);
						while ( $the_query->have_posts() ): $the_query->the_post();
						  $url = get_permalink();
							$author = the_author();
							$subtitle = get_post_meta( get_the_ID(), 'Subtitle', true );
	            $title = get_post_meta( get_the_ID(), 'Feature Title', true );
              $title = nl2br($title);
              $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
              if( class_exists('Dynamic_Featured_Image') ) {
                global $dynamic_featured_image;
                  $featured_images = $dynamic_featured_image->get_featured_images( $postId );
                  //print_r($featured_images);
                  $featured_img_2 = $featured_images[0][full];
               }
						endwhile;

						// If there isn't a permalink, fallback
						if ($url != '') :

						?>

            <div class='story-cover-content single-col-layout'>
              <div class='align-middle'>
                <div class='align-block'>
                  <a class='cover-content-inner' data-0='top:0px;' data-500='top:-40px;' href='<?php echo $url; ?>'>
                    <div class='text-meta hr'>
                      issue <?php echo $issue; ?>

                    </div>
                    <h2>
                      <?php echo $title; ?>

                    </h2>
                    <hr class='white-bg partial'>
                    <p class='sans lead'>
                      <?php echo $subtitle; ?>

                    </p>
                    <div class='author-attrib text-meta-highlight'>By <?php echo $author; ?></div>
                  </a>
                </div>
              </div>
            </div>
            <a class='arrow-down alternate' href=''></a>
            <div class='story-cover-image' data-0='opacity:1;' data-140='opacity:0;' style='background-image: url(<?php echo $featured_img; ?>);'></div>
            <div class='story-cover-image-transition' style='background-image: url(<?php echo $featured_img_2; ?>);'></div>

					<?php else : ?>
								
            <div class='story-cover-content single-col-layout'>
              <div class='align-middle'>
                <div class='align-block'>
                  <a class='cover-content-inner' data-0='top:0px;' data-500='top:-40px;' href='<?php echo site_url(); ?>/targeted-treatment/'>'>
                    <div class='text-meta hr'>
                      issue 01
                    </div>
                    <h2>
                      Targeted
                      <br>
                      Treatment
                    </h2>
                    <hr class='white-bg partial'>
                    <p class='sans lead'>
                      How Personalized Medicine is developing health care tailored to your unique genetic blueprint — and how that affects you today.
                    </p>
                    <div class='author-attrib text-meta-highlight'>By Genome Magazine</div>
                  </a>
                </div>
              </div>
            </div>
            <a class='arrow-down alternate' href=''></a>
            <div class='story-cover-image' data-0='opacity:1;' data-140='opacity:0;'></div>
            <div class='story-cover-image-transition'></div>

					<?php

						endif;
						/* Restore original Post Data */
						wp_reset_postdata();
					?>

          </header>
          <section class='primary_layout' id='top'>
            <div class='inner-bounds block'>
              <div class='content-row'>
                <section class='primary-content'>            	

			          <?php
		              $popular = new WP_Query( array(
		                'post_type'             => array( 'page' ),
		                'showposts'             => 1,
		                // 'cat'                   => 'MyCategory',
		                'orderby'               => 'date',
		                'order'                 => 'dsc',
		                'tag__not_in'           => 24,
		                'meta_key'              => 'Feature Title',
		              ) );
		            ?>
		            <?php while ( $popular->have_posts() ): $popular->the_post(); ?>
                  <div class='content-row'>
                    <div class='content-block'>
                      <div class='featured-article'>
                        <div class='article-photo primary'>
                        	<?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                          <img alt='' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                        </div>
                        <header class='article-header'>
                          <div class='text-meta'>
                            <?php 
	                            foreach((get_the_category()) as $childcat) {
	                              if (cat_is_ancestor_of(5, $childcat)) {
	                                $topicLink = get_category_link($childcat->cat_ID);
	                                $topicName = $childcat->cat_name;
	                                $topicID   = $childcat->cat_ID;
	                              }
	                            }
                          	?><a href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                            <time><?php echo get_the_time('F j, Y'); ?></time>
                          </div>
                          <h2>
                            <a href='<?php echo get_permalink(); ?>'>
                              <?php echo the_title(); ?>
                            </a>
                          </h2>
                          <a class='text-meta-sub light-text-color' href='#'>
                            By <?php the_author(); ?>
                          </a>
                          <p>
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
                        </header>
                      </div>
                    </div>
                  </div>

                <?php endwhile; ?>

                  <div class='content-row'>
                    <section class='collection grid-2-per content-block'>

					          <?php
				              $popular = new WP_Query( array(
				                'post_type'             => array( 'page' ),
				                'showposts'             => 2,
				                // 'cat'                   => 'MyCategory',
				                'orderby'               => 'date',
				                'order'                 => 'dsc',
				                'meta_key'              => 'Subtitle',
                        'meta_query' => array(
                          array(
                            'key' => 'Feature Title',
                            'compare' => 'NOT EXISTS'
                          )
                        )
				                // 'offset'                => 2,
				              ) );
				            ?>
				            <?php while ( $popular->have_posts() ): $popular->the_post(); ?>

                      <div class='media-object with-large-image grid-element popup-content'>
                      	<?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                        <img alt='image title' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                        <div class='popup-content-wrap'>
                          <div class='comment-counter-wrap'>
                            <a class='icon comment-counter' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                          </div>
                          <?php 
                            foreach((get_the_category()) as $childcat) {
                              if (cat_is_ancestor_of(5, $childcat)) {
                                $topicLink = get_category_link($childcat->cat_ID);
                                $topicName = $childcat->cat_name;
                                $topicID   = $childcat->cat_ID;
                              }
                            }
                        	?>
                          <a class='text-meta' href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                          <a class='media-copy' href='<?php echo get_permalink(); ?>'>
                            <h3 class='text-meta-header'><?php echo the_title(); ?></h3>
                            <p class='text-meta-sub light-text-color'>By <?php the_author(); ?></p>
                            <p class='text-meta-sub light-text-color sans-meta'>
                              <?php
                              	remove_filter( 'the_excerpt', 'wpautop' );
                              	the_excerpt();
                            	?>
                            </p>
                          </a>
                        </div>
                      </div>

                    <?php endwhile; ?>
                      
                    </section>
                  </div>

                			          <?php
		              $popular = new WP_Query( array(
		                'post_type'             => array( 'page' ),
		                'showposts'             => 1,
		                // 'cat'                   => 'MyCategory',
		                'orderby'               => 'date',
		                'order'                 => 'dsc',
		                'tag__not_in'           => 24,
		                'meta_key'              => 'Feature Title',
		                'offset'                => 1,
		              ) );
		            ?>
		            <?php while ( $popular->have_posts() ): $popular->the_post(); ?>
                  <div class='content-row'>
                    <section class='grid-2-per content-block'>
                      <div class='media-object-horizontal-layout'>
                        <div class='grid-element image-content'>
                        	<?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                          <img alt='image title' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                          <div class='comment-counter-wrap'>
                            <a class='icon comment-counter' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                          </div>
                        </div>
                        <div class='grid-element'>
                          <?php 
                            foreach((get_the_category()) as $childcat) {
                              if (cat_is_ancestor_of(5, $childcat)) {
                                $topicLink = get_category_link($childcat->cat_ID);
                                $topicName = $childcat->cat_name;
                                $topicID   = $childcat->cat_ID;
                              }
                            }
                        	?><a class='text-meta' href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                          <div class='media-copy'>
                            <h3 class='text-meta-header'>
                              <a href='<?php echo get_permalink(); ?>'>
                                <?php echo the_title(); ?>
                              </a>
                            </h3>
                            <p class='text-meta-sub light-text-color'>By <?php the_author(); ?></p>
                            <p class='text-meta-sub light-text-color sans-meta'>
                              <?php
                              	remove_filter( 'the_excerpt', 'wpautop' );
                              	the_excerpt();
                            	?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>

                <?php endwhile; ?>

			          <?php
		              $popular = new WP_Query( array(
		                'post_type'             => array( 'page' ),
		                'showposts'             => 1,
		                // 'cat'                   => 'MyCategory',
		                'orderby'               => 'date',
		                'order'                 => 'dsc',
		                'tag__not_in'           => 24,
		                'meta_key'              => 'Feature Title',
		                'offset'                => 2,
		              ) );
		            ?>
		            <?php while ( $popular->have_posts() ): $popular->the_post(); ?>
                  <div class='content-row'>
                    <div class='content-block'>
                      <div class='featured-article'>
                        <div class='article-photo primary'>
                        	<?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                          <img alt='' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                        </div>
                        <header class='article-header'>
                          <div class='text-meta'>
                            <?php 
	                            foreach((get_the_category()) as $childcat) {
	                              if (cat_is_ancestor_of(5, $childcat)) {
	                                $topicLink = get_category_link($childcat->cat_ID);
	                                $topicName = $childcat->cat_name;
	                                $topicID   = $childcat->cat_ID;
	                              }
	                            }
                          	?><a href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                            <time><?php echo get_the_time('F j, Y'); ?></time>
                          </div>
                          <h2>
                            <a href='<?php echo get_permalink(); ?>'>
                              <?php echo the_title(); ?>
                            </a>
                          </h2>
                          <a class='text-meta-sub light-text-color' href='#'>
                            By <?php the_author(); ?>
                          </a>
                          <p>
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
                        </header>
                      </div>
                    </div>
                  </div>

                <?php endwhile; ?>

                  <div class='content-row'>
                    <section class='collection grid-2-per content-block'>

					          <?php
				              $popular = new WP_Query( array(
				                'post_type'             => array( 'page' ),
				                'showposts'             => 2,
				                // 'cat'                   => 'MyCategory',
				                'orderby'               => 'date',
				                'order'                 => 'dsc',
				                'meta_key'              => 'Subtitle',
                        'meta_query' => array(
                          array(
                            'key' => 'Feature Title',
                            'compare' => 'NOT EXISTS'
                          )
                        ),
				                'offset'                => 2,
				              ) );
				            ?>
				            <?php while ( $popular->have_posts() ): $popular->the_post(); ?>

                      <div class='media-object with-large-image grid-element popup-content'>
                      	<?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                        <img alt='image title' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                        <div class='popup-content-wrap'>
                          <div class='comment-counter-wrap'>
                            <a class='icon comment-counter' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                          </div>
                          <?php 
                            foreach((get_the_category()) as $childcat) {
                              if (cat_is_ancestor_of(5, $childcat)) {
                                $topicLink = get_category_link($childcat->cat_ID);
                                $topicName = $childcat->cat_name;
                                $topicID   = $childcat->cat_ID;
                              }
                            }
                        	?>
                          <a class='text-meta' href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                          <a class='media-copy' href='<?php echo get_permalink(); ?>'>
                            <h3 class='text-meta-header'><?php echo the_title(); ?></h3>
                            <p class='text-meta-sub light-text-color'>By <?php the_author(); ?></p>
                            <p class='text-meta-sub light-text-color sans-meta'>
                              <?php
                              	remove_filter( 'the_excerpt', 'wpautop' );
                              	the_excerpt();
                            	?>
                            </p>
                          </a>
                        </div>
                      </div>

                    <?php endwhile; ?>

                    </section>
                  </div>
                  <div class='content-row add-padding-b'>
                    <a class='btn primary full-bleed' href='<?php echo $issueLink; ?>'>View All From This Issue</a>
                  </div>

                </section>
                <aside class='aside-column-primary'>
                	<?php get_sidebar( 'current-issue' ); ?>
                  <?php get_sidebar( 'blog-stories' ); ?>
                  <?php get_sidebar( 'top-stories' ); ?>
                  <?php get_sidebar( 'latest-columns' ); ?>
                </aside>
              </div>
            </div>
          </section>
        </main>
      </div>

<?php
get_footer();
