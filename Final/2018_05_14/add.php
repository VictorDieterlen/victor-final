<!DOCTYPE html>

<html>
    <head>
        <title>Add</title>

    </head>
    <body>
        <a href="index.php">Back to the menu</a>
        
        <?php
        $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
        
        $code = $_GET['code'];
        $afrom = $_GET['afrom'] ;
        $ato = $_GET['ato'];
        $type = $_GET['type'];
        
        $sql = "INSERT INTO salon(code,available_from,available_to,type) VALUES ('$code', '$afrom', '$ato', '$type')";
        
        $statement = $bdd->prepare($sql);
        $statement->execute();
        
        
        ?>
        <form>
            Code : <input type="text" name="code"><br>
            Available from :<input type="date" name="afrom"><br>
            Available to :<input type="date" name="ato"><br>
            Type : <input type="text" name="type"><br>
            
            <input type="submit" value="Add"/>
        </form>
    </body>
</html>