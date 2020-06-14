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
					'posts_per_page' => -1,
					/*display posts with category ID 9, should use this always for the users to be able to change the category name and not to fuck up your query*/
					// 'cat' 		=> 9,
					/*display posts with category name category 1*/
					// 'category_name' => 'category 1',
					/*display posts with the same category*/
					// 'category__and' => array(9,10)
					/*display posts with category either category 1 or category 2*/
					'category__in' => array(9,10)
				);
				$query = new WP_Query($args);
				while( $query->have_posts() ): $query->the_post();
			?>
				<p><?php the_title(); ?></p>
				<p><?php the_category(); ?></p>		
		<?php endwhile; wp_reset_query(); ?>
		</div> 
	</main>
	<?php
	get_footer();

