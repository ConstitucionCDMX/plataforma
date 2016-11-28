<?php get_header(); ?>

<?php do_shortcode( '[show-survey]' ); ?>

<div id="modal-agradecimiento" class="modal fade" role="dialog">
	<div class="modal-dialog [ margin-top--xlarge ][ padding--sides--xsm ]">
		<!-- Modal content-->
		<div class="[ row ]">
			<div class="[ col-xs-12  col-sm-10 col-sm-offset-1 ]">
				<div class="modal-content [ no-border-radius ]">
					<div class="modal-body [ padding--bottom--xxlarge padding--sides padding--sides--large--sm ]">
						<img class="[ img-responsive ][ margin-auto margin-top-bottom--large ]" src="<?php echo THEMEPATH; ?>/images/logo-horizontal.gif" alt="Logo horizontal Constitución CDMX">
						<h2 class="[ text-center text-uppercase ]">¡Gracias por participar!</h2>
						<p class="[ text-center ][ js-codigo-referencia ]">Tu número de folio es: <span class="[ color-primary ]"></span></p>
						<p class="[ text-center text-uppercase ][ margin-bottom ]">Escribe tu nombre y apellido para obtener tu certificado de participación</p>
						<form class="[ row ]" action="<?php echo site_url('pdf-certificado-de-participacion'); ?>" method="POST" data-parsley-certificado target="_blank">
							<div class="[ col-xs-12 col-sm-6  ]">
								<input type="text" name="nombre" class="form-control [ margin-bottom--large ][ input-primary border-gray ]" placeholder="Nombre(s)" required="">
							</div>
							<div class="[ col-xs-12 col-sm-6 ]">
								<input type="text" name="apellidos" class="form-control [ margin-bottom--large ][ input-primary border-gray ]" placeholder="Apellidos" required="">
							</div>
							<div class="[ col-xs-12 ]">
								<input type="hidden" name="referencia">
								<button type="submit" class="[ btn btn-secondary color-gray ][ width-100 ][ center-block ]">obtener certificado</button>
								<a href="<?php echo site_url('participa') ?>" class="[ btn btn-secondary btn-sm color-gray ][ center-block ][ margin-top ]">No, gracias</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>