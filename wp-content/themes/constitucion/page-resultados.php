<?php get_header(); ?>
<script src="<?php echo THEMEPATH; ?>js/zingchart/zingchart.min.js"></script>
<script src="<?php echo THEMEPATH; ?>js/zingchart/modules/zingchart-treemap.min.js"></script>
<?php  
	$survey = Sondeo_CDMX_Survey::get(); 
?>

<div class="[ container ][ margin-top--large ]">

	<section class="[ row ][ margin-bottom ]">

		<?php
			// pregunta #8
			$palabras_que_piensas = $survey->get_word_occurrences_by_question( Sondeo_CDMX_Survey::Q_PIENSAS_CDMX );
			$num_respuestas_que_piensas = $survey->get_number_of_answers_by_question( Sondeo_CDMX_Survey::Q_PIENSAS_CDMX );
		?>

		<div class="[ col-xs-12 padding--sides--xsm col-sm-offset-2 col-sm-8 ]">
			<h2>¿Cuáles son las tres primeras palabras que te llegan a la mente cuando piensas en la Ciudad de México?</h2>
			<h4 class="[ color-gray--light ]">Número total de respuestas: <?php echo $num_respuestas_que_piensas; ?></h4>
			<div id ='pregunta-8'></div>
		</div>

		<script>
		  var configPregunta8 = {
			"graphset":[
				{
					"globals":{
						"fontFamily":"Alegreya Sans",
						"fontColor": "#e0e0e0"
					},
					"type":"treemap",
					"plotarea":{
						"margin":"0 0 30 0"
					},
					"options":{
						"aspect-type":"transition",
						"color-start":"#457390",
						"color-end":"#363636",
						"box":{
							"borderWidth": 1,
							"borderColor": "#e0e0e0"
						},
						"tooltip-box":{
							"background-color":"#ec2383",
							"text":"%text: %value",
							"border-color":"#fff",
							"border-width":"1px",
							"font-color":"#fff"
						}
					},
					"series": <?php echo $palabras_que_piensas; ?>
				}
			]
		};


		zingchart.render({
			id : 'pregunta-8',
			data : configPregunta8,
			height: "300px",
			width: "100%",
			hideprogresslogo: true,
		});
		</script>

	</section>

	<section class="[ row ][ margin-bottom ]">


		<?php
			// pregunta #9
			$separateAnswersAndValues = true;
			$palabras_grandes_retos = $survey->get_word_occurrences_by_question( Sondeo_CDMX_Survey::Q_GRANDES_RETOS );
			$num_respuestas_grandes_retos = $survey->get_number_of_answers_by_question( Sondeo_CDMX_Survey::Q_GRANDES_RETOS );
			$palabras_grandes_retos_separado = $survey->get_word_occurrences_by_question( Sondeo_CDMX_Survey::Q_GRANDES_RETOS, $separateAnswersAndValues );

			$palabras_grandes_retos_labels = json_encode($palabras_grandes_retos_separado["labels"]);
			$palabras_grandes_retos_values = json_encode($palabras_grandes_retos_separado["values"]);
			$palabras_grandes_retos_max_value = $palabras_grandes_retos_separado["max_value"];
		?>

		<div class="[ col-xs-12 padding--sides--xsm col-sm-offset-2 col-sm-8 ]">
			<h2>Si pensaras en los grandes retos de esta Ciudad, ¿cuáles son los primeros cuatro que te llegan a la mente?</h2>
			<h4 class="[ color-gray--light ]">Número total de respuestas: <?php echo $num_respuestas_grandes_retos; ?></h4>
			<div id ='pregunta-9'></div>
		</div>

		<script>
		  var configPregunta9 = {
			"graphset":[
				{
					"globals":{
						"fontFamily":"Alegreya Sans",
					},
					"type":"area",
					"plotarea": {
						"margin":"dynamic"
					},
					"labels":[
						{
							"font-color":"#333"
						}
					],
					"scale-x": {
						"label":{
							"text":"Respuestas posibles"
						},
						"labels": <?php echo $palabras_grandes_retos_labels; ?>,
						"items-overlap": true,
						"max-items": <?php echo $num_respuestas_grandes_retos; ?>,
						"item":{
							"angle": -75
						}
					},
					"scale-y":{
						"min-value":0,
						"max-value": <?php echo $palabras_grandes_retos_max_value; ?>
					},
					"series": [
						{
							"values": <?php echo $palabras_grandes_retos_values; ?>
						}
					],
					"tooltip": {
						"background-color":"#ec2383",
						"color":"#fff",
					},
				}
			]
		};

		zingchart.render({
			id : 'pregunta-9',
			data : configPregunta9,
			height: "400px",
			width: "100%",
			hideprogresslogo: true,
		});
		</script>

	</section>

	<section class="[ row ][ margin-bottom ]">

		<?php
			// pregunta #10
			$num_respuestas = 3;
			$num_respuestas_cdmx_ideal = $survey->get_number_of_answers_by_question( Sondeo_CDMX_Survey::Q_CDMX_IDEAL );
			$ultimas_respuestas = $survey->get_latest_answers( $num_respuestas, Sondeo_CDMX_Survey::Q_CDMX_IDEAL );
		?>

		<div class="[ col-xs-12 padding--sides--xsm col-sm-offset-2 col-sm-8 ]">
			<h2>¿Cómo te imaginas la CDMX ideal, en 20 años?</h2>
			<h4 class="[ color-gray--light ]">Número total de respuestas: <?php echo $num_respuestas_cdmx_ideal; ?> - Mostrando la últimas tres</h4>

			<div class="[ row ]">
				<?php foreach ($ultimas_respuestas as $key => $ultima_respuesta) { ?>
					<div class="[ card ][ col-xs-12 ][ margin-bottom ]">
						<h3 class="[ no-margin ]"><?php echo $ultima_respuesta; ?></h3>
					</div>
				<?php } ?>
			</div>
		</div>

	</section>
	<section class="[ row ][ margin-bottom ]">

		<?php
			// pregunta #11
			$palabras_obstaculos_principales = $survey->get_word_occurrences_by_question( Sondeo_CDMX_Survey::Q_OBSTACULOS_PRINCIPALES );
			$num_respuestas_obstaculos_principales = $survey->get_number_of_answers_by_question( Sondeo_CDMX_Survey::Q_OBSTACULOS_PRINCIPALES );
		?>

		<div class="[ col-xs-12 padding--sides--xsm col-sm-offset-2 col-sm-8 ]">
			<h2>Pensando en esta CDMX ideal, ¿cuáles pensarías que son los tres obstáculos principales para que se haga realidad?</h2>
			<h4 class="[ color-gray--light ]">Número total de respuestas: <?php echo $num_respuestas_obstaculos_principales; ?></h4>
			<div id ='pregunta-11'></div>
		</div>

		<script>
		  var configPregunta11 = {
			"graphset":[
				{
					"globals":{
						"fontFamily":"Alegreya Sans",
						"fontColor": "#e0e0e0"
					},
					"type":"treemap",
					"plotarea":{
						"margin":"0 0 30 0"
					},
					"options":{
						"aspect-type":"transition",
						"color-start":"#40A956",
						"color-end":"#235D2F",
						"box":{
							"borderWidth": 1,
							"borderColor": "#e0e0e0"
						},
						"tooltip-box":{
							"background-color":"#ec2383",
							"text":"%text: %value",
							"border-color":"#fff",
							"border-width":"1px",
							"font-color":"#fff"
						}
					},
					"series": <?php echo $palabras_obstaculos_principales; ?>
				}
			]
		};


		zingchart.render({
			id : 'pregunta-11',
			data : configPregunta11,
			height: "300px",
			width: "100%",
			hideprogresslogo: true,
		});
		</script>

	</section>
	<section class="[ row ][ margin-bottom ]">

		<?php
			// pregunta #14
			$palabras_cosas_valiosas = $survey->get_word_occurrences_by_question( Sondeo_CDMX_Survey::Q_COSAS_VALIOSAS );
			$num_respuestas_cosas_valiosas = $survey->get_number_of_answers_by_question( Sondeo_CDMX_Survey::Q_COSAS_VALIOSAS );
		?>

		<div class="[ col-xs-12 padding--sides--xsm col-sm-offset-2 col-sm-8 ]">
			<h2>Si pensaras en las tres cosas más valiosas de la CDMX que deben ser protegidas o potenciadas ¿Qué palabras te vienen a la mente?</h2>
			<h4 class="[ color-gray--light ]">Número total de respuestas: <?php echo $num_respuestas_cosas_valiosas; ?></h4>
			<div id ='pregunta-14'></div>
		</div>

		<script>
		  var configPregunta14 = {
			"graphset":[
				{
					"globals":{
						"fontFamily":"Alegreya Sans",
						"fontColor": "#e0e0e0"
					},
					"type":"treemap",
					"plotarea":{
						"margin":"0 0 30 0"
					},
					"options":{
						"aspect-type":"transition",
						"color-start":"#E95959",
						"color-end":"#5D2323",
						"box":{
							"borderWidth": 1,
							"borderColor": "#e0e0e0"
						},
						"tooltip-box":{
							"background-color":"#ec2383",
							"text":"%text: %value",
							"border-color":"#fff",
							"border-width":"1px",
							"font-color":"#fff"
						}
					},
					"series": <?php echo $palabras_cosas_valiosas; ?>
				}
			]
		};


		zingchart.render({
			id : 'pregunta-14',
			data : configPregunta14,
			height: "300px",
			width: "100%",
			hideprogresslogo: true,
		});
		</script>

	</section>
</div>

<?php get_footer(); ?>