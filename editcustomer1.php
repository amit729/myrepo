<?php 
define ('dbuser','a18c80_mcol');
define ('dbpw','London@7489');
define ('dbhost','MYSQL5018.HostBuddy.com');
define ('dbname','db_a18c80_mcol');

$dbc = mysqli_connect("MYSQL5018.HostBuddy.com","a18c80_mcol","London@7489");
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, "db_a18c80_mcol");
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}

$first_name = mysqli_real_escape_string($dbc, $_GET['first_name']);
$last_name = mysqli_real_escape_string($dbc, $_GET['last_name']);
$opening_balance = mysqli_real_escape_string($dbc,$_GET['opening_balance']);
$givendate = mysqli_real_escape_string($dbc,$_GET['givendate']);
$collected = mysqli_real_escape_string($dbc,$_GET['collected']);
$collecteddate = mysqli_real_escape_string($dbc,$_GET['collecteddate']);
$remaining_balance=($opening_balance-$collected);


$query = "UPDATE collector1 SET opening_balance='$opening_balance',givendate='$givendate', collected='$collected', collecteddate='$collecteddate',remaining_balance='$remaining_balance'  WHERE (first_name='$first_name' and last_name='$last_name')";
$result = mysqli_query($dbc, $query) or trigger_error("Query MySQL Error: " . mysqli_error($dbc)); 

mysqli_close($dbc); 

?>























