	<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package WordPress
	 * @subpackage Twenty_Twenty
	 * @since Twenty Twenty 1.0
	 */

	get_header();
	?>

	<main id="site-content" role="main">
		<div class="xency_container" style="display: flex; align-items: center; justify-content: center; flex-direction: column; max-width: 70%; margin: 0 auto; background-color: white;">
			<?php 
			 $args = array(
			 	'post_type' => 'post',
			 	'posts_per_page' => 20,
			 	/*change the default order by date into order by title*/
			 	// 'orderby' => 'title', 
			 	/*order posts randomly but need to comment out  order => desc to make this append, every time we refresh the page it will display post randomly.*/
			 	// 'orderby' => 'rand', 
			 	/*order posts by comment count*/
			 	// 'orderby' => 'comment_count',
			 	/*order posts by meta key on ACF*/
			 	'meta_key' => 'order',
			 	'orderby'  => 'meta_value',
			 	/*default order by date in wordpress*/ 
			 	'order' => 'DESC' 
			 );
			$query = new WP_Query($args);
			if( $query->have_posts() ): while( $query->have_posts()): $query->the_post(); ?>
				<div><?php the_title(); ?> </div><hr>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div> 
	</main>
	<?php
	get_footer();

