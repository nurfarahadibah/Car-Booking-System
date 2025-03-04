<?php
// connect to the db
include('dbconnect.php');

// retrieve data from registration form
$fic = $_POST['fic'];
$fname = $_POST['fname'];
$fpwd = $_POST['fpwd'];
$fcpwd = $_POST['fcpwd'];
$fphone = $_POST['fphone'];
$femail = $_POST['femail'];
$flic = $_POST['flic'];
$fadd = $_POST['fadd'];

$errors = [];

// Validate IC length
if (strlen($fic) !== 12) {
    $errors[] = "ic_12";
}

// Validate password
if (empty($fpwd)) {
    $errors[] = "fpwd_empty";
} elseif (strlen($fpwd) < 8) {
    $errors[] = "fpwd_8";
}

// Validate password confirmation
if ($fcpwd !== $fpwd) {
    $errors[] = "password_mismatch";
}

// Validate empty password confirmation
if (empty($fcpwd)) {
    $errors[] = "fcpwd_empty";
}

// Check for existing email, IC number, and phone number
$existingUserQuery = "SELECT * FROM tb_user WHERE u_email=? OR u_ic=? OR u_phone=?";
$stmt = mysqli_prepare($con, $existingUserQuery);
mysqli_stmt_bind_param($stmt, "sss", $femail, $fic, $fphone);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['u_email'] === $femail) {
            $errors[]="existing_email";
        }
        if ($row['u_ic'] === $fic) {
            $errors[]="existing_ic";
        }
        if ($row['u_phone'] === $fphone) {
            $errors[]="existing_phone";
        }
    }
}

// Handle errors
if (!empty($errors)) {
    $errorString = implode("&", $errors);
    header("Location: register.php?error=$errorString&fic=$fic&fname=$fname&femail=$femail&flic=$flic&fphone=$fphone&fadd=$fadd");
    exit();
}

// Hash the password
$hashedPassword = password_hash($fpwd, PASSWORD_DEFAULT);

// INSERT new user
$sql = "INSERT INTO tb_user(u_ic, u_pwd, u_name, u_phone, u_email, u_add, u_lic, u_type)
        VALUES(?, ?, ?, ?, ?, ?, ?, '2')";

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sssssss", $fic, $hashedPassword, $fname, $fphone, $femail, $fadd, $flic);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($con);

// Redirect to the next page
header('Location: login.php');
?>
