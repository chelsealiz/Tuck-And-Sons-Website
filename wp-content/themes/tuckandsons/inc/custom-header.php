<?php                        
if ( get_field('header_image') ) : ?>
	<?php 
	$desktop = wp_get_attachment_image_src( get_field('header_image'), 'voyage-head' );
	$mobile = wp_get_attachment_image_src( get_field('header_image'), 'voyage-overview' ); ?>
	<div class="page-section page-section-full-width page-section-full-width-image head-section">
		<?php if ( get_field( 'image_caption' ) ) : ?>
			<div class="img-overlay"></div>
			<div class="text-overlay"><?php the_field( 'image_caption' ); ?></div>
		<?php endif; ?>

		<div class="full-width-image" style="background: url('<?php echo $desktop[0]; ?>'); background-size:cover; background-position: center;">
			
		</div>
	</div>


<?php endif; wp_reset_postdata();// End header image check. ?>