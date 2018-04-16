<?php
class DataValidsation{
	
	public function CheckEmpty($fields){
	
		$msg = null;

		if (empty($fields) || strlen($fields) == 0) {
			$msg .="field is required";
		}

		return $msg;
	}

	public function PasswordLength($password){
		if(strlen($password) < 6){
			return false;
		}else{
			return true;
		}
	}

	/*public function PasswordUnicode($password){
		if(preg_match("/^(?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){2,})+$/", $password)) {

			return true;
		}else{
			return false;
		}
	}
	  */

	public function PasswordMatch($password , $matchpassword){
		if($password !== $matchpassword){
			return false;
		}else{
			return true;
		}
	}

	// username regrex
	public function UsernameRegrex($username){
		if(preg_match("/^[a-zA-Z0-9_]+$/", $username)){
			return true;
		}else{
			return false;
		}
	}

	// allow only number and letters // fix them they are mathicng query and not working right
	public function NumLetRegrex($string){
		return $string = preg_replace("/^[a-zA-Z0-9]+$/", "",$string);
	}

	// hashtag validation // fix them they are not maching query and not working right
	public function TagsValidation($string){
		return $string = preg_replace('/^[a-zA-Z0-9.,]+$/', "",$string);
	}


	// Ip regrex
	/*public function IPRegrex($IP){
		if(preg_match("/^[0-9.]+$/", $IP)){
			return true;
		}else{
			return false;
		}
	}*/

	public function UsernameLength($username){
		if(strlen($username) < 3 || strlen($username) > 16){
			return false;
		}else{
			return true;
		}
	}


	// email regrex
	public function EmailRegrex($email){

		if(preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)){
			return true;
		}else{
			return false;
		}

	}

}

?>
