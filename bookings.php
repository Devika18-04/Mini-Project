<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPYSTAY-CONFIRM BOOKING</title>
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title']?>BOOKINGS</title>
    <style>
      .pop:hover{
        border-top-color: var(--teal) !important;
        transform:scale(1.03);
        transition:all 0.3s;
      }
    </style>
    
</head>
<body class="bg-light">

<?php 
require('inc/header.php');
if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
  redirect('index.php');
}
 ?>



<div class="container">
    <div class="row">
        <div class=" col-12 my-5 mb-4 px-4">
           <h2 class="fw-bold">BOOKING</h2>
           <div style="font-size: 14px;">
             <a href="index.php" class="text-secondary text-decoration-name">HOME</a>
             <span class="text-secondary"> > </span>
             <a href="#" class="text-secondary text-decoration-name">BOOKINGS</a>
           </div>
        </div>
        <?php
         
            $query="SELECT bo.*,bd.* FROM `booking_order` bo 
                INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id
                WHERE ((bo.booking_status='booked')
                OR (bo.booking_status='cancelled')
                OR (bo.booking_status='payment_failed'))
                AND (bo.user_id=?)
                ORDER BY bo.booking_id DESC";
                
            $result =select($query,[$_SESSION['uId']],'i');
            while($data=mysqli_fetch_assoc($result))
            {
            $date=date("d-m-Y",strtotime($data['dateandtime']));
            $checkin=date("d-m-Y",strtotime($data['check_in']));
            $checkout=date("d-m-Y",strtotime($data['check_out']));

              $status_bg=" ";
              $btn=" ";
              
              if($data['booking_status']=='booked')
              {
                $status_bg="bg-success";
                
                /*if($data['arrival']==1)
                {
                  $btn="<a href='generate_pdf.php&gen_pdf&id=$data[booking]' class='btn btn-dark btn-sm shadow-none'>DOWNLOAD PDF</a>
                  <button type='button' class='btn btn-dark btn-sm shadow-none'>Rate &Review</button>
                  ";
                }
                else{
                  $btn="<button onclick='cancel_booking($data[booking_id])' type='button' class='btn btn-danger btn-sm shadow-none'>cancel</button>";
                 }*/
              }
              
              else if($data['booking_status']=='cancelled')
              {
                $status_bg="bg-danger";

                if($data['refund']==0)
                {
                  $btn="<span class='badge bg-primary'>Refund in process</span>";
                }
                else{
                  $btn="<a href='generate_pdf.php&gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>DOWNLOAD PDF</a>
                  ";
                 }
              }
              else{
                $status_bg="bg-warning";
                $btn=$btn="<a href='generate_pdf.php&gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>DOWNLOAD PDF</a>
                ";
              }

              
            

              echo<<<bookings
              <div class='col-md-4 px-4 mb-4'>
               <div class='bg-white p-3 rounded shadow-sm'>
                 <h5 class='fm-bold'>$data[room_name]</h5>
                   <p> $data[price] per night</p>
                  <p>
                    <b>Check in: </b> $checkin <br>
                    <b>Check out: </b> $checkout 
                  </p>
                  <p>
                    <b>Amount: </b> $data[price] per night <br>
                    <b>Order ID: </b> $data[order_id] <br>
                    <b>Room Number: </b> $data[room_no]<br>
                    <b> Date:</b> $date 
                  </p>
                  <p>
                     <span class='badge $status_bg'>$data[booking_status]</span>
                  </p>
        </div>
        </div>
        bookings;
      }
      ?>
      </div>
    </div>
   <?php
      if(isset($_GET['cancel_status'])){
        alert('success','Booking Canelled!');
      }





  ?>

    <?php require('inc/footer.php'); ?>
    <script>
       function cancel_booking(id)
       {
         if(confirm('Are you sure to cancel booking?'))
         {
          let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/cancel_bookings.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            xhr.onload = function(){
              if(this.responseText==1){
                window.location.href="bookings.php?cancel_status=true";
              }
              else{
                alert('error','Cancellation failed!');
              }
            }    

         xhr.send('get_general');


         }
       }
      </script>

      
  </body>
</html>
            



        
        
    

        
  