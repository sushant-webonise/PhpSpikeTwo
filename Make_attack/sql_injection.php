<?php

$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db = mysql_select_db('users', $con);

//$name = mysql_real_escape_string($_POST['uname']);
//$pwd  = mysql_real_escape_string($_POST['pass']);

$result = mysql_query("SELECT id,password FROM login_info where id='$_POST['uname'] AND password='$_POST['pass']'");

//echo mysql_num_rows($result);

if(!mysql_num_rows($result)) 
{
	echo "Invalid user name or password";
}
else{
  echo "Valid User";
}	
mysql_close($con);

?>