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
$conn = dbConnect;
 
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}

function getscheduleInfo($id){
    $conn = dbConnect();
    $sql = "SELECT * FROM schedule WHERE Schedule_id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

if(isset($_GET['id'])) {
    $scheduleInfo = getscheduleInfo($_GET['id']);
}

if(isset($_GET['updateschedule'])) {
    $Date=$_GET['Date'];
    $Start_time=$_GET['Start_time'];
    $Duration=$_GET['Duration'];
    $Booked_by=$_GET['Booked_by'];
    $scheduleid=$_GET['scheduleId'];
    $sql = "UPDATE  `admin`.`schedule` SET  `Date` =  '$Date' WHERE  `schedule`.`Schedule_id` =$scheduleid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE  `admin`.`schedule` SET  `Start_time` =  '$Start_time' WHERE  `schedule`.`Schedule_id` =$scheduleid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE  `admin`.`schedule` SET  `Duration` =  '$Duration' WHERE  `schedule`.`Schedule_id` =$scheduleid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE  `admin`.`schedule` SET  `Booked_by` =  '$Booked_by' WHERE  `schedule`.`Schedule_id` =$scheduleid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update schedule </title>
        
    </head>
    <body>

        <h1> Update schedule </h1>
        <form method="GET">
            <input type="hidden" name="scheduleId" value="<?=$userInfo['Schedule_id']?>" />
            First Name:<input type="date" name="Date" value="<?=$scheduleInfo['Date']?>" />
            <br />
            Last Name:<input type="text" name="Start_time" value="<?=$scheduleInfo['Start_time']?>"/>
            <br/>
            Email: <input type= "text" name ="Duration" value="<?=$scheduleInfo['Duration']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "Booked_by" value="<?=$scheduleInfo['Booked_by']?>"/>
            <br />
            <input type="submit" id="updateButton" value="Update Schedule" name="updateschedule">
        </form>
    </body>
</html>