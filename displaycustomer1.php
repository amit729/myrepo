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

$result = mysqli_query($dbc, "SHOW COLUMNS FROM collector");
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows > 0) {

/* By changing Fred below to another specific persons name you can limit access to just the part of the database for that individual. You could eliminate WHERE recorder_id='Fred' all together if you want to give full access to everyone. */

$values = mysqli_query($dbc, "SELECT * FROM collector1");
while ($row = mysqli_fetch_row($values)) {
 for ($j=0;$j<$numberOfRows;$j++) {
  $csv_output .= $row[$j].", ";
 }
 $csv_output .= "\n";
}

}

print $csv_output;
exit;
?>







