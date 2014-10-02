<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<?php
include 'lib/php/class.php';

ini_set('display_startup_erros',1);
ini_set('display_errors',1);
error_reporting(-1);

$get_heading = TRUE;
$discard_heading = TRUE;
ini_set('auto_detect_line_endings', TRUE);

// Load column headings
  
/*if( $handle = csv::open("csv/hd2013names.csv") ) {
  while( ($row = fgetcsv($handle, 1000, ",")) != FALSE) {
    if( $get_heading ) {
      if( !$discard_heading ) {
        $column_heading = $row;
        $get_heading = FALSE;
      } // end if
      $get_heading = FALSE;
    } else {
      $nice_column_heading[] = $row[5];
    } // end if-else
  } // end while
  fclose( $handle );
} // end if
*/
csv::get("headings", "csv/hd2013names.csv", 5);

$get_heading = TRUE;
$discard_heading = TRUE;

/*
// Load data
if( ($handle = csv::open("csv/hd2013.csv") ) !== FALSE ) {
  while( ($row = fgetcsv($handle, 1000, ",")) != FALSE) {
    if( $get_heading ) {
      $column_heading = $row;
      $get_heading = FALSE;
    } else {
      $record = array_combine($nice_column_heading, $row);
      $records[$record['Institution (entity) name']] = $record;
    } // end if-else
  } // end while
  
  fclose( $handle );
} // end if 
*/
csv::get("records", "csv/hd2013.csv");
foreach($records as $record) {
  echo '<a href="index.php?school=' . $record['Institution (entity) name'] . '">' . $record['Institution (entity) name'] . '</a>' . '<br>';
}

$query=$_GET['school'];

if( $query ) {
  $result = $records[$query];
  actions::displayRecord( $result );
}
 
?>

</body>
</html>
