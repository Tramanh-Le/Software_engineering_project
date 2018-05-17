<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = 'cancer-cant.cerorole96a1.us-west-2.rds.amazonaws.com';
$username = 'root';
$password = 'cancercant';
$database = 'UserFeatures';
$port = 3306;


if(isset($_GET['var1'])){
  $user_id = $_GET['var1']; //some_value
}
if(isset($_GET['var2'])){
  $partner_id = $_GET['var2']; //some_value
}
if(isset($_GET['var3'])){
  $email = $_GET['var3']; //some_value
}



$link = mysqli_connect($servername,
    $username, $password, $database, $port);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
else {
    echo "";
    echo"";
}



$sql = "UPDATE user_features SET is_matched = 1,is_matched_to_user = $partner_id  WHERE user_contact_data_id = $user_id";
$sql2 = "UPDATE user_features SET is_matched = 1,is_matched_to_user = $user_id WHERE  user_contact_data_id = $partner_id";
$sql3 = "SELECT * from user_contact_data where id = $partner_id";
if ($link->query($sql) === TRUE) {
    echo "";

} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

if ($link->query($sql2) === TRUE) {
    echo "";

} else {
    echo "Error: " . $sql2 . "<br>" . $link->error;
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\STMP;

require 'libs/phpmailer/src/Exception.php';
require 'libs/phpmailer/src/PHPMailer.php';
require 'libs/phpmailer/src/SMTP.php';


$variables = array();
$result = $link->query($sql3);
while($row = $result->fetch_assoc()) {
  $variables['first_name'] = $row["first_name"];
  $variables['last_name'] = $row["last_name"];
  $variables['email'] = $row["email"];
  $variables['phone'] = $row["phone"];
}



$template = file_get_contents("success_partner.html");

foreach($variables as $key => $value)
{
    $template = str_replace('{{ '.$key.' }}', $value, $template);
}

send_email_with_info($template, $email);

function send_email_with_info($template, $email)
{
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "9621312@gmail.com";
    $mail->Password = "2BlueTankJumped!";
    $mail->SetFrom("9621312@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress($email);


    $mail->Body = $template;

    $mail->send();

}

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('http://cancercant.com/', false);
exit;
?>
