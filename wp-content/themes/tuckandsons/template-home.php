<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">

			<?php if ( get_field('main_background') ): ?>
			
				<?php 
					$thumb_id = get_field('main_background');
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
					$thumb_url = $thumb_url_array[0];
				?>
			
			<?php endif; ?>
	
		   <div class="top-home" style="background-image: url('<?php echo $thumb_url; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">

		   		<h1 class="page-title"><?php the_field('main_title'); ?></h1>
		   	
		   </div>

		   <div class="services-home">
		   		<h2><?php the_field('slider_title'); ?></h2>
		   		<div class="services-slider">
			   		<?php if( have_rows('services_slider') ): ?>
			   			<?php while ( have_rows('services_slider') ) : the_row(); ?>
				   			<div class="service">
				   				<h3 class="service-title"><i class="fa <?php the_sub_field('icon'); ?>" aria-hidden="true"></i><?php the_sub_field('title'); ?></h3>
				   				<div class="service-content"><?php the_sub_field('content'); ?></div>
				   			</div>
			   			<?php endwhile; ?>
			   		
			   		<?php endif; ?>
		   		</div>
		   </div>

		   <div class="values-home">
		   		<h2><?php the_field('tri_section_title'); ?></h2>
		   		<div class="values-row">
		   			<?php if( have_rows('tri_section') ): ?>
		   				<?php while ( have_rows('tri_section') ) : the_row(); ?>
		   					<div class="value">
		   						<h3><?php the_sub_field('title'); ?></h3>
		   						<i class="fa <?php the_sub_field('icon'); ?>" aria-hidden="true"></i>
		   						<p><?php the_sub_field('content'); ?></p>
		   					</div>
		   				<?php endwhile; ?>
		   			
		   			<?php endif; ?>
		   		</div>
		   		


		   </div>

		   <div class="bot-home">
		   		<?php the_field('form_area'); ?>
		   </div>
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
