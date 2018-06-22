<?php

class Employee extends Person implements ISelfRank {

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

      $this->createEmail();
    }
    //Function to set email
    function createEmail() {
       $this->email= strtolower($this->firstName).'.'.strtolower($this->lastName).'@csis3280.net';
    }

    //The function Returns the position of where the term exists
    //relative to the beginning of the partial search string (independent of offset).
    public function partialMatch($field, $partialSearches){
      foreach($partialSearches as $term){
        if(strpos($field,$term)!==false){
          return true;
        }
      }
      return false;
    }


    public function selfRank($searchTerm){
      $rank=0;
      $instReflector= new ReflectionClass('Employee');
      $emailProp=strtolower($instReflector->getProperties()[0]->getValue($this));
      $phoneProp = strtolower($instReflector->getProperties()[1]->getValue($this));
      $firstNameProp = strtolower($instReflector->getProperties()[5]->getValue($this));
      $lastNameProp = strtolower($instReflector->getProperties()[6]->getValue($this));
      $jobTitle = strtolower($instReflector->getProperties()[2]->getValue($this));
      $departmentProp = strtolower($instReflector->getProperties()[3]->getValue($this));
      $searchTerm = strtolower($searchTerm);
      $partialSeachTerms=explode(' ',$searchTerm);
      if(strcmp($emailProp,$searchTerm) === 0){
        $rank=18;
      }elseif(strcmp($phoneProp,$searchTerm) === 0){
        $rank=17;
      }elseif(strcmp($firstNameProp,$searchTerm) === 0){
        $rank=16;
      }elseif(strcmp($lastNameProp,$searchTerm) === 0){
        $rank=15;
      }elseif(strcmp($jobTitle,$searchTerm) === 0){
        $rank=14;
      }elseif(strcmp($departmentProp,$searchTerm) === 0){
        $rank=13;
      }elseif(strpos($emailProp,$searchTerm) !== false){
        $rank=12;
      }elseif(strpos($phoneProp,$searchTerm) !== false){
        $rank=11;
      }elseif(strpos($firstNameProp,$searchTerm) !== false){
        $rank=10;
      }elseif(strpos($lastNameProp,$searchTerm) !== false){
        $rank=9;
      }elseif(strpos($jobTitle,$searchTerm) !== false){
        $rank=8;
      }elseif(strpos($departmentProp,$searchTerm) !== false){
        $rank=7;
      }elseif($this->partialMatch($emailProp,$partialSeachTerms) !== false){
        $rank=6;
      }elseif ($this->partialMatch($phoneProp,$partialSeachTerms) !== false){
        $rank=5;
      }elseif ($this->partialMatch($firstNameProp,$partialSeachTerms)!== false){
        $rank=4;
      }elseif ($this->partialMatch($lastNameProp,$partialSeachTerms) !== false){
        $rank=3;
      }elseif ($this->partialMatch($jobTitle,$partialSeachTerms) !== false){
        $rank=2;
      }elseif ($this->partialMatch($departmentProp,$partialSeachTerms) !== false){
        $rank=1;
      }else{
        $rank=0;
      }

      // If Matches are identical ranking uses this priority
      // i. Email = 18
      // ii. Phone Number = 17
      // iii. First Name = 16
      // iv. Last Name = 15
      // v. Job Title = 14
      // vi. Department = 13

      // If Matches have the same charcters in the same positon
      // i. Email = 12
      // ii. Phone Number = 11
      // iii. First Name = 10
      // iv. Last Name = 9
      // v. Job Title = 8
      // vi. Department = 7

      //Partial matches(cointains the same character, Regardless of position)
      // i. Email = 6
      // ii. Phone Number = 5
      // iii. First Name = 4
      // iv. Last Name = 3
      // v. Job Title = 2
      // vi. Department = 1

      //No match = 0

      $this->searchRank = $rank;
    }

}
