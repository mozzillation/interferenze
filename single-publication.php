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
<div class="single-publication__container">


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		$thumb_id = get_post_thumbnail_id();
		$url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-publication');
		$url = $url_array[0];
	?>


		<div class="single-publication__col2">
			<div class="single-publication__thumb lazy">
				<img data-src="<?php echo $url;?>" class="lazy">
			</div>

		</div>

		<div class="single-publication__col1">

			<div class="single-publication__header">
				<div class="single-publication__meta">
					<h1><?php the_title();?></h1>
					<h2><?php the_field('authors');?></h2>
					<span class="single-publication__info_isbn"><?php the_field('language');?></span>
				</div>
			</div>

			<?php
			if(get_field('link')) :?>
			<a href="<?php the_field('link')?>" target="_blank">
			<div class="single-publication__other_link">
				<div class="single-publication__other_link_inner">
					<?php if(qtrans_getLanguage() == "it") : ?> COMPRA
					<?php endif ?>
					<?php if(qtrans_getLanguage() == "en") : ?> BUY
					<?php endif ?> &rarr; <?php the_field('link')?>
				</div>
			</div>
			</a>
			<?php endif;?>

			<div class="single-publication__info">
				<span class="single-publication__info_serie"><?php the_field('book_serie');?> — n. <?php the_field('number');?></span>
				<span class="single-publication__info_serie"><?php the_field('ISBN');?></span>
			</div>

			<div class="single-publication__content">
				<?php the_content();?>
			</div>

		</div>


	<?php endwhile; else: ?>

		<p>Nope</p>

	<?php endif; ?>

</div>
<?php get_footer(); ?>
