<?php
    //define('DB_SERVER', 'localhost');
    //define('DB_USERNAME', 'root' );
    //define('DB_PASSWORD', '' );
    //define('DB_NAME', 'taskdemo' );

    $mysqli = new mysqli('localhost', 'root', '','taskdemo');

    if($mysqli===false){
        die("ERROR: couldn't connect to database ". $mysqli->connect_error);
    }
    
?>