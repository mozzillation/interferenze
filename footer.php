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
      <div class="footer__top_col no-about">
        <?php if(qtrans_getLanguage() == "it") : ?>Interferenze è una piattaforma di ricerca che si occupa di suono, arti, tecnoculture e ruralità, fondata nel 2003 a San Martino Valle Caudina, un piccolo borgo rurale della provincia interna del meridione d’Italia.
        <?php endif ?>
        <?php if(qtrans_getLanguage() == "en") : ?>Interferenze is a platform of research and artistic practice dedicated to exploring the possibilities offered by sound, the arts and technoculture in reconfiguring rural areas as dynamic and active spaces. Established in 2003 in the South of Italy.
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
      Interferenze new arts festival 2018<br />
      Tutti i contenuti di questa pagina sono distribuiti con licenza <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribuzione - Condividi allo stesso modo 3.0 Unported</a>.
    </div>
  </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
