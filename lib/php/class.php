<?php

class csv {

  public static function open($path) {
    return fopen($path, "r");
  }

 public static function get($option, $filepath, $column) {
    if( $handle = self::open($filepath) ) {
      while( ($row = fgetcsv($handle, 1000, ",")) != FALSE) {
        if( $GLOBALS['get_heading'] ) {
          if( !$GLOBALS['discard_heading'] ) {
            $GLOBALS['column_heading'] = $row;
            $GLOBALS['get_heading'] = FALSE;
          } // end if
          $GLOBALS['get_heading'] = FALSE;
        } else {
          if($option == "headings"){
            $GLOBALS['nice_column_heading'][] = $row[$column];
          } else if ($option == "records"){
            $GLOBALS['record'] = array_combine($GLOBALS['nice_column_heading'], $row);
            $GLOBALS['records'][$GLOBALS['record']['Institution (entity) name']] = $GLOBALS['record'];
          }
        } // end if-else
      } // end while
      fclose( $handle );
    } // end if
  }  // end getRecords


} // end class csv

class actions {
  public static function displayRecord($record) {
    echo '<table>';
    echo "<tr>";
    foreach( $record as $key => $value ) {
      echo "<th>" . $key . "</th>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach( $record as $key => $value ) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
    echo "</table>";
  }

} // end actions class





?>