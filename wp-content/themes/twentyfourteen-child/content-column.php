<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfourteen_post_thumbnail(); ?>
	<p><?php the_post_thumbnail_caption(); ?></p>
	<p><?php // the_post_thumbnail_title(); ?></p>

	<header class="entry-header">
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
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>
		
		<?php echo get_post_meta( get_the_ID(), 'Subtitle', true ); ?><br>
		<?php echo get_post_meta( get_the_ID(), 'Read Time', true ); ?> Read

		<div class="entry-meta">
			Author: 
			<?php the_author(); ?>
			<img src="<?php echo get_wp_user_avatar_src(); ?>">
			<?php
					twentyfourteen_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			$content = get_the_content() . " image" ;
			echo apply_filters('the_content',$content);
		?>
		<?php
// 			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
// 			wp_link_pages( array(
// 				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
// 				'after'       => '</div>',
// 				'link_before' => '<span>',
// 				'link_after'  => '</span>',
// 			) );
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

	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta">Tags: <span class="tag-links">', '', '</span></footer>' ); ?>
	
		<hr>
	
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

</article><!-- #post-## -->
