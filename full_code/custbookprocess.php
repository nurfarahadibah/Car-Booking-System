<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }
//Display result
  include ('headercust.php');

//retrieve data from form and session

$fvehicle=$_POST['fvehicle'];
$fpdate=$_POST['fpdate'];
$frdate=$_POST['frdate'];
$suic=$_SESSION['suic'];

//CALCULATE TOTAL RENT PRICE
//1. Convert form date to ISO8...
$start=date('Y-m-d H:i:s', strtotime($fpdate));// convert string to date 
$end=date('Y-m-d H:i:s', strtotime($frdate));
//2. Calculate number of days
$daydiff=abs(strtotime($start)-strtotime($end)); // diff in sec
$daynum=$daydiff/(60*60*24); //in days (86400 sec per day)
//3. Get vehicle price from table
$sqlp="SELECT v_price FROM tb_vehicle WHERE v_req='$fvehicle'";

$resultp=mysqli_query($con,$sqlp);
$rowp=mysqli_fetch_array($resultp);

//4.Calculate total price
$totalprice=$daynum*($rowp['v_price']);


//INSERT new booking
$sql="INSERT INTO tb_booking(b_ic, b_req, b_pdate, b_rdate, b_total, b_status)
      VALUES('$suic','$fvehicle','$fpdate','$frdate','$totalprice','1')";

mysqli_query($con,$sql);
mysqli_close($con);




?>
<div class="container">
  <br>
  <h5>Thank You for your booking. Here's your booking details</h5><br><br>


  <h5>Customer ID: <?php echo $suic;?></h5>
  <h5>Vehicle: <?php echo $fvehicle;?></h5>
  <h5>Pickup date: <?php echo $fpdate;?></h5>
  <h5>Return date: <?php echo $frdate;?></h5>
  <h5>Duration: <?php echo $daynum;?></h5>
  <h5>Total Price: <?php echo $totalprice;?></h5>
  <h5>Status: Received</h5>



</div>
<?php include 'footer.php';?>