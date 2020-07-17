<?php
/*
Plugin Name: Mostrar productos CPT
Plugin URI: https://merka20.com
Description: Este plugin crea el CPT de productos junto a las taxonomias de seccion y tipo. A su vez muestra dicho contenido en plantillas generadas para ese CPT con su css correspondiente.
Version: 1.0
Author: Oscar
Author URI: https://merka20.com
License: GPL2
*/
require_once('inc/productos_custom_post.php');


function estilos_productos(){

	 $url= plugins_url('css/estilos_productos.css',__FILE__);
	  
  //wp_register_style('estilo_pro', , array() ,'1.0');
  wp_enqueue_style('estilo_pro', $url); 
   
}

add_action('wp_enqueue_scripts' , 'estilos_productos');


add_filter( 'template_include', 'mk20_force_template' );
function mk20_force_template( $template ) {
    // If the current url is an archive of any kind
    if( is_post_type_archive('productos') ) {
        // Set this to the template file inside your plugin folder
        $template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/plantillas/archive-productos.php';        
    }

    else if (is_tax('seccion','bisuteria')){

    	// Set this to the template file inside your plugin folder
        $template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/plantillas/taxonomy-seccion-bisuteria.php';  
         
    }

    else if (is_tax('seccion','complementos')){

    	// Set this to the template file inside your plugin folder
        $template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/plantillas/taxonomy-seccion-complementos.php';  
         
    }

    else if (is_tax('seccion','prendas')){

    	// Set this to the template file inside your plugin folder
        $template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/plantillas/taxonomy-seccion-prendas.php';  
         
    }

    // Always return, even if we didn't change anything

    return $template;
}

?>