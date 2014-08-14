<?php
/*
Plugin Name: PasteBin Embed
Plugin URI: http://code.xnite.net
Description: Allows you to embed pastes from pastebin by ID using a shortcode [pastebin id=postID].
Version: 1.1
Author: Robert Whitney &lt;<a href="mailto:xnite@xnite.org">xnite@xnite.org</a>&gt;
Author URI: http://xnite.org
License: http://xnite.org/copyright#code
*/

function pastebinembed_func( $atts ) {
	extract( shortcode_atts( array(
		'id' => NULL,
		'type' => 'javascript',
	), $atts ) );

	if(!isset($id)) {
		return "<strong>No Pastebin ID given!</strong>";
	} elseif(strtolower($type) == 'javascript') {
		return "<script src=\"http://pastebin.com/embed_js.php?i={$id}\"></script>";
	} elseif(strtolower($type) == 'iframe') {
		return "<iframe src=\"http://pastebin.com/embed_iframe.php?i={$id}\" style=\"border:none;width:100%\"></iframe>";
	} else {
		return "<strong>Invalid Pastebin embed type!</strong>";
	}
}
add_shortcode( 'pastebin', 'pastebinembed_func' );
?>