<?php
require_once('database.php');

class CreateTable extends Database{

  public function CreateTables($sql){
    return $this -> dbConnection -> query($sql);
  }

}

///////////////////////
// tables and queries//
///////////////////////

//user table
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    username VARCHAR(16) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender ENUM('m','f') NOT NULL,
    website VARCHAR(255) NULL,
    country VARCHAR(255) NULL,
    userlevel ENUM('a','b','c','d') NOT NULL DEFAULT 'a',
    avatar VARCHAR(255) NULL,
    ip VARCHAR(255) NOT NULL,
    activationcode VARCHAR(255) NOT NULL,
    logtoken varchar(255) NULL,
    signup DATETIME NOT NULL,
    lastlogin DATETIME NOT NULL,
    activation DATETIME NOT NULL,
    activated ENUM('0','1') NOT NULL DEFAULT '0',
    PRIMARY KEY (id),
    UNIQUE KEY username (username),
    UNIQUE KEY email (email)

)";

$query = new CreateTable;
$result = $query -> CreateTables($sql);
if($result === true){
  echo '
    <div class="alert alert-success">
     <p><b>Success!</b> Table "User" successfully created.</p>
    </div>
  ';
}else{
  echo '
    <div class="alert alert-warning">
    <p> <b>Warning!</b> Table "User" not created. </p>
    <p> '.$querypass -> error.' </p>
    </div>
  ';
}

require_once("connection-close.php");
//close connection
$CloseConnection = new ConnectionClose;
$CloseConnection -> CloseConnection();
?>
