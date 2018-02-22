<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package una
 * @since una 1.0.1
 * @license GPL 2.0
 *
 */
get_header(); ?>

<!-- HOME PAGE — LATEST PROJECT -->
<?php
	$args = array( 'post_type' => 'projects', 'posts_per_page' => 1, 'order' => DESC);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	$thumb_id = get_post_thumbnail_id();
      $url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-project');
      $url = $url_array[0];
?>

	<section class="main">
		<div class="container">
			<a href="<?php the_permalink();?>">
				<div class="main__thumb">

					<div class="main__thumb_img lazy" data-src="<?php echo $url;?>">
					</div>
					<div class="main__thumb_triangle">

					</div>
				</div>

				<div class="main__meta">
					<div class="main__meta_place">
						<span><?php the_field('coord');?></span>
					</div>

					<div class="main__meta_title">
						<h1><?php the_title();?></h1>
						<h2><?php the_field('subtitle');?></h2>
					</div>

					<div class="main__meta_view">
						<span>View &rarr;</span>
					</div>

				</div>
			</a>
		</div>
	</section>

<?php endwhile;?>

<!-- HOME PAGE — OTHER PROJECT -->
<div class="container">
	<section class="projects">

		<div class="projects__title">
			<h1>Latest Projects</h1>
			<span>See all &rarr;</span>
		</div>

		<div>
			<?php
				$args = array( 'post_type' => 'projects', 'posts_per_page' => 2, 'offset' => 1,'order' => DESC);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				$thumb_id = get_post_thumbnail_id();
			      $url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-project');
			      $url = $url_array[0];
			?>

				<article class="projects__article">
					<a href="<?php the_permalink();?>">
						<div class="projects__article_place">
							<?php the_field('coord');?>
						</div>

						<div class="projects__article_thumb">
							<div class="projects__article_thumb_img lazy" data-src="<?php echo $url;?>">

							</div>
						</div>

						<div class="projects__article_meta">
							<h1><?php the_title();?></h1>
							<h2><?php the_field('subtitle');?></h2>
						</div>
					</a>
				</article>

			<?php endwhile;?>
		</div>

		<div class="clear"></div>
	</section>
</div>


<!-- HOME PAGE — JOURNAL -->

<section class="journal container">
  <div class="journal__title">
    <h1>Journal</h1>
    <span>See all &rarr;</span>
  </div>

	<?php
	$args = array( 'post_type' => 'post', 'posts_per_page' => 2, 'order' => DESC);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	$thumb_id = get_post_thumbnail_id();
	$url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-project');
	$url = $url_array[0];
	?>

  <article class="journal__article">
	<a href="<?php the_permalink();?>">
    <div class="journal__article_thumb">
    	<div class="journal__article_thumb_img lazy" data-src="<?php echo $url;?>"></div>
    </div>
    <div class="journal__article_meta">
			<span><?php the_time('d.m.Y') ?></span>
      <h1><?php the_title();?></h1>
    </div>
	</a>
  </article>
  <?php endwhile;?>

  <article class="journal__article">
    <div class="newsletter">
      <div class="newsletter__text">
        Subscribe now<br /> the Interferenze newsletter
      </div>
      <div class="newsletter__input">

				<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="mailchimp">
					<!-- for my website the site_url() function returns https://rudrastyh.com -->
					<input type="text" name="fname" placeholder="First name"  class="newsletter__input_name"/>
					<input type="text" name="lname" placeholder="Last name" class="newsletter__input_lastname"/>
					<input type="email" name="email" placeholder="Email *" class="newsletter__input_mail" required />

					<input type="hidden" name="action" value="mailchimpsubscribe" />
					<!-- we need action parameter to receive ajax request in WordPress -->

					<button class="newsletter__input_send">Subscribe</button>
				</form>

			 <div class="newsletter__status"></div>

      </div>
    </div>
</form>

</article>

</section>



<?php get_footer(); ?>
