<?php

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $thumb_id = get_post_thumbnail_id();
  $url_array = wp_get_attachment_image_src($thumb_id, 'large');
  $url = $url_array[0];

  ?>
  <div class="standard_page">
    <div class="container">
			<div class="standard_page__container">
				<div class="standard_page__title">
					<?php the_title();?>
				</div>
	      <div class="standard_page__text">
	        <?php the_content();?>
	      </div>
			</div>
      </div>
  </div>
<?php endwhile; endif;?>
<?php get_footer(); ?>
