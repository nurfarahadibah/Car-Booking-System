<?php
include('mysession.php');

if (!session_id()) {
    session_start();
}

// Get booking Id from url
if (isset($_GET['id'])) {
    $fid = $_GET['id'];
}

include('dbconnect.php');

// Prepare and bind the UPDATE statement with a parameter
$sqlr = "UPDATE tb_vehicle SET v_cond = 'Inactive' WHERE v_req = ?";
$stmt = mysqli_prepare($con, $sqlr);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $fid);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if (!$result) {
        echo "Error updating record: " . mysqli_error($con);
    }
}

mysqli_close($con);

// Redirect
header('location: staffvehicle.php');
?>
