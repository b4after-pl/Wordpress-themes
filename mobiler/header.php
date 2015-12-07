<!doctype html>
<html <?php language_attributes(); ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() );?>/images/favicon.ico"	>

    <title><?php wp_title(); ?></title>

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" rel="stylesheet">
	
	<?php $themeBackground 			= get_option("mobiler_theme_background"); ?>
	<?php $themeBackgroundRepeat 	= get_option("mobiler_theme_background_repeat"); ?>
	<?php $themeBackgroundFixed 	= get_option("mobiler_theme_background_fixed"); ?>
	<?php $themeContainerBackground = get_option("mobiler_theme_container_background"); ?>
	<?php $themeFont 				= get_option("mobiler_theme_font"); ?>
	<?php global $themeNewsThumbsDisplay;
	$themeNewsThumbsDisplay = get_option("mobiler_news_thumbs_display"); ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
	  WebFont.load({
		google: {
		  families: ['<?php echo $themeFont?>']
		}
	  });
	</script>
		<style>
		<?php if($themeBackground!==''):?>
			body {
				background: url('<?php echo $themeBackground?>') <?php echo ($themeBackgroundFixed=='true')?'fixed':'';?> <?php echo ($themeBackgroundRepeat!=='true')?'no-repeat':''?> center top;
			}
		<?php endif;?>
		<?php if($themeContainerBackground!==''):?>
			.main-content {
				padding: 20px;
				background-color: #fff;
			}	
		<?php endif;?>
		</style>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php  ?>
    <?php wp_head(); ?>
	
  </head>
  <body <?php body_class(); ?>>
	<?php $topMenu = get_option("mobiler_theme_top_menu"); ?>
	
    <div class="top-bar">
		<?php if($topMenu == 'true'): ?>
		<div class="add-bar hidden-xs">
		  <div class="container">
			<div class="row">
				<div class="pull-left contact-info-bar">
					<?php $phone = get_option("mobiler_theme_phone"); ?>
					<?php $email = get_option("mobiler_theme_email"); ?>
					<?php if($phone!==''):?><span class="glyphicon glyphicon-phone"></span> <?php echo $phone; ?><?php endif;?>
					<?php if($email!==''):?><span class="glyphicon glyphicon-envelope"></span> <?php echo $email; ?><?php endif;?>
				</div> 
				<div class="pull-right hidden-xs">
				<?php $social =  json_decode(get_option("mobiler_socials")); ?>
					<?php if($social->Facebook!==''):?><a href="<?php echo $social->Facebook;?>" title="Facebook"><span class="sm-icon sm-icon-facebook"></span></a><?php endif;?>
					<?php if($social->Google!==''):?><a href="<?php echo $social->Google;?>" title="Google+"><span class="sm-icon sm-icon-googleplus"></span></a><?php endif;?>
					<?php if($social->YouTube!==''):?><a href="<?php echo $social->YouTube;?>" title="YouTube"><span class="sm-icon sm-icon-youtube"></span></a><?php endif;?>
					<?php if($social->Pinterest!==''):?><a href="<?php echo $social->Pinterest;?>" title="Pinterest"><span class="sm-icon sm-icon-pinterest"></span></a><?php endif;?>
					<?php if($social->Linkedin!==''):?><a href="<?php echo $social->Linkedin;?>" title="Linkedin"><span class="sm-icon sm-icon-linkedin"></span></a><?php endif;?>
					<?php if($social->Github!==''):?><a href="<?php echo $social->Github;?>" title="Github"><span class="sm-icon sm-icon-github"></span></a><?php endif;?>
					<?php if($social->Flickr!==''):?><a href="<?php echo $social->Flickr;?>" title="Flickr"><span class="sm-icon sm-icon-flickr"></span></a><?php endif;?>
				</div>
			</div>
		  </div>
		</div>
		<?php endif; ?>
	    <div class="row">
			<div class="container">
				<div class="site-title col-xs-3">
					<?php $themeLogo = get_option("mobiler_theme_logo"); ?>
					<?php if($themeLogo !== ''): ?>
						<a href="<?php echo esc_url( home_url() ) ;?>" class="site-title" title="<?php bloginfo('blog_name');?>"><img src="<?php echo $themeLogo; ?>" alt="<?php bloginfo('blog_name');?>" class="img-responsive" /></a>
					<?php else: ?>
						<a href="<?php echo esc_url( home_url() ) ;?>" class="site-title" title="<?php bloginfo('blog_name');?>"><?php bloginfo('blog_name');?></a>
					<?php endif; ?>
				</div>
				<div class="col-xs-9">
					<nav class="navbar navbar-inverse ">
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only"><?php echo __('Rozwiń menu', 'mobiler'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
						  <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav navbar-nav', 'walker' => new Bootstrap_Walker() ) ); ?>
						</div>
					</nav>
				</div>
			<div>
		</div>
    </div>
   </div>
  </div>
   <?php if ( function_exists('yoast_breadcrumb') ) { ?>
   <div class="yoast-breadcrumbs">
	<?php yoast_breadcrumb('<div id="breadcrumbs" class="container">','</div>'); ?>
   </div>
   <?php } ?>
