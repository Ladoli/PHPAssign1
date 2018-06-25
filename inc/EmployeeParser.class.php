<?php

class EmployeeParser {

//We made this static since the logic is similiar to FileAgent, it just does one thing anyhow.
//Divides the data, goes through each row and trims the data then uses the data to create an Employee object to represent each row.
//Adds employee to an organization and finally returns the organization with all the employees.
 static function parseData($fileData) {
    $org = new Organization();
    $lines = explode("\n", $fileData);

    for ($x = 1; $x < count($lines); $x++) {
      $columns = explode(",", $lines[$x]);
      if (count($columns) != 7) {
        die("There is insufficient information to create the search engine.");
      }
      for($y = 0; $y < count($columns); $y++) {
        $columns[$y] = trim($columns[$y]);
      }

      $emp = new Employee($columns[0], $columns[1], $columns[4], $columns[5], $columns[6]);
      $org->addEmployee($emp);
    }

      return $org;
  }
}

?>
