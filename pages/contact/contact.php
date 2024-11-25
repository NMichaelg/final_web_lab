<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css?v=<?php echo time(); ?>">



<div class="container py-5">
    <div class="row g-4 align-items-center">
      <!-- Image Section -->
      <div class="col-lg-6">
        <img 
          src="images/contact_pic.webp" 
          width = 100%
          alt="Contact Us" 
          class="img-fluid rounded shadow"
        >
      </div>
      <!-- Form Section -->
      <div class="col-lg-6">
        <h1 class="text-center mb-4">Contact Us</h1>
        <form action="contact.php" method="POST" class="shadow p-4 rounded bg-light">
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea id="message" name="message" rows="5" class="form-control" placeholder="Write your message here..." required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>