<?php
$mysqli = new mysqli('localhost', 'root', '', 'easyticket') or die($mysqli->connect_error);
$admin  = 'admin';
$user = 'user';
$payment = 'payment';
$booking = 'booking';
$ticket = 'ticket';