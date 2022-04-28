<?php
include "../coloshop-master/connect.php";

$errEmail = $errPass = null;
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = " SELECT * FROM user WHERE email = '$email'";//truy vấn vào database
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkEmail = mysqli_num_rows($query); //kiểm tra xem có ở trong database hay không
    //  var_dump($checkEmail);
    if ($checkEmail == 1) {
        $checkPassword = password_verify($password, $data['password']); //mã hóa mật khẩu quay lại
        if ($checkPassword) {
            $_SESSION['user'] = $data; //lưu vào session
            header('location: index.php');
        } 
        if (empty($checkPassword)){
            $errPass = 'You need to enter a password';
        }
        if ($checkPassword != $password) {
            $errPass = 'Wrong password';
        }
    }
    if ($checkEmail == 0 && $email != null) {
        $errEmail = 'Email does not exist';
    }
    if ((empty($email) && empty($password))){
        $errPass = 'You need to enter a Password';
        $errEmail = 'You need to enter your Email';
    }
    if ((empty($email))){
        $errEmail = 'You need to enter your Email';
    }
    if(empty($password)) {
        $errPass = 'You need to enter a Password';
    }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="csslogin.css">
    <title>Document</title>
   
</head>

<fieldset>

    <body>
        <div>
            <form action="" method="post">
                <div class="index">
                    <ul>
                        <div class="index1"><a href="#">
                                <legend>SIGN IN</legend>
                            </a></div>
                        <div class="index2"><a href="dangky.php">
                                <legend>REGISTER</legend>
                            </a></div>
                    </ul>
                </div>
                <div class="index_box">
                    Email:<br>
                    <input type="email" name="email" placeholder="Email"><span style="color:red"> *</span><br>
                    <span class="error" style='color: red'><?php echo $errEmail; ?></span><br>
                </div>
                <div class="index_box1">
                    Password:<br>
                    <input id="myInput" type="password" name="password" placeholder="Password"><span style="color:red"> *</span><br>
                    <span class="error" style='color: red'><?php echo $errPass; ?></span><br>
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                <div class="link_forgot_pass d_block">
                <div class="index_box2"><a  href="forgotpassword.php" > Forgot Password ?</a></div>
                </div>
            </div>
        <div class="cont_btn">
            <button class="btn_sign">SIGN IN</button>

        </div>
        </form>
        </div>
</fieldset>
</body>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
</html>