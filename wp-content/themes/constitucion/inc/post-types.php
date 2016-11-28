<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// KIOSCOS
		$labels = array(
			'name'          => 'Kioskos',
			'singular_name' => 'Kioskos',
			'add_new'       => 'Nuevo kiosko',
			'add_new_item'  => 'Nuevo kiosko',
			'edit_item'     => 'Editar kiosko',
			'new_item'      => 'Nuevo kiosko',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver kiosko',
			'search_items'  => 'Buscar kiosko',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Kioskos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'kioskos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title' )
		);
		register_post_type( 'kioskos', $args );

		// PREGUNTAS FRECUENTES
		$labels = array(
			'name'          => 'Preguntas frecuentes',
			'singular_name' => 'Preguntas frecuentes',
			'add_new'       => 'Nueva Pregunta',
			'add_new_item'  => 'Nueva Pregunta',
			'edit_item'     => 'Editar Pregunta',
			'new_item'      => 'Nueva Pregunta',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Pregunta',
			'search_items'  => 'Buscar Pregunta',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Preguntas frecuentes'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'preguntas-frecuentes' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor' )
		);
		register_post_type( 'preguntas-frecuentes', $args );

		// Cronología
		$labels = array(
			'name'          => 'Eventos',
			'singular_name' => 'Eventos',
			'add_new'       => 'Nuevo Evento',
			'add_new_item'  => 'Nuevo Evento',
			'edit_item'     => 'Editar Evento',
			'new_item'      => 'Nuevo Evento',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Evento',
			'search_items'  => 'Buscar Evento',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Eventos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'eventos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'eventos', $args );

		// Cronología
		$labels = array(
			'name'          => 'Voces ciudadanas',
			'singular_name' => 'Voces ciudadanas',
			'add_new'       => 'Nuevo video',
			'add_new_item'  => 'Nuevo video',
			'edit_item'     => 'Editar video',
			'new_item'      => 'Nuevo video',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver video',
			'search_items'  => 'Buscar video',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Voces ciudadanas'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'voces-ciudadanas' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title' )
		);
		register_post_type( 'voces-ciudadanas', $args );

		// FORMULARIO
		$labels = array(
			'name'          => 'Formulario contacto',
			'singular_name' => 'Formulario contacto',
			'add_new'       => 'Nuevo mensaje',
			'add_new_item'  => 'Nuevo mensaje',
			'edit_item'     => 'Editar mensaje',
			'new_item'      => 'Nuevo mensaje',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver mensaje',
			'search_items'  => 'Buscar mensaje',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Formulario contacto'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'formulario-cdmx' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor' )
		);
		register_post_type( 'formulario-cdmx', $args );

		// 
		// $labels = array(
		// 	'name'          => 'Linea del tiempo',
		// 	'singular_name' => 'Linea del tiempo',
		// 	'add_new'       => 'Nuevo evento',
		// 	'add_new_item'  => 'Nuevo evento',
		// 	'edit_item'     => 'Editar evento',
		// 	'new_item'      => 'Nuevo evento',
		// 	'all_items'     => 'Todos',
		// 	'view_item'     => 'Ver evento',
		// 	'search_items'  => 'Buscar evento',
		// 	'not_found'     => 'No se encontro',
		// 	'menu_name'     => 'Linea del tiempo'
		// );

		// $args = array(
		// 	'labels'             => $labels,
		// 	'public'             => true,
		// 	'publicly_queryable' => true,
		// 	'show_ui'            => true,
		// 	'show_in_menu'       => true,
		// 	'query_var'          => true,
		// 	'rewrite'            => array( 'slug' => 'linea-del-tiempo' ),
		// 	'capability_type'    => 'post',
		// 	'has_archive'        => true,
		// 	'hierarchical'       => false,
		// 	'menu_position'      => 6,
		// 	'supports'           => array( 'title', 'editor' )
		// );
		// register_post_type( 'linea-del-tiempo', $args );

		// ensayos
		$labels = array(
			'name'          => 'Ensayos',
			'singular_name' => 'Ensayos',
			'add_new'       => 'Nuevo Ensayo',
			'add_new_item'  => 'Nuevo Ensayo',
			'edit_item'     => 'Editar Ensayo',
			'new_item'      => 'Nuevo Ensayo',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Ensayo',
			'search_items'  => 'Buscar Ensayo',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Ensayos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'ensayos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor' )
		);
		register_post_type( 'ensayos', $args );

		// ensayos
		$labels = array(
			'name'          => 'Grupo de trabajo',
			'singular_name' => 'Grupo de trabajo',
			'add_new'       => 'Nuevo Integrante',
			'add_new_item'  => 'Nuevo Integrante',
			'edit_item'     => 'Editar Integrante',
			'new_item'      => 'Nuevo Integrante',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Integrante',
			'search_items'  => 'Buscar Integrante',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Grupo de trabajo'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'grupo-de-trabajo' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'grupo-de-trabajo', $args );

		$labels = array(
			'name'          => 'Ensayos PubPub',
			'singular_name' => 'Ensayos PubPub',
			'add_new'       => 'Nuevo Ensayo',
			'add_new_item'  => 'Nuevo Ensayo',
			'edit_item'     => 'Editar Ensayo',
			'new_item'      => 'Nuevo Ensayo',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Ensayo',
			'search_items'  => 'Buscar Ensayo',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Ensayos PubPub'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'ensayos-pubpub' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title' )
		);
		register_post_type( 'ensayos-pubpub', $args );

	});


	add_action( 'admin_init', 'quitar_menus' );
	function quitar_menus() { 
		// remove_menu_page('edit-comments.php');
		//remove_menu_page( 'edit.php?post_type=feedback' );
	}