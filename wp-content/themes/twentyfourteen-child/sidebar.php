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
 	 // Display Topic
 		foreach((get_the_category()) as $childcat) {
 			if (cat_is_ancestor_of(5, $childcat)) {
 				echo '<a href="'.get_category_link($childcat->cat_ID).'">';
 				echo $childcat->cat_name . '</a>';
 			}
 		}
     ?>
      <br><br>
  <?php endwhile; ?>
</div><!-- #secondary -->