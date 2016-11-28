<ul id="scroll" class="[ scroll-cronologia ][ horizontal-slide ][ text-center ]">

	<?php $cronologia = new WP_Query(array(
			'post_type'      => 'eventos',
			'posts_per_page' => -1,
			'orderby'  => 'fecha_evento',
			'order'    => 'ASC',
			'meta_query' => array(
				array(
					'key'     => 'fecha_evento',
				)

			)
		));
	if ( ! empty ($cronologia->posts)):
		$timeLine = new TimeLine;
		$fechas = $timeLine->elementsTimeLine($cronologia->posts);
		$count = 0;
		$count_pasados = 0;
		$data_attr = '';
		$class_visibility = "";
		foreach ($fechas as $date_events => $eventos):

			$date_arr = getDateTransform($date_events);
			$date = '<span class="[ color-primary ]"><strong>'. $date_arr[0] . '</strong></span> ' . $date_arr[1];
			$count_pasados = strtotime($date_events) < strtotime( date('Y-m-d') ) ? $count_pasados + 1 : $count_pasados;
			$class_status = strtotime($date_events) < strtotime( date('Y-m-d') ) ? 'ya-paso ' : '';
			$count_events = count($eventos);

			if ($count_events > 1): ?>
				<li class="[ box-li mas-eventos <?php echo $class_status; ?> ]" data-date="<?php echo $date_events; ?>">
			    	<a href="#">
						<p class="[ color-gray ][ fz-small top-date ][ margin-top--date ][ text-uppercase ]"><?php echo $date; ?></p>
						<div class="[ border-gray--large ]"></div>
						<div class="[ vertical-line ]"></div>
						<div class="[ circle-xsmall ]"></div>
						<div class="[ text--large relative ]">
							<p class="[ evento evento-bottom ]"><?php echo $count_events; ?> Eventos</p>
						</div>
					</a>
				</li>

				<?php $data_attr = $date_events;
				$class_visibility = 'hidden ';

			endif;

			foreach ($eventos as $evento):

				if((int)$evento->type != 3): ?>
				    <li class="[ box-li <?php echo $class_status.$class_visibility; ?> ][ <?php echo 'date-'.$data_attr; ?> ]">
				    	<a class="gtm-btn-fecha" href="<?php echo get_permalink($evento->ID); ?>">
							<p class="[ color-gray ][ fz-small top-date ][ margin-top--date ][ text-uppercase ]"><?php echo $date; ?></p>
							<div class="[ border-gray--large ]"></div>
							<div class="[ vertical-line ]"></div>
							<div class="[ circle-xsmall ]"></div>
							<div class="[ text--large relative ]">
								<p class="[ evento evento-bottom ]"><?php echo $evento->post_title; ?></p>
							</div>
						</a>
					</li>
				<?php else: ?>
					<li class="[ box-li nota-destacada ]">
						<div class="[ text--large text--destacado relative ]">
							<p class="[ evento ]"><?php echo $evento->post_title; ?></p>
						</div>
						<div class="[ box-li__lines ]">
							<div class="[ vertical-line--large ]"></div>
							<div class="[ border-gray--large ]"></div>
						</div>
						<p class="[ color-gray ][ fz-small ][ margin-bottom--date ][ text-uppercase ]"></p>
					</li>
				<?php endif;

				$count++;
			endforeach;
			$data_attr = '';
			$class_visibility = '';
		endforeach;

		$data = '';
		if ($cronologia->found_posts >= 7 AND $count_pasados > 0) {
			$recorre = ($count_pasados - 1 ) * 163;
			echo '<input type="hidden" id="recorre" value="'.$recorre.'">';
		}
	endif; ?>


</ul>