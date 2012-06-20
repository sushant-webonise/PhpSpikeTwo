<?php

session_start();
require_once('nocsrf.php');

 try
{
// Run CSRF check, on POST data, in exception mode, with a validity of 10 minutes, in one-time mode.
        NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
    echo "No CSRF Attck";     
}
catch ( Exception $e )
{
 echo "CSRF attack detected";
}

?>
