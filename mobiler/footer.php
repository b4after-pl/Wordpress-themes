	<!-- FOOTER -->
	
	
      <footer>
	  <div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div>
		</div>
        <p class="pull-right"><a href="#"><?php echo __('Do góry strony'); ?></a></p>
        <p>&copy; 2014 <?php bloginfo('blog_name'); ?> &middot;</p>
		</div>
		
    <!-- /.container -->
      </footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() );?>/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() );?>/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo esc_url( get_template_directory_uri() );?>/js/ie10-viewport-bug-workaround.js"></script>
	<?php wp_footer(); ?>
  </body>
</html>
