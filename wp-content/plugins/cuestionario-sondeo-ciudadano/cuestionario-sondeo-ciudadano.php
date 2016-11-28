<?php
/**
 * @package CuestionarioSondeoCiudadano
 */
/*
Plugin Name: Cuestionario Sondeo Constitución CDMX
Description: Creación y edición de preguntas y respuestas para el cuestionario del sondeo ciudadano masivo para la Plataforma de Constitución CDMX. 
Version: 1.0
Author: Miguel Cabral
Author URI: http://pcuervo.com
*/ 

if( ! defined( 'SONDEO_CDMX_PLUGIN_URL' ) ){
	define( 'SONDEO_CDMX_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if( ! defined( 'SONDEO_CDMX_PLUGIN_DIR' ) ){
	define( 'SONDEO_CDMX_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SONDEO_CDMX_PLUGIN_FILE' ) ) {
	define( 'SONDEO_CDMX_PLUGIN_FILE', __FILE__ );
}


register_activation_hook( SONDEO_CDMX_PLUGIN_FILE, array( 'Sondeo_CDMX', 'install' ) );
register_deactivation_hook( SONDEO_CDMX_PLUGIN_FILE, array( 'Sondeo_CDMX', 'uninstall' ) );
add_action( 'plugins_loaded', create_function( '', 'Sondeo_CDMX::get();' ) );

class Sondeo_CDMX {

	const SONDEO_CDMX_VERSION = '1.0';

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return Sondeo_CDMX instance
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
		// Load files
		$this->includes();
		// Initialize plugin
		$this->init();
	}

	/**
	 * Create required database tables.
	 */
	public static function install() {
		$sondeo_cdmx = Sondeo_CDMX::get();
		$sondeo_cdmx->create_questions_table();
		$sondeo_cdmx->create_user_answers_table();
		$sondeo_cdmx->create_delegaciones_table();
		$sondeo_cdmx->create_colonias_table();
		$sondeo_cdmx->create_municipios_table();
		$sondeo_cdmx->create_estados_table();
		$sondeo_cdmx->create_paises_table();
		$sondeo_cdmx->fill_delegaciones_colonias();
		$sondeo_cdmx->fill_municipios();
		$sondeo_cdmx->fill_estados();
		$sondeo_cdmx->fill_paises();
		$sondeo_cdmx->fill_preguntas();
		add_option( 'sondeo_cdmx_db_version', Sondeo_CDMX::SONDEO_CDMX_VERSION );
	}

	/**
	 * Delete installed database tables.
	 */
	public static function uninstall() {
		global $wpdb;
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_user_answers" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_questions" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_colonias" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_delegaciones" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_municipios" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_estados" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_paises" );
		delete_option( 'sondeo_cdmx_db_version' );
	}

	/**
	 * Create table "Questions"
	 */
	private function create_questions_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_questions';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				text TEXT NOT NULL,
				question_number INT NOT NULL,
				type VARCHAR(10)  NOT NULL,
				is_dynamic INT NOT NULL,
				is_required INT NOT NULL,
				max_limit INT,
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_questions_table

	private function create_user_answers_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_user_answers';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				question_id MEDIUMINT(9) NOT NULL,
				answer TEXT,
				reference_code varchar(20),
				created_at DATETIME,
				UNIQUE KEY id (id),
				FOREIGN KEY (question_id)
					REFERENCES " . $wpdb->prefix . "sondeo_cdmx_questions(id)
					ON DELETE CASCADE
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_user_answers_table

	private function create_delegaciones_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_delegaciones';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				delegacion VARCHAR(120),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_delegaciones_table

	private function create_colonias_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_colonias';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				delegacion_id MEDIUMINT(9) NOT NULL,
				colonia VARCHAR(120),
				UNIQUE KEY id (id),
				FOREIGN KEY (delegacion_id)
					REFERENCES " . $wpdb->prefix . "sondeo_cdmx_delegaciones(id)
					ON DELETE CASCADE
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_colonias_table

	private function create_municipios_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_municipios';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				municipio VARCHAR(120),
				estado VARCHAR(50),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_municipios_table

	private function create_estados_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_estados';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				estado VARCHAR(120),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_estados_table

	private function create_paises_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_paises';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				pais VARCHAR(120),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_paises_table

	private function fill_delegaciones_colonias(){
		$filename = 'delegaciones-y-colonias.csv';
		if ( ( $gestor = fopen( SONDEO_CDMX_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_delegacion = '';
		    while ( ( $datos = fgetcsv( $gestor, 1700, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	if( $current_delegacion !=  $datos[0] ){
	        		$current_delegacion = $datos[0];
	        		$delegacion_id = Sondeo_CDMX::get()->insert_delegacion( $current_delegacion );
	        	}
		        Sondeo_CDMX::get()->insert_colonia( $delegacion_id, $datos[1] );
		    }
		    fclose( $gestor );
		}
	}

	private function insert_delegacion( $delegacion ){
		global $wpdb;

		$delegacion_data = array(
			'delegacion'	=> $delegacion
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_delegaciones',
			$delegacion_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	private function insert_colonia( $delegacion_id, $colonia ){
		global $wpdb;

		$colonia_data = array(
			'delegacion_id'	=> $delegacion_id,
			'colonia'		=> $colonia
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_colonias',
			$colonia_data,
			array( '%d', '%s' )
		);
		return $wpdb->insert_id;
	}

	function fill_municipios(){
		$filename = 'municipios-edomex-hidalgo.csv';
		if ( ( $gestor = fopen( SONDEO_CDMX_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_estado = '';
		    while ( ( $datos = fgetcsv( $gestor, 70, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	if( $current_estado !=  $datos[0] ){
	        		$current_estado = $datos[0];
	        	}
		        Sondeo_CDMX::get()->insert_municipio( $current_estado, $datos[1] );
		    }
		    fclose( $gestor );
		}
	}

	private function insert_municipio( $estado, $municipio ){
		global $wpdb;

		$municipio_data = array(
			'estado'	=> $estado,
			'municipio'	=> $municipio
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_municipios',
			$municipio_data,
			array( '%s', '%s' )
		);
		return $wpdb->insert_id;
	}

	private function fill_estados(){
		$filename = 'estados.csv';
		if ( ( $gestor = fopen( SONDEO_CDMX_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_estado = '';
		    while ( ( $datos = fgetcsv( $gestor, 32, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	Sondeo_CDMX::get()->insert_estado( $datos[0] );
		        
		    }
		    fclose( $gestor );
		}
	}

	private function insert_estado( $estado ){
		global $wpdb;

		$municipio_data = array(
			'estado'	=> $estado
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_estados',
			$municipio_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	private function fill_paises(){
		$filename = 'paises.csv';
		if ( ( $gestor = fopen( SONDEO_CDMX_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_pais = '';
		    while ( ( $datos = fgetcsv( $gestor, 32, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	Sondeo_CDMX::get()->insert_pais( $datos[0] );
		        
		    }
		    fclose( $gestor );
		}
	}

	private function insert_pais( $pais ){
		global $wpdb;

		$municipio_data = array(
			'pais'	=> $pais
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_paises',
			$municipio_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	private function fill_preguntas(){
		$filename = 'preguntas.csv';
		$text = 0;
		$question_number = 1;
		$type = 2;
		$is_dynamic = 3;
		$is_required = 4;
		$limit = 5;
		ini_set('auto_detect_line_endings',FALSE);
		if ( ( $gestor = fopen( SONDEO_CDMX_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {

		    while ( ( $datos = fgetcsv( $gestor, 200, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;

	        	Sondeo_CDMX::get()->insert_pregunta( $datos[$text], $datos[$question_number], $datos[$type], $datos[$is_dynamic], $datos[$is_required], $datos[$limit] );
		    }
		    fclose( $gestor );
		}
	}

function insert_pregunta( $text, $number, $type, $is_dynamic, $is_required, $limit ){
	global $wpdb;

	$pregunta_data = array(
		'text'				=> $text,
		'question_number'	=> $number,
		'type'				=> $type,
		'is_dynamic'		=> $is_dynamic,
		'is_required'		=> $is_required,
		'max_limit'			=> $limit,
	);
	$wpdb->insert(
		$wpdb->prefix . 'sondeo_cdmx_questions',
		$pregunta_data,
		array( '%s', '%d', '%s', '%d', '%d', '%d' )
	);
	return $wpdb->insert_id;
}


	/**
	 * Load required files for Wordpress Admin Panel and for Frontend.
	 */
	private function includes() {

		require_once( SONDEO_CDMX_PLUGIN_DIR . 'classes/class-sondeo_cdmx-survey.php' );

		if ( is_admin() ) {
			require_once( SONDEO_CDMX_PLUGIN_DIR . 'classes/class-sondeo_cdmx-settings.php' );
		}

	}

	/**
	 * Initialize class
	 */
	private function init() {
		
		Sondeo_CDMX_Survey::get();
		if ( is_admin() ) {
			// Setup settings
			Sondeo_CDMX_Settings::get();
			return;
		}
	}

}// Sondeo_CDMX
