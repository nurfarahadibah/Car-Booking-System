<?php 
    include('mysession.php');
    if(!session_id())
    {
      session_start();
    }
    include ('dbconnect.php');

//retrieve data from form and session


$suic=$_SESSION['suic']; // Get IC of the current user


//CRUD: retrieves booking Operation
$sql="SELECT * FROM tb_user
        JOIN tb_type ON tb_user.u_type=tb_type.t_id
      WHERE u_ic=$suic";

//Execute
$result=mysqli_query($con,$sql);

if ($result) {
    // Fetch the associative array from the result
    $row = mysqli_fetch_assoc($result);

    // Check if a row was fetched
    if ($row) {
        // Access the 'u_name' field from the associative array
        $u_name = $row['u_name'];
         $u_status = $row['t_desc'];

        
    } else {
        // No rows found
        echo "No user found.";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Query failed
    echo "Error executing query: " . mysqli_error($con);
}




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ABC Rental</title>
        <link rel="icon" type="image/x-icon" href="assets/img/car.ico">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-fnF5cPXG1KejruhB4j9ov3nZRiypNl8w+AJw9wvMyKwb6z2Vv8Wup/9WzhMmZpzpMdd0Ee7XeZRlRs/UvZiAew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Add SweetAlert2 and Font Awesome stylesheets -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-fnF5cPXG1KejruhB4j9ov3nZRiypNl8w+AJw9wvMyKwb6z2Vv8Wup/9WzhMmZpzpMdd0Ee7XeZRlRs/UvZiAew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="staffmain.php">ABC Rental</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            


            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i> Hi, <?php echo $u_name; ?> 
                </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"><h8><?php echo $u_status; ?></h8></a></li>

                        <li><a class="dropdown-item" href="staffprofile.php">Edit Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
            
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="staffmain.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="staffapproval.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Approval
                            </a>
                             <a class="nav-link" href="staffcustomer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                               View Customer
                            </a>
                            <a class="nav-link" href="staffmanage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                               Manage Booking
                            </a>
                            <a class="nav-link" href="staffvehicle.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                               Manage Vehicle
                            </a>
                           
                            
                            
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
