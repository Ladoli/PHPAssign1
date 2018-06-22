<?php

class EmployeeParser {

    //The team tha the Team parser will use
    // private $org = null;

//I changed the constructor to a normal function so the getResults() method was commented out.
//Whoever is looking at this can uncomment the var_dump to check the output
 function parseData($fileData) {

    $org = new EmployeeList();
    //spliting the file into lines
    $lines = explode("\n", $fileData);

    //iterate through the lines
    for ($x = 1; $x < count($lines); $x++) {
      $columns = explode(",", $lines[$x]);
      if (count($columns) != 7) {
        die("There is insufficient information to create the search engine.");
      }
      // var_dump($columns);

      for($y = 0; $y < count($columns); $y++) {
        $columns[$y] = trim($columns[$y]);
      }

      $emp = new Employee($columns[0], $columns[1], $columns[4], $columns[5], $columns[6]);
      $org->addEmployee($emp);
      // var_dump($emp);
    }

      return $org;
  }

  // function getResults() {
  //   return $this->org;
  // }

  // function createEmail($firstN, $lastN) {
  //   return strtolower($firstN).'.'.strtolower($lastN).'@csis3280.net';
  // }

}


//Code below is how I implemented parsing Lab 5, whoever works on this, feel free to rewrite

   // $team = $fileData->originFileName;
   // $temp = explode('.', $team);
   // $team = $temp[0];
   // $team= ucfirst($team);
   // $data = $fileData->data;
   //
   // $this->team = new Team($team);
   //
   // $dataRows = explode("\n",$data);
   //
   // $dataLength = count($dataRows);
   //
   // for($i = 1; $i < $dataLength; $i++){ //1 to ignore the header
   //   $this->team->addPlayer($dataRows[$i]);
   // }

?>
