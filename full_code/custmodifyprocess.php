<?php
include('mysession.php');
if (!session_id()) {
    // session_start(); // You may uncomment this line if session_start is necessary
}
// Display result
include('headercust.php');

// Retrieve data from form and session
$fbid = $_POST['fbid'];
$fvehicle = $_POST['fvehicle'];
$fpdate = $_POST['fpdate'];
$frdate = $_POST['frdate'];

// Calculate total rent price
// 1. Convert form date to ISO8601 format
$start = date('Y-m-d H:i:s', strtotime($fpdate)); // convert string to date
$end = date('Y-m-d H:i:s', strtotime($frdate));
// 2. Calculate number of days
$daydiff = abs(strtotime($start) - strtotime($end)); // diff in sec
$daynum = $daydiff / (60 * 60 * 24); // in days (86400 sec per day)
// 3. Get vehicle price from table using prepared statement
$sqlp = "SELECT v_price FROM tb_vehicle WHERE v_req=?";
$stmt = mysqli_prepare($con, $sqlp);
mysqli_stmt_bind_param($stmt, "s", $fvehicle);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $v_price);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// 4. Calculate total price
$totalprice = $daynum * $v_price;

// CRUD: Update current booking using prepared statement
$sql = "UPDATE tb_booking
        SET b_req=?, b_pdate=?, b_rdate=?, b_total=?, b_status='1'
        WHERE b_id=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sssdi", $fvehicle, $fpdate, $frdate, $totalprice, $fbid);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_close($con);


?>
<div class="container">
    <br>
    <h5>Here's your updated booking details</h5><br><br>

    <h5>Vehicle: <?php echo $fvehicle; ?></h5>
    <h5>Pickup date: <?php echo $fpdate; ?></h5>
    <h5>Return date: <?php echo $frdate; ?></h5>
    <h5>Duration: <?php echo $daynum; ?></h5>
    <h5>Total Price: <?php echo $totalprice; ?></h5>
    <h5>Status: Received</h5>
</div>
<?php include 'footer.php'; ?>
