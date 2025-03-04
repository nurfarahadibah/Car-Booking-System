<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    } 
    include 'headercust.php';
   
   

?>


 <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Booking Form</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="custbookprocess.php">
                                          <fieldset>
                                            

                                             <div class="form-group">
                                              <label for="exampleSelect1" class="form-label mt-4">Select vehicle</label>

                                              <?php
                                              $sql="SELECT * FROM tb_vehicle WHERE v_cond='Active' ";
                                              $result= mysqli_query($con, $sql);

                                              echo'<select class="form-select" name="fvehicle" id="exampleSelect1" >';
                                                while($row=mysqli_fetch_array($result))
                                                {
                                                  echo"<option value= '".$row['v_req']."'>".$row['v_model'].", RM".$row['v_price']."</option value>";
                                                }

                                              echo'</select>';

                                              ?>
                                            </div>

                                            <div class="form-group">
                                                  <label for="exampleInputPassword" class="form-label mt-4">Select Pickup Date</label>
                                                  <input type="date" name="fpdate" class="form-control" id="pickupDate" placeholder="Password" autocomplete="off" fdprocessedid="r9e0kn" required min="<?= date('Y-m-d'); ?>">
                                              </div>


                                            <div class="form-group">
                                                  <label for="exampleInputPassword" class="form-label mt-4">Select Return Date</label>
                                                  <input type="date" name="frdate" class="form-control" id="returnDate" placeholder="Password" autocomplete="off" fdprocessedid="r9e0kn" required>
                                              </div>

                                            </fieldset>

                                        <br><br>

                                        <button type="submit" class="btn btn-primary" >Book</button>
                                        <button type="reset" class="btn btn-dark">Delete</button>



                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

<br>
<br><br><br><br><br><br>
<script>
    // Function to set the min attribute of the return date based on the selected pickup date
    function setMinReturnDate() {
        const pickupDateInput = document.getElementById('pickupDate');
        const returnDateInput = document.getElementById('returnDate');

        // Convert date values to Date objects for proper comparison
        const pickupDate = new Date(pickupDateInput.value);
        const returnDate = new Date(returnDateInput.value);

        // Set the min attribute for the return date input
        returnDateInput.min = pickupDateInput.value;

        // Reset the return date value if it's before the pickup date
        if (returnDate < pickupDate) {
            returnDateInput.value = pickupDateInput.value;
        }
    }

    // Attach the setMinReturnDate function to the change event of the pickup date input
    document.getElementById('pickupDate').addEventListener('change', setMinReturnDate);
</script>
<?php include 'footer.php';?>
