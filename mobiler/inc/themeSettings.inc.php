<?php

function getGoogleFonts() {
	return json_decode(file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyA3xlYn3MceUAkHWnK5o_XYFeWbfJ_UuKs'));
	
} 
function setup_theme_admin_menus() {
	// Check that the user is allowed to update options
    add_theme_page(__('Ustawienia szablonu', 'mobiler'), __('Ustawienia szablonu', 'mobiler'), 'manage_options', 
        'mobiler_theme_settings', 'theme_settings_page');
         
    //add_submenu_page('mobiler_theme_settings', 
    //    'Front Page Elements', 'Front Page', 'manage_options', 
    //    'front-page-elements', 'theme_front_page_settings'); 
}
 
// We also need to add the handler function for the top level menu
function theme_settings_page() {
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	}
	$message_tmpl = '';
	if (isset($_POST["update_settings"])) {
		$sliderType = esc_attr($_POST["slider_type"]);   
		update_option("mobiler_slider_type", $sliderType);
		
		$themeLogo = esc_attr($_POST["theme_logo"]);   
		update_option("mobiler_theme_logo", $themeLogo);
		
		$themeBackground = esc_attr($_POST["theme_background"]);   
		update_option("mobiler_theme_background", $themeBackground);
		
		$themeBackgroundFixed = esc_attr($_POST["theme_background_fixed"]);   
		update_option("mobiler_theme_background_fixed", $themeBackgroundFixed);
		
		$themeColorScheme = esc_attr($_POST["theme_color_scheme"]);   
		update_option("mobiler_theme_color_scheme", $themeColorScheme);
		
		$themeBackgroundRepeat = esc_attr($_POST["theme_background_repeat"]);   
		update_option("mobiler_theme_background_repeat", $themeBackgroundRepeat);
		
		$themeContainterBackground = esc_attr($_POST["theme_container_background"]);   
		update_option("mobiler_theme_container_background", $themeContainterBackground);
		
		$themeFont = esc_attr($_POST["theme_font"]);   
		update_option("mobiler_theme_font", $themeFont);
		
		$newsThumbsDisplay = esc_attr($_POST["news_thumbs_display"]);   
		update_option("mobiler_news_thumbs_display", $newsThumbsDisplay);
		
		$cssContent = 'body { font-family: \''.$themeFont.'\', sans-serif; }';
		if(file_exists(get_template_directory().'/css/fonts.css')) unlink(get_template_directory().'/css/fonts.css');
		$fp = fopen(get_template_directory().'/css/fonts.css', 'w');
		fwrite($fp, $cssContent);
		fclose($fp);
		
		$phone = esc_attr($_POST["theme_phone"]);   
		update_option("mobiler_theme_phone", $phone);
		
		$email = esc_attr($_POST["theme_email"]);   
		update_option("mobiler_theme_email", $email);
		
		$socials = json_encode($_POST["socials"]);   
		update_option("mobiler_socials", $socials);
		
		$page_sidebar_type = esc_attr($_POST["page_sidebar_type"]);   
		update_option("mobiler_page_sidebar_type", $page_sidebar_type);
		
		$theme_top_menu = esc_attr($_POST["theme_top_menu"]);   
		update_option("mobiler_theme_top_menu", $theme_top_menu);
		
		$message_tmpl = '<div id="message" class="mobiler-updated">'.__('Zapisano ustawienia szablonu', 'mobiler').'</div>';
		
		
	}
	$sliderType = get_option("mobiler_slider_type");
	$themeLogo = get_option("mobiler_theme_logo");
	$themeBackground = get_option("mobiler_theme_background");
	$themeBackgroundRepeat = get_option("mobiler_theme_background_repeat");
	$themeBackgroundFixed = get_option("mobiler_theme_background_fixed");
	
	$themeColorScheme = get_option("mobiler_theme_color_scheme");
	$themeFont = get_option("mobiler_theme_font");
	
	$themeContainterBackground = get_option("mobiler_theme_container_background");
	$newsThumbsDisplay = get_option("mobiler_news_thumbs_display");
	
	
	$socials = json_decode(get_option("mobiler_socials"));
	$page_sidebar_type = get_option("mobiler_page_sidebar_type");
	$theme_top_menu = get_option("mobiler_theme_top_menu");
	
	$theme_styles = array(
		array('bright', 'Jasny'),
		array('dark', 'Ciemny'),
		array('yellow', 'Żółty'),
		array('light-blue', 'Jasnoniebieski'),
		array('dark-orange', 'Ciemnopomarańczowy')
	);
	
	?>
    <div class="wrap">
	<div class="clear"></div>
        <form method="POST" action="">
		<input type="hidden" name="update_settings" value="Y" />
	  <div class="theme-options-title"><img src="<?php echo get_template_directory_uri(); ?>/images/mobiler.png" /></div>
	  <div class="update-btn"><button type="submit" class="button button-primary button-large"><?php echo __('Aktualizuj ', 'mobiler'); ?></submit></div>
	  <div class="clear"></div>
		<?php echo $message_tmpl; ?>
	  <div class="mobiler-box">
        <h2 class="mobiler-meta-box-header"><?php echo __('Ustawienia szablonu', 'mobiler'); ?></h2>
		<div class="mobiler-meta-box">
            <table class="form-table">
                <tr valign="top">
                    <td>
                        <label for="num_elements">
                            <?php echo __('Rodzaj slidera na stronie głównej', 'mobiler'); ?>
                        </label> 
                    </td>
                    <td>
                        <select name="slider_type">
							<option value="wide" <?php echo ($sliderType=='wide')?'selected':'';?>><?php echo __('Cała szerokość ekranu', 'mobiler'); ?></option>
							<option value="narrow" <?php echo ($sliderType=='narrow')?'selected':'';?>><?php echo __('Tylko szerokość strony', 'mobiler'); ?></option>
						</select>
                    </td>
                </tr>
				<tr>
					<td>
						<?php echo __('Ustaw logo strony', 'mobiler');?><br />
						<em><?php echo __('Wpisz link do pliku lub wyślij go na serwer', 'mobiler'); ?></em>
					</td>
					<td><input id="upload_image" type="text" size="36" name="theme_logo" value="<?php echo $themeLogo; ?>" /><br />
						<input id="upload_image_button" class="button" type="button" value="<?php echo __('Uploaduj plik na serwer', 'mobiler'); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Ustaw tło strony', 'mobiler');?><br />
						<em><?php echo __('Wpisz link do pliku lub wyślij go na serwer', 'mobiler'); ?></em>
					</td>
					<td><input id="upload_image_background" type="text" size="36" name="theme_background" value="<?php echo $themeBackground; ?>" /><br />
						<input id="upload_image_button_background" class="button" type="button" value="<?php echo __('Uploaduj plik na serwer', 'mobiler'); ?>" />
					</td>
				</tr>
				<tr>
					<td><?php echo __('Kolorystyka strony', 'mobiler');?></td>
					<td>
						<select name="theme_color_scheme">
							<?php foreach($theme_styles as $style): ?>
								<option value="<?php echo $style[0]?>" <?php echo($themeColorScheme==$style[0])?'selected':''?>><?php echo __($style[1], 'mobiler');?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Powtarzaj tło', 'mobiler');?></td>
					<td>
						<select name="theme_background_repeat">
							<option value="true" <?php echo($themeBackgroundRepeat=='true')?'selected':''?>><?php echo __('Tak', 'mobiler');?></option>
							<option value="false" <?php echo($themeBackgroundRepeat!=='true')?'selected':''?>><?php echo __('Nie', 'mobiler');?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Wyświetlaj tło jako', 'mobiler');?></td>
					<td>
						<select name="theme_background_fixed">
							<option value="true" <?php echo($themeBackgroundFixed=='true')?'selected':''?>><?php echo __('Przyklejone', 'mobiler');?></option>
							<option value="false" <?php echo($themeBackgroundFixed!=='true')?'selected':''?>><?php echo __('Przewijane', 'mobiler');?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Odciąć kontenter główny', 'mobiler');?></td>
					<td>
						<select name="theme_container_background">
							<option value="true" <?php echo($themeContainterBackground=='true')?'selected':''?>><?php echo __('Tak', 'mobiler');?></option>
							<option value="false" <?php echo($themeContainterBackground!=='true')?'selected':''?>><?php echo __('Nie', 'mobiler');?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Rodaj fontu', 'mobiler');?></td>
					<td>
						<select name="theme_font">
							<?php foreach(getGoogleFonts()->items as $font): ?>
								<option value="<?php echo $font->family?>" <?php echo($themeFont==$font->family)?'selected':''?>><?php echo $font->family?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Wyświetlanie sidebara w stronach:', 'mobiler');?></td>
					<td>
						<select name="page_sidebar_type">
							<option value="left" <?php echo ($page_sidebar_type=='left')?'selected':'';?>><?php echo __('Po lewej stronie', 'mobiler'); ?></option>
							<option value="right" <?php echo ($page_sidebar_type=='right')?'selected':'';?>><?php echo __('Po prawej stronie', 'mobiler'); ?></option>
							<option value="none" <?php echo ($page_sidebar_type=='none')?'selected':'';?>><?php echo __('Nie wyświetlaj', 'mobiler'); ?></option>
						</select>
					</td>
				</tr>
				</table>
		</div>
	</div>
	<div class="mobiler-box">
		<h2 class="mobiler-meta-box-header"><?php echo __('Dane kontaktowe u góry strony', 'mobiler'); ?></h2>
		<div class="mobiler-meta-box">
            <table class="form-table">
				<tr>
					<td><?php echo __('Pokaż górne menu', 'mobiler');?></td>
					<td>
						<select name="theme_top_menu">
							<option value="true" <?php echo($theme_top_menu=='true')?'selected':''?>><?php echo __('Tak', 'mobiler');?></option>
							<option value="false" <?php echo($theme_top_menu!=='true')?'selected':''?>><?php echo __('Nie', 'mobiler');?></option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td><?php echo __('Numer telefonu', 'mobiler');?></td>
					<td><input type="text" name="theme_phone" value="<?php echo $phone; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo __('Adres e-mail', 'mobiler');?></td>
					<td><input type="email" name="theme_email" value="<?php echo $email; ?>" /></td>
				</tr>
				<tr>
					<td><?php echo __('Ikony wpisów wyświetlaj:', 'mobiler');?></td>
					<td><select name="news_thumbs_display">
							<option value="aside" <?php echo($newsThumbsDisplay=='aside')?'selected':''?>><?php echo __('Z lewej', 'mobiler');?></option>
							<option value="above" <?php echo($newsThumbsDisplay=='above')?'selected':''?>><?php echo __('Nad wpisem', 'mobiler');?></option>
							<option value="bside" <?php echo($newsThumbsDisplay=='bside')?'selected':''?>><?php echo __('Z prawej', 'mobiler');?></option>
						</select></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="mobiler-box">
		<h2 class="mobiler-meta-box-header">Social Media</h2>
		<div class="mobiler-meta-box">
            <table class="form-table">
				<tr>
					<td>Facebook</td>
					<td><input type="text" name="socials[Facebook]" value="<?php echo $socials->Facebook; ?>" /></td>
				</tr>
				<tr>
					<td>Google+</td>
					<td><input type="text" name="socials[Google]" value="<?php echo $socials->Google; ?>" /></td>
				</tr>
				<tr>
					<td>YouTube</td>
					<td><input type="text" name="socials[YouTube]" value="<?php echo $socials->YouTube; ?>" /></td>
				</tr>
				<tr>
					<td>Pinterest</td>
					<td><input type="text" name="socials[Pinterest]" value="<?php echo $socials->Pinterest; ?>" /></td>
				</tr>
				<tr>
					<td>Linkedin</td>
					<td><input type="text" name="socials[Linkedin]" value="<?php echo $socials->Linkedin; ?>" /></td>
				</tr>
				<tr>
					<td>Github</td>
					<td><input type="text" name="socials[Github]" value="<?php echo $socials->Github; ?>" /></td>
				</tr>
				<tr>
					<td>Flickr</td>
					<td><input type="text" name="socials[Flickr]" value="<?php echo $socials->Flickr; ?>" /></td>
				</tr>
			</table>
		</div>
	</div>
				
			
        </form>
    </div>
<?php
}

add_action("admin_menu", "setup_theme_admin_menus");

/**
 * Proper way to enqueue scripts and styles
 */
function mobiler_scripts() {
	wp_enqueue_style(  get_option("mobiler_theme_color_scheme"), get_template_directory_uri().'/css/'.get_option("mobiler_theme_color_scheme").'.css' );
	wp_enqueue_style(  'fonts', get_template_directory_uri().'/css/fonts.css' );
}

add_action( 'wp_enqueue_scripts', 'mobiler_scripts' );