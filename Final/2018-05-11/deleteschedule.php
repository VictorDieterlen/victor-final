<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
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
  function getscheduleInfo($id){
    
    $conn = dbConnect();
    $sql = "SELECT * FROM schedule WHERE Schedule_id='$id'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
  
  
  if (isset($_GET['Yes'])) {
    $scheduleid=$_GET['userId'];
    
    $sql = "DELETE FROM schedule  WHERE  Schedule_id =$scheduleid";
   
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
  }
  
  if (isset($_GET['No'])) {
    header("Location: admin.php");
  }
  if (isset($_GET['id'])) {
    $scheduleInfo = getscheduleInfo($_GET['id']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <h1>Are you sure you want to delete this schedule?</h1>
    
  </head>
  <body>
    
    <form method="GET">
      <input type="hidden" name="scheduleId" value="<?=$scheduleInfo['Schedule_id']?>" />
      <input type="submit" id="decision" value="Yes" name="Yes" />
      <input type="submit" id="decision" value="No" name="No" />
    </form>
  </body>
</html>