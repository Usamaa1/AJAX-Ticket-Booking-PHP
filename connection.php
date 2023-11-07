<?php 




try{
    $connection = new PDO('mysql:host=localhost;dbname=ticket','root','');
    
}
catch(PDOException $e){
    echo $e->getMessage();
}



?>