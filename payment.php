<?php
include "include/header.php";
include "include/navbar.php";
?>

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
    <p>GIve your mobile number </p>
    <input type="tel" name="payment_mobile" placeholder="Mobile No"/>
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

    $sql = "INSERT IGNORE INTO $payment (amount,mobile) VALUES('$payment_amount','$payment_mobile')";
    $mysqli->query($sql) or die($mysqli->error);
    echo "<script>alert('Payment succesful')</script>";
}
else {
    echo "<script>alert('Please fill up all the information in the correct way.')</script>";
}
?>

<?php
include "include/footer.php";
?>