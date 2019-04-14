<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Processing Form with JavaScript and PHP</title>

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
            <form action="#" class="form-horizontal">
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const form = document.querySelector('form')
    const name = document.querySelector('[name="name"]')
    const phone = document.querySelector('[name="phone"]')
    const message = document.querySelector('[name="message"]')
    const output = document.querySelector('#output')

    form.addEventListener('submit', function(event) {
      event.preventDefault()
      console.log(name.value, phone.value, message.value)
    }, false)
  </script>
</body>
</html>

<!-- Backup -->
<div class="card-body">
  <!-- And print a message like this -->
  <div class="empty">
    <div class="empty-icon">
      <i class="icon icon-people"></i>
    </div>
    <!-- Of course, you can use PHP tag inside a div like this -->
    <p class="empty-title h5">
    Hi, <?php// echo "{$row['name']} ({$row['phone']})"; ?>.
    </p>
    <p class="empty-subtitle">
      Your message has been submited with detail :
    </p>
    <p class="empty-subtitle">
      <?php// echo $row['message']; ?>
    </p>
    <div class="empty-action">
      <a href="index.php" class="btn btn-primary">
        Back to Home
      </a>
    </div>
  </div>              
</div>