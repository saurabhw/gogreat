<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$_SESSION['id'] = $id;
} else if (isset($_GET['id']) && empty($_GET['id'])) {
	$id = "";
	unset($_SESSION['id']);
} else if (!isset($_GET['id']) && empty($_GET['id'])) {
	$id = "";
	unset($_SESSION['id']);
} else if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	$id = $_SESSION['id'];
} else if (isset($_POST['id']) && !empty($_POST['id'])) {
	$id = $_POST['id'];
	$_SESSION['id'] = $id;
} else if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
	$id=$_SESSION['username'];
	$_SESSION['id'] = $id;
} else {
	$id = '';
}
?>