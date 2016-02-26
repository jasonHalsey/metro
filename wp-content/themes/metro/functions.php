<?php

/*  Menu Support
/* ------------------------------------ */ 

	add_action( 'init', 'my_custom_menus' );
	  function my_custom_menus() {
	     register_nav_menus(
	        array(
	  		'primary-menu' => __( 'Primary Menu' ),
	  		'secondary-menu' => __( 'Secondary Menu' )
	                )
	         );
	  }

/*  Remove Admin Bar
/* ------------------------------------ */ 
	add_filter('show_admin_bar', '__return_false');


/*  Remove the ... from excerpt and change the text
/* ------------------------------------ */
function change_excerpt_more()
{
  function new_excerpt_more($more)
    {
    // Use .read-more to style the link
      return '<br /><span class="continue-reading"> <a href="' . get_permalink() . '"> Read More &#10142;</a></span>';
    }
  add_filter('excerpt_more', 'new_excerpt_more');
}
add_action('after_setup_theme', 'change_excerpt_more');


/*  Enqueue css
/* ------------------------------------ */ 
	function metro_styles() 
	{
	    wp_enqueue_style( 'style', get_stylesheet_uri() );
	}

	add_action( 'wp_enqueue_scripts', 'metro_styles' ); 

/*  Enqueue scripts
/* ------------------------------------ */ 
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
	   wp_enqueue_script('jquery');
	}


	function wpb_adding_scripts() {
	  wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/metro-scripts.js');
	  wp_enqueue_script('scripts');
	}
	add_action( 'wp_footer', 'wpb_adding_scripts' );  

// ################### Theme Options Page ############################


	function add_theme_menu_item()
	{
		add_menu_page("Metro Options", "Metro Options", "manage_options", "theme-panel", "theme_settings_page", null, 99);
	}

	add_action("admin_menu", "add_theme_menu_item");



	function theme_settings_page()
	{
	    ?>
		    <div class="wrap">
		    <h1>Metro Options</h1>
		    <form method="post" action="options.php" class="theme_options">
		        <?php
		            settings_fields("section");
		            do_settings_sections("theme-options");      
		            submit_button(); 
		        ?>          
		    </form>
			</div>
		<?php
	}

	function display_paylink_element()
	{
		?>
	    	<input type="text" name="paylink_url" id="paylink_url" value="<?php echo get_option('paylink_url'); ?>" />
	    
	    <?php
	}

	function display_email_element()
	{
		?>
	    	<input type="text" name="email_url" id="email_url" value="<?php echo get_option('email_url'); ?>" />
	    
	    <?php
	}

	function display_privacy_element()
	{
		?>
	    	<input type="text" name="privacy_url" id="privacy_url" value="<?php echo get_option('privacy_url'); ?>" />
	    
	    <?php
	}

	function localstorage_element()
	{
		?>
	    	<input type="text" name="localstorage_url" id="localstorage_url" value="<?php echo get_option('localstorage_url'); ?>" />
	    
	    <?php
	}

	function twitter_element()
	{
		?>
	    	<input type="text" name="twitter_url" id="twitter_url" class="block-end" value="<?php echo get_option('twitter_url'); ?>" />
	    <?php
	}
	function facebook_element()
	{
		?>
	    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
	    
	    <?php
	}

	function display_phone_element()
	{
		?>
	    	<input type="text" name="phone_number" id="phone_number" value="<?php echo get_option('phone_number'); ?>" />
	    <?php
	}

	function display_logo_element()
	{
		?>
	    	<input type="text" name="logo_url" id="logo_url" value="<?php echo get_option('logo_url'); ?>" />
	    <?php
	}

	function display_theme_panel_fields()
	{
		add_settings_section("section", "Metro Theme Settings", null, "theme-options");

		add_settings_field("phone_number", "Location Phone Number", "display_phone_element", "theme-options", "section");
    add_settings_field("logo_url", "Logo URL", "display_logo_element", "theme-options", "section");

		add_settings_field("paylink_url", "Pay Online Button Url", "display_paylink_element", "theme-options", "section");
		add_settings_field("email_url", "Email Address", "display_email_element", "theme-options", "section");
		add_settings_field("privacy_url", "Privacy Policy URL", "display_privacy_element", "theme-options", "section");

		add_settings_field("localstorage_url", "Find Local Storage URL", "localstorage_element", "theme-options", "section");
		add_settings_field("twitter_url", "Twitter Footer Icon URL", "twitter_element", "theme-options", "section");
		add_settings_field("facebook_url", "Facebook Footer Icon URL", "facebook_element", "theme-options", "section");

    register_setting("section", "logo_url");
    register_setting("section", "phone_number");
    register_setting("section", "paylink_url");
    register_setting("section", "email_url");
    register_setting("section", "privacy_url");
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    
	}

	add_action("admin_init", "display_theme_panel_fields");

	add_action('admin_head', 'my_custom_admin_css');

	function my_custom_admin_css() {
	  echo '<style>
	    form.theme_options tr:nth-child(even){
		border-bottom:1px solid #bababa;
	    } 
	    form.theme_options tr:nth-child(even) th{
		margin-top:0;
		padding: 0px 10px 20px 0;
	    } 
	    form.theme_options tr:nth-child(even) td{
		padding: 0px 10px 15px;
	    } 
	  </style>';
	}

?>