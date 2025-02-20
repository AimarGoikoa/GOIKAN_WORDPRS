<div class="theme-offer">
	<?php
        // Check if the demo import has been completed
        $fast_food_pizza_demo_import_completed = get_option('fast_food_pizza_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($fast_food_pizza_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'fast-food-pizza') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'fast-food-pizza') . '</a></span>';
        }
		
        if (isset($_POST['submit'])) {

            //Check if WooCommerce is installed and activated
            if (!is_plugin_active('woocommerce/woocommerce.php')) {
                // Install the plugin if it doesn't exist
                $fast_food_pizza_plugin_slug = 'woocommerce';
                $fast_food_pizza_plugin_file = 'woocommerce/woocommerce.php';

                // Check if plugin is installed
                $fast_food_pizza_installed_plugins = get_plugins();
                if (!isset($fast_food_pizza_installed_plugins[$fast_food_pizza_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                    // Install the plugin
                    $fast_food_pizza_upgrader = new Plugin_Upgrader();
                    $fast_food_pizza_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($fast_food_pizza_plugin_file);
            }

            //Check if YITH WooCommerce Wishlist is installed and activated
            if (!is_plugin_active('yith-woocommerce-wishlist/yith-woocommerce-wishlist.php')) {
                // Install the plugin if it doesn't exist
                $fast_food_pizza_plugin_slug = 'yith-woocommerce-wishlist';
                $fast_food_pizza_plugin_file = 'yith-woocommerce-wishlist/yith-woocommerce-wishlist.php';

                // Check if plugin is installed
                $fast_food_pizza_installed_plugins = get_plugins();
                if (!isset($fast_food_pizza_installed_plugins[$fast_food_pizza_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                    // Install the plugin
                    $fast_food_pizza_upgrader = new Plugin_Upgrader();
                    $fast_food_pizza_upgrader->install('https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($fast_food_pizza_plugin_file);
            }

            // ------- Create Nav Menu --------
            $fast_food_pizza_menuname = 'Main Menus';
            $fast_food_pizza_bpmenulocation = 'primary';
            $fast_food_pizza_menu_exists = wp_get_nav_menu_object($fast_food_pizza_menuname);

            // Define menu names and locations
            $fast_food_pizza_menuname_left = 'Primary Left Menu';
            $fast_food_pizza_bpmenulocation_left = 'left-menu';
            $fast_food_pizza_menuname_right = 'Primary Right Menu';
            $fast_food_pizza_bpmenulocation_right = 'right-menu';

            // Check if the left menu exists
            $fast_food_pizza_left_menu_exists = wp_get_nav_menu_object($fast_food_pizza_menuname_left);

            if (!$fast_food_pizza_left_menu_exists) {
                $fast_food_pizza_left_menu_id = wp_create_nav_menu($fast_food_pizza_menuname_left);

                // Create Home Page
                $fast_food_pizza_home_title = 'Home';
                $fast_food_pizza_home = array(
                    'post_type' => 'page',
                    'post_title' => $fast_food_pizza_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $fast_food_pizza_home_id = wp_insert_post($fast_food_pizza_home);
                add_post_meta($fast_food_pizza_home_id, '_wp_page_template', 'page-template/home-page.php');
                update_option('page_on_front', $fast_food_pizza_home_id);
                update_option('show_on_front', 'page');

                // Add Home Page to Left Menu
                wp_update_nav_menu_item($fast_food_pizza_left_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'fast-food-pizza'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $fast_food_pizza_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Add 'Pages' to Left Menu
                $fast_food_pizza_pages_title = 'Pages';
                $fast_food_pizza_pages_content = 'Explore all the contact we have on our website. Find information about our services, company, and more.
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more contactly with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'; // Your dummy content
                $fast_food_pizza_pages = array(
                    'post_type' => 'page',
                    'post_title' => $fast_food_pizza_pages_title,
                    'post_content' => $fast_food_pizza_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $fast_food_pizza_pages_id = wp_insert_post($fast_food_pizza_pages);
                wp_update_nav_menu_item($fast_food_pizza_left_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'fast-food-pizza'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $fast_food_pizza_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Add 'About Us' to Left Menu
                $fast_food_pizza_about_title = 'About Us';
                $fast_food_pizza_about_content = 'Explore all the contact we have on our website. Find information about our services, company, and more.
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more contactly with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'; // Your dummy content
                $fast_food_pizza_about = array(
                    'post_type' => 'page',
                    'post_title' => $fast_food_pizza_about_title,
                    'post_content' => $fast_food_pizza_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $fast_food_pizza_about_id = wp_insert_post($fast_food_pizza_about);
                wp_update_nav_menu_item($fast_food_pizza_left_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'fast-food-pizza'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $fast_food_pizza_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Assign Left Menu to its location
                if (!has_nav_menu($fast_food_pizza_bpmenulocation_left)) {
                    $locations = get_theme_mod('nav_menu_locations');
                    if (empty($locations)) {
                        $locations = array();
                    }
                    $locations[$fast_food_pizza_bpmenulocation_left] = $fast_food_pizza_left_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }

            // Check if the right menu exists
            $fast_food_pizza_right_menu_exists = wp_get_nav_menu_object($fast_food_pizza_menuname_right);

            if (!$fast_food_pizza_right_menu_exists) {
                $fast_food_pizza_right_menu_id = wp_create_nav_menu($fast_food_pizza_menuname_right);

                // Add Home Page to Right Menu (can be the same page or different logic if needed)
                wp_update_nav_menu_item($fast_food_pizza_right_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'fast-food-pizza'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $fast_food_pizza_home_id, // Reuse the same home ID
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Add 'Pages' to Right Menu
                wp_update_nav_menu_item($fast_food_pizza_right_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'fast-food-pizza'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $fast_food_pizza_pages_id, // Reuse the same page ID
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Add 'About Us' to Right Menu
                wp_update_nav_menu_item($fast_food_pizza_right_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'fast-food-pizza'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $fast_food_pizza_about_id, // Reuse the same about ID
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Assign Right Menu to its location
                if (!has_nav_menu($fast_food_pizza_bpmenulocation_right)) {
                    $fast_food_pizza_locations = get_theme_mod('nav_menu_locations');
                    if (empty($fast_food_pizza_locations)) {
                        $fast_food_pizza_locations = array();
                    }
                    $fast_food_pizza_locations[$fast_food_pizza_bpmenulocation_right] = $fast_food_pizza_right_menu_id;
                    set_theme_mod('nav_menu_locations', $fast_food_pizza_locations);
                }
            }

            //Header
            set_theme_mod('fast_food_pizza_phone_text', 'For Delivery, Call Us');
            set_theme_mod('fast_food_pizza_phone_number', '+00 123 456 7890');
            set_theme_mod('fast_food_pizza_header_btn_text', 'MAKE YOUR PIZZA');
            set_theme_mod('fast_food_pizza_header_btn_url', '#');

            //Social Icon
            set_theme_mod('fast_food_pizza_facebook_url', '#');
            set_theme_mod('fast_food_pizza_twitter_url', '#');
            set_theme_mod('fast_food_pizza_instagram_url', '#');
            set_theme_mod('fast_food_pizza_pinterest_url', '#');

            //Slider Section
            set_theme_mod('fast_food_pizza_slider_button_text', 'ORDER ONLINE NOW');
            set_theme_mod('fast_food_pizza_slider_button_link', '#');

            for($fast_food_pizza_i=1;$fast_food_pizza_i<=4;$fast_food_pizza_i++){
                $fast_food_pizza_slider_title = array(
                    'SHARE YOUR LOVE FOR PIZZA',
                    'INDULGE IN EVERY SLICE OF HAPPINESS',
                    'FRESH INGREDIENTS, DELICIOUS FLAVORS',
                    'SATISFY YOUR CRAVINGS WITH EVERY BITE'
                );                
                $fast_food_pizza_slider_content = 'Buy the most appetizing pizza you\'ve never eaten before in your life!';

                $fast_food_pizza_current_title = $fast_food_pizza_slider_title[$fast_food_pizza_i - 1];
                // Create post object
                $fast_food_pizza_my_post = array(
                'post_title'    => wp_strip_all_tags( $fast_food_pizza_current_title ),
                'post_content'  => $fast_food_pizza_slider_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                );
 
                // Insert the post into the database
                $fast_food_pizza_post_id = wp_insert_post( $fast_food_pizza_my_post );
 
                if ($fast_food_pizza_post_id) {
                  // Set the theme mod for the slider page
                  set_theme_mod('fast_food_pizza_slider_setting' . $fast_food_pizza_i, $fast_food_pizza_post_id);
 
                   $fast_food_pizza_image_url = get_template_directory_uri().'/images/slider'.$fast_food_pizza_i.'.png';
 
                 $fast_food_pizza_image_id = media_sideload_image($fast_food_pizza_image_url, $fast_food_pizza_post_id, null, 'id');
 
                     if (!is_wp_error($fast_food_pizza_image_id)) {
                         // Set the downloaded image as the post's featured image
                         set_post_thumbnail($fast_food_pizza_post_id, $fast_food_pizza_image_id);
                     }
                 }
            } 

            //Products Section
            set_theme_mod('fast_food_pizza_product_section_title', 'Our Customers Top Picks');
            set_theme_mod('fast_food_pizza_product_category', 'productcategory1');

            // Define product category names, product titles, and tags
            $fast_food_pizza_category_names = array('productcategory1', 'productcategory2');
            $fast_food_pizza_title_array = array(
                array("Veggie Loaded Pizza", "Veggie Loaded Pizza"),
                array("Veggie Loaded Pizza", "Veggie Loaded Pizza")
            );

            foreach ($fast_food_pizza_category_names as $fast_food_pizza_index => $fast_food_pizza_category_name) {
                // Create or retrieve the product category term ID
                $fast_food_pizza_term = term_exists($fast_food_pizza_category_name, 'product_cat');
                
                // If the term doesn't exist, create it
                if ($fast_food_pizza_term === 0 || $fast_food_pizza_term === null) {
                    $fast_food_pizza_term = wp_insert_term($fast_food_pizza_category_name, 'product_cat');
                }
                
                // Check for errors in category creation
                if (is_wp_error($fast_food_pizza_term)) {
                    error_log('Error creating category: ' . $fast_food_pizza_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                // Retrieve the category ID for assignment
                $fast_food_pizza_term_id = $fast_food_pizza_term['term_id'];

                // Loop to create 4 products for each category
                for ($fast_food_pizza_i = 0; $fast_food_pizza_i < 2; $fast_food_pizza_i++) {
                    // Create product content
                    $fast_food_pizza_title = $fast_food_pizza_title_array[$fast_food_pizza_index][$fast_food_pizza_i];
                    $fast_food_pizza_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

                    // Create product post object
                    $fast_food_pizza_my_post = array(
                        'post_title'    => wp_strip_all_tags($fast_food_pizza_title),
                        'post_content'  => $fast_food_pizza_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'product', // Post type set to 'product'
                    );

                    // Insert the product into the database
                    $fast_food_pizza_post_id = wp_insert_post($fast_food_pizza_my_post);

                    // Check for errors in product creation
                    if (is_wp_error($fast_food_pizza_post_id)) {
                        error_log('Error creating product: ' . $fast_food_pizza_post_id->get_error_message());
                        continue; // Skip to the next product if creation fails
                    }

                    // Assign the category to the product
                    wp_set_object_terms($fast_food_pizza_post_id, array($fast_food_pizza_term_id), 'product_cat');
                    
                    // Set product as simple product and assign price
                    update_post_meta($fast_food_pizza_post_id, '_regular_price', 15.99); // Assign regular price
                    update_post_meta($fast_food_pizza_post_id, '_price', 15.99); // Set current price (sale price)

                    // Handle the featured image using media_sideload_image
                    $fast_food_pizza_image_url = get_template_directory_uri() . '/images/product' . ($fast_food_pizza_i + 1) . '.png';
                    $fast_food_pizza_image_id = media_sideload_image($fast_food_pizza_image_url, $fast_food_pizza_post_id, null, 'id');

                    // Check if there was an error downloading the image
                    if (is_wp_error($fast_food_pizza_image_id)) {
                        error_log('Error downloading image: ' . $fast_food_pizza_image_id->get_error_message());
                        continue; // Skip to the next product if image download fails
                    }

                    // Assign featured image to product
                    set_post_thumbnail($fast_food_pizza_post_id, $fast_food_pizza_image_id);
                }
            }

            // Set the demo import completion flag
    		update_option('fast_food_pizza_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'fast-food-pizza') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'fast-food-pizza') . '</a></span>';
            //end
   
            //Copyright Text
            set_theme_mod( 'fast_food_pizza_footer_copy', 'By Buywptemplate' );

        }
    ?>

    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=fast-food-pizza-guide-page" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('fast_food_pizza_demo_import_completed')) : ?>
        <form method="post">
        <p><?php esc_html_e('Click the below run importer button to import demo content','fast-food-pizza'); ?></p>
            <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','fast-food-pizza'); ?>" class="button button-primary button-large">
        </form>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the theme demo content?")){
			    document.forms[0].submit();
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>
