<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/renter.css">
        
    <title>Dashboard</title>
    <style>
         body {
            background-color: powderblue;
        }
        /* Animation styles */
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<center>
<body>
<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='r'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
       // Retrieve payment details based on ID
  $sql = "SELECT * FROM payments WHERE rid = $id";
  $result = $database->query($sql);

  if ($result->num_rows == 1) {
    $payment = $result->fetch_assoc();

    // Display payment details or generate receipt options
    echo "<h1>Payment Details</h1>";
    echo "<p>Renter Name: " . $payment["rname"] . "</p>";
    echo "<p>Amount: " . $payment["amount"] . "</p>";
    echo "<p>Date Created: " . $payment["date_created"] . "</p>";

    // Payment status logic (modify based on your needs)
    $isPaid = $payment["status"] == "paid"; // Assuming "paid" in status field
    if ($isPaid) {
      echo "<p>Payment Status: Paid</p>";
      echo "<button onclick='window.print()'>Print Receipt</button>"; // Print option
    } else {
      echo "<p>Payment Status: Pending</p>";
      // Handle pending payments (e.g., display payment instructions)
    }
  } else {
    echo "No payment found with ID: " . $id;
  }
} else {
  // Handle case where no ID is provided in the GET request
  echo "Missing payment ID.";
}

$database->close();

?>
<?php
// ... your existing code to retrieve and display payment details ...

// Display buttons
echo "<form>";
echo "<button type='button' onclick='window.print()'>Print Receipt</button>";

// Back button with form submission
echo "<button type='submit' formaction='appointment.php'>Back to Appointments</button>";
echo "</form>";
?>
</body>
</center>
</html>