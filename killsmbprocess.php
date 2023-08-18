<?php include('header.php'); ?>

<?php

   $pid=$_GET["pid"];

   $cmd = 'sudo /bin/kill -9 ' . $pid ;

   exec( $cmd ,$log);

   echo("Process killed: PID " . $pid);

 ?>

<?php include('footer.php'); ?>
