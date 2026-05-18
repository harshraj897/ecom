<style>
  .contact-container {
    max-width: 700px;
    margin: 50px auto;
    padding: 25px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f8f8f8;
    font-family: Arial, sans-serif;
  }

  .contact-container h2 {
    text-align: center;
    color: #333;
  }

  .contact-container p {
    text-align: center;
    color: #555;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 20px;
  }

  label {
    font-weight: bold;
    color: #333;
  }

  input, textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  textarea {
    resize: vertical;
    height: 100px;
  }

  button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }

  button:hover {
    background-color: #45a049;
  }

  .success {
    margin-top: 20px;
    color: green;
    text-align: center;
  }

  .error {
    margin-top: 20px;
    color: red;
    text-align: center;
  }
</style>

<div class="contact-container">
  <h2>Contact Us</h2>
  <p>We’d love to hear from you! Fill out the form below to send us a message.</p>

  <form method="post" action="">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="message">Your Message</label>
    <textarea id="message" name="message" placeholder="Write your message..." required></textarea>

    <button type="submit">Send Message</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);

      $to = "harsh356732@gmail.com.com";  
      $subject = "New Contact Form Message from $name";

      $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

      $headers = "From: $email\r\n";
      $headers .= "Reply-To: $email\r\n";
      $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

      // Send email
      if (mail($to, $subject, $body, $headers)) {
          echo "<p class='success'>✅ Thank you, $name! Your message has been sent successfully.</p>";
      } else {
          echo "<p class='error'>❌ Sorry, something went wrong. Please try again later.</p>";
      }
  }
  ?>
</div>