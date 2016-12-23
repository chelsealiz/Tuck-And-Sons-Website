<?php if ( have_rows( 'article_builder' ) ): ?>

	<div class="article-builder-wrapper">

		<?php while ( have_rows( 'article_builder' ) ) : the_row(); ?>

			<?php if ( get_row_layout() == 'title_text_block' ) : ?>

				<div class="page-section page-section-title-text">
					<div class="content-wrapper">
						<div class="section-title dynamic-color">
							<?php if ( get_sub_field( 'title' ) ) : ?>
								<?php
								$title = get_sub_field( 'title' );
								echo do_shortcode( $title );
								?>
							<?php endif; ?>
						</div>

						<div class="section-content">
							<?php the_sub_field( 'text' ); ?>
								
						</div>
					</div>
				</div>

			<?php elseif ( get_row_layout() == 'breakout_image' ) : ?>

				<div class="page-section page-section-full-width page-section-full-width-breakout">
						<?php if ( get_sub_field( 'caption' ) ) : ?>
							<div class="img-overlay"></div>
							<div class="text-overlay"><?php the_sub_field( 'caption' ); ?></div>
						<?php endif; ?>
						<?php $desktop = wp_get_attachment_image_src( get_sub_field('image_large'), 'voyage-head' ); ?>
						<div class="full-width-image" style="background: url('<?php echo $desktop[0]; ?>'); background-size:cover; background-position: center;">
					
						</div>
					</div>

			<?php elseif ( get_row_layout() == 'full_width_slider' ) : ?>

					<div class="page-section page-section-container-width">
						<?php if ( get_sub_field( 'title' ) ) : ?>
							<h2 class="bulleted"><?php the_sub_field( 'title'); ?></h2>
						<?php endif; ?>
						<?php if ( get_sub_field( 'intro' ) ) : ?>
							<?php the_sub_field( 'intro'); ?>
						<?php endif; ?>
					</div>

					<div class="page-section page-section-full-width">
						<div class="max-flex-carousel">
					
							<?php while ( have_rows( 'full_slides' ) ) : the_row(); ?>
							<div class="slide">
							
								<?php	
								$attachment_id = get_sub_field('full_image');
								$size = "max-flex-slider"; // (thumbnail, medium, large, full or custom size)
								$image = wp_get_attachment_image_src( $attachment_id, $size );?>
							
								<img src="<?php echo $image[0]; ?>">
								
							</div>
							<?php endwhile; ?>
							<div class="max-flex-nav"></div>
						</div>
						
					</div>

			<?php elseif ( get_row_layout() == 'full_width_image' ) : ?>

					<div class="page-section page-section-full-width page-section-full-width-image">
						<?php if ( get_sub_field( 'caption' ) ) : ?>
							<div class="img-overlay"></div>
							<div class="text-overlay"><?php the_sub_field( 'caption' ); ?></div>
						<?php endif; ?>
							<?php $desktop = wp_get_attachment_image_src( get_sub_field('image_large'), 'voyage-head' ); ?>
							<div class="full-width-image" style="background: url('<?php echo $desktop[0]; ?>'); background-size:cover; background-position: center;">
					
						</div>
					</div>

			<?php elseif ( get_row_layout() == 'media_block' ) : ?>

					<?php $desktop = wp_get_attachment_image_src( get_sub_field('image'), 'voyage-head' ); ?>

					<div class="page-section page-section-container-width page-section-media-block">
						<div class="media-block-image">
							<img src="<?php echo $desktop[0];?>">
						</div>
						<div class="media-block-content">
							<h3><?php the_sub_field( 'title' );?></h3>
							<?php the_sub_field( 'paragraph' );?>
							<?php if (get_sub_field('button')): ?>
								<a class="gtm-article-builder-media-block-link" href="<?php the_sub_field('button_link'); ?>" class="button apply"><?php the_sub_field('button_text'); ?></a>
							<?php endif; ?>
						</div>
						<?php if ( get_sub_field( 'caption' ) ) : ?>
							<div class="img-overlay"></div>
							<div class="text-overlay"><?php the_sub_field( 'caption' ); ?></div>
						<?php endif; ?>	
					</div>
			<?php elseif ( get_row_layout() == 'testimonial' ) : ?>
			<?php $authorImage = wp_get_attachment_image_src( get_sub_field('image'), 'medium' ); ?>
					<div class="page-section page-section-container-width">

                                        <div class="testimonial-photo">

                                            <div class="testimonial-photo-wrap">
                                                <img src="<?php echo $authorImage[0]; ?>">
                                            </div>

                                            <div class="frame">
                                                <i class="halfCircleLeft"></i>
                                                <i class="halfCircleRight"></i>
                                            </div>

                                        </div>

                                        <div class="testimonial-info">
											<span class="dashicons dashicons-format-quote quotes"></span>
                                            <p class="testimonial"><?php the_sub_field( 'testimonial_content' ); ?></p>
                                            
                                            <span class="testimonial-author">-<?php the_sub_field( 'author' ); ?></span>

                                        </div>

                                    </div>

			<?php elseif ( get_row_layout() == 'full_width_quote' ) : ?>
				
					<div class="page-section page-section-full-width page-section-full-width-quote">
				
						<div class="full-width-quote">
							<blockquote class="">
								<?php the_sub_field( 'quote' ); ?>
							<span><?php the_sub_field( 'author' ); ?></span>
							</blockquote>
						</div>
					</div>

			<?php elseif ( get_row_layout() == 'intro_quote' ) : ?>
				
					<div class="page-section page-section-intro-quote page-section-container-width">
						<div class="frame-container">
							<div class="frame">
								<i class="halfCircleLeft"></i>
								<i class="halfCircleRight"></i>
							</div>
							<span class="dashicons dashicons-format-quote quotes"></span>

						</div>
						<blockquote class="intro-quote">
							<?php the_sub_field( 'quote' ); ?>
						</blockquote>
						<span><?php the_sub_field( 'author' ); ?></span>
					</div>
					<?php if (get_sub_field('dashed')): ?>
						<hr class="dashed">
					<?php endif; ?>
			<?php elseif ( get_row_layout() == 'intro_text' ) : ?>
				
					<div class="page-section page-section-intro-text page-section-container-width">
						
						<div class="intro-content">
							<h2 class="bulleted"><?php the_sub_field( 'title' );?></h2>
							<?php the_sub_field( 'paragraph' );?>
						</div>
					</div>
					<?php if (get_sub_field('dashed')): ?>
						<hr class="dashed">
					<?php endif; ?>
			<?php elseif ( get_row_layout() == 'single_column_content' ) : ?>

					<div class="page-section page-section-slim-width">
				
						<div class="slim-content">
							
						<?php the_sub_field( 'content' );?>
						</div>
					</div>

			<?php elseif ( get_row_layout() == 'max_width_column' ) : ?>

					<div class="page-section page-section-container-width">
				
						<div class="max-content">
							
							<?php the_sub_field( 'max_width_content' );?>
						</div>
					</div>
			<?php elseif ( get_row_layout() == 'content_with_sidebar' ) : ?>

					<div class="page-section page-section-container-width">
				
						<div class="main-content">
							<?php if (get_sub_field('title')){ ?>
							<h2 class="bulleted"><?php the_sub_field( 'title' );?></h2>
							<?php }?>
								<?php the_sub_field( 'content' );?>
						</div>
						<div class="sidebar-content">
							<?php if (get_sub_field('sidebar_title')){ ?>
								<h4><?php the_sub_field( 'sidebar_title' );?></h4>
							<?php }?>
							<?php the_sub_field( 'sidebar_content' );?>
						</div>
					</div>

			<?php elseif ( get_row_layout() == 'alternating_images' ) : ?>

					<div class="page-section page-section-full-width page-section-alternating">

						<?php if( have_rows('blocks') ):
			    					$i = 1;
						    while ( have_rows('blocks') ) : the_row(); ?>
							<div class="alternating-row">
								
								<div class="<?php if ($i % 2 == 0){?>left <?php } else{ ?>right <?php } ?> alternating-image">
									<?php	
										$attachment_id = get_sub_field('alternating_image');
										$size = "alternating_image"; // (thumbnail, medium, large, full or custom size)
										$image = wp_get_attachment_image_src( $attachment_id, $size );?>
									
										<img src="<?php echo $image[0]; ?>">
								</div>
								<div class="<?php if ($i % 2 == 0){?>right <?php } else{ ?>left <?php } ?> alternating-text">
									
										<?php the_sub_field( 'alternating_text_block' );?>
								</div>
							</div>
						<?php $i++; endwhile; endif;?>
					</div>

			<?php elseif ( get_row_layout() == 'single_column_slider' ) : ?>

					<div class="page-section page-section-slim-width">

						<h3><?php the_sub_field( 'slider_title'); ?></h3>

						<?php the_sub_field( 'slider_intro'); ?>
				
						<div class="flex-carousel">
					
							<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
							<div class="slide">
							
							<?php	
							$attachment_id = get_sub_field('image');
							$size = "flex-slider"; // (thumbnail, medium, large, full or custom size)
							$image = wp_get_attachment_image_src( $attachment_id, $size );?>
							<figure>
								<img src="<?php echo $image[0]; ?>">
								<figcaption class="wp-caption-text"><?php the_sub_field('caption');?></figcaption>
							</figure>
							</div>
							<?php endwhile; ?>
						</div>
						<div class="flex-nav"></div>
					</div>

			<?php elseif ( get_row_layout() == 'three_column_layout' ) : ?>

					<div class="page-section page-section-container-width">


						<?php get_sub_field( 'column_block'); ?>
				
						<ul class="three-columns">
					
							<?php while ( have_rows( 'column_block' ) ) : the_row(); ?>
								<li class="column-block">
								
									<?php	
									$attachment_id = get_sub_field('block_image');
									$size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
									$image = wp_get_attachment_image_src( $attachment_id, $size );?>
								
									<img src="<?php echo $image[0]; ?>">
									<h4 class="block-text"><?php the_sub_field('block_title');?></h4>
									<?php the_sub_field('block_content');?>
								
								</li>
							<?php endwhile; ?>
						</ul>
						
					</div>

			<?php elseif ( get_row_layout() == 'centered_title' ) : ?>
					<h3 class="center"><?php the_sub_field('centered_text'); ?></h3>

			<?php endif; ?>

		<?php endwhile; ?>

	</div>

<?php endif; ?>
