<?php

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar img-responsive", $class) ;
return $class;
}

 function mobiler_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="row">
		<div class="col-xs-2">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="col-xs-10">
			<div class="row">
				<div class="comment-author vcard col-xs-9">
				
				<?php printf( __( '<cite class="fn">%s</cite> <span class="says">pisze:</span>' ), get_comment_author_link() ); ?>
				</div>

				<div class="comment-meta commentmetadata col-xs-3"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s o %2$s', 'mobiler' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edytuj)', 'mobiler' ), '  ', '' );
					?>
				</div>
			</div>
			<?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<br /><em class="comment-awaiting-moderation"><?php _e( 'Twój komentarz czeka na moderację.', 'mobiler' ); ?></em><br />
				<?php endif; ?>
			<div class="reply btn btn-sm btn-default pull-right">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div></div></div>
			<hr />
			<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		
	</div>
	<?php
			if ( get_comment_pages_count() > 1 ) :
		?>
		<nav class="row" role="navigation">
			<div class="pull-left"><?php previous_comments_link( __( '&larr; Starsze komentarze', 'mobiler' ) ); ?></div>
			<div class="pull-right"><?php next_comments_link( __( 'Nowsze komentarze &rarr;', 'mobiler' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>
	<?php endif; ?>
	
<?php
}