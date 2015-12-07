<?php get_header(); ?>
	<div class="container main-content">
      <div class="row">
		<div class="<?php echo (is_active_sidebar('main-sidebar'))?'col-md-9':'col-md-12'; ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php include( locate_template( 'loop-post.php' ) ); ?>
			<?php 
					if(comments_open( $post->ID ))  {
						comments_template('', true); 
					}
				?>
		<?php endwhile; ?>
		<?php else: ?>
		   <div class="single"><?php echo __('Niestety, nie mamy nic do pokazania ;(', 'mobiler');?></div>
		<?php endif; ?>
	    </div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<div class="col-md-3">
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</div>
		<?php endif; ?>
	</div>
	</div>
<?php get_footer(); ?>