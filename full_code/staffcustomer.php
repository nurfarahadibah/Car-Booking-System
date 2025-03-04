<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }


//Display result
  include ('headerstaff.php');






    // Fetch data from  tb_user where u_type=2
$sql_user = "SELECT u_name, u_phone, u_email, u_ic FROM tb_user WHERE u_type = 2";



$result_user = mysqli_query($con, $sql_user);


?>

<br>
<div class="container">

  <h3>Customer Details</h3>
                            
                          <div class="card mb-4">
                          
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               
                            </div>
                            <div class="card-body">
                               
                              <table class="table table-hover" id="datatablesSimple">
                                         <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th>IC</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  // Display data from $result_user in a table
                                  while ($row = mysqli_fetch_assoc($result_user)) {
                                      echo "<tr>";
                                      echo "<td>{$row['u_name']}</td>";
                                      echo "<td>{$row['u_phone']}</td>";
                                      echo "<td>{$row['u_email']}</td>";
                                      echo "<td>{$row['u_ic']}</td>";
                                      echo "</tr>";
                                  }
                                  ?>
                              </tbody>
                            </table>
                            </div>
                           
                         

</div></div>


<?php 
mysqli_close($con);

include 'footer.php';?>