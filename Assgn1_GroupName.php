<?php

require_once('inc/SelfRank.interface.php');
require_once('inc/Person.class.php');
require_once('inc/Employee.class.php');
require_once('inc/Organization.class.php');
require_once('inc/EmployeeParser.class.php');
require_once('inc/FileAgent.class.php');
require_once('inc/Page.class.php');




$html = new Page("Assignment 1");

$html->header();
$html->searchForm();

$searchRes = [];
//Check if there if there is a search term/string
//Check if search string is valid
//Check if it returns results

if(empty($_POST['searchTerm'])){

}
else{
  $html->searchList($searchRes);
}



$html->footer();


?>
