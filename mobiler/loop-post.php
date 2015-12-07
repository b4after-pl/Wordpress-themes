	
	<div <?php post_class( 'row' ); ?>>
		<?php if($themeNewsThumbsDisplay=='aside'):?>
			<?php if(has_post_thumbnail()): ?>
			<div class="col-xs-2">
			  <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class'=>'img-responsive')); ?></a>
			  <?php include(locate_template( 'comments-count.php' )); ?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
        <div class="col-xs-<?php echo($themeNewsThumbsDisplay!=='above')?'10':'12'?> post-content">
		  <?php if($themeNewsThumbsDisplay=='above'):?>
			<div class="box">
			<?php if(has_post_thumbnail()): ?>
			  <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'above', array('class'=>'img-responsive')); ?></a>
			<?php endif; ?>
			  <?php include(locate_template( 'comments-count.php' )); ?>
			</div>
	      <?php endif; ?>
          <<?php echo (is_single($post->ID))?'h1':'h2'?>><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a><<?php echo (is_single())?'/h1':'/h2'?>>
		  <span class="meta"><?php echo __('Aktualność znajduje się w kategorii:', 'mobiler'); ?> <?php the_category(', '); ?></span>
		  <span class="meta"><?php the_tags(); ?></span>
          <p class="lead"><?php the_content(); ?></p>
		  <?php
			$defaults = array(
				'before'           => '<div class="row">' . __( 'Strony:', 'mobiler' ),
				'after'            => '</div>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => __( 'Następna strona', 'mobiler' ),
				'previouspagelink' => __( 'Poprzednia strona', 'mobiler' ),
				'pagelink'         => '%',
				'echo'             => 1
			);
		 
			wp_link_pages( $defaults );

		?>
        </div>
		<?php if($themeNewsThumbsDisplay=='bside'):?>
			<?php if(has_post_thumbnail()): ?>
			<div class="col-xs-2">
			  <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class'=>'img-responsive')); ?></a>
			  <?php include(locate_template( 'comments-count.php' )); ?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<hr class="featurette-divider">