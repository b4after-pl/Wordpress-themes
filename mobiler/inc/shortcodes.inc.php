<?php 
function code ($atts, $content = '') {
	$html = '
			<div class="panel panel-default">
			  <div class="panel-body">
				<figure>'.do_shortcode($content).'</figure>
			  </div>
			</div>';
	return str_replace(array('<p>', '</p>'), '', $html);
}
 
add_shortcode('code', 'code');