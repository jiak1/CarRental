<?php
session_start();

// Start a session & intialise a blank cart if need be
$cart = $_SESSION['cart'];
if (isset($cart) == false) {
	$cart = [];
}

$total = 0;
$table = '';
$carsJson = json_decode(file_get_contents("../cars.json"), true);

if ($cart == [] || $_POST['name'] == '') {
	header("Location: /");
	die();
}

foreach ($cart as $cartItemModel => $cartItemQuantity) {
	foreach ($carsJson["cars"] as $car) {
		if ($car['model'] == $cartItemModel) {
			$total += $car['price_per_day'] * $cart[$cartItemModel];
			$table .= '<tr class="bg-white border-b" id="row-' . $cartItemModel . '">
									<td class="px-6 py-4"><img class="max-w-[200px]" src="/images/' . $cartItemModel . '.jpg"/></td>
									<td class="px-6 py-4">' . $car['model_year'] . '-' . $car['brand'] . '-' . $car['model'] . '</td>
									<td class="px-6 py-4">$' . $car['price_per_day'] . '</td>
									<td class="px-6 py-4">' . $cart[$cartItemModel] . '</td>
									<td class="px-6 py-4"><b>$' . $car['price_per_day'] * $cart[$cartItemModel] . '</b></td>
								</tr>';
		}
	}
}

$table .= '<tr class="bg-white border-b" id="row-' . $cartItemModel . '">
					<td class="px-6 py-4"></td>
					<td class="px-6 py-4"></td>
					<td class="px-6 py-4"></td>
					<td class="px-6 py-4"><b>Total:</b></td>
					<td class="px-6 py-4"><b>$' . $total . '</b></td>
					</tr>';

$body .= '<label class="block ml-auto mr-auto text-lg text-center"><b>Name:</b> ' . $_POST['name'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>Email:</b> ' . $_POST['email'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>Address:</b> ' . $_POST['street'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>Suburb:</b> ' . $_POST['suburb'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>Postcode:</b> ' . $_POST['postcode'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>State:</b> ' . $_POST['state'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>Country:</b> ' . $_POST['country'] . '</label>
					<label class="block ml-auto mr-auto text-lg text-center"><b>Payment Type:</b> ' . $_POST['paymenttype'] . '</label><br><br>';

$_SESSION['cart'] = [];
include("templates/summaryTemplate.php");
