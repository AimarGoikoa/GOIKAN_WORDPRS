<?php
/**
 * The template for displaying home page.
 * @package Fast Food Pizza
 */
get_header(); ?>

<main role="main" id="skip_content">
  <div class="container">
    <?php $fast_food_pizza_layout_option = get_theme_mod( 'fast_food_pizza_layout_options','Right Sidebar');
    if($fast_food_pizza_layout_option == 'One Column'){ ?>
      <div id="blog_sec" class="blog-section pt-4">
        <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
        <?php } ?>
        <?php fast_food_pizza_blog_post_content(); ?>
        <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
          <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php fast_food_pizza_pagination_type(); ?>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    <?php }else if($fast_food_pizza_layout_option == 'Three Columns'){ ?>
      <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
        <div id="blog_sec" class="blog-section col-lg-6 col-md-6 pt-4">
          <?php if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format() );
            endwhile;
            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php fast_food_pizza_pagination_type(); ?>
            </div>
          <?php } ?>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
      </div>
    <?php }else if($fast_food_pizza_layout_option == 'Four Columns'){ ?>
      <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
        <div id="blog_sec" class="blog-section col-lg-3 col-md-3 pt-4">
          <?php if ( have_posts() ) :
            /* Start the Loop */          
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format() );           
            endwhile;
            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php fast_food_pizza_pagination_type(); ?>
            </div>
          <?php } ?>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
      </div>
    <?php }else if($fast_food_pizza_layout_option == 'Grid Layout'){ ?>
      <div class="row">
        <div id="blog_sec" class="blog-section pt-4">
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
          <div class="row">
            <?php if ( have_posts() ) :
              /* Start the Loop */          
              while ( have_posts() ) : the_post();
                  get_template_part( 'template-parts/grid-layout' );
              endwhile;
              else :
                  get_template_part( 'no-results' ); 
              endif; 
            ?>
          </div>
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    <?php }else if($fast_food_pizza_layout_option == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="blog_sec" class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 blog-section pt-4"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
          <?php fast_food_pizza_blog_post_content(); ?>
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
      </div>
    <?php }else if($fast_food_pizza_layout_option == 'Left Sidebar'){ ?>
      <div class="row">
        <div class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
        <div id="blog_sec" class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 blog-section pt-4"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
          <?php fast_food_pizza_blog_post_content(); ?>
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    <?php } else {?> 
      <div class="row">
        <div id="blog_sec" class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 blog-section pt-4"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
          <?php fast_food_pizza_blog_post_content(); ?>
          <?php if(get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('fast_food_pizza_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
            <?php if( get_theme_mod( 'fast_food_pizza_enable_post_pagination',true) != '') { ?>
              <div class="navigation">
                <?php fast_food_pizza_pagination_type(); ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
      </div>
    <?php }?>
  </div>
</main>
<div class="clearfix"></div>

<?php get_footer(); ?>