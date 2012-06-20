<?php

//error_reporting(0);

/*session_start();
require_once('nocsrf.php');
$this->token = NoCSRF::generate('csrf_token');

 try
{
// Run CSRF check, on POST data, in exception mode, with a validity of 10 minutes, in one-time mode.
                    NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                 
}
catch ( Exception $e )
{
 echo "CSRF attack detected";
}
*/

// disable magic quotes
if(get_magic_quotes_gpc()) {
      $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
      while(list($key, $val) = each($process)) {
            foreach($val as $k => $v) {
                  unset($process[$key][$k]);
                  if(is_array($v)) {
                        $process[$key][stripslashes($k)] = $v;
                        $process[] = &$process[$key][stripslashes($k)];
                  } else {
                        $process[$key][stripslashes($k)]=stripslashes($v);
                  }
            }
      }
      unset($process);
}

$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db = mysql_select_db('users', $con);

//echo $db;
//$comment = $_POST['comment'];


$key = 'password to (en/de)crypt';
$string =  $_POST['pass']; 
 
$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");



$sql="INSERT INTO sign_up VALUES('$_POST[name]','$_POST[email]','$encrypted');";


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
//echo "1 record added";


$result = mysql_query("SELECT * FROM sign_up");



while($row = mysql_fetch_array($result))
  {
  	echo $row['name'] . " " .$row['email']. " " .$row['password'];
  //echo htmlspecialchars($row['cmt'], ENT_QUOTES, 'UTF-8');
  echo "<br />";
  }

mysql_close($con);

?>