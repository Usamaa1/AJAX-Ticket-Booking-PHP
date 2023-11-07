<?php require 'connection.php' ?>
<?php 


    $user_name = $_POST['userName'];
    $seats = $_POST['seatArray'];

    echo $user_name . "<br>";
    print_r($seats);


    foreach ($seats as $seat) {
    $insertQuery = "INSERT INTO `seats`(`username`, `seat`) VALUES (:user_name,:seats)";
    
    $insertPrepare = $connection->prepare($insertQuery);
    $insertPrepare->bindParam(":user_name", $user_name);
    $insertPrepare->bindParam(":seats", $seat);
    $insertPrepare->execute();
    }
?>
<h1><?= $user_name ?></h1>
<br>
<pre><?= print_r($seats) ?></pre>