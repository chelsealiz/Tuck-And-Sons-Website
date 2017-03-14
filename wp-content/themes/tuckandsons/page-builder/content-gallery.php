
<?php if(get_sub_field('content_display') == 'above'): ?>
<div class="row">
	<div class="columns small-12">
		<?php get_template_part('page-builder/section','header'); ?>
		<?php the_sub_field('content'); ?>
	</div>
</div>
<?php endif; ?>

<?php $images = get_sub_field('images'); ?>
<?php if( $images ): ?>
    <div class="pb-gallery-wrapper">
        <?php foreach( $images as $image ): ?>
            <div class="pb-gallery-single">
            	<div class="row">
					<div class="columns small-12">
		             	<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
		                <p><?php echo $image['caption']; ?></p>
	                </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if( get_sub_field('display_thumbnails') && $images ): ?>
<div class="row">
	<div class="columns small-12 pb-gallery-thumbnails">
        <?php foreach( $images as $image ): ?>
            <div class="thumbnail">
             	<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php if(get_sub_field('content_display') != 'above'): ?>
<div class="row">
	<div class="columns small-12">
		<?php get_template_part('page-builder/section','header'); ?>
		<?php the_sub_field('content'); ?>
	</div>
</div>
<?php endif; ?>
	