<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="">
	
		    <main id="main" class="" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php if ( get_field('main_background') ): ?>
					
						<?php 
							$thumb_id = get_field('main_background');
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'slider_bg-lg', true);
							$thumb_url = $thumb_url_array[0];
						?>

						<div class="top-section" style="background-image: url(<?php echo $thumb_url; ?>);">

							<div class="top-section-inner">

								<h1><?php the_field('main_title'); ?></h1>
								<div class="text-box-transparent">
									<div class="text-box">
									<?php the_field('main_text'); ?>
									</div>
								</div>

							</div>

						</div>
					
					<?php endif; ?>

					<div class="mid-section">

						<div class="mid-section-image">

							<?php if ( get_field('mid_image') ): ?>
							
								<?php 
									$thumb_id = get_field('mid_image');
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
									$thumb_url = $thumb_url_array[0];
								?>
								<img class="" src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>" />
							
							<?php endif; ?>
						</div>

						<div class="mid-section-text">
							<?php the_field('mid_text'); ?>
						</div>

					</div>

					<div class="bot-section">
						<div class="bot-section-info">
							<?php the_field('contact_form'); ?>
						</div>
					</div>
					
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
