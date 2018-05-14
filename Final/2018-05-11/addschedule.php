<?php

session_start();
function dbConnect() {
    $connUrl = "mysql://eczi19dgi0sw30x0:rza60vj9ugl83t0c@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/qi16mp0u3abo69nc";
            $hasConnUrl = !empty($connUrl);
            
            $connParts = null;
            if ($hasConnUrl) {
                $connParts = parse_url($connUrl);
            }
            
            //var_dump($hasConnUrl);
            $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
            $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'admin';
            $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
            $password = $hasConnUrl ? $connParts['pass'] : '';
            
            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
$conn = dbConnect();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
    
if (isset($_POST['addschedule'])) { 
    
    $Date = $_POST['Date'];
    $Start_time = $_POST['Start_time'];
    $Duration = $_POST['Duration'];
    $Booked_by = $_POST['Booked_by'];
    
    
    $sql = "INSERT INTO schedule
                (Date, Start_time, Durration, Boocked_by)
            VALUES
                ('$Date', '$Start_time', '$Duration', '$Booked_by')";
    
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
    
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add new schedule</title>
        
    </head>
    <body>
        
        <h1>Adding New schedule</h1>
        
        <h1>Adding a New schedule</h1>
        <form method="POST">
            
            
            Date:<input type="date" name="Date" />
            <br />
            Start time:<input type="text" name="Start_time"/>
            <br/>
            Duration: <input type= "text" name ="Duration"/>
            <br/>
            Booked by: <input type ="text" name= "Booked_by"/>
            <br />
            <input type="submit" id="addscheduleButton" value="Add schedule" name="addschedule">
        </form>
    </body>
</html>