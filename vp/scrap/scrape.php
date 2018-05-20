<?
include 'connection.inc.php';
$link = connectTo();
$url="http://emaillist.net/search.php";
$text=file_get_contents($url);
$res = preg_match_all(
"/[a-z0-9]+[_a-z0-9.-]*[a-z0-9]+@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})/i",
$text,
$matches
);
if ($res) {
foreach(array_unique($matches[0]) as $email) {
//echo $email . "<br />";
  $sql = "INSERT INTO emaillist(emailadd) VALUES('$email')";
  $result = mysqli_query($link, $sql)or die("MySQL ERROR: on query 4 ".mysqli_error($link));
}
}
else {
echo "No emailsq found.";
}
?>