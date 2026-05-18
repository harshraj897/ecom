
<style>
  footer {
    background-color: #222;
    color: #fff;
    padding: 5px 0;
    text-align: center;
    font-family: Arial, sans-serif;
  }

  .footer-container {
    width: 100%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    text-align: left;
  }

  .footer-section {
    flex: 1;
    min-width: 250px;
    margin: 10px;
  }

  .footer-section h3 {
    border-bottom: 2px solid #00bcd4;
    display: inline-block;
    padding-bottom: 5px;
    margin-bottom: 10px;
  }

  .footer-section p,
  .footer-section a {
    color: #ccc;
    font-size: 14px;
    text-decoration: none;
    line-height: 1.6;
  }

  .footer-section a:hover {
    color: #00bcd4;
  }

  .social-links a {
    margin: 0 8px;
    color: #00bcd4;
    font-weight: bold;
    text-decoration: none;
  }

  .footer-bottom {
    text-align: center;
    margin-top: 20px;
    font-size: 13px;
    color: #aaa;
  }
</style>

<footer>
  <div class="footer-container">
    <div class="footer-section">
      <h3>About Our Store</h3>
      <p>We are a trusted e-commerce platform providing quality products at affordable prices.
      Our goal is to make online shopping easy and enjoyable for everyone.</p>
    </div>

    <div class="footer-section">
      <h3>Contact Info</h3>
      <p>Email: harsh356732.com</p>
      <p>Phone: +91 xxxxxx xxxxx</p>
      <p>Address: Sahibganj, Jharkhand, India</p>
    </div>

    <div class="footer-section">
      <h3>Follow Us</h3>
      <div class="social-links">
        <a href="#">Instagram</a> |
        <a href="#">Facebook</a> |
        <a href="#">Twitter</a> |
        <a href="#">YouTube</a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    &copy; <?php echo date('Y'); ?> My E-Commerce Website | All Rights Reserved
  </div>
</footer>
</body>
</html>