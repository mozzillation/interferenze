<?php get_header(); ?>

<div class="archive_artists">
    <div class="archive_artists__title">
      People Database
    </div>

    <div class="archive_artists__list">

    <?php
    $prev_letter = null;
    $args = array( 'post_type' => 'people', 'posts_per_page' => -1, 'orderby'=> 'title',
    								'order' => 'ASC',);
  	$loop = new WP_Query( $args );
    if( $loop->have_posts() ):
  	while ( $loop->have_posts() ) : $loop->the_post();

          $letter = get_the_title();
          $letter = substr($letter, 0, 1);
          $post_slug = $post->post_name;


          if ($prev_letter !== $letter) {
              if (!is_null($prev_letter)) {
                 // A list is already open, close it first
                 echo '</div></div>';
              }
              echo '<div class="archive_artists__letter">';
              echo '<div class="archive_artists__letter_title"><h1>' . $letter . '</h1></div>';
              echo '<div class="archive_artists__letter_list">';
          }

          $thumb_id = get_post_thumbnail_id();
          $url_array = wp_get_attachment_image_src($thumb_id, 'large');
          $url = $url_array[0];

          ?>

          <li class="archive_artists__list_item <?php echo $post_slug;?>">
            <a href="<?php the_permalink();?>" data-image="<?php echo $url;?>"><?php the_title();?></a>
          </li>



        <?php

        $prev_letter = $letter;


       endwhile;

       echo '</div></div>';

        endif;

       ?>
    </div>


</div>

<div class="archive_artists__profile" ></div>


<?php get_footer(); ?>
