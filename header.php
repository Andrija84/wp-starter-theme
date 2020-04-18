<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8" />
	<title><?php wp_title(); ?></title>

	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no">

	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_32x32.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_120x120.png"/>
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_152x152.png"/>
	<link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_167x167.png"/>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_180x180.png"/>

	<meta name="description" content="[ ARTICLE DESCRIPTION ]" />
	<meta name="author" content="[ AUTHOR FULL NAME ]" />
	<link rel="canonical" href="[ SITE URL ]" />

	<meta itemprop="name" content="[ TITLE ]" />
	<meta itemprop="image" content="[ LISTING IMAGE ]" />
	<meta itemprop="description" content="[ ARTICLE DESCRIPTION ]" />
	<!-- Google + OpenGraph  -->
	<meta property="article:author" content="[ GOOGLE+ AUTHOR URL ]" />
	<meta property="article:published_time" content="[ PUBLISHED TIMESTAMP ]" />
	<meta property="article:section" content="[ CATEGORY ]" />
	<!-- Facebook OpenGraph  -->
	<meta property="og:title" content="[ TITLE ]" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="[ ARTICLE DESCRIPTION ]" />
	<meta property="og:image" content="[ LISTING IMAGE ]" />
	<meta property="og:url" content="[ CANONICAL URL OF ITEM ]" />
	<meta property="og:site_name" content="[ WEBSITE NAME ]" />
	<!-- Twitter OpenGraph  -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="[ TITLE ]">
	<meta name="twitter:description" content="[ ARTICLE DESCRIPTION ]">
	<meta name="twitter:image" content="[ LISTING IMAGE ]">
	<meta name="twitter:url" content="[ CANONICAL URL OF ITEM ]">

	<!-- Disable Pinterest pins  -->
	<meta name="pinterest-rich-pin" content="false" />

	<!-- Pingback  -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Prefetch local fonts  -->
	<link rel="prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/AvenirLTStd-Medium.otf" type="font/otf">
	<link rel="prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/AvenirLTStd-Black.otf" type="font/otf">
	<!-- EXTRA  -->
	<link rel='dns-prefetch' href='//html5shiv.googlecode.com' />
	<link rel='dns-prefetch' href='//s.w.org' />
	<link rel="alternate" type="application/rss+xml" title="[ WEBSITE NAME ]" href="https://[ SITE URL ]/feed/" />


	<!-- HTML schema  -->
	<script type="application/ld+json">
	{
		"@context":"https://schema.org",
		"@type":"Organization",
		"@id":"[ WEBSITE URL ]",
		"name":"[ WEBSITE TITLE ]",
		"logo":"<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_512x512.png",
		"location":{
			"@type":"Place",
			"address":{
				"@type":"PostalAddress",
				"streetAddress":"Glashuettenstrasse 79",
				"addressLocality":"Hamburg",
				"postalCode":"20357",
				"addressCountry":"Germany",
				"hoursAvailable":[
					{
						"@type":"OpeningHoursSpecification",
						"validFrom":"2019-02-12",
						"opens":"09:00",
						"closes":"18:00"
					}
				]
			}
		},
		"description":"Jung von Matt provides its clients with creative and efficient marketing communication across all channels and disciplines.",
		"url":"https://www.jvm.com/de/",
		"telephone":"+49 40 4321-0"
	}
	</script>
	<!-- Web manifest  -->
	<script type="application/manifest+json">
	{
	name: "[ WEBSITE TITLE ]",
	short_name: "[ WEBSITE SHORTNAME ]",
	start_url: "[ WEBSITE URL ]",
	icons: [
	{
	src: "<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_192x192.png",
	sizes: "192x192",
	type: "image/png"
	},
	{
	src: "<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_512x512.png",
	sizes: "512x512",
	type: "image/png"
	}
	],
	theme_color: "#ffffff",
	background_color: "#ffffff",
	display: "standalone"
	}
	</script>

<?php wp_head(); ?>

</head>
