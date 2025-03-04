<?php
// connect to the database
include('dbconnect.php');

// retrieve data from the vehicle registration form
$freq = $_POST['freq'];
$fmodel = $_POST['fmodel'];
$ftype = $_POST['ftype'];
$fcolour = $_POST['fcolour'];
$fprice = $_POST['fprice'];



$sqlCheckDuplicate = "SELECT COUNT(*) FROM tb_vehicle WHERE v_req = ?";
$stmtCheckDuplicate = mysqli_prepare($con, $sqlCheckDuplicate);
mysqli_stmt_bind_param($stmtCheckDuplicate, "s", $freq);
mysqli_stmt_execute($stmtCheckDuplicate);
mysqli_stmt_bind_result($stmtCheckDuplicate, $count);
mysqli_stmt_fetch($stmtCheckDuplicate);
mysqli_stmt_close($stmtCheckDuplicate);

if ($count > 0) {
    // Duplicate entry found
    // You can customize the error message or redirect to the form with an error message
    header('Location: staffvehicleadd.php?error=duplicate');
    exit();
}
// CRUD operation
// CREATE - SQL Insert Statement for vehicle details with prepared statement
$sql = "INSERT INTO tb_vehicle(v_req, v_model, v_type, v_colour, v_price)
        VALUES (?, ?, ?, ?, ?)";

// create a prepared statement
$stmt = mysqli_prepare($con, $sql);

// bind parameters to the statement
mysqli_stmt_bind_param($stmt, "ssssd", $freq, $fmodel, $ftype, $fcolour, $fprice);

// execute the statement
mysqli_stmt_execute($stmt);

// close the statement
mysqli_stmt_close($stmt);

// close database connection
mysqli_close($con);

// redirect to the next page (adjust the location accordingly)
header('Location: staffvehicle.php');
?>
