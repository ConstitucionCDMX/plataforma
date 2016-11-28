<?php get_header(); the_post();
$img_cdmx = get_option( 'img_cdmx' ); ?>

<div class="[ bg-image rectangle-small ][ relative gtm-btn-banner ]" style="background-image: url('<?php echo $img_cdmx; ?>');">
	<div class="[ width-100 height-100 ]">
		<h1 class="[ container ][ text-uppercase text-center ][ no-margin ][ center-full ][ color-light ][ letter-spacing ][ hidden ]">Ciudad de México</h1>
	</div>
</div>

<section class="[ container padding--sides--xsm ][ the_content ]">
	<?php the_content(); ?>
</section>

<section class="[ space-id ][ container padding--sides--xsm ]" id="cronica">
	<div class="[ row ]">
		<div class="[ col-xs-12 col-sm-3 ][ hidden-xs ]">
			<h2>Datos Curiosos</h2>
			<blockquote>
				<p>La CDMX, incluyendo su zona metropolitana, es la ciudad más poblada de América y la cuarta del mundo.</p>
			</blockquote>
			<blockquote>
				<p>La Zona Metropolitana del Valle de México la integran actualmente las 16 delegaciones de la CDMX, 59 municipios del Estado de México y un municipio del estado de Hidalgo.</p>
			</blockquote>
		</div>
		<div class="[ col-xs-12 col-sm-offset-1 col-sm-8 col-sm-offset-2 col-md-6 ][ margin-bottom--large ]">
			<div class="[ content-acerca-de ]">
				<?php $cronica = get_page_by_path('cronica'); ?>
				<h2><?php echo $cronica->post_title; ?></h2>
				<?php echo wpautop( $cronica->post_content );  ?>
			</div>
		</div>
	</div>
</section>

<section>
	<div class=" slider responsive ">
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia.jpg" alt="Imagen slick 1"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1325'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia2.jpg" alt="Imagen slick 2"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1521'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia3.jpg" alt="Imagen slick 3"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1521'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia4.jpg" alt="Imagen slick 4"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1524'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia5.jpg" alt="Imagen slick 5"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1824'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia6.jpg" alt="Imagen slick 6"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1903'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia7.jpg" alt="Imagen slick 7"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1928'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia8.jpg" alt="Imagen slick 8"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1928'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia9.jpg" alt="Imagen slick 9"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1928'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia10.jpg" alt="Imagen slick 10"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1970'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia11.jpg" alt="Imagen slick 11"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1970'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia12.jpg" alt="Imagen slick 12"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1985'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia13.jpg" alt="Imagen slick 13"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1986'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia14.jpg" alt="Imagen slick 14"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1987'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia15.jpg" alt="Imagen slick 15"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1993'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia16.jpg" alt="Imagen slick 16"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1993'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia17.jpg" alt="Imagen slick 17"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1993'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia18.jpg" alt="Imagen slick 18"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1996'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia19.jpg" alt="Imagen slick 19"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-1997'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia20.jpg" alt="Imagen slick 20"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2000'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia21.jpg" alt="Imagen slick 21"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2001'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia22.jpg" alt="Imagen slick 22"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2010'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia23.jpg" alt="Imagen slick 23"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2013'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia24.jpg" alt="Imagen slick 24"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2014'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia25.jpg" alt="Imagen slick 25"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2015'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia26.jpg" alt="Imagen slick 26"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2016'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia27.jpg" alt="Imagen slick 27"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2016'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia28.jpg" alt="Imagen slick 28"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2016'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia29.jpg" alt="Imagen slick 29"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2016'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia30.jpg" alt="Imagen slick 30"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2016'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia31.jpg" alt="Imagen slick 31"></div>
		<div class="[ item ]" onclick="dataLayer.push({'event': 'cronica-2017'});"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/cronologia/cronologia32.jpg" alt="Imagen slick 32"></div>
	</div>
</section>

<section class="[ container ][ space-id ]" id="hacia-el-constituyente">
	<div class="[ row ]">
		<div class="[ col-xs-12 col-sm-3 ][ hidden-xs ]">
			<blockquote>
				<p>El 59% del territorio que ocupa la CDMX es suelo de conservación.</p>
			</blockquote>
			<blockquote>
				<p>El Bosque de Chapultepec (847 hectáreas) es dos veces más grande que Central Park de Nueva York (341.15 hectáreas).</p>
			</blockquote>
			<blockquote class="[ text-center ]">
				<h4>Conformación del Constituyente</h4>
				<canvas id="pie-data" width="120px" height="120px"></canvas>
			</blockquote>
			<blockquote>
				<p>La CDMX ocupa el primer lugar a nivel nacional en acceso a información pública de oficio.</p>
			</blockquote>
			<blockquote>
				<p>La CDMX contribuye a casi una quinta parte del producto interno bruto nacional.</p>
			</blockquote>
			<blockquote>
				<p>El diario the New York Times señaló a la CDMX como el destino número 1 para visitar en el 2016 y la describió como “la ciudad que lo tiene todo”.</p>
			</blockquote>
		</div>
		<div class="[ col-xs-12 col-sm-offset-1 col-sm-8 col-sm-offset-2 col-md-6 ]">
			<div class="[ content-acerca-de ][ margin-bottom ]">
				<?php $hacia_constituyente = get_page_by_path('hacia-el-constituyente'); ?>
				<h2><?php echo $hacia_constituyente->post_title; ?></h2>
				<?php echo wpautop( $hacia_constituyente->post_content ); ?>
			</div>
		</div>
	</div>
</section>

<section class="[ bg-gray-light section--bg space-id ][ no-margin--bottom ]" id="voces-ciudadanas">
		<div class="[ container padding--sides--xsm padding--bottom--large ]">
			<h2 class="[ no-margin-top ][ text-center ]">Voces ciudadanas</h2>
			<div class="[ row ][ margin-bottom ]">
				<?php $voces_ciudadanas = new WP_Query(array(
						'post_type'      => 'voces-ciudadanas',
						'posts_per_page' => 1,
						'meta_query' => array(
							array(
								'key'     => 'video_voces',
								'value'   => '',
								'compare' => '!=',
							),
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'taxonomy-voces-ciudadanas',
								'field'    => 'slug',
								'terms'    => 'grupo-de-trabajos',
							),
						)
					));

				if ( $voces_ciudadanas->have_posts() ) :
					while ( $voces_ciudadanas->have_posts() ) : $voces_ciudadanas->the_post(); ?>
						<div class="[ col-xs-12 ][ margin-bottom ]">
							<div class="[ js-video-wrapper ]">

								<?php $video = get_post_meta( $post->ID, 'video_voces', true );
								preg_match('/src="([^"]+)"/', $video, $match);
								$url_video = $match[1]; ?>
								<iframe class="[ embed-responsive-item ]" src="<?php echo $url_video; ?>" title="<?php echo get_the_title(); ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					<?php endwhile;
				endif;
				wp_reset_postdata(); ?>

			</div>
		</div>

		<div class="[ container padding--sides--xsm padding--bottom--large ]">
			<h3 class="[ no-margin-top ]">Grupo de trabajo</h3>
			<div class="[ row ][ margin-bottom ]">
				<?php $voces_ciudadanas = new WP_Query(array(
						'post_type'      => 'voces-ciudadanas',
						'posts_per_page' => 3,
						'meta_query' => array(
							array(
								'key'     => 'video_voces',
								'value'   => '',
								'compare' => '!=',
							),
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'taxonomy-voces-ciudadanas',
								'field'    => 'slug',
								'terms'    => 'grupo-de-trabajo',
							),
						)
					));

				if ( $voces_ciudadanas->have_posts() ) :
					$count = 0;
					$count_pasados = 0;
					while ( $voces_ciudadanas->have_posts() ) : $voces_ciudadanas->the_post(); ?>
						<div class="[ col-xs-12 col-sm-4 ][ margin-bottom ]">
							<div class="[ js-video-wrapper ]">

								<?php $video = get_post_meta( $post->ID, 'video_voces', true );
								preg_match('/src="([^"]+)"/', $video, $match);
								$url_video = $match[1]; ?>
								<iframe class="[ embed-responsive-item ]" src="<?php echo $url_video; ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					<?php endwhile;
				endif;
				wp_reset_postdata(); ?>

			</div>
		</div>

		<div class="[ container padding--sides--xsm padding--bottom--large ]">
			<h3 class="[ no-margin-top ]">Más ciudadanas y ciudadanos</h3>
			<div class="[ row ][ margin-bottom ]">

					<?php $voces_ciudadanas = new WP_Query(array(
						'post_type'      => 'voces-ciudadanas',
						'posts_per_page' => 1,
						'meta_query' => array(
							array(
								'key'     => 'video_voces',
								'value'   => '',
								'compare' => '!=',
							),
						),
						'tax_query' => array(
							array(
								'taxonomy' => 'taxonomy-voces-ciudadanas',
								'field'    => 'slug',
								'terms'    => 'mas-de-ciudadanos',
							),
						)
					));

					if ( $voces_ciudadanas->have_posts() ) :
						$count = 0;
						$count_pasados = 0;
						while ( $voces_ciudadanas->have_posts() ) : $voces_ciudadanas->the_post(); ?>
							<div class="[ col-xs-12 ][ margin-bottom ]">
								<div class="[ js-video-wrapper ]">

									<?php $video = get_post_meta( $post->ID, 'video_voces', true );
									preg_match('/src="([^"]+)"/', $video, $match);
									$url_video = $match[1]; ?>
									<iframe class="[ embed-responsive-item ]" src="<?php echo $url_video; ?>" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
						<?php endwhile;
					endif;
					wp_reset_postdata(); ?>

			</div>
			<div class="[ text-right ]">
				<a href="https://www.youtube.com/channel/UC3-12ySVHF-iItCbSdZ2z-Q" class="[ btn btn-primary btn-large ] gtm-btn-ver" target="_blank">Ver más</a>
			</div>
		</div>

	</section>

<?php get_footer(); ?>