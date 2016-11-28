<?php get_header();
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$img_participa = get_option( 'img_noticias' );
global $wp_query; ?>

<div class="[ bg-image rectangle-small gtm-btn-banner ][ margin--header margin-bottom--large ][ relative ]" style="background-image: url('<?php echo $img_participa; ?>');">
	<div class="[ width-100 height-100 ]">
		<h1 class="[ container ][ text-uppercase text-center ][ no-margin ][ center-full ][ color-light ][ letter-spacing ][ hidden ]">Noticias</h1>
	</div>
</div>

<section class="[ container ]">
	<?php
	$noticias = new WP_Query(array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'paged' => $pagina
	));
	if ( $noticias->have_posts() ) :

		while ( $noticias->have_posts() ) : $noticias->the_post();
			$date_arr = getDateTransform( $post->post_date );
			$url_image = attachment_image_url( $post->ID, 'images_news_cdmx' );
			$link_noticia = get_post_meta( $post->ID, 'link_noticia', true );?>
			<div class="[ row ][ margin-bottom--large ]">
				<div class="[ col-xs-12 col-sm-5 ]">
					<a href="<?php echo $link_noticia; ?>" target="_blank" class="btn-noticia">
						<img class="[ img-responsive ]" src="<?php echo $url_image; ?>" alt="<?php echo get_the_title(); ?>">
					</a>
				</div>
				<div class="[ col-xs-12 col-sm-7 ]">
					<h3 class="[ fw-semibold ]">
						<a class="[ color-gray ] gtm-btn-noticia" href="<?php echo $link_noticia; ?>" target="_blank">
							<?php the_title(); ?>
						</a>
					</h3>
					<p class="[ color-primary ]"><?php echo $date_arr[4].' '.$date_arr[1].' '.$date_arr[2] ?></p>
					<p><?php echo wp_trim_words( get_the_excerpt(), 23 ) ?></p>
					<a href="<?php echo $link_noticia; ?>" class="gtm-btn-noticia" target="_blank">
						<p class="[ fz-small ][ color-primary ]">Leer más >></p>
					</a>
				</div>
			</div>

		<?php endwhile;
	endif;
	wp_reset_postdata(); ?>

	<div class="[ text-center ]">
		<?php if($noticias->max_num_pages > 1):
			$url = site_url('/noticias/');
			pagenavi($pagina, $noticias->max_num_pages, $url, true, '?', 'pagina');
		endif; ?>
	</div>

</section>
<?php get_footer(); ?>