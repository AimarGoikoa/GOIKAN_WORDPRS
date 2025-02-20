<?php

add_action( 'admin_menu', 'fast_food_pizza_gettingstarted' );
function fast_food_pizza_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'fast-food-pizza'), esc_html__('Theme Demo Import', 'fast-food-pizza'), 'edit_theme_options', 'fast-food-pizza-guide-page', 'fast_food_pizza_guide');   
}

function fast_food_pizza_admin_theme_style() {
   wp_enqueue_style('fast-food-pizza-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'fast_food_pizza_admin_theme_style');

function fast_food_pizza_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Fast Food Pizza, you rock!', 'fast-food-pizza' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional food website. Please Click on the link below to know the theme setup information.', 'fast-food-pizza' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=fast-food-pizza-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'fast-food-pizza' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'fast_food_pizza_notice');

/**
 * Theme Info Page
 */
function fast_food_pizza_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'fast-food-pizza' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div>
     			<h2 class="tgmpa-notice-warning"></h2>
			</div>
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Fast Food Pizza', 'fast-food-pizza' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'fast-food-pizza' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'fast-food-pizza' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
							<div class="demo-content">
								<?php
									/* Demo Import */
									require get_parent_theme_file_path( '/inc/dashboard/demo-content.php' );
								?>
						    </div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( FAST_FOOD_PIZZA_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'fast-food-pizza'); ?></a>
						<a href="<?php echo esc_url( FAST_FOOD_PIZZA_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'fast-food-pizza'); ?></a>
						<a href="<?php echo esc_url( FAST_FOOD_PIZZA_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'fast-food-pizza'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Fast Food Pizza Theme', 'fast-food-pizza' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Fast Food Pizza is a free WP theme that offers an elegant and sophisticated design tailored for pizza stores, fast food restaurants, pizzerias, burger shops, multicuisine food outlets, Mexican food, Chinese food joints, dine-in restaurants, pizza delivery, cafes, bistros, food trucks, catering businesses, food blogs, food businesses, eateries, and other related ventures. Its clean and user-friendly layout makes it easy to customize, offering great flexibility to adapt it as a multipurpose solution for any food business. This responsive theme is designed to provide a seamless user experience across all devices, ensuring your restaurant, pizzeria, or food outlet looks great on mobile phones, tablets, and desktops. The customizable options available allow you to personalize colors, fonts, and other elements, making it easy to align with your brand identity. Fast Food Pizza comes with secure and clean code, optimizing performance and loading speeds, making sure visitors get a fast and smooth experience. With essential features like customizable team and testimonial sections, social media icons for promotion, and CTA buttons to drive conversions, this theme is perfect for boosting your online presence. Its SEO-friendly code ensures your website ranks well in search results, helping more people discover your food business. The robust Bootstrap framework ensures the theme’s structure is solid, while CSS animations add a lively, engaging feel. Fast Food Pizza also supports WPML and RTL compatibility, making it ideal for international audiences. Whether you’re managing a pizza parlor, a burger joint, or a global food chain, this theme has everything you need to establish a strong online presence and grow your business.
', 'fast-food-pizza' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','fast-food-pizza'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','fast-food-pizza'); ?></a> <?php esc_html_e( 'your website.','fast-food-pizza'); ?> </li>
							<li><?php esc_html_e( 'Fast Food Pizza','fast-food-pizza'); ?> <a target="_blank" href="<?php echo esc_url( FAST_FOOD_PIZZA_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','fast-food-pizza'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','fast-food-pizza'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','fast-food-pizza'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'If you are new to web development and want to design a website for your fast food center or restaurant; you will find this Fast Food WordPress Theme immensely suitable. You will be greatly surprised by the level of simplicity that this theme brings for designing a website. You can get started almost immediately and there is absolutely no need to know to code or have previous web designing experience. This wonderful theme comes with a well-designed demo and a layout that is completely customizable. Drag and drop page builder tool is also available that helps you to tweak as well as create new pages on your own. Its unique slider is going to attract the users through seamless display images of food you sell as well as comes with SEO-friendly codes. This makes your website easily spottable in search engines. Moreover, you will get full eCommerce support thanks to this themes Woocommerce compatibility. Page templates and pre-built inner pages will add more to the available choices. Besides that, you will get shortcodes and widgets included. For you to be able to add more elements to your website, this theme is made plugin compatible. Make an impressive online presence with this fantastic online solution called Fast Food WordPress Theme.', 'fast-food-pizza' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','fast-food-pizza'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Car listing Shortcode with category','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Car listing Shortcode','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Multiple image feature for each property with slider.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Brand Listing Section','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Car Brand(categories) Option','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Car Tags(categories) Option','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Testimonial listing.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Testimonial shortcode.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Social icons widget.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Latest post with the image widget.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Live customize editor for the About US section.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Font Awesome integrated.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page.','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Footer Widgets & Editor style','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Gallery & Banner functionality','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Full-width Template','fast-food-pizza'); ?></li>
										<li><?php esc_html_e( 'Custom Menu, Colors Editor','fast-food-pizza'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','fast-food-pizza'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( FAST_FOOD_PIZZA_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','fast-food-pizza'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( FAST_FOOD_PIZZA_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','fast-food-pizza'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','fast-food-pizza'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','fast-food-pizza'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','fast-food-pizza'); ?></a> <?php esc_html_e( 'your website.','fast-food-pizza'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','fast-food-pizza'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( FAST_FOOD_PIZZA_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','fast-food-pizza'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( FAST_FOOD_PIZZA_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','fast-food-pizza'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','fast-food-pizza'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( FAST_FOOD_PIZZA_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'fast-food-pizza'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>