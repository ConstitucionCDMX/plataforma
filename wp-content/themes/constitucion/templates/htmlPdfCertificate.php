<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Certificate</title>
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,500,400,700" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSSPATH; ?>styles-pdf.css" type="text/css"/>
		<!-- Google font(s) -->
		<link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,500,700,800,300,100' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,800,500,300' rel='stylesheet' type='text/css'>
	</head>
	<style>
		body{ width: 300px;
		height: 300px }
		h2{	font-family: "Alegreya Sans",sans-serif; font-size: 28px;}
		h2.large-name{ font-size: 25px;}
		p{ font-family: "ABeeZee", sans-serif;  }
		.text-center{text-align: center;}
		.img-logo{ width: 300px; }
		.img-logo--small{ width: 130px; }
		.color-primary{ color: #e80e8a; }
		.color-gray--strong{ color:#222; }
		.color-gray{ color: #555; }
		.col{
			float: left;
			padding-right: 15px;padding-right: 15px;
		}
		.col-1{ width: 40%;}
		.col-2{ width: 55%;}
		.text-uppercase{ text-transform: uppercase; }
		.fz--small{ font-size: 12px; }
		.margin-top--xsmall{ margin-top: 30px; }
		.margin-top--small{ margin-top: 50px; }
		.margin-top{ margin-top: 110px; }
		.margin-top--large{ margin-top: 170px; }
		.margin-right{ margin-right: 20px; }
		.padding{ padding: 50px; }
		.border-primary{
			border: 1px solid #e80e8a;
			width: 930px; height: 560px;
			padding: 10px;
			position: relative;
		}
		.border--1{ top: 10px; }
		.border--2{ top: -20px; }
		.border--3{ top: 10px; }
		.border--black{
			border: 1px solid #000;
			width: 970px; height: 600px;
			padding: 20px;
			background-color: #fff;
			position: relative;
			top: -10px;
		}
		.border--black--large{
			border-left: 20px solid #555; border-bottom: 20px solid #555;
			padding: 0px; width: 1000px;
			height: 630px;
		}
	</style>
	<body class="[ border--black--large ]" >
		<div class="[ border--black ]">
			<div class="[ border-primary border--1 ]">
				<div class="[ border-primary border--2 ]">
					<div class="[ border-primary border--3 ]">
						<div class="[ padding ]">
							<div class="[ col col-1 ]">
								<img class="[ img-logo ]" src="<?php echo THEMEPATH; ?>images/consti_horizontal.png">
								<p class="[ color-gray ][ fz--small ][ text-uppercase ][ margin-top--large ]">Con el folio núm. <span class="[ color-primary ][ fz--small ]"><?php echo $referencia ?></span><br>
								podrás darle seguimiento <br>
								a tu participación</p>
								<div class="[ margin-top--large ]">
									<img class="[ img-logo--small margin-right ]" src="<?php echo THEMEPATH; ?>images/logocdmx.png">
									<img class="[ img-logo--small ]" src="<?php echo THEMEPATH; ?>images/capital-social.jpg">
								</div>
							</div>
							<div class="[ col col-2 ]">
								<?php $count = strlen($nombre.' '.$apellidos);
								$class_h2 = $count >= 40 ? 'large-name' : ''; ?>
								<h2 class="[ text-uppercase ][ color-gray ][ margin-bottom--small ] <?php echo $class_h2 ?>"><?php echo $nombre . ' ' . $apellidos ?></h2>
								<p class="[ color-gray--strong ][ margin-top--xsmall ]">A nombre de quienes integramos el Grupo de Trabajo encargado de la redacción del proyecto de Constitución de la Ciudad de México, te otorgo el presente reconocimiento por haber contribuido con tus ideas, reflexiones y propuestas para este proyecto.</p>
								<p class="[ color-gray--strong ][ margin-top--xsmall ]">
									La Ciudad de México somos todas y todos. Gracias por ser parte de este proceso histórico.
								</p>
								<p class="[ color-gray--strong ][ margin-top--xsmall ][ text-center ]">
									Miguel Ángel Mancera Espinosa<br />
									Jefe de Gobierno de la Ciudad de México
								</p>
								<?php $date = getDateTransform(date('Y-m-d'));  ?>
								<p class="[ text-uppercase ][ color-gray ][ fz--small ][ margin-top--xsmall ]">Ciudad de México a <?php echo $date[0].' de '.$date['1'].' de '.$date[2]; ?> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>