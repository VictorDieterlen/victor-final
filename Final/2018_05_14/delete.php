<?php
$bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
$sql = "DELETE FROM salon WHERE id =  " . $_GET['id'];
$statement = $bdd->prepare($sql);
$statement->execute();
 
header("Location: index.php");


?>