<?php

class Organization{

    //The array of employees in the organization
    private $employeeList= [];

    //This function will parse our cars data to an array

 function __construct(){ //May not even be needed honestly.

 }

 function addEmployee($employee) {
   $this->employeeList[] = $employee;
 }

 function getEmployeeList() {
    return $this->employeeList;
 }

 //Since our ranking system uses higher ranks to denote a better search result, the function we pass to the usort will also be backwards
 function sortByRank($x,$y){
    if($x->searchRank > $y->searchRank){
      return -1;
    }elseif($x->searchRank < $y->searchRank){
      return 1;
    }else{
      return 0;
    }
  }


  //This function goes through each employee in the organization, makes them self rank based on criteria.
  //It then removes employees who ranekd themseves as zero or irrelevant to the search.
  //It then returns the list.
  function searchList($searchTerm){
    $sortedFilteredList = [];
    foreach ($this->employeeList as $employee) {
      $employee->selfRank($searchTerm);
      if($employee->searchRank !== 0){
        $sortedFilteredList[] = $employee;
      }
    }
    usort($sortedFilteredList, array('Organization', 'sortByRank'));
    return $sortedFilteredList;
  }

}

?>
