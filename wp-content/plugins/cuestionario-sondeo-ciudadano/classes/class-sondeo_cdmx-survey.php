<?php

class Sondeo_CDMX_Survey {

	const Q_PIENSAS_CDMX 			= 25;
	const Q_GRANDES_RETOS 			= 26;
	const Q_CDMX_IDEAL	 			= 28;
	const Q_OBSTACULOS_PRINCIPALES 	= 29;
	const Q_COSAS_VALIOSAS 			= 32;

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return null or Sondeo_CDMX instance
	 */
	public static function get() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->init();
	}

	/**
	 * Initialize class
	 */
	private function init() {
		$this->hooks();
		$this->create_survey_page();
		$this->create_results_page();

		if( ! is_admin() ){
			add_shortcode( 'show-survey', array( $this, 'display_survey' ) );
		}
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		add_action( 'wp_ajax_nopriv_save_user_answers', array( $this, 'save_user_answers' ) );
		add_action( 'wp_ajax_save_user_answers', array( $this, 'save_user_answers' ) );

		add_action( 'wp_ajax_nopriv_survey_exists', array( $this, 'survey_exists' ) );
		add_action( 'wp_ajax_survey_exists', array( $this, 'survey_exists' ) );

		if( is_admin() ){
			add_action( 'init', array( $this, 'register_retos_pt' ) );
			return;
		}

		add_action( 'template_redirect', array( $this, 'load_script_is_page' ) );
	}

	/**
	 * Creates a Wordpress Page for for the survey.
	 */
	private function create_survey_page(){
		if( ! get_page_by_path( 'sondeo-masivo' ) ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Sondeo Masivo',
				'post_name'   => 'sondeo-masivo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
	}

	/**
	 * Creates a Wordpress Page for for the survey.
	 */
	private function create_results_page(){
		if( ! get_page_by_path( 'resultados' ) ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Resultados',
				'post_name'   => 'resultados',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
	}

	/**
	 * Load scripts in specific pages
	 */
	public function load_script_is_page(){
		if( is_page( 'sondeo-masivo' )  ){
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
		}
	}

	/**
	 * Register post type 'grandes retos' to show
	 * retos in question 26
	 */
	public function register_retos_pt(){
		$labels = array(
			'name'          => 'Grandes retos',
			'singular_name' => 'Grandes retos',
			'add_new'       => 'Nuevo reto',
			'add_new_item'  => 'Nuevo reto',
			'edit_item'     => 'Editar reto',
			'new_item'      => 'Nuevo reto',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver reto',
			'search_items'  => 'Buscar reto',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Grandes retos'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'grandes-retos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title' )
		);
		register_post_type( 'grandes-retos', $args );
		//$this->insert_grandes_retos();
	}// register_retos_pt


	private function insert_grandes_retos(){
		$retos = array(
			'Transporte y movilidad',
			'Empleo',
			'Salario Mínimo',
			'Pobreza y desigualdad económica',
			'Educación de calidad',
			'Población sana',
			'Vivienda',
			'Planificación urbana y uso de suelo',
			'Espacio Público',
			'Agua',
			'Sustentabilidad ambiental',
			'Participación comunitaria',
			'Coordinación Metropolitana',
			'Corrupción',
			'Finanzas públicas',
			'Servidores públicos capaces',
			'Instituciones públicas sólidas y confiables',
			'Equidad de género',
			'Oportunidades para jóvenes',
			'Derechos de los niños',
			'Derechos LGBTTTI',
			'Grupos vulnerables ',
			'Vejez digna',
			'Legalidad y Justicia',
			'Derechos Humanos',
			'Otro',
		);
		foreach ( $retos as $reto ) {
			if ( $this->reto_exists( $reto ) ){
				continue;
			}
			$post_reto = array(
				'post_type'		=> 'grandes-retos',
				'post_title'    => $reto,
				'post_status'   => 'publish'
			);
			wp_insert_post( $post_reto );
		}
	}

	/**
	 * Check if a post exists
	 * @param [string] $title
	 */
	private function reto_exists( $title ) {
		global $wpdb;
		return $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "posts WHERE LOWER( post_title ) = LOWER ('" . $title . "')", 'ARRAY_A' );
	}

	/**
	 * Fetch all options for post type "grandes retos"
	 */
	function get_options_grandes_retos() {
		global $wpdb;
		return $wpdb->get_col( "SELECT post_title FROM $wpdb->posts WHERE post_type = 'grandes-retos' AND post_status = 'publish' ORDER BY RAND()" );
	}

	/**
	 * Add javascript and style files
	 */
	public function enqueue_and_localize_scripts(){
		// css
		//wp_enqueue_style( 'normalize', SONDEO_CDMX_PLUGIN_URL . 'inc/css/normalize.css' );
		wp_enqueue_style( 'demo', SONDEO_CDMX_PLUGIN_URL . 'inc/css/demo.css' );
		wp_enqueue_style( 'component', SONDEO_CDMX_PLUGIN_URL . 'inc/css/component.css' );
		wp_enqueue_style( 'cs-select', SONDEO_CDMX_PLUGIN_URL . 'inc/css/cs-select.css' );
		wp_enqueue_style( 'cs-skin-boxes', SONDEO_CDMX_PLUGIN_URL . 'inc/css/cs-skin-boxes.css' );
		// js
		wp_enqueue_script( 'normalize', SONDEO_CDMX_PLUGIN_URL . 'inc/js/modernizr.custom.js', array('jquery'), '1.0', false );
		wp_enqueue_script( 'function-prev', SONDEO_CDMX_PLUGIN_URL . 'inc/js/function-prev.js', array('normalize'), '1.0', true );
		wp_enqueue_script( 'classie', SONDEO_CDMX_PLUGIN_URL . 'inc/js/classie.js', '', '1.0', true );
		wp_enqueue_script( 'select_fx', SONDEO_CDMX_PLUGIN_URL . 'inc/js/selectFx.js', '', '1.0', true );
		wp_enqueue_script( 'fullscreen_form', SONDEO_CDMX_PLUGIN_URL . 'inc/js/fullscreenForm.js', '', '1.0', true );
		wp_enqueue_script( 'sondeo_cdmx_functions', SONDEO_CDMX_PLUGIN_URL . 'inc/js/functions.js', array('fullscreen_form'), '1.0', true );
		wp_localize_script( 'functions', 'allDelegaciones', $this->get_delegaciones() );
		wp_localize_script( 'functions', 'allColonias', $this->get_colonias() );
		wp_localize_script( 'functions', 'allMunicipios', $this->get_municipios() );
		wp_localize_script( 'functions', 'allEstados', $this->get_estados() );
		wp_localize_script( 'functions', 'allPaises', $this->get_paises() );
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
	}

	public function display_survey(){
		//$questions = $this->get_questions();
		$next_question = 3;
		?>
		<div class="[ survey-container ]">
			<div class="[ container ][ height-100 ]">
				<div class="[ fs-form-wrap ]" id="fs-form-wrap">
					<div class="[ fs-back-to-site ]">
						<a id="return-site" class="[ color-primary ]" href="<?php echo site_url(); ?>">< Regresar al sitio</a>
					</div>
					<div class="[ fs-title ][ text-center ]">
						<h1 class="[ ]">Imagina tu ciudad</h1>
					</div>
					<form id="myform" class="fs-form fs-form-full" autocomplete="off">
						<ol class="fs-fields">
							<li id="js-donde-vives" data-question="1">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]">¿En dónde vives?</label>
								<div id="radio-donde-vives" class="fs-radio-group fs-radio-custom clearfix fs-anim-lower [ text-center ]">
									<span><input id="q1-1" name="ubicacion-vives" type="radio" value="zmvm" required/><label for="q1-1" class="radio-zmvm">Zona Metropolitana</label></span>
									<span><input id="q1-2" name="ubicacion-vives" type="radio" value="resto-republica" /><label for="q1-2" class="radio-resto-republica">Resto de la república</label></span>
									<span><input id="q1-3" name="ubicacion-vives" type="radio" value="fuera-mexico" /><label for="q1-3" class="radio-fuera-mexico">Fuera de México</label></span>
									<br/>
									<hr class="[ color-primary ][ clear ]">
								</div>
							</li>
							<li id="js-delegaciones-estados-paises"></li>

							<li id="js-genero" data-input-trigger data-question="7">
								<label class="fs-field-label fs-anim-upper  [ color-gray ]" for="genero">Género</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q7-1" name="genero" type="radio" value="mujer"/><label for="q7-1" class="radio-mujer">Mujer</label></span>
									<span><input id="q7-2" name="genero" type="radio" value="hombre" /><label for="q7-2" class="radio-hombre">Hombre</label></span>
									<span><input id="q7-3" name="genero" type="radio" value="otro" /><label for="q7-3" class="radio-otro">Otro</label></span>
									<span><input id="q7-3" name="genero" type="radio" value="ninguno" /><label for="q7-3" class="radio-otro">Ninguno</label></span>
								</div>
							</li>
							<li id="js-edad" data-question="8">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="q3">Edad</label>
								<input class="fs-anim-lower" id="q3" name="q3" type="number" placeholder="¿Cuántos años tienes?" required/>
							</li>
  							<li id="js-dedicas-multiple" data-input-trigger>
								<label class="fs-field-label fs-anim-upper  [ color-gray ]" for="genero">¿A qué te dedicas?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q9-1" name="dedicas" type="radio" value="estudio" /><label for="q9-1" class="radio-si">Estudio</label></span>
									<span><input id="q9-2" name="dedicas" type="radio" value="trabajo" /><label for="q9-2" class="radio-no">Trabajo</label></span>
									<span><input id="q9-3" name="dedicas" type="radio" value="ambas" /><label for="q9-3" class="radio-no">Ambas</label></span>
									<span><input id="q9-4" name="dedicas" type="radio" value="ninguna" /><label for="q9-4" class="radio-no">Ninguna</label></span>
								</div>
							</li>

							<li id="js-dedicas" data-question="9">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="q4">¿En qué trabajas?</label>
								<textarea class="fs-anim-lower" id="q4" name="q4" placeholder=""></textarea>
							</li>
							<li id="js-trabajas" data-input-trigger data-question="10">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="trabajas">¿Trabajas?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q10-1" name="trabajas" type="radio" value="si" /><label for="q10-1" class="radio-si">Sí</label></span>
									<span><input id="q10-2" name="trabajas" type="radio" value="no" /><label for="q10-2" class="radio-no">No</label></span>
								</div>
							</li>
							<li id="js-donde-trabajas" data-question="11">
								<label class="fs-field-label fs-anim-upper  [ color-gray ]">¿En dónde trabajas?</label>
								<div id="radio-donde-trabajas" class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q11-1" name="ubicacion-trabajas" type="radio" value="zmvm" required/><label for="q11-1" class="radio-zmvm">Zona Metropolitana</label></span>
									<span><input id="q11-2" name="ubicacion-trabajas" type="radio" value="resto-republica" /><label for="q11-2" class="radio-resto-republica">Resto de la república</label></span>
									<span><input id="q11-3" name="ubicacion-trabajas" type="radio" value="fuera-mexico" /><label for="q11-3" class="radio-fuera-mexico">Fuera de México</label></span>
									<br/>
									<hr class="[ color-primary ][ clear ]">
								</div>
							</li>
							<li id="js-trabajas-delegaciones-estados-paises" data-input-trigger data-question="12">
							</li>
							<li id="js-estudias" data-input-trigger data-question="17">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="estudias">¿Estudias?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q17-1" name="estudias" type="radio" value="si" /><label for="q17-1" class="radio-si">Sí</label></span>
									<span><input id="q17-2" name="estudias" type="radio" value="no" /><label for="q17-2" class="radio-no">No</label></span>
								</div>
							</li>
							<li id="js-donde-estudias" data-question="18">
								<label class="fs-field-label fs-anim-upper  [ color-gray ]">¿En dónde estudias?</label>
								<div id="radio-donde-estudias" class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q18-1" name="ubicacion-estudias" type="radio" value="zmvm" required /><label for="q18-1" class="radio-zmvm">Zona Metropolitana</label></span>
									<span><input id="q18-2" name="ubicacion-estudias" type="radio" value="resto-republica" /><label for="q18-2" class="radio-resto-republica">Resto de la república</label></span>
									<span><input id="q18-3" name="ubicacion-estudias" type="radio" value="fuera-mexico" /><label for="q18-3" class="radio-fuera-mexico">Fuera de México</label></span>
									<br/>
									<hr class="[ color-primary ]">
								</div>
							</li>
							<li id="js-estudias-delegaciones-estados-paises" data-input-trigger data-question="19">
							</li>
							<li id="js-naciste-cdmx" data-input-trigger data-question="24">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="naciste-cdmx">¿Naciste en la CDMX?</label>
								<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
									<span><input id="q24-1" name="naciste-cdmx" type="radio" value="si" /><label for="q24-1" class="radio-si">Sí</label></span>
									<span><input id="q24-2" name="naciste-cdmx" type="radio" value="no" /><label for="q24-2" class="radio-no">No</label></span>
								</div>
							</li>
							<li id="js-piensas-cdmx" data-question="25">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="piensas-cdmx" data-info="Las palabras deben ir separadas por comas.">¿Cuáles son las tres primeras palabras que te llegan a la mente cuando piensas en la Ciudad de México?</label>
								<input class="fs-anim-lower" id="q8" name="piensas-cdmx" type="text" placeholder="Ej. palabra1, palabra2, palabra3" comma-required/>
							</li>
							<li id="js-grandes-retos" data-question="26">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="grandes-retos">Si pensaras en los grandes retos de esta Ciudad, ¿cuáles son los primeros cuatro que te llegan a la mente?</label>
								<?php $grandes_retos = $this->get_options_grandes_retos(); ?>
								<div class="[ long-answers--container ]">
									<?php foreach ( $grandes_retos as $reto ) : ?>
										<a href="#" class="[ btn btn-skin-boxes fs-show-next ]"><?php echo $reto; ?></a>
									<?php endforeach; ?>
								</div>
								<input class="[ fs-anim-lower ]" id="input-retos" name="grandes-retos" type="text" required/>
							</li>
							<li id="js-como-imaginas" data-question="28">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="como-imaginas" data-info="Máximo 140 caracteres.">¿Cómo te imaginas la CDMX ideal, en 20 años?</label>
								<textarea class="fs-anim-lower" id="q10" name="como-imaginas" placeholder="" maxlength="140" onkeyup="countChar(this, 140, '#counter-imaginas')"></textarea>
								<span class="[ color-primary ]" id="counter-imaginas">140</span>
							</li>
							<li id="js-obstaculos-principales" data-question="29">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="obstaculos-principales" data-info="Las palabras deben ir separadas por comas.">Pensando en esta visión de ciudad, ¿cuáles son los tres obstáculos principales para que se haga realidad?</label>
								<input class="fs-anim-lower" id="q11" name="obstaculos-principales" type="text" placeholder="Ej. palabra1, palabra2, palabra3" comma-required/>
							</li>
							<li id="js-vision-realidad" data-question="30">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="vision-realidad" data-info="Máximo 140 caracteres.">Imagina que es el año 2036. Tu visión se hizo realidad. ¿Qué tuvo que hacer el gobierno para que esto sucediera?</label>
								<textarea class="fs-anim-lower" id="q12" name="vision-realidad" placeholder="" maxlength="140" onkeyup="countChar(this, 140, '#counter-vision')"></textarea>
								<span class="[ color-primary ]" id="counter-vision">140</span>
							</li>
							<li id="js-tuviste-hacer" data-question="31">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="tuviste-hacer" data-info="Máximo 140 caracteres.">¿Y qué tuviste que hacer tú?</label>
								<textarea class="fs-anim-lower" id="q13" name="tuviste-hacer" placeholder="" maxlength="140" onkeyup="countChar(this, 140, '#counter-tuviste')"></textarea>
								<span class="[ color-primary ]" id="counter-tuviste">140</span>
							</li>
							<li id="js-cosas-valiosas" data-question="32">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="cosas-valiosas" data-info="Las palabras deben ir separadas por comas.">¿Cuáles son las tres cosas más valiosas de la CDMX?</label>
								<input class="fs-anim-lower" id="q14" name="cosas-valiosas" type="text" placeholder="Ej. palabra1, palabra2, palabra3" comma-required/>
							</li> 
							<li id="js-captcha" data-question="999">
								<label class="[ fs-field-label fs-anim-upper ][ color-gray ]" for="q3">Necesitamos asegurarnos de que no seas un robot. ¿Cuánto es <span></span> + <span></span>?</label>
								<input class="fs-anim-lower" id="q3" name="q3" type="number" placeholder="" captcha-required/>
								<p class="[ accept-terms ]">Al aceptar, estoy de acuerdo con las políticas de privacidad, términos y condiciones de la plataforma. <a class="[ color-primary ]" target="_blank" href="<?php echo site_url('terminos-y-condiciones/' ); ?>">Ver más</a></p>
							</li>
						</ol><!-- /fs-fields -->
						<button class="fs-submit" type="submit">Enviar respuestas</button>
					</form><!-- /fs-form -->
				</div><!-- /fs-form-wrap -->

				<!-- Related demos -->
				<div class="related">
				</div>
			</div>
		</div>
		<?php
	}

	public function add_question( $question, $question_type, $answers ){
		global $wpdb;

		$question_data = array(
			'question'		=> $question,
			'question_type' => $question_type
		);
		$question_inserted = $wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_questions',
			$question_data,
			array( '%s', '%s' )
		);
		if( $question_inserted ){
			$question_id = $wpdb->insert_id;
			foreach ( $answers as $answer ) {
				$this->add_answer( $question_id, $answer );
			}
			return 1;
		}
		return 0;
	}

	public function add_answer( $question_id, $answer ){
		global $wpdb;

		$answer_data = array(
			'sondeo_cdmx_question_id'	=> $question_id,
			'answer' 					=> $answer
		);
		$answer_inserted = $wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_answers',
			$answer_data,
			array( '%d', '%s' )
		);
		if( $answer_inserted ){
			return 1;
		}
		return 0;
	}

	public function get_questions( $format = 'array' ){
		global $wpdb;
		$questions = array();
		$questions_results = $wpdb->get_results('
			SELECT q.id as question_id, question, question_type, a.id AS answer_id, answer FROM ' .
			$wpdb->prefix . 'sondeo_cdmx_questions q
			INNER JOIN ' . $wpdb->prefix . 'sondeo_cdmx_answers a
			ON q.id = a.sondeo_cdmx_question_id'
		);
		$current_question_id = -1;
		foreach ( $questions_results as $key => $result ) {
			if( $current_question_id != $result->question_id ){
				$current_question_id = $result->question_id;
				$questions[$current_question_id] = array(
					'id'			=> $result->question_id,
					'question'		=> $result->question,
					'question_type' => $result->question_type,
					'answers'		=> array(),
					);
			}
			$answer_arr = array(
				'id'		=> $result->answer_id,
				'answer' 	=> $result->answer,
			);
			array_push( $questions[$current_question_id]['answers'], $answer_arr );
		}

		if( 'array' == $format ){
			return $questions;
		}
		json_encode( $questions );
	}

	public function get_delegaciones(){
		global $wpdb;
		$delegaciones = array();
		$delegaciones_results = $wpdb->get_results('
			SELECT * FROM ' .
			$wpdb->prefix . 'sondeo_cdmx_delegaciones'
		);

		foreach ( $delegaciones_results as $result ) {
			$delegaciones[$result->id] =  array(
				'delegacion'	=> $result->delegacion
			);
		}

		return $delegaciones;
	}

	public function get_colonias(){
		global $wpdb;
		$colonias = array();
		$colonias_results = $wpdb->get_results('
			SELECT col.id AS colonia_id, delegacion_id, colonia, delegacion FROM ' . $wpdb->prefix . 'sondeo_cdmx_colonias col
			INNER JOIN ' . $wpdb->prefix . 'sondeo_cdmx_delegaciones del ON col.delegacion_id = del.id'
		);

		$current_delegacion = '';
		foreach ( $colonias_results as $result ) {
			if( $current_delegacion != $result->delegacion ){
				$current_delegacion = $result->delegacion;
				$colonias[$current_delegacion] = array();
			}
			array_push( $colonias[$current_delegacion], $result->colonia );
		}

		return $colonias;
	}

	public function get_municipios(){
		global $wpdb;
		$municipios = array();
		$municipios_results = $wpdb->get_results('
			SELECT id, municipio FROM ' .
			$wpdb->prefix . 'sondeo_cdmx_municipios ORDER BY municipio ASC'
		);

		foreach ( $municipios_results as $result ) {
			$municipios[$result->id] =  array(
				'municipio'	=> $result->municipio
			);
		}

		return $municipios;
	}

	public function get_estados(){
		global $wpdb;
		$estados = array();
		$estados_results = $wpdb->get_results('
			SELECT id, estado FROM ' .
			$wpdb->prefix . 'sondeo_cdmx_estados ORDER BY estado ASC'
		);

		foreach ( $estados_results as $result ) {
			$estados[$result->id] =  array(
				'estado'	=> $result->estado
			);
		}

		return $estados;
	}

	public function get_paises(){
		global $wpdb;
		$paises = array();
		$paises_results = $wpdb->get_results('
			SELECT id, pais FROM ' .
			$wpdb->prefix . 'sondeo_cdmx_paises ORDER BY pais ASC'
		);

		foreach ( $paises_results as $result ) {
			$paises[$result->id] =  array(
				'pais'	=> $result->pais
			);
		}

		return $paises;
	}

	public function save_user_answers(){
		$answers = $_POST['answers'];
		$today = new DateTime();
		$ref_code = $this->format_reference_code( $today->getTimestamp() );
		error_log( $ref_code );
		$ref_code = $ref_code . rand(10, 99);

		foreach ( $answers as $question_id => $answer ) {

			if( self::Q_PIENSAS_CDMX == $question_id || self::Q_GRANDES_RETOS == $question_id || self::Q_OBSTACULOS_PRINCIPALES == $question_id || self::Q_COSAS_VALIOSAS == $question_id ){
				$this->insert_answer_with_commas( $question_id, trim( $answer ), $ref_code );
				continue;
			}

			$this->insert_user_answer( $question_id, $answer, $ref_code );
		}
		echo $ref_code;
		wp_die();
	}

	private function insert_user_answer( $question_id, $answer, $ref_code ){
		if ( 0 == $question_id ) return;
		global $wpdb;
		$answer_data = array(
			'question_id'		=> $question_id,
			'answer' 			=> $answer,
			'reference_code'	=> $ref_code,
			'created_at'		=> current_time('mysql'),
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_user_answers',
			$answer_data,
			array( '%d', '%s', '%s', '%s' )
		);
	}

	private function insert_answer_with_commas( $question_id, $answers, $ref_code ){
		$answer_arr = explode( ',', $answers );
		foreach ( $answer_arr as $key => $answer ) {
			// $this->insert_user_answer( $question_id, trim( $answer ), $ref_code );
			$this->insert_user_answer( $question_id, $answer, $ref_code );
		}
	}

	private function format_reference_code( $code ){
		$numbers = array( '1', '2', '3', '4' );
		$letters   = array( 'C', 'D', 'M', 'X' );
		return str_replace( $numbers, $letters, $code );
	}

	public function get_answered_surveys(){
		global $wpdb;
		$surveys = array();
		$survey_results = $wpdb->get_results('
			SELECT id, reference_code, created_at FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
			GROUP BY reference_code
			ORDER BY created_at DESC'
		);

		foreach ( $survey_results as $key => $survey ) {
			$survey = array(
				'id'				=> $survey->id,
				'reference_code'	=> $survey->reference_code,
				'created_at' 		=> date( 'd-m-Y H:i:s', strtotime( $survey->created_at ) ),
			);
			array_push( $surveys, $survey );
		}
		return $surveys;
	}// get_answered_surveys

	public function get_survey( $ref_code ){
		global $wpdb;
		$survey_answers = array();
		$survey_results = $wpdb->get_results('
			SELECT question_id, text, GROUP_CONCAT(answer SEPARATOR ",") AS answer, reference_code, created_at FROM
			' . $wpdb->prefix . 'sondeo_cdmx_user_answers UA
			INNER JOIN ' . $wpdb->prefix . 'sondeo_cdmx_questions Q ON Q.id = UA.question_id
			WHERE UA.reference_code = "' . $ref_code . '"
			GROUP BY question_id, text, reference_code, created_at'
		);

		foreach ( $survey_results as $key => $survey ) {
			$survey = array(
				'question'			=> $survey->text,
				'answer'			=> $survey->answer,
				'reference_code'	=> $survey->reference_code,
				'created_at' 		=> date( 'd-m-Y H:i:s', strtotime( $survey->created_at ) ),
			);
			array_push( $survey_answers, $survey );
		}
		return $survey_answers;
	}// get_survey

	public function survey_exists(){
		global $wpdb;
		$ref_code = $_POST['reference_code'];
		$ref_code_results = $wpdb->get_results('
			SELECT reference_code FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
			WHERE reference_code = "' . $ref_code . '"'
		);

		if( empty( $ref_code_results ) ){
			echo 0;
			wp_die();
		}
		echo $ref_code_results[0]->reference_code;
		wp_die();

	}// survey_exists

	/**
	 * Get word occurrences from user answers
	 * @param 	[int]   $question_id
	 * @return 	[array]	$word_occurrences
	 */
	public function get_word_occurrences_by_question( $question_id, $separateAnswersAndValues = false ) {
		global $wpdb;
		$word_occurrences = array();

		if( self::Q_GRANDES_RETOS == $question_id){
			$retos = implode( ',', $this->get_options_grandes_retos() );
			//$retos = str_replace( 'otro,', '', $retos );
			$word_results = $wpdb->get_results('
				SELECT TRIM( LOWER( answer ) ) as answer, COUNT( answer ) as occurrences
				FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
				WHERE question_id = ' . $question_id . '
				AND FIND_IN_SET( TRIM( LOWER( answer ) ), "' . $retos . '")
				GROUP BY TRIM( TRIM( LOWER( answer ) ) )
				ORDER BY answer, occurrences'
			);
			// echo $wpdb->last_query;//lists only single query
		} else {
			$word_results = $wpdb->get_results('
				SELECT TRIM( LOWER( answer ) ) as answer, COUNT( answer ) as occurrences
				FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
				WHERE question_id = ' . $question_id . '
				AND answer <> ""
				GROUP BY TRIM( LOWER( answer) )
				ORDER BY occurrences DESC, answer LIMIT 35'
			);
		}

		if( $separateAnswersAndValues ){
			$retos = $this->get_options_grandes_retos();
			array_push( $retos, 'fuck' );
			$word_occurrences['labels'] = array();
			$word_occurrences['values'] = array();
			$max_value = 0;
			foreach ( $word_results as $key => $word ){
				if( intval($word->occurrences) > $max_value ) $max_value = intval($word->occurrences);
				array_push( $word_occurrences['labels'], $word->answer );
				array_push( $word_occurrences['values'], intval( $word->occurrences ) );
			}

			foreach ( $retos as $reto ) {
				if( ! $this->reto_exists( $reto ) ) continue;

				if( ! in_array( $reto, $word_occurrences['labels'] ) ){
					array_push( $word_occurrences['labels'], $reto );
					array_push( $word_occurrences['values'], 0 );
				}
			}
			$word_occurrences['max_value'] = $max_value + 1;
			return $word_occurrences;
		}

		foreach ( $word_results as $key => $word ){
			$word_occurrences[$key] = array(
				'text' => $word->answer,
				'value' => $word->occurrences
			);
		}
		return json_encode( $word_occurrences );
	}

	/**
	 * Get latest answers from a survey question
	 * @param 	[int]   $num_answers
	 * @param 	[int]   $question_id
	 * @return 	[array]	$latest_answers
	 */
	public function get_latest_answers( $num_answers, $question_id ) {
		global $wpdb;
		$latest_answers = array();
		$latest_results = $wpdb->get_results('
			SELECT answer
			FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
			WHERE question_id = ' . $question_id . '
			AND answer <> ""
			ORDER BY created_at DESC
			LIMIT ' . $num_answers
		);
		foreach ( $latest_results as $result ) array_push( $latest_answers, $result->answer );

		return $latest_answers;
	}

	/**
	 * Get the number of time a question has been answered
	 * @param 	[int]   $question_id
	 * @return 	[array]	$latest_answers
	 */
	public function get_number_of_answers_by_question( $question_id ) {
		global $wpdb;
		$latest_results = $wpdb->get_results('
			SELECT COUNT( question_id ) AS num_answers
			FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
			WHERE question_id = ' . $question_id . '
			AND answer <> ""
			GROUP BY question_id'
		);
		foreach ( $latest_results as $result ) $latest_answers = $result->num_answers;

		return $latest_answers;
	}// get_number_of_answers_by_question

	/**
	 * Delete trash answers from Retos
	 */
	public function delete_trash_answers() {
		global $wpdb;
		$retos = implode( ',', $this->get_options_grandes_retos() );
		$word_results = $wpdb->query('
			DELETE FROM ' . $wpdb->prefix . 'sondeo_cdmx_user_answers
			WHERE question_id = 26
			AND NOT FIND_IN_SET( TRIM( LOWER( answer ) ) , "' . $retos . '")'
		);
		echo $word_results;
	}

	/**
	 * Delete an existing survey
	 * @param [string] $reference_code
	 * [bool]
	 */
	public function delete_survey( $reference_code ) {
		global $wpdb;
		return $wpdb->delete( $wpdb->prefix . 'sondeo_cdmx_user_answers', array( 'reference_code' => $reference_code ) );
	}// delete_survey

}// Sondeo_CDMX_Survey