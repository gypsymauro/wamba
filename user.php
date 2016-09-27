<?php include('header.php'); ?>

<?php

   $username=$_GET["username"];

   $cmd = "sudo /usr/bin/wbinfo --name-to-sid  " . $username;
   exec( $cmd ,$log);


   $sid = explode(" ", $log[0])[0];
//   print $sid;
   
   $cmd = "sudo /usr/bin/wbinfo --sid-to-uid  " . $sid;
   exec( $cmd ,$log);

   $uid = $log[1];
 //  print $uid;


   print('<b>USERNAME: </b>' . $username);
   print('<br />');
   print('<b>SID: </b>' . $sid);
   print('<br />');
   print('<b>UID: </b>' . $uid);
  
   $cmd = "sudo /usr/bin/smbstatus -u " . $username;

   $log='';
   exec( $cmd ,$log);

   echo '<pre>';

   for($i=0;$i<sizeof($log);$i++){
	print $log[$i] . PHP_EOL;
   }

   echo '</pre>';

 ?>

<?php include('footer.php'); ?>
