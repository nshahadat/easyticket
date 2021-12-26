<?php
include "include/header.php";
include "include/navbar.php";
?>

<p style="text-align:center; color:#5e8d93;">Search available bus(s) from here</p>
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

include "include/db_config.php";

if(isset($_POST['search_btn'])){
    $searching_from = $_POST['searching_from'];
    $searching_to = $_POST['searching_to'];
    $date_travel = $_POST['date_travel'];

    $sql = "SELECT * FROM $ticket WHERE from_location = 'searching_from' AND to_location = 'searching_to' AND date = '$date_travel'";

    if ($numrows == 0) {
        echo "<script>alert('Sorry there are no bus(s) available according to your search.')</script>";
    } else {
        echo "<p> Here are the bus(s) that are available.</p>";?>
        
        <button type="button" class="collapsible">Buses</button>
            <div class="content">
                <p>Saint Martin Travels</p>
            </div>

        <?php }
}

?>

<?php
include "include/footer.php";
?>