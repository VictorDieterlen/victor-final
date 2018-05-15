<?php
    session_start();
   
   $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
    
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
    $namedParam = array(":username" => $username, ":password" => $password);
    
    $stmt = $bdd -> prepare($sql);
    $stmt -> execute($namedParam);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    if(empty($record)) {
        header("Location: index.php?login=Error");
    }
    else {
        $_SESSION['username'] = $record['username'];
        
        header("Location: index.php"); 
    }
?>