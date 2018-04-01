<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $thumb_id = get_post_thumbnail_id();
  $url_array = wp_get_attachment_image_src($thumb_id, 'large');
  $url = $url_array[0];

  ?>
	<div class="single_post">
		<div class="container">
				<div class="single_post__meta">
					<h2><?php the_time('d.m.Y') ?></h2>
					<h1><?php the_title();?></h1>
				</div>
				
				<div class="single_post__container">
					<div class="single_post__thumb">
						<img data-src="<?php echo $url;?>" class="lazy">
					</div>
					<div class="single_post__content">
						<?php the_content();?>
					</div>
				</div>

				<div class="single_post__sidebar">
					<!-- <span class="single_post__sidebar_title">
						Other Articles
					</span> -->

					<?php $orig_post = $post;
						global $post;
						$categories = get_the_category($post->ID);
						if ($categories) {
						$category_ids = array();
						foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

						$args=array(
						'category__in' => $category_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> 2, // Number of related posts that will be shown.
						'caller_get_posts'=> 1
						);

						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) {
						while( $my_query->have_posts() ) {
						$my_query->the_post();
						$thumb_id = get_post_thumbnail_id();
						$url_array = wp_get_attachment_image_src($thumb_id, 'large');
						$url = $url_array[0];
						?>

						<article class="single_post__sidebar_item">
							<a href="<?php the_permalink();?>">
						    <div class="single_post__sidebar_item_thumb">
						    	<div class="single_post__sidebar_item_thumb_img lazy" data-src="<?php echo $url;?>"></div>
						    </div>
						    <div class="single_post__sidebar_item_meta">
									<span><?php the_time('d.m.Y') ?></span>
						      <h1><?php the_title();?></h1>
						    </div>
							</a>
					  </article>

						<?
						}
						echo '</ul></div>';
						}
						}
						$post = $orig_post;
					wp_reset_query(); ?>
				</div>

		</div>
  </div>
<?php endwhile; endif;?>
<?php get_footer(); ?>
