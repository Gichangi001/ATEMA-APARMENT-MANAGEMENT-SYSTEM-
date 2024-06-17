<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='r'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from renter where remail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["rid"];
    $username=$userfetch["rname"];

    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from renter where rid=$id;");
        $email=($result001->fetch_assoc())["remail"];
        $sql= $database->query("delete from webuser where email='$email';");
        $sql= $database->query("delete from renter where remail='$email';");
        //print_r($email);
        header("location: ../logout.php");
    }


?>