<?php
    session_start();
    
    $bdd = new PDO("mysql:host=localhost;dbname=final", "victordieterlen", "");
    
    if (isset($_GET['addform'])) {
        $date = $_GET['date'];
        $start_time = $_GET['start_time'];
        $duration = $_GET['duration'];
        $booked_by = $_GET['booked_by'];
        $sql = "INSERT INTO dashboard (date, start_time, duration, booked_by) VALUES (:date, :start_time, :duration, :booked_by)";
        $data = array();
        $data[':date'] =  $date;
        $data[':start_time'] =  $start_time;
        $data[':duration'] =  $duration;
        $data[':booked_by'] = $booked_by;
        $stmt = $bdd->prepare($sql);
        $stmt->execute($data);
        echo "slot added at $date $start_time for $duration hour(s) by $booked_by";
    }
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>Adding Slot</title>
    </head>
    
    <body>
        <a href="index.php">Scheduler return link</a> <br><br><br>
        
        <h1> Add Time Slot </h1><br><br>
        
        <form>
            Date: <input type="date" name="date" required /><br>
            Start Time : <input type="time" name="start_time" required /><br>
            Duration : <input type="text" name="duration" required /> hour(s)<br>
            Booked by : <input type="text" name="booked_by" required /><br>            
            <input type="submit" name="addform" value="Add"/>
        </form>
        
    </body>
</html>