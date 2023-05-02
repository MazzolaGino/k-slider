<?php
/**
 * Plugin Name: k-slider
 * Description: k-slider
 * Version: 0.0.1
 * Author: 
 * Author URI: 
 */

$autoloaderFile = __DIR__ . '/../k-module/vendor/autoload.php';

define('KSlider_WP_PLUGIN_DIR', WP_PLUGIN_DIR.'/k-slider/src/');
define('KSlider_WP_PLUGIN_URL', WP_PLUGIN_URL.'/k-slider/src/');


if (file_exists($autoloaderFile)) {
    require_once ($autoloaderFile);
}

(new \KLib\AppBuilder(KSlider_WP_PLUGIN_DIR, KSlider_WP_PLUGIN_URL))->getApp()->on();


