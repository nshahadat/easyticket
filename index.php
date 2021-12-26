<?php
include "include/header.php";
include "include/navbar.php";
?>

<p style="text-align:center; color:#5e8d93;">You must be registered and logged in to search and buy tickets form Easy Ticket.</p>
<div class="login-page" id="login">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="login_username" placeholder="username"/>
            <input type="password" name="login_pwd"  placeholder="password"/>
            <input type="submit" name="log_btn"  value="Login" required/>
            <p class="message">Not registered? <a href="#register">Create an account</a></p>
        </form>
    </div>
</div>
<div class="login-page" id="register">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="reg_name"  placeholder="name" required/>
            <input type="text" name="reg_username"   placeholder="username" required/>
            <input type="email" name="reg_email"   placeholder="email" required/>
            <input type="tel" name="reg_contact"   placeholder="contact no" required/>
            <input type="text" name="reg_address"   placeholder="address"/>
            <input type="password" name="reg_pwd"   placeholder="password" required/>
            <input type="password" name="reg_con_pwd"   placeholder="confirm password" required/>
            <input type="submit" name="reg_btn"  value="Register" required/>
            <p class="message">Already registered? <a href="#login">Login</a></p>
        </form>
    </div>
</div>

<?php
include "include/db_config.php";

if (isset($_POST['log_btn'])){
    $login_username = $_POST['login_username'];
    $login_pwd = $_POST['login_pwd'];

    $sql = "SELECT * FROM $user WHERE username = '$login_username' AND password = '$login_pwd'";

    $result  = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $numrows = mysqli_num_rows($result);

    if ($numrows == 0) {
        echo "<script>alert('Wrong username or password')</script>";
    } else {
        session_start();
        $_SESSION['name'] = $login_username;

        header("Location: searching.php");

    }
}

if (isset($_POST['reg_btn'])){
    $reg_name = $_POST['reg_name'];
    $reg_username = $_POST['reg_username'];
    $reg_email = $_POST['reg_email'];
    $reg_contact = $_POST['reg_contact'];
    $reg_address = $_POST['reg_address'];
    $reg_pwd = $_POST['reg_pwd'];
    $reg_con_pwd = $_POST['reg_con_pwd'];

    if ($reg_pwd == $reg_con_pwd) {
        $sql = "INSERT IGNORE INTO $user (name,email,username,contact,address,password) VALUES('$reg_name','$reg_email','$reg_username','$reg_contact','$reg_address','$reg_pwd')";

        $mysqli->query($sql) or die($mysqli->error);
        echo "<script>alert('You are registered succesfully. Login to continue.')</script>";

        header("Location: index.php");
    }
    else{
        echo "<script>alert('Password and Confirm Password has to match.')</script>";
    }
}
?>

<?php
include "include/footer.php";
?>