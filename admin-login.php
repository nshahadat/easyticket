<?php
include "include/header.php";
include "include/navbar.php";
?>

<?php
include "include/db_config.php";

if(isset($_POST['ad_log_btn'])){
    $uname = $_POST['ad_login_username'];
    $pass = $_POST['ad_login_pwd'];
    $email = $_POST['ad_login_email'];

    $sql = "SELECT * FROM $admin WHERE username = '$uname' AND password = '$pass' AND email = '$email'";

    $result  = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $numrows = mysqli_num_rows($result);

    if ($numrows == 0) {
        echo "<script>alert('Wrong username or password')</script>";
    } else {
        session_start();
        $_SESSION['name'] = $uname;

        header("Location: admin-data-entry.php");

    }
}
?>

<div class="login-page" id="login">
    <div class="form">
        <form class="login-form" method="POST">
            <input type="text" name="ad_login_username" placeholder="Admin Username" required/>
            <input type="email" name="ad_login_email" placeholder="Admin Email" required/>
            <input type="password" name="ad_login_pwd"  placeholder="Admin Password" required/>
            <input type="submit" name="ad_log_btn"  value="Login" required/>
        </form>
    </div>
</div>

<?php
include "include/footer.php";
?>