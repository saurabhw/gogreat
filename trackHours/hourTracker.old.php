<html>
	<head>
		<title>company time tracking software</title>
	</head>
	<body>
<?php

$users = array(
	'Ashley',
	'Dave',
	'Jim',
	'Ralph',
	'Jessica',
	'Mary'
);

$passwords = array(
	'1234',
	'password',
	'12345',
	'12345678',
	'test',
	'admin'
);

for($i=0;$i<6;++$i) {
	if($_POST['username'] == $users[$i]) {
		if($_POST['password'] == $passwords[$i]) {
			goto authenticated;
		}
	}
}

?>

please log in<br/><form action='hourTracker.php' method='post'>Username: <input type='text' name='username'>Password: <input type='password' name='password'><input type='submit'><br/></form>

<?php

goto stop;

authenticated:

$dbString = file_get_contents('hours.db');
$db = json_decode($dbString, true);

if($_POST['Sunday'] != $db[$_POST['username']]['Sunday']) $db[$_POST['username']]['Sunday'] = $_POST['Sunday'];
if($_POST['Monday'] != $db[$_POST['username']]['Monday']) $db[$_POST['username']]['Monday'] = $_POST['Monday'];
if($_POST['Tuesday'] != $db[$_POST['username']]['Tuesday']) $db[$_POST['username']]['Tuesday'] = $_POST['Tuesday'];
if($_POST['Wednesday'] != $db[$_POST['username']]['Wednesday']) $db[$_POST['username']]['Wednesday'] = $_POST['Wednesday'];
if($_POST['Thursday'] != $db[$_POST['username']]['Thursday']) $db[$_POST['username']]['Thursday'] = $_POST['Thursday'];
if($_POST['Friday'] != $db[$_POST['username']]['Friday']) $db[$_POST['username']]['Friday'] = $_POST['Friday'];
if($_POST['Saturday'] != $db[$_POST['username']]['Saturday']) $db[$_POST['username']]['Saturday'] = $_POST['Saturday'];

$myHours = $db[$_POST['username']];

?>

Please enter this weeks' hours:
<form action="hourTracker.php" method="post">
	<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
	<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
	Sunday: <input type="text" name="Sunday" value="<?php echo $myHours['Sunday']; ?>">
	Monday: <input type="text" name="Monday" value="<?php echo $myHours['Monday']; ?>">
	Tuesday: <input type="text" name="Tuesday" value="<?php echo $myHours['Tuesday']; ?>">
	Wednesday: <input type="text" name="Wednesday" value="<?php echo $myHours['Wednesday']; ?>">
	Thursday: <input type="text" name="Thursday" value="<?php echo $myHours['Thursday']; ?>">
	Friday: <input type="text" name="Friday" value="<?php echo $myHours['Friday']; ?>">
	Saturday: <input type="text" name="Saturday" value="<?php echo $myHours['Saturday']; ?>">
	<input type="submit">
</form>

<?php

$dbString = json_encode($db);
file_put_contents('hours.db', $dbString);

stop:

echo 'program is complete";

?>
	</body>
</html>