<?php
session_start();

// Connect to the database
include('dbconnect.php');

// Retrieve data from login form
$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];

// CRUD operation
// RETRIEVE - SQL Retrieve Statement with Prepared Statement
$sql = "SELECT * FROM tb_user WHERE u_ic=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 's', $fic);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Retrieve row/data
$row = mysqli_fetch_array($result);

// Compare hashed password
if ($row && password_verify($fpwd, $row['u_pwd'])) {
    // Login successful
    $_SESSION['u_ic'] = session_id();
    $_SESSION['suic'] = $fic;

    if ($row['u_type'] == '1') {
        header('Location: staffmain.php');
    } else {
        header('Location: custmain.php');
    }
} else {
    // Incorrect username or password
    header('Location: login.php');
}

// Close the database connection
mysqli_close($con);
?>
