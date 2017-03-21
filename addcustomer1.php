<?php
define ('dbuser','a18c80_mcol');
define ('dbpw','London@7489');
define ('dbhost','MYSQL5018.HostBuddy.com');
define ('dbname','db_a18c80_mcol');
$dbc = mysqli_connect("MYSQL5018.HostBuddy.com", "a18c80_mcol", "London@7489", "db_a18c80_mcol");
if(!$dbc) {
die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
exit();
}
$dbs = mysqli_select_db($dbc,"db_a18c80_mcol");
if(!$dbs) {
die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
exit();
}



$first_name = mysqli_real_escape_string($dbc, $_GET['first_name']);
$last_name = mysqli_real_escape_string($dbc, $_GET['last_name']);
$opening_balance = mysqli_real_escape_string($dbc,$_GET['opening_balance']);
$givendate = mysqli_real_escape_string($dbc, $_GET['givendate']);
$collected1 = mysqli_real_escape_string($dbc,$_GET['collected1']);
$collecteddate1 = mysqli_real_escape_string($dbc,$_GET['collecteddate1']);
$collected2 = mysqli_real_escape_string($dbc,$_GET['collected2']);
$collecteddate2 = mysqli_real_escape_string($dbc,$_GET['collecteddate2']);
$collected3= mysqli_real_escape_string($dbc,$_GET['collected3']);
$collecteddate3 = mysqli_real_escape_string($dbc,$_GET['collecteddate3']);
$remaining_balance=(($opening_balance)-($collected1+$collected2+$collected3));
$editedby = mysqli_real_escape_string($dbc,$_GET['editedby']);



$query = "INSERT INTO collector1(first_name,last_name, opening_balance, givendate,collected1,collecteddate1,collected2,collecteddate2,collected3,collecteddate3, remaining_balance,editedby) VALUES ('$first_name','$last_name','$opening_balance','$givendate','$collected1','$collecteddate1','$collected2','$collecteddate2','$collected3','$collecteddate3','$remaining_balance','$editedby')";
if(mysqli_query($dbc, $query)){
echo "Records added successfully.";
} else{
echo "ERROR: Could not able to execute $query. " .mysqli_error($dbc);
}
mysqli_close($dbc);
?>














