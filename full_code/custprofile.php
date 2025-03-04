<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    } 
    include 'headercust.php';
   


//CRUD: retrieves booking Operation
$sqlu="SELECT * FROM tb_user
        JOIN tb_type ON tb_user.u_type=tb_type.t_id
      WHERE u_ic=$suic";

//Execute
$resultu=mysqli_query($con,$sqlu);

if ($resultu) {
    // Fetch the associative array from the result
    $rowu = mysqli_fetch_assoc($resultu);

    // Check if a row was fetched
    if ($rowu) {
        // Access the 'u_name' field from the associative array
         $u_name = $rowu['u_name'];
         $u_status = $rowu['t_desc'];
         $u_ic = $rowu['u_ic'];
         $u_pwd = $rowu['u_pwd'];
         $u_phone = $rowu['u_phone'];
         $u_email = $rowu['u_email'];
         $u_add = $rowu['u_add'];
         $u_lic = $rowu['u_lic'];

        
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Profile Form</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="custprofileprocess.php">
                                            <fieldset>
                                                

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="ic" class="form-label">IC Number</label>
                                                        <input type="text" name="fic" class="form-control" id="ic" placeholder="IC number without dash (-)" required value="<?= $u_ic ?>" disabled>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" name="fname" class="form-control" id="name" placeholder="Full name according to IC" required value="<?= $u_name ?>" >
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    

                                                    <div class="col-md-6">
                                                        <label for="pn" class="form-label">Phone Number</label>
                                                        <input type="text" name="fphone" class="form-control" id="pn" placeholder="Include your phone No." required value="<?= $u_phone ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" name="femail" class="form-control" id="email" placeholder="Enter email" required value="<?= $u_email ?>">
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="license" class="form-label">License No</label>
                                                        <input type="text" name="flic" class="form-control" id="license" placeholder="Include your License No." required value="<?= $u_lic ?>">
                                                    </div>
                                                </div>
                                           

                                                <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea name="fadd" class="form-control" id="address" rows="3" required><?= $u_add ?></textarea>
                                            </div>


                                            </fieldset>

                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-dark">Clear</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<br>
<br><br><br><br><br><br>

<?php include 'footer.php';?>
