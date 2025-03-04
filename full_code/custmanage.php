<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }
   

//Display result
   include ('headercust.php');

$suic=$_SESSION['suic']; // Get IC of the current user


//CRUD: retrieves booking Operation
$sql="SELECT * FROM tb_booking
      LEFT JOIN tb_vehicle 
      ON tb_booking.b_req = tb_vehicle.v_req
      LEFT JOIN tb_status
      ON tb_booking.b_status = tb_status.s_id
      WHERE b_ic=$suic";

//Execute
$result=mysqli_query($con,$sql);




?>

<br>



<div class="container">
  <button type="button" class="btn btn-primary" onclick="window.location.href='custbook.php'">Add Booking</button><br><br>

  <div class="card mb-4">
  <div class="card-header">
  <i class="fas fa-table me-1"></i>
  Booking                           
  </div>
  <div class="card-body">
                               
  <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Pickup Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Total Rent</th>
      <th scope="col">Status</th>
      <th scope="col">Condition</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row=mysqli_fetch_array($result))
    {
        echo"<tr class='table-light'>";
        echo"<td>".$row['b_id']."</td>";
        echo"<td>".$row['v_model']."</td>";
        echo"<td>".$row['b_pdate']."</td>";
        echo"<td>".$row['b_rdate']."</td>";
        echo"<td>".$row['b_total']."</td>";
        echo"<td>".$row['s_desc']."</td>";
        $badgeColor = ($row['b_cond'] == 'Active') ? 'success' : 'danger';
        echo "<td><span class='badge bg-$badgeColor'>".$row['b_cond']."</span></td>";
        echo"<td>";
          echo "<a href='custmodify.php?id=" . $row['b_id'] . "' class='btn btn-warning'><i class='fas fa-edit'></i></a>&nbsp";
         echo "<a href='#' class='btn btn-danger' onclick='showConfirmation(" . $row['b_id'] . ")'><i class='fas fa-trash-alt'></i></a>";


        echo"</td>";
        echo"</tr>";
    
    }
    
   
    ?>
  </tbody>
</table>

</div></div></div>
<!-- Add SweetAlert2 and the script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>
<script>
function showConfirmation(bId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this booking!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the cancel page with the booking ID
            window.location.href = 'custcancel.php?id=' + bId;
        }
    });
}
</script>
<?php 
mysqli_close($con);

include 'footer.php';?>