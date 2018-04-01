<?php get_header(); ?>

<div class="archive_projects">
    <div class="archive_projects__title">
      <?php if(qtrans_getLanguage() == "it") : ?>Progetti
      <?php endif ?>
      <?php if(qtrans_getLanguage() == "en") : ?>Projects
      <?php endif ?>
    </div>
    <?php
    $prev_year = null;
    if ( have_posts() ) {
       while ( have_posts() ) {
          the_post();
          $this_year = get_field('period-start');
          $this_year = substr($this_year, -4);
          if ($prev_year != $this_year) {
              // Year boundary
              if (!is_null($prev_year)) {
                 // A list is already open, close it first
                 echo '</div></div>';
              }
              echo '<div class="archive_projects__year">';
              echo '<div class="archive_projects__year_title"><h1>' . $this_year . '</h1></div>';
              echo '<div class="archive_projects__year_list">';
          }
            $thumb_id = get_post_thumbnail_id();
              $url_array = wp_get_attachment_image_src($thumb_id, 'large');
              $url = $url_array[0];
          ?>

          <article class="archive_projects__article">
  					<a href="<?php the_permalink();?>">
  						<div class="archive_projects__article_place">
  							<span><?php the_field('coord');?></span>
  						</div>

  						<div class="archive_projects__article_thumb">
  							<div class="archive_projects__article_thumb_img lazy" data-src="<?php echo $url;?>">

  							</div>
  						</div>

  						<div class="archive_projects__article_meta">
  							<h1><span><?php the_title();?></span></h1>
  							<h2><span><?php the_field('subtitle');?></span></h2>
  						</div>
  					</a>
  				</article>

          <?php $prev_year = $this_year;
       }
       echo '</div></div>';
    }
    ?>



</div>


<?php get_footer(); ?>
