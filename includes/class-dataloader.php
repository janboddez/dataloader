<?php

namespace DataLoader;

use DataLoader\Symfony\Component\Yaml\Yaml;

class DataLoader {
	public static function register() {
		add_shortcode( 'dataloader', array( __CLASS__, 'render' ) );
	}

	public static function render( $atts = array(), $content = null, $tag = '' ) {
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

		if ( empty( $atts['file'] ) || empty( $atts['tpl'] ) ) {
			return;
		}

		// Strip path info off provided file names.
		$file     = basename( $atts['file'] );
		$template = basename( $atts['tpl'] );

		// YAML oughta be in `wp-content/uploads/yaml` and templates in `wp-content/uploads/yaml/templates`.
		// It's up to you to create/protect these folders if needed.

		$upload_dir = wp_upload_dir();
		$dir        = trailingslashit( trailingslashit( $upload_dir['basedir'] ) . 'yaml' );

		if ( 0 !== strcmp( realpath( $dir ), dirname( realpath( $dir . $file ) ) ) ) {
			// A rather unexpected data location. This should never happen.
			return;
		}

		$tpl_dir = trailingslashit( $dir . 'templates' );

		if ( 0 !== strcmp( realpath( $tpl_dir ), dirname( realpath( $tpl_dir . $template ) ) ) ) {
			// A rather unexpected template location. This should never happen.
			return;
		}

		if ( ! is_file( $dir . $file ) || ! is_file( $tpl_dir . $template ) ) {
			return;
		}

		try {
			$data = Yaml::parseFile( $dir . $file );
		} catch ( \Exception $e ) {
			// Oops. Allow template to handle this (or empty data).
		}

		ob_start();
		require $tpl_dir . $template;

		return ob_get_clean();
	}
}
