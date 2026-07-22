<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (activate_plugin('advanced-custom-fields/acf.php')) {
    echo "Activated ACF.<br>";
} else {
    echo "Failed to activate ACF.<br>";
}
unlink(__FILE__);
?>
