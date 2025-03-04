<?php
include('mysession.php');

if (!session_id()) {
    session_start();
}

// Get booking Id from url
if (isset($_GET['id'])) {
    $fbid = $_GET['id'];
}

include('dbconnect.php');

// CRUD: UPDATE b_cond to 'Inactive'
$sqlr = "UPDATE tb_booking SET b_cond = 'Cancelled' WHERE b_id = $fbid";

// Execute
$result = mysqli_query($con, $sqlr);

mysqli_close($con);

// Redirect
header('location: custmanage.php');
?>
