<?php $sliderType = get_option("mobiler_slider_type"); ?>
	
	<?php global $post;
		$r = new WP_Query(array( 'no_found_rows' => true, 'post_type' => 'slider', 'meta_key' => 'slider_order', 'orderby' => 'meta_value_num',  'order' => 'ASC'));
		if ($r->have_posts()) : ?>
<?php echo($sliderType=='narrow')?'<div class="container hidden-xs">':'';?>
	<!-- Carousel
    ================================================== -->
    <div id="mobiler-home-carousel" class="carousel slide hidden-xs" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      <?php $i = -1; while ($r->have_posts()): $r->the_post();  ?>
            <li data-target="#mobiler-home-carousel" data-slide-to="<?php echo ++$i; ?>" <?php echo(++$i=='1')?'class="active"':''; ?>></li>
	  <?php endwhile; ?>
      </ol>

      <div class="carousel-inner" role="listbox">
	  <?php  $i = -1; while ($r->have_posts()) : $r->the_post(); 
        $custom = get_post_custom($post->ID);
        ?>
        <div class="item <?php echo(++$i=='0')?'active':''; ?>">
		  <?php if($sliderType=='narrow'):?>
          <?php echo get_the_post_thumbnail($post->ID, 'homepage-carusel'); ?>
		  <?php else:?>
		  <?php echo get_the_post_thumbnail($post->ID, 'homepage-carusel-wide'); ?>
		  <?php endif;?>
          <div class="container">
            <div class="carousel-caption <?php echo $custom['slider_align'][0]; ?>">
              <h1 class="<?php echo $custom['slider_color'][0]; ?>"><?php echo get_the_title(); ?></h1><br />
              <div class="small-caption <?php echo ($custom['slider_color'][0]=='dark')?'small-caption-dark':''; ?>"><?php echo $custom['slider_podpis'][0]; ?></div><br />
              <a class="btn btn-large btn-success" href="<?php echo $custom['slider_link'][0]; ?>"><?php echo ($custom['slider_link_text'][0]!=='')?$custom['slider_link_text'][0]:__('Zobacz całość', 'mobiler')?></a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <a class="left carousel-control" href="#mobiler-home-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><?php echo __('Poprzedni', 'mobiler')?></span>
      </a>
      <a class="right carousel-control" href="#mobiler-home-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><?php echo __('Następny', 'mobiler')?></span>
      </a>
    </div><!-- /.carousel -->
	<div class="bottom-carousel hidden-xs"></div>
	<?php echo($sliderType=='narrow')?'</div>':'';?>
<?php endif; ?>