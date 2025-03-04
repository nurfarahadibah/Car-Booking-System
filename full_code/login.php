<?php include 'headermain.php'; ?>




<br><br><br>
<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="loginprocess.php">
                                            <div class="form-floating mb-3">
                                              <input type="text" name="fic" class="form-control" id="ic" placeholder="IC number without dash (-)" required>
                                              <label for="ic" class="form-label">IC Number</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" name="fpwd" class="form-control" id="password" placeholder="Password" autocomplete="off" required>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="forgotpassword.php">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <br><br><br><br>
<?php include 'footer.php'; ?>


