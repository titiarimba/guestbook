<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Step 1 - HTML & CSS Framework</title>

  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
</head>
<body>
  <div class="container">
    <div class="columns">
      <div class="column col-4 col-mx-auto my-2">
        <div class="card">
          <div class="card-header">
            <div class="card-title h5">
              Guest Book
            </div>
          </div>
          <!-- PHP Process -->
          <?php
            if ($_GET['id']) {

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
  
              $query = "SELECT * FROM messages ORDER BY id DESC LIMIT 1";
  
              $result = mysqli_query($connection, $query);
  
              if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <div class="card-body">
                        <!-- And print a message like this -->
                        <div class="empty">
                          <div class="empty-icon">
                            <i class="icon icon-people"></i>
                          </div>
                          <!-- Of course, you can use PHP tag inside a div like this -->
                          <p class="empty-title h5">
                          Hi, <?php echo "{$row['name']} ({$row['phone']})"; ?>.
                          </p>
                          <p class="empty-subtitle">
                            Your message has been submited with detail :
                          </p>
                          <p class="empty-subtitle">
                            <?php echo $row['message']; ?>
                          </p>
                          <div class="empty-action">
                            <a href="index.php" class="btn btn-primary">
                              Back to Home
                            </a>
                          </div>
                        </div>              
                      </div>
                    <?php
                 }
              } else {
                ?>
                  <div class="card-body">
                    <!-- And print a message like this -->
                    <div class="empty">
                      <div class="empty-icon">
                        <i class="icon icon-people"></i>
                      </div>
                      <p class="empty-subtitle">
                        No data found
                      </p>
                      <div class="empty-action">
                        <a href="index.php" class="btn btn-primary">
                          Back to Home
                        </a>
                      </div>
                    </div>              
                  </div>
                <?php
              }

              mysqli_close($connection);
            } else {
              // Prevent no id send on paramater
              header('location:index.php');
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>