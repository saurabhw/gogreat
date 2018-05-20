<?php
// This life is used to dynamically set the title of each web page that uses it.
// Get the name of the file and strip the .php extension
$title = ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php'));
?>
