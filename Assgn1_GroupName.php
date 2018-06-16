<?php

require_once('inc/Page.class.php');


$html = new Page("Assignment 1");

$html->header();
$html->searchForm();
$html->searchList();
$html->footer();


?>
