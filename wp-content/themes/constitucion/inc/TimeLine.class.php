<?php $directory = get_template_directory();

class TimeLine {

	public $newLine;

	public function __construct()
	{
		$this->newLine = array();
	}

	public function elementsTimeLine($data)
	{
		$events = $this->getGroupEvents($data);
		return $events;
	}

	private function getGroupEvents($events)
	{
		if ( ! empty($events) ):
			$date_old  = '';
			$count = 0;
			foreach ($events as $key => $event):
				$type = get_post_meta( $event->ID, 'tipo-de-evento', true );
				$date = get_post_meta($event->ID, 'fecha_evento', true);

				if ($date_old == $date):
					$count++;
				else:
					$count = 1;
				endif;

				$this->newLine[$date][$count] = $event;
				$this->newLine[$date][$count]->date = $date;
				$this->newLine[$date][$count]->type = $type;

				$date_old = $date;
			endforeach;
		endif;

		return $this->newLine;
	}

}
