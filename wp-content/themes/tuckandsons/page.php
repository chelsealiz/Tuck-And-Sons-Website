<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    	<?php if(get_field('page_builder')): ?>
		
			<?php get_template_part('page-builder/loop','page_builder'); ?>
		
		<?php else: ?>

			<div class="row">
				<div class="columns small-12">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endif; ?>
    
    <?php endwhile; endif; ?>							

<?php get_footer(); ?>