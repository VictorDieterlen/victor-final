<?php
    session_start();
    
    $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
    
    function showall() {
        global $bdd;
        $sql = "SELECT * FROM dashboard ORDER BY date , start_time";
        $stmt = $bdd -> prepare($sql);
        $stmt -> execute();
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo "<center>";
        echo "<table>";
        echo "<tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>Duration</th>
                <th>Booked by</th>
                <th></th>
                <th></th>
             </tr>
             <hr>";
        foreach($data as $data){
            echo "<tr><td>" . $data['date'] . "</td>";
            echo "<td>" . $data['start_time'] . "</td>";
            echo "<td>" . $data['duration'] . "</td>";
            echo "<td>" . $data['booked_by'] . "</td>";
            echo "<td><form action='show.php'><input type='hidden' name='ID' value='".$data['ID']."'><input type='submit' value='Details'></form></td>";
            echo "<td><form action='delete.php' onsubmit='return Delete(\"".$data['date']."," .$data['booked_by']."\")'><input type='hidden' name='ID' value='".$data['ID']."'><input type='submit' value='Delete'></form></td></tr>";
        }
    echo "</table>";
    echo "</center>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Scheduler</title>
        <meta charset="utf-8"/>
        <script>
            function Delete(date,booked_by) {
                return confirm("You are going to delete the appointement for the " + date + " Are you sure ?");
            }
        </script>
    </head>
    <body>
        <center>
            <h1>Scheduler</h1>
        <div id="middle"> 
                <form>
                    Invitation Link <input type="text"/>
                </form>
                <form action="add.php">
                    <input type="submit" value="Add time slot"/>
                </form>
                <form method="POST" action="index2.php">
                    <input type="submit" name="logout" value="Logout"/>
                </form>
            </center>
            <br/>
            <hr/>
            <?=showall()?>
            <hr/>
        </div><br/>
    </body>
</html>