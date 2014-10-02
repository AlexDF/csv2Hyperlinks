<?php

class actions {

  public static function openCSV($path){
    return fopen($path, "r");
  }

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