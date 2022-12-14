<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
 
$tracks = rekord_relation_count('track' , 'track_artists');
$albums = rekord_relation_count('album' , 'album_artists');

if( $albums > 0) : ?>
<small class="mr-2">
    <?php printf( _nx( '%s Album', '%s Albums', $albums, 'rekord','rekord' ), $albums ); ?>
</small>
<?php endif; ?>

<?php if( $tracks > 0) : ?>
<small>
    <?php printf( _nx( '%s Track', '%s Tracks', $tracks, 'rekord','rekord' ), $tracks ); ?>
</small>
<?php endif; 
?>