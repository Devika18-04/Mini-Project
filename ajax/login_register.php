
<?php

    require('../admin/inc/essentials.php');
    require('../admin/inc/dbconfig.php');
    


    if(isset($_POST['register'])) {
        $data = filteration(($_POST));
        
        // Match password and confirm password
        if($data['pass'] != $data['cpass']) {
            echo 'pass_mismatch';
            exit;
        }

        // Check if email or phone number already exists
        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1", 
            [$data['email'], $data['phonenum']], "ss");

        if(mysqli_num_rows($u_exist) != 0) {
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        // Upload user image
        $img = uploadUserImage($_FILES['profile']);

        if($img == 'inv_image') {
            
            echo 'inv_image';
            exit;
        } else if($img == 'upd_failed') {
            echo 'upd_failed';
            exit;
        }

        // Encrypt the password
       // $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);
        

        // Insert user data into the database
        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, 
            `profile`, `password`) VALUES (?,?,?,?,?,?,?,?)";
        
        $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'], 
            $img, $data['pass'] ];
        
        if(insert($query, $values, 'ssssssss')) {
            echo 1;
        } else {
            echo 'ins_failed';
        }
    }

    if(isset($_POST['login']))
    {
        $data= filteration($_POST);

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1", 
            [$data['email_mob'], $data['email_mob']], "ss");

        if(mysqli_num_rows($u_exist) == 0) {
           echo 'inv_email_mob';
           
        }
        else{
            $u_fetch=mysqli_fetch_assoc($u_exist);

           // var_dump($u_fetch); exit;
            if($u_fetch['status']==0)
            {
                echo 'inactive';
            }
            else{
                    session_start();
                    $_SESSION['login']=true;
                    $_SESSION['uId']=$u_fetch['id'];
                    $_SESSION['uName']=$u_fetch['name'];
                    $_SESSION['upic']=$u_fetch['profile'];
                    $_SESSION['uPhone']=$u_fetch['phonenum'];
                    
                    echo 1;
                }
            
            }
    
           

    }
        
     


    

    
?>


