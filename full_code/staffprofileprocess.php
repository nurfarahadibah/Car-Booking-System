<?php
include('mysession.php');
if (!session_id()) {
    session_start();
} 
// Connect to the database
include('dbconnect.php');

// Retrieve data from the edit profile form
$fic = $_POST['fic'];
$fname = $_POST['fname'];
$fphone = $_POST['fphone'];
$femail = $_POST['femail'];
$flic = $_POST['flic'];
$fadd = $_POST['fadd'];




// CRUD operation
// UPDATE - SQL Update Statement with prepared statement
$sql = "UPDATE tb_user 
        SET  u_name=?, u_phone=?, u_email=?, u_add=?, u_lic=? 
        WHERE u_ic=?";
        
// Create a prepared statement
$stmt = mysqli_prepare($con, $sql);

// Bind parameters to the statement
mysqli_stmt_bind_param($stmt, "ssssss", $fname, $fphone, $femail, $fadd, $flic, $suic);

// Execute the statement
mysqli_stmt_execute($stmt);

// Close the statement
mysqli_stmt_close($stmt);

// Close database connection
mysqli_close($con);

// Redirect to the next page
header('Location: staffmain.php'); 
?>
