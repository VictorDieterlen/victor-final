<!DOCTYPE html>
<html>
        <head>
        <title>Dashboard</title>
    </head>
<body>
<?php
            $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
        ?>
        
        
        
<?php
            $sql = "SELECT * FROM salon";
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<div class='container'><center><br><b><h2>Salon</h2> </center></b>" ;
            echo "<table class='table'>";
            echo "<a href='add.php'></span></a>";
            foreach ($records as $donnees)
            {
                echo "<tr>";
                echo "<td>Code: ".  $donnees['code'] . "</td>" ;
                echo "<td>Available from: ". $donnees['available_from'] . " </td>" ; 
                echo  "<td>to: ". $donnees['available_to'] ." </td>" ;
                echo "<td>Type: ".$donnees['type'] . " </td>"; 
                echo "<td><form action='content.php'><input type='hidden' name=' ' value='".$donnees[' ']."'><input type='submit' value='Details'></form></td>";
                echo "<td><form action='delete.php' onsubmit='return confirmDelete(\"".$donnees['id']."\")'><input type='hidden' name='id' value='".$donnees['id']."'><input type='submit' value='Delete'></form></td></tr>";
                echo "</tr>";
            }
            echo "</table>";
            echo '</div>';
            
            
?>

<form action="add.php">
        <input type="submit" value="Add a salon"/>
</form>

        <script>
            function confirmDelete(id) {
                return confirm("You are going to delete the salon number " + id + " Are you sure ?");
            }
        </script>

</body>
</html>