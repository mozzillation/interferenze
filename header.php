<?php
/**
 * Default theme header
 *
 * Displays the <head> section as well as the opening tag for the body
 *
 * @package una
 * @since una 1.0.0
 * @license GPL 2.0
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<?php indented_wp_head(); ?>

</head>

<body <?php body_class(); ?> >
    <header class="header">
      <div class="container">
        <div class="header__logo">
					<a href="<?php bloginfo('home')?>">
          	Interferenze <span>new arts festival</span>
					</a>
        </div>
        <div class="header__menu_desktop">
					<?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'menu_class'=> false, 'theme_location' => 'header-menu', 'container_class' => '' ) );?> 
        </div>
        <div class="header__search">
          <li>Search</li>
        </div>
        <div class="header__menu_mobile">
          <svg viewBox="0 0 38 38" class="menu-box-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" data-svg-origin="0 0" transform="matrix(1,0,0,1,0,0)">
                              <circle cx="4" cy="4" r="3"></circle>
                              <circle cx="4" cy="19" r="3"></circle>
                              <circle cx="4" cy="34" r="3"></circle>
                              <circle cx="19" cy="4" r="3"></circle>
                              <circle cx="19" cy="19" r="3"></circle>
                              <circle cx="19" cy="34" r="3"></circle>
                              <circle cx="34" cy="4" r="3"></circle>
                              <circle cx="34" cy="19" r="3"></circle>
                              <circle cx="34" cy="34" r="3"></circle>
                          </g>
          </svg>
        </div>
      </div>

			<div class="menu__mobile">
				<div class="menu__mobile_close">
					<img src="assets/img/close.svg" />
				</div>
				<li class="active">Project</li>
				<li>Publications</li>
				<li>Journal</li>
				<li>About</li>
			</div>
    </header>
