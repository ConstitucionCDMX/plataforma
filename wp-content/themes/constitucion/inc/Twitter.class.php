<?php $directory = get_template_directory();
include $directory.'/inc/twitteroauth-0.5.4/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter {

	private $consumer_key;
	private $consumer_secret;
	private $access_token;
	private $access_token_secret;

	public function __construct()
	{
		$this->consumer_key = 'access';
		$this->consumer_secret = 'secret';
		$this->access_token ='acccess';
		$this->access_token_secret = 'secret';
	}

	public function feedTwitter()
	{
		$results = $this->getSearchTweets();

		$new_arr = array();
		foreach ($results->statuses as $key => $result) {
		 	$date_transform = new DateTime($result->created_at);
		    $date_transform->setTimezone(new DateTimeZone('America/Mexico_City'));
		    $date = $date_transform->format('H:i');

		  	$date_t = getDateTransform($date_transform->format('Y-m-d'));

		  	$new_arr[$key]['user_name']   = $result->user->name;
		  	$new_arr[$key]['screen_name'] = $result->user->screen_name;
		  	$new_arr[$key]['text'] 		  = $result->text;
		  	$new_arr[$key]['date'] 	  = $date.' - '.$date_t[1].' '.$date_t[0].' - '.$date_t[2];
		}

		return $new_arr;
	}


	/**
	 * RETURN RESULTS SEARCH HASHTAG IN TWITTER
	 * @return [array] [tweets search #]
	 */
	private function getSearchTweets()
	{
		$connection = new TwitterOAuth( $this->consumer_key, $this->consumer_secret, $this->access_token, $this->access_token_secret);
		// return $connection->get("account/verify_credentials");
		$query = array(
		  	"q" => "#SomosCDMX-filter:retweets",
		  	"count" => 8,
		  	"result_type" => "recent"
		);

		return $connection->get('search/tweets', $query);
	}


	/**
	 * REGREA LOS MINUTOS Ó HORAS Ó DIAS QUE SE PUBLICO EL EVENTO
	 * @param  [datetime] $time [fecha y tiempod e publicacion]
	 * @return [type]       [tiempo de publicacion en minutos ó horas ó dias]
	 */
	public function humanTiming($time)
	{
	    $time = time() - $time; // to get the time since that moment

	    $tokens = array (
	        31536000 => 'año',
	        2592000 => 'mes',
	        604800 => 'semana',
	        86400 => 'día',
	        3600 => 'h',
	        60 => 'min',
	        1 => 'sec'
	    );

	    foreach ($tokens as $unit => $text) {
	        if ($time < $unit) continue;
	        $numberOfUnits = floor($time / $unit);
	        return $numberOfUnits.' '.$text.(($text != 'min' && $numberOfUnits>1)?'s':'');
	    }
	}

}
