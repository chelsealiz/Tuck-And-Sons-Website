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
		   		<?php the_field('main_text'); ?>
		   	
		   </div>

		   <div class="mid-home">
		   	<?php if ( get_field('mid_image') ): ?>
		   	
		   		<?php 
		   			$thumb_id = get_field('mid_image');
		   			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
		   			$thumb_url = $thumb_url_array[0];
		   		?>
		   		<img class="hero-logo" src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>" />
		   		<?php the_field('mid_text'); ?>
		   	<?php endif; ?>
		   </div>

		   <div class="bot-home">
		   		<?php the_field('contact_form'); ?>
		   </div>
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
