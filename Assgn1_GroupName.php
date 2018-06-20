<?php

require_once('inc/SelfRank.interface.php');
require_once('inc/Person.class.php');
require_once('inc/Employee.class.php');
require_once('inc/Organization.class.php');
require_once('inc/EmployeeParser.class.php');
require_once('inc/FileAgent.class.php');
require_once('inc/Page.class.php');




$html = new Page("Assignment 1");
$path = 'data/employees.csv';
$html->header();
$html->searchForm();

$searchRes = [];
//Check if there if there is a search term/
$fa = new FileAgent($path);

$og = new EmployeeList();

$ep = new EmployeeParser();

//EmployeeParser retruns a parsed EmployeeList
$og = $ep->parseData($fa->getData());
var_dump($og); //displays the EmployeeList filled with Employee objects

//Check if search string is valid
//Check if it returns results

if(empty($_POST['searchTerm'])){

}
else{
  $html->searchList($searchRes);
}



$html->footer();


?>
