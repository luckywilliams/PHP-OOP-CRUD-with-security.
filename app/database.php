<?php
class Database{

    private $DBhost = ""; // your host
    private $DBuser = ""; // your user
    private $DBpassword = ""; // your password
    private $DBname = "";	// your database

    protected $dbConnection;

    public function __construct()
    {
    	if (!isset($this->dbConnection)) {

    		$this->dbConnection = new mysqli(
				$this->DBhost,
				$this->DBuser,
				$this->DBpassword,
				$this->DBname
			);

			if (!$this->dbConnection) {
				echo 'Cannot connect to database server';
				echo $this -> dbConnection -> connect_error;
				die("Sorry , Database connection Failed");
				exit;
			}
		}

    	return $this->dbConnection;
    }

}
?>
