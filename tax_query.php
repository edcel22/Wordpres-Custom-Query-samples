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
					'post_per_page' => -1,
					'tax_query' => array (
						'relation' => 'OR',
						array (
							'taxonomy' => 'category',
							'field'	=> 'slug',// pwede id , slug , name
							'terms' => array('category-1'),
							'include_children' => true,
							'operator' => 'IN'
						),
						array (
							'taxonomy' => 'post_tag', //default tags
							'field'	=> 'name',// pwede id , slug , name
							'terms' => array('tag 1', 'tag 2'),
							'include_children' => true,
							'operator' => 'IN'
						),
						array (
							'taxonomy' => 'genre', //custom taxonomy tags
							'field'	=> 'name',// pwede id , slug , name
							'terms' => array('horror'),
							'include_children' => true,
							'operator' => 'IN'	
						)
					)
				);
				$query = new WP_Query($args);
				while( $query->have_posts() ) : $query->the_post();
			?>
			<p><?php the_title(); ?></p>
		<?php endwhile; wp_reset_query(); ?>
		</div> 
	</main>
	<?php
	get_footer();

