# PHP-OOP-CRUD-with-security.

# how to use.

[code]
<?php
require_once("app/header.php");
require_once("app/database.php");
require_once("app/security.php");
require_once("app/data-validation.php");
require_once("app/crud.php");

$validation = new HashDataValidsation();
$security = new HashSecurity();
$hashcrud = new hashCrud;

$query  = "SELECT id FROM Users WHERE email = ?";
$types = "s";
$values = array("email" => $email);
$check_id = $crud -> GetData($query, $types, $values);

?>
[/code]
