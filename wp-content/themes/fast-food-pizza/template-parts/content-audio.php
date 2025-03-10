<?php
/**
 * The template part for displaying audio post
 * @package Fast Food Pizza
 * @subpackage fast_food_pizza
 * @since 1.0
 */

$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d');
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="box-image">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the audio file.
        if ( ! empty( $audio ) ) {
          foreach ( $audio as $audio_html ) {
            echo '<div class="entry-audio">';
              echo $audio_html;
            echo '</div><!-- .entry-audio -->';
          }
        };
      };
    ?>
  </div>
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <?php if( get_theme_mod('fast_food_pizza_metafields_date', true) != '' || get_theme_mod('fast_food_pizza_metafields_author', true) != '' || get_theme_mod('fast_food_pizza_metafields_comment', true) != '' || get_theme_mod('fast_food_pizza_metafields_time', true) != '' &&  get_theme_mod('fast_food_pizza_display_post_date', true) != '' || get_theme_mod('fast_food_pizza_display_post_author', true) != '' || get_theme_mod('fast_food_pizza_display_post_comment', true) != '' || get_theme_mod('fast_food_pizza_display_post_time', true) != ''){ ?>
      <div class="metabox mb-3">
        <?php if( get_theme_mod( 'fast_food_pizza_metafields_date',true) != '' || get_theme_mod( 'fast_food_pizza_display_post_date',true) != '') { ?>
          <span class="entry-date me-1"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_post_date_icon','far fa-calendar-alt')); ?> me-1"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a><span class="ms-2"><?php echo esc_html( get_theme_mod('fast_food_pizza_blog_post_meta_seperator','|') ); ?></span></span>
        <?php }?>
        <?php if( get_theme_mod( 'fast_food_pizza_metafields_author',true) != '' || get_theme_mod( 'fast_food_pizza_display_post_author',true) != '') { ?>
          <span class="entry-author mx-1"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_post_author_icon','fas fa-user')); ?> me-1"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a><span class="ms-2"><?php echo esc_html( get_theme_mod('fast_food_pizza_blog_post_meta_seperator','|') ); ?></span></span>
        <?php }?>
        <?php if( get_theme_mod( 'fast_food_pizza_metafields_comment',true) != '' || get_theme_mod( 'fast_food_pizza_display_post_comment',true) != '') { ?>
          <span class="entry-comments mx-1"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_post_comment_icon','fas fa-comments')); ?> me-1"></i> <?php comments_number( __('0 Comment', 'fast-food-pizza'), __('0 Comments', 'fast-food-pizza'), __('% Comments', 'fast-food-pizza') ); ?><span class="ms-2"><?php echo esc_html( get_theme_mod('fast_food_pizza_blog_post_meta_seperator','|') ); ?></span></span>
        <?php }?>
        <?php if( get_theme_mod( 'fast_food_pizza_metafields_time',true) != '' || get_theme_mod( 'fast_food_pizza_display_post_time',true) != '') { ?>
          <span class="entry-time mx-1"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_post_time_icon','fas fa-clock')); ?> me-1"></i> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
        <?php echo esc_html (fast_food_pizza_edit_link()); ?>
      </div>
    <?php }?>
  <div class="new-text">
    <?php $fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_content_settings','Excerpt');
    if($fast_food_pizza_theme_lay == 'Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if($fast_food_pizza_theme_lay == 'Excerpt'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <?php $fast_food_pizza_excerpt = get_the_excerpt(); echo esc_html( fast_food_pizza_string_limit_words( $fast_food_pizza_excerpt, esc_attr(get_theme_mod('fast_food_pizza_post_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('fast_food_pizza_post_discription_suffix','[...]') ); ?>
      <?php }?>
    <?php }?>
  </div>
  <?php if( get_theme_mod('fast_food_pizza_button_text','View More') != ''){ ?>
    <div class="postbtn mt-4 text-start">
      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('fast_food_pizza_button_text','View More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('fast_food_pizza_button_text','View More'));?></span></a>
    </div>
  <?php }?>
</article>