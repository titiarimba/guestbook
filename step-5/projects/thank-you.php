<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Step 5 - Processing Form with external actions (PHP)</title>

  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
</head>
<body>
  <div class="container">
    <div class="columns">
      <div class="column col-4 col-mx-auto my-2">
        <div class="card">
          <!-- PHP Process -->
          <?php
            // Debug if data is already filled
            // var_dump($_POST);

            // Detect if form submited
            if (!empty($_POST['name'])) {
              // Extract content from URL
              $name = $_POST['name'];
              $phone = $_POST['phone'];
              $message = $_POST['message'];
            
              // In PHP you can close <?php tag before
              // writing a HTML tag and then continue
              // it at bottom.
          ?>
            <div class="card-header">
              <div class="card-title h5">
                Guest Book
              </div>
            </div>
            <div class="card-body">
              <!-- And print a message like this -->
              <div class="empty">
                <div class="empty-icon">
                  <i class="icon icon-people"></i>
                </div>
                <!-- Of course, you can use PHP tag inside a div like this -->
                <p class="empty-title h5">
                  Hi, <?php echo "$name ($phone)"; ?>.
                </p>
                <p class="empty-subtitle">
                  Your message has been submited with detail :
                </p>
                <p class="empty-subtitle">
                  <?php echo $message; ?>
                </p>
                <div class="empty-action">
                  <a href="index.php" class="btn btn-primary">
                    Back to Home
                  </a>
                </div>
              </div>              
            </div>
          <?php
            } else {
              // Prevent null filled data
              header('location:index.php');
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>