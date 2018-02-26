<?php get_header(); ?>

<div class="archive_publications">
    <div class="archive_publications__title">
      <?php if(qtrans_getLanguage() == "it") : ?> Pubblicazioni
      <?php endif ?>
      <?php if(qtrans_getLanguage() == "en") : ?> Publications
      <?php endif ?>
    </div>

    <div class="archive_publications__list">
      <?php
      if ( have_posts() ) {
         while ( have_posts() ) {
            the_post();
           $thumb_id = get_post_thumbnail_id();
             $url_array = wp_get_attachment_image_src($thumb_id, 'full');
             $url = $url_array[0];

            ?>

          <article class="archive_publications__list_item">
            <a href="<?php the_permalink();?>">
              <div class="archive_publications__list_item_thumb">
                <img data-src="<?php echo $url;?>" class="lazy">
              </div>
              <div class="archive_publications__list_item_meta">
                <h1><?php the_title();?></h1>
                <h2><?php the_field('language');?></h2>
              </div>
            </a>
          </article>

        <?php
      }
    }; ?>

    </div>



</div>


<?php get_footer(); ?>
