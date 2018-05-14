<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE HTML> 
<html>
    <head>
        <title>Welcome</title>
        
    </head>
    <body>

            <h1> Admin Page </h1>
            <h2> Welcome <?=$_SESSION['username']?>! </h2>
            
            <form action="addschedule.php">
                
                <input type="submit" id="mainPageButtons" value="Add new shedule" />
                
            </form>
            
            <form action="logout.php">
                
                <input type="submit" id="mainPageButtons" value="Logout!" />
                
        <form action="">
            Invitation link: <input type="text" name="FirstName" value="">
            <input type="submit" value="Submit">
        </form>
        
            </form>
            
            <br />
            
            <table id="schedule">
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>Duration</th>
                <th>Booked by</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Details</th>
            </tr>
            <?php 
                showschedule();
            ?>
        </table>
    </body>
</html>



<?php 
function showschedule() {
    $conn = dbConnect();
    $sql = "SELECT * FROM schedule ORDER BY date";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        
        echo "<td>".$row['Date']."</td>";
        echo "<td>".$row['Start_time']."</td>";
        echo "<td>".$row['Duration']."</td>";
        echo "<td>".$row['Booked_by']."</td>";
        echo "<td><a href='updateschedule.php?id=".$row['schedule_id']."'>Update</a></td>";
        echo "<td><a onclick='return confirmDelete()' href='deleteschedule.php?id=".$row['schedule_id']."'>Delete</a></td>";
        echo "</tr>";
    }
}
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
?>