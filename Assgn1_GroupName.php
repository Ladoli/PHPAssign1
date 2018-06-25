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


FileAgent::read($path);
$org = EmployeeParser::parseData(FileAgent::getData());



//Checks if there is a search attempt, if there is, it displays search results of that attempt.
if(empty($_POST['searchTerm'])){

}
else{
  $organizationList = $org->searchList($_POST['searchTerm']);
  $html->searchResults($organizationList);
}



$html->footer();


?>
