<?php



  require('admin/inc/dbconfig.php');
  require('admin/inc/essentials.php');
  require('inc/paytm/config_paytm.php');
  require('inc/paytm/encdec_paytm.php');

  date_default_timezone_set("Asia/Kolkata");


  session_start();

  unset($_SESSION['room']);

  
  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");

  /*$paytmChecksum = "";
  $paramList = array();
  $isValidChecksum = "TRUE";

  $paramList = $_POST;
  $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

  //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
  $isValidChecksum = "TRUE"; //will return TRUE or FALSE string.


  if($isValidChecksum == "TRUE") 
  {

     $slct_query =  "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'  ";
     $slct_res=mysqli_query($con, $slct_query);


    echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
      echo "<b>Transaction status is success</b>" . "<br/>";
      //Process your transaction here as success transaction.
      //Verify amount & order id received from Payment gateway with your application's order id and amount.
    }
    else {
      echo "<b>Transaction status is failure</b>" . "<br/>";
    }

    if (isset($_POST) && count($_POST)>0 )
    { 
      foreach($_POST as $paramName => $paramValue) {
          echo "<br/>" . $paramName . " = " . $paramValue;
      }
    }
    

  }
  else {
    redirect('index.php');
  }


  */
  

  

?>

