<?php get_header(); the_post();  ?>
<div id="container_video" class="[ bg-gray--xxlight hero_video ][ margin-bottom--large ]">
	<video class="[ width-100 ][ center-full video_home ]" autoplay loop >
		<source src="<?php echo THEMEPATH; ?>video/cccdmx.webm" type="video/webm">
		<source src="<?php echo THEMEPATH; ?>video/cccdmx.mp4" type="video/mp4">
		<source src="<?php echo THEMEPATH; ?>video/cccdmx.ogg" type="video/ogg">
	</video>
	<div class="[ logo-video ]">
		<img class="[ width-100 ][ pull-left ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal-blanco.png" alt="Logo Constitución CDMX blanco">
	</div>
	<div class="[ hero_video__scroll ][ text-center ][ js-hero_video__scroll ]">
		<p class="[ text-center ][ color-light ][ margin-bottom--small ]">Conoce más</p>
		<img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-light ]" src="<?php echo THEMEPATH; ?>icons/arrow-down-9.svg" alt="Ícono flecha abajo">
	</div>
</div>

<section class="[ container ]" id="js-home-scroll-point">
	<div class="[ row ]">
		<div class="[ col-xs-12 col-sm-offset-1 col-sm-10 ]">
			<h1 class="[ text-center ]">¿Una constitución para la Ciudad de México?</h1>
			<?php $home = get_page_by_path('home');
			echo wpautop( $home->post_content ); ?>
		</div>
	</div>
</section><!--/container-->

<!-- slider -->
<section class="flexslider relative">
	<ul class="slides">
		<li>
			<a class="[ block ]" href="<?php echo site_url('/participa/' ); ?>">
				<img src="<?php echo THEMEPATH; ?>images/slide-participa.jpg" alt="¿Cómo participo?">
			</a>
		</li>
		<li>
			<a class="[ block ]" href="<?php echo site_url('/participa/'); ?>#imagina-ciudad">
				<img src="<?php echo THEMEPATH; ?>images/slide-imagina.jpg" alt="Imagina tu ciudad">
			</a>
		</li>
		<li>
			<a class="[ block ]" href="<?php echo site_url('/participa/'); ?>#peticiones">
				<img src="<?php echo THEMEPATH; ?>images/slide-peticion.jpg" alt="Haz una petición">
			</a>
		</li>
		<li>
			<a class="[ block ]" href="<?php echo site_url('/participa/' ); ?>#dialogos-publicos">
				<img src="<?php echo THEMEPATH; ?>images/slide-organiza.jpg" alt="Organiza un encuentro ciudadano">
			</a>
		</li>
		<li>
			<a class="[ block ]" href="<?php echo site_url('/participa/' ); ?>#ensayos">
				<img src="<?php echo THEMEPATH; ?>images/slide-publica.jpg" alt="Publica o comenta un ensayo">
			</a>
		</li>
		<li>
			<a class="[ block ]" href="<?php echo site_url('/cdmx/' ); ?>#voces-ciudadanas">
				<img src="<?php echo THEMEPATH; ?>images/slide-voces-ciudadanas.jpg" alt="Voces ciudadanas">
			</a>
		</li>
	</ul>
</section><!-- fin slider -->

<!-- Linea tiempo -->
<section class="[ container ]">
	<div class="[ row ]">
		<div class="[ col-sm-12 ]">
			<h2 class="[ text-center ]">Hacia una ConstituciónCDMX</h2>
			<?php get_template_part('templates/eventos', 'timeLine'); ?>
		</div>
	</div>
</section><!--/container-->


<section class="[ section--bg bg-gray-light ][ no-margin--bottom ]">
	<div class="[ container ]">
		<h2 class="[ text-center ]">Noticias</h2>
		<div class="[ row ]">
			<!-- 3 noticias -->
			<?php

			$noticias = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => 6
			));

			if ( $noticias->have_posts() ) :
				$current_noticia = 1;
				while ( $noticias->have_posts() ) : $noticias->the_post();
					$url_image = attachment_image_url( $post->ID, 'images_news_cdmx' );

					$link_noticia = get_post_meta( $post->ID, 'link_noticia', true );?>
					<div class="[ col-xs-6 col-sm-4 ][ margin-bottom--large ][ post_compact ]">
						<a class="[ show ] gtm-btn-noticia" href="<?php echo $link_noticia; ?>" target="_blank">
							<img class="[ width-100 img-responsive ]" src="<?php echo $url_image; ?>" alt="<?php echo get_the_title(); ?>">
							<div class="[ hidden-xs ]">
								<h4 class="[ color-gray ][ center-full ][ text-uppercase ][ line-height ]"><?php the_title(); ?></h4>
							</div>
							<div class="[ visible-xs ]">
								<h4 class="[ color-gray ][ center-full ][ text-uppercase ][ line-height ]"><?php the_title(); ?></h4>
							</div>
						</a>
					</div>
					<?php if ( $current_noticia % 3 == 0 ) : ?>
						<div class="[ clear ][ hidden-xs ]"></div>
					<?php endif; ?>
				<?php $current_noticia +=1; endwhile;
			endif; ?>

		</div>
	</div> <!-- /container -->

</section>



<?php get_footer(); ?>