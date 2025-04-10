<?php
// Database configuration
$hname = "localhost:3308";
$uname = "root";
$pass = ""; // If there is a password, put it here.
$db = "hbwebsite";

// Create connection
$con = mysqli_connect($hname, $uname, $pass, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function filteration($data){
    foreach($data as $key =>$value){
      $value =trim($value);
      $value=stripslashes($value);
      $value=strip_tags($value);
      $value =htmlspecialchars($value);
      $data[$key] = $value;
    }
     return $data;
}

function selectAll($table)
{
  $con = $GLOBALS['con'];
  $res = mysqli_query($con , "SELECT * FROM $table");
  return $res;

}

function select($sql,$values,$datatypes)
{
    $con=$GLOBALS['con'];
    if($stmt=mysqli_prepare($con,$sql))
    {
       mysqli_stmt_bind_param($stmt,$datatypes,...$values);
      if( mysqli_stmt_execute($stmt)){
        $res= mysqli_stmt_get_result($stmt);
        return $res;
      }
      else{
        mysqli_stmt_close($stmt);
        die("query canaot be executed-select");
      }
      
    }
    else{
        die("query cannot be prepsred-select");
    }

      
}

function update($sql,$values,$datatypes)
{
  $con=$GLOBALS['con'];
  if($stmt=mysqli_prepare($con,$sql))
  {
      mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    if( mysqli_stmt_execute($stmt)){
      $res= mysqli_stmt_affected_rows($stmt);
      return $res;
    }
    else{
      mysqli_stmt_close($stmt);
      die("query canaot be executed-Update");
    }
    
  }
  else{
      die("query cannot be prepsred-Update");
  }

      
}

function insert($sql,$values,$datatypes)
{
    $con=$GLOBALS['con'];
    if($stmt=mysqli_prepare($con,$sql))
    {
       mysqli_stmt_bind_param($stmt,$datatypes,...$values);
      if( mysqli_stmt_execute($stmt)){
        $res= mysqli_stmt_affected_rows($stmt);
        return $res;
      }
      else{
        mysqli_stmt_close($stmt);
        die("query canaot be executed-insert");
      }
      
    }
    else{
        die("query cannot be prepsred-insert");
    }

      
}


function del($sql,$values,$datatypes)
{
  $con=$GLOBALS['con'];
  if($stmt=mysqli_prepare($con,$sql))
  {
      mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    if( mysqli_stmt_execute($stmt)){
      $res= mysqli_stmt_affected_rows($stmt);
      return $res;
    }
    else{
      mysqli_stmt_close($stmt);
      die("query canaot be executed-delete");
    }
    
  }
  else{
      die("query cannot be prepsred-deleszte");
  }

}





?>