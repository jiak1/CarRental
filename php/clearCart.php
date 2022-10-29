<?php
session_start();

$_SESSION['cart'] = [];

$response['message'] = "Cleared cart.";
echo json_encode($response);
