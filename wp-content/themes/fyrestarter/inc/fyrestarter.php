<?php
// REGISTER
	if(is_admin()) // admin actions
	{ 
	    add_action( 'admin_menu', 'fyre_menu' );
	    add_action( 'admin_init', 'register_fyre_settings' );
	}
	function register_fyre_settings()
	{ 
	    register_setting('fyre-options', 'logo_url');
	    register_setting('fyre-options', 'alt_logo_url');
	    register_setting('fyre-options', 'footer_logo_url');
	    register_setting('fyre-options', 'fav_url');
	    register_setting('fyre-options', 'schema_url');
	    register_setting('fyre-options', 'top_header');
	    register_setting('fyre-options', 'responsive_helper');
	    register_setting('fyre-options', 'phone_number');
	    register_setting('fyre-options', 'fax_number');
	    register_setting('fyre-options', 'email_address');
	    register_setting('fyre-options', 'media_email_address');
	    register_setting('fyre-options', 'the_address');
	    register_setting('fyre-options', 'the_street');
	    register_setting('fyre-options', 'the_city');
	    register_setting('fyre-options', 'the_state');
	    register_setting('fyre-options', 'the_zip');
	    register_setting('fyre-options', 'local_link');
	    //register_setting('fyre-options', 'the_fax');
	    register_setting('fyre-options', 'the_hours');
	    register_setting('fyre-options', 'track_code');
	    register_setting('fyre-options', 'the_css');
	    register_setting('fyre-options', 'fb_url');
	    register_setting('fyre-options', 'ig_url');
	    register_setting('fyre-options', 'ig_username');
	    register_setting('fyre-options', 'google_url');
	    //register_setting('fyre-options', 'gp_url');
	    register_setting('fyre-options', 'yt_url');
	    //register_setting('fyre-options', 'li_url');
	    //register_setting('fyre-options', 'houzz_url');
	    //register_setting('fyre-options', 'fb_img');
	    register_setting('fyre-options', 'tw_url');
	    register_setting('fyre-options', 'weed_url');
	    register_setting('fyre-options', 'leafly_url');

	    register_setting('fyre-options', 'pop_up');
	    register_setting('fyre-options', 'pop_up_header');
	    register_setting('fyre-options', 'pop_up_form');

	    register_setting('fyre-options', 'livestream_url');
	    register_setting('fyre-options', 'livestream_display');

	    register_setting('fyre-options', 'top_banner_txt');
	    register_setting('fyre-options', 'top_banner_btn_txt');
	    register_setting('fyre-options', 'top_banner_btn_link');


	}

	// ADD TO MENU
	function fyre_menu() {
	    add_theme_page( 'Fyre Options', 'Fyre Options', 'manage_options', 'global-options', 'fyre_options_page' );
	}

	//function fyre_menu() {
	  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	//  add_menu_page( 'Fyre Options', 'Fyre Options', 'manage_options', 'global-options', 'fyre_options_page', 'dashicons-welcome-widgets-menus' );
	//}

	//SETTINGS
	function fyre_options_page() {
	    if ( !current_user_can( 'manage_options' ) )  {
	        wp_die( __( 'You do not have sufficient permissions to access this page.', 'fyrestarter' ) );
	    }?>
	    <div class="wrap">
	        <h1><?php echo get_bloginfo('name'); ?> Fyre Options</h1>
	 		<div class="card">
	          	<form method="post" action="options.php" enctype="multipart/form-data">
	           <?php 
	 
	                settings_fields( 'fyre-options' );
	                do_settings_sections( 'fyre-options' );
	                 
	                //HOOKS TO INPUTS
	                $fyre_logo = get_option('logo_url', '');
	                $fyre_alt_logo = get_option('alt_logo_url', '');
	                $fyre_footer_logo = get_option('footer_logo_url', '');
	                $fyre_fav = get_option('fav_url', '');
	                $fyre_schema = get_option('schema_url', '');
	                $fyre_top_header = get_option('top_header', '');
	                $fyre_responsive = get_option('responsive_helper', '');
	                $fyre_phone = get_option('phone_number', '');
	                $fyre_fax = get_option('fax_number', '');
	                $fyre_email = get_option('email_address', '');
	                $fyre_media_email = get_option('media_email_address', '');
	                $fyre_address = get_option('the_address', '');
	                $fyre_street = get_option('the_street', '');
	                $fyre_city = get_option('the_city', '');
	                $fyre_state = get_option('the_state', '');
	                $fyre_zip = get_option('the_zip', '');
	                $fyre_local = get_option('local_link', '');
	                //$fyre_fax = get_option('the_fax', '');
	                $fyre_hours = get_option('the_hours', '');
	                $fyre_track = get_option('track_code', '');
	                $fyre_css = get_option('the_css', '');
	                $fyre_fb = get_option('fb_url', '');
	                $fyre_ig_username = get_option('ig_username', '');
	                $fyre_ig = get_option('ig_url', '');
	                $fyre_yt = get_option('yt_url', '');
	                $fyre_tw = get_option('tw_url', '');
	                //$fyre_tw_handle = get_option('tw_handle', '');
	                //$fyre_tw_img = get_option('tw_img', ''); 
	                //$fyre_google = get_option('google_url', '');
	                $fyre_weed = get_option('weed_url', '');
	                $fyre_leafly = get_option('leafly_url', '');
	                //$fyre_houzz = get_option('houzz_url', '');
	                //$fyre_gp = get_option('gp_url', '');
	               	//$fyre_address = "$fyre_street $fyre_city $fyre_state $fyre_zip";
	               	$fyre_pop_up = get_option('pop_up', '');
	               	$fyre_pop_up_header = get_option('pop_up_header', '');
	               	$fyre_pop_up_form = get_option('pop_up_form', '');

	               	$fyre_livestream_url = get_option('livestream_url', '');
	               	$fyre_livestream_display = get_option('livestream_display', '');

	               	$fyre_top_banner_txt = get_option('top_banner_txt', '');
	               	$fyre_top_banner_btn_txt = get_option('top_banner_btn_txt', '');
	               	$fyre_top_banner_btn_link = get_option('top_banner_btn_link', '');


	            ?> 
	            <!-- THE INPUTS -->
	            <section id="settings-contain">

					<h3>Logo URL</h3> 
					<img style="max-width: 100%;" src="<?php echo $fyre_logo; ?>"/>
	                <input name="logo_url" class="large-text ltr" value="<?php echo $fyre_logo; ?>">

	                <h3>Footer Logo URL</h3> 
					<img style="max-width: 100%;" src="<?php echo $fyre_footer_logo; ?>"/>
	                <input name="footer_logo_url" class="large-text ltr" value="<?php echo $fyre_footer_logo; ?>">

	                <h4>Live Sermon Url</h4>
	                <input name="livestream_url" class="large-text ltr" value="<?php echo $fyre_livestream_url; ?>">

	                <h4>Display Sermon Button</h4>
	                <input type="checkbox" name="livestream_display" class="ltr" value="1" <?php checked( 1 == $fyre_livestream_display ); ?>>

	                <h4>Banner Text</h4>
	                <input name="top_banner_txt" class="large-text ltr" value="<?php echo $fyre_top_banner_txt; ?>">

	                <h4>Banner Button Text</h4>
	                <input name="top_banner_btn_txt" class="large-text ltr" value="<?php echo $fyre_top_banner_btn_txt; ?>">

	                <h4>Banner Button Link</h4>
	                <input name="top_banner_btn_link" class="large-text ltr" value="<?php echo $fyre_top_banner_btn_link; ?>">

<!-- 					&nbsp;
	                <hr/>

					<h2>Contact Info</h2>
 	                
	                <h4>Phone Number</h4>
	                <input name="phone_number" class="large-text ltr" value="<?php echo $fyre_phone; ?>">

	                <h4>Email</h4>
	                <input name="email_address" class="large-text ltr" value="<?php echo $fyre_email; ?>">

	               	<h4>Address</h4>
	                <input name="the_address" class="large-text ltr" value="<?php echo $fyre_address; ?>">

	                <h4>Hours Of Operation</h4>
	                <input name="the_hours" class="large-text ltr" value="<?php echo $fyre_hours; ?>"> -->

<!-- 					&nbsp;
	                <hr/>

	                <h3>Pop Up Header</h3>
	                <input name="pop_up_header" class="large-text ltr" value="<?php echo $fyre_pop_up_header; ?>">

	                <h3>Pop Up Content</h3>
	                <textarea name="pop_up" rows="5" class="text-area large-text ltr"><?php echo $fyre_pop_up; ?></textarea>

	                <h3>Enable Pop Up Form</h3>
	                <input type="checkbox" name="pop_up_form" class="ltr" value="1" <?php checked( 1 == $fyre_pop_up_form ); ?>> -->

 					&nbsp;
	         		<hr/>
	                
	         		<h2>Socials</h2>

	                <h4>Instagram URL</h4>
	                <input name="ig_url" class="large-text ltr" value="<?php echo $fyre_ig; ?>">
<!--
	                <h4>Instagram Username</h4>
	                <input name="ig_username" class="large-text ltr" value="<?php echo $fyre_ig_username; ?>">

	                <h4>Weedmaps URL</h4>
	                <input name="weed_url" class="large-text ltr" value="<?php echo $fyre_weed; ?>">

	                <h4>Leafly URL</h4>
	                <input name="leafly_url" class="large-text ltr" value="<?php echo $fyre_leafly; ?>"> -->

					&nbsp;
	                <hr/>
<!--
	                <h3>Your Street Address</h3>
	                <input name="address" class="large-text ltr" value="<?php echo $fyre_address; ?>">
 
	                <h3>Hours Of Operation</h3>
	                <input name="the_hours" class="large-text ltr" value="<?php echo $fyre_hours; ?>">
	                <textarea name="the_hours" rows="15" class="text-area large-text ltr" ><?php echo $fyre_hours; ?></textarea>

	                <hr/>

	                <h3>Your SCHEMA URL</h3>
	                <input name="schema_url" class="large-text ltr" value="<?php echo $fyre_schema; ?>">
           

	                <h3>Enable Top Header Bar?</h3>
	                <input type="checkbox" name="top_header" class="ltr" value="1" <?php checked( 1 == $fyre_top_header ); ?>">

	                <h3>Enable Responsive Dev Helper?</h3>
	                <input type="checkbox" name="responsive_helper" class="ltr" value="1" <?php checked( 1 == $fyre_responsive ); ?>">
	                


	                <h3>Your Fax Number</h3>
	                <input name="the_fax" class="large-text ltr" value="<?php echo $fyre_fax; ?>">
	 
	                

	                <h3>Street Address</h3>
	                <input name="the_street" class="large-text ltr" value="<?php echo $fyre_street; ?>">

	                <h3>City</h3>
	                <input name="the_city" class="large-text ltr" value="<?php echo $fyre_city; ?>">
					
					<h3>State</h3>
	                <input name="the_state" class="large-text ltr" value="<?php echo $fyre_state; ?>">

	                <h3>Area Code</h3>
	                <input name="the_zip" class="large-text ltr" value="<?php echo $fyre_zip; ?>">
					                 
	                <h3>Your Address Output</h3>
	                <p><?php echo $fyre_address; ?></p>
	              
					<h3>Google Local URL</h3> 
	                <input name="local_link" class="large-text ltr" value="<?php echo $fyre_local; ?>">				
	         	   -->     
	                <h3>Google Analytics Code</h3>
	                <textarea name="track_code" rows="15" class="text-area large-text ltr" ><?php echo $fyre_track; ?></textarea>


 <!-- 
	                <h3>Facebook Social Image</h3>
	                <img style="max-width: 100%;" src="<?php echo $fyre_fb_img; ?>"/>
	                <input name="fb_img" class="large-text ltr" value="<?php echo $fyre_fb_img; ?>">
					
					<hr/>

	                <h3>Twitter URL</h3>
	                <input name="tw_url" class="large-text ltr" value="<?php echo $fyre_tw; ?>">

	                <h3>Twitter Handle</h3>
	                <input name="tw_handle" class="large-text ltr" value="<?php echo $fyre_tw_handle; ?>">

	                <h3>Twitter Social Image</h3>
	                <img style="max-width: 100%;" src="<?php echo $fyre_tw_img; ?>"/>
	                <input name="tw_img" class="large-text ltr" value="<?php echo $fyre_tw_img; ?>">
					
					<hr/>
					
					<h3>Instagram URL</h3>
	                <input name="ig_url" class="large-text ltr" value="<?php echo $fyre_ig; ?>">

	                <h3>Google+ URL</h3>
	                <input name="gp_url" class="large-text ltr" value="<?php echo $fyre_gp; ?>">

	                <h3>LinkedIn URL</h3>
	                <input name="li_url" class="large-text ltr" value="<?php echo $fyre_li; ?>">

	                <hr/>

	                <h3>Custom CSS</h3> 
	                <textarea name="the_css" class="text-area large-text ltr"><?php echo $fyre_css; ?></textarea>
	-->                 
	            </section>
	            <?php submit_button(); ?>
	        </form>
	        </div>
	    </div><!-- END WRAP --> 
	    <script type="text/javascript">//<![CDATA[
			jQuery(function($) {
				var $textArea = $(".text-area");

				// Re-size to fit initial content.
				resizeTextArea($textArea);

				// Remove this binding if you don't want to re-size on typing.
				$textArea.off("keyup.textarea").on("keyup.textarea", function() {
				    resizeTextArea($(this));
				});

				function resizeTextArea($element) {
				    $element.height($element[0].scrollHeight);
				}
			});
		</script>
	    <?php
	} ?>