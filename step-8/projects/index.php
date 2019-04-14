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
            <div class="card-subtitle text-gray" id="greeting">
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
            <div id="output"></div>
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
    const greeting = document.querySelector('#greeting')
    const output = document.querySelector('#output')

    let content = ''

    function request(url, data) {
      return fetch(url, {
        method: 'POST',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      }).then(function (response) {
        return response.json()
      })
    }

    form.addEventListener('submit', function(event) {
      event.preventDefault()
      
      request('./process.php', {
        action: 'create',
        name: name.value,
        phone: phone.value,
        message: message.value
      }).then(function ({ id }) {
        
        request('./process.php', {
          action: 'select',
          id: id
        }).then(function ({ name, phone, message }) {
          form.style.display = 'none'
          greeting.style.display = 'none'

          if (name && phone && message) {
            content = ''
              + '    <p class="empty-title h5">'
              + '    Hi, ' + name + ' (' + phone + ').'
              + '    </p>'
              + '    <p class="empty-subtitle">'
              + '      Your message has been submited with detail :'
              + '    </p>'
              + '    <p class="empty-subtitle">'
              + '      ' + message
              + '    </p>'
          } else {
            content = ''
              + '    <p class="empty-subtitle">'
              + '      No data found'
              + '    </p>'
          }

          output.innerHTML = ''
            + '<div class="card-body">'
            + '  <div class="empty">'
            + '    <div class="empty-icon">'
            + '      <i class="icon icon-people"></i>'
            + '    </div>'
            +       content
            + '    <div class="empty-action">'
            + '      <a href="" class="btn btn-primary">'
            + '        Back to Home'
            + '      </a>'
            + '    </div>'
            + '  </div>'
            + '</div>'
        })
      })
    }, false)
  </script>
</body>
</html>