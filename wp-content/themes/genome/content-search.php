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
<?php
  $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  if ($featured_img == '') {
    $featured_img = get_stylesheet_directory_uri() . '/img/icons/article-img-placeholderRetina.png';
  }
?>

                <div class='media-object with-large-image grid-element popup-content'>
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
                    ?><a class='text-meta' href='<?php echo $topicLink; ?>'><?php echo $topicName; ?></a>
                    <a class='media-copy' href='<?php echo get_permalink(); ?>'>
                      <h3 class='text-meta-header'><?php the_title(); ?></h3>
                      <p class='text-meta-sub light-text-color'>By <?php the_author(); ?></p>
                      <p class='text-meta-sub light-text-color sans-meta'>
                      <?php
                        $my_excerpt = get_excerpt_by_id($post->id);
                        echo $my_excerpt;
                      ?>
                      </p>
                    </a>
                  </div>
                </div>