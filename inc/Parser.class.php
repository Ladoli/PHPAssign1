<?php

class SearchParser {

    //The team tha the Team parser will use
    private $searchRes= null;

    //This function will parse our cars data to an array

 function __construct($fileData){


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
 }

 function getResults() {
    return $this->$searchRes;
 }

}

?>
