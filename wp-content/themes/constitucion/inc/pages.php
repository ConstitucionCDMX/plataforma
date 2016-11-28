<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		if( ! get_page_by_path('constitucion-cdmx') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Constitución CDMX',
				'post_name'   => 'constitucion-cdmx',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('cdmx') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'CDMX',
				'post_name'   => 'cdmx',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('participa') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Participa',
				'post_name'   => 'participa',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('cronologia') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Cronología',
				'post_name'   => 'cronologia',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('instrucciones') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Instrucciones',
				'post_name'   => 'instrucciones',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('home') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Home',
				'post_name'   => 'home',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('noticias') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Noticias',
				'post_name'   => 'noticias',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('noticias-single') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Noticias Single',
				'post_name'   => 'noticias-single',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('proceso-participativo') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Proceso participativo',
				'post_name'   => 'proceso-participativo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('experiencias-y-buenas-practicas-globales') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Experiencias y buenas prácticas globales',
				'post_name'   => 'experiencias-y-buenas-practicas-globales',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('pdf-certificado-de-participacion') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'PDF Certificado de Participación',
				'post_name'   => 'pdf-certificado-de-participacion',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('guia-para-compartir-el-texto') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Guía para compartir el texto',
				'post_name'   => 'guia-para-compartir-el-texto',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('obtener-certificado') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Obtener certificado',
				'post_name'   => 'obtener-certificado',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('mensaje-del-jefe-de-gobierno') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Mensaje del jefe de gobierno',
				'post_name'   => 'mensaje-del-jefe-de-gobierno',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('sobre-la-constitucion') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Sobre la constitución',
				'post_name'   => 'sobre-la-constitucion',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('grupo-de-trabajo') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Grupo de trabajo',
				'post_name'   => 'grupo-de-trabajo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('sobre-la-plataforma') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Sobre la plataforma',
				'post_name'   => 'sobre-la-plataforma',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('constitucion-en-wiki') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Constitución en wiki',
				'post_name'   => 'constitucion-en-wiki',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('biblioteca') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Biblioteca',
				'post_name'   => 'biblioteca',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('cronica') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Crónica',
				'post_name'   => 'cronica',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('hacia-el-constituyente') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Hacia el constituyente',
				'post_name'   => 'hacia-el-constituyente',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('imagina-tu-ciudad') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Imagina tu ciudad',
				'post_name'   => 'imagina-tu-ciudad',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		if( ! get_page_by_path('peticiones') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Peticiones',
				'post_name'   => 'peticiones',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		if( ! get_page_by_path('encuentros-ciudadanos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Encuentros ciudadanos',
				'post_name'   => 'encuentros-ciudadanos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('ensayo') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Ensayo',
				'post_name'   => 'ensayo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('terminos-y-condiciones') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Términos y condiciones',
				'post_name'   => 'terminos-y-condiciones',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('transparencia') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Datos y código abierto',
				'post_name'   => 'datos-y-codigo-abierto',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		if( ! get_page_by_path('resultados') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Resultados',
				'post_name'   => 'resultados',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	});