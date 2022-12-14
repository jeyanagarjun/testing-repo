<?php
/**
 *  Template Name: Podcast RSS
 */


// Query the Podcast Custom Post Type and fetch the latest 100 posts
$args = array( 'post_type' => 'podcast', 'posts_per_page' => 20 );
$loop = new WP_Query( $args );



/**
 * Get the current URL taking into account HTTPS and Port
 * @link https://css-tricks.com/snippets/php/get-current-page-url/
 * @version Refactored by @AlexParraSilva
 */
function getCurrentUrl() {
    $url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
    $url .= '://' . $_SERVER['SERVER_NAME'];
    $url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $url .= $_SERVER['REQUEST_URI'];
    return $url;
}

// Output the XML header
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>

<rss version="2.0"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:wfw="http://wellformedweb.org/CommentAPI/"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:atom="http://www.w3.org/2005/Atom"
        xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
        xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
        xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
        <?php do_action('rss2_ns'); ?>>
  
  <?php 
    // The information for the podcast channel 
    // Mostly using get_bloginfo() here, but these can be custom tailored, as needed
  ?>
  <channel>
    <title><?php echo get_bloginfo('name'); ?></title>
    <link><?php echo get_bloginfo('url'); ?></link>
    <language><?php echo get_bloginfo ( 'language' ); ?></language>
    <copyright><?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?></copyright>
    
    <itunes:author><?php echo get_bloginfo('name'); ?></itunes:author>
    <itunes:summary><?php echo get_bloginfo('description'); ?></itunes:summary>
    <description><?php echo get_bloginfo('url'); ?></description>
    
    <itunes:owner>
      <itunes:name><?php echo rekord_get_field('itunes_name', 'option');?></itunes:name>
      <itunes:email><?php echo rekord_get_field('itunes_email', 'option'); ?></itunes:email>
    </itunes:owner>
    
     <?php
      $image = rekord_get_field('itunes_cover', 'option');
      if( $image ){ ?>
    <itunes:image href="<?php if( $image )  echo esc_url($image['url']); ?>" />
     <?php } ?>
    
    <itunes:category text="<?php echo rekord_get_field('itunes_category', 'option');  ?>">
    <itunes:category text="<?php echo rekord_get_field('itunes_sub_category', 'option');  ?>"/>
    </itunes:category>
    <itunes:explicit>yes</itunes:explicit>
    
    <?php // Start the loop for Podcast posts
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <item>
      <title><?php the_title_rss(); ?></title>

      <?php $artists = rekord_get_field('track_artists'); ?>
      <itunes:author><?php echo $artists[0]->post_title; ?></itunes:author>
      <itunes:summary><?php echo rekord_get_excerpt(); ?></itunes:summary>
      <?php // Retrieve just the URL of the Featured Image: http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src
      if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <itunes:image href="<?php echo $image[0]; ?>" />
      <?php endif; ?>
    

      <?php // Get the file field URL, filesize and date format
        $fileurl = rekord_get_field('track_upload')['url'];
        $filesize = rekord_get_field('track_upload')['filesize'];
        $dateformatstring = _x( 'D, d M Y H:i:s O', 'Date formating for iTunes feed.' );
      ?>
      
      <enclosure url="<?php echo $fileurl; ?>" length="<?php echo $filesize; ?>" type="audio/mpeg" />
      <guid><?php echo $fileurl; ?></guid>
      <guid isPermaLink="false"><?php the_guid(); ?></guid>
      <pubDate><?php echo date($dateformatstring, $show_date); ?></pubDate>
      <itunes:duration><?php the_field('track_time'); ?></itunes:duration>
    </item>
    <?php endwhile; ?>
  
  </channel>

</rss>