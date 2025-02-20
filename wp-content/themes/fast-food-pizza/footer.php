<?php
/**
 * The template for displaying the footer.
 * @package Fast Food Pizza
 */
?>
<?php if( get_theme_mod( 'fast_food_pizza_hide_show_scroll',true) != '' || get_theme_mod( 'fast_food_pizza_display_scrolltop',true) != '') { ?>
    <?php $fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_footer_options','Right');
        if($fast_food_pizza_theme_lay == 'Left align'){ ?>
            <a href="#" id="scrollbutton" class="left"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'fast-food-pizza' ); ?></span></a>
        <?php }else if($fast_food_pizza_theme_lay == 'Center align'){ ?>
            <a href="#" id="scrollbutton" class="center"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'fast-food-pizza' ); ?></span></a>
        <?php }else{ ?>
            <a href="#" id="scrollbutton"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'fast-food-pizza' ); ?></span></a>
    <?php }?>
<?php }?>
<footer role="contentinfo">
    <?php if (get_theme_mod('fast_food_pizza_show_hide_footer', true)){ ?>

    <?php //Set widget areas classes based on user choice
        $fast_food_pizza_widget_areas = get_theme_mod('fast_food_pizza_footer_widget_areas', '4');
        if ($fast_food_pizza_widget_areas == '3') {
            $fast_food_pizza_cols = 'col-lg-4 col-md-6';
        } elseif ($fast_food_pizza_widget_areas == '4') {
            $fast_food_pizza_cols = 'col-lg-3 col-md-6';
        } elseif ($fast_food_pizza_widget_areas == '2') {
            $fast_food_pizza_cols = 'col-lg-6 col-md-6';
        } else {
            $fast_food_pizza_cols = 'col-lg-12 col-md-12';
        }
    ?>
    
    <aside id="sidebar-footer" class="footer-wp" role="complementary">
        <div class="container">
            <div class="row">

                <div class="<?php echo esc_attr($fast_food_pizza_cols); ?> footer-block">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'fast-food-pizza'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Search', 'fast-food-pizza' ); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                    <?php endif; ?>
                </div>

                <div class="<?php echo esc_attr($fast_food_pizza_cols); ?> footer-block">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <aside id="archives" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'fast-food-pizza'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'fast-food-pizza' ); ?></h3>
                            <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div>

                <div class="<?php echo esc_attr($fast_food_pizza_cols); ?> footer-block">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <aside id="meta" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'fast-food-pizza'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'fast-food-pizza' ); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div>

                <div class="<?php echo esc_attr($fast_food_pizza_cols); ?> footer-block">
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <aside id="categories" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'fast-food-pizza'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'fast-food-pizza' ); ?></h3>
                            <ul>
                                <?php wp_list_categories('title_li=');  ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </aside>

    <?php }?>
    <?php if (get_theme_mod('fast_food_pizza_show_hide_copyright', true)) {?>
    	<div class="copyright-wrapper py-3 px-0">
            <div class="container">
                <p><?php fast_food_pizza_credit(); ?> <?php echo esc_html(get_theme_mod('fast_food_pizza_footer_copy',__('By Buywptemplate','fast-food-pizza'))); ?></p>
                <?php if (get_theme_mod('fast_food_pizza_footer_social_links', false)){ ?>    
                <div class="socialicons mt-2">
                  <?php if(get_theme_mod('fast_food_pizza_footer_facebook_url') != ''){ ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('fast_food_pizza_footer_facebook_url')); ?>"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_footer_facebook_icon','fab fa-facebook-f')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'fast-food-pizza'); ?></span></a>
                  <?php }?>
                  <?php if(get_theme_mod('fast_food_pizza_footer_twitter_url') != ''){ ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('fast_food_pizza_footer_twitter_url')); ?>"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_footer_twitter_icon','fab fa-twitter')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'fast-food-pizza'); ?></span></a>
                  <?php }?>
                  <?php if(get_theme_mod('fast_food_pizza_footer_instagram_url') != ''){ ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('fast_food_pizza_footer_instagram_url')); ?>"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_footer_instagram_icon','fab fa-instagram')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'fast-food-pizza'); ?></span></a>
                  <?php }?>
                  <?php if(get_theme_mod('fast_food_pizza_footer_pinterest_url') != ''){ ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('fast_food_pizza_footer_pinterest_url')); ?>"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_footer_pinterest_icon','fab fa-pinterest-p')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'fast-food-pizza'); ?></span></a>
                  <?php }?>
                </div>
                <?php }?>
            </div>
            <div class="clear"></div>
        </div>
    <?php }?>
</footer>
    
<?php wp_footer(); ?>

</body>
</html>