
    <?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $nic=$_POST['nic'];
        $oldemail=$_POST["oldemail"];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $aab="select renter.rid from renter inner join webuser on renter.remail=webuser.email where webuser.email='$email';";
            $result= $database->query($aab);
            //$resultqq= $database->query("select * from technician where techid='$id';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["rid"];
            }else{
                $id2=$id;
            }
            

            if($id2!=$id){
                $error='1';
                //$resultqq1= $database->query("select * from technician where techemail='$email';");
                //$did= $resultqq1->fetch_assoc()["techid"];
                //if($resultqq1->num_rows==1){
                    
            }else{

                //$sql1="insert into technician(techemail,techname,techpassword,technic,techtel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
                $sql1="update renter set remail='$email',rname='$name',rpassword='$password',rnic='$nic',rtel='$tele',raddress='$address' where rid=$id ;";
                $database->query($sql1);
                echo $sql1;
                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);
                echo $sql1;
                
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>