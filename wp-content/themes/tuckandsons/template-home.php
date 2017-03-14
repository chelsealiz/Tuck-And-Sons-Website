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
	
		   <div class="top-home" style="background-image: <?php echo $thumb_url; ?>; background-repeat: none; background-size: cover; background-position: center;">

		   		<h1 class="page-title"><?php the_field('main_title'); ?></h1>
		   		<?php the_field('main_text'); ?>
		   	
		   </div>
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
