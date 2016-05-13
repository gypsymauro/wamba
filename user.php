<?php include('header.php'); ?>

<?php


   $username=$_GET["username"];
     
   $cmd = "sudo /usr/bin/smbstatus -u " . $username;

   exec( $cmd ,$log);

   echo '<pre>';

   for($i=0;$i<sizeof($log);$i++){
	print $log[$i] . PHP_EOL;
   }

echo '</pre>';

 ?>

<?php include('footer.php'); ?>
