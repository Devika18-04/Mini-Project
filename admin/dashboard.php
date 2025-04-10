<?php 
  
   require('inc/essentials.php');
   adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Dashboard</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-light">


 <?php 
 require('inc/header.php');
 
 
 ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div  class="d-flex align-items-center justify-content-between mb-4">
                    <h3>DASHBOARD</h3>
                    <h6  class="badge bg-danger py-2 px-3 rounded">Shutdown Mode is Off!</h6>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                       <a href="new_bookings.php"  class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                       <h6>New Bookings</h6>

                       <h1 class="mt-2 mb-0">5</h1>
                        </div>
                       </a>
            
                    </div>
                    <div class="col-md-3 mb-4">
                       <a href="refund_bookings.php"  class="text-decoration-none">
                        <div class="card text-center text-warning p-3">
                       <h6>refund Bookings</h6>

                       <h1 class="mt-2 mb-0">5</h1>
                        </div>
                       </a>
            
                    </div>
                    <div class="col-md-3 mb-4">
                       <a href="user_queries.php"  class="text-decoration-none">
                        <div class="card text-center text-info p-3">
                       <h6>user queries</h6>

                       <h1 class="mt-2 mb-0">5</h1>
                        </div>
                       </a>
            
                    </div>
                    
                </div>
                <div  class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Booking Analytics</h5>
                    <select class="form-select shadow-none bg-light w-auto" >
                         <option selected>Open this select menu</option>
                          <option value="1">Past 30 days</option>
                       <option value="2">Past 90 days</option>
                         <option value="3">Past 1 year</option>
                         <option value="4">All time</option>
                        </select>
                    
                </div>
                <div class="row mb-3">
                       <div class="col-md-3 mb-4">
                        <div class="card text-center text-primary p-3">
                       <h6>Active Bookings</h6>
                       <h1 class="mt-2 mb-0">0</h1>
                       <h4 class="mt-2 mb-0">$0</h4>
                      </div>            
                </div>
                </div>

        </div>
    </div>




    
    <?php require('inc/script.php');?>
</body>
</html>