<?php include 'headerstaff.php'; 

 
            ?>



<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Vehicle Form</h3></div>

                                        <?php // Check for the error parameter in the URL
                                        if (isset($_GET['error']) && $_GET['error'] === 'duplicate') {
                                            echo '<div class="alert alert-danger" role="alert">';
                                            echo 'A vehicle with the same registration number already exists. Please choose a different registration number.';
                                            echo '</div>';
                                        }
                                        ?>
                                        <div class="card-body">
                                        <form method="POST" action="staffvehicleaddprocess.php">
                                            <fieldset>
                                                <legend></legend>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="ic" class="form-label">Registration number</label>
                                                        <input type="text" name="freq" class="form-control" id="ic" placeholder="Vehicle registration number without space" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Model</label>
                                                        <input type="text" name="fmodel" class="form-control" id="name" placeholder="Enter the model of the vehicle" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="type" class="form-label">Type</label>
                                                        <select name="ftype" class="form-control" id="type" required>
                                                            <!-- Add the options for car types dynamically -->
                                                            <option value="" selected disabled>Select car type</option>
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
                                                        <input type="text" name="fcolour" class="form-control" id="pn" placeholder="Enter the colour of the vehicle" required>
                                                    </div>
                                                </div>

                                                  <div class="col-md-6">
                                                        <label for="pn" class="form-label">Price Per Day (RM)</label>
                                                        <input type="number" name="fprice" class="form-control" id="pn" placeholder="Enter the price per day (RM)" step="0.01" required>
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
