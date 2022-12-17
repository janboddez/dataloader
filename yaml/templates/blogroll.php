<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $data ) || ! is_array( $data ) ) {
	// Do nothing.
	return;
}
?>
<ul>
	<?php foreach ( $data as $item ) : ?>
		<li><a target="_blank" href="<?php echo esc_url( $item['link'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a> (<a href="<?php echo esc_url( $item['rss'] ); ?>">RSS feed</a>)</li>
	<?php endforeach; ?>
</ul>
