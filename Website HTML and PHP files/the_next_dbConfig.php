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


  $first_name = $city = $state = $email = $gender = $last_name = $phone_number
  $your_role = $home_city = $home_state = $home_region = $treatment_city =
  $treatment_phase = $treatment_state = $cancer_type = $religious_preference =
  $link = $comments = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      #<------------------------user_contact_data---------------->
      $name_first = test_input($_POST["first-name"]);
      $name_last = test_input($_POST["last-name"]);
      $email = test_input($_POST["email"]);
      $phone_number = test_input($_POST["phone"]);
      $city = test_input($_POST["city"]);
      $state = test_input($_POST["state"]);

      #<------------------------algorithm_data---------------->
      $age = test_input($_POST['age']);
      $your_role = test_input($_POST["your_role"]);
      $home_city = test_input($_POST["home_city"]);
      $home_state = test_input($_POST["home_state"]);
      $home_region = test_input($_POST["home_region"]);
      $treatment_city = test_input($_POST["treatment_city"]);
      $treatment_state = test_input($_POST["treatment_state"]);
      $cancer_type = test_input($_POST["cancer_type"]);
      $treatment_phase = test_input($_POST["treatment_phase"]);
      $religious_preference = test_input($_POST["religious_preference"]);
      $gender = test_input($_POST["gender"]);

      #<------------------------non_algorithm_user_Data---------------->
      $link = test_input($_POST["link"]);
      $comments = test_input($_POST["comments"]);



  }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $user_contact_sql = "INSERT INTO UserFeatures.user_contact_data (first_name, last_name, email, phone, city, state)
    VALUES ('$name_first', '$name_last', '$email', '$phone_number', '$city', '$state')";

    $user_algorithm_sql = "INSERT INTO UserFeatures.user_algorithm_data (age, cancer_type, religion, treatment_stage,
    gender, role) VALUES ('$age', '$cancer_type', '$religious_preference', '$treatment_phase', '$gender', '$role')";

    $user_non_algorithm_sql = "INSERT INTO UserFeatures.user_non_algorithm_data (link, comments) VALUES ('$link', '$comments')";

    if ($conn->query($user_contact_sql) === TRUE) {
    echo "New record created user_contact_data successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($user_algorithm_sql) === TRUE) {
    echo "New record created user_algorithm_data successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($user_non_algorithm_sql) === TRUE) {
    echo "New record created in user_non_algorithm_data successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
