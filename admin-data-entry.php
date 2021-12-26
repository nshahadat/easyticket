<?php
include "include/header.php";
include "include/navbar.php";
?>

<div  style="text-align: right; padding-top: 30px; padding-right:20px;">
    <p>hello admin, &nbsp;<a href="admin-login.php" style="text-decoration:none !important;">
    <input type="button" name="logout" value="Logout" style="width:fit-content; background:none; color:#5e8d93 !important;"></a>
</p>
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
            <input type="time" name="time_travel" placeholder="Time"/>
            <div class="custom-select">
                <p style="text-align:center; color:#5e8d93;">Buses</p>
                <select name="bus_name">
                    <option value="Hanif Enterprise">Hanif Enterprise</option>
                    <option value="Saintmartin Travels">SaintMartin Travels</option>
                    <option value="Ena Paribahan">Ena Paribahan</option>
                    <option value="Nabila Express">Nabila Express</option>
                    <option value="Satkhira Paribahan">Satkhira Paribahan</option>
                    <br><br>
                </select>
            </div>
            <br>
            <input type="number" name="price"  placeholder="Price"/>
            <input type="number" name="avl_seats"  placeholder="Available Seats"/>
            <br>
            <input type="submit" name="entry_btn"  value="Entry" required/>
        </form>
    </div>
</div>

<?php

include "include/db_config.php";

if(isset($_POST['entry_btn'])){
    $searching_from = $_POST['searching_from'];
    $searching_to = $_POST['searching_to'];
    $date_travel = $_POST['date_travel'];
    $time_travel = $_POST['time_travel'];
    $bus_name = $_POST['bus_name'];
    $price = $_POST['price'];
    $avl_seats = $_POST['avl_seats'];

    $sql = "INSERT IGNORE INTO $ticket(from_location, to_location, date, bus, price, available_seats, time) VALUES('$searching_from','$searching_to','$date_travel','$bus_name','$price','$avl_seats','$time_travel')";

    if ($insert = $mysqli->query($sql)) {
        echo "<script>alert('Entry Succesfull')</script>";
    } else {
        echo "Something went wrong";
    }
}

?>

<?php
include "include/footer.php";
?>