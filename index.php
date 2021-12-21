<?php
include "include/header.php";
include "include/navbar.php";
?>

<p style="text-align:center; color:#5e8d93;">You must be registered and logged in to search and buy tickets form Easy Ticket.</p>
<div class="login-page" id="login">
    <div class="form">
        <form class="login-form">
            <input type="text" name="login_username" placeholder="username"/>
            <input type="password" name="login_pwd"  placeholder="password"/>
            <input type="submit" name="log_btn"  value="Login" required/>
            <p class="message">Not registered? <a href="#register">Create an account</a></p>
        </form>
    </div>
</div>
<div class="login-page" id="register">
    <div class="form">
        <form class="login-form">
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
include "include/footer.php";
?>