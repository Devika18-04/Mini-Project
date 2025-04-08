<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="hotelcss/css/common.css">



<?php

   require('admin/inc/dbconfig.php');
   require('admin/inc/essentials.php');



$contact_q= "SELECT * FROM `contact_details` WHERE `sr_no`=?";
$settings_q= "SELECT * FROM `settings` WHERE `sr_no`=?";
$values=[1];
$contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
$settings_r = mysqli_fetch_assoc(select($settings_q,$values,'i'));

if($settings_r['shutdown']==1)
{
    echo<<<alertbar
    <div class="bg-danger text-center p-4 fw-bold" >
     <i class="bi bi-exclamation-triangle-fill"></i>   Ooops! bookings are currently closed  :(
    </div>
    alertbar;
}

?>