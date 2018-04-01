<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package una
 * @since una 1.0.0
 * @license GPL 2.0
 *
 */
get_header(); ?>


<div class="error">
	<div class="error__text">
		<div class="container">
			<h1>Error 404.</h1>
			<p>
				<?php if(qtrans_getLanguage() == "it") : ?>Si è verificato un errore: la pagina che stai cercando non esiste.
				<?php endif ?>
				<?php if(qtrans_getLanguage() == "en") : ?>Something went wrong: the page you are looking for doesn't exist.
				<?php endif ?>
			</p>
			<p>
				<?php if(qtrans_getLanguage() == "it") : ?><a href="<?php bloginfo('home');?>">Torna alla home &rarr;</a>
				<?php endif ?>
				<?php if(qtrans_getLanguage() == "en") : ?><a href="<?php bloginfo('home');?>">Back to home &rarr;</a>
				<?php endif ?>

			</p>
		</div>
	</div>
	<div class="error__thumb lazy" data-src="<?php echo get_template_directory_uri() . '/frontend/img/404.svg';?>"></div>

</div>

<?php get_footer(); ?>
