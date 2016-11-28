<?php

class RetosParticipante {

	public $folio;
	public $retos;

	public function __construct($folio)
	{
		if ( $folio == '' )  {
	        return false;
	    }

		$this->folio = $folio;
		$this->retos = $this->get_retos_folio();
	}

	/**
	 * REGRESA LOS RETOS RELACIONADOS AL FOLIO
	 * @return [object] [CH]
	 */
	public function get_retos_relacionados()
	{
		return $this->get_posts_pubpub();
	}

	/**
	 * ENSAYOS PUBPUB QUE PERTENECEN A LOS RETOS
	 * @return [array] [ensayos por reto]
	 */
	private function get_posts_pubpub()
	{
		$ids_terms_retos = $this->get_id_retos_relacionados();
		$posts = array();
		foreach ($ids_terms_retos as $id_term) {
			$args = array(
				'post_type' => 'ensayos-pubpub',
				'tax_query' => array(
					array(
						'taxonomy' => 'taxonomy-grandes-retos',
						'field'    => 'term_id',
						'terms'    => $id_term,
					),
				)
			);
			$query = new WP_Query( $args );

			if( ! empty($query->posts) ) $posts[$id_term] = $query->posts;
			if( empty($query->posts) ) $posts[$id_term] = array();
		}

		return $posts;
	}

	/**
	 * REGRESA EL ID DE LOS TERMS TAXOMOMY RELACIONADOS AL FOLIO
	 * @return [type] [description]
	 */
	private function get_id_retos_relacionados()
	{
		$todos_retos = $this->get_all_retos();
		$terms = array();
		if ( ! empty($this->retos) ) {
			foreach ($this->retos as $key => $value) {
				$index = trim($value->answer);
				isset($todos_retos[$index]) ? $terms[] = $todos_retos[$index] : '';
			}
		}

		return $terms;
	}

	/**
	 * VA POR LOS RETOS DEL FOLIO
	 * @param  [string] $folio [numero de folio]
	 * @return [object]        [retos del folio]
	 */
	private function get_retos_folio()
	{
		global $wpdb;
		$prefix = $wpdb->prefix;

		return $wpdb->get_results("SELECT * FROM {$prefix}sondeo_cdmx_user_answers
				WHERE reference_code = '{$this->folio}' AND question_id = 26; ", OBJECT );
	}


	/**
	 * REGRESA TODOS LOS RETOS
	 * @return [object] [retos]
	 */
	private function get_all_retos()
	{
		$categories = get_terms( 'taxonomy-grandes-retos', 'orderby=count&hide_empty=0' );

		$new_arr = array();
		if ( ! empty($categories) ) {
			foreach ($categories as $key => $term) {
				$new_arr[$term->name] = $term->term_id;
			}
		}

		return $new_arr;
	}




}
