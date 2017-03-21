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
$temp=mysqli_real_escape_string($dbc, $_GET['temp']);
$opening_balance = mysqli_real_escape_string($dbc,$_GET['opening_balance']);
$x=$opening_balance;
$collected1 = mysqli_real_escape_string($dbc,$_GET['collected1']);
$collecteddate1 = mysqli_real_escape_string($dbc,$_GET['collecteddate1']);
$collected2 = mysqli_real_escape_string($dbc,$_GET['collected2']);
$collecteddate2 = mysqli_real_escape_string($dbc,$_GET['collecteddate2']);
$collected3= mysqli_real_escape_string($dbc,$_GET['collected3']);
$collecteddate3 = mysqli_real_escape_string($dbc,$_GET['collecteddate3']);
$remaining_balance=(($opening_balance)-($collected1+$collected2+$collected3));


$editedby = mysqli_real_escape_string($dbc,$_GET['editedby']);

if($temp>0)
{
$opening_balance=$temp+$remaining_balance;
$remaining_balance=$remaining_balance+$temp;
}
else
{
$opening_balance = $x;
}

$query = "UPDATE collector SET opening_balance='$opening_balance', collected1='$collected1', collecteddate1='$collecteddate1',collected2='$collected2', collecteddate2='$collecteddate2',collected3='$collected3', collecteddate3='$collecteddate3',remaining_balance='$remaining_balance',editedby='$editedby'  WHERE (first_name='$first_name' and last_name='$last_name')";
$result = mysqli_query($dbc, $query) or trigger_error("Query MySQL Error: " . mysqli_error($dbc)); 

mysqli_close($dbc); 

?>

