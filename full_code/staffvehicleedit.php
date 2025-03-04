<?php include 'headerstaff.php'; ?>
<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    } 
  
   
if (isset($_GET['id'])) 
    $v_req = $_GET['id'];

//CRUD: retrieves booking Operation
 $sqlu = "SELECT * FROM tb_vehicle WHERE v_req = '$v_req'";

//Execute
$resultu=mysqli_query($con,$sqlu);

if ($resultu) {
    // Fetch the associative array from the result
    $rowu = mysqli_fetch_assoc($resultu);

    // Check if a row was fetched
    if ($rowu) {
        // Access the 'u_name' field from the associative array
         $v_req = $rowu['v_req'];
         $v_model = $rowu['v_model'];
         $v_type = $rowu['v_type'];
         $v_price = $rowu['v_price'];
         $v_colour = $rowu['v_colour'];
     

        
    } else {
        // No rows found
        echo "No user found.";
    }

    // Free the result set
    mysqli_free_result($resultu);
} else {
    // Query failed
    echo "Error executing query: " . mysqli_error($con);
}
   

?>


<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Vehicle Form</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="staffvehicleeditprocess.php">
                                            <fieldset>
                                                <legend></legend>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="v_req" value="<?php echo $v_req; ?>">

                                                        <label for="ic" class="form-label">Registration number</label>
                                                        <input type="text" name="freq" class="form-control" id="ic" placeholder="Vehicle registration number without space" value="<?php echo $v_req; ?>" required disabled>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Model</label>
                                                        <input type="text" name="fmodel" class="form-control" id="name" placeholder="Enter the model of the vehicle" value="<?php echo $v_model; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="type" class="form-label">Type</label>
                                                        <select name="ftype" class="form-control" id="type" value="<?php echo $v_type; ?>" required>
                                                            <!-- Add the options for car types dynamically -->
                                                            <option value="<?php echo $v_type; ?>" selected><?php echo $v_type; ?></option>
                                                            <?php
                                                                // Array of car types in Malaysia
                                                                $carTypes = array(
                                                                    'Sedan', 'Hatchback', 'SUV', 'MPV',
                                                                    'Crossover', 'Coupe', 'Convertible', 'Luxury Car', 'Wagon'
                                                                );

                                                                // Loop through the array to generate options
                                                                foreach ($carTypes as $type) {
                                                                    echo "<option value=\"$type\">$type</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="pn" class="form-label">Colour</label>
                                                        <input type="text" name="fcolour" class="form-control" id="pn" placeholder="Enter the colour of the vehicle" value="<?php echo $v_colour; ?>" required>
                                                    </div>
                                                </div>

                                                  <div class="col-md-6">
                                                        <label for="pn" class="form-label">Price Per Day (RM)</label>
                                                        <input type="number" name="fprice" class="form-control" id="pn" placeholder="Enter the price per day (RM)" step="0.01" value="<?php echo $v_price; ?>" required>
                                                  </div>

                                                <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-dark">Clear</button>
                                            </div>

                                                </div>

                                            </fieldset>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<br><br><br><br><br><br>
<?php include 'footer.php'; ?>
