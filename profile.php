<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAPPYSTAY-CONFIRM BOOKING</title>
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title']?>PROFILE</title>
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
     $u_exist =select("SELECT * FROM `user_cred` WHERE `id` =? LIMIT 1",[$_SESSION['uId']],'s');
      if(mysqli_num_rows($u_exist)==0){
        redirect('index.php');
      }
      $u_fetch=mysqli_fetch_assoc($u_exist);
 ?>



<div class="container">
    <div class="row">
        <div class=" col-12 my-5 mb-4 px-4">
           <h2 class="fw-bold">PROFILE</h2>
           <div style="font-size: 14px;">
             <a href="index.php" class="text-secondary text-decoration-name">HOME</a>
             <span class="text-secondary">  > </span>
             <a href="#" class="text-secondary text-decoration-name">PROFILE</a>
           </div>
        </div>
           
        <div class="col-md-4 mb-5 px-4">
             <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                 <form id="info_form">
                   <h5 class="mb-3 fw-bold"> Basic information</h5>
                   <div class="row">
                   <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">name</label>
                                <input name="name" type="text" value="<?php echo $u_fetch['name']?>" class="form-control shadow-none" required >                        
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Phone number</label>
                                <input name="phonenum" type="number" value="<?php echo $u_fetch['phonenum']?>" class="form-control shadow-none" required >                        
                    </div>
                    <!--<div class="col-md-6 p-0 mb-3">
                                <label class="form-label">date of birth</label>
                                <input name="dob" type="date" value="<?php echo $u_fetch['dob']?>" class="form-control shadow-none" required >                        
                    </div>-->
                    <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">pincode</label>
                                <input name="pincode" type="number" value="<?php echo $u_fetch['pincode']?>" class="form-control shadow-none" required >                        
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">address</label>
                                <input name="address"  value="<?php echo $u_fetch['address']?>" class="form-control shadow-none" rows="1"required >                        
                    </div>
               </div>
               <button type="submit"  class="btn text-white custom-bg shadow-none">save changes</button>
                
                 </form>
             </div>         
          </div>
        
       
          <!-- <div class="col-md-4 mb-5 px-4">
             <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                 <form id="profile-form">
                   <h5 class="mb-3 fw-bold"> PICTURE</h5>
                   <img src="<?php echo USERS_IMG_PATH.$u_fetch['profile']?>" class="img-fluid">
                   <label class="form-label">New Picture</label>
                    <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required >  
                     
                      <button type="submit"  class="btn text-white custom-bg shadow-none">save changes</button>
                 </form>
             </div>         
          </div>-->

          <div class="col-md-8 mb-5 px-4">
             <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                 <form id="pass_form">
                  <h5 class="mb-3 fw-bold">change password</h5>
                  <div class="row">
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">new password</label>
                    <input name="new_pass" type="password"  class="form-control shadow-none" required >                        
                  </div>
                    <div class="col-md-6 p-0 mb-3">
                      <label class="form-label">confirm password</label>
                      <input name="confirm_pass" type="password" class="form-control shadow-none" required >                        
                    </div>  
                  </div>
                    <button type="submit"  class="btn text-white custom-bg shadow-none">Save changes</button>
                 </form>
             </div>         
          </div>


      </div>
    </div>
   

    <?php require('inc/footer.php'); ?>
    <script>
          let info_form =document.getElementById('info_form');
          info_form.addEventListener('submit',function(e){
            e.preventDefault();

            let data=new FormData();
            data.append('info_form','');
            data.append('name',info_form.elements['name'].value);
            data.append('phonenum',info_form.elements['phonenum'].value);
            data.append('address',info_form.elements['address'].value);
            data.append('pincode',info_form.elements['pincode'].value);
            //data.append('dob',info_form.elements['dob'].value);
            let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/profile.php",true)
            xhr.onload = function(){
               if(this.responseText == 'phone_already'){
                alert('error','Phone number is already registered');
            }
              if(this.responseText==0){
                alert('error',"No changes made!");
              } 
              else{
                alert('success','changes saved!');
                info_form.reset();
              } 
            }

         xhr.send(data);
       });
      

      
    
      
       /*let profile_form =document.getElementById('profile_form');

       profile_form.addEventListener('submit',function(e){
        e.preventDefault();
         
          let data=new FormData();
          data.append('profile_form','');
          data.append('profile',profile_form.elements['profile'].files[0]);
          let xhr=new XMLHttpRequest();
          xhr.open("POST","ajax/profile.php",true)
          xhr.onload = function(){
              if(this.responseText == 'inv_image'){
                alert('error','Only JPG, WEBP & PNG images are allowed');
            }
            else if(this.responseText == 'upd_failed'){
                alert('error','Image upload failed');
            }
            else if(this.responseText==0){
              alert('error',"updatin failed");
            } 
            else{
              window.location.href=window.location.pathname
            } 
          }

          xhr.send(data);
       })*/

       let pass_form =document.getElementById('pass_form');
       pass_form.addEventListener('submit',function(e){
        e.preventDefault();
      
       let new_pass=pass_form.elements['new_pass'].value;
       let confirm_pass=pass_form.elements['confirm_pass'].value;
       if(new_pass!=confirm_pass)
       {
        alert('error','password not match!');
        return false;
       }


          let data=new FormData();
          data.append('pass_form','');
          data.append('new_pass',new_pass);
          data.append('confirm_pass',confirm_pass);
          let xhr=new XMLHttpRequest();
          xhr.open("POST","ajax/profile.php",true)
          xhr.onload = function(){
              if(this.responseText == 'mismatch'){
                alert('error','password not match');
            }
            
            else if(this.responseText==0){
              alert('error',"update failed");
            } 
            else{
              alert('success','changes saved');
              pass_form.reset();
            } 
          }

          xhr.send(data);
       })
        

    </script>

      
  </body>
</html>
          