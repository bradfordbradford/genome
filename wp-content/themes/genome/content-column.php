<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
    <?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
    <?php if (!empty($featured_img)) : // If there is a featured image ?>
      <div id='site-wrap-inner'>
        <main id='content-wrap' role='main'>
          <section class='primary_layout article_layout'>
            <div class='inner-bounds background-white block'>
              <div class='content-row'>
                <div class='content-row'>
                  <header class='article-header'>
                    <?php
// Get Topic Info
                      foreach((get_the_category()) as $childcat) {
                        if (cat_is_ancestor_of(5, $childcat)) {
                          $topicLink = get_category_link($childcat->cat_ID);
                          $topicName = $childcat->cat_name;
                          $topicID   = $childcat->cat_ID;
                        }
                      }
                      if ($topicLink) {
                        echo "<a class='text-meta brick' href='" . $topicLink . "'>" . $topicName . "</a>";
                      }
                    ?>
                    <div class='text-meta light-text-color' href='http://link/…'>
                      <span class='icon' data-icon='F'></span>
                      <span class="eta-time"></span>
                    </div>
                    <?php the_title( '<h2>', '</h2>' ); ?>

                    <p class='lead'><?php echo get_post_meta( get_the_ID(), 'Subtitle', true ); ?></p>
                    <?php
                      $user_id = get_the_author_meta('ID');
                      if (has_wp_user_avatar($user_id)) {
                        $avatar = get_wp_user_avatar_src($user_id);
                        echo "<img alt='' class='load author-pic circle' data-original='" . $avatar . "' src='" . $avatar . "'>";
                      }
                    ?>
                    <a class='author-attrib text-meta-highlight' href='<?php echo site_url() . "/author/" . get_the_author_meta( 'user_nicename' ); ?>'>By <?php the_author(); ?></a>

                    <div class='addthis_toolbox social-list'>
                      <a class='addthis_button_facebook' data-icon='u' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                        <span class='line'></span>
                        <span class='value'>Share</span>
                      </a>
                      <a class='addthis_button_twitter' data-icon='v' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                        <span class='line'></span>
                        <span class='value'>Tweet</span>
                      </a>
                      <a class='addthis_button_linkedin' data-icon='w' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                        <span class='line'></span>
                        <span class='value'>LinkedIn</span>
                      </a>
                      <a class='addthis_button_google_plusone_share' data-icon='O' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                        <span class='line'></span>
                        <span class='value'>Google Plus</span>
                      </a>
                      <a class='addthis_button_email' data-icon='h' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                        <span class='line'></span>
                        <span class='value'>Email</span>
                      </a>
                    </div>

                    <div class='article-meta'>
                      <time><?php echo get_the_time('F j, Y'); ?></time>
                      <span class='ver-line'>&#124;</span>
                      <a class='action' data-icon='p' href='javascript:window.print()'>Print</a>
                      <span class='ver-line'>&#124;</span>
                      <a class='action' data-icon='i' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                      <?php edit_post_link( __( ' | Edit', '' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                  </header>

                  <div class='article-photo primary'>
                    <img alt='' class='load' data-original='<?php echo $featured_img; ?>' src='<?php echo $featured_img; ?>'>
                  </div>
                <?php if (the_post_thumbnail_description() || the_post_thumbnail_caption()) : ?>
                  <div class='article-photo-caption background-neutral'>
                    <div class='card-inner-wrap'>
                      <span class='photo-attrib'><?php echo the_post_thumbnail_description(); ?></span>
                      <p class='text-meta-sub smaller'>
                        <?php echo the_post_thumbnail_caption(); ?>

                      </p>
                    </div>
                  </div>
                <?php endif; ?>
    <?php else: // If no featured image ?>
      <div id='site-wrap-inner'>
        <main id='content-wrap' role='main'>
          <section class='primary_layout article_layout no-photo'>
            <div class='inner-bounds background-white block'>
              <div class='content-row'>
                <div class='content-row'>
                  <header class='article-header'>
                    <?php
// Get Topic Info
                      foreach((get_the_category()) as $childcat) {
                        if (cat_is_ancestor_of(5, $childcat)) {
                          $topicLink = get_category_link($childcat->cat_ID);
                          $topicName = $childcat->cat_name;
                          $topicID   = $childcat->cat_ID;
                        }
                      }
                      if ($topicLink) {
                        echo "<a class='text-meta brick' href='" . $topicLink . "'>" . $topicName . "</a>";
                      }
                    ?>
                    <div class='text-meta light-text-color' href='http://link/…'>
                      <span class='icon' data-icon='F'></span>
                      <span class="eta-time"></span>
                    </div>
                    <?php the_title( '<h2>', '</h2>' ); ?>

                    <p class='lead'><?php echo get_post_meta( get_the_ID(), 'Subtitle', true ); ?></p>
                    <div class='hide-above-tablet-p'>
                      <?php
                        $user_id = get_the_author_meta('ID');
                        if (has_wp_user_avatar($user_id)) {
                          $avatar = get_wp_user_avatar_src($user_id);
                          echo "<img alt='' class='load author-pic circle' data-original='" . $avatar . "' src='" . $avatar . "'>";
                        }
                      ?>
                      <a class='author-attrib text-meta-highlight' href='<?php echo site_url() . "/author/" . get_the_author_meta( 'user_nicename' ); ?>'>By <?php the_author(); ?></a>

                      <div class='addthis_toolbox social-list'>
                        <a class='addthis_button_facebook' data-icon='u' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                          <span class='line'></span>
                          <span class='value'>Share</span>
                        </a>
                        <a class='addthis_button_twitter' data-icon='v' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                          <span class='line'></span>
                          <span class='value'>Tweet</span>
                        </a>
                        <a class='addthis_button_linkedin' data-icon='w' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                          <span class='line'></span>
                          <span class='value'>LinkedIn</span>
                        </a>
                        <a class='addthis_button_google_plusone_share' data-icon='O' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                          <span class='line'></span>
                          <span class='value'>Google Plus</span>
                        </a>
                        <a class='addthis_button_email' data-icon='h' href='<?php echo $_SERVER['REQUEST_URI']; ?>'>
                          <span class='line'></span>
                          <span class='value'>Email</span>
                        </a>
                      </div>
                    </div>
                    <div class='article-meta'>
                      <div class='left'>
                        <time><?php echo get_the_time('F j, Y'); ?></time>
                      </div>
                      <div class="right">
                        <a class='action' data-icon='p' href='javascript:window.print()'>Print</a>
                        <span class='ver-line'>&#124;</span>
                        <a class='action' data-icon='i' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                        <?php edit_post_link( __( ' | Edit', '' ), '<span class="edit-link">', '</span>' ); ?>
                      </div>
                    </div>
                  </header>
    <?php endif; // Featured image logic. Begin article content ?>
                  <article class='primary-content article-body-copy'>
                    <div id='rte-target'>
                      <span class='eta'></span>
                      <?php
// Content
                        $content = get_the_content();
                        $content .= " <span class='light-text-color inline-block end-mark' data-icon='G'></span>" ;
                        $content = apply_filters('the_content',$content);
                        $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="lead-with-drop-cap">', $content, 1);
                        //$content = apply_filters('first_paragraph',$content);
                        //add_filter('the_content', 'first_paragraph');
                        echo $content;
                      ?>

                    </div>
                    <footer class='article-footer'>
                      <?php
                        foreach((get_the_category()) as $childcat) {
                          if (cat_is_ancestor_of(7, $childcat)) {
                            $cats[] .= $childcat->cat_name;
                          }
                        }
                      ?>
                      <?php if (!empty($cats)) : // if Condition ?>
                      <div class='content-row'>
                        <ul class='meta-list with-tags inline tags-compliment-bg'>
                          <li class='list-title'>
                            <div class='text-meta-highlight'>Condition:</div>
                          </li>
                          <?php
// Display Conditions
                            foreach((get_the_category()) as $childcat) :
                              if (cat_is_ancestor_of(7, $childcat)) : ?>
                                <li><a href="<?php echo get_category_link($childcat->cat_ID); ?>">
                                <?php echo $childcat->cat_name; ?></a></li>
                          <?php
                              endif;
			                      endforeach;
                          ?>
                        </ul>
                      </div>
                      <?php endif; ?>
                      <?php if (has_tag()) : // if Tags ?>
                      <div class='content-row'>
                        <ul class='meta-list with-tags inline tags-primary-bg'>
                          <li class='list-title'>
                            <div class='text-meta-highlight'>Tags:</div>
                          </li>
                          <?php the_tags('<li>','</li><li>','</li>'); ?>
                        </ul>
                      </div>
                      <?php endif; ?>
                    </footer>
                  </article>
                  <aside class='aside-column-primary'>
                    <?php get_sidebar( 'top-stories' ); ?>
                    <?php get_sidebar( 'print-edition' ); ?>
                  </aside>
                </div>
              </div>
              <?php
          // Find Condition ID
                foreach((get_the_category()) as $childcat) {
                  if (cat_is_ancestor_of(7, $childcat)) {
                    $catsIn[] = $childcat->cat_ID;
                  }
                }
          // Related Topics as a backup
                $catsIn[] = $topicID;
          // print_r( $catsIn );
              ?>
              <?php
                    $args = array(
                  'post_type'             => array( 'post', 'page' ),
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
            <?php if ($related->have_posts()) : ?>
              <div class='content-row end-block block'>
                <section class='collection grid-3-per with-dividers'>
                  <h2 class='section-title center'>
                    Related
                    <span>
                      Reading
                    </span>
                  </h2>
                  <hr class='thick neutral-light-bg partial'>


                      <?php while ( $related->have_posts() ): $related->the_post(); ?>
                        <?php
                          $featured_img = wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
                          if ($featured_img == '') {
                            $featured_img = get_stylesheet_directory_uri() . '/img/icons/article-img-placeholderRetina.png';
                          }
                        ?>
                        <div class='media-object with-large-image grid-element popup-content'>
                          <img alt='image title' style="width:274px; height:154px;" src='<?php echo $featured_img; ?>'>
                          <div class='popup-content-wrap'>
                            <div class='comment-counter-wrap'>
                              <a class='icon comment-counter' href='<?php echo get_permalink(); ?>#disqus_thread'></a>
                            </div>
                            <?php
                        // Display Topic
                              foreach((get_the_category()) as $childcat) {
                                if (cat_is_ancestor_of(5, $childcat)) {
                                  echo "<a class='text-meta' href='".get_category_link($childcat->cat_ID)."'>";
                                  echo $childcat->cat_name . '</a>';
                                }
                              }
                            ?>
                            <a class='media-copy' href='<?php echo get_permalink(); ?>'>
                              <h3 class='text-meta-header'><?php the_title(); ?></h3>
                              <p class='text-meta-sub light-text-color'>By <?php the_author(); ?><br></p>
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
                      <?php
                  // Reset WP_Query
                        wp_reset_query();
                      ?>

                </section>
              </div>
            <?php endif; // Related Reading ?>
              <?php comments_template(); ?>

            </div>
          </section>
        </main>
      </div>
