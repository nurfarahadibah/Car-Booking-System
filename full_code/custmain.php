<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }
    include 'headercust.php';


// Get counts from each table
$sql_booking_count = "SELECT COUNT(*) AS booking_count FROM tb_booking WHERE b_ic='$suic'";
$sql_booking_count_cancel = "SELECT COUNT(*) AS booking_count_cancel FROM tb_booking WHERE b_cond='Cancelled' AND b_ic='$suic'" ;
$sql_booking_count_approve = "SELECT COUNT(*) AS booking_count_approve FROM tb_booking WHERE b_status=2 AND b_ic='$suic'" ;
$sql_booking_count_unapprove = "SELECT COUNT(*) AS booking_count_unapprove FROM tb_booking WHERE b_status=1 AND b_ic='$suic'" ;
$sql_booking_count_reject = "SELECT COUNT(*) AS booking_count_reject FROM tb_booking WHERE b_status=3 AND b_ic='$suic'" ;


$result_booking_count = mysqli_query($con, $sql_booking_count);
$result_booking_count_cancel = mysqli_query($con, $sql_booking_count_cancel);
$result_booking_count_unapprove = mysqli_query($con, $sql_booking_count_unapprove);
$result_booking_count_approve = mysqli_query($con, $sql_booking_count_approve);
$result_booking_count_reject = mysqli_query($con, $sql_booking_count_reject);

// Fetch counts
$booking_count = mysqli_fetch_assoc($result_booking_count)['booking_count'];
$booking_count_cancel = mysqli_fetch_assoc($result_booking_count_cancel)['booking_count_cancel'];
$booking_count_unapprove = mysqli_fetch_assoc($result_booking_count_unapprove)['booking_count_unapprove'];
$booking_count_approve = mysqli_fetch_assoc($result_booking_count_approve)['booking_count_approve'];
$booking_count_reject = mysqli_fetch_assoc($result_booking_count_reject)['booking_count_reject'];


?>

<div class="container">

<main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Dashboard</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
  
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">Total Bookings</h5>
                <p class="card-text"><?php echo $booking_count; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="custmanage.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">Approved Bookings</h5>
                <p class="card-text"><?php echo $booking_count_approve; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="custmanage.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
            <h5 class="card-title">Cancelled Bookings</h5>
                <p class="card-text"><?php echo $booking_count_cancel; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="custmanage.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
    </div>
</div>
</div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Booking Status
                                    </div>
                                    <div class="card-body">
                                        <div style="max-width: 100%; overflow: hidden;">
                                            <canvas id="myPieChart" style="max-height: 230px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Get the counts from PHP
    var bookingCountApprove = <?php echo $booking_count_approve; ?>;
    var bookingCountReject = <?php echo $booking_count_reject; ?>;
    var bookingCountUnapprove = <?php echo $booking_count_unapprove; ?>;

    // Pie chart data
    var pieData = {
        labels: ['Approved', 'Rejected', 'Unapproved'],
        datasets: [{
            data: [bookingCountApprove, bookingCountReject, bookingCountUnapprove],
            backgroundColor: ['#28a745', '#dc3545', '#ffc107']
        }]
    };

    // Get the canvas element
    var ctx = document.getElementById('myPieChart').getContext('2d');

    // Create and render the pie chart
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: pieData,
        options: {
            responsive: true
        }
    });
</script>

<?php include 'footer.php'; ?>