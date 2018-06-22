<?php

//This Class is to construct our html page.

class Page{

  public $title = "Please set the title";

  function  __construct($setTitle)    {

    $this->title = $setTitle;
  }
  function header() {
    echo "<!DOCTYPE html>";
    echo "<html>\n";
    echo "<head>\n";
    echo '<script src="https://unpkg.com/sweetalert2"></script>';
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
    echo "<link href=\"https://fonts.googleapis.com/css?family=Ubuntu:100,200,300,400,500,600,700,800,900\" rel=\"stylesheet\">";
    echo "<link rel=\"stylesheet\" href=\"css/VLabStyles.css\">\n";
    echo '<title>'.$this->title.'</title>';
    echo "</head>\n";
    echo '<body style="display:inline-block; text-align: center; width: 100%;">'."\n";
    echo '<h1>Assignment #1 - Group 5</h1>';
  }

  function footer() {
    echo "<BR/><BR/><BR/></body>\n";
    echo "</html>\n";
  }

  function searchForm() {
    echo '
    <FORM METHOD="POST" ACTION="" enctype="multipart/form-data">
    <INPUT TYPE="text" NAME="searchTerm" ID="stringToSearch">
    <INPUT TYPE="Submit" VALUE="Search">
    </FORM>';
  }

  function searchList($combinedArray)  {
    echo '<br>Searched for "'.$_POST['searchTerm'].'"<br>';
    if(empty($combinedArray)){
      echo '<br>No results found, enter another search term';
    }else {
      echo '<div class="container"><div class="row">';
      echo '<div class="col-xs-12">';
      echo '<div class="col-xs-2">First Name</div>';
      echo '<div class="col-xs-2">Last Name</div>';
      echo '<div class="col-xs-2">Email</div>';
      echo '<div class="col-xs-2">Phone</div>';
      echo '<div class="col-xs-2">Job Title</div>';
      echo '<div class="col-xs-2">Department</div>';
      echo '</div>';
        foreach($combinedArray as $emp){
          echo '<div class="col-xs-12">';
          echo '<div class="col-xs-2">'.$emp->firstName.'</div>';
          echo '<div class="col-xs-2">'.$emp->lastName.'</div>';
          echo '<div class="col-xs-2">'.$emp->email.'</div>';
          echo '<div class="col-xs-2">'.$emp->phone.'</div>';
          echo '<div class="col-xs-2">'.$emp->jobTitle.'</div>';
          echo '<div class="col-xs-2">'.$emp->department.' '.$emp->searchRank.'</div>';
          echo '</div>';
        }
        echo 'There are '.count($combinedArray).' results';
      echo '</div></div>';
    }
  }

}

?>
