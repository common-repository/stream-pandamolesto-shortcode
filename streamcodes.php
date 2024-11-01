<?php
/*
Plugin Name: Stream Pandamolesto Shortcode
Plugin URI: http://www.stream.pandamolesto.com
Description: This plugin allows you to embed video from Stream.PandaMolesto.com whit shortcodes. You can publish video in posts e.g. [stream id="51112f94a" width="600" height="350" link="false"]. Width and height parameter is to change player dimentions, whit link parameter you can show the direct video url and this last features is optional, but is of course very welcome if enabled. 
Version: 0.1 
Author: PandaMolesto
Author URI: http://www.pandamolesto.com
*/

/*
Stream PandaMolesto Shortcode (Wordpress Plugin)
Copyright (C) 2013 PandaMolesto.com
Contact me at http://www.pandamolesto.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/



//////////////////////////////////////////////////////////////////
// Stream shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('stream', 'shortcode_stream');
	function shortcode_stream($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360,
                'link' => false
                               
			), $atts);



if ($atts['link'] == 'true') {
		$credit =  "<div align='center'><p><a href='http://stream.pandamolesto.com/musicvideo.php?vid=" . $atts['id'] . "'><b>Direct link on Stream - PandaMolesto.com</b></a></p></div>";		
	} else {
 $credit = '';
 }
		
			return '<!-- This video is brought to you by Stream PandaMolesto Shortcode - http://stream.pandamolesto.com/ --><embed src="' . plugins_url( 'player/jwplayer.swf' , __FILE__ ) . '"  width="' . $atts['width'] . '" height="' . $atts['height'] . '" scale="noscale" type="application/x-shockwave-flash" allowFullScreen="true"  allowScriptAccess="always" wmode="window"  flashvars="&file=http%3A%2F%2Fstream.pandamolesto.com%2Fvideos.php%3Fvid%3D' . $atts['id'] . '&type=video&config="' . plugins_url( 'player/jwembed.xml' , __FILE__ ) . '"></embed>'. $credit .'  <!-- / Stream PandaMolesto Shortcode - http://stream.pandamolesto.com/ -->';
                       
	}


//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
//////////////////////////////////////////////////////////////////
add_action('init', 'add_button');

function add_button() {  
   //if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
      if ( current_user_can('read') &&  current_user_can('read') )  

   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
   }  
}  

function register_button($buttons) {  
   array_push($buttons, "stream");  
   return $buttons;  
}  

function add_plugin($plugin_array) {  
   $plugin_array['stream'] = plugins_url( 'tinymce/customcodes.js' , __FILE__ );
   
   
   return $plugin_array;  
}  

 
?>