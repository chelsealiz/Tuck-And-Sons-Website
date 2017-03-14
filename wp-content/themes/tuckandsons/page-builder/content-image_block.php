<div class="row">
	<div class="columns medium-4 text-center <?php echo get_sub_field('image_position') == 'right' ? 'medium-push-8' : ''; ?>">
		<img src="<?php echo get_sub_field('image')['sizes']['large']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>" />
	</div>
	<div class="columns medium-8 <?php echo get_sub_field('image_position') == 'right' ? 'medium-pull-4' : ''; ?>">
		<?php get_template_part('page-builder/section','header'); ?>
		<?php the_sub_field('content'); ?>
	</div>
</div>