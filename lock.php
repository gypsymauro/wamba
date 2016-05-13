<?php include('header.php'); ?>

<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>

<script type="text/javascript" id="js">

$(document).ready(function() 
    {

        $("#locks").tablesorter({
	sortList: [[7,0]],
	widgets: ['zebra'],
	}); 
    } 
); 
    
</script>

<?php

$SKIP=3; // numero di righe di intestazione da saltare
exec("sudo /usr/bin/smbstatus -L",$log);

$num = sizeof($log) - $SKIP -2; 
echo "#: <b>"  . $num  . "</b>";

echo '<table id="locks" class="tablesorter">';
echo '<thead>';
echo '<tr>';
echo "<th>pid</th><th>uid</th><th>denymode</th><th>access</th><th>RW</th><th>oplock</th><th>share</th><th>file</th><th>time</th>";
echo '</th>';
echo '<tbody>';
for($i=$SKIP;$i<sizeof($log)-1;$i++)
{



        list( $pid, $uid, $denymode, $access, $rw, $oplock, $share ) = preg_split('/\s+/', $log[$i]);

	$foo = substr($log[$i],99);
	list( $file, $time)  = preg_split('/\s\s+/', $foo );
	echo "<tr>";
	echo "<td>" . $pid . "</td>";
	echo "<td>" . $uid . "</td>";
	echo "<td>" . $denymode . "</td>";
	echo "<td>" . $access . "</td>";
	echo "<td>" . $rw . "</td>";
	echo "<td>" . $oplock . "</td>";
	echo "<td>" . $share . "</td>";
	echo "<td>" . $file . "</td>";
	echo "<td>" . $time . "</td>";		
	echo "</tr>";
}

echo '</tbody>';
echo "</table>\n";

 
?>

<?php include('footer.php'); ?>




