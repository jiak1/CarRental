<?php
session_start();

// Start a session & intialise a blank cart if need be
$cart = $_SESSION['cart'];
if (isset($cart) == false) {
	$cart = [];
}

$body = '';

$carsJson = json_decode(file_get_contents("../cars.json"), true);

foreach ($cart as $cartItemModel => $cartItemQuantity) {
	foreach ($carsJson["cars"] as $car) {
		if ($car['model'] == $cartItemModel) {
			$body .= '<tr class="bg-white border-b" id="row-' . $cartItemModel . '">
									<td class="px-6 py-4"><img class="max-w-[200px]" src="/images/' . $cartItemModel . '.jpg"/></td>
									<td class="px-6 py-4">' . $car['model_year'] . '-' . $car['brand'] . '-' . $car['model'] . '</td>
									<td class="px-6 py-4">$' . $car['price_per_day'] . '</td>
									<td class="px-6 py-4"><input type="number" min="1" max="365"value="' . $cart[$cartItemModel] . '" class="appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-1 leading-tight outline-none outline-none focus:ring-main focus:border-lightgreen focus:ring-2 transition-all ml-auto mr-auto text-center w-[70px]"/></td>
									<td class="px-6 py-4"><button onclick="deleteFromCart(\'' . $cartItemModel . '\')" class="ml-4 mt-4 px-4 py-2 font-semibold text-sm bg-red-600 hover:bg-red-500 text-white rounded-full shadow-sm">Delete</button></td>
								</tr>';
		}
	}
}
include("templates/viewCartTemplate.php");
