<?php
// this file contains the contents of the popup window
$admin = dirname( __FILE__ ) ;
$admin = substr( $admin , 0 , strpos( $admin , "wp-content" ) ) ;
require_once( $admin . 'wp-admin/admin.php' ) ;
?>
<!DOCTYPE html">
<html>
<head>
<title>Insert Testimonial</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option( 'siteurl' ) ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="<?php echo get_option( 'siteurl' ) ?>/wp-includes/js/tinymce/plugins/compat3x/css/dialog.css"></style>
<link rel="stylesheet" href="../css/rwpt_buttons_tinymce.css" />
<script type="text/javascript" src="../js/jscolor.js"></script>

<script type="text/javascript">
 
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var heading = jQuery('#button-dialog input#rwpt_heading').val();	 
		var heading_size = jQuery('#button-dialog input#rwpt_h_fontsize').val();	 
		var heading_color = jQuery('#button-dialog input#rwpt_h_color').val();	 
		var heading_bgcolor = jQuery('#button-dialog input#rwpt_h_bgcolor').val();	 
		var quote_color = jQuery('#button-dialog input#quote_color').val();	 
		var quote_bgcolor = jQuery('#button-dialog input#quote_bgcolor').val();	 
		var quote_animation = jQuery('#button-dialog select#quote_animation').val();	 
		var client_name_color = jQuery('#button-dialog input#client_name_color').val();	 
		var com_name_color = jQuery('#button-dialog input#com_name_color').val();	 
		var cl_info_bgcolor = jQuery('#button-dialog input#cl_info_bgcolor').val();	 
		var cl_info_anim = jQuery('#button-dialog select#cl_info_anim').val();	 
		var icon_color = jQuery('#button-dialog input#icon_color').val();	 
		var icon_hv_color = jQuery('#button-dialog input#icon_hv_color').val();	 
		var image_rotate = jQuery('#button-dialog input#image_rotate').val();	 
		var img_border = jQuery('#button-dialog input#img_border').val();	 
		var round_img = jQuery('#button-dialog select#round_img').val();	 
		var image_animate = jQuery('#button-dialog select#image_animate').val();	 
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[testimonial ';
			if(heading != "What Our Clients Are Saying?") {
				output += 'heading="' + heading + '" ';
			}
			if(heading_bgcolor != "3498DB") {
				output += 'header_bg="#' + heading_bgcolor + '" ';
			}
			if(heading_color != "FFFFFF") {
				output += 'hd_color="#' + heading_color + '" ';
			}
			if(heading_size != "40px") {
				output += 'hd_size="' + heading_size + '" ';
			}
			if(quote_color != "FFFFFF") {
				output += 'quote_color="#' + quote_color + '" ';
			}	
			if(quote_bgcolor != "34495E") {
				output += 'rwpt_bg="#' + quote_bgcolor + '" ';
			}
			if(quote_animation != "bounceInLeft") {
				output += 'quote_style="' + quote_animation + '" ';
			}
			if(client_name_color != "FFFFFF") {
				output += 'client_color="#' + client_name_color + '" ';
			}
			if(com_name_color != "666666") {
				output += 'company_color="#' + com_name_color + '" ';
			}
			if(cl_info_bgcolor != "F39C12") {
				output += 'client_info_bg="#' + cl_info_bgcolor + '" ';
			}
			if(cl_info_anim != "bounceInRight") {
				output += 'client_info_style="' + cl_info_anim + '" ';
			}
			if(icon_color != "3498DB") {
				output += 'icon_color="#' + icon_color + '" ';
			}
			if(icon_hv_color != "9ED750") {
			output += 'iconhover_color="#' + icon_hv_color + '" ';
			}
			if(image_rotate != "0") {
				output += 'imgrotate="' + image_rotate + '" ';
			}
			if(image_animate != "bounceInRight") {
				output += 'img_style="' + image_animate + '" ';
			}
			if(round_img != "0") {
				output += 'imground="' + round_img + '" ';
			}
			if(img_border != "0px solid #eee") {
				output += 'img_border="' + img_border + '"';
			}
			
			output += ']'+ButtonDialog.local_ed.selection.getContent() + '[client_info][rwpt_quote][/testimonial]';
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>

</head>
<body>
	<div id="button-dialog">
		<form action="/" method="get" accept-charset="utf-8">
			<p class="notice">NOTE: If you don't change any field, default value will be used.</p>
			<h4>Testimonial Heading</h4>
			<hr>
			<div id="testimonal_heading">
				<div class="left">
					<label for="rwpt_heading">Testimonial Heading:</label>
					<input type="text" name="rwpt_heading" value="What Our Clients Are Saying?" id="rwpt_heading" />
				</div>
				<div class="right">
					<label for="rwpt_h_fontsize">Font Size:</label>
					<input type="text" name="rwpt_h_fontsize" value="40px" id="rwpt_h_fontsize" />
				</div>
				<div class="left">
					<label for="rwpt_h_color">Heading color:</label>
					<input class="color" name="rwpt_h_color" value="#FFFFFF" id="rwpt_h_color" />
				</div>
				<div class="right">
					<label for="rwpt_h_bgcolor">Heading Background:</label>
					<input class="color" name="rwpt_h_bgcolor" value="#3498db" id="rwpt_h_bgcolor" />
				</div>
			</div>
			<h4>Testimonial Setting</h4>
			<hr>
			<div>
				<div class="left">
					<label for="quote_color">Color:</label>
					<input class="color" name="quote_color" value="#FFFFFF" id="quote_color" />
				</div>
				<div class="right">
					<label for="quote_bgcolor">Background Color:</label>
					<input class="color" name="quote_bgcolor" value="#34495e" id="quote_bgcolor" />
				</div>
				<div class="left">
					<label for="quote_animation">Animation Style:</label>
					<select name="quote_animation" id="quote_animation" size="1">
						<optgroup label="Attention Seekers">
						  <option value="bounce">bounce</option>
						  <option value="flash">flash</option>
						  <option value="pulse">pulse</option>
						  <option value="rubberBand">rubberBand</option>
						  <option value="shake">shake</option>
						  <option value="swing">swing</option>
						  <option value="tada">tada</option>
						  <option value="wobble">wobble</option>
						</optgroup>

						<optgroup label="Bouncing Entrances">
						  <option value="bounceIn">bounceIn</option>
						  <option value="bounceInDown">bounceInDown</option>
						  <option value="bounceInLeft" selected="selected">bounceInLeft</option>
						  <option value="bounceInRight">bounceInRight</option>
						  <option value="bounceInUp">bounceInUp</option>
						</optgroup>

						<optgroup label="Bouncing Exits">
						  <option value="bounceOut">bounceOut</option>
						  <option value="bounceOutDown">bounceOutDown</option>
						  <option value="bounceOutLeft">bounceOutLeft</option>
						  <option value="bounceOutRight">bounceOutRight</option>
						  <option value="bounceOutUp">bounceOutUp</option>
						</optgroup>

						<optgroup label="Fading Entrances">
						  <option value="fadeIn">fadeIn</option>
						  <option value="fadeInDown">fadeInDown</option>
						  <option value="fadeInDownBig">fadeInDownBig</option>
						  <option value="fadeInLeft">fadeInLeft</option>
						  <option value="fadeInLeftBig">fadeInLeftBig</option>
						  <option value="fadeInRight">fadeInRight</option>
						  <option value="fadeInRightBig">fadeInRightBig</option>
						  <option value="fadeInUp">fadeInUp</option>
						  <option value="fadeInUpBig">fadeInUpBig</option>
						</optgroup>

						<optgroup label="Fading Exits">
						  <option value="fadeOut">fadeOut</option>
						  <option value="fadeOutDown">fadeOutDown</option>
						  <option value="fadeOutDownBig">fadeOutDownBig</option>
						  <option value="fadeOutLeft">fadeOutLeft</option>
						  <option value="fadeOutLeftBig">fadeOutLeftBig</option>
						  <option value="fadeOutRight">fadeOutRight</option>
						  <option value="fadeOutRightBig">fadeOutRightBig</option>
						  <option value="fadeOutUp">fadeOutUp</option>
						  <option value="fadeOutUpBig">fadeOutUpBig</option>
						</optgroup>

						<optgroup label="Flippers">
						  <option value="flip">flip</option>
						  <option value="flipInX">flipInX</option>
						  <option value="flipInY">flipInY</option>
						  <option value="flipOutX">flipOutX</option>
						  <option value="flipOutY">flipOutY</option>
						</optgroup>

						<optgroup label="Lightspeed">
						  <option value="lightSpeedIn">lightSpeedIn</option>
						  <option value="lightSpeedOut">lightSpeedOut</option>
						</optgroup>

						<optgroup label="Rotating Entrances">
						  <option value="rotateIn">rotateIn</option>
						  <option value="rotateInDownLeft">rotateInDownLeft</option>
						  <option value="rotateInDownRight">rotateInDownRight</option>
						  <option value="rotateInUpLeft">rotateInUpLeft</option>
						  <option value="rotateInUpRight">rotateInUpRight</option>
						</optgroup>

						<optgroup label="Rotating Exits">
						  <option value="rotateOut">rotateOut</option>
						  <option value="rotateOutDownLeft">rotateOutDownLeft</option>
						  <option value="rotateOutDownRight">rotateOutDownRight</option>
						  <option value="rotateOutUpLeft">rotateOutUpLeft</option>
						  <option value="rotateOutUpRight">rotateOutUpRight</option>
						</optgroup>

						<optgroup label="Specials">
						  <option value="hinge">hinge</option>
						  <option value="rollIn">rollIn</option>
						  <option value="rollOut">rollOut</option>
						</optgroup>

						<optgroup label="Zoom Entrances">
						  <option value="zoomIn">zoomIn</option>
						  <option value="zoomInDown">zoomInDown</option>
						  <option value="zoomInLeft">zoomInLeft</option>
						  <option value="zoomInRight">zoomInRight</option>
						  <option value="zoomInUp">zoomInUp</option>
						</optgroup>

						<optgroup label="Zoom Exits">
						  <option value="zoomOut">zoomOut</option>
						  <option value="zoomOutDown">zoomOutDown</option>
						  <option value="zoomOutLeft">zoomOutLeft</option>
						  <option value="zoomOutRight">zoomOutRight</option>
						  <option value="zoomOutUp">zoomOutUp</option>
						</optgroup>
					  </select>
				</div>
			</div>
			<div style="clear:both;">
			<h4>Client Info Setting</h4>
			<hr>
			<div>
				<div class="left">
					<label for="client_name_color">Client Name:</label>
					<input class="color" name="client_name_color" value="#FFFFFF" id="client_name_color" />
				</div>
				<div class="right">
					<label for="com_name_color">Company Name:</label>
					<input class="color" name="com_name_color" value="#666666" id="com_name_color" />
				</div>
				<div class="left">
					<label for="cl_info_bgcolor">Background Color:</label>
					<input class="color" name="cl_info_bgcolor" value="#f39c12" id="cl_info_bgcolor" />
				</div>
				<div class="right">
					<label for="cl_info_anim">Animation Style:</label>
					<select name="cl_info_anim" id="cl_info_anim" size="1">
						<optgroup label="Attention Seekers">
						  <option value="bounce">bounce</option>
						  <option value="flash">flash</option>
						  <option value="pulse">pulse</option>
						  <option value="rubberBand">rubberBand</option>
						  <option value="shake">shake</option>
						  <option value="swing">swing</option>
						  <option value="tada">tada</option>
						  <option value="wobble">wobble</option>
						</optgroup>

						<optgroup label="Bouncing Entrances">
						  <option value="bounceIn">bounceIn</option>
						  <option value="bounceInDown">bounceInDown</option>
						  <option value="bounceInLeft">bounceInLeft</option>
						  <option value="bounceInRight" selected="selected">bounceInRight</option>
						  <option value="bounceInUp">bounceInUp</option>
						</optgroup>

						<optgroup label="Bouncing Exits">
						  <option value="bounceOut">bounceOut</option>
						  <option value="bounceOutDown">bounceOutDown</option>
						  <option value="bounceOutLeft">bounceOutLeft</option>
						  <option value="bounceOutRight">bounceOutRight</option>
						  <option value="bounceOutUp">bounceOutUp</option>
						</optgroup>

						<optgroup label="Fading Entrances">
						  <option value="fadeIn">fadeIn</option>
						  <option value="fadeInDown">fadeInDown</option>
						  <option value="fadeInDownBig">fadeInDownBig</option>
						  <option value="fadeInLeft">fadeInLeft</option>
						  <option value="fadeInLeftBig">fadeInLeftBig</option>
						  <option value="fadeInRight">fadeInRight</option>
						  <option value="fadeInRightBig">fadeInRightBig</option>
						  <option value="fadeInUp">fadeInUp</option>
						  <option value="fadeInUpBig">fadeInUpBig</option>
						</optgroup>

						<optgroup label="Fading Exits">
						  <option value="fadeOut">fadeOut</option>
						  <option value="fadeOutDown">fadeOutDown</option>
						  <option value="fadeOutDownBig">fadeOutDownBig</option>
						  <option value="fadeOutLeft">fadeOutLeft</option>
						  <option value="fadeOutLeftBig">fadeOutLeftBig</option>
						  <option value="fadeOutRight">fadeOutRight</option>
						  <option value="fadeOutRightBig">fadeOutRightBig</option>
						  <option value="fadeOutUp">fadeOutUp</option>
						  <option value="fadeOutUpBig">fadeOutUpBig</option>
						</optgroup>

						<optgroup label="Flippers">
						  <option value="flip">flip</option>
						  <option value="flipInX">flipInX</option>
						  <option value="flipInY">flipInY</option>
						  <option value="flipOutX">flipOutX</option>
						  <option value="flipOutY">flipOutY</option>
						</optgroup>

						<optgroup label="Lightspeed">
						  <option value="lightSpeedIn">lightSpeedIn</option>
						  <option value="lightSpeedOut">lightSpeedOut</option>
						</optgroup>

						<optgroup label="Rotating Entrances">
						  <option value="rotateIn">rotateIn</option>
						  <option value="rotateInDownLeft">rotateInDownLeft</option>
						  <option value="rotateInDownRight">rotateInDownRight</option>
						  <option value="rotateInUpLeft">rotateInUpLeft</option>
						  <option value="rotateInUpRight">rotateInUpRight</option>
						</optgroup>

						<optgroup label="Rotating Exits">
						  <option value="rotateOut">rotateOut</option>
						  <option value="rotateOutDownLeft">rotateOutDownLeft</option>
						  <option value="rotateOutDownRight">rotateOutDownRight</option>
						  <option value="rotateOutUpLeft">rotateOutUpLeft</option>
						  <option value="rotateOutUpRight">rotateOutUpRight</option>
						</optgroup>

						<optgroup label="Specials">
						  <option value="hinge">hinge</option>
						  <option value="rollIn">rollIn</option>
						  <option value="rollOut">rollOut</option>
						</optgroup>

						<optgroup label="Zoom Entrances">
						  <option value="zoomIn">zoomIn</option>
						  <option value="zoomInDown">zoomInDown</option>
						  <option value="zoomInLeft">zoomInLeft</option>
						  <option value="zoomInRight">zoomInRight</option>
						  <option value="zoomInUp">zoomInUp</option>
						</optgroup>

						<optgroup label="Zoom Exits">
						  <option value="zoomOut">zoomOut</option>
						  <option value="zoomOutDown">zoomOutDown</option>
						  <option value="zoomOutLeft">zoomOutLeft</option>
						  <option value="zoomOutRight">zoomOutRight</option>
						  <option value="zoomOutUp">zoomOutUp</option>
						</optgroup>
					  </select>
				</div>
				<div class="left">
					<label for="icon_color">Social Icon Color:</label>
					<input class="color" name="icon_color" value="#3498DB" id="icon_color" />
				</div>
				<div class="right">
					<label for="icon_hv_color">Icon Hover Color:</label>
					<input class="color" name="icon_hv_color" value="#9ED750" id="icon_hv_color" />
				</div>
			</div>
			<div style="clear:both;">
			<h4>Image Setting</h4>
			<hr>
			<div class="left">
				<label for="image_rotate">Image Rotate:</label>
				<input input="text" name="image_rotate" value="0" id="image_rotate" />
			</div>
			<div class="right">
				<label for="image_animate">Animation Style:</label>
				<select name="image_animate" id="image_animate" size="1">
					  <option value="none">No Animation</option>
					<optgroup label="Attention Seekers">
					  <option value="bounce">bounce</option>
					  <option value="flash">flash</option>
					  <option value="pulse">pulse</option>
					  <option value="rubberBand">rubberBand</option>
					  <option value="shake">shake</option>
					  <option value="swing">swing</option>
					  <option value="tada">tada</option>
					  <option value="wobble">wobble</option>
					</optgroup>

					<optgroup label="Bouncing Entrances">
					  <option value="bounceIn">bounceIn</option>
					  <option value="bounceInDown">bounceInDown</option>
					  <option value="bounceInLeft">bounceInLeft</option>
					  <option value="bounceInRight" selected="selected">bounceInRight</option>
					  <option value="bounceInUp">bounceInUp</option>
					</optgroup>

					<optgroup label="Bouncing Exits">
					  <option value="bounceOut">bounceOut</option>
					  <option value="bounceOutDown">bounceOutDown</option>
					  <option value="bounceOutLeft">bounceOutLeft</option>
					  <option value="bounceOutRight">bounceOutRight</option>
					  <option value="bounceOutUp">bounceOutUp</option>
					</optgroup>

					<optgroup label="Fading Entrances">
					  <option value="fadeIn">fadeIn</option>
					  <option value="fadeInDown">fadeInDown</option>
					  <option value="fadeInDownBig">fadeInDownBig</option>
					  <option value="fadeInLeft">fadeInLeft</option>
					  <option value="fadeInLeftBig">fadeInLeftBig</option>
					  <option value="fadeInRight">fadeInRight</option>
					  <option value="fadeInRightBig">fadeInRightBig</option>
					  <option value="fadeInUp">fadeInUp</option>
					  <option value="fadeInUpBig">fadeInUpBig</option>
					</optgroup>

					<optgroup label="Fading Exits">
					  <option value="fadeOut">fadeOut</option>
					  <option value="fadeOutDown">fadeOutDown</option>
					  <option value="fadeOutDownBig">fadeOutDownBig</option>
					  <option value="fadeOutLeft">fadeOutLeft</option>
					  <option value="fadeOutLeftBig">fadeOutLeftBig</option>
					  <option value="fadeOutRight">fadeOutRight</option>
					  <option value="fadeOutRightBig">fadeOutRightBig</option>
					  <option value="fadeOutUp">fadeOutUp</option>
					  <option value="fadeOutUpBig">fadeOutUpBig</option>
					</optgroup>

					<optgroup label="Flippers">
					  <option value="flip">flip</option>
					  <option value="flipInX">flipInX</option>
					  <option value="flipInY">flipInY</option>
					  <option value="flipOutX">flipOutX</option>
					  <option value="flipOutY">flipOutY</option>
					</optgroup>

					<optgroup label="Lightspeed">
					  <option value="lightSpeedIn">lightSpeedIn</option>
					  <option value="lightSpeedOut">lightSpeedOut</option>
					</optgroup>

					<optgroup label="Rotating Entrances">
					  <option value="rotateIn">rotateIn</option>
					  <option value="rotateInDownLeft">rotateInDownLeft</option>
					  <option value="rotateInDownRight">rotateInDownRight</option>
					  <option value="rotateInUpLeft">rotateInUpLeft</option>
					  <option value="rotateInUpRight">rotateInUpRight</option>
					</optgroup>

					<optgroup label="Rotating Exits">
					  <option value="rotateOut">rotateOut</option>
					  <option value="rotateOutDownLeft">rotateOutDownLeft</option>
					  <option value="rotateOutDownRight">rotateOutDownRight</option>
					  <option value="rotateOutUpLeft">rotateOutUpLeft</option>
					  <option value="rotateOutUpRight">rotateOutUpRight</option>
					</optgroup>

					<optgroup label="Specials">
					  <option value="hinge">hinge</option>
					  <option value="rollIn">rollIn</option>
					  <option value="rollOut">rollOut</option>
					</optgroup>

					<optgroup label="Zoom Entrances">
					  <option value="zoomIn">zoomIn</option>
					  <option value="zoomInDown">zoomInDown</option>
					  <option value="zoomInLeft">zoomInLeft</option>
					  <option value="zoomInRight">zoomInRight</option>
					  <option value="zoomInUp">zoomInUp</option>
					</optgroup>

					<optgroup label="Zoom Exits">
					  <option value="zoomOut">zoomOut</option>
					  <option value="zoomOutDown">zoomOutDown</option>
					  <option value="zoomOutLeft">zoomOutLeft</option>
					  <option value="zoomOutRight">zoomOutRight</option>
					  <option value="zoomOutUp">zoomOutUp</option>
					</optgroup>
				  </select>
			</div>
			<div class="left">
				<label for="round_img">Round Image?</label>
				<select name="round_img" id="round_img" size="1">
					  <option value="50">Yes</option>
					  <option value="0" selected="selected">No</option>
				</select>
			</div>
			<div class="right">
				<label for="img_border">Image Border:</label>
				<input class="text" name="img_border" value="0px solid #eee" id="img_border" />
			</div>
			<div style="clear:both;margin:10px;">
			<div id="insert_button">	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert">Insert Testimonial</a>
			</div>
		</form>
	</div>
</body>
</html>