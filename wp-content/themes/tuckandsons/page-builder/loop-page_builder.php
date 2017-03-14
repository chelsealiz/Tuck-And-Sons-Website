<?php
if( have_rows('page_builder') ):
	while ( have_rows('page_builder') ) : the_row();
		
		$classes = array();
		$styles = array();

		$classes[] = get_sub_field('content_color') ? get_sub_field('content_color') : 'dark';

		if(get_sub_field('background_type') == 'color' && get_sub_field('background_color')) {
			$styles[] = 'background: ' . get_sub_field('background_color');
		} else if(get_sub_field('background_type') == 'image' && get_sub_field('background_image')) {
			$styles[] = 'background-image: url(\'' . get_sub_field('background_image')['sizes']['large'] . '\');';
		}

		if(get_sub_field('custom_text_color') && get_sub_field('content_color') == 'custom') {
			$styles[] = 'color: ' . get_sub_field('custom_text_color') . ';';
		}

		echo '<div class="pb pb-'.get_row_layout().' ' . implode(' ',$classes) . '" style="'.implode('',$styles).'">';
		get_template_part( 'page-builder/content', get_row_layout() );
		echo '</div>';

	endwhile;
endif;
?>