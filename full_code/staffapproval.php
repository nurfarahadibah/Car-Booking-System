<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }

//Display result
  include ('headerstaff.php');

//select the booking for all 

//CRUD: retrieves current booking Operation
$sql="SELECT * FROM tb_booking
      LEFT JOIN tb_vehicle ON tb_booking.b_req = tb_vehicle.v_req
      LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
      WHERE b_status ='1'";


//Execute
$result=mysqli_query($con,$sql);





?>

<br>
<div class="container">

  <h3>New Booking</h3>
  
  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
                            <div class="card-body">
                               
                              <table class="table table-hover" id="datatablesSimple">
 
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Pickup Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Total Rent</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row=mysqli_fetch_array($result))
    {
        echo"<tr class='table-light'>";
        echo"<td>".$row['b_id']."</td>";
        echo"<td>".$row['b_ic']."</td>";
        echo"<td>".$row['v_model']."</td>";
        echo"<td>".$row['b_pdate']."</td>";
        echo"<td>".$row['b_rdate']."</td>";
        echo"<td>".$row['b_total']."</td>";
        echo"<td>";
          echo"<a href='staffapprovaldetails.php?id=".$row['b_id']."'class='btn btn-warning'>Approval</a>&nbsp";


        echo"</td>";
        echo"</tr>";
    
    }
    
   
    ?>
  </tbody>
</table>

</div></div></div>
<?php 
mysqli_close($con);

include 'footer.php';?>