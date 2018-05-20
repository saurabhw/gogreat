<?php
      session_start();

       if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
         require_once("../includes/connection.inc.php");
       //include('../includes/lazy_mofo.php');
       $link = connectTo();
       $user = $_SESSION['userId'];
       $userName = $_SESSION['email'];
       $query1 = "SELECT * FROM Dealers WHERE email='$userName'";
       $result1 = mysqli_query($link, $query1)or die("MySQL ERROR query 1: ".mysqli_error($link));
       $row1 = mysqli_fetch_assoc($result1);
       $dealerID = $row1['loginid'];
       $group = $row1['setuppersonid'];
       $myPic = $row1['contact_pic']; 
/*
	-- sample sql script to populate database for demo

	create table if not exists country
	( country_id int unsigned not null auto_increment primary key
	, country_name varchar(255)
	) character set utf8 collate utf8_general_ci;

	insert into country(country_name) values ('Canada'), ('United States'), ('Mexico');

	create table if not exists market
	( market_id int unsigned not null auto_increment primary key
	, market_name varchar(255)
	, photo varchar(255)
	, contact_email varchar(255)
	, country_id int unsigned
	, is_active tinyint(1)
	, create_date date
	, notes text
	) character set utf8 collate utf8_general_ci;

	insert into market(market_name, contact_email, country_id, is_active, create_date, notes) values 
	('Great North', 'jane@superco.com', 1, 1, now(), 'nothing new'),
	('The Middle', 'sue@superco.com', 2, null, '2001-01-01', 'these are notes'),
	('Latin Market', 'john@superco.com', 1, 1, '1999-10-31', 'expanding soon');

	create table if not exists sub_market
	( sub_market_id int unsigned not null auto_increment primary key
	, market_id int unsigned
	, sub_market_name varchar(255)
	, photo varchar(255)
	) character set utf8 collate utf8_general_ci;
	
	insert into sub_market(market_id, sub_market_name) values 
	(1, 'Sample a'),
	(1, 'Sample b'),
	(1, 'Sample c'),
	(2, 'Sample d'),
	(2, 'Sample e'),
	(2, 'Sample f');


*/

// speed things up with gzip, ob_start() required for csv downloads
if(!ob_start('ob_gzhandler'))
	ob_start();

header('Content-Type: text/html; charset=utf-8');

include('../includes/lazy_mofo.php');


echo "
<html>
<head>
	<meta charset='UTF-8' />
	<link rel='stylesheet' type='text/css' href='style.css'  />
</head>
<body>
"; 


// enter your database host, name, username, and password
$db_host = 'localhost';
$db_name = 'amoodf5_gm2012';
$db_user = 'amoodf5_ryan';
$db_pass = 'nb]]mFg2ZU.n';


// connect with pdo 
try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_user, $db_pass);
}
catch(PDOException $e) {
	die('pdo connection error: ' . $e->getMessage());
}


// create LM object, pass in PDO connection
$lm = new lazy_mofo($dbh); 


// table name for updates, inserts and deletes
$lm->table = 'orgCustomers';


// identity / primary key for table
$lm->identity_name = 'customerID';


// optional, define grid sort order
$lm->grid_default_order_by = 'first';


// optional, make friendly names for fields
$lm->rename = array('Dealer' => 'Account');


// optional, define input controls on the form
//$lm->form_input_control = array('photo' => '--image', 'is_active' => '--checkbox', 'country_id' => 'select //country_id, country_name from country; --select');


// optional, define editable input controls on the grid
$lm->grid_input_control = array('is_active' => '--checkbox');


// optional, define output control on the grid; make email clickable and the photo a clickable link
$lm->grid_output_control = array('contact_email' => '--email', 'photo' => '--image');


// optional, query for grid(). if the last column selected is the primary key identity, then the [edit] and [delete] links are displayed
$lm->grid_sql = "select * from orgCustomers WHERE fundMemberID='$user'";


// optional, define what is displayed on edit form
$lm->form_sql = "select * from orgCustomers WHERE fundMemberID='$user'";
$lm->form_sql_param = array(':loginid' => intval(@$_REQUEST['loginid']));


// optional, display a related table under the edit record form
$lm->child_title = 'orgMembers';
$lm->child_table = 'orgContacts';
$lm->child_identity_name = 'sub_market_id';
$lm->child_parent_identity_name = 'market_id';
$lm->child_input_control = array('photo' => '--image');

// use the lm controller
$lm->run();


echo "</body></html>";
