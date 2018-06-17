<?php

class Employee implements ISelfRank {

    public $firstName = "";
    public $lastName = "";
    public $phone = "";
    public $jobTitle = "";
    public $department = "";
    public $rank = 0;



    //constructor

    //Return email address

    //The function below should be used to rank the employee based on
    public function selfRank($term){

      $searchRank = 0;

      //Insert logic to rank employees


      $this->rank = $searchRank;
    }

}
