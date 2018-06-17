<?php

class FileAgent {

  public $originFileName = "";
  public $tempFileName = "";
  public $data;

  function  __construct($uploadedFile)    {

      $this->originFileName = $uploadedFile['name'];
      $this->tempFileName = $uploadedFile['tmp_name'];

      try{
        $file = fopen($this->tempFileName, "r");
        if(!$file){
          throw new Exception("File does not exist");
        }
        $read = fread($file,filesize($this->tempFileName));
        fclose($file);
        if(!$read){
          throw new Exception("No data in file");
        }
        $this->data = $read;

        // return $read;
      }catch(Exception $e){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal({title: "Error!", text: "'.$e->getMessage().'"});';
        echo '}, 1000);</script>';
      }
  }


}

?>
