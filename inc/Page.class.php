<?php

//This Class is to construct our html page.

class Page{

  public $title = "Please set the title";

  function  __construct($setTitle)    {

    $this->title = $setTitle;
  }

  //Basic header. With prettiness.
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

  //Basic footer.
  function footer() {
    echo "<BR/><BR/><BR/></body>\n";
    echo "</html>\n";
  }

  //Search form.
  function searchForm() {
    echo '
    <FORM METHOD="POST" ACTION="" enctype="multipart/form-data">
    <INPUT TYPE="text" NAME="searchTerm" ID="stringToSearch">
    <INPUT TYPE="Submit" VALUE="Search">
    </FORM>';
  }

  //This analyzes the information passed about the search results. If no results, it returns a message stating so.
  //If the searched term is less than 3 characters, it gives a messagie stating so.
  //Otherwise, it displays the search results.
  function searchResults($combinedArray)  {
    echo '<br>Searched for "'.$_POST['searchTerm'].'"<br>';
    if(empty($combinedArray)){
      echo '<br>No results found, enter another search term';
    }elseif(strlen($_POST['searchTerm']) < 3){
      echo '<br>Search terms need to be 3 charachers or longer, enter another search term';
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
