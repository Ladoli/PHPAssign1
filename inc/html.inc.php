<?php

function htmlHeader(){

  echo "<!DOCTYPE html>";
	echo "<html>\n";
	echo "<head>\n";
  echo '<script src="https://unpkg.com/sweetalert2"></script>'; //For prettiness
  echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
	echo "<link href=\"https://fonts.googleapis.com/css?family=Ubuntu:100,200,300,400,500,600,700,800,900\" rel=\"stylesheet\">";
  echo "<link rel=\"stylesheet\" href=\"css/VLabStyles.css\">\n";
  echo "</head>\n";
	echo '<body style="display:inline-block; text-align: center; width: 100%;">'."\n";
	echo "<br/>\n";
}

function htmlFooter()   {


  echo "</body>\n";
	echo "</html>\n";

 }

function htmlSearchList(){
  echo '<div class="contaner"><div class="row">';
  echo '<div class="col-xs-12">';
  echo '<div class="col-xs-2"><a href="?sort=name">First Name</a></div>';
  echo '<div class="col-xs-2"><a href="?sort=name">Last Name</a></div>';
  echo '<div class="col-xs-2"><a href="?sort=payroll">Email</a></div>';
  echo '<div class="col-xs-2"><a href="?sort=wins">Phone</a></div>';
  echo '<div class="col-xs-2"><a href="?sort=name">Job Title</a></div>';
  echo '<div class="col-xs-2"><a href="?sort=name">Department</a></div>';
  echo '</div>';
  echo '</div></div>';
}

function htmlSearchBar(){
  echo '<input type="text"></input>';
}


?>
