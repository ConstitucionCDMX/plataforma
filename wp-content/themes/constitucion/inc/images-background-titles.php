<?php if (isset($_POST['guarda_imagenes_plecas']) AND $_POST['guarda_imagenes_plecas'] == 'si')  update_image_background($_POST);
add_action( 'admin_menu', 'register_background_titles' );

function register_background_titles(){
  add_menu_page('Opciones constitución', 'Opciones constitución', 'edit_pages', 'opciones-constitucion', 'vew_setings_constitucion');
}

function vew_setings_constitucion(){ ?>

	<h2 class="titulo-seting">Imagenes para las plecas de los titulos</h2>
	<form method="post" action="">
		<table class="form-table streaming">
			<tbody>
				<?php $img_kioskos = get_option( 'img_kioskos' );
				$img_cdmx = get_option( 'img_cdmx' );
				$img_constitucion_cdmx = get_option( 'img_constitucion_cdmx' );
				$img_participa = get_option( 'img_participa' ); 
				$img_noticias = get_option( 'img_noticias' );?>
				<tr>
					<th><label for="img_kioskos">Imagen Kioskos</label></th>
					<td>
						<input type='text' class='widefat' id='img_kioskos' name='img_kioskos' value="<?php echo $img_kioskos; ?>"/>
					</td>
				</tr>
				<tr>
					<th><label for="img_cdmx">Imagen CDMX</label></th>
					<td>
						<input type='text' class='widefat' id='img_cdmx' name='img_cdmx' value="<?php echo $img_cdmx; ?>"/>
					</td>
				</tr>
				<tr>
					<th><label for="img_constitucion_cdmx">Imagen Constitución CDMX</label></th>
					<td>
						<input type='text' class='widefat' id='img_constitucion_cdmx' name='img_constitucion_cdmx' value="<?php echo $img_constitucion_cdmx; ?>"/>
					</td>
				</tr>
				<tr>
					<th><label for="img_participa">Imagen Participa</label></th>
					<td>
						<input type='text' class='widefat' id='img_participa' name='img_participa' value="<?php echo $img_participa; ?>"/>
					</td>
				</tr>
				<tr>
					<th><label for="img_noticias">Imagen Noticias</label></th>
					<td>
						<input type='text' class='widefat' id='img_noticias' name='img_noticias' value="<?php echo $img_noticias; ?>"/>
					</td>
				</tr>

				<tr>
					<th>
						<input name="guarda_imagenes_plecas" type="hidden" id="guarda_imagenes_plecas" value="si" class="regular-text">

						<input type="submit" class="button-primary" value="Guardar">
					</th>
				</tr>


			</tbody>
		</table>
	</form>
	

<?php }

function update_image_background($plecas){
	if (! empty($plecas)) :
		foreach ($plecas as $option_name => $pleca):
			if ($option_name != 'guarda_imagenes_plecas'):
				$opcion = get_option( $option_name );

				if ($opcion  !== false ) {

			    	update_option( $option_name, $pleca );

				} else {

				    $deprecated = null;
				    $autoload = 'no';
				    add_option( $option_name, $pleca, $deprecated, $autoload );
				}
			endif;
		endforeach;
	endif;
}

