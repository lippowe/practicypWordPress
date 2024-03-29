<?php

if ( ! get_theme_mod( 'travel_vacation_enable_service_section', false ) ) {
	return;
}

$travel_vacation_content_ids  = array();
$travel_vacation_content_type = get_theme_mod( 'travel_vacation_places_content_type', 'page' );

for ( $i = 1; $i <= 8; $i++ ) {
	$travel_vacation_content_ids[] = get_theme_mod( 'travel_vacation_places_content_' . $travel_vacation_content_type . '_' . $i );
}

$travel_vacation_args = array(
	'post_type'           => $travel_vacation_content_type,
	'post__in'            => array_filter( $travel_vacation_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 6 ),
	'ignore_sticky_posts' => true,
);

$travel_vacation_args = apply_filters( 'travel_vacation_service_section_args', $travel_vacation_args );

travel_vacation_render_service_section( $travel_vacation_args );

/**
 * Render Service Section.
 */
function travel_vacation_render_service_section( $travel_vacation_args ) { ?>
		<section id="travel_vacation_trending_section" class=" trending-section trending-style-1">
		<?php
		if ( is_customize_preview() ) :
			travel_vacation_section_link( 'travel_vacation_service_section' );
		endif;
		?>
		<div class="asterthemes-wrapper">
			<div class="places-main-box">
				<div class="video-main-box">				
					<?php 
					$travel_vacation_query = new WP_Query( $travel_vacation_args );
					if ( $travel_vacation_query->have_posts() ) :
						?>
						<div class="section-body">
							<div class="service-section-wrapper">
								<?php
								$i = 1;
								while ( $travel_vacation_query->have_posts() ) :
									$travel_vacation_query->the_post();
									?>
									<div class="service-single">
										<div class="service-img">
											<?php the_post_thumbnail( 'full' ); ?>
										</div>
										<div class="service-title">
											<h3>
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>
											<hr>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
									<?php
									$i++;
								endwhile;
								wp_reset_postdata();
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="places-main-text">
					<?php 
					    $travel_vacation_places_heading = get_theme_mod( 'travel_vacation_places_section_heading_', '' );
						$travel_vacation_places_text = get_theme_mod( 'travel_vacation_places_section_text_', '' );
						$travel_vacation_button_label = get_theme_mod( 'travel_vacation_places_button_label_' , '' );
						$travel_vacation_button_link  = get_theme_mod( 'travel_vacation_places_button_link_' , '' );
					  ?>

						<?php if ( ! empty( $travel_vacation_places_heading ) ) { ?>
							<h3><?php echo esc_html( $travel_vacation_places_heading ); ?></h3>
						<?php } ?>
						<?php if ( ! empty( $travel_vacation_places_text ) ) { ?>
							<p><?php echo esc_html( $travel_vacation_places_text ); ?></p>
						<?php } ?>

						<?php 
						for ( $i = 1; $i <= 3; $i++ ) {
							$travel_vacation_places_count_heading = get_theme_mod( 'travel_vacation_places_count_heading_'.$i, '' ); 
							$travel_vacation_places_count_text = get_theme_mod( 'travel_vacation_places_count_text_'.$i, '' );
							if ( ! empty( $travel_vacation_places_count_text ) || ! empty( $travel_vacation_places_count_heading ) ) { ?>
								<p class="count-box"><span><?php echo esc_html( $travel_vacation_places_count_text ); ?></span><?php echo esc_html( $travel_vacation_places_count_heading ); ?></p>
							<?php } ?>
						<?php } ?>
						<?php if ( ! empty( $travel_vacation_button_label ) ) { ?>
							<div class="banner-places-btn">
								<a href="<?php echo esc_url( $travel_vacation_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $travel_vacation_button_label ); ?></a>
							</div>
						<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
