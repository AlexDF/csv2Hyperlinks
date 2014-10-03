<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<h1>School Directory</h1>
<?php
include 'lib/php/class.php';

/*ini_set('display_startup_erros',1);
ini_set('display_errors',1);
error_reporting(-1);*/

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
  foreach($records as $record) {
    echo '<a href="index.php?school=' . $record['Institution (entity) name'] . '">' . $record['Institution (entity) name'] . '</a>' . '<br>';
  }
} else {
  $result = $records[$query];
  actions::displayRecord( $result );
}
 
?>

</body>
</html>
