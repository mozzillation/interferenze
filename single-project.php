<?php
/**
 * The template for displaying all single posts and pages
 *
 * @package una
 * @since una 1.0.3
 * @license GPL 2.0
 *
 */
get_header(); ?>
<div class="single-project__container">


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		$thumb_id = get_post_thumbnail_id();
		$url_array = wp_get_attachment_image_src($thumb_id, 'large');
		$url = $url_array[0];
	?>

		<div class="single-project__header">
			<div class="single-project__meta">
				<span><?php the_field('coord');?></span>
				<h1><?php the_title();?></h1>
				<?php
					if(get_field('subtitle'))
					{
							echo '<h2>' . get_field('subtitle') . '</h2>';
					}
				?>
			</div>

			<div class="single-project__thumb lazy" data-src="<?php echo $url;?>"></div>

		</div>


		<div class="single-project__col1">
			<div class="single-project__content">
				<?php the_content();?>
			</div>
		</div>
		<div class="single-project__col2">
			<div class="single-project__other">
				<div class="single-project__other_date">
					<span><?php the_field('place');?></span>
					<span><?php the_field('coord');?></span>
					<span><?php the_field('period-start');?>
						<?php if(get_field('subtitle'))
						{
								echo '&rarr; ' . get_field('period-end');
						}?>
					</span>
				</div>

				<?php
			if(get_field('archive_link')) :?>
			<a href="<?php the_field('archive_link')?>" target="_blank">
				<div class="single-project__other_link">
					<div class="single-project__other_link_inner">
						&rarr; <?php the_field('archive_link')?>
					</div>
				</div>
			</a>
			<?php endif;?>

			<?php
			if(get_field('artists')) :?>
				<div class="single-project__other_artist">
					<h3>Artists involved</h3>
					<div class="single-project__other_artist_list">

						<?php
							// get only first 3 results
							$ids = get_field('artists');
							$query = new WP_Query(array(
								'post_type'      	=> 'artist',
								'posts_per_page'	=> 10,
								'post__in'			=> $ids,
								'post_status'		=> 'any',
								'orderby'=> 'title',
								'order' => 'ASC',
							));
							$artist_count = $query->found_posts;
							while ( $query->have_posts() ) : $query->the_post();
							?>
							<a href="<?php the_permalink();?>"><?php the_title();?></a>


						<?php endwhile;?>

						<?php
							// get only first 3 results
							$ids = get_field('artists');

							$query = new WP_Query(array(
								'post_type'      	=> 'artist',
								'offset' => 10,
								'post__in'			=> $ids,
								'post_status'		=> 'any',
								'orderby'=> 'title',
								'order' => ASC,
							));
							$artist_count = $query->found_posts;
							while ( $query->have_posts() ) : $query->the_post();
							?>
							<a href="<?php the_permalink();?>" class="hide"><?php the_title();?></a>


						<?php endwhile;?>

					</div>

					<?php if (($query->have_posts()) &&  ($artist_count > 10)): ?>
						<div class="show_all">&rarr; Show All</div>
					<?php endif;?>


				</div>
				<?php endif;?>
			</div>
		</div>


	<?php endwhile; else: ?>

		<p>Nope</p>

	<?php endif; ?>

</div>
<?php get_footer(); ?>
