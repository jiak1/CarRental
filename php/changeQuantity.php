<?php
session_start();

// Start a session & intialise a blank cart if need be
$cart = $_SESSION['cart'];
if (isset($cart) == false) {
	$cart = [];
}

$carsJson = json_decode(file_get_contents("../cars.json"), true);

$carModel = $_POST['model'];
$newAmount = $_POST['amount'];

$response = [];

$foundModel = false;
$carDetails = null;

// Check we have the right POST params
if (isset($carModel) && isset($newAmount)) {
	foreach ($carsJson["cars"] as $car) {
		if ($car['model'] == $carModel) {
			$foundModel = true;
			$carDetails = $car;
		}
	}
}

if ($foundModel) {
	// Check if we already have this item in the cart
	if (isset($cart[$carModel])) {
		$response['message'] = 'Updated vehicle quantity';
		$cart[$carModel] = $newAmount;
		$response['cart'] = $cart;
		// Update the session with our new cart
		$_SESSION['cart'] = $cart;
	}
} else {
	$response['message'] = 'This model is not registered with us.';
}

echo json_encode($response);
