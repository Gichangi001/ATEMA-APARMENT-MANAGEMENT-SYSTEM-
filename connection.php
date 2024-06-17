<?php

    $database= new mysqli("localhost","root","","atema");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>