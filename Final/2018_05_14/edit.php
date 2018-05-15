<!DOCTYPE html>

<html>
    <head>
        <title>Edit</title>

    </head>
    <body>
        <a href="index.php">Back to the menu</a>
        
        <?php
        $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
        
        $code = $_GET['code'];
        $afrom = $_GET['afrom'];
        $ato = $_GET['ato'];
        $type = $_GET['type'];
        
       $sql = "UPDATE salon SET code='$code',available_from='$afrom',available_to='$ato',type='$type' WHERE id =  " . $_GET['id'];
        
        $statement = $bdd->prepare($sql);
        $statement->execute();
        
        
        ?>
        <form>
            Code : <input type="text" name="code"><br>
            Available from :<input type="date" name="afrom"><br>
            Available to :<input type="date" name="ato"><br>
            Type : <input type="text" name="type"><br>
            
            <input type="submit" value="Edit"/>
        </form>
    </body>
</html>