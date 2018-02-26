<?php
/**
 * The template for displaying the footer
 *
 * @package una
 * @since una 1.0.0
 * @license GPL 2.0
 *
 */
?>

<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <div class="footer__top_col">
        <?php if(qtrans_getLanguage() == "it") : ?>Interferenze è una piattaforma di ricerca che si occupa di suono, arti, tecnoculture e ruralità, fondata nel 2003 a San Martino Valle Caudina, un piccolo borgo rurale della provincia interna del meridione d’Italia.
        <?php endif ?>
        <?php if(qtrans_getLanguage() == "en") : ?>Interferenze is a platform of research – founded in 2003 – focused on sound, art, techocultures and the rural, for projects taking place in different rural regions of Southern Italy: Irpinia, Fortore beneventano and Puglia (Barsento-Trulli area).
        <?php endif ?>

      </div>
      <div class="footer__top_col">
        <div class="footer__top_col">
          <?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'menu_class'=> false, 'theme_location' => 'header-menu', 'container_class' => '' ) );?>
        </div>
        <div class="footer__top_col">
          <?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'menu_class'=> false, 'theme_location' => 'contacts-menu', 'container_class' => '' ) );?>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      Interferenze new arts festival 2017
    </div>
  </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
