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
$sql="SELECT * FROM tb_vehicle";


//Execute
$result=mysqli_query($con,$sql);





?>

<br>
<div class="container">

  <h3>Vehicle Details</h3>
<button type="button" class="btn btn-primary" onclick="window.location.href='staffvehicleadd.php'">Add Vehicle</button><br><br>
                            
                          <div class="card mb-4">
                          
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               
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
                                  <th scope="col">Operation</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo"<tr class='table-light'>";
                                    echo"<td>".$row['v_req']."</td>";
                                    echo"<td>".$row['v_model']."</td>";
                                    echo"<td>".$row['v_type']."</td>";
                                    echo"<td>".$row['v_colour']."</td>";
                                    echo"<td>".$row['v_price']."</td>";
                                    // Display a badge with different colors based on the value in the "v_cond" column
                                    $badgeColor = ($row['v_cond'] == 'Active') ? 'success' : 'danger';
                                    echo "<td><span class='badge bg-$badgeColor'>".$row['v_cond']."</span></td>";

                                    echo "<td>";
      echo "<a href='staffvehicleedit.php?id=" . $row['v_req'] . "' class='btn btn-warning' data-bs-toggle='tooltip' title='Edit'>";
      echo "<i class='fas fa-edit'></i>";
      echo "</a>&nbsp;";


echo "<a href='#' class='btn btn-danger delete-btn' data-bs-toggle='tooltip' title='Delete' onclick='confirmDelete(\"" . $row['v_req'] . "\")'>";
echo "<i class='fas fa-trash-alt'></i>";
echo "</a>&nbsp;";

echo "<a href='#' class='btn btn-success' data-bs-toggle='tooltip' title='Activate' onclick='confirmActivate(\"" . $row['v_req'] . "\")'>";
echo "<i class='fas fa-check'></i>";
echo "</a>&nbsp;";
echo "</td>";
                                    echo"</tr>";
                                
                                }
                                
                               
                                ?>
                              </tbody>
                            </table>
                            </div>
                           
                         

</div></div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>
<script>
    $(function () {
        // Enable Bootstrap tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

  function confirmDelete(vReq) {
    Swal.fire({
      title: 'Are you sure you want to inactivate this vehicle?',
      text: 'You  might\'t be able to revert this!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'staffvehicledelete.php?id=' + vReq;
      }
    });
  }

  function confirmActivate(vReq) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to activate this vehicle?',
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, activate it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'staffvehicleactivate.php?id=' + vReq;
      }
    });
  }


</script>

<?php 
mysqli_close($con);

include 'footer.php';?>