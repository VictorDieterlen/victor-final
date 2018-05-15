<?php
    session_start();
    
    $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
                
    
    
    if (isset($_GET['addSlotForm'])) {
        $code = $_GET['code'];
        $from = $_GET['from'];
        $to = $_GET['to'];
        $type = $_GET['type'];
        $status = $_GET['status'];
        $title = $_GET['title'];
        $slogan = $_GET['slogan'];
        $action = $_GET['action'];
        $description = $_GET['description'];
        $ID = $_GET['ID'];
        
        $sql = "INSERT INTO dashboard (code, from, to, type, status, title, slogan, action, description, ID) VALUES (:code, :from, :to, :type, :status, :title, :slogan, :action, :description, :ID)";
        
        $parameters = array();
        $parameters[':code'] =  $code;
        $parameters[':from'] =  $from;
        $parameters[':to'] =  $to;
        $parameters[':type'] = $type;
        $parameters[':status'] =  $status;
        $parameters[':title'] =  $title;
        $parameters[':slogan'] =  $slogan;
        $parameters[':action'] = $action;
        $parameters[':description'] =  $description;
        $parameters[':ID'] = $ID;
        
        $stmt = $bdd->prepare($sql);
        $stmt->execute($parameters);
        
        echo "Code has been added successfully! <br>";
    }
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title> Landing Page detail </title>
    </head>
    
    <body>
        <a href="index.php">Back to the menu</a>
        <h1> Add salon </h1>
        
        <form>
            Code: <input type="text" name="code" required /><br>
            From: <input type="date" name="from" required /><br>
            To: <input type="date" name="to" required /><br>
            Status: <input type="text" name="status" required /><br>
            Title: <input type="text" name="title" required /><br>
            Slogan: <input type="text" name="slogan" required /><br>
            Action: <input type="text" name="action" required /><br>
            Description: <input type="text" name="description" required /><br>
            ID: <input type="text" name="ID" required /><br>
            
            <input type="submit" name="addSlotForm" value="Add"/>
        </form>
        
    </body>
</html>