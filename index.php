<html>
  <head>
    <title>Wamba</title>
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="js/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />
<link rel="stylesheet" href="style.css" type="text/css" id="wamba" media="print, projection, screen" />

<script type="text/javascript" id="js">

$(document).ready(function() 
    {

        $("#users").tablesorter({
	sortList: [[0,0]],
	widgets: ['zebra'],
	}); 
    } 
); 
    
</script>
</head>

<body>
<?php include('header.php'); ?>

<?php

$SKIP=4; // numero di righe di intestazione da saltare
exec("sudo /usr/bin/smbstatus -b",$log);

$num = sizeof($log) - $SKIP -2; 
echo "Totale numero utenti collegati: <b>"  . $num  . "</b>";

echo '<table id="users" class="tablesorter">';
echo '<thead>';
echo '<tr>';
echo "<th>user</th><th>client</th><th>tcp/ip</th><th>proto</th><th>pid</th>";
echo '</th>';
echo '<tbody>';
for($i=$SKIP;$i<sizeof($log);$i++)
{
        list( $pid, $user, $group, $client, $ipv, $proto) = preg_split('/\s+/', $log[$i]);

	if ( $group == 'domain_computers') {
	   continue;
	}

	echo "<tr>";
	echo '<td><a href="user.php?username=' . $user . '">' .  $user . '</a> [ <a href="vnc://' . $client . '"> vnc </a> ]</td>';

//	echo "<td>" . $group . "</td>";
	echo '<td><a href="vnc://' . $client . '">' . $client . '</a></td>';
	echo "<td>" . $ipv . "</td>";
	echo "<td>" . $proto . "</td>";
	echo "<td>" . $pid . "</td>";	
	
	echo "</tr>";
}

echo '</tbody>';
echo "</table>\n";

 
?>


<?php include('footer.php'); ?>
   
</body>
</html>
