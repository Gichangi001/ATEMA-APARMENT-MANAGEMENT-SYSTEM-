<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Schedule</title>
    <style>
        body {
            background-image: url('../images/king.jpg'); 
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
        }
        /* Animation styles */
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from technician where techemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["techid"];
    $username=$userfetch["techname"];
 //echo $userid;
 ?>
 <div class="container">
     <div class="menu">
     <table class="menu-container" border="0">
             <tr>
                 <td style="padding:10px" colspan="2">
                     <table border="0" class="profile-container">
                         <tr>
                             <td width="30%" style="padding-left:20px" >
                                 <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                             </td>
                             <td style="padding:0px;margin:0px;">
                                 <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                 <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                             </td>
                         </tr>
                 </table>
                 </td>
             </tr>
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon- " >
                     <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div>
                 </td>
             </tr>
             <tr class="menu-row">
                 <td class="menu-btn  menu-icon-  ">
                     <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointments</p></a></div>
                 </td>
             </tr>
             
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-  menu-icon-active">
                     <a href="schedule.php" class="non-style-link-menu "><div><p class="menu-text">My Sessions</p></div></a>
                 </td>
             </tr>
             <tr class="menu-row" >
             <td class="menu-btn menu-icon-  menu-icon-active">
                     <a href="payments.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Payments</p></a></div>
                 </td>
             </tr>
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-renter">
                     <a href="renter.php" class="non-style-link-menu"><div><p class="menu-text">My Tenants</p></a></div>
                 </td>
             </tr>
             <tr class="menu-row" >
                 <td class="menu-btn menu-icon-">
                     <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                 </td>
             </tr>
             
         </table>


        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">
                        <a href="technician.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search renter name or Email" list="renter">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="payments">';
                                $list11 = $database->query("select  techname,techemail from  technician;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["techname"];
                                    $c=$row00["techemail"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Kolkata');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <tr >
                    <td colspan="2" style="padding-top:30px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Add New payment</p>
                    </td>
                    <td colspan="2">
                        <a href="?action=add&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('../img/icons/add.svg');">Add New</font></button>
                            </a></td>
                </tr>
              
                <?php
                    if($_POST){
                        $keyword=$_POST["search"];
                        
                        $sqlmain= "select * from renter where raddress='$keyword' or rname='$keyword' or rname like '$keyword%' or rname like '%$keyword' or rname like '%$keyword%'";
                    }else{
                        $sqlmain= "select * from renter order by rname desc";

                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Tenant Name
                                
                                </th>
                                
                                
                                <th class="table-headin">
                                    
                                   Amount
                </th>
                                </tr>
                                
                                
                        </thead>
                        <tbody>
                        
                            <?php

                                
                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="payments.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all renters &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $rid = $row["rid"];
                                    $name = $row["rname"];
                                   
                                    
                                    // Assuming $database is your database connection object
                                    $renter_res = $database->query("SELECT * FROM renter WHERE rid='$rid'");
                                    $renter_array = $renter_res->fetch_assoc();
                                    
                                    // Assuming "rname" and "remail" are columns in the "renter" table
                                    $name = $renter_array["rname"];
                                    
                                    
                                   
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($name,0,30)
                                        .'</td>
                                       
                                       

                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='drop'){
            $nameget=$_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="payments.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>('.substr($nameget,0,40).').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-technician.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="index.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        
        }elseif($action=='view'){
            $sqlmain= "select * from renter where rid='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["rname"];
            $email=$row["remail"];
            
            
            $tele=$row['rtel'];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="payments.php">&times;</a>
                        <div class="content">
                            eDoc Web App<br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-pay-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="raddress" class="form-label">address: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                            
                                                      <tr>
                                <td colspan="2">
                                    <a href="payments.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }elseif($action=='add'){
                
                if($error_1!='4'){
                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="payments.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-tech-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2">'.
                                    $errorlist[$error_1]
                                .'</td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New payment.</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                <form action="add-new.php" method="POST" class="add-new-form">
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="name" class="input-text" placeholder="Tenant Name" required><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Address" class="form-label">Address: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="address" name="address" class="input-text" placeholder=" Address" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Telephone" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="float" name="tele" class="input-text" placeholder="Telephone" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Amount" class="form-label">Amount: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="tel" name="amount" class="input-text" placeholder="Amount" required><br>
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="date_created" class="form-label">Date_created: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="date" name="date_created" class="input-text" placeholder="date_created" required><br>
                            </td>
                        </tr>         
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="work_hours" class="form-label">Work_hours: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="number" name="work_hours" class="input-text" placeholder="work_hours" required><br>
                            </td>
                        </tr>       
                        
                               
                            
                                            
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Add" class="login-btn btn-primary btn">
                                </td>
                
                            </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
                }
        }else{
            echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        <center>
                        <br><br><br><br>
                            <h2>New Record Added Successfully!</h2>
                            <a class="close" href="payment.php">&times;</a>
                            <div class="content">
                                
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="payment.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';
        }
    }
?>
</div>

</body>
</html>
