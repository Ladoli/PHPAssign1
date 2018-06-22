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
      $partialSeachTerms=explode(' ',$searchTerm);
      //$rankArray=[0,1,5,6,2,3];
      $rank=0;
      $instReflector= new ReflectionClass('Employee');

      $emailProp=$instReflector->getProperties()[0];
      
      If (strtolower(strcmp($emailProp->getValue($this),$searchTerm)) === 0){
        $rank=18;
      }elseif (strtolower(strcmp($instReflector->getProperties()[1]->getValue($this),$searchTerm)) === 0){
        $rank=17;
      }elseif (strtolower(strcmp($instReflector->getProperties()[5]->getValue($this),$searchTerm)) === 0){
        $rank=16;
      }elseif (strtolower(strcmp($instReflector->getProperties()[6]->getValue($this),$searchTerm)) === 0){
        $rank=15;
      }elseif (strtolower(strcmp($instReflector->getProperties()[2]->getValue($this),$searchTerm)) === 0){
        $rank=14;
      }elseif (strtolower(strcmp($instReflector->getProperties()[3]->getValue($this),$searchTerm)) === 0){
        $rank=13;
      }elseif (strtolower(strpos($emailProp->getValue($this),$searchTerm)) !== false){
        $rank=12;
      }elseif (strtolower(strpos($instReflector->getProperties()[1]->getValue($this),$searchTerm)) !== false){
        $rank=11;
      }elseif (strtolower(strpos($instReflector->getProperties()[5]->getValue($this),$searchTerm)) !== false){
        $rank=10;
      }elseif (strtolower(strpos($instReflector->getProperties()[6]->getValue($this),$searchTerm)) !== false){
        $rank=9;
      }elseif (strtolower(strpos($instReflector->getProperties()[2]->getValue($this),$searchTerm)) !== false){
        $rank=8;
      }elseif (strtolower(strpos($instReflector->getProperties()[3]->getValue($this),$searchTerm)) !== false){
        $rank=7;
      }elseif (strtolower($this->partialMatch($emailProp->getValue($this),$partialSeachTerms)) !== false){
        $rank=6;
      }elseif (strtolower($this->partialMatch($instReflector->getProperties()[1]->getValues($this),$partialSeachTerms)) !== false){
        $rank=5;
      }elseif (strtolower($this->partialMatch($instReflector->getProperties()[5]->getValues($this),$partialSeachTerms)) !== false){
        $rank=4;
      }elseif (strtolower($this->partialMatch($instReflector->getProperties()[6]->getValues($this),$partialSeachTerms)) !== false){
        $rank=3;
      }elseif (strtolower($this->partialMatch($instReflector->getProperties()[2]->getValues($this),$partialSeachTerms)) !== false){
        $rank=2;
      }elseif (strtolower($this->partialMatch($instReflector->getProperties()[3]->getValues($this),$partialSeachTerms)) !== false){
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

      $this->rank = $searchRank;
    }

}
