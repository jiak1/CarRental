<?php
session_start();

// Start a session & intialise a blank cart if need be
$cart = $_SESSION['cart'];
if (isset($cart) == false) {
	$cart = [];
}

$total = 0;
$carsJson = json_decode(file_get_contents("../cars.json"), true);

foreach ($cart as $cartItemModel => $cartItemQuantity) {
	foreach ($carsJson["cars"] as $car) {
		if ($car['model'] == $cartItemModel) {
			$total += $car['price_per_day'] * $cart[$cartItemModel];
		}
	}
}

include("templates/customerDetailsTemplate.php");
