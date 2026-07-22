<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$zip = new ZipArchive;
if ($zip->open('acf.zip') === TRUE) {
    if ($zip->extractTo('./wp-content/plugins/')) {
        echo 'Successfully extracted ACF!<br>';
    } else {
        echo 'Extraction failed.<br>';
    }
    $zip->close();
    unlink('acf.zip');
    unlink(__FILE__);
} else {
    echo 'Extraction failed.';
}

require_once('wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (activate_plugin('advanced-custom-fields/acf.php')) {
    echo "Activated ACF.<br>";
} else {
    echo "Failed to activate ACF.<br>";
}
?>
