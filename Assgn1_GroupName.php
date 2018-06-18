<?php

require_once('inc/SelfRank.interface.php');
require_once('inc/Employee.class.php');
require_once('inc/EmployeeList.class.php');
require_once('inc/EmployeeParser.class.php');
require_once('inc/FileAgent.class.php');
require_once('inc/Page.class.php');





//Check if there if there is a search term/string

//Check if search string is valid and check if it returns results




$html = new Page("Assignment 1");

$html->header();
$html->searchForm();
$html->searchList();
$html->footer();


?>
