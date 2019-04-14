<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Step 4 - Processing Form in single page (PHP)</title>

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
            <div class="card-subtitle text-gray">
              Hi, welcome. Please fill the forms below.
            </div>
          </div>
          <div class="card-body">
            <form action="" method="POST" class="form-horizontal">
              <!-- form input control -->
              <div class="form-group">
                <label class="form-label" for="input-name">
                  Full Name
                </label>
                <input
                  id="input-name"
                  class="form-input"
                  name="name"
                  type="text"
                  placeholder="Your Name ..."
                >
              </div>
              <!-- form input control -->
              <div class="form-group">
                <label class="form-label" for="input-phone">
                  Phone
                </label>
                <input
                  id="input-phone"
                  class="form-input"
                  name="phone"
                  type="text"
                  placeholder="Your Phone ..."
                >
              </div>
              <!-- form textarea control -->
              <div class="form-group">
                <label class="form-label" for="input-message">
                  Message
                </label>
                <textarea
                  id="input-message"
                  class="form-input"
                  name="message"
                  placeholder="Your Message ..."
                  rows="4"
                ></textarea>
              </div>
              <!-- form submit -->
              <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">
                  Send
                </button>
              </div>
            </form>

            <hr>

            <!-- PHP Process -->
            <?php
              // Detect if form submited
              if (!empty($_POST['name'])) {
                // Extract content from URL
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];

                // Print current guest message, with description :
                // ----
                // First, you can print variable inside a string if you use double quote (")
                echo "Hi $name ($phone),";
                // Second, you can HTML tag inside PHP like this
                echo "<br>";
                // Or, you can print string only
                echo "Your message has been submited with detail :";
                // Also, you can use HTML tag inside print function
                echo "<pre>$message</pre>";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>