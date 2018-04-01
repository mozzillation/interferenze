<?php

/*
Template Name: Archives
*/

get_header(); ?>

<div class="archive_journal">


    <div class="archive_journal__title">
      Latest News
    </div>

  <article class="archive_journal__article">
    <div class="newsletter">
      <div class="newsletter__text">
				<?php if(qtrans_getLanguage() == "it") : ?>Sottoscrivi ora<br /> la newsletter di Interferenze
				<?php endif ?>
				<?php if(qtrans_getLanguage() == "en") : ?>Subscribe now<br /> the Interferenze newsletter
				<?php endif ?>

      </div>
      <div class="newsletter__input">

				<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="mailchimp">

					<?php if(qtrans_getLanguage() == "it") : ?>
						<input type="text" name="fname" placeholder="Nome"  class="newsletter__input_name"/>
					<?php endif ?>
					<?php if(qtrans_getLanguage() == "en") : ?>
						<input type="text" name="fname" placeholder="First Name"  class="newsletter__input_name"/>
					<?php endif ?>

					<?php if(qtrans_getLanguage() == "it") : ?>
						<input type="text" name="lname" placeholder="Cognome" class="newsletter__input_lastname"/>
					<?php endif ?>
					<?php if(qtrans_getLanguage() == "en") : ?>
						<input type="text" name="lname" placeholder="Last Name" class="newsletter__input_lastname"/>
					<?php endif ?>

					<input type="email" name="email" placeholder="Email *" class="newsletter__input_mail" required />

					<input type="hidden" name="action" value="mailchimpsubscribe" />
					<!-- we need action parameter to receive ajax request in WordPress -->

					<button class="newsletter__input_send"><?php if(qtrans_getLanguage() == "it") : ?> Invia
					<?php endif ?>
					<?php if(qtrans_getLanguage() == "en") : ?> Subscribe
					<?php endif ?></button>
				</form>

			 <div class="newsletter__status"></div>

      </div>
    </div>
  </article>

    <?php
    $args = array( 'post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC');
  	$loop = new WP_Query( $args );
  	while ( $loop->have_posts() ) : $loop->the_post();
  	$thumb_id = get_post_thumbnail_id();
  	$url_array = wp_get_attachment_image_src($thumb_id, 'large');
  	$url = $url_array[0];
          ?>

          <article class="archive_journal__article">
  					<a href="<?php the_permalink();?>">
  						<div class="archive_journal__article_place">
  							<span><?php the_field('coord');?></span>
  						</div>

  						<div class="archive_journal__article_thumb">
  							<div class="archive_journal__article_thumb_img lazy" data-src="<?php echo $url;?>">

  							</div>
  						</div>

  						<div class="archive_journal__article_meta">
                <span><?php the_time('d.m.Y') ?></span>
                <h1><?php the_title();?></h1>
  						</div>
  					</a>
  				</article>

    <?php endwhile;?>
</div>


<?php get_footer(); ?>
