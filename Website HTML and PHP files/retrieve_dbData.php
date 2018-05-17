<?php
include ("Algorithm.php");
error_reporting(E_ALL);
ini_set('display_errors', 0);
$servername = 'cancer-cant.cerorole96a1.us-west-2.rds.amazonaws.com';
$username = 'root';
$password = 'cancercant';
$database = 'UserFeatures';
$port = 3306;


// Create connection
$link = mysqli_connect($servername,
    $username, $password, $database, $port);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
else {
    echo "";
}
$age = $cancer_type = $religious = $phase_treatment=$gender=$role ="";
$first=$last=$email=$treatmentPhase=$location="";
$city=$state=$phone="";
$test_phase="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    #<------------------------user_contact_data---------------->
    $age =$_POST["age"];
    $religious=$_POST["religion"];
    $role=$_POST["your_role"];
    $gender=$_POST["gender"];
    $first=$_POST["name_first"];
    $last=$_POST["name_last"];
    $email=$_POST["email"];
    $treatmentPhase=$_POST["treatment_phase"];
    $location=$_POST["treatment_city"];
    $city=$_POST["home_city"];
    $state=$_POST["home_state"];
    $phone =$_POST["phone"];
    $cancer_type=$_POST["cancer-category"];
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$matched="F";
$matched_2="0";


$sql_2 = "INSERT INTO  UserFeatures.user_contact_data(first_name,last_name,city,state,phone,email,matched_flag)
    VALUES ('$first','$last','$city','$state','$phone','$email','$matched_2')";

if ($link->query($sql_2) === TRUE) {
    echo "";

} else {
    echo "Error: " . $sql_2 . "<br>" . $link->error;
}
$id = "SELECT * From user_contact_data Order by id DESC Limit 1";
$getId = $link -> query($id);
while($row = $getId->fetch_assoc()) {
    $setid = $row["id"];
}
$sql = "INSERT INTO UserFeatures.user_features(user_contact_data_id,age,cancer_category,distance,religion,treatment_stage,gender,role_to_cancer,first_name,last_name,treatment_location,is_matched,is_matched_to_user)
    VALUES ('$setid','$age','$cancer_type','0','$religious','$treatmentPhase','$gender','$role','$first','$last','$location','$matched','$matched_2')";

if ($link->query($sql) === TRUE) {
    echo "";

} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}



// Select all rows from the databse
$query = "SELECT * From user_features
inner join user_contact_data where user_contact_data_id = user_contact_data.id";
//execute query
$result = $link->query($query);
$last="SELECT * From user_features
inner join user_contact_data where user_contact_data_id = user_contact_data.id
order by user_contact_data_id desc limit 1";
$last_result = $link->query($last);

$p1 = new Algorithm();
$compare1=new Algorithm();
$compare2=new Algorithm();
$compare3 = new Algorithm();
$compare1->setPoints(0);
$compare2->setPoints(0);
$compare3->setPoints(0);
$arrays = array($compare1,$compare2,$compare3);

//check the query, if error then print
if (!mysqli_query($link,$query)) {
    echo("Error description: " . mysqli_error($link));
    exit();
}
//otherwise, if it was a success, then check to see how many rows
elseif ($last_result->num_rows > 0) {
    // output data of each row
    while($row = $last_result->fetch_assoc()) {
        //handle_row($row);
        //echo "Row handeled";
        $p1 -> setNewPerson($row["user_contact_data_id"],$row["age"],$row["cancer_category"],$row["gender"],$row["religion"],$row["treatment_location"],
                                 $row["role_to_cancer"],$row["first_name"],$row["last_name"],$row["email"],$row["treatment_stage"],$row["is_matched"]);
    }
    if($result->num_rows > 0)
        while($row_new = $result->fetch_assoc()) {
            //handle_row($row_new);
            $p1->setPerson($row_new["user_contact_data_id"], $row_new["age"], $row_new["cancer_category"], $row_new["gender"], $row_new["religion"], $row_new["treatment_location"],
                            $row_new["role_to_cancer"],$row_new["first_name"],$row_new["last_name"],$row_new["email"],$row_new["treatment_stage"],$row_new["is_matched"]);
            $p1->setPoints(0);
            //$p1->printPerson();
            if($p1->getMachted()=="0" || $p1->getMachted()==0) {
                $p1->runAlgorithm();
                if ($p1->getId() != $p1->getNewId()) {
                    if ($compare1->getpoints() < $p1->getpoints()) {
                        $compare3->setPerson($compare2->getId(), $compare2->getAge(), $compare2->getCancerType(), $compare2->getGender(), $compare2->getReligion(), $compare2->getTreatementLoctation(),
                            $compare2->getRole(), $compare2->getFirstName(), $compare2->getNewLastName(), $compare2->getEmail(), $compare2->getTreatmentPhase(), $compare2->getMachted());
                        $compare3->setPoints($compare2->getpoints());

                        $compare2->setPerson($compare1->getId(), $compare1->getAge(), $compare1->getCancerType(), $compare1->getGender(), $compare1->getReligion(), $compare1->getTreatementLoctation(),
                            $compare1->getRole(), $compare1->getFirstName(), $compare1->getLastName(), $compare1->getEmail(), $compare1->getTreatmentPhase(), $compare1->getMachted());
                        $compare2->setPoints($compare1->getpoints());

                        $compare1->setPerson($p1->getId(), $p1->getAge(), $p1->getCancerType(), $p1->getGender(), $p1->getReligion(), $p1->getTreatementLoctation(),
                            $p1->getRole(), $p1->getFirstName(), $p1->getLastName(), $p1->getEmail(), $p1->getTreatmentPhase(), $p1->getMachted());
                        $compare1->setPoints($p1->getpoints());
                    } elseif ($compare2->getpoints() < $p1->getpoints()) {
                        $compare3->setPerson($compare2->getId(), $compare2->getAge(), $compare2->getCancerType(), $compare2->getGender(), $compare2->getReligion(), $compare2->getTreatementLoctation(),
                            $compare2->getRole(), $compare2->getFirstName(), $compare2->getNewLastName(), $compare2->getEmail(), $compare2->getTreatmentPhase(), $compare2->getMachted());
                        $compare3->setPoints($compare2->getpoints());

                        $compare2->setPerson($p1->getId(), $p1->getAge(), $p1->getCancerType(), $p1->getGender(), $p1->getReligion(), $p1->getTreatementLoctation(),
                            $p1->getRole(), $p1->getFirstName(), $p1->getLastName(), $p1->getEmail(), $p1->getTreatmentPhase(), $p1->getMachted());
                        $compare2->setPoints($p1->getpoints());

                    } elseif ($compare3->getpoints() < $p1->getpoints()) {
                        $compare3->setPerson($p1->getId(), $p1->getAge(), $p1->getCancerType(), $p1->getGender(), $p1->getReligion(), $p1->getTreatementLoctation(),
                            $p1->getRole(), $p1->getFirstName(), $p1->getLastName(), $p1->getEmail(), $p1->getTreatmentPhase(), $p1->getMachted());
                        $compare3->setPoints($p1->getpoints());
                    }
                }
            }
        }
}
//if no rows then outout so
else {
    //echo "0 results";
}

//Helper function to output the data that was pulled from the db
//row is essentially a hashmap or dictionary pertaining to each
//row of the db. Access columns by name in the db
function handle_row($row ) {
    echo "id: " . $row["user_contact_data_id"].
        " - age: " . $row["age"].
        " - cancer_category: " . $row["cancer_category"].
        " - religion: " . $row["religion"].
        " - treatment stage: " . $row["treatment_stage"].
        " - role to cancer: " . $row["role_to_cancer"].
        " - gender: " . $row["gender"].
        "<br>";

}
// echo "We made it here";
// $p1->printNewperson();
// echo "---------";
// echo $compare1->getId();
// $compare1->printPerson();
// $compare2->printPerson();
// $compare3->printPerson();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\STMP;

require 'libs/phpmailer/src/Exception.php';
require 'libs/phpmailer/src/PHPMailer.php';
require 'libs/phpmailer/src/SMTP.php';


$variables = array();
$variables = get_patient_info_for_html($variables, $compare1, $compare2, $compare3, $setid, $email);


$template = file_get_contents("contents.html");

foreach($variables as $key => $value)
{
    $template = str_replace('{{ '.$key.' }}', $value, $template);
}

send_email_with_info($template, $email);



function get_patient_info_for_html($variables, $compare1, $compare2, $compare3, $setid, $email)
{
    $variables['location1'] = $compare1->getTreatementLoctation();
    $variables['cancertype1'] = $compare1->getCancerType();
    $variables['age1'] = $compare1->getAge();
    $variables['firstname1'] = $compare1->getFirstName();
    $variables['lastname1'] = $compare1->getLastName();
    $variables['religion1'] = $compare1->getReligion();
    #$varialbes['treatment_stage1'] = $compare1->getphaseTreatment_1();
    $variables['role1'] = $compare1->getRole();
    $variables['id1'] = $compare1->getId();
    $variables['firstname2'] = $compare2->getFirstName();
    $variables['lastname2'] = $compare2->getLastName();
    $variables['cancertype2'] = $compare2->getCancerType();
    $variables['location2'] = $compare2->getTreatementLoctation();
    $variables['age2'] = $compare2->getAge();
    $variables['religion2'] = $compare2->getReligion();
    $variables['role2'] = $compare2->getRole();
    $variables['id2'] = $compare2->getId();
    #$varialbes['treatment_stage2'] = $compare2->getphaseTreatment_1();
    $variables['cancertype3'] = $compare3->getCancerType();
    $variables['firstname3'] = $compare3->getFirstName();
    $variables['lastname3'] = $compare3->getLastName();
    $variables['age3'] = $compare3->getAge();
    $variables['religion3'] = $compare3->getReligion();
    $variables['role3'] = $compare3->getRole();
    $variables['location3'] = $compare3->getTreatementLoctation();
    $variables['id3'] = $compare3->getId();
    #$varialbes['treatment_stage3'] = $compare3->getphaseTreatment_1();

    $variables['user_id'] = $setid;
    $variables['email'] = $email;

    return $variables;
}


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

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "";
    }

}


$link->close();
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
