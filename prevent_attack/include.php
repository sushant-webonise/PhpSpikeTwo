<?php

$pr = 'engineer';
   if (isset( $_GET['profession'] ) )
  {    $pr = $_GET['profession'];
    include( $pr . '.php' );
   //echo include( $pr . '.php' );
   echo "File Included";
}
else 
echo "File Include Attack";
?>