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

      $terms = get_terms( array(
      'taxonomy' => 'publication_group',
      'hide_empty' => false,
      ) );

      if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {?>

          <article class="archive_publications__list_item">

              <div class="archive_publications__list_item_thumb">
                <img data-src="<?php echo get_field('cover', $term);?>" class="lazy">
              </div>
              <div class="archive_publications__list_item_meta">
                <h1><?php echo $term->name;?></h1>


                <?php
                $term_slug = $term->slug;
                $_posts = new WP_Query( array(
                            'post_type'         => 'publication',
                            'posts_per_page'    => -1, //important for a PHP memory limit warning
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'publication_group',
                                    'field'    => 'slug',
                                    'terms'    => $term_slug,
                                ),
                            ),
                            'order' => 'ASC',
                  ));

                if( $_posts->have_posts() ) :
                  echo '<h2>';
                  if(qtrans_getLanguage() == "it") {
                    echo 'Disponibile in: ';
                  } else {
                    echo 'Available in: ';
                  };

                  while ( $_posts->have_posts() ) : $_posts->the_post();?>

                <a href="<?php the_permalink();?>"><?php the_field('abbr');?>
              </a>

              <?php endwhile;
              echo '</h2>';
            endif;?>

              </div>

          </article>


      <?php   };
      }?>



    <!-- <?php

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
    }; ?> -->

    </div>



</div>


<?php get_footer(); ?>
