<?php get_header();
if( ! isset( $_GET['referencia'] ) || $_GET['referencia'] == '' ):
	echo 'Referencia no registrada';
else:
	$retos = new RetosParticipante($_GET['referencia']);
	$retos = $retos->get_retos_relacionados(); ?>

	<section class="[ container ][ margin-top--large ][ text-center ]">
		<img class="[ img-logo ]" src="<?php echo THEMEPATH; ?>/images/logo-horizontal.gif" alt="Logo horizontal Constitución CDMX">
		<h2 class="[ text-center text-uppercase ]">¡Gracias por participar!</h2>
		<p class="[ text-center ][ js-codigo-referencia ]">Tu número de folio es: <span><?php echo $_GET['referencia']; ?></span></p>
		<p class="[ text-center text-uppercase ]">Escribe tu nombre y apellido para obtener tu certificado de participación</p>
		<form class="[ row ][ margin-top--large ][ padding--sides--xsm ]" action="<?php echo site_url('pdf-certificado-de-participacion'); ?>" method="POST" data-parsley-certificado target="_blank">
			<div class="[ col-xs-12 col-sm-4 ]">
				<input type="text" name="nombre" class="form-control [ margin-bottom--large ][ input-primary border-gray ]" placeholder="Nombre(s)" required="">
			</div>
			<div class="[ col-xs-12 col-sm-4 ]">
				<input type="text" name="apellidos" class="form-control [ margin-bottom--large ][ input-primary border-gray ]" placeholder="Apellidos" required="">
			</div>
			<input type="hidden" name="referencia" value="<?php echo $_GET['referencia']; ?>">
			<div class="[ col-xs-12 col-sm-4  ]">
				<button id="gtm-btn-certificado" type="submit" class="[ btn btn-secondary color-gray ][ center-block ][ margin-bottom--large ]">obtener certificado</button>
				<a class="[ btn btn-primary btn--small ]" href="<?php echo site_url('/resultados/'); ?> ">Ver resultados</a>
			</div>
		</form>
	</section>
	<section class="[ container ]">
		<h2 class="[ margin-bottom ]">Según los retos que tú consideras más importantes para la CDMX, hemos hecho esta selección de ensayos escritos por expertos, que te pueden interesar.</h2>
		<div class="[ row ][ retos ]">
			<?php if(! empty($retos)):
				foreach ($retos as $key => $reto):

					$term = get_term_by('id', $key, 'taxonomy-grandes-retos'); ?>
					<div class="[ col-xs-12 col-sm-3 ][ margin-bottom--large ]">
						<h3><?php echo $term->name ?></h3><!-- reto 1 -->
						<?php if ( empty($reto) ) echo '<p>Próximamente</p>'; ?>
						<?php foreach ($reto as $key => $pubpub):
							$url_pubpub = get_post_meta( $pubpub->ID, 'url_pubpub', true ); ?>
							<a href="<?php echo $url_pubpub; ?>" target="_blank">
								<img class="[ svg icon icon--iconed icon--thickness-05 icon--stoke ][ color-gray ]"  src="<?php echo THEMEPATH; ?>icons/bookmark-article.svg" alt="icono de ensayos">
								<p><?php echo $pubpub->post_title; ?></p>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endforeach;
			endif; ?>
		</div>
	</section>
<?php endif; ?>


<?php get_footer(); ?>