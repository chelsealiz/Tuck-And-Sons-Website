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
	
		   <div class="top-home" style="background-image: url('<?php echo $thumb_url; ?>'); background-repeat: none; background-size: cover; background-position: center;">

		   		<h1 class="page-title"><?php the_field('main_title'); ?></h1>
		   	
		   </div>

		   <div class="services-home">
		   		<h2><?php the_field('slider_title'); ?></h2>
		   </div>

		   <div class="values-home">
		   		<h2><?php the_field('tri_section_title'); ?></h2>
		   </div>

		   <div class="bot-home">
		   		<?php the_field('contact_form'); ?>
		   </div>
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
