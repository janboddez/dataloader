<?php
/**
 * Plugin Name:       DataLoader
 * Description:       Load YAML data and pass it through a template.
 * Plugin URI:        https://jan.boddez.net/wordpress
 * Author:            Jan Boddez
 * Author URI:        https://jan.boddez.net/
 * License:           GNU General Public License v3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       indieblocks
 * Version:           0.1.0
 *
 * @author  Jan Boddez <jan@janboddez.be>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @package DataLoader
 */

namespace DataLoader;

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load dependencies.
require_once __DIR__ . '/build/vendor/scoper-autoload.php';

$dataloader = DataLoader::register();
