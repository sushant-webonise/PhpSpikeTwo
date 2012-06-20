<?php

$url = "http://localhost/php_spike2/spike2.php";

if($_SERVER['HTTP_REFERER']==$url) 
{
$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db = mysql_select_db('users', $con);

$name = mysql_real_escape_string($_POST['uname']);
$pwd  = mysql_real_escape_string($_POST['pass']);

$result = mysql_query("SELECT id,password FROM login_info where id='$name' AND password='$pwd'");

//echo mysql_num_rows($result);

if(!mysql_num_rows($result)) 
{
	echo "Invalid user name or password";
}
else{
	//while($row = mysql_fetch_array($result))
  	//{
  	//echo $row['id']. " " .$row['password'];
  //echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
  	//echo "<br />";
  	
  //}
  echo "Valid User";
}
//echo $_SERVER['HTTP_HOST'];	
mysql_close($con);
}
else {
	echo "Spoofed form attack";
	}
?>