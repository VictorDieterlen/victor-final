<?php
    session_start();
    
    function Logout() {
        if(isset($_POST['logout'])) {
            unset($_SESSION['username']);
            
            session_destroy();
        }
    }
    
    function Login() {
        if($_GET['login'] == "Error") {
            echo "<h3>Wrong Password</h3>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scheduler</title>
    </head>
    <body>
        <center>
            <?=Logout()?>
            <?=Login()?>
            <h1>Scheduler</h1>
        </center>
        <center>
            <form method="POST" action="login.php">
                <table>
                    <tr>
                        <td><strong>Username:</strong></td>
                        <td><input type="text" name="username"/></td>
                    </tr>
                    <tr>
                        <td><strong>Password:</strong></td> 
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="login" value="Login"/></td>
                    </tr>
                </table>
            </form>
            <br>
            <p>username : admin </p><br>
            <p>password : s3cr3t</p>
    </center>
    </body>
</html>