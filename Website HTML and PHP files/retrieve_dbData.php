<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
  $servername = 'cancercant-1.cpbyr2656phb.us-west-2.rds.amazonaws.com';
  $username = 'root';
  $password = 'cancercant';
  $database = 'cancercant';
  $port = 2801;


// Create connection
$link = mysqli_connect($servername,
$username, $password, $database, $port);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
else {
  echo "Connection successfully";
}

// Select all rows from the databse
  $query = "SELECT * FROM user_features";
  //execute query
  $result = $link->query($query);

  //check the query, if error then print
  if (!mysqli_query($link,$query)) {
      echo("Error description: " . mysqli_error($link));
      exit();
    }
  //otherwise, if it was a success, then check to see how many rows
  elseif ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      handle_row($row);
    }
}
//if no rows then outout so
else {
    echo "0 results";
}

//Helper function to output the data that was pulled from the db
//row is essentially a hashmap or dictionary pertaining to each
//row of the db. Access columns by name in the db
  function handle_row($row) {
    echo "id: " . $row["user_contact_data_id"].
     " - age: " . $row["age"].
     " - cancer_category: " . $row["cancer_category"].
     " - religion: " . $row["religion"].
     " - treatment stage: " . $row["treatment_stage"].
     " - role to cancer: " . $row["role_to_cancer"].
     " - gender: " . $row["gender"].
     "<br>";

  }



  $link->close();




 ?>
