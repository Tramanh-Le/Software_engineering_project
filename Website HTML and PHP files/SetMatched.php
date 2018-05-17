<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = 'cancer-cant.cerorole96a1.us-west-2.rds.amazonaws.com';
$username = 'root';
$password = 'cancercant';
$database = 'UserFeatures';
$port = 3306;

$link = mysqli_connect($servername,
    $username, $password, $database, $port);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
else {
    echo "Connection successfully";
    echo"\n"
    ;
}
$id= 1;
$id2 =2;


$sql = "UPDATE user_features SET is_matched = 1,is_matched_to_user = $id2  WHERE ID = $id";
$sql2 = "UPDATE user_features SET is_matched = 1,is_matched_to_user = $id WHERE  ID = $id2";
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

if ($link->query($sql2) === TRUE) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql2 . "<br>" . $link->error;
}
