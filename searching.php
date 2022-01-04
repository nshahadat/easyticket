<?php
include "include/header.php";
include "include/navbar.php";

session_start();
?>

<div  style="text-align: right; padding-top: 30px; padding-right:20px;">
    <p>hello user, &nbsp;<a href="index.php" style="text-decoration:none !important;">
    <input type="button" name="logout" value="Logout" style="width:fit-content; background:none; color:#5e8d93 !important;"></a>
</p>
</div>

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

    $sql = "SELECT * FROM $ticket WHERE from_location = '$searching_from' AND to_location = '$searching_to' AND date = '$date_travel'";

    $result  = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $numrows = mysqli_num_rows($result);

    if ($numrows == 0) {
        echo "<script>alert('Sorry there are no bus(s) available according to your search.')</script>";
    } else {?>
        <div class="login-page" id="login">
        <p> Here are the bus(s) that are available.</p> <br> <br>
        </div>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['ticket_id_session'] = $row["ticket_id"];
            $_SESSION['avl_seats_session'] = $row["available_seats"];
            ?>
        <div class="login-page" id="login">
            <form method="POST">
                <p> Bus name = <?php echo $row['bus'];?> </p>
                <p> Date = <?php echo $row['date'];?> </p>
                <p> Price = <?php echo $row['price'];?> </p>
                <p> Available Seats = <?php echo $row['available_seats'];?> </p>
                <p> Time = <?php echo $row['time'];?> </p>
                <input type="submit" name="booking_btn"  value="Book" required/>
                <input type="hidden" name="hidden_available_seats" value="<?php echo $row['available_seats'];?>">
                <input type="hidden" name="hidden_ticket_id" value="<?php echo $row['ticket_id'];?>">
                <input type="hidden" name="hidden_user_id" value="<?php echo $_SESSION['id'];?>">
                <input type="hidden" name="hidden_bus_name" value="<?php echo $row['bus'];?>">
                <br>
            </form>
        </div>
<?php    }

        }
}

?>

<?php

if(isset($_POST['booking_btn'])){
    $ticket_id = $_SESSION['ticket_id_session'];
    $user_id = $_POST['hidden_user_id'];
    $booking_id = $ticket_id + $user_id;
    $bus_name = $_POST['hidden_bus_name'];
    $avl_seats_before = $_SESSION['avl_seats_session'];
    $amount = 1;
    $avl_seats_after = $avl_seats_before - $amount;

    $query = "INSERT IGNORE INTO $booking(booking_id,ticket_id,user_id,bus_name) VALUES ('$booking_id','$ticket_id','$user_id','$bus_name')";

    $result  = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

    $update_sql = "UPDATE $ticket SET available_seats = '$avl_seats_after' WHERE ticket_id = '$ticket_id'";
    $result  = mysqli_query($mysqli, $update_sql) or die(mysqli_error($mysqli));
    header("Location: payment.php");

}

?>
<?php
include "include/footer.php";
?>