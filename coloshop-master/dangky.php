<?php
include '../coloshop-master/connect.php';
$err = [];
// $pass = null;
$errPass =[];
if (isset($_POST['name'])) {
   $username = $_REQUEST['name'];
   $email = $_REQUEST['email'];
   $password = $_REQUEST['password'];
   $confirm = $_REQUEST['confirm'];
   $uppercase = preg_match('@[A-Z]@', $password);
   // $lowercase = preg_match('@[a-z]@', $password);
   $number    = preg_match('@[0-9]@', $password);
   // $specialChars = preg_match('@[^\w]@', $password);
   if(!$uppercase || !$number || strlen($password) < 8) {
    $errPass['password'] = 'Password should be at least 8 characters in length and should include at least one upper case letter.'.'<br>';
  }else{
   $errPass['password'] =' '.'<br>';
   }
   if (empty($username)) {
      $err['username'] = 'You have not entered your username';
   }
   if (empty($email)) {
      $err['email'] = 'You have not entered your email';
   }
   if (empty($password)) {
      $err['password'] = 'You have not entered your password';
   }
   // if (($password != $confirm) || $password == null) {
   //    $err['confirm'] = 'Password incorrect'.'<br>';
   // }
   if (empty($err)) {
      if (empty($errPass)){
      $pass = password_hash($password, PASSWORD_DEFAULT); //mã hóa mật khẩu
      $sql = "INSERT INTO user(name,email,password) VALUES('$username','$email','$pass')";
      $query = mysqli_query($conn, $sql);
      }
      if ($query) {
         header('location: dangnhap.php');
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <style>
      form {

         width: 250px;
      }

      input[type="submit"] {
         margin: 8px 56px;
      }

      h3 {
         text-align: center;
      }

      fieldset {
         width: 250px;
         border: none;
         box-shadow: #999 4px 4px 5px 0px;
      }

      .index {
         display: flex;
      }

      .cont_btn {
         position: relative;
         float: left;
      }

      button.btn_sign:hover {
         background-color: #099cfd;
         background-image: linear-gradient(315deg, #19d5ff 0%, #a507f5 74%);
         transition: all 0.3s ease;
         /* background: transparent; */
         box-shadow: 4px 4px 6px 0 rgb(3, 255, 255),
            -4px -4px 6px 0 rgb(1, 255, 234),
            inset -4px -4px 6px 0 rgba(3, 247, 255, 0.938),
            inset 4px 4px 6px 0 rgb(0, 247, 255);
         color: rgb(255, 255, 255);
      }

      .btn_sign {
         background: rgba(255, 64, 88, 0.74);
         box-shadow: 0px 2px 20px 2px rgba(255, 114, 132, 0.50);
         border-radius: 8px;
         padding: 15px 30px;
         border: none;
         color: #fff;
         font-size: 14px;
         position: relative;
         float: left;
         margin-left: 100px;
         margin-top: 20px;
         margin-bottom: 20px;
         cursor: pointer;
      }

      fieldset {
         margin: 20px 330px;
         width: 460px;
         height: 530px;
         background-color: #fff;
         border-radius: 8px;
         position: absolute;
      }

      input[type="email"] {
         width: 360px;
         height: 30px;
         margin: 7px 0px 0px 0px;
         /* box-shadow: #999 4px 4px 5px 0px; */
         border-radius: 3px;
      }

      input[type="text"] {
         width: 360px;
         height: 30px;
         margin: 7px 0px 0px 0px;
         /* box-shadow: #999 4px 4px 5px 0px; */
         border-radius: 3px;
      }

      button.btn_sign {
         top: 52px;
         left: 18px;
      }

      button.btn_sign {
         top: -11px;
         left: 18px;
      }

      div {
         width: 386px;
      }

      input[type="password"] {
         width: 360px;
         height: 30px;
         margin: 7px 0px 0px 0px;
         /* box-shadow: #999 4px 4px 5px 0px; */
         border-radius: 3px;
      }

      .index {
         width: 458px;
         height: 68px;
         margin: 0px 8px;
      }

      .index1 {
         text-align: center;
         width: 110px;
         height: 25px;
         margin: -1px -88px 0px 109px;
         padding: 0px 0px 27px 0px;
         color: #999999;

      }

      .index2 {
         text-align: center;
         width: 110px;
         height: 34px;
         margin: -1px 0px 1px 88px;
         padding: 0px 0px 18px 0px;
         color: #999999;

      }


      ul {
         display: flex;
         padding: unset;
      }

      legend {
         width: 107px;
         height: 49px;
         padding: 0px 0px 0px 0px;
         line-height: 44px;
         margin: 0px 5px;

      }

      a {
         text-decoration: none;
      }

      body {

         background: #e0e5ec;

      }

      .index2 a {
         color: rgba(255, 64, 88, 0.74);
      }

      .index1 a {
         color: #999;
      }

      .all_login {
         margin: 0px 46px;
      }
   </style>
</head>
<fieldset>

   <body>

      <form action="" method="POST">
         <div class="index">
            <ul>
               <div class="index1"><a href="dangnhap.php">
                     <legend>SIGN IN</legend>
                  </a></div>
               <div class="index2"><a href="#">
                     <legend>REGISTER</legend>
                  </a></div>
            </ul>
         </div>
         <div class="all_login">
            <div class="login1">
               <label for="">User Name: </label><br>
               <input type="text" name="name" placeholder="User Name*">
               <div class="has-error">
                  <span style="color: red;"><?php echo (isset($err['username'])) ? $err['username'] : ''; ?></span>
               </div>
            </div>
            <div class="login2">
               <label for="">Email: </label><br>
               <input type="text" name="email" placeholder="Email*">
               <div class="has-error">
                  <span style="color: red;"><?php echo (isset($err['email'])) ? $err['email'] : ''; ?></span>
               </div>
            </div>
            <div class="login3">
               <label for="">Password: </label><br>
               <input id="password"  type="password" name="password" placeholder="Password*">
               <div class="has-error">
                  <span style="color: red;"><?php echo (isset($err['password'])) ? $err['password'] : ''; ?></span>
               </div>
                  <span style="color: red;"><?php echo (isset($errPass['password'])) ? $errPass['password'] : ''; ?></span>
                  <span id="emesager"></span>
               </div>
            <div class="login4">
               <label for="">Confirmpassword: </label><br>
               <input id="confirmpass" type="password" name="confirm" placeholder="Confirmpassword*">
               
               <div class="has-error">
                  <span style="color: red;"><?php echo (isset($err['confirm'])) ? $err['confirm'] : ''; ?></span>
                  <span id="confirm"></span>
               </div>
            </div>
            <div class="terms_and_cons d_none">
               <p><input type="checkbox" name="terms_and_cons" /> <label for="terms_and_cons">Accept Terms and Conditions.</label></p>

            </div>
            <div class="cont_btn">
               <button class="btn_sign">REGISTER</button>
            </div>
      </form>
      </div>

   </body>
   
</fieldset>
<script>
   $('#password').on('keyup',function(){
      if ($('#password').val().length>4 && $('#password').val().length<=8){
         $('#emesager').html('Average Password...').css('color','orange');;
         console.log
      }
       if ($('#password').val().length<4 ) {
         $('#emesager').html('Wrong Password ...').css('color','red');
       }
       if (($('#password').val().length > 8)){
         $('#emesager').html('Strong Password...').css('color','green');
      }
   })
   $('#confirmpass').on('keyup',function(){
      if ($('#password').val() == $('#confirmpass').val()){
         $('#confirm').html(' ')
      }else {
         $('#confirm').html('Password incorrect !!').css('color','red');
      }
   })

</script>
</html>