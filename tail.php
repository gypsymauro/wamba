<?php include('header.php'); ?>


<center>
<form action="" method="POST">
<select name="log">

<?php


$options = array( 'connections.log', 'log.audit', 'log.smbd' );

$output = '';
for( $i=0; $i<count($options); $i++ ) {
  $output .= '<option ' 
             . ( $_POST['log'] == $options[$i] ? 'selected="selected"' : '' ) . '>' 
             . $options[$i] 
             . '</option>';
}

print $output;
?>


</select>

<input type="submit" />
</form>

<?php

$logfile = "/var/log/samba/" . $options[0];


if (isset($_POST['log'])){

   $logfile = "/var/log/samba/" . $_POST['log'];
   
}

echo '<h1>';
echo $logfile;
echo '</h1></center>';
echo '<hr />';

$numlines = "50";
$cmd = "tail -$numlines '$logfile'";

$output = shell_exec($cmd);

echo str_replace(PHP_EOL, '<br />', $output); 

?>

<?php include('footer.php'); ?>