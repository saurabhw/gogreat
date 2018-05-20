<?php
/*
|
|Auto load file for load the necessary
|files & classes
|
*/
session_start(); // session start
ob_start();
ini_set('display_errors', '0'); // errors reporting on
error_reporting(E_ALL); // all errors
require_once('functions.php');
require_once('connection.inc.php');
require_once('imageFunctions.inc.php');
$link = connectTo();