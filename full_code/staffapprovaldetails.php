<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }

    //Get booking Id from url
    if(isset($_GET['id']))
    {
      $fbid=$_GET['id'];
    }

//Display result
  include ('headerstaff.php');

//select the booking for all 

//CRUD: retrieves current booking Operation
$sql="SELECT * FROM tb_booking
      LEFT JOIN tb_vehicle ON tb_booking.b_req = tb_vehicle.v_req
      LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
      LEFT JOIN tb_user ON tb_booking.b_ic = tb_user.u_ic
      WHERE b_id =$fbid";


//Execute
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);




?>

<br>
<div class="container">

  <h3>Bookings Details</h3>

  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
    <div class="card-body">

 <form method="POST" action="staffapprovalprocess.php">
  
  <table class="table table-hover">
  <tbody>
    <tr>
      <td>Booking ID</td>
      <td><?php echo $row['b_id']; ?></td>
    </tr>

    <tr>
       <td>User ID</td>
      <td><?php echo $row['b_ic']; ?></td>
    </tr>

    <tr>
       <td>User Name</td>
      <td><?php echo $row['u_name']; ?></td>
    </tr>

    <tr>
      <td>Vehicle ID</td>
      <td><?php echo $row['b_req']; ?></td>
    </tr>

    <tr>
       <td>Vehicle Model</td>
      <td><?php echo $row['v_model']; ?></td>
    </tr>

    <tr>
       <td>Pickup Date</td>
      <td><?php echo $row['b_pdate']; ?></td>
    </tr>

    <tr>
       <td>Return Date</td>
      <td><?php echo $row['b_rdate']; ?></td>
    </tr>

    <tr>
      <td>Price Per Day</td>
      <td><?php echo $row['v_price']; ?></td>
    </tr>

    <tr>
       <td>Total Price</td>
      <td><?php echo $row['b_total']; ?></td>
    </tr>
    <tr>
       <td>Approval</td>
      <td>

        <?php 
        $sqls="SELECT * FROM tb_status";
        $results=mysqli_query($con,$sqls);
        echo'<select class="form-select" name="fstatus" id="exampleSelect1" >';

        while ($rows=mysqli_fetch_array($results))
        {

          if($rows['s_id'] != '1')
            {
               echo"<option value= '".$rows['s_id']."'>".$rows['s_desc']."</option value>";

            }
        }
              echo'</select>';


    ?>
      

    </td>
    </tr>
    <tr>
       <td><input type="hidden" value="<?php echo $row['b_id']; ?>" name="fbid" ></td>
      <td><button type="submit" class="btn btn-warning" >Approval</button></td>
    </tr>

  </tbody> 
  </tbody>
   
  

</table></form></div></div>
<br><br><br><br>
</div>
<?php 
mysqli_close($con);

include 'footer.php';?>