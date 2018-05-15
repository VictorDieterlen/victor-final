<?php
    session_start();
    
    $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
    
     function displayDashboard() {
        global $bdd;
        $sql = "SELECT * FROM `salon` WHERE 1";
        $stmt = $bdd -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table>";
        echo "<tr>
        <th>Code</th>
                <th>Avaible from</th>
                <th> - to</th>
                <th>Type</th>
                <th></th>
                <th></th>
             </tr>";
        
        foreach($records as $r){
            echo "<tr><td>" . $r['code'] . "</td>";
            echo "<td>" . $r['from'] . "</td>";
            echo "<td> - " . $r['to'] . "</td>";
            echo "<td>" . $r['type'] . "</td>";
            echo "<td><form action=' '><input type='hidden' name=' ' value='".$r[' ']."'><input type='submit' value='Details'></form></td>";
            echo "<td><form action='delete.php' onsubmit='return confirmDelete(\"".$r['date']."\")'><input type='hidden' name='ID' value='".$r['ID']."'><input type='submit' value='Delete'></form></td></tr>";
        }
    echo "</table>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8"/>
        <script>
            function confirmDelete(code) {
                return confirm("Are you sure you want to remove this? " + code + " This cannot be undone.");
            }
        </script>
    </head>
    
    <body>
        <div id="title">
            <h1>DASHBOARD</h1>
            <form action="">
                Search: <input type="text" name="search" value="">
            <input type="submit" value="Submit">
            </form>
            <form method="POST" action="index.php">
                <input type="submit" name="logout" value="Logout"/>
            </form>
        </div>
        
        <div id="content"> 
                <form>
                    Invitation Link <input type="text"/>
                </form>
                
                <form action="addSlot.php">
                    <input type="submit" value="Add a salon"/>
                </form>
            <br/><br/><br/><br/>
        
            <?=displayDashboard()?>
            
            <hr/>
        </div><br/><br/><br/>
    </body>
</html>