<?php

class EmployeeList{

    //The team tha the Team parser will use
    public $employeeList= [];

    //This function will parse our cars data to an array

 function __construct(){ //May not even be needed

 }

 function addEmployee($employee) {
   $this->employeeList[] = $employee;
 }

 function getEmployeeList() {
    return $this->$employeeList;
 }

 function searchList(){
   //Dupcliate the employeeList
   //Have each employee rank themselves based on search term
   //Remove employees with rank = 0
   //Return sorted array of employees based on rank in Descending order. 
 }

}

?>
