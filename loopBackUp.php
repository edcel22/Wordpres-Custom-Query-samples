<?php if (have_posts()): 
	
while (have_posts()) : the_post(); ?>
<?php 
// get the current taxonomy term
$term = get_queried_object();
// vars
$footer_location = get_field('footer_location', $post->ID); // from residential
$short_description = get_field('short_description', $post->ID);
$external_link = get_field('external_link', $post->ID);
$location_area = get_field('location_area', $post->ID);

$year = get_field('year', $post->ID); // for completed communities
?>

<?php if (is_category(13) || is_category(15) || is_category(16)) : //if news and press release ?>	
		
	<div class="article-card">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<a <?php if (get_field('news_short_external_link', $post->ID)) : ?> target="_blank" href="<?php echo get_field('news_short_external_link', $post->ID); ?>" <?php else: ?> href="<?php the_permalink(); ?>" <?php endif;?> class="thumbnail" style="background-image:url('<?php echo the_post_thumbnail_url( $post->ID ); ?>')"></a>
		<?php endif; ?>
		
		<div class="article-details">
			<a <?php if (get_field('news_short_external_link', $post->ID)) : ?> target="_blank" href="<?php echo get_field('news_short_external_link', $post->ID); ?>" <?php else: ?> href="<?php the_permalink(); ?>" <?php endif;?>  class="title" data-preamble="<?php echo get_field('news_short_type',$post->ID);?>"><?php the_title(); ?></a>
			<span class="date"><?php echo get_the_date( 'M j, Y' ); ?></span>
			<div class="description"><?php echo get_field('news_short_text',$post->ID);?></div>
			<a <?php if (get_field('news_short_external_link', $post->ID)) : ?> target="_blank" href="<?php echo get_field('news_short_external_link', $post->ID); ?>" <?php else: ?> href="<?php the_permalink(); ?>" <?php endif;?>  class="dashed-link">Read More</a>
		</div>
	</div>

<?php elseif ( is_category(9)) : // if other categories such as residential community in progress?>
		
	<?php if ( $house_type_lists = get_field('house_type', $post->ID) ) : ?>
		<?php foreach( $house_type_lists as $house_type ) : ?>
		<?php $get_term_byrm = get_term_by( 'id', $house_type, 'house_type' ); ?>
		<!-- <?php print_r($term); ?> -->
		<?php $housetype_image = get_field('image',$term); ?>

			<div class="property-card-with-button" data-location="<?php if($location_area == 'Luzon'):?> -luzon<?php elseif($location_area == 'Visayas'): ?>-visayas<?php elseif($location_area == 'Mindanao'): ?>-mindanao<?php endif;?>" data-amenity="<?php if(get_field('residential_amenities', $post->ID)): ?><?php foreach( get_field('residential_amenities') as $residential_am ): ?><?php if ($residential_am['value'] == 'Gated Entrance'): ?>	-gated-entrance<?php endif; //end gated-entrance?><?php if ($residential_am['value'] == 'Town Plaza'): ?> -town-plaza<?php endif;//endtown-plaza ?><?php if ($residential_am['value'] == 'Clubhouse'): ?> -clubhouse<?php endif; //end clubhouse  ?><?php if ($residential_am['value'] == 'Pocket Parks'): ?> -pocket-parks<?php endif; //end pocket-parks ?><?php if ($residential_am['value'] == 'Greenbelts'): ?> -greenbelts<?php endif; //end greenbelts ?><?php if ($residential_am['value'] == 'Beach Front'): ?> -beachfront<?php endif; //end beachfront ?><?php if ($residential_am['value'] == 'Swimming Pool'): ?> -swimming-pool<?php endif; //end swimming-pool ?>	<?php if ($residential_am['value'] == 'Camp Grounds'): ?> -camp-grounds<?php endif; //end camp-grounds ?><?php if ($residential_am['value'] == 'Fitness Center'): ?> -fitness-center<?php endif; //end fitness-center ?><?php if ($residential_am['value'] == 'Hike Trails'): ?> -hike-trails<?php endif; //end hike-trails ?><?php if ($residential_am['value'] == 'Multi-purpose Court'): ?> -multi-purpose-court<?php endif; //end multi-purpose-court  ?><?php if ($residential_am['value'] == 'Play Area'): ?> -play-area<?php endif; //end play-area ?><?php endforeach; ?><?php endif; ?>">

				<a href="<?php the_permalink(); ?>" class="property-card wow fadeInUp" data-wow-duration="0.68s" data-wow-delay="0.15s">
			
					<div class="thumbnail" style="background-image:url('<?php echo $housetype_image['url']; ?>')" >
					
						<div class="property-detail-small">
							<h2 class="preamble-heading" data-preamble="<?php echo $footer_location; ?>"><?php the_title(); ?></h2>
						</div>
					</div>					

					<div class="property-detail">		
						<h2 class="preamble-heading" data-preamble="<?php echo $footer_location; ?>"><?php the_title(); ?></h2>

						<ul class="details">
							<li class="house-type"><?php echo $term->name; ?></li>
							<?php if ( $price = get_field('price',$term) ) : ?>
							<li class="price">Starts at PHP <?php echo nice_number($price); ?></li>
							<?php endif; ?>
							
							<?php if ( $bedroom = get_field('bedroom',$term) ) : ?>
							<li class="bedroom"><span class="head">Bedroom:</span><?php echo $bedroom; ?></li>
							<?php endif; ?>
							
							<?php if ( $bathroom = get_field('bathroom',$term) ) : ?>
							<li class="bathroom"><span class="head">Bathroom:</span><?php echo $bathroom; ?></li>
							<?php endif; ?>
						</ul>
					</div>
			
					<div class="property-card-filter">
						<div class="amenities-card-list -low-opacity -smaller-icons">
						
						<?php if(get_field('residential_amenities', $post->ID)): ?>
							<?php foreach( get_field('residential_amenities') as $residential_am ): ?>			

								<?php if ($residential_am['value'] == 'Clubhouse'): ?> 
									<div class="amenities-card -active -clubhouse">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end clubhouse  ?>
								
								<?php if ($residential_am['value'] == 'Gated Entrance'): ?>									
									<div class="amenities-card -active -gated-entrance">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end gated-entrance?>
								
								<?php if ($residential_am['value'] == 'Town Plaza'): ?>								
									<div class="amenities-card -active -town-plaza">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif;//endtown-plaza ?>								
								
								<?php if ($residential_am['value'] == 'Pocket Parks'): ?>								
									<div class="amenities-card -active -pocket-parks">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end pocket-parks ?>
								
								<?php if ($residential_am['value'] == 'Greenbelts'): ?> 								
									<div class="amenities-card -active -greenbelts">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end greenbelts ?>
								
								<?php if ($residential_am['value'] == 'Beach Front'): ?> 								
									<div class="amenities-card -active -beachfront">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end beachfront ?>
								
								<?php if ($residential_am['value'] == 'Swimming Pool'): ?> 
								<div class="amenities-card -active -swimming-pool">
									<div class="thumbnail">
									</div>
								</div>
								<?php endif; //end swimming-pool ?>	
								
								<?php if ($residential_am['value'] == 'Camp Grounds'): ?> 
									<div class="amenities-card -active -camp-grounds">
										<div class="thumbnail">
										</div>
									</div>
									<?php endif; //end camp-grounds ?>
								
								<?php if ($residential_am['value'] == 'Fitness Center'): ?> 
									<div class="amenities-card -active -fitness-center">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end fitness-center ?>
								
								<?php if ($residential_am['value'] == 'Hike Trails'): ?>
									<div class="amenities-card -active -hike-trails">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end hike-trails ?>
								
								<?php if ($residential_am['value'] == 'Multi-purpose Court'): ?> 
									<div class="amenities-card -active -multi-purpose-court">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end multi-purpose-court  ?>
								
								<?php if ($residential_am['value'] == 'Play Area'): ?> 								
									<div class="amenities-card -active -play-area">
										<div class="thumbnail">
										</div>
									</div>
								<?php endif; //end play-area ?>
								
							<?php endforeach; ?>
						<?php endif; ?>
								
						</div>
					</div>
				</a>

				<div class="show-button">Show Amenities</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>


<?php elseif (is_category(10)) : //if completed communities?>

	<a target="_blank"  class="property-card wow fadeInUp -alternate-hover" data-wow-duration="0.68s" data-wow-delay="1.25s">		
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<div class="thumbnail" style="background-image:url('<?php echo the_post_thumbnail_url( $post->ID ); ?>')" >
		</div>					
		<?php endif; ?>

		<div class="property-detail">		
			<h2 class="preamble-heading" data-preamble="<?php echo $year; ?>"><?php the_title(); ?></h2>
			<p class="excerpt"><?php echo $short_description; ?></p>
		</div>
	</a>

<?php elseif (is_category(6)) : // if commercial?>

	<a <?php if (get_field('external_link')): ?> href="http://<?php echo get_field('external_link')?>" target="_blank" <?php else: ?> href="<?php the_permalink();?>" <?php endif; ?> class="property-card wow fadeInUp" data-wow-duration="0.68s" data-wow-delay="0.65s">
		<div class="thumbnail" style="background-image:url('<?php echo the_post_thumbnail_url( $post->ID ); ?>')">
		</div>

		<div class="property-detail -left-align">
			<h2 class="preamble-heading" data-preamble="<?php echo get_field('footer_location', $post->ID) ?>"><?php echo the_title(); ?></h2>
		</div>
	</a>

<?php else : // if default ?>

	<a <?php if ($external_link): ?> href="http://<?php echo $external_link; ?>" target="_blank" <?php elseif(is_category(4)) : // if industrial?>  <?php else: ?> href="<?php the_permalink(); ?>" <?php endif; ?> class="property-card wow fadeInUp <?php if (is_category(4)) : // if industrial?>-alternate<?php endif; // end if industrial?> <?php if ( is_category(10)) : //if completed-communities?> -alternate-hover <?php endif; //end completed-communities?>" data-wow-duration="0.68s" data-wow-delay="1.25s">		
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="thumbnail" style="background-image:url('<?php echo $image[0]; ?>')" >
		</div>					
		<?php endif; ?>

		<div class="property-detail">		
			<h2 class="preamble-heading" data-preamble="<?php echo $footer_location; ?>"><?php the_title(); ?></h2>
			<?php if (is_category(4) || is_category(10)) : // if industrial // if completed communities?>
				<p class="excerpt"><?php echo $short_description; ?></p>
			<?php endif; // end if industrial?>

			<ul class="details">
				<?php if ( $house_type = get_field('house_type') ) : ?>
				<li class="house-type"><?php echo $house_type; ?></li>
				<?php endif; ?>

				<?php if ( $price = get_field('price') ) : ?>
				<li class="price">Starts at PHP <?php echo nice_number($price); ?></li>
				<?php endif; ?>
				
				<?php if ( $bedroom = get_field('number_of_bedrooms') ) : ?>
				<li class="bedroom"><span class="head">Bedroom:</span><?php echo $bedroom; ?></li>
				<?php endif; ?>
				
				<?php if ( $bathroom = get_field('number_of_bathrooms') ) : ?>
				<li class="bathroom"><span class="head">Bathroom:</span><?php echo $bathroom; ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</a>

<?php endif; ?>
	

<?php endwhile; ?>

<?php else: ?>
	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'aboitiz_theme' ); ?></h2>
	</article>
	<!-- /article -->
<?php endif; ?>
