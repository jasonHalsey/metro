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


/*  Breadcrumbs
  /* ------------------------------------ */

function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}






?>