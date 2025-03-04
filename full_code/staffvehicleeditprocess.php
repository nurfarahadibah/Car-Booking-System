<?php
include('mysession.php');
include('dbconnect.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fmodel = $_POST['fmodel'];
    $ftype = $_POST['ftype'];
    $fcolour = $_POST['fcolour'];
    $fprice = $_POST['fprice'];

    // Edit mode: Update the existing record in the database
    $v_req = $_POST['v_req'];






    // Use prepared statement to prevent SQL injection
    $sql = "UPDATE tb_vehicle SET
            v_model = ?,
            v_type = ?,
            v_colour = ?,
            v_price = ?
            WHERE v_req = ?";

    // create a prepared statement
    $stmt = mysqli_prepare($con, $sql);

    // bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssdsi", $fmodel, $ftype, $fcolour, $fprice, $v_req);

    // execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    // close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect or handle the case where the form wasn't submitted properly
    echo "Invalid request";
}

// Close the database connection
mysqli_close($con);

// Redirect
header('location: staffvehicle.php');
?>
