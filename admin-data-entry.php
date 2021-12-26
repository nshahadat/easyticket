<?php
include "include/header.php";
include "include/navbar.php";
?>

<div  style="text-align: right; padding-top: 30px; padding-right:20px;">
    <h2>hello admin, &nbsp;<a href="admin-login.php" style="text-decoration:none !important;">
    <input type="button" name="logout" value="Logout" style="width:fit-content !important;"></a>
    </h2>
</div>

<p style="text-align:center; color:#5e8d93;">Enter information.</p>
<div class="login-page" id="login">
    <div class="form">
        <form class="login-form" method="POST">
            <div class="custom-select">
                <p style="text-align:center; color:#5e8d93;">From</p>
                <select name="searching_from">
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Panchagar">Panchagar</option>
                    <option value="Rangamati">Rangamati</option>
                    <option value="Bandarban">Bandarban</option>
                    <option value="Saint Martin">Saint Martin</option>
                    <br><br>
                </select>
            </div>
            <br>
            <div class="custom-select">
                <p style="text-align:center; color:#5e8d93;">To</p>
                <select name="searching_to">
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Panchagar">Panchagar</option>
                    <option value="Rangamati">Rangamati</option>
                    <option value="Bandarban">Bandarban</option>
                    <option value="Saint Martin">Saint Martin</option>
                    <br><br>
                </select>
            </div>
            <br>
            <input type="date" name="date_travel"  placeholder="Date"/>
            <input type="submit" name="search_btn"  value="Search" required/>
        </form>
    </div>
</div>

<?php
include "include/footer.php";
?>