<?php
ini_set('display_startup_erros',1);
ini_set('display_errors',1);
error_reporting(-1);

$row_num = 0;

ini_set('auto_detect_line_endings', TRUE);

// Load column headings



// Load data
if( ($handle = fopen("csv/hd2013.csv", "r")) !== FALSE ) {
  while( ($row = fgetcsv($handle, 1000, ",")) != FALSE) {
    if( $row_num == 0 ) {
      $column_heading = $row;
      $row_num = 1;
    } else {
      $record = array_combine($column_heading, $row);
      $records[] = $record;
    } // end if-else
  } // end while
  
  fclose( $handle );
} // end if 

foreach($records as $record) {
  echo '<a href="index.php?school=' . $record['INSTNM'] . '">' . $record['INSTNM'] . '</a>' . '<br>';
}

?>