<?php if(get_sub_field('header')): ?>
<h4 class="pb-header <?php echo get_sub_field('header_alignment') ? the_sub_field('header_alignment') : ''; ?>"><?php the_sub_field('header'); ?></h4>
<?php endif; ?>