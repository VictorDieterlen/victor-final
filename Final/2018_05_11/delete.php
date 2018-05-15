<?php
    $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
    
    $sql = "DELETE FROM dashboard WHERE ID = " . $_GET['ID'];
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    header("Location: index.php");
?>