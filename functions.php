<?php

/**
 * Estilos del tema
 */
function theme_styles()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/library/css/bootstrap.min.css'); // Bootstrap 4
	wp_enqueue_style('style', get_template_directory_uri() . '/library/css/style.css');             // Estilos del tema
}
add_action('wp_enqueue_scripts', 'theme_styles');

/**
 * Scripts del tema
 */
function theme_scripts()
{
	wp_enqueue_script('jquery-slim', get_template_directory_uri() . '/library/js/jquery.slim.min.js', array(), false, true);  // jQuery slim
	wp_enqueue_script('popper', get_template_directory_uri() . '/library/js/popper.min.js', array(), false, true);       // Popper
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/library/js/bootstrap.min.js', array(), false, true); // Bootstrap 4
}
add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * Crear nuestros menús gestionables desde el
 * administrador de Wordpress.
 */
function mis_menus()
{
  register_nav_menus(
    array('navigation' => __( 'Menú de navegación' ),)
  );
}
add_action('init', 'mis_menus');

/**
 * Crear una zonan de widgets que podremos gestionar
 * fácilmente desde administrador de Wordpress.
 */
function mis_widgets()
{
  register_sidebar(
    array(
    	'name'          => __( 'Sidebar' ),
    	'id'            => 'sidebar',
      'description'   => 'Los Widgets de esta área aparecerán en la barra lateral',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>',
    )
  );
}
add_action('init', 'mis_widgets');

/**
 * Personalizar los títulos de los widgets
 */
function mis_titulos_widgets($title, $instance, $this)
{
  return $title;
}
add_filter('widget_title', 'mis_titulos_widgets', 10, 3); // Prioridad por defecto y 3 argumentos en el callback

/**
 * Personalizar los textos de los widgets
 */
function mis_textos_widgets($text, $instance, $this)
{
  return '<div class="panel-body">'.$text.'</div>';
}
add_filter('widget_text', 'mis_textos_widgets', 10, 3); // Prioridad por defecto y 3 argumentos en el callback

/**
 * Filtrar resultados de búsqueda para que solo muestre
 * posts en el listado
 */
function buscar_solo_posts($query)
{
  if($query->is_search) {
    $query->set('post_type','post');
  }
  return $query;
}
add_filter('pre_get_posts','buscar_solo_posts');
