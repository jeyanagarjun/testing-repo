<?php

function forwardTrackButton() {
if(get_theme_mod('player_forward')){ ?>
    <button id="forwardTrack" class="btn btn-link d-none d-sm-block">
        <i class="icon-fast-forward s-18"></i>
    </button>
<?php } }

function backwardTrackButton() {
  if(get_theme_mod('player_backward')){ ?>
      <button id="backwardTrack" class="btn btn-link d-none d-sm-block ">
        <div class="flip">
        <i class="icon-fast-forward s-18"></i>
        </div>
      </button>
<?php } }


function nextTrackButton() {
  if(!get_theme_mod('player_next_back')){ ?>
      <button id="nextTrack" class="btn btn-link">
          <i class="icon-next s-18"></i>
      </button>
<?php } }


function previousTrackButton() {
    if(!get_theme_mod('player_next_back')){ ?>
     <button id="previousTrack" class="btn btn-link">
          <i class="icon-back s-18"></i>
      </button>
<?php }}


function playPauseButton() {?>
<button class="btn btn-link" id="playPause">
        <span id="play"><i class="icon-play s-36"></i></span>
        <span id="pause" style="display: none"><i class="icon-pause s-36 text-primary"></i></span>
    </button>
<?php }



if(get_theme_mod('layout_rtl')) {
  add_action( 'playerControls', 'previousTrackButton', 25);
  add_action( 'playerControls', 'backwardTrackButton', 20);
  add_action( 'playerControls', 'playPauseButton', 15 );
  add_action( 'playerControls', 'forwardTrackButton', 10);
  add_action( 'playerControls', 'nextTrackButton', 5 );
  
}else{
  add_action( 'playerControls', 'previousTrackButton', 5);
  add_action( 'playerControls', 'backwardTrackButton', 10);
  add_action( 'playerControls', 'playPauseButton', 15);
  add_action( 'playerControls', 'forwardTrackButton', 20);
  add_action( 'playerControls', 'nextTrackButton', 25 );
}



function rekord_play_icon_template($size='s-28'){
    echo '<i class="icon-play play-btn-icon '.$size.'" aria-hidden="true"></i>';
}

//TODO: Needs improvments 
function rekord_getTrack($attrs=false){
  $track = [];
  $track['url'] =  rekord_get_field('track_upload')['url'];
  $track['wave']  = rekord_get_field('track_wave') ? rekord_get_field('track_wave')['url']: '';
  $track['artists'] = rekord_get_field('track_artists'); 
  if(rekord_get_field('track') != 'upload'):
    $track['url'] = rekord_get_field('track_url')  ;
  endif;   
  $track_thumbnail = '';
  if ( has_post_thumbnail() ) {
        $track['thumbnail']  = get_the_post_thumbnail_url(get_the_ID(),'full'); 

    }
    elseif(!empty(rekord_get_field('track_albums')[0])){
        $album = rekord_get_field('track_albums')[0];
        $track['thumbnail']=    get_the_post_thumbnail_url($album->ID ,'full'); 
    }

  
      $attributes = [
        'data-title' => get_the_title(),
        'data-time' => rekord_get_field('track_time'),
        'data-thumbnail' => esc_url($track['thumbnail']),
        'data-permalink' => get_permalink(),
        'data-artist' => $track['artists'][0]->post_title,
        'data-type' => rekord_get_field('track'),
        'data-stream-type'=> rekord_get_field('stream_type'),
        'data-url'=> esc_url($track['url']),
        'class' => 'no-ajaxy media-url track-url',
        'href' =>  esc_url($track['url']),
      ];

      if(!empty( $track['wave'] )){
        $attributes['data-wave'] =  esc_url($track['wave']);
      }

      if($attrs) return $attributes;

  
      $attrString  = '';
      foreach($attributes as $key=> $attribute){
          $attrString .= "{$key}='{$attribute}' ";
      }
	
    return $attrString;
}