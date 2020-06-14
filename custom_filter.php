<?php get_header(); ?>
	
	<?php 
		if($_GET['minprice'] && !empty($_GET['minprice']))
		{
			$minprice = $_GET['minprice'];
		} else {
			$minprice = 0;
		}
		if($_GET['maxprice'] && !empty($_GET['maxprice']))
		{
			$maxprice = $_GET['maxprice'];
		} else {
			$maxprice = 9999999999999999999999999;	
		}
		if($_GET['size'] && !empty($_GET['size'])) 
		{
			$size = $_GET['size'];
		}
		if($_GET['color'] && !empty($_GET['color'])) 
		{
			$color = $_GET['color'];
		}

	?>


	<div class="container-form" style="max-width: 50%; margin: 0 auto; background: #ffffff; padding: 20px;">
		<h4>WP - Custom query filter</h4>
		<form action="<?php echo site_url('/blog'); ?>" method="get">
			<label>Min:</label>
			<input type="number" name="minprice">
			<label>Max:</label>
			<input type="number" name="maxprice">

			<label>Size:</label>
			<select name="size">
				<option value="">Any</option>
				<option value="s">S</option>
				<option value="m">M</option>
				<option value="l">L</option>
				<option value="xl">XL</option>
			</select>

			<label>Color:</label>
			<select name="color">
				<option value="">Any</option>
				<option value="red">Red</option>
				<option value="blue">Blue</option>
				<option value="green">Green</option>
				<option value="yellow">Yellow</option>
				<option value="purple">Purple</option>
				<option value="black">Black</option>
			</select>

			<button type="submit" name="submit">Filter</button>
		</form>
		<div class="content_container" style="border-top: 1px solid black;margin-top: 10px;"> 
			<?php 
				$args = array (
					'post_type' => 'post',
					'posts_per_page' => -1,
					'meta_query' => array(
						array( // display post based on the min and max price input
							'key' => 'price',
							'type' => 'NUMERIC',
							'value' => array($minprice, $maxprice),
							'compare' => 'BETWEEN'
						),
						array(
							'key' => 'size',
							'value' => $size,
							'compare' => 'LIKE'
						),
						array(
							'key' => 'color',
							'value' => $color,
							'compare' => 'LIKE'
						)
					)
				);
				$query = new WP_Query($args);
				while($query->have_posts()) : $query->the_post(); 
			?>
				<h5><?php the_title(); ?></h5>
				<p><?php the_field('price'); ?></p>
				<span>Color: <?php the_field('color'); ?></span>
				<span>Size: <?php the_field('size'); ?></span>
			<?php 
				endwhile; wp_reset_query(); 
			?>
		</div>
	</div>

	<?php
	get_footer();

