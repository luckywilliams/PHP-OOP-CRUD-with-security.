<?php
class Security extends Database{

  //all filters

  public function AllFilters($value){

     $values = $this-> escapeString($value);
     $values = $this-> xssSecurity($value);
     $values = $this-> tagsSecurity($value);
     $values = $this-> slashesSecurity($value);
     $values = $this-> Trimmer($value);

     return $values;

  }

  // sql attak
  public function EscapeString($value)
	{
		return $this->dbConnection->real_escape_string($value);
	}

  //xss attak

  public function XssSecurity($value){

    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

  }

  // strip_tags

  public function TagsSecurity($value){
    return strip_tags($value);
  }

  // stripslashes

  public function SlashesSecurity($value){
    return stripslashes($value);
  }

  //trim data

  public function TrimData($value){
    return trim($value);
  }


  // hash the password
  public function PasswordHash($value){
    return password_hash($value, PASSWORD_DEFAULT, ['cost' => 8]);
  }

  //verify the password
  Public function PasswordVerify($password, $submittedpassword){
    return password_verify($submittedpassword, $password);
  }

  // set only http cookie
  public function SetCookie($name, $value, $time){
    $cookietime = new DateTime($time);
    return $this -> setcookie($name, $value, $cookietime->getTimestamp(), '/', null, null, true); // on live server on https
  }

  // some csrf protection
  // add this to hidden filed in form and verify it before submit
  // implement check method type in form
  public function GenerateToken(){
    return $this -> $_SESSION[_token] = bin2hex(openssl_random_pseudo_bytes(16));
  }

  // add session hijaking security
  // add prepered statement in crud file

}
?>
