<?php

class FileAgent {


//Generic File Agent. Only thing special is how it handles exceptions because exceptions should be pretty.
  private static $data;

  static function read($path)    {
      try{
        $file = fopen($path, "r");

        if(!$file){
          throw new Exception("File does not exist");
        }

        $read = fread($file,filesize($path));
        fclose($file);

        if(!$read){
          throw new Exception("No data in file");
        }

        self::$data = $read;

      }catch(Exception $e){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal({title: "Error!", text: "'.$e->getMessage().'"});';
        echo '}, 1000);</script>';
      }
  }

  static function getData(){
    return self::$data;
  }


}

?>
