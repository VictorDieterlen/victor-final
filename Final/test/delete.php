<?php
    $connUrl = "mysql://eczi19dgi0sw30x0:rza60vj9ugl83t0c@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/qi16mp0u3abo69nc";
    $hasConnUrl = !empty($connUrl);
    
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'TechCheckout';
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : '';
    
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    $sql = "DELETE FROM dashboard WHERE ID = " . $_GET['ID'];
    
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    
    header("Location: dashboard.php");
?>