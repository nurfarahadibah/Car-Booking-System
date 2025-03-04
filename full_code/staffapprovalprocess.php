<?php
include('mysession.php');
if (!session_id()) {
    session_start();
}
include('dbconnect.php');

// retrieve data from form and session
$fbid = $_POST['fbid'];
$fstatus = $_POST['fstatus'];

// CRUD: Update current booking using prepared statement
$sql = "UPDATE tb_booking
        SET b_status=?
        WHERE b_id=?";
        
// Create a prepared statement
$stmt = mysqli_prepare($con, $sql);

// Bind parameters to the statement
mysqli_stmt_bind_param($stmt, "si", $fstatus, $fbid);

// Execute the statement
mysqli_stmt_execute($stmt);

// Close the statement
mysqli_stmt_close($stmt);

// Close db connection
mysqli_close($con);

header('Location: staffmanage.php');
?>
