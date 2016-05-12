<html>
<head>
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="js/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />

<script type="text/javascript" id="js">

$(document).ready(function() 
    { 
        $("#users").tablesorter({
	sortList: [[0,0]]
	}); 
    } 
); 
    
</script>
</head>

<body>


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
