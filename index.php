<html>
<head>
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="js/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />

<script type="text/javascript" id="js">

$(document).ready(function() 
    {

$.tablesorter.addWidget({ 
    // give the widget a id 
    id: "repeatHeaders", 
    // format is called when the on init and when a sorting has finished 
    format: function(table) { 
        // cache and collect all TH headers 
        if(!this.headers) { 
            var h = this.headers = [];  
            $("thead th",table).each(function() { 
                h.push( 
                    "" + $(this).text() + "" 
                ); 
                 
            }); 
        } 
         
        // remove appended headers by classname. 
        $("tr.repated-header",table).remove(); 
         
        // loop all tr elements and insert a copy of the "headers"     
        for(var i=0; i < table.tBodies[0].rows.length; i++) { 
            // insert a copy of the table head every 10th row 
            if((i%5) == 4) { 
                $("tbody tr:eq(" + i + ")",table).before( 
                    $("").html(this.headers.join("")) 
                 
                );     
            } 
        } 
    } 
});

        $("#users").tablesorter({
	sortList: [[0,0]],
	widgets: ['zebra', 'repeatHeaders'],
	}); 
    } 
); 
    
</script>
</head>

<body>
<?php

$SKIP=4; // numero di righe di intestazione da saltare
exec("sudo /usr/bin/smbstatus -b",$log);

$num = sizeof($log) - $SKIP; 
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
</body>
</html>
