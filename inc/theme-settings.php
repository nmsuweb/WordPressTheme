<?php
	/*
		Theme Settings:
	*/
	/*
		after_setup_theme

		adds environmental variables for theme settings
	*/
	function nmsu_theme_settings_setup() {
		$settings = array ( 
			// Text color and image (empty to use none).
		    'default-text-color'     => '444',
		    'default-image'          => get_bloginfo ( "template_directory" ) . '/img/swim.jpg', //This can be changed to a better default image later.

		    // Header options
		    'header_plugin-shortcode'  => "",
		    'header_image-path' => "",
		    'header_type' => 0,     //0 = fullsize image, 1=layout ( Image + Text ), 2=plugin
		    
		    // Set height and width, with a maximum value for the width.
		    'height'                 => 450,
		    'width'                  => 960,
		    'max-width'              => 2000,

		    // Support flexible height and width.
		    'flex-height'            => true,
		    'flex-width'             => true,

		);
		add_option('nmsu_theme_options', $settings);
	}
	add_action( 'after_setup_theme', 'nmsu_theme_settings_setup' );
	
	/*
		setup_theme_settings_menu

		adds in a link under the theme menu to view theme settings.
	*/
	function setup_theme_settings_menu ( ) {
	    add_submenu_page('themes.php',
	        'NMSU Theme Settings', 'NMSU Theme Settings', 'manage_options',
	        'settings', 'theme_settings');
	}
	add_action("admin_menu", "setup_theme_settings_menu");  

	/*
		Theme
	*/
	function theme_settings ( ) {
		//Check that the user has sufficient permissions
		/*
		if ( !current_user_can('manage_options') ) {
			//If user doesn't end execution of this function
			wp_die ( "You don't have sufficient permissions to access this page." );
		}
		*/
		//We will now break out of PHP to save processing of raw HTML.
?>
		<div class="wrap">  
			<?php 
			$settings = get_option('nmsu_theme_options');
			if(isset($_POST)):
				foreach($_POST as $setting => $value){
				//echo "<p>$setting -> $value</p>";
					if(isset($value)):
						$settings[$setting] = $value;
					endif;
				}
				update_option('nmsu_theme_options', $settings);
			endif;
			 ?>

	        <?php screen_icon('themes'); ?> <h2>Front page elements</h2>  
	        <script type="text/javascript" language="javascript">
	        	//Display current header type setting, checking agiast header type drop down.
	        	var updateVisibleHeaderSetting = function ( ) {
	        		if ( jQuery ( "#header_type" ).val() == "1" ) {
	        			jQuery ( '#header_setting_shortcode' ).show ( );
	        			jQuery ( '#header_setting_image' ).hide ( );
	        		} else {
	        			jQuery ( '#header_setting_image' ).show ( );
	        			jQuery ( '#header_setting_shortcode' ).hide ( );
		        	}
	        	}
	        	jQuery( document ).ready ( function ( ) {
	        		//Display current header type
	        		updateVisibleHeaderSetting ( );
	        		//Add onChange event handler to header_type
	        		jQuery ( "#header_type" ).change ( function ( ) {
	        			//Catch change events to see if shortcode textarea should be visible
	        			updateVisibleHeaderSetting ( );
	        		} );
	        	} );
	        </script>
	        <form method="POST" action="">  
	            <table class="form-table">
	            	<!--Header type so we can designate how we want it to work.-->
	            	<!--This feature should also be available when adding a page-->  
	                <tr valign="top">  
	                    <th scope="row">  
	                        <label for="header_type">  
	                            Header Type:  
	                        </label>  
	                    </th>  
	                    <td>  
	                        <select id="header_type" name="header_type">
	                        	<option value="0"<?php echo ($settings["header_type"]==0? " selected='selected'" : "");?>>Image</option>
	                        	<option value="1"<?php echo ($settings["header_type"]==1? " selected='selected'" : "");?>>Shortcode</option>
	                        </select>
	                    </td>  
	                    <th scope="row">
	                    	<label for="header_change">
	                    		Header:
	                    	</label>
	                    </th>
	                    <td width="400px"><!--Display selected option only-->
	                    	<div id='header_setting_image'>
	                    		<!--Display upload form option for image-->
	                    		<a href="?page=custom-header">View Options</a>
	                    	</div>
	                    	<div id='header_setting_shortcode'>
	                    		<!--Display textarea for shortcode input-->
	                    		<!--Shortcode is meant for a slideshow at this moment but you can put anything-->
	                    		<textarea id="header_plugin-shortcode" name="header_plugin-shortcode" cols="50"><?php echo stripslashes($settings["header_plugin-shortcode"])?></textarea>
	                    	</div>
	                    </td>	
	                </tr>  
	                <tr valign="top">  
	                    <th scope="row">  
	                        <label for="search_method" title="This is the default search method that the search box in the upper-right corner will direct users to.">  
	                            Search Method:  
	                        </label>  
	                    </th>  
	                    <td>
	                        <select name="search_method" id="search_method">
	                        	<option value="default"			<?php echo (!isset($settings['search_method']) || $settings['search_method']=='default'? " selected='selected'" : "");?>>Wordpress Default</option>
	                        	<option value="google"			<?php echo ($settings['search_method']=='google'? " selected='selected'" : "");?>>Google Search</option>
	                        	<!--<option value="google_custom"	<?php echo ($settings['search_method']=='google_custom'? " selected='selected'" : "");?>>Google Custom</option>-->
	                        </select>
	                    </td>  
	                </tr>
	                <tr valign="top">  
	                    <th scope="row">  
	                        <label for="custom_css" title="Place any sitewide css classes here that aren't natively supported by the theme.">  
	                            Additional CSS:
	                        </label>
	                    </th>  
	                    <td>
	                        <textarea name="custom_css" id="custom_css" rows="5" cols="80"><?php echo ($settings['custom_css']);?></textarea>
	                    </td>  
	                </tr>
                      
	            </table>
	            <input type="submit" label="Submit">  
	        </form>  
	    </div>  
<?php

	}

?>