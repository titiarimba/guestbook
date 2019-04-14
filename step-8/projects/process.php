<?php
  // Debug if data is already filled
  // var_dump($_POST);

  // Detect if form submited
  if (!empty($_POST['name'])) {
    // Create Connections
    $connection = new mysqli(
      'localhost', // Database Host
      'root', // Database User
      '', // Database Password (can fill with blank)
      'guestbook' // Database Name
    );

    // Test Connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    // Extract content from URL
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
  
    // Create SQL Query
    $query = "INSERT INTO messages (
        name,
        phone,
        message
      ) VALUES (
        '$name',
        '$phone',
        '$message'
      )"
    ;

    // Insert to Database
    // If success return to thank-you page
    if (mysqli_query($connection, $query)) {
      header('location:thank-you.php?id='.mysqli_insert_id($connection));
    }
    // Else, return error if failed
    else {
      die("Error: " . $query . "" . mysqli_error($connection));
    }

    $connection->close();
  } else {
    // Prevent null filled data
    header('location:index.php');
  }