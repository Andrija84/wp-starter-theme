<?php

//GOOGLE MAP INIT. initMap is a js function name from custom-gmap.js
/*
add_action('wp_head', 'wpb_add_googlemap');
function wpb_add_googlemap() {
 echo ' <script src="https://maps.googleapis.com/maps/api/js?key=GOOGLEAPIKEY&callback=initMap" async defer></script>';

}

//GOOGLE API KEY FOR ACF MAP
function my_acf_google_map_api( $api ){
	$api['key'] = '';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


//GOOGLE ANALYTICS
add_action('wp_head', 'wpb_add_googleanalytics');
function wpb_add_googleanalytics() {
 echo '<script async src="https://www.googletagmanager.com/gtag/js?id=ANALITYCSID"></script>';
 echo '<script>';
 echo ' window.dataLayer = window.dataLayer || [];';
 echo ' function gtag(){dataLayer.push(arguments)};';
 echo " gtag('js', new Date());";
 echo " gtag('config', 'ANALITYCSID', { 'anonymize_ip': true });";
 echo '</script>';
}


//GOOGLE ADS
add_action('wp_head', 'wpb_add_googleads');
function wpb_add_googleads() {
	echo '<script async src="//pagead2.googlesyndication.com/';
  echo 'pagead/js/adsbygoogle.js"></script>';
  echo '<script>';
  echo '(adsbygoogle = window.adsbygoogle || []).push({';
  echo 'google_ad_client: "pub-6859510438593189",';
  echo 'enable_page_level_ads: true';
  echo '});';
  echo '</script>';
}



*/
