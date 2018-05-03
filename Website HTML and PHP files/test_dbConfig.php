<?php

  $dsn = 'mysql:host=dev.cstoucflgsgq.us-west-2.rds.amazonaws.com;port=3306;dbname=UserFeatures';
  $username = 'root';
  $password = 'cancercant';

  try {
      $conn = new PDO($dsn, $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      }
  catch(PDOException $e)
      {
      echo "Connection to database failed: " . $e->getMessage();
      }


  $first_name = $city = $state = $email = $gender = $last_name = $phone_number = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      #<------------------------user_contact_data---------------->
      $name_first = test_input($_POST["first-name"]);
      $name_last = test_input($_POST["last-name"]);
      $email = test_input($_POST["email"]);
      $phone_number = test_input($_POST["phone-number"]);
      $city = test_input($_POST["city"]);
      $state = test_input($_POST["state"]);



  }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $sql = "INSERT INTO UserFeatures.user_contact_data (first_name, last_name, email, phone, city, state)
    VALUES ('$name_first', '$name_last', '$email', '$phone_number', '$city', '$state')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
