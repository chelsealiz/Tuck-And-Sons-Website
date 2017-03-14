<div class="row">
	<div class="columns small-12">
		<?php get_template_part('page-builder/section','header'); ?>
		<?php the_sub_field('content'); ?>
		<?php foreach(get_sub_field('buttons') as $btn){ display_acf_button_object($btn); } ?>
	</div>
</div>