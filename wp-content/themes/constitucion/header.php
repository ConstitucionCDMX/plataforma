<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<!-- Sets initial viewport load and disables zooming -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=0, width=device-width, height=device-height"/>
		<!-- SEO -->
		<meta name="keywords" content="constitucion, constitucion cdmx, cdmx, hola cdmx, adios df, nueva constitucion, constitución, constitución cdmx, notables, constituyentes, asamblea constituyente, política, jefe de gobierno, alcaldías, contribuir, Ciudad de México, ciudad de mexico, México, DF, df, Mexico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="google-site-verification" content="7eiU4zOfeujNJJHI4tLwnGWucS5D-jAFRCGXKw8mwZs" />
		<!-- Compatibility -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">

		<!-- Favicon - generated with http://www.favicomatic.com/-->
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.png">
		<!-- Google font(s) -->
		<link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,500,700,800,300,100' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,800,500,300' rel='stylesheet' type='text/css'>
		<!-- Font awesome -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="canonical" href="https://www.constitucion.cdmx.gob.mx/" />

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

		<meta property="og:title" content="Constitución CDMX | Espacio de encuentro | #SomosCDMX" />
		<meta property="og:description" content="En el 2017 la Ciudad de México tendrá; su propia Constitución. Todas y todos los que habitamos y visitamos la ciudad tenemos la oportunidad de contribuir y ser escuchados." />
		<meta property="og:site_name" content="Constitución CDMX | Espacio de encuentro | #SomosCDMX" />

		<meta property="og:image" content="<?php echo THEMEPATH; ?>video/cccdmx-share.jpg" />
		<meta property="og:image:width" content="450" />
		<meta property="og:image:height" content="300" />

		<meta property="og:url" content="https://www.constitucion.cdmx.gob.mx/" />
		<meta property="og:locale" content="es_LA" />

		<meta property="fb:app_id" content="1791851151034579" />

		<?php wp_head(); ?>
	</head>


	<body <?php body_class(); ?>>
		<noscript><iframe title="Google Tag Manager" src="//www.googletagmanager.com/ns.html?id=GTM-52W5VS"
		height="0" width="0" class="[ invisible hidden ]"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-52W5VS');</script>

		<?php $activeAcerca = is_page('constitucion-cdmx') ? 'active' : '';
		$activeCdmx = is_page('cdmx') ? 'active' : '';
		$activeParticipa = is_page('participa') ? 'active' : '';
		$activeNoticias = is_home() || is_singular('post') ? 'active' : '';   ?>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->

		<?php $tweet = new Twitter;
		$tweets = $tweet->feedTwitter();

		if ( is_page('home') ): ?>
			<header class="[ header-home ]">
				<nav class="[ height-100 ]">
					<!-- menu desktop home -->
					<ul class="[ menu-desktop ][ text-center ][ hidden-xs hidden-sm ][ height-100 ]">
						<li class="[ no-padding--sides ][ menu-desktop__logo padding--header-logo ]">
							<a class="[ inline-block gtm-btn-menu ]" href="<?php echo site_url('/'); ?> ">
								<img class="[ logo ][ margin-right margin-top--large ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal.png" alt="logo Ciudad de México" alt="Logo vertical Constitución CDMX">
							</a>
						</li><li
						class="[ dropdown--hover dropdown--hover--acerca ][ menu-desktop__acerca ] <?php echo $activeAcerca; ?>">
							<a class="[ text-uppercase ]" href="<?php echo site_url('/constitucion-cdmx/'); ?>">Acerca de la<br>constitución<span class="caret"></span></a>
							<ul class="dropdown-content dropdown-menu" aria-labelledby="dropdown--header">
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#jefe-gobierno">Mensaje del jefe de gobierno</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#sobre-constitucion">Sobre la constitución</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#grupo-trabajo">Grupo de trabajo</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#sobre-plataforma">Sobre la plataforma</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#constitucion-wiki">Constitución en Wiki</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#preguntas-frecuentes">Preguntas frecuentes</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#biblioteca">Biblioteca</a></li>
							</ul>
						</li>
						<li class="[ dropdown--hover ] <?php echo $activeCdmx; ?>">
							<span>
								<a class="[ text-uppercase gtm-btn-menu ]" href="<?php echo site_url('/cdmx/'); ?>">
									Ciudad de México<span class="caret"></span>
								</a>
							</span>
							<ul class="dropdown-content dropdown-menu" aria-labelledby="dropdown--header">
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>#cronica">Crónica</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>#hacia-el-constituyente">Hacia la Constituyente</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>#voces-ciudadanas">Voces ciudadanas</a></li>
							</ul>
						</li>
						<li class="[ dropdown--hover ] <?php echo $activeParticipa; ?>">
							<span><a class="[ text-uppercase ]" href="<?php echo site_url('/participa/'); ?>">Participa<span class="caret"></span></a></span>
							<ul class="dropdown-content dropdown-menu" aria-labelledby="dropdown--header">
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#instrucciones">¿Cómo Participo?</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#imagina-ciudad">Imagina tu ciudad</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#peticiones">Peticiones</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#dialogos-publicos">Encuentros ciudadanos</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#ensayos">Ensayos</a></li>
								<li><a class="gtm-btn-menu" href="https://portal.iedf.org.mx/constituyente/propuestas/" target="_blank">Propuestas ciudadanas</a></li>
							</ul>
						</li><li
						class="[ text-uppercase ] <?php echo $activeNoticias; ?>">
							<a class="gtm-btn-menu" href="<?php echo site_url('/noticias/'); ?>">Noticias</a>
						</li><li
						id="js-btn-cdmx">
							<a href="#nada">
								<img class="[ svg icon icon--iconed--small icon--thickness-1 icon--fill ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/twitter.svg" alt="icono de red social twitter">
								#SomosCDMX
							</a>
						</li>
					</ul>

					<!-- menú movil home -->
					<div class="[ bg-light ][ visible-xs visible-sm ]">
						<div class="[ container ]">
							<div class="[ width-col-9 ][ inline-block align-middle ]">
								<a class="gtm-btn-menu" href="<?php echo site_url('/'); ?> "><img class="[ logo margin-top-bottom--small ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal.png"  alt="Logo vertical Constitución CDMX"></a>
							</div><div
								class="[ width-col-3 ][ inline-block align-middle ][ text-center ]">
								<a class="[ pull-right ]" href="#nada" data-toggle="modal" data-target="#modal-menu">
									<img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/navigation.svg" alt="icono para desplegar navegador">
								</a>
							</div>
						</div>
					</div>

					<!-- modal menu mobile home -->
					<div class="modal fade" id="modal-menu" tabindex="-1" role="dialog">
						<div class="[ modal-dialog modal-content ][ width-100 height-100 ][ no-margin ]">
							<div class="[ container ][ bg-light ]">
								<div class="[ row ]">
									<div class="[ col-xs-10 ]">
										<a class="gtm-btn-menu" href="<?php echo site_url('/'); ?> "><img class="[ logo margin-top-bottom--small ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal.png" alt="Logo vertical Constitución CDMX"></a>
									</div>
									<div class="[ col-xs-2 ][ text-center ][ padding--top ]">
										<a type="button" class="close" data-dismiss="modal" aria-label="Close"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar"></a>
									</div>
								</div>
							</div>
							<div class="[ bg-light-cdmx ][ text-center ]">
								<ul class="[ menu-mobile ]">
									<li class="[ text-uppercase ] <?php echo $activeAcerca; ?>"><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>">Acerca de la constitución</a></li>
									<li class="[ text-uppercase ] <?php echo $activeCdmx; ?>"><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>">Ciudad de México</a></li>
									<li class="[ text-uppercase ] <?php echo $activeParticipa; ?>"><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>">Participa</a></li>
									<li class="[ text-uppercase ] <?php echo $activeNoticias; ?>"><a href="<?php echo site_url('/noticias/'); ?>">Noticias</a></li>
									<li><a class="gtm-btn-menu" type="button" data-toggle="modal" data-target="#SoyCDMX-mobile--home">#SomosCDMX</a></li>
								</ul>
							</div>
							<img class="[ width-60 ][ margin-top-bottom--large ][ center-block ]" src="<?php echo THEMEPATH; ?>images/logocdmx.png" alt="Logo Constitución CDMX">
						</div>
					</div>

					<!-- #SoyCDMX mobile home -->
					<div class="modal fade [ bg-light ]" id="SoyCDMX-mobile--home" tabindex="-1" role="dialog">
						<div class="[ modal-content no-border-radius width--100 ][ width-100 ][ no-margin ]">
							<div class="[ container ][ padding--top ]">
								<div class="[ absolute right-10 ]">
									<a type="button" class="close [ opacity-7 ]" data-dismiss="modal" aria-label="Close"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar"></a>
								</div>
								<h3>#SomosCDMX</h3>
								<?php if (! empty($tweets) ):
									foreach ($tweets as $tweet): ?>
										<div class="[ row ]">
											<div class="[ col-xs-12 ][ color-gray ]">
												<p class="[ fz-medium ][ no-margin ][ color-primary ]"><?php echo $tweet['user_name'].' @'.$tweet['screen_name']; ?></p>
												<p class="[ margin-bottom--small ]"><?php echo $tweet['text']; ?></p>
												<p class="[ text-italic fz-medium ][ margin-bottom--small ][ text-right ]"><?php echo $tweet['date']; ?></p>
												<hr class="[ border-bottom-gray ]">
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
						</div>
					</div>
				</nav>
			</header>
		<?php elseif ( is_page('sondeo-masivo') ): ?>

		<?php else: ?>
			<header class="[ not-home ]">
				<nav class="[ height-100 ]">
					<!-- menu desktop not home -->
					<ul class="[ menu-desktop ][ text-center ][ hidden-xs hidden-sm ][ height-100 ]">
						<li class="[ no-padding--sides padding--top--xsmall padding--header-logo ][ menu-desktop__logo ]">
							<a class="[ inline-block ]" href="<?php echo site_url('/'); ?>">
								<img class="[ logo ][ margin-right margin-top--large ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal.png" alt="Logo vertical Constitución CDMX">
							</a>
						</li>
						<li class="[ dropdown--hover dropdown--hover--acerca ][ menu-desktop__acerca ] <?php echo $activeAcerca; ?>">
							<a class="[ text-uppercase gtm-btn-menu ]" href="<?php echo site_url('/constitucion-cdmx/'); ?>">Acerca de la<br>constitución<span class="caret"></span></a>
							<ul class="dropdown-content dropdown-menu" aria-labelledby="dropdown--header">
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#jefe-gobierno">Mensaje del jefe de gobierno</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#sobre-constitucion">Sobre la constitución</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#grupo-trabajo">Grupo de trabajo</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#sobre-plataforma">Sobre la plataforma</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#constitucion-wiki">Constitución en Wiki</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#preguntas-frecuentes">Preguntas frecuentes</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/constitucion-cdmx/'); ?>#biblioteca">Biblioteca</a></li>
							</ul>
						</li>
						<li class="[ dropdown--hover ] <?php echo $activeCdmx; ?>">
							<span>
								<a class="[ text-uppercase gtm-btn-menu ]" href="<?php echo site_url('/cdmx/'); ?>">
									Ciudad de México<span class="caret"></span>
								</a>
							</span>
							<ul class="dropdown-content dropdown-menu" aria-labelledby="dropdown--header">
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>#cronica">Crónica</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>#hacia-el-constituyente">Hacia la Constituyente</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/cdmx/'); ?>#voces-ciudadanas">Voces ciudadanas</a></li>
							</ul>
						</li>
						<li class="[ dropdown--hover ] <?php echo $activeParticipa; ?>">
							<span><a class="[ text-uppercase gtm-btn-menu ]" href="<?php echo site_url('/participa/'); ?>">Participa<span class="caret"></span></a></span>
							<ul class="dropdown-content dropdown-menu" aria-labelledby="dropdown--header">
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#instrucciones">¿Cómo Participo?</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#imagina-ciudad">Imagina tu ciudad</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#peticiones">Peticiones</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#dialogos-publicos">Encuentros ciudadanos</a></li>
								<li><a class="gtm-btn-menu" href="<?php echo site_url('/participa/'); ?>#ensayos">Ensayos</a></li>
								<li><a class="gtm-btn-menu" href="https://portal.iedf.org.mx/constituyente/propuestas/" target="_blank">Propuestas ciudadanas</a></li>
							</ul>
						</li>
						<li class="[ text-uppercase ] <?php echo $activeNoticias; ?>">
							<a class="gtm-btn-menu" href="<?php echo site_url('/noticias/'); ?>">Noticias</a>
						</li>
						<li id="js-btn-cdmx">
							<a href="#nada" class="gtm-btn-menu">
								<img class="[ svg icon icon--iconed--small icon--thickness-1 icon--fill ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/twitter.svg">
								#SomosCDMX
							</a>
						</li>
					</ul>

					<!-- Menú movil not home -->
					<div class="[ bg-light ][ visible-xs visible-sm ]">
						<div class="[ container ]">
							<div class="[ width-col-9 ][ inline-block align-middle ]">
								<a class="gtm-btn-menu" href="<?php echo site_url('/'); ?> "><img class="[ logo margin-top-bottom--small ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal.png" alt="Logo vertical Constitución CDMX"></a>
							</div><div
							class="[ width-col-3 ][ inline-block align-middle ][ text-center ]">
								<a href="#nada" class="[ pull-right gtm-btn-menu ]" data-toggle="modal" data-target="#modal-menu"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/navigation.svg"></a>
							</div>
						</div>
					</div>

					<!-- modal menu mobile not home -->
					<div class="modal fade" id="modal-menu" tabindex="-1" role="dialog">
						<div class="[ modal-dialog modal-content ][ width-100 height-100 ][ no-margin ]">
							<div class="[ container ][ bg-light ]">
								<div class="[ row ]">
									<div class="[ col-xs-10 ]">
										<a class="gtm-btn-menu" href="<?php echo site_url('/'); ?> "><img class="[ logo margin-top-bottom--small ]" src="<?php echo THEMEPATH; ?>images/logo/logo_horizontal.png" alt="Logo vertical Constitución CDMX"></a>
									</div>
									<div class="[ col-xs-2 ][ text-center ][ padding--top ]">
										<a type="button" class="close gtm-btn-menu" data-dismiss="modal" aria-label="Close"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar"></a>
									</div>
								</div>
							</div>
							<div class="[ bg-light-cdmx ][ text-center ]">
								<ul class="[ menu-mobile ]">
									<li class="[ text-uppercase gtm-btn-menu ] <?php echo $activeAcerca; ?>"><a href="<?php echo site_url('/constitucion-cdmx/'); ?>">Acerca de la constitución</a></li>
									<li class="[ text-uppercase gtm-btn-menu ] <?php echo $activeCdmx; ?>"><a href="<?php echo site_url('/cdmx/'); ?>">Ciudad de México</a></li>
									<li class="[ text-uppercase gtm-btn-menu ] <?php echo $activeParticipa; ?>"><a href="<?php echo site_url('/participa/'); ?>">Participa</a></li>
									<li class="[ text-uppercase gtm-btn-menu ] <?php echo $activeNoticias; ?>"><a href="<?php echo site_url('/noticias/'); ?>">Noticias</a></li>
									<li><a class="gtm-btn-menu" type="button" data-toggle="modal" data-target="#SoyCDMX-mobile">#SomosCDMX</a></li>
								</ul>
							</div>
							<img class="[ width-60 ][ margin-top-bottom--large ][ center-block ]" src="<?php echo THEMEPATH; ?>images/logocdmx.png" alt="Logo Constitución CDMX">
						</div>
					</div>

					<!-- #SoyCDMX mobile not-home -->
					<div class="modal fade [ bg-light ]" id="SoyCDMX-mobile" tabindex="-1" role="dialog">
						<div class="[ modal-content no-border-radius width--100 ][ no-margin ]">
							<div class="[ container ][ padding--top ]">
								<div class="[ absolute right-10 ]">
									<a type="button" class="close [ opacity-7 ] gtm-btn-menu" data-dismiss="modal" aria-label="Close"><img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar"></a>
								</div>
								<h3>#SomosCDMX</h3>
								<?php if (! empty($tweets) ):
									foreach ($tweets as $tweet): ?>
										<div>
											<p class="[ fz-medium ][ no-margin ]"><?php echo $tweet['user_name'].' @'.$tweet['screen_name']; ?></p>
											<p class="[ margin-bottom--small ]"><?php echo $tweet['text']; ?></p>
											<p class="[ text-italic fz-medium ]"><?php echo $tweet['date']; ?></p>
											<hr class="[ border-bottom-gray ]">
										</div>
									<?php endforeach;
								endif; ?>
							</div>
						</div>
					</div>
				</nav>
			</header>
		<?php endif; ?>

		<div class="[ soy-cdmx right-370 ][ js-hidden ]">
			<div class="[ opacity-7 ][ absolute right-10 ]">
				<a id="js-hide-twitter" href="#nada">
					<img class="[ svg icon icon--iconed icon--thickness-1 icon--stroke ][ color-gray ]" src="<?php echo THEMEPATH; ?>icons/close.svg" alt="Ícono cerrar">
				</a>
			</div>
			<h3>#SomosCDMX</h3>
			<?php $tweet = new Twitter;
			$tweets = $tweet->feedTwitter();
			if (! empty($tweets) ):
				foreach ($tweets as $tweet): ?>
					<div>
						<p class="[ fz-medium ][ no-margin ][ color-primary ]"><?php echo $tweet['user_name'].' @'.$tweet['screen_name']; ?></p>
						<p class="[ margin-bottom--small ]"><?php echo $tweet['text']; ?></p>
						<p class="[ text-italic fz-medium ][ margin-bottom--small ][ text-right ]"><?php echo $tweet['date']; ?></p>
						<hr class="[ border-bottom-gray ]">
					</div>
				<?php endforeach;
			endif; ?>
		</div>

		<div class="[ main ]">