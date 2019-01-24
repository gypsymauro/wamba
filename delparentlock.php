<?php include('header.php'); ?>

<?php

   $username=$_GET["username"];

   $cmd = 'sudo /usr/bin/find /mnt/SRV011-HOME/home/' . $username . ' -name "parent.lock" ';

   print($cmd);
   exec( $cmd ,$log);

   print_r($log);
   foreach ($log as &$row) {
	$cmd = 'sudo rm ' . $row;
        exec( $cmd ,$log1);
    }
  

 ?>

<?php include('footer.php'); ?>
