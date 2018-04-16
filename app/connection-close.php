<?php
class ConnectionClose extends Database{

  public function CloseConnection(){

    $this -> dbConnection -> close();

  }

}
?>
