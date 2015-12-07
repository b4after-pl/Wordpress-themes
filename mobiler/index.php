<?php get_header(); ?>

	<?php if(is_front_page()): ?>

		<?php get_template_part( 'home', 'carousel'); ?>
	
	<?php endif; ?>
	<div class="container main-content">
      <div class="row">
		<div class="<?php echo (is_active_sidebar('main-sidebar'))?'col-md-8':'col-md-12'; ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include(locate_template( 'loop-post.php' )); ?>
		<?php endwhile; ?>
		  <div class="navigation container">
			<div class="row">
			<?php if(get_next_posts_link()) :?><div class="btn btn-success pull-left"><?php next_posts_link( '<span class="glyphicon glyphicon-backward"></span> Starsze artykuły' ); ?></div><?php endif; ?>
			<?php if(get_previous_posts_link()): ?><div class="btn btn-success pull-right"><?php previous_posts_link( 'Nowsze artykuły <span class="glyphicon glyphicon-forward"></span>' ); ?></div><?php endif; ?>
			</div>
		  </div>
		<?php else: ?>
		   <div class="single"><?php echo __('Niestety, nie mamy nic smacznego do pokazania ;(', 'mobiler');?></div>
		<?php endif; ?>
	    </div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<div class="col-md-4">
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</div>
		<?php endif; ?>
	</div>
	</div>
      <!-- /END THE FEATURETTES -->
<?php get_footer(); ?>