<?php
// $db= new PDO($dsn, $username, $password, $options);

$dsn= 'mysql:host=localhost;dbname=testdb;charset=utf8mb4;port:3306';
$username= "root";
$password = "0";
try {$db=new PDO($dsn, $username, $password);

} catch (PDOException $e) {echo $Exception->getMessage();

}


 ?>
