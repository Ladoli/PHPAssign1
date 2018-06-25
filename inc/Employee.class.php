<?php

class Employee extends Person implements ISelfRank {

    public $email = '';
    public $phone = "";
    public $jobTitle = "";
    public $department = "";
    public $searchRank = 0;



    //constructor
    //Sets the Employee Attributes based on the passed data and uses said data to set the email field.
    function __construct($fN, $lN, $ph, $j, $d) {
      $this->firstName = $fN;
      $this->lastName = $lN;
      $this->phone = $ph;
      $this->jobTitle = $j;
      $this->department = $d;
      $this->createEmail();

    }

    //Function to set email based on first and last name and email convention
    function createEmail() {
       $this->email= strtolower($this->firstName).'.'.strtolower($this->lastName).'@csis3280.net';
    }

    //The function Returns the position of where the term exists
    //relative to the beginning of the partial search string (independent of offset).
    //This function honestly doesn't care about the position, just that said position exists. If not, it returns false.
    public function partialMatch($field, $partialSearches){
      foreach($partialSearches as $term){
        if(strpos($field,$term)!==false){
          return true;
        }
      }
      return false;
    }

//Our selfRank loops through the properties using reflection. IF the class name matches a property we are looking for, we assign it and search these assigned properties based on rank.
//We also ranked ALL kinds of searches(...for fun), not just partial ones which is why our search system will be more complicated than other groups.

    public function selfRank($searchTerm){
      $rank=0;
      $instReflector= new ReflectionClass('Employee');
      $emailProp;
      $phoneProp;
      $firstNameProp;
      $lastNameProp;
      $jobTitleProp;
      $departmentProp;
      foreach($instReflector->getProperties() as $property){
        if($property->getName() == 'email'){
          $emailProp = strtolower($property->getValue($this));
        }elseif($property->getName() == 'phone'){
          $phoneProp = strtolower($property->getValue($this));
        }elseif($property->getName() == 'firstName'){
          $firstNameProp = strtolower($property->getValue($this));
        }elseif($property->getName() == 'lastName'){
          $lastNameProp = strtolower($property->getValue($this));
        }elseif($property->getName() == 'jobTitle'){
          $jobTitle = strtolower($property->getValue($this));
        }elseif($property->getName() == 'department'){
          $departmentProp = strtolower($property->getValue($this));
        }
      }
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
      $this->searchRank = $rank;
    }

}
