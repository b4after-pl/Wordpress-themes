<?php get_header(); ?>
	<div class="container main-content">
	<?php $page_sidebar_type = get_option("mobiler_page_sidebar_type"); ?>
	<?php if($page_sidebar_type=='left'):?>
		<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<div class="col-md-4">
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="<?php echo($page_sidebar_type=='none')?'col-md-12':'col-md-8'?> single">
		<?php get_template_part( 'loop', 'single' ); ?>
	</div>
	<?php endwhile; ?>
      
    <?php else: ?>
	   <div class="container single"><?php echo __('Nie ma takiej strony :( Być może masz nieaktualny link?', 'mobiler');?></div>
	<?php endif; ?>
	<?php if($page_sidebar_type=='right'):?>
		<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<div class="col-md-4">
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	</div>
<?php get_footer(); ?>