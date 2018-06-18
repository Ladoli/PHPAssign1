<?php

class EmployeeList{

    //The team tha the Team parser will use
    private $employeeList= [];

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
   /*Go through employees in list that fit the criteria and rank each one. Overwrtie any previous ranking if any.
   Remove fits from the duplicated Employee List, add/move them to a new array "Exact matches"
   */
   /*Search through remaining employees for partial matches. For partial matches I suggest dividing/exploding the string
   based on "space" and searching each employee for any that fit these critera.  Rank results appropriately.
   Remove fits from the duplicated Employee List, add/move them to a new array "Partial matches"
   */
   //Sort both arrays (Partial and exact matches) of employees based on rank
   //Combine both arrays with exact matches first
   //Return combined array of matches
 }

}

?>
