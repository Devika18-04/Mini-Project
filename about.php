<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelBooking-about</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php'); ?>
<style>
    .box{
        border-top-color: var(--teal) !important;
    }
</style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>
<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">ABOUT US</h2>
  <div class="h-line bg-dark"></div>
</div>
<p class="text-center mt-3">
  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
   Expedita hic sed dolore autem quia quae<br> quidem doloribus sunt sit facilis?
</p>
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas officiis, dolorem excepturi dolore dolor quo eius.</p>
        </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="images/about/th.jpg" class="w-100">
    </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/customer.svg" width="70px">
                <h4 class="mt-3">200+ customers</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/room.svg" width="70px">
                <h4 class="mt-3">100+ Rooms</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/review.svg" width="70px">
                <h4 class="mt-3">150+ Reviews</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/staff.svg" width="70px">
                <h4 class="mt-3">200+ staff</h4>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>

</body>
</html>
