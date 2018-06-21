<?php

class Employee implements ISelfRank {

    public $firstName = "";
    public $lastName = "";
    public $email = '';
    public $phone = "";
    public $jobTitle = "";
    public $department = "";
    public $searchRank = 0;



    //constructor
    function __construct($fN, $lN, $ph, $j, $d) {
      $this->firstName = $fN;
      $this->lastName = $lN;
      $this->phone = $ph;
      $this->jobTitle = $j;
      $this->department = $d;
    }
    //Function to set email 
    function createEmail($fN, $lN) {
       return strtolower($fN).'.'.strtolower($lN).'@csis3280.net';
    }

    //The function below should be used to rank the employee based on
    public function selfRank($term){

      $searchRank = 0;

      //Insert logic to rank employees, MUST use reflectionclass
      $instReflector = new ReflectionClass('Employee');
      foreach ($instReflector->getProperties() as $property) {
      return $property->getName().":".$property->getValue($emp);
    }


      //Matches ranking uses this priority
      // i. Email = 12
      // ii. Phone Number = 11
      // iii. First Name = 10
      // iv. Last Name = 9
      // v. Job Title = 8
      // vi. Department = 7

      //Partial matches
      // i. Email = 6
      // ii. Phone Number = 5
      // iii. First Name = 4
      // iv. Last Name = 3
      // v. Job Title = 2
      // vi. Department = 1

      $this->rank = $searchRank;
    }

}
