<?php
$filename = "members.csv";

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=members.csv');

readfile($filename);
?>