<?php

//error_reporting(0);

/*if(get_magic_quotes_gpc())
	echo "Magic quotes are enabled";
else
	echo "Magic quotes are disabled";
*/
$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db = mysql_select_db('users', $con);


$sql="INSERT INTO comments VALUES ('$_POST[comment]');";


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
//echo "1 record added";


$result = mysql_query("SELECT * FROM comments");



while($row = mysql_fetch_array($result))
  {
  echo $row['cmt'];
  echo "<br />";
  //echo htmlspecialchars($row['cmt'], ENT_QUOTES, 'UTF-8');
  echo "<br />";
  }

mysql_close($con);

?>