<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelBooking-contact</title>
    <?php require('inc/links.php'); ?>
    
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">CONTACT US</h2>
  <div class="h-line bg-dark"></div>
</div>
<p class="text-center mt-3">
  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
   Expedita hic sed dolore autem quia quae<br> quidem doloribus sunt sit facilis?
</p>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shawdow p-4">
      <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61263.779322130045!2d80.39331872861358!3d16.32364897757256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a4a755cb1787785%3A0x9f7999dd90f1e694!2sGuntur%2C%20Andhra%20Pradesh!5e0!3m2!1sen!2sin!4v1696557472569!5m2!1sen!2sin" loading="lazy"></iframe>
        <h5>Address</h5>
        <a href="https://maps.app.goo.gl/13LLGQMiCQDJFTjK6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
        <i class="bi bi-geo-alt-fill"></i> Guntur,Andhra pradesh
        </a>
        <h5 class="mt-4">call us</h5>
            <a href="tel: +918555908140" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +918555908140</a>
            <br>
            <a href="tel: +918555908140" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +918555908140</a>
      <h5 class="mt-4">Email</h5>
      <a href="mailto: abc@gmail.com" class="d-inline-block text-decoration-none text-dark">
         <i class="bi bi-envelope-fill"></i> abc@gmail.com</a>
      <h5 class="mt-4">Follow us</h5>
            <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-twitter me-1"></i>
            </a>
            <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook"></i> 
            </a>
            <a href="#" class="d-inline-block text-dark fs-5">
            <i class="bi bi-instagram"></i> 
            </a>
        
      </div>
    </div>
    <div class="col-lg-6 col-md-6 px-4">
      <div class="bg-white rounded shawdow p-4">
       <form>
        <h5>send a message</h5>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Name</label>
            <input type="text" class="form-control shadow-none">
                    
        </div>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Email</label>
            <input type="email" class="form-control shadow-none">
                    
        </div>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Subject</label>
            <input type="text" class="form-control shadow-none">
                    
        </div>
        <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Message</label>
            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                    
        </div>
        <button type="submit" class="btn text-white custom-bg mt-3">SEND</button>
       </form>
      </div>
    </div>
   
  </div>
</div>

<?php require('inc/footer.php'); ?>

</body>
</html>
