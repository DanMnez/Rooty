<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head>
    <!-- metas -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""> <!-- TODO ver en codex -->
    <meta name="author" content="">      <!-- TODO ver en codex -->

    <title><?php
    if (is_home()) {
			bloginfo('name');
			echo ' - '; bloginfo('description');
		    } else {
			the_title();
			echo ' - '; bloginfo('name');
		}
		?>
    </title>
    <?php wp_head(); ?>
  </head>
  <body>

    <header>
      <div class="container">
        <!--<h1><?php bloginfo('name'); ?></h1>-->
        <img src="https://raw.githubusercontent.com/DanMnez/Rooty/master/library/images/logo_rooty_light.png" id="logo" alt="Rooty">
        <nav class="main-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'navigation' ) ); ?>
        </nav>
      </div>
    </header>
