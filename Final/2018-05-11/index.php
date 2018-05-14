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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Schedule login</h1>
        <h3>ID : admin  Password : s3cr3t</h3>
        <form method="POST">
    
        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password"/> <br /><br />
        
        <input type="submit" id="submit" value="Login" name="submitButton" />
        
        </form>
        
        <br />
        <?php 
            if(isset($_POST['submitButton'])) {
                $username = $_POST['username'];
                $pass = sha1($_POST['password']);
                $sql = "SELECT * FROM admin WHERE userName='$username' AND password='$pass'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['username'] = $username;
                    header("Location: admin.php");
                    echo "good";
                } 
                else {
                echo "Invalid username or password.<br>";
                }
            }
        ?>
    </body>
</html>