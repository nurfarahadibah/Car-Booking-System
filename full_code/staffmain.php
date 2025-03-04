<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }
    include 'headerstaff.php';


    // Fetch data from tb_vehicle, tb_booking, and tb_user where u_type=2
$sql_vehicle = "SELECT v_req, v_model, v_type, v_cond, v_colour, v_price FROM tb_vehicle WHERE v_cond='Active'";
$sql_booking = "SELECT * FROM tb_booking JOIN tb_status ON tb_booking.b_status=tb_status.s_id";
$sql_user = "SELECT u_name, u_phone, u_email, u_ic FROM tb_user WHERE u_type = 2";


$result_vehicle = mysqli_query($con, $sql_vehicle);
$result_booking = mysqli_query($con, $sql_booking);
$result_user = mysqli_query($con, $sql_user);


// Get counts from each table
$sql_vehicle_count = "SELECT COUNT(*) AS vehicle_count FROM tb_vehicle WHERE v_cond='Active'";
$sql_booking_count = "SELECT COUNT(*) AS booking_count FROM tb_booking";
$sql_booking_count_unapprove = "SELECT COUNT(*) AS booking_count_unapprove FROM tb_booking WHERE b_status=1" ;
$sql_booking_count_approve = "SELECT COUNT(*) AS booking_count_approve FROM tb_booking WHERE b_status=2" ;
$sql_booking_count_reject = "SELECT COUNT(*) AS booking_count_reject FROM tb_booking WHERE b_status=3" ;


$sql_customer_count = "SELECT COUNT(*) AS customer_count FROM tb_user WHERE u_type = 2";

$result_vehicle_count = mysqli_query($con, $sql_vehicle_count);
$result_booking_count = mysqli_query($con, $sql_booking_count);
$result_booking_count_unapprove = mysqli_query($con, $sql_booking_count_unapprove);
$result_booking_count_approve = mysqli_query($con, $sql_booking_count_approve);
$result_booking_count_reject = mysqli_query($con, $sql_booking_count_reject);

$result_customer_count = mysqli_query($con, $sql_customer_count);

// Fetch counts
$vehicle_count = mysqli_fetch_assoc($result_vehicle_count)['vehicle_count'];
$booking_count = mysqli_fetch_assoc($result_booking_count)['booking_count'];
$booking_count_unapprove = mysqli_fetch_assoc($result_booking_count_unapprove)['booking_count_unapprove'];
$booking_count_approve = mysqli_fetch_assoc($result_booking_count_approve)['booking_count_approve'];
$booking_count_reject = mysqli_fetch_assoc($result_booking_count_reject)['booking_count_reject'];

$customer_count = mysqli_fetch_assoc($result_customer_count)['customer_count'];

$dayDataSales = array();
$dateLabelsSales = array();

for ($i = 0; $i < 7; $i++) {  // Start from the current date and go back 6 days
    $startOfWeek = date('Y-m-d', strtotime('last Sunday'));  // Get the start of the current week
        $currentDate = date('Y-m-d', strtotime("$startOfWeek + $i days"));


    // Get total sales for the current date
    $sql_sales = "SELECT SUM(b_total) AS total_sales FROM tb_booking
                  WHERE DATE(b_pdate) = '$currentDate' AND (b_status = 2 OR b_status = 1) ";  // Assuming status 2 is approved
    $result_sales = $con->query($sql_sales);
    $row_sales = $result_sales->fetch_assoc();
    $dayDataSales[] = $row_sales['total_sales'] ? $row_sales['total_sales'] : 0;
    $dateLabelsSales[] = $currentDate;
}

// Convert the PHP arrays to JSON for use in JavaScript
$dayDataSalesJSON = json_encode($dayDataSales);
$dateLabelsSalesJSON = json_encode($dateLabelsSales);

$dayData = array();
$dateLabels = array();

// Fetch the total booking count for each day of the week
for ($i = 0; $i < 7; $i++) {
    $startOfWeek = date('Y-m-d', strtotime('last Sunday'));  // Get the start of the current week
    $currentDate = date('Y-m-d', strtotime("$startOfWeek + $i days"));

    $sql_booking_count = "SELECT COUNT(*) AS booking_count FROM tb_booking
                          WHERE DATE(b_pdate) = '$currentDate'";
    
    $result_booking_count = $con->query($sql_booking_count);
    $row_booking_count = $result_booking_count->fetch_assoc();
    
    $dayData[] = $row_booking_count['booking_count'];
    $dateLabels[] = $currentDate;  // Collect booking dates for labels
}

// Convert the PHP arrays to JSON for use in JavaScript
$dayDataJSON = json_encode($dayData);
$dateLabelsJSON = json_encode($dateLabels);


//CRUD: retrieves current booking Operation
$sqlv="SELECT * FROM tb_vehicle";


//Execute
$resultv=mysqli_query($con,$sqlv);

?>

<div class="container">

<main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Dashboard</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                        <div class="row">
   
    <div class="col-xl-2 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">Total Bookings</h5>
                <p class="card-text"><?php echo $booking_count; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="staffmanage.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div> 
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">Total Active Vehicles</h5>
                <p class="card-text"><?php echo $vehicle_count; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="staffvehicle.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h5 class="card-title">Total Customers</h5>
                <p class="card-text"><?php echo $customer_count; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="staffcustomer.php" >View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
            <h5 class="card-title">Unapprove Bookings</h5>
                <p class="card-text"><?php echo $booking_count_unapprove; ?></p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="staffapproval.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
    </div>
</div>
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Booking Status
                                    </div>
                                    <div class="card-body">
                                        <div style="max-width: 100%; overflow: hidden;">
                                            <canvas id="myPieChart" style="max-height: 240px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Total Bookings
                                    </div>
                                    <div class="card-body"><canvas id="bookingBarChart" width="100%" height="250"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Total Sales
                                    </div>
                                    <div class="card-body"><canvas id="saleAreaChart" width="100%" height="250"></canvas></div>
                                </div>
                            </div>


                         <div class="col-xl-6">
                        <div class="card mb-4" >
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Vehicle
                            </div>
                            <div class="card-body">
                               <table class="table table-hover" id="datatablesSimple">
                              <thead>
                                <tr>
                                  <th scope="col">Registration</th>
                                  <th scope="col">Model</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Colour</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Condition</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                while($rowv=mysqli_fetch_array($resultv))
                                {
                                    echo"<tr class='table-light'>";
                                    echo"<td>".$rowv['v_req']."</td>";
                                    echo"<td>".$rowv['v_model']."</td>";
                                    echo"<td>".$rowv['v_type']."</td>";
                                    echo"<td>".$rowv['v_colour']."</td>";
                                    echo"<td>".$rowv['v_price']."</td>";
                                    // Display a badge with different colors based on the value in the "v_cond" column
                                    $badgeColor = ($rowv['v_cond'] == 'Active') ? 'success' : 'danger';
                                    echo "<td><span class='badge bg-$badgeColor'>".$rowv['v_cond']."</span></td>";

                                    
                                    echo"</tr>";
                                
                                }
                                
                               
                                ?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                      
                </div></div>
                </main>
<!-- Include Moment.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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

    function scrollToCustomerTable() {
        // Get the offsetTop of the customer table section
        var customerTableSection = document.getElementById('customerTableSection');
        var offsetTop = customerTableSection.offsetTop;

        // Scroll to the customer table section with a smooth effect
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }

   
</script>

<script>
    // Parse the JSON data
    var dayData = <?php echo $dayDataJSON; ?>;
    var dateLabels = <?php echo json_encode($dateLabels); ?>;

    // Format date labels to the desired format
    var formattedDateLabels = dateLabels.map(function (date) {
        return new Date(date).toLocaleDateString('en-GB', { day: 'numeric', month: 'short' });
    });

    // Get the canvas element for the bar chart
    var ctx = document.getElementById('bookingBarChart').getContext('2d');

    // Create and render the bar chart for total bookings
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: formattedDateLabels,
            datasets: [{
                label: 'Total Bookings',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                data: dayData,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Booking Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Total Bookings'
                    },
                    beginAtZero: true,
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
            }
        }
    });
</script>

<script>
    window.onload = function () {
        // Parse the JSON data for total sales
        var dayDataSales = <?php echo $dayDataSalesJSON; ?>;
        var dateLabelsSales = <?php echo json_encode($dateLabelsSales); ?>;

        // Format date labels to the desired format using Moment.js
        var formattedDateLabelsSales = dateLabelsSales.map(function (date) {
            return moment(date).format('MMM D');
        });

        // Get the canvas element for the area chart
        var areaCtx = document.getElementById('saleAreaChart').getContext('2d');

        // Create and render the area chart for total sales
        var myAreaChart = new Chart(areaCtx, {
            type: 'line',
            data: {
                labels: formattedDateLabelsSales,
                datasets: [{
                    label: 'Total Sales',
                    fill: true,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    data: dayDataSales,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day',
                            parser: 'MMM D',  // Use the same format as formattedDateLabelsSales
                            tooltipFormat: 'D MMM',
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Sales'
                        },
                        beginAtZero: true,
                        min: 0,
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                }
            }
        });
    };
</script>

<script>
    $(document).ready(function () {
        $('#datatablesSimple').DataTable({
            "pageLength": 5  // Set the default number of entries per page to 5
        });
    });
    $(document).ready(function () {
    $('#vehicleTable').DataTable({
        "pageLength": 5,  // Set the default number of entries per page to 5
        // Add any additional options or configurations as needed
    });
});

</script>

<?php include 'footer.php'; ?>