<?php
   
if ( ! function_exists('productos_catalogo') ) {

// Register Custom Post Type
function productos_catalogo() {

	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'productos_catalogo' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'productos_catalogo' ),
		'menu_name'             => __( 'Productos', 'productos_catalogo' ),
		'name_admin_bar'        => __( 'Productos', 'productos_catalogo' ),
		'archives'              => __( 'Archivos de productos', 'productos_catalogo' ),
		'attributes'            => __( 'Atibutos de productos', 'productos_catalogo' ),
		'parent_item_colon'     => __( 'Parent Item:', 'productos_catalogo' ),
		'all_items'             => __( 'Todos los productos', 'productos_catalogo' ),
		'add_new_item'          => __( 'Añadir nuevo producto', 'productos_catalogo' ),
		'add_new'               => __( 'Añadir nuevo', 'productos_catalogo' ),
		'new_item'              => __( 'Nuevo producto', 'productos_catalogo' ),
		'edit_item'             => __( 'Editar producto', 'productos_catalogo' ),
		'update_item'           => __( 'Actualizar producto', 'productos_catalogo' ),
		'view_item'             => __( 'Ver producto', 'productos_catalogo' ),
		'view_items'            => __( 'Ver productos', 'productos_catalogo' ),
		'search_items'          => __( 'Buscar producto', 'productos_catalogo' ),
		'not_found'             => __( 'No se ha encontrado nada', 'productos_catalogo' ),
		'not_found_in_trash'    => __( 'No se ha encontrado nada en la papelera', 'productos_catalogo' ),
		'featured_image'        => __( 'Imagen destacada', 'productos_catalogo' ),
		'set_featured_image'    => __( 'Conjunto de imágenes destacadas', 'productos_catalogo' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'productos_catalogo' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'productos_catalogo' ),
		'insert_into_item'      => __( 'Insertar en el producto', 'productos_catalogo' ),
		'uploaded_to_this_item' => __( 'Producto subido', 'productos_catalogo' ),
		'items_list'            => __( 'Listar productos', 'productos_catalogo' ),
		'items_list_navigation' => __( 'Items list navigation', 'productos_catalogo' ),
		'filter_items_list'     => __( 'Filtrar productos en lista', 'productos_catalogo' ),
	);
	$rewrite = array(
		'slug'                  => 'productos',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Productos', 'productos_catalogo' ),
		'description'           => __( 'Custon post type de productos', 'productos_catalogo' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'seccion', 'tipo' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,//esto hace que se pueda paginar o no el contenido
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',		
		/*'show_in_rest'		=> true,
		'template' => array(             
                
                array( 'core/spacer', array('height' => 50,) ),
				array( 'core/heading', array('placeholder' => 'Título del proyecto','fontSize'=>'large',) ),
				array( 'core/heading', array('placeholder' => 'Subtítulo del proyecto','fontSize'=>'medium',) ),
				array( 'core/columns', array(), array(
                    array( 'core/column', array('verticalAlignment'=>'center',), array(
                        array( 'core/image', array() ),
                    ) ),
                    array( 'core/column', array('verticalAlignment'=>'center',), array(						
                        array('core/group',array('backgroundColor'=>'azul-oscuro','className' => 'redondear'),array(
                        array( 'core/paragraph', array(
                            'placeholder' => 'Añade el contenido del proyecto',
							'textColor'=>'white',
                        ) ),
                    ) ) ),
                ) ) )
            ),*/
            
            /*'template_lock' => 'all',*//*insert*/
			
	);
	register_post_type( 'Productos', $args );

}
add_action( 'init', 'productos_catalogo', 0 );

}

// Función para crear una taxonomía


if ( ! function_exists( 'taxonomia_seccion' ) ) {

// Register Custom Taxonomy
function taxonomia_seccion() {

	$labels = array(
		'name'                       => _x( 'Secciones', 'Taxonomy General Name', 'text_seccion' ),
		'singular_name'              => _x( 'Seccion', 'Taxonomy Singular Name', 'text_seccion' ),
		'menu_name'                  => __( 'Seccion', 'text_seccion' ),
		'all_items'                  => __( 'Todas las secciones', 'text_seccion' ),
		'parent_item'                => __( 'Seccion padre', 'text_seccion' ),
		'parent_item_colon'          => __( 'Seccion padre:', 'text_seccion' ),
		'new_item_name'              => __( 'Nueva seccion', 'text_seccion' ),
		'add_new_item'               => __( 'Añadir nueva seccion', 'text_seccion' ),
		'edit_item'                  => __( 'Editar seccion', 'text_seccion' ),
		'update_item'                => __( 'Actualizar seccion', 'text_seccion' ),
		'view_item'                  => __( 'Ver seccion', 'text_seccion' ),
		'separate_items_with_commas' => __( 'Separar las secciones por comas', 'text_seccion' ),
		'add_or_remove_items'        => __( 'Añadir o eliminar secciones', 'text_seccion' ),
		'choose_from_most_used'      => __( 'Elegir la seccion más usada', 'text_seccion' ),
		'popular_items'              => __( 'secciones populares', 'text_seccion' ),
		'search_items'               => __( 'Buscar secciones', 'text_seccion' ),
		'not_found'                  => __( 'seccion no encontrado', 'text_seccion' ),
		'no_terms'                   => __( 'No hay secciones', 'text_seccion' ),
		'items_list'                 => __( 'Lista de secciones', 'text_seccion' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_seccion' ),
	);
	$rewrite = array(
		'slug'                       => 'seccion',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,		
	);
	register_taxonomy( 'seccion', array( 'productos' ), $args );

}
add_action( 'init', 'taxonomia_seccion', 0 );

}

if ( ! function_exists( 'taxonomia_tipo' ) ) {

// Register Custom Taxonomy
function taxonomia_tipo() {

	$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'text_tipo' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'text_tipo' ),
		'menu_name'                  => __( 'Tipo', 'text_tipo' ),
		'all_items'                  => __( 'Todos los tipos', 'text_tipo' ),
		'parent_item'                => __( 'Tipo padre', 'text_tipo' ),
		'parent_item_colon'          => __( 'Tipo padre:', 'text_tipo' ),
		'new_item_name'              => __( 'Nuevo tipo', 'text_tipo' ),
		'add_new_item'               => __( 'Añadir nuevo tipo', 'text_tipo' ),
		'edit_item'                  => __( 'Editar tipo', 'text_tipo' ),
		'update_item'                => __( 'Actualizar tipo', 'text_tipo' ),
		'view_item'                  => __( 'Ver tipo', 'text_tipo' ),
		'separate_items_with_commas' => __( 'Separar los tipos por comas', 'text_tipo' ),
		'add_or_remove_items'        => __( 'Añadir o eliminar tipos', 'text_tipo' ),
		'choose_from_most_used'      => __( 'Elegir el tipo más usado', 'text_tipo' ),
		'popular_items'              => __( 'Tipos populares', 'text_tipo' ),
		'search_items'               => __( 'Buscar tipos', 'text_tipo' ),
		'not_found'                  => __( 'Tipo no encontrado', 'text_tipo' ),
		'no_terms'                   => __( 'No hay tipos', 'text_tipo' ),
		'items_list'                 => __( 'Lista de tipos', 'text_tipo' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_tipo' ),
	);
	$rewrite = array(
		'slug'                       => 'tipo',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'tipo', array( 'productos' ), $args );

}
add_action( 'init', 'taxonomia_tipo', 0 );

}
?>
