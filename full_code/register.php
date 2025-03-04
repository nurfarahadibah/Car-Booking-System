<?php include 'headermain.php'; 
 
           
?>
<br><br>




<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
        
                                        <div class="card-body">
                                        <form method="POST" action="registerprocess.php">
                                            <fieldset>
                                                

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="ic" class="form-label">IC Number</label>
                                                        <input type="number" name="fic" class="form-control" id="ic" placeholder="IC number without dash (-)" required>
                                                        <?php  if (isset($_GET['error']) && $_GET['error'] == 'ic_12') {
                                            echo '<div class="text-danger">IC Number should be exactly 12 digits.</div>';}?>
                                                   
                                                    <?php  if (isset($_GET['error']) && $_GET['error'] == 'existing_ic') {
                                            echo '<div class="text-danger">IC Number already exist</div>';}?>
 </div>
                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" name="fname" class="form-control" id="name" placeholder="Full name according to IC" required>
                                                       
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" name="fpwd" class="form-control" id="password" placeholder="Password" autocomplete="off" required>
                                                         <?php  if (isset($_GET['error']) && $_GET['error'] == 'fpwd_8') {
                                            echo '<div class="text-danger">Password should not be less than 8 characters</div>';}
                                                                if (isset($_GET['error']) && $_GET['error'] == 'fpwd_empty') {
                                            echo '<div class="text-danger">Passwords should not be empty</div>';
                                        }?>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                                        <input type="password" name="fcpwd" class="form-control" id="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
                                                        <?php  if (isset($_GET['error']) && $_GET['error'] == 'password_mismatch') {
                                            echo '<div class="text-danger">Passwords do not match. Please try again.</div>';}
                                                                if (isset($_GET['error']) && $_GET['error'] == 'fcpwd_empty') {
                                            echo '<div class="text-danger">Confirm passwords should not be empty</div>';
                                        }?>
                                                    </div>

                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" name="femail" class="form-control" id="email" placeholder="Enter email" required>
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        <?php  if (isset($_GET['error']) && $_GET['error'] == 'existing_email') {
                                            echo '<div class="text-danger">Email already exist</div>';}?>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="license" class="form-label">License No</label>
                                                        <input type="text" name="flic" class="form-control" id="license" placeholder="Include your License No." required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="pn" class="form-label">Phone Number</label>
                                                        <input type="text" name="fphone" class="form-control" id="pn" placeholder="Include your phone No." required>
                                                         <?php  if (isset($_GET['error']) && $_GET['error'] == 'existing_phone') {
                                            echo '<div class="text-danger">Phone number already exist</div>';}?>
                                                    </div>
                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea name="fadd" class="form-control" id="address" rows="3" required></textarea>
                                                </div></div>

                                            </fieldset>
                                            <div style="text-align: center;">
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Register</button>
                                                
                                                <button type="reset" class="btn btn-dark">Clear</button>
                                            </div></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>



<br><br><br><br><br><br>
<?php include 'footer.php'; ?>
