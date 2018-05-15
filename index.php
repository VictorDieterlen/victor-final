<!DOCTYPE html>

                <?php
                $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
                ?>

<html>
    <head>
        <title>Victor Dieterlen</title>
    </head>
            <center><h1><strong>Victor Dieterlen</strong></h1></center>
            <br /><br />
            <hr>
                <div>
                    <br /><br />
                    <h1>Final</h1><br />
                    <img src="/Final/2018-05-11/Final.png" alt="final image"><br />
                    <a href="/Final/2018-05-11/">Final 2018-05-11</a><br />
                    <img src="/Final/2018-05-14/final2.png" alt="final image"><br />
                    <a href="/Final/2018-05-14/">Final 2018-05-14</a><br />
                    <img src="/Final/2018-05-15/final3.png" alt="final image"><br />
                    <a href="/Final/2018-05-15/">Final 2018-05-15</a><br />
                    <a href="/Final/test/">Final test</a><br />
                </div>
                <br /><br /><br /><br />
                <?php
                $reponse=$bdd->query('SELECT * FROM user');
                
            
            while ($donnees = $reponse->fetch())
            {
            ?>
                <div id="item">
                    <strong>user: </strong> <?php echo $donnees['username']; ?><br />
                    <strong>pass : </strong><?php echo $donnees['password']; ?> <br />
                </div>
        <?php
        }
        $reponse->closeCursor(); 
    ?>
    </body>
    
        <footer>
            <center>
            <hr>
            CST-336 Internet Programming. 2018&copy; Dieterlen <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictious. <br />
            It is used for academic purpose only. <br />
            <img id = "CSUMB" src="CSUMB.png" alt="CSUMB LOGO"/>
            </center>
        </footer>
</html>
