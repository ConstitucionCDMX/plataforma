<?php global $result; ?>
			<footer>
				<div class="[ container ]">

					<div class="[ row ]">
						<div class="[ col-xs-12 col-sm-5 col-lg-offset-1 col-lg-4 ][ text-center ][ margin-top-bottom ]">
							<img src="<?php echo THEMEPATH; ?>images/logocdmx2.png" alt="Logo Constitución CDMX">
						</div>
						<div class="[ col-xs-12 col-sm-7 col-lg-6 ][ text-center ][ margin-top-bottom ]">
							<a href="<?php echo site_url('terminos-y-condiciones/' ); ?>" target="_blank" >Términos y condiciones</a>
							<a data-toggle="modal" data-target="#contacto">Contacto</a>
							<a href="<?php echo site_url('transparencia/' ); ?>" target="_blank">Datos y código abierto</a>
						</div>
					</div>

				</div>
			</footer>
		</div>

		<!-- Modal -->
		<div id="contacto" class="modal fade" role="dialog">
			<div class="modal-dialog modal--contacto center-block">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
						<a type="button" class="close" data-dismiss="modal" aria-label="Close"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar"></a>
						<div class="[ row padding--sides--xsm ]">
							<div class="[ padding--top--xxlarge padding--bottom--xxlarge padding--sides--large--sm ]">
								<div>
									<h2 class="[ inline-block align-middle ][ no-margin padding--left ]">Estimados</h2>
									<img class="[ inline-block align-middle ][ img-contacto ][ margin-top--xsmall margin-bottom--large ]" src="<?php echo THEMEPATH; ?>/images/logo-horizontal.gif" alt="Logo horizontal Constitución CDMX">
								</div>
								<form class="[ margin-bottom--large ]" action="" method="POST" data-parsley-validate="">
									<label for="mensaje_cdmx" class="[ hidden ]">Mensaje</label>
									<textarea name="mensaje_cdmx" id="mensaje_cdmx" class="[ form-control ][ input-primary border-gray ][ margin-bottom--large ]" placeholder="Escribe tu mensaje" required="" data-parsley-required-message="El mensaje es obligatorio"></textarea>

									<h2 class="[ margin-bottom--large padding--left ][ fz-small--xs ]">Con respeto,</h2>
									<label for="nombre_cdmx" class="[ hidden ]">Nombre</label>
									<input name="nombre_cdmx" id="nombre_cdmx" type="text" class="[ form-control ][ input-primary ][ margin-bottom--large ]" placeholder="Tu nombre" required="" data-parsley-required-message="El nombre es obligatorio">

									<label for="email_cdmx" class="[ hidden ]">Correo electrónico</label>
									<input name="email_cdmx" id="email_cdmx" type="email" class="[ form-control ][ input-primary ][ margin-bottom--large ]" placeholder="Correo Electrónico" required="" data-parsley-required-message="El correo es obligatorio" data-parsley-type-message="Por favor escribe un correo válido">

									<label for="telefono_cdmx" class="[ hidden ]">Teléfono</label>
									<input name="telefono_cdmx" id="telefono_cdmx" type="text" class="[ form-control ][ input-primary ][ margin-bottom--large ]" placeholder="Teléfono">

									<fieldset id="js-contact-captcha">
										<label class="[ color-gray ][ padding--sides ]" for="contact-captcha" id="js-contact-captcha-label">Necesitamos asegurarnos de que no seas un robot. ¿Cuánto es <span></span> + <span></span>?</label>
										<input class="[ form-control ][ input-primary ][ margin-bottom--large ]" id="contact-captcha" name="contact-captcha" type="number" placeholder="" required="" data-parsley-captcha="" captcha-required />
									</fieldset>

									<input name="accion" id="accion" type="hidden" value="guarda-formulario">

									<button type="submit" class="[ btn btn-secondary ][ pull-right ]">enviar</button>
								</form>
							</div>
						</div>	<!-- row -->
					</div><!-- modal-body -->
				</div>
			</div>
		</div>

		<!-- Modal -->
		<?php if( isset( $result['success'] ) ): ?>
			<div id="feedback" class="modal fade in block" role="dialog">
				<div class="modal-dialog modal--contacto">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-body">
							<a type="button" id="close-feedback-forms" class="close" data-dismiss="modal" aria-label="Close"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar"></a>
							<div class="[ row padding--sides--xsm ]">
								<div class="[ padding--top--xxlarge padding--bottom--xxlarge padding--sides--large--sm ]">
									<div class="[ feedback--success text-center ]"><?php echo $result['success']; ?></div>
								</div>
							</div>	<!-- row -->
						</div><!-- modal-body -->
					</div>
				</div>
			</div>
			<div class="modal-backdrop fade in"></div>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</body>

</html>
