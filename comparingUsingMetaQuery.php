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
					'post_type' 	 => 'post',
					'posts_per_page' => 20,
					'meta_key' 		 => 'order',
					'meta_compare' 	 => '=', //operators <, >, <=, >=, =, !=
					'meta_value'	 =>	3, //pwede string or number or kahit ano
					'order'			 => 'DESC'
				);
				$query = new WP_Query($args);
				while( $query->have_posts() ): $query->the_post(); ?>

				<p><?php the_title(); ?></p>

		<?php endwhile; wp_reset_query(); ?>
		</div> 
	</main>
	<?php
	get_footer();

