<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="content">
	
		<div id="inner-content" class="row">

			<div class="top-header" style="background-image: url('<?php the_field('hero_image'); ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="main-content-wrap">
				<div class="main-content">
					<?php the_field('content'); ?>
				</div>
			</div>
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

		
    
    <?php endwhile; endif; ?>							

<?php get_footer(); ?>