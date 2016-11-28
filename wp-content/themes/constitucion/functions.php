<?php date_default_timezone_set('America/Mexico_City');
global $result;

if(isset($_POST['accion']) AND $_POST['accion'] == 'guarda-formulario') storeForm($_POST);
if(isset($_POST['accion']) AND $_POST['accion'] == 'guarda-ensayo') storeFormTest($_POST);
if(isset($_POST['accion']) AND $_POST['accion'] == 'guarda-evento') storeFormEvent($_POST);


// RENAME THE DEFAULT POST TYPE

function change_post_menu_label() {
    global $menu, $submenu;

    $menu[5][0] = 'Noticias';
    $submenu['edit.php'][5][0] = 'Noticias';
    $submenu['edit.php'][10][0] = 'Nueva Noticia';
    $submenu['edit.php'][16][0] = 'Noticias Tags';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );


// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );

	define( 'SITEURL', site_url('/') );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'jquery', 'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js', array(), '2.0.3', true );
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script( 'plugins', JSPATH.'plugins.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'api-google', 'https://maps.google.com/maps/api/js?libraries=places&language=es&key=AIzaSyBXbTzYc_7n0zJmDlLKz8-Ud1iZU_8ug24', array('plugins'), '1.0', true );
		wp_enqueue_script( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js', array('jquery'), '3.1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.min.js', array('plugins'), '1.0', true );


		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'isPageParticipa', (string)is_page( 'participa' ) );
		wp_localize_script( 'functions', 'isPageSondeo', (string)is_page( 'sondeo-masivo' ) );
		wp_localize_script( 'functions', 'isPageCDMX', (string)is_page( 'cdmx' ) );
		wp_localize_script( 'functions', 'isHome', (string)is_page( 'home' ) );
		wp_localize_script( 'functions', 'siteUrl', SITEURL );



		if ( is_page( 'participa' ) ) {
			wp_localize_script( 'functions', 'kioskos', getKioskos() );
		}

		// styles
		//wp_enqueue_style( 'styles', get_stylesheet_uri() );
		wp_enqueue_style( 'styles', THEMEPATH . 'style.min.css' );
		wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

	});



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script( 'api-google', 'https://maps.google.com/maps/api/js?libraries=places&language=en-AU&key=AIzaSyBXbTzYc_7n0zJmDlLKz8-Ud1iZU_8ug24', array('jquery'), '1.0', true );
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('api-google'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );
		wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	add_action( 'after_setup_theme', function () {

		$frontPage = get_page_by_path('home', OBJECT);
		$blogPage  = get_page_by_path('noticias', OBJECT);

		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return false;
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://pcuervo.com">Pequeño Cuervo</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){

		add_image_size( 'images_gal_cdmx', 263, 124, true );
		add_image_size( 'images_news_cdmx', 473, 224, true );

		// cambiar el tamaño del thumbnail

		update_option( 'medium_size_h', 224 );
		update_option( 'medium_size_w', 473 );
		update_option( 'medium_crop', true );

	}



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////


	require_once('inc/post-types.php');

	require_once('inc/metaboxes.php');

	require_once('inc/taxonomies.php');

	require_once('inc/pages.php');

	require_once('inc/Twitter.class.php');

	require_once('inc/Pdf.class.php');

	require_once('inc/images-background-titles.php');

	require_once('inc/TimeLine.class.php');

	require_once('inc/RetosParticipante.class.php');

	require_once('inc/relation-retos-taxonomy.php');



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});



// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////

	/**
	 * Override Jetpack's default OpenGraph image.
	 * Standard is blank WordPress image (https://s0.wp.com/i/blank.jpg).
	 * Christoph Nahr 2015-07-07
	 */
	add_filter( 'jetpack_open_graph_image_default', function() {
	    return THEMEPATH.'video/cccdmx-share.jpg';
	});


	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}

	/**
	 * Regresa la url del attachment especificado
	 * @param  int     	$post_id
	 * @param  string  	$size
	 * @return [string]  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		return isset($image_data[0]) ? $image_data[0] : '';
	}


	/**
	 * GET DATE TRANSFORM
	 */
	function getDateTransform($fecha){
		$dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado','Domingo');
		$dia_name = $dias[date('N', strtotime($fecha)) - 1];

		$fecha = explode('-', $fecha);
		$mes = array('01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' =>'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');

		return array($fecha[2], $mes[$fecha[1]], $fecha[0], $dia_name, $fecha[1]);
	}

	/**
	 * STORE FORM
	 */
	function storeForm($data){
		global $result;

		$content = '<p><strong>Teléfono: </strong>'.$data['telefono_cdmx'].'<p>';
		$content .= '<p><strong>Correo: </strong>'.$data['email_cdmx'].'<p>';
		$content .= '<p><strong>Mensaje: </strong>'.$data['mensaje_cdmx'].'<p>';

		$contact_new = array(
		  'post_title'    => $data['nombre_cdmx'],
		  'post_content'  => $content,
		  'post_status'   => 'publish',
		  'post_type'     => 'formulario-cdmx',
		  'post_author'   => 1,
		);

		wp_insert_post( $contact_new );

		$result['success'] = 'Tu mensaje ha sido enviado exitosamente';

		return true;
	}


	function storeFormEvent($data){
		global $result;

		if (empty($data)) return false;

		$contact_new = array(
		  'post_title'    => $data['nombre_evento'],
		  'post_content'  => $data['descripcion_evento'],
		  'post_type'     => 'eventos',
		  'post_author'   => 1,
		);

		$post_id = wp_insert_post( $contact_new );

		if ($post_id) {
			saveMetaDataEvent($post_id, $data);
			sendMailAdminNewEvent($post_id, $data);
		}

		$result['success'] = 'Tu evento se ha enviado correctamente';
	}

	/**	
	 * ENVIA UN MAIL CUANDO SE GENERA UN NUEVO EVENTO DESDE PARTICIPA
	 * @return [type]          [description]
	 */
	function sendMailAdminNewEvent($post_id, $data){
		$url_edit = admin_url().'post.php?post='.$post_id.'&action=edit';
		$to = "alan.grabinsky@gmail.com";
		$subject = "constitucion.cdmx.gob.mx - Se guardo un nuevo Evento";
		$content = "Hay un nuevo Evento en constitucion.cdmx.gob.mx\n\n";
		$content .= $data['nombre_evento'].' - <a href="'.$url_edit.'">Ver evento</a>'."\n\n";
		$content .= "Frase que describa el evento/sesión: ".get_post_meta( $post_id, 'frace_evento', true ) ."\n";
		$content .= "Fechs Inicio: ".get_post_meta( $post_id, 'fecha_evento', true )."\n";
		$content .= "Fechs Final: ".get_post_meta( $post_id, 'fecha_evento_fin', true )."\n";
		$content .= "Dónde se llevara a cabo el evento: ".get_post_meta( $post_id, 'ubicacion_evento', true )."\n";
		$content .= "Horarios: ".get_post_meta( $post_id, 'horarios_evento', true )."\n";
		$content .= "Institución u organización: ".get_post_meta( $post_id, 'institucion_evento', true )."\n";
		$content .= "Fotografía de cartel o publicidad del acontecimiento: ".get_post_meta( $post_id, 'fotografia_evento', true )."\n";
		$content .= "Correo electrónico: ".get_post_meta( $post_id, 'correo_evento', true );

		$headers = 'From: info@constitucion.cdmx.gob.mx'."\r\n".
			'X-Mailer: PHP/' . phpversion();
	
		return wp_mail($to, $subject, $content, $headers);
	}

	/**
	 * STORE FORM TEST
	 */
	function storeFormTest($data){
		global $result;

		if (empty($data)) return false;

		$contact_new = array(
		  'post_title'    => $data['titulo_ensayo'],
		  'post_content'  => $data['resumen_ensayo'],
		  'post_type'     => 'ensayos',
		  'post_author'   => 1,
		);

		$post_id = wp_insert_post( $contact_new );

		if ($post_id) {
			saveMetaDataTest($post_id, $data);
			sendMailAdminNewTest($post_id, $data);
		}

		$result['success'] = 'Tu ensayo se ha enviado correctamente';
	}

	/**	
	 * ENVIA UN MAIL CUANDO SE GENERA UN NUEVO EVENTO DESDE PARTICIPA
	 * @return [type]          [description]
	 */
	function sendMailAdminNewTest($post_id, $data){
		$url_edit = admin_url().'post.php?post='.$post_id.'&action=edit';
		$to = "alan.grabinsky@gmail.com";
		$subject = "constitucion.cdmx.gob.mx - Se guardo un nuevo Ensayo";
		$content = "Hay un nuevo Ensayo en constitucion.cdmx.gob.mx \n\n";
		$content .= $data['titulo_ensayo'].' - <a href="'.$url_edit.'">Ver Ensayo</a>';
		
		$headers = 'From: info@constitucion.cdmx.gob.mx'."\r\n".
			'X-Mailer: PHP/' . phpversion();
	
		return wp_mail($to, $subject, $content, $headers);
	}

	/**	
	 * GUARDA LA INFORMACION DEL ENSAYO 
	 * @return [type]          [description]
	 */
	function saveMetaDataTest($post_id, $data){
		update_post_meta($post_id, 'tipo-de-evento', 2);
		foreach ($data as $meta_key => $meta_value):
			if ($meta_key != 'titulo_ensayo' AND $meta_key != 'resumen_ensayo' AND $meta_key != 'accion'):
				update_post_meta($post_id, $meta_key, $meta_value);
			endif;
		endforeach;

	}

	/**	
	 * GUARDA LA INFORMACION DEL EVENTO
	 * @return [type]          [description]
	 */
	function saveMetaDataEvent($post_id, $data){
		update_post_meta($post_id, 'tipo-de-evento', 2);
		foreach ($data as $meta_key => $meta_value):
			if ($meta_key != 'nombre_evento' AND $meta_key != 'descripcion_evento' AND $meta_key != 'accion'):
				update_post_meta($post_id, $meta_key, $meta_value);
			endif;
		endforeach;

	}

	/**
	 * RETURN KIOSKOS
	 */
	function getKioskos(){
		$kioscos = new WP_Query(array(
				'post_type'      => 'kioskos',
				'posts_per_page' => -1,
			));
		$new_arr = array();
		if ( $kioscos->have_posts() ) :

			$count = 1;
			while ( $kioscos->have_posts() ) : $kioscos->the_post();

				$latitud_kiosko = get_post_meta(get_the_ID(), 'latitud_kiosko', true);
				$longitud_kiosko = get_post_meta(get_the_ID(), 'longitud_kiosko', true);

				if ($latitud_kiosko != '' AND $longitud_kiosko != '') {
					$new_arr[$count]['lat'] = $latitud_kiosko;
					$new_arr[$count]['long'] = $longitud_kiosko;
					$new_arr[$count]['name'] = get_the_title();
				}


				$count++;
			endwhile;
		endif;
		wp_reset_postdata();

		return $new_arr;

	}

	/**
	 * DEVUELVE DOCUMENTO PDF DEL POST
	 */
	function get_attachment_pdf($post_id){

		global $wpdb;
		$result = $wpdb->get_results(
			"SELECT * FROM {$wpdb->prefix}posts
				WHERE post_parent      = '$post_id'
					AND post_type      = 'attachment'
					AND post_mime_type = 'application/pdf' LIMIT 1;", OBJECT
		);
		return $result ? wp_get_attachment_url( $result[0]->ID ) : false;

	}

/**
 * EDITAR GALERIA DEL CONTENT
 */

	remove_shortcode('gallery');
	add_shortcode('gallery', 'parse_gallery_shortcode');
	function parse_gallery_shortcode($atts) {
		global $post;
		if ( ! empty( $atts['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $atts['orderby'] ) )
				$atts['orderby'] = 'post__in';
			$atts['include'] = $atts['ids'];
		}
		extract(shortcode_atts(array(
			'orderby' => 'menu_order ASC, ID ASC',
			'include' => '',
			'id' => $post->ID,
			'itemtag' => 'dl',
			'icontag' => 'dt',
			'captiontag' => 'dd',
			'columns' => 3,
			'size' => 'medium',
			'link' => 'file'
		), $atts));
		$args = array(
			'post_type' => 'attachment',
			'post_status' => 'inherit',
			'post_mime_type' => 'image',
			'orderby' => $orderby
		);
		if ( !empty($include) )
			$args['include'] = $include;
		else {
			$args['post_parent'] = $id;
			$args['numberposts'] = -1;
		}
		$images = get_posts($args);
		echo '<div class="[ row ][ margin-bottom--large ]">';
			foreach ( $images as $image ) {
				$img_url = wp_get_attachment_image_src($image->ID, 'images_gal_cdmx');
				// render your gallery here
				echo '<div class="[ col-xs-4 col-sm-3 ][ no-padding--right--xs ]"><img src="'.$img_url[0].'" class="[ img-responsive ][ margin-auto ]" alt="<?php echo get_the_title(); ?>"></div>';

			}
		echo "</div>";
	}

/**
 * PAGINACION
 */

	function round_num($num, $to_nearest) {
	   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
	   return floor($num/$to_nearest)*$to_nearest;
	}

	/**
	 * OPCIONES PARA LA PAGINACION
	 * @return [type] [description]
	 */
	function optionsPagination(){
		$pagenavi_options = array();
	    $pagenavi_options['pages_text'] = ('Página %CURRENT_PAGE% de %TOTAL_PAGES%:');
	    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	    $pagenavi_options['first_text'] = ('Primera');
	    $pagenavi_options['last_text'] = ('Última');
	    $pagenavi_options['next_text'] = 'Siguiente';
	    $pagenavi_options['prev_text'] = 'Anterior';
	    $pagenavi_options['dotright_text'] = '...';
	    $pagenavi_options['dotleft_text'] = '...';
	    $pagenavi_options['num_pages'] = 3; //continuous block of page numbers
	    $pagenavi_options['always_show'] = 0;
	    $pagenavi_options['num_larger_page_numbers'] = 0;
	    $pagenavi_options['larger_page_numbers_multiple'] = 5;

	    return $pagenavi_options;
	}


	/**
	 * PAGINACION ARCHIVES (NOTA: partir en mas funciones - alex)
	 * @return [string]         [html con la paginacion]
	 */
	function pagenavi($paged = '', $num_pages = '', $siteUrl = '', $especial = false, $simbol_url = '?', $variable_page = 'paged') {

	    global $wpdb, $wp_query;

	    $before = '';
	    $after = '';

	    $pagenavi_options = optionsPagination();

	    if (!is_single()) {

	        $paged = $paged == '' ? intval(get_query_var($variable_page)) : $paged;
	        $max_page = $num_pages == '' ? $wp_query->max_num_pages : $num_pages;

	        if(empty($paged) || $paged == 0) {
	            $paged = 1;
	        }

	        $pages_to_show = intval($pagenavi_options['num_pages']);
	        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
	        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
	        $pages_to_show_minus_1 = $pages_to_show - 1;
	        $half_page_start = floor($pages_to_show_minus_1/2);
	        $half_page_end = ceil($pages_to_show_minus_1/2);
	        $start_page = $paged - $half_page_start;

	        if($start_page <= 0) {
	            $start_page = 1;
	        }

	        $end_page = $paged + $half_page_end;
	        if(($end_page - $start_page) != $pages_to_show_minus_1) {
	            $end_page = $start_page + $pages_to_show_minus_1;
	        }
	        if($end_page > $max_page) {
	            $start_page = $max_page - $pages_to_show_minus_1;
	            $end_page = $max_page;
	        }
	        if($start_page <= 0) {
	            $start_page = 1;
	        }

	        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
	        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
	        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
	        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
	        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);

	        if($larger_start_page_end - $larger_page_multiple == $start_page) {
	            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
	            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
	        }
	        if($larger_start_page_start <= 0) {
	            $larger_start_page_start = $larger_page_multiple;
	        }
	        if($larger_start_page_end > $max_page) {
	            $larger_start_page_end = $max_page;
	        }
	        if($larger_end_page_end > $max_page) {
	            $larger_end_page_end = $max_page;
	        }
	        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {

	            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
	            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
	            echo $before.'<div class="pagenavi [ color-primary ]">'."\n";

	            if(!empty($pages_text)) {
	                echo '<ul class="[ pagination ][ no-margin ]">';
	            }

	            echo '<li class="pag-anterior">';
	            	if ($especial == true) {
	            		$pa = $paged - 1;
	            		echo $paged > 1 ? '<a class="[ color-primary ]" href="'.$siteUrl.$simbol_url.$variable_page.'='.$pa.'"> < </a>' : '';
	            	}else{
	            		previous_posts_link($pagenavi_options['prev_text']);
	            	}

	            echo '</li>';

	            if ($start_page >= 2 && $pages_to_show < $max_page) {
	                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);

	                $url = $especial == true ? $siteUrl.$simbol_url.$variable_page.'=1' : esc_url(get_pagenum_link());
	                echo '<li><a href="'.$url.'" class="first [ color-primary ]" title="'.$first_page_text.'">1</a></li>';
	                if(!empty($pagenavi_options['dotleft_text'])) {
	                    echo '<li><span class="expand">'.$pagenavi_options['dotleft_text'].'</span></li>';
	                }
	            }

	            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
	                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
	                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
	                    echo '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
	                }
	            }

	            for($i = $start_page; $i  <= $end_page; $i++) {
	                if($i == $paged) {
	                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
	                    echo '<li class="num-pag-current active [ bg-primary ]"><span class="current">'.$current_page_text.'</span></li>';
	                } else {
	                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
	                    $url = $especial == true ? $siteUrl.$simbol_url.$variable_page.'='.$i : esc_url(get_pagenum_link($i));
	                    echo '<li class="num-pag"><a href="'.$url.'" class="single_page [ color-primary ]" title="'.$page_text.'">'.$page_text.'</a></li>';
	                }
	            }

	            if ($end_page < $max_page) {
	                if(!empty($pagenavi_options['dotright_text'])) {
	                    echo '<li><span class="expand">'.$pagenavi_options['dotright_text'].'</span></li>';
	                }
	                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
	               	$url = $especial == true ? $siteUrl.$simbol_url.$variable_page.'='.$max_page : esc_url(get_pagenum_link($max_page));
	                echo '<li><a href="'.$url.'" class="last [ color-primary ]" title="'.$last_page_text.'">'.$max_page.'</a></li>';
	            }
	            echo '<li class="pag-siguiente">';
	            	if ($especial == true) {
	            		$pa = $paged + 1;
	            		echo $paged < $num_pages ? '<a class="[ color-primary ]" href="'.$siteUrl.$simbol_url.$variable_page.'='.$pa.'"> > </a>' : '';
	            	}else{
	            		next_posts_link($pagenavi_options['next_text'], $max_page);
	            	}
	            echo '</li>';

	            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
	                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
	                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
	                    echo '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page edsf	" title="'.$page_text.'">'.$page_text.'</a></li>';
	                }
	            }
	            echo '</ul></div>'.$after."\n";
	        }
	    }
	}



