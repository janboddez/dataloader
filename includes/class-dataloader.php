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

		$file     = $atts['file'];
		$template = $atts['tpl'];

		// YAML oughta be in `wp-content/uploads/yaml` and templates in `wp-content/uploads/yaml/templates`.
		// It's up to you to create/protect these folders if needed.

		$upload_dir = wp_upload_dir();
		$dir        = trailingslashit( trailingslashit( $upload_dir['basedir'] ) . 'yaml' );

		$template_path = trailingslashit( $dir . 'templates' );

		if ( ! is_file( $template_path . $template ) ) {
			return;
		}

		try {
			$file = $dir . $file;
			$data = Yaml::parseFile( $file );
		} catch ( \Exception $e ) {
			// Oops. Allow template to handle this (or empty data).
		}

		ob_start();
		require $template_path . $template;

		return ob_get_clean();
	}
}
