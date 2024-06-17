<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Payments</title>

    <style>
        body {
            background-image: url('../images/king.jpg'); 
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
        }
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $raddress=$_POST['address'];
        $telephone=$_POST['tele'];
        $amount=$_POST['amount'];
        $date_created=$_POST['date_created'];
        $work_hours=$_POST['work_hours'];
        
        if ($amount)  {
            $error='3';
            $result= $database->query("select * from payments where rname='$name';");
            if($result->num_rows==1){
                $error='1';
            }else{

                $sql1="insert into payments(rname,raddress,tele,amount,date_created,work_hours) values('$name','$raddress','$telephone','$amount','$date_created',$work_hours);";
               
                $database->query($sql1);
               

                //echo $sql1;
               
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: payment.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>