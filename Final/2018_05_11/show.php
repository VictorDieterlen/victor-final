<?php
$bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
?>
           <a href="index.php">Scheduler return link</a>             
<?php            
            $reponse=$bdd->query("SELECT * FROM dashboard WHERE ID = " . $_GET['ID']);
            while ($data = $reponse->fetch())
            {
            ?>
                <head>
                    <title>Show Slot</title>
                </head>
                <div id="item">
                <p>
                <strong>Selected Slot Number :</strong> <?php echo $data['ID']; ?><br />
                Date : <?php echo $data['date']; ?> <br />
                Start Time : <?php echo $data['start_time']; ?> <br />
                Duration : <?php echo $data['duration']; ?>  hour(s)<br />
                Booked by : <?php echo $data['booked_by']; ?> </em>
                </p>
                </div>
        <?php
        }
        $reponse->closeCursor(); 
?>
