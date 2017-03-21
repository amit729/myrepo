<?php
define (‘dbuser’,’id823695_datta_mane’);
define (‘dbpw’,’dattamane123’);
define (‘dbhost’,’localhost’);
define (‘dbname’,’id823695_mcollector');
$dbc = mysqli_connect(“localhost”, “id823695_datta_mane”, “dattamane123”, “id823695_mcollector”);
if(!$dbc) {
die(“DATABASE CONNECTION FAILED:” .mysqli_error($dbc));
exit();
}
$dbs = mysqli_select_db($dbc, id823695_mcollector);
if(!$dbs) {
die(“DATABASE SELECTION FAILED:” .mysqli_error($dbc));
exit();
}
$customer_name = mysqli_real_escape_string($dbc, $_GET[‘customer_name’]);
$opening_balance = mysqli_real_escape_string($dbc, $_GET['$opening_balance']);
$collected = mysqli_real_escape_string($dbc, $_GET[’collected’]);
$remaining_balance = mysqli_real_escape_string($dbc, $_GET[’remaining_balance’]);
$query = “INSERT INTO id823695_mcollector (customer_name, opening_balance, collected, remaining_balance) VALUES (‘$customer_name, ‘$opening_balance’, ‘$collected’,'$remaining_balance')”;
if(mysqli_query($dbc, $query)){
echo “Records added successfully.”;
} else{
echo “ERROR: Could not able to execute $query. ” . mysqli_error($dbc);
}
mysqli_close($dbc);
?>