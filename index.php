<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<h1>School Directory</h1>
<?php
include 'lib/php/class.php';

$get_heading = TRUE;
$discard_heading = TRUE;
//ini_set('auto_detect_line_endings', TRUE);

// Load column headings
csv::get("headings", "csv/hd2013names.csv", 5);

$get_heading = TRUE;
$discard_heading = TRUE;

// Load data
csv::get("records", "csv/hd2013.csv");
$query=$_GET['school'];

if( !$query ){
  actions::printLinks();
} else {
  $result = $records[$query];
  actions::displayRecord( $result );
}
 
?>

</body>
</html>
