<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// AUTORES
		if( ! taxonomy_exists('autores')){

			$labels = array(
				'name'              => 'Taxonomy Voces ciudadanas',
				'singular_name'     => 'Voz Ciudadana',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Voz Ciudadana',
				'update_item'       => 'Actualizar Voz Ciudadana',
				'add_new_item'      => 'Nueva Voz Ciudadana',
				'new_item_name'     => 'Nombre Nueva Voz Ciudadana',
				'menu_name'         => 'Taxonomy Voces ciudadanas'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'taxonomy-voces-ciudadanas' ),
			);

			register_taxonomy( 'taxonomy-voces-ciudadanas', 'voces-ciudadanas', $args );
		}

		if( ! taxonomy_exists('taxonomy-grandes-retos')){

			$labels = array(
				'name'              => 'Taxonomy Grandes retos',
				'singular_name'     => 'Reto',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Reto',
				'update_item'       => 'Actualizar Reto',
				'add_new_item'      => 'Nueva Reto',
				'new_item_name'     => 'Nombre Nueva Reto',
				'menu_name'         => 'Taxonomy Grandes retos'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'taxonomy-grandes-retos' ),
			);

			register_taxonomy( 'taxonomy-grandes-retos', 'ensayos-pubpub', $args );
		}
		
		
		// TERMS
		if ( ! term_exists( 'grupo-de-trabajo', 'taxonomy-voces-ciudadanas' ) ){
			wp_insert_term( 'Grupo de trabajo', 'taxonomy-voces-ciudadanas', array('slug' => 'grupo-de-trabajo') );
		}

		if ( ! term_exists( 'mas-de-ciudadanos', 'taxonomy-voces-ciudadanas' ) ){
			wp_insert_term( 'Más de ciudadanos', 'taxonomy-voces-ciudadanas', array('slug' => 'mas-de-ciudadanos') );
		}

		/* // SUB TERMS CREATION
		if(term_exists('parent-term', 'category')){
			$term = get_term_by( 'slug', 'parent-term', 'category');
			$term_id = intval($term->term_id);
			if ( ! term_exists( 'child-term', 'category' ) ){
				wp_insert_term( 'A child term', 'category', array('slug' => 'child-term', 'parent' => $term_id) );
			}
			
		} */
	}
