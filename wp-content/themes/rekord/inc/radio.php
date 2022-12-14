<?php

   
add_action( 'wp_ajax_nopriv_get_data', 'rekord_getMp3StreamTitle' );
add_action( 'wp_ajax_get_data', 'rekord_getMp3StreamTitle' );


function rekord_getMp3StreamTitle()
{
    // URL of SHOUTCast streaming
	$steam_url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
	$currentlyPlayingTrack = filter_input(INPUT_GET, 'currentTrack', FILTER_SANITIZE_STRING);


	$result = false;
	$icy_metaint = -1;
	$needle = 'StreamTitle=';
	$ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36';

	$opts = array(
		'http' => array(
			'method' => 'GET',
			'header' => 'Icy-MetaData: 1',
			'user_agent' => $ua
		)
	);

	$default = stream_context_set_default($opts);

	$stream = fopen($steam_url, 'r');

	if($stream && ($meta_data = stream_get_meta_data($stream)) && isset($meta_data['wrapper_data'])){
		foreach ($meta_data['wrapper_data'] as $header){
			if (strpos(strtolower($header), 'icy-metaint') !== false){
				$tmp = explode(":", $header);
				$icy_metaint = trim($tmp[1]);
				break;
			}
		}
	}

	if($icy_metaint != -1)
	{
		$buffer = stream_get_contents($stream, 300, $icy_metaint);

		if(strpos($buffer, $needle) !== false)
		{
			$title = explode($needle, $buffer);
			$title = trim($title[1]);
			$result = substr($title, 1, strpos($title, ';') - 2);
		}
	}

	
	if($stream)
		fclose($stream);   

		$r = explode('-', $result );

		
		$data['currentArtist'] = trim($r[0]);
		$data['currentSong'] =  trim($r[1]) ;
		if($currentlyPlayingTrack  != $data['currentSong']){
			$data['image'] = getLastFmImage($data['currentSong'] , $data['currentArtist'] );
		}



	echo json_encode($data);
	die();
}

function getLastFmImage($track, $artist){
	$api_key_last_fm = get_theme_mod('rekord_api_lastfm') ; 
	$image = null;

	if(!empty($api_key_last_fm)){
		$url= 'http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key='.$api_key_last_fm.'&artist='. $artist.'&track='.$track.'&format=json';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result = curl_exec($ch);
		curl_close($ch);
	   
		$track = json_decode($result,true)['track'];
	   
		$image = $track['album']['image'][1]['#text']; 
	}
	return $image;
}