<?php
// Creating the widget 
class mobiler_lastnews_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'mobiler_lastnews_widget', 

// Widget name will appear in UI
__('Mobiler | Ostatnie wpisy', 'mobiler'), 

// Widget description
array( 'description' => __( 'Widżet wyświetlający ostatnie wpisy', 'mobiler' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

wp_reset_postdata();
$title = apply_filters( 'widget_title', $instance['title'] );
$post_cat = $instance['post_cat'];
$post_count = $instance['post_count'];

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
// mobiler content
if($post_cat!==0):
	$cat_args = array( 'posts_per_page' => $post_count,  'category' => $instance['post_cat'] );
else:
	$cat_args = array( 'posts_per_page' => $post_count );
endif;
$mobiler_posts = get_posts( $cat_args );
foreach ( $mobiler_posts as $post ) : ?>
	<div class="row widget-row">
		<?php if(has_post_thumbnail($post->ID)): ?>
		<div class="col-xs-2">
		  <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class'=>'img-responsive widget-thumb')); ?></a>
        </div>
		<?php endif; ?>
		<div class="col-xs-<?php echo(has_post_thumbnail($post->ID))?'10':'12'?> post-content">
			<h5><a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h5>
			<span class="widget_meta"><?php echo __('Opublikowano: ','mobiler')?> <?php echo get_the_time('j F Y', $post->ID)?></span>
		</div>
	</div>
<?php endforeach; 
echo $args['after_widget'];

wp_reset_postdata();
}
		
// Widget Backend 
public function form( $instance ) {

// categories
$args = array(
	'type'                     => 'post',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 0,
	'taxonomy'                 => 'category',
	'pad_counts'               => false 

); 
$categories = get_categories( $args ); 


if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Ostatnie wpisy', 'mobiler' );
}

if ( isset( $instance[ 'post_count' ] ) ) {
$post_count = $instance[ 'post_count' ];
}
else {
$post_count = 5;
}

if ( isset( $instance[ 'post_cat' ] ) ) {
$curr_cat = $instance[ 'post_cat' ];
}
else {
$curr_cat = 0;
}
// Widget admin form
?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php __( 'Nagłówek:', 'mobiler' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php __( 'Ilość wpisów:', 'mobiler' ); ?></label> 
	<select class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>">
		<?php for($i=1; $i<11; ++$i):?>
			<option value="<?php echo $i;?>" <?php echo ($post_count==$i)?'selected':''?>><?php echo $i?></option>
		<?php endfor?>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'post_cat' ); ?>"><?php __( 'Kategoria wpisów:', 'mobiler' ); ?></label> 
	<select class="widefat" id="<?php echo $this->get_field_id( 'post_cat' ); ?>" name="<?php echo $this->get_field_name( 'post_cat' ); ?>">
		<option value="0"><?php echo __('--Wszystkie kategorie--', 'mobiler')?></option>
		<?php foreach($categories as $cat):?>
			<option value="<?php echo $cat->term_id;?>" <?php echo ($cat->term_id==$curr_cat)?'selected':''?>><?php echo $cat->cat_name;?></option>
		<?php endforeach;?>
	</select>
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? strip_tags( $new_instance['post_count'] ) : '';
$instance['post_cat'] = ( ! empty( $new_instance['post_cat'] ) ) ? strip_tags( $new_instance['post_cat'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function mobiler_load_widget() {
	register_widget( 'mobiler_lastnews_widget' );
}
add_action( 'widgets_init', 'mobiler_load_widget' );