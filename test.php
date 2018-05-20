<?php

$num = 7;

echo $num + 7; echo "<br />7 + 7<br /><br />";

echo $num - 7; echo "<br />7 - 7<br /><br />";

echo $num * 7; echo "<br />7 x 7<br /><br />";

echo $num / 7; echo "<br />7 / 7<br /><br />";

echo $num % 2; echo "<br />7 % 2<br /><br />";

echo ++ $num; echo "<br />++ 7<br /><br />";

echo -- $num; echo "<br />-- 7<br /><br />";

$author = "inashosetai";

$text = <<<_bio
$author

There is much to say.
$author doesn't do much.
_bio;

echo $text

?>