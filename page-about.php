<?php
/*
Template Name: About
*/
get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $thumb_id = get_post_thumbnail_id();
  $url_array = wp_get_attachment_image_src($thumb_id, 'large');
  $url = $url_array[0];

  ?>
  <div class="about">
    <div class="about__image lazy" data-src="<?php echo $url;?>"></div>
    <div class="container">
      <div class="about__text">
        <?php the_content();?>
      </div>
      </div>
  </div>
<?php endwhile; endif;?>
<?php get_footer(); ?>
