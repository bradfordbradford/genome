<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="secondary">
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( ! empty ( $description ) ) :
	?>
	<h2 class="site-description"><?php echo esc_html( $description ); ?></h2>
	<?php endif; ?>

	<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
	
	<?php
      $popular = new WP_Query( array(
          'post_type'             => array( 'post' ),
          'showposts'             => 3,
          // 'cat'                   => 'MyCategory',
          'ignore_sticky_posts'   => true,
          'orderby'               => 'comment_count',
          'order'                 => 'dsc',
          // 'date_query' => array(
          //     array(
          //         'after' => '1 week ago',
          //     ),
          // ),
      ) );
  ?>
	<?php while ( $popular->have_posts() ): $popular->the_post(); ?>
      <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a><br>
      <?php echo get_post_meta( get_the_ID(), 'Read Time', true ); ?> read<br>
      <?php the_author(); ?><br>
      <?php 
      if ( in_category( 'Topic' )) {
      	//the_category(', ', 'single');
      	$args = array(
          // 'show_option_all'    => '',
          // 'orderby'            => 'name',
          // 'order'              => 'ASC',
          // 'style'              => '',
          // 'show_count'         => 0,
          // 'hide_empty'         => 1,
          // 'use_desc_for_title' => 1,
          'child_of'           => 5,
          // 'feed'               => '',
          // 'feed_type'          => '',
          // 'feed_image'         => '',
          // 'exclude'            => '',
          // 'exclude_tree'       => '',
          // 'include'            => '',
          // 'hierarchical'       => 1,
          // 'title_li'           => __( 'Categories' ),
          // 'show_option_none'   => __('No categories'),
          // 'number'             => null,
          // 'echo'               => 1,
          // 'depth'              => 0,
          // 'current_category'   => 0,
          // 'pad_counts'         => 0,
          // 'taxonomy'           => 'category',
          // 'walker'             => null
        );

        wp_list_categories( $args );
      } elseif ( in_category( array( 'Tropical Birds', 'small-mammals' ) )) {
      	// They are warm-blooded...
      } else {
      	// & c.
      }
      ?>
      <br><br>
  <?php endwhile; ?>
</div><!-- #secondary -->