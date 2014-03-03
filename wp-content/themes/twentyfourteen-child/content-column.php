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
          <section class='primary_layout article_layout'>
            <div class='inner-bounds background-white block'>
              <div class='content-row'>
                <div class='content-row'>
                  <header class='article-header'>
                    <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
                      <div class="entry-meta">
                        <span class="cat-links">
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
                        </span>
                        <a href="<?php echo $topicLink; ?>"><?php echo $topicName; ?></a>
                      </div>
                    <?php endif; ?>
                    
                    <div class='text-meta light-text-color' href='http://link/…'>
                      <span class='icon' data-icon='F'></span>
                      <?php echo get_post_meta( get_the_ID(), 'Read Time', true ); ?> read
                    </div>
                    <?php the_title( '<h2>', '</h2>' ); ?>
                    
                    <p class='lead'><?php echo get_post_meta( get_the_ID(), 'Subtitle', true ); ?></p>
                    
                    <img alt='' class='load author-pic circle' data-original='/assets/img/content/author-placeholder.jpg' src='<?php echo get_wp_user_avatar_src(); ?>'>
                    <a class='author-attrib text-meta-highlight' href='http://link/…'>By <?php the_author(); ?></a>
                    <div class='article-meta'>
                      <time><?php twentyfourteen_posted_on(); ?></time>
                      <span class='ver-line'>&#124;</span>
                      <a class='action' data-icon='p' href='#1'>Print</a>
                      <span class='ver-line'>&#124;</span>
                      <a class='action' data-icon='i' href='#2'>
                        <?php
                          if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                        ?>
                        <?php comments_popup_link( __( '0', 'twentyfourteen' ), __( '1', 'twentyfourteen' ), __( '%', 'twentyfourteen' ) ); ?>
                        <?php
                          endif;

                          edit_post_link( __( ' | Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
                        ?>
                      </a>
                    </div>
                  </header>
                  <div class='article-photo primary'>
                  <?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                  
                    <img alt='' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                  </div>
                  <div class='article-photo-caption background-neutral'>
                    <div class='card-inner-wrap'>
                      <span class='photo-attrib'><?php the_post_thumbnail_description(); ?></span>
                      <p class='text-meta-sub smaller'>
                        <?php the_post_thumbnail_caption(); ?>
                        
                      </p>
                    </div>
                  </div>
                  <article class='primary-content article-body-copy'>
                    <div id='read-time-wrap'>
                      <?php
// Content
                        $content = get_the_content() . " image" ;
                        echo apply_filters('the_content',$content);
                      ?>
				
                      <?php
// Display Conditions
                        echo "Condition: ";
                        foreach((get_the_category()) as $childcat) {
                          if (cat_is_ancestor_of(7, $childcat)) {
                            echo '<a href="'.get_category_link($childcat->cat_ID).'">';
                            echo $childcat->cat_name . '</a>, ';
                          }
                        }
                      ?>

                      <?php the_tags( '<footer class="entry-meta">Tags: <span class="tag-links">', '', '</span></footer>' ); ?>
	
                      <h2>Related Reading</h2>
                       <?php
                  // Find Condition ID
                        foreach((get_the_category()) as $childcat) {
                          if (cat_is_ancestor_of(7, $childcat)) {
                  // Note: only keeps last value of many
                            $catsIn[] = $childcat->cat_ID;
                          }
                        }
                        $catsIn[] = $topicID;
                  // print_r( $catsIn );
                      ?>
                      <?php
                            $args = array(
                          'post_type'             => array( 'post' ),
                          'showposts'             => 3,
                          'category__in'          => $catsIn,
                          'ignore_sticky_posts'   => true,
                          'post__not_in'          => array( $post->ID ),
                          // 'orderby'               => 'comment_count',
                          //'order'                 => 'asc',
                          // 'date_query' => array(
                          //     array(
                          //         'after' => '1 week ago',
                          //     ),
                          // ),
                            );
                            $related = new WP_Query($args);
                        ?>
                      <?php while ( $related->have_posts() ): $related->the_post(); ?>
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                        <?php echo get_comments_number(); ?>
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a><br>
                        <?php the_author(); ?><br>
                        <?php
                  // Display Topic
                        foreach((get_the_category()) as $childcat) {
                          if (cat_is_ancestor_of(5, $childcat)) {
                            echo '<a href="'.get_category_link($childcat->cat_ID).'">';
                            echo $childcat->cat_name . '</a>';
                          }
                        }
                       ?>
                       <?php the_excerpt(); ?>
                       <br><br>
                      <?php endwhile; ?>
                      <?php
                  // Reset WP_Query
                        wp_reset_query();
                      ?>

                    </div>
                    <footer class='article-footer'>
                      <div class='content-row'>
                        <ul class='meta-list with-tags inline tags-compliment-bg'>
                          <li class='list-title'>
                            <div class='text-meta-highlight'>Condition:</div>
                          </li>
                          <li>
                            <a href='http://link/…'>Heart Attack</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Heart Disease</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Dietary Issue</a>
                          </li>
                        </ul>
                      </div>
                      <div class='content-row'>
                        <ul class='meta-list with-tags inline tags-primary-bg'>
                          <li class='list-title'>
                            <div class='text-meta-highlight'>Tags:</div>
                          </li>
                          <li>
                            <a href='http://link/…'>Medicaid</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Insurance</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Diet</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Medicaid</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Insurance</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Diet</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Medicaid</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Insurance</a>
                          </li>
                          <li>
                            <a href='http://link/…'>Diet</a>
                          </li>
                        </ul>
                      </div>
                    </footer>
                  </article>
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
                        <li>
                          <div class='media-object'>
                            <a class='text-meta' href='http://link/…'>Treatment</a>
                            <div class='media-copy'>
                              <h3 class='text-meta-header small'>
                                <a href='http://link/…'>
                                  Changing the Face of Chemo
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
                        <li>
                          <div class='media-object'>
                            <a class='text-meta' href='http://link/…'>Treatment</a>
                            <div class='media-copy'>
                              <h3 class='text-meta-header small'>
                                <a href='http://link/…'>
                                  Changing the Face of Chemo
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
                          <img alt='image title' src='/assets/img/content/cover-placeholder.jpg'>
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
                </div>
              </div>
              <div class='content-row end-block block'>
                <section class='collection grid-3-per with-dividers'>
                  <h2 class='section-title center'>
                    Related
                    <span>
                      Reading
                    </span>
                  </h2>
                  <hr class='thick neutral-light-bg partial'>
                  <div class='media-object with-large-image grid-element popup-content'>
                    <img alt='image title' src='/assets/img/content/th-feature-placeholder.jpg'>
                    <div class='popup-content-wrap'>
                      <div class='comment-counter-wrap'>
                        <a class='icon comment-counter' href=''>
                          <span class='value'>6</span>
                        </a>
                      </div>
                      <a class='text-meta' href='http://link/…'>Research</a>
                      <a class='media-copy' href='http://link/…'>
                        <h3 class='text-meta-header'>Reworking Your Genetic Puzzle</h3>
                        <p class='text-meta-sub light-text-color'>By Authur Righter</p>
                        <p class='text-meta-sub light-text-color sans-meta'>
                          Mauris suscipit ligula orci, eu pharetra nunc mattis in. Vestibulum tortor dolor…
                        </p>
                      </a>
                    </div>
                  </div>
                  <div class='media-object with-large-image grid-element popup-content'>
                    <img alt='image title' src='/assets/img/content/th-feature-placeholder-3.jpg'>
                    <div class='popup-content-wrap'>
                      <div class='comment-counter-wrap'>
                        <a class='icon comment-counter' href=''>
                          <span class='value'>6</span>
                        </a>
                      </div>
                      <a class='text-meta' href='http://link/…'>Science</a>
                      <a class='media-copy' href='http://link/…'>
                        <h3 class='text-meta-header'>Rewriting the Brain</h3>
                        <p class='text-meta-sub light-text-color'>By Authur Righter</p>
                        <p class='text-meta-sub light-text-color sans-meta'>
                          A discussion of the original 1987 film considers its place in the canon of 1980s action films, and ponders whethe…
                        </p>
                      </a>
                    </div>
                  </div>
                  <div class='media-object with-large-image grid-element popup-content'>
                    <img alt='image title' src='/assets/img/content/th-feature-placeholder-2.jpg'>
                    <div class='popup-content-wrap'>
                      <div class='comment-counter-wrap'>
                        <a class='icon comment-counter' href=''>
                          <span class='value'>6</span>
                        </a>
                      </div>
                      <a class='text-meta' href='http://link/…'>Treatment</a>
                      <a class='media-copy' href='http://link/…'>
                        <h3 class='text-meta-header'>Changing the Face of Chemo</h3>
                        <p class='text-meta-sub light-text-color'>By Authur Righter</p>
                        <p class='text-meta-sub light-text-color sans-meta'>
                          Mauris suscipit ligula orci, eu pharetra nunc mattis in. Vestibulum tortor dolor…
                        </p>
                      </a>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </main>
      </div>