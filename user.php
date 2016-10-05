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

   $log='';
   $cmd = "sudo /usr/bin/wbinfo --user-groups  " . $username;
   exec( $cmd ,$log);
  
   $gids = $log;
   
   print('<b>USERNAME: </b>' . $username);
   print('<br />');
   print('<b>SID: </b>' . $sid);
   print('<br />');
   print('<b>UID: </b>' . $uid);
   print('<br />');
   
   print('<b>GROUPS: </b>' );
   foreach ($gids as &$gid) {

    $log = '';
    $cmd = "sudo /usr/bin/wbinfo  --gid-info " . $gid;
    exec( $cmd ,$log);
    $group_name =  explode(":", $log[0])[0];
    print ($gid . ' [' . $group_name . ']');
    print(', ');
    }
  
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
