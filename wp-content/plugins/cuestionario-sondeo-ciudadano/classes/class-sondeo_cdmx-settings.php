<?php

class Sondeo_CDMX_Settings {

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
		$this->hooks();
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
	}

	/**
	 * Add menu pages
	 */
	public function add_menu_pages() {
		add_menu_page( 'Respuestas Sondeo Masivo', 'Respuestas Sondeo CDMX', 'manage_options', 'menu_sondeo_cdmx', array( $this, 'add_sondeo_cdmx_page' ) );
		add_submenu_page ( null, 'Ver respuestas', '', 'manage_options', 'respuestas_sondeo_cdmx', array( $this, 'add_respuestas_sondeo_cdmx_page' ) );
	}

	/**
	 * Add javascript and style files
	 */
	function enqueue_and_localize_scripts(){
		wp_enqueue_script( 'plugins', SONDEO_CDMX_PLUGIN_URL . 'inc/js/plugins.js', array('jquery') );
		wp_enqueue_script( 'sondeo_cdmx_admin_functions', SONDEO_CDMX_PLUGIN_URL . 'inc/js/admin-functions.js', array('jquery') );
		wp_localize_script( 'sondeo_cdmx_admin_functions', 'ajax_url', admin_url('admin-ajax.php') );
	}

	/**
	 * The main screen
	 */
	public function add_sondeo_cdmx_page() {
		$survey = Sondeo_CDMX_Survey::get();

		if( isset( $_GET['delete'] ) ){
			$survey->delete_survey( $_GET['delete'] );
			echo '<div class="notice-success notice is-dismissible"><p>Se ha eliminado la encuesta correctamente.</p></div>';
		}
		
		$answered_surveys = $survey->get_answered_surveys();
		?>
		<div class="[ wrap ]">
			<h1>Sondeo Imagina tu Ciudad</h1>
			<p>Aquí podrás consultar las encuestas de la sección "Imagina tu Ciudad"</p>
			<hr>
			<?php if( empty( $answered_surveys ) ) : ?>
				<p>Por el momento no hay ninguna encuesta.</p>
			<?php else: ?>
				<table class="[ form-table ]">
					<thead>
						<tr>
							<th>#</th>
							<th>Número de folio</th>
							<th>Fecha y hora</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $answered_surveys as $key => $survey ) : ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $survey['reference_code'] ?></td>
								<td><?php echo $survey['created_at'] ?></td>
								<td><a href="<?php echo admin_url( '/admin.php?page=respuestas_sondeo_cdmx', 'http' ) . '&reference_code=' . $survey['reference_code']?>">Ver respuestas</a></td>
								<td><a href="<?php echo admin_url( '/admin.php?page=menu_sondeo_cdmx', 'http' ) . '&delete=' . $survey['reference_code']?>">Eliminar encuesta</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
		<?php
	}// add_sondeo_cdmx_page

	/**
	 * The main screen
	 */
	public function add_respuestas_sondeo_cdmx_page() {
		if( ! isset( $_GET['reference_code'] ) ){
			echo '<p>Ha ocurrido un error</p>';
			echo '<a href="' . admin_url( '/admin.php?page=menu_sondeo_cdmx', 'http' ) . '">Ver todas las encuestas</a>';
       	 	exit;
		}
		$survey = Sondeo_CDMX_Survey::get();
		$answered_surveys = $survey->get_survey( $_GET['reference_code'] );
		?>

		<div class="[ wrap ]">
			<a href="<?php echo admin_url( '/admin.php?page=menu_sondeo_cdmx', 'http' ) ?>">Ver todas las encuestas</a>
			<h1>Sondeo CDMX</h1>
			<p>Encuesta con número de folio <?php echo $answered_surveys[0]['reference_code'] ?> creada el <?php echo $answered_surveys[0]['created_at'] ?></p>
			<hr>
			<table class="[ form-table ]">
				<thead>
					<tr>
						<th>#</th>
						<th>Preguntas</th>
						<th>Respuestas</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $answered_surveys as $key => $survey ) : ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $survey['question'] ?></td>
							<td><?php echo $survey['answer'] ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php
	}// add_respuestas_sondeo_cdmx_page

}