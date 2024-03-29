<?php
/**
 * Plugin Name: Lazy Load
 * Description: Lazy load images to improve page load times. Uses jQuery.sonar to only load an image when it's visible in the viewport.
 * Version: 0.4
 *
 * Code by the WordPress.com VIP team, TechCrunch 2011 Redesign team, and Jake Goldman (10up LLC).
 * Uses jQuery.sonar by Dave Artz (AOL): http://www.artzstudio.com/files/jquery-boston-2010/jquery.sonar/ 
 *
 * License: GPL2
 */

if ( ! class_exists( 'LazyLoad_Images' ) ) :

class LazyLoad_Images {

	const version = '0.4';

	function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'add_scripts' ) );
		add_filter( 'the_content', array( __CLASS__, 'add_image_placeholders' ), 99 ); // run this later, so other content filters have run, including image_add_wh on WP.com
		add_filter( 'post_thumbnail_html', array( __CLASS__, 'add_image_placeholders' ), 11 );
	}

	function add_scripts() {
		wp_enqueue_script( 'wpcom-lazy-load-images',  self::get_url( 'js/lazy-load.js' ), array( 'jquery', 'jquery-sonar' ), self::version, true );
		wp_enqueue_script( 'jquery-sonar', self::get_url( 'js/jquery.sonar.min.js' ), array( 'jquery' ), self::version, true );
	}

	function add_image_placeholders( $content ) {
		// Don't lazyload for feeds, previews, mobile
		if( is_feed() || is_preview() || ( function_exists( 'is_mobile' ) && is_mobile() ) )
			return $content;

		// Don't lazy-load if the content has already been run through previously
		if ( false !== strpos( $content, 'data-lazy-src' ) )
			return $content;

		// In case you want to change the placeholder image
		$placeholder_image = apply_filters( 'lazyload_images_placeholder_image', self::get_url( 'images/1x1.trans.gif' ) );

		// This is a pretty simple regex, but it works
		$content = preg_replace( '#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#', sprintf( '<img${1}src="%s" data-lazy-src="${2}"${3}><noscript><img${1}src="${2}"${3}></noscript>', $placeholder_image ), $content );

		return $content;
	}

	function get_url( $path = '' ) {
		return plugins_url( ltrim( $path, '/' ), __FILE__ );
	}
}

function lazyload_images_add_placeholders( $content ) {
	LazyLoad_Images::add_image_placeholders( $content );
}

LazyLoad_Images::init();

endif;
