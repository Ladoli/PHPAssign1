<?php

class Organization{

    //The team tha the Team parser will use
    public $employeeList= [];

    //This function will parse our cars data to an array

 function __construct(){ //May not even be needed

 }

 function addEmployee($employee) {
   $this->employeeList[] = $employee;
 }

 function getEmployeeList() {
    return $this->employeeList;
 }

 function searchList($searchTerm){

 }

}

?>
