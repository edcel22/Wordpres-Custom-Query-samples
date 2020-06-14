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
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'relation' => 'AND',
							array(
								'key' => 'size',
								'value' => 'xs',
								'type' => 'CHAR',
								'compare' => '='
							),
							array(
								'key' => 'color',
								'value' => 'red',
								'type' => 'CHAR',
								'compare' => '='
							)
							
						),
						array(
							'key' => 'price',
							'value' => array(50, 100),
							'type'	=> 'NUMERIC',
							'compare' => 'BETWEEN'
						)
					)
				);
				$query = new WP_Query($args);
				while( $query->have_posts() ) : $query->the_post(); 
			?>
				<h5><?php the_title(); ?></h5><br>
				<p><?php the_field('size'); ?></p>
			<?php endwhile; wp_reset_query(); ?>
		</div> 
	</main>
	<?php
	get_footer();

