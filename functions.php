<?php 

// Override byline text

function twentyten_posted_on() {
	printf( __( '<span class="%1$s">%2$s</span>', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<span class="entry-date">%3$s</span>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}

// Twitter display functionaity from Hot Koehl http://frankkoehl.com/2008/11/display-twitter-updates-on-your-website/

function twitter_status($twitter_id, $hyperlinks = true) {
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/14772472.xml");
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 3);
  curl_setopt($c, CURLOPT_TIMEOUT, 5);
  $response = curl_exec($c);
  $responseInfo = curl_getinfo($c);
  curl_close($c);
  if (intval($responseInfo['http_code']) == 200) {
    if (class_exists('SimpleXMLElement')) {
      $xml = new SimpleXMLElement($response);
      return $xml;
    } else {
      return $response;
    }
  } else {
    return false;
  }
}

// Part of Twitter display functionaity from Hot Koehl 
function linkify( $text ) {
  $text = preg_replace( '/(?!<\S)(\w+:\/\/[^<>\s]+\w)(?!\S)/i', '<a href="$1" target="_blank">$1</a>', $text );
  $text = preg_replace( '/(?!<\S)#(\w+\w)(?!\S)/i', '<a href="http://twitter.com/search?q=#$1" target="_blank">#$1</a>', $text );
  $text = preg_replace( '/(?!<\S)@(\w+\w)(?!\S)/i', '@<a href="http://twitter.com/$1" target="_blank">$1</a>', $text );
  return $text;
}

?>