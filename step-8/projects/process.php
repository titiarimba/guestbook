<?php
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

  $request = file_get_contents('php://input');

  // Converts it into a PHP object
  $data = json_decode($request);

  switch ($data->action) {
    case 'create':
      // Extract content from URL
      $name = $data->name;
      $phone = $data->phone;
      $message = $data->message;
    
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
        echo json_encode(
          array(
            'success' => true,
            'id' => mysqli_insert_id($connection)
          )
        );
      }
      // Else, return error if failed
      else {
        die("Error: " . $query . "" . mysqli_error($connection));
      }
      break;

    case 'select':
      // Create SQL Query
      $query = "SELECT * FROM messages WHERE id = ".$data->id;

      // Insert to Database
      // If success return to thank-you page
      $result = mysqli_query($connection, $query);

      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo json_encode(
            mysqli_fetch_assoc($result)
          );
        } else {
          echo json_encode(
            array('data' => 0)
          );
        }
      }
      // Else, return error if failed
      else {
        die("Error: " . $query . "" . mysqli_error($connection));
      }
      break;
    
    default:
      // header('location:index.php');
      break;
  }

  $connection->close();
