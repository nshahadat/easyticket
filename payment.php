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

<div class="login-page" id="login">
<form method="POST">
    <p>Choose payment method </p>
    <div class="custom-select">
    <select name="payment_method">
        <option value="bKash">bKash</option>
        <option value="Rocket">Rocket</option>
        <option value="Nagad">Nagad</option>
        <option value="Upay">Upay</option>
    </select>
    </div>
    <br>
    <p>Enter your mobile number </p>
    <input type="tel" pattern="{0}{1}[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" name="payment_mobile" placeholder="Mobile No"/>
    <p>Set the amount</p>
    <input type="number" name="payment_amount" placeholder="Amount"/>
    <input type="submit" value="Pay" name="payment_submit_btn">
</form>
</div>

<?php
include 'include/db_config.php';

if (isset($_POST['payment_submit_btn'])){
    $payment_method = $_POST['payment_method'];
    $payment_mobile = $_POST['payment_mobile'];
    $payment_amount = $_POST['payment_amount'];
    $user_id = $_SESSION['id'];
    $ticket_id = $_SESSION['ticket_id_session'];
    $price_payment = $_SESSION['price_session'];
    $booking_id = $_SESSION['booking_id_session'];
    $bus_name = $_SESSION['bus_name_session'];
    $avl_seats_after = $_SESSION['avl_seats_after_session'];

    if($payment_amount == $price_payment){

    $sql = "INSERT IGNORE INTO $payment(user_id,ticket_id,amount,mobile) VALUES ('$user_id','$ticket_id','$payment_amount','$payment_mobile')";
    $mysqli->query($sql) or die($mysqli->error);

    $query = "INSERT IGNORE INTO $booking(booking_id,ticket_id,user_id,bus_name) VALUES ('$booking_id','$ticket_id','$user_id','$bus_name')";

    $result  = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

    $update_sql = "UPDATE $ticket SET available_seats = '$avl_seats_after' WHERE ticket_id = '$ticket_id'";
    $result  = mysqli_query($mysqli, $update_sql) or die(mysqli_error($mysqli));

    echo "<script>alert('Payment succesful and booking cofirmed.')</script>";
    //header("Location: index.php");
    } else{echo "<script>alert('Pay the accurate price please!');</script>";}
}
else {
    echo "<script>alert('Please fill up all the information in the correct way.')</script>";
}
?>

<?php
include "include/footer.php";
?>