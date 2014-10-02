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
//if( ($handle = fopen("csv/hd2013names.csv", "r")) !== FALSE ) {
  
if( $handle = actions::openCSV("csv/hd2013names.csv") ) {
  while( ($row = fgetcsv($handle, 1000, ",")) != FALSE) {
    if( $get_heading ) {
      if( $discard_heading ) {
        // Do nothing. Skip this iteration.
      } else {
        $column_heading = $row;
        $get_heading = FALSE;
      } // end if-else
      $get_heading = FALSE;
    } else {
      $nice_column_heading[] = $row[5];
    } // end if-else
  } // end while
  fclose( $handle );
} // end if

$get_heading = TRUE;
$discard_heading = TRUE;

// Load data
if( ($handle = fopen("csv/hd2013.csv", "r")) !== FALSE ) {
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

foreach($records as $record) {
  echo '<a href="index.php?school=' . $record['Institution (entity) name'] . '">' . $record['Institution (entity) name'] . '</a>' . '<br>';
}

if($_GET['school']) {
  $result = $records[$_GET['school']];

  echo '<table>';
  echo "<tr>";
  foreach($nice_column_heading as $nice_column) {
    echo "<th>" . $nice_column . "</th>";
  }
  echo "</tr>";

  echo "<tr>";
  foreach( $result as $key => $value ) {
    echo "<td>" . $value . "</td>";
  }
  echo "</tr>";
  echo "</table>";
}
 


?>

</body>
</html>
