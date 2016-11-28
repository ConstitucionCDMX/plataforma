<?php get_header(); the_post();
$asistencia_invitacion = get_post_meta( $post->ID, 'asistencia_invitacion', true );
$latitud_evento = get_post_meta( $post->ID, 'latitud_evento', true );
$longitud_evento = get_post_meta( $post->ID, 'longitud_evento', true );
$fecha_evento = get_post_meta( $post->ID, 'fecha_evento', true );
$fecha_evento_fin = get_post_meta( $post->ID, 'fecha_evento_fin', true );

$date_arr = getDateTransform( $fecha_evento );
if ($fecha_evento_fin != '') {
	$date_arr_fin = getDateTransform( $fecha_evento_fin );
}

$frace_evento = get_post_meta( $post->ID, 'frace_evento', true );
$institucion = get_post_meta( $post->ID, 'institucion_evento', true );
$liga_oficial = get_post_meta( $post->ID, 'liga_oficial_evento', true );
$fotografia = get_post_meta( $post->ID, 'fotografia_evento', true );
$correo = get_post_meta( $post->ID, 'correo_evento', true );
$ubicacion = get_post_meta( $post->ID, 'ubicacion_evento', true );
$horario = get_post_meta( $post->ID, 'horarios_evento', true ); ?>

<section class="[ bg-gray--fondo section--bg no-margin ]">
	<div class="[ container ]">
		<div class="[ row ]">
			<div class="[ col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-2 col-sm-8 ][ box-shadow--form ]">
				<?php if ( has_post_thumbnail() ):
					the_post_thumbnail('large', array('class' => '[ img-responsive ]'));
				endif;?>
				<div class="[ margin-bottom ]">
					<h2><?php the_title(); ?></h2>
					<div class="[ color-gray ][ margin-top-bottom--large ]">
						<?php the_content(); ?>
					</div>
					<?php if ($frace_evento != ''): ?>
						<p class="[ color-gray--light ][ margin-top ]"><strong class="[ color-primary ]">Frase que describa el evento/sesión:</strong> <?php echo $frace_evento; ?></p>
					<?php endif;
					if ($institucion != ''): ?>
						<p class="[ color-gray--light ]"><strong class="[ color-primary ]">Institución u organización:</strong> <?php echo $institucion; ?></p>
					<?php endif;
					if($liga_oficial != ''): ?>
						<p class="[ color-gray--light ]"><strong class="[ color-primary ]">Liga del sitio ofician:</strong> <?php echo $liga_oficial; ?></p>
					<?php endif;
					if($fotografia != ''): ?>
						<p class="[ color-gray--light ]"><strong class="[ color-primary ]">Fotografía de cartel o publicidad del acontecimiento:</strong> <?php echo $fotografia; ?></p>
					<?php endif;
					if ($correo != ''): ?>
						<p class="[ color-gray--light ]"><strong class="[ color-primary ]">Correo electrónico:</strong> <?php echo $correo; ?></p>
					<?php endif; ?>
					<p class="[ color-gray--light ]">
						<strong class="[ color-primary ]">Asistentes:</strong>
						<?php echo $asistencia_invitacion == 'si' ? 'Por invitación' : 'La asistencia es libre'; ?>
					</p>
					<?php if($ubicacion != ''): ?>
						<p class="[ color-gray--light ]"><strong class="[ color-primary ]">Dónde se llevara a cabo el evento:</strong> <?php echo $ubicacion; ?></p>
					<?php endif;
					if ($latitud_evento != '' ):
						echo '<iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$latitud_evento.','.$longitud_evento.'&hl=es;z=14&amp;output=embed"></iframe>';
					endif;
					if ($fecha_evento != ''): ?>
						<p class="[ color-gray--light ][ margin-top ]">
							<strong class="[ color-primary ]">Fecha del evento:</strong>
							<?php echo $date_arr[0].' '.$date_arr[1].' '.$date_arr[2];
							if ($fecha_evento_fin != ''):
								echo ' al '. $date_arr_fin[0].' '.$date_arr_fin[1].' '.$date_arr_fin[2];
							endif;?>
						</p>
					<?php endif;
					if ($horario != ''): ?>
						<p class="[ color-gray--light ]"><em><strong class="[ color-primary ]">Horario:</strong></em> <?php echo get_post_meta( $post->ID, 'horarios_evento', true ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>