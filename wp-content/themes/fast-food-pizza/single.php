<?php
/**
 * The Template for displaying all single posts.
 * @package Fast Food Pizza
 */
get_header(); ?>

<main id="skip_content" role="main">
	<div class="container">
	    <div class="main-wrapper py-4 px-0">
	    	<?php
            $fast_food_pizza_layout_option = get_theme_mod( 'fast_food_pizza_single_post_layout','Right Sidebar');
            if($fast_food_pizza_layout_option == 'One Column'){ ?>
				<div class="content_box">
					<?php if (get_theme_mod('fast_food_pizza_single_post_bradcrumb',false) != ''){ ?>
						<div class="bradcrumbs">
							<?php fast_food_pizza_the_breadcrumb(); ?>
						</div>
					<?php }?>
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/single-post' );
		            endwhile; // end of the loop. ?>
		       	</div>
		    <?php }else if($fast_food_pizza_layout_option == 'Left Sidebar'){ ?>
		    	<div class="row">
		    		<div id="sidebar" class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>

					<div class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
						<?php if (get_theme_mod('fast_food_pizza_single_post_bradcrumb',false) != ''){ ?>
							<div class="bradcrumbs">
								<?php fast_food_pizza_the_breadcrumb(); ?>
							</div>
						<?php }?>
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
		       	</div>
		    <?php }else if($fast_food_pizza_layout_option == 'Right Sidebar'){ ?>
		    	<div class="row">
			       	<div class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
						<?php if (get_theme_mod('fast_food_pizza_single_post_bradcrumb',false) != ''){ ?>
							<div class="bradcrumbs">
								<?php fast_food_pizza_the_breadcrumb(); ?>
						  	</div>
						<?php }?>
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
					<div id="sidebar" class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
				</div>
			<?php } else {?>
				<div class="row">
			       	<div class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
							<?php if (get_theme_mod('fast_food_pizza_single_post_bradcrumb',false) != ''){ ?>
								<div class="bradcrumbs">
									<?php fast_food_pizza_the_breadcrumb(); ?>
								</div>
							<?php }?>
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
					<div id="sidebar" class="<?php if( get_theme_mod( 'fast_food_pizza_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }?>
		    <div class="clearfix"></div>
	    </div>
	</div>
</main>

<?php get_footer(); ?>
