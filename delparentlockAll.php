<?php include('header.php'); ?>

<?php

   $cmd = 'sudo /usr/bin/find /mnt/SRV011-HOME/home -name "parent.lock" ';

   print($cmd);
   exec( $cmd ,$log);

   print_r($log);
   foreach ($log as &$row) {
	$cmd = 'sudo rm ' . $row;
        exec( $cmd ,$log1);
    }
  

 ?>

<?php include('footer.php'); ?>
