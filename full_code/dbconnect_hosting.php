<?php
//Parameter
$servername = "localhost";
$username = "akmajuxp";
$password = "9JJr#NGyd+u5";
$dbname = "akmajuxp_farah_db_vbs";




//Connection
$con=mysqli_connect($servername,$username,$password,$dbname);

$phpMailerHost = 'smtp.gmail.com';
$phpMailerUsername = 'diebah.work111@gmail.com';
$phpMailerPassword = 'xpiz pcbd jqeq hjnd';

function base_url($url = null)
{
    global $baseUrl;
    return $baseUrl . $url;
}

$baseUrl = 'https://akmajuxpress.com/nurfarahadibah/farah_cbs/';

function alert($message, $type = 'info')
{
    // bootsrap 4 alert
    $text = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">';
    $text .= $message;
    $text .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $text .= '<span aria-hidden="true">&times;</span>';
    $text .= '</button>';
    $text .= '</div>';
    return $text;
}
//Verify connection


?>