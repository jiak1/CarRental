$.getJSON( "cars.json", function( data ) {
  var cars = data['cars']

	$("#carsList").empty()
	for(var i = 0; i < cars.length; i++){
		const car = cars[i]
		$("#carsList").append(`
			<div class="drop-shadow-xl bg-white ml-8 mr-8 mb-8 pb-4">
				<img class="object-contain w-[300px] h-[250px]" src="/images/${car['model']}.jpg">
				<h2 class="text-center text-xl">${car['model_year']} ${car['brand']} ${car['model']}</h2>
				<div class="h-[1px] bg-gray-300 w-4/5 mt-1 mb-2 ml-auto mr-auto"></div>
				<h2 class="text-center text-lg"><span class="font-medium">Make: </span>${car['category']}</h2>
				<h2 class="text-center text-lg"><span class="font-medium">Mileage: </span>${car['mileage']} km</h2>
				<h2 class="text-center text-lg"><span class="font-medium">Fuel Type: </span>${car['fuel_type']}</h2>
				<h2 class="text-center text-lg"><span class="font-medium">Seats: </span>${car['seats']}</h2>
				<h2 class="text-center text-lg"><span class="font-medium">Price Per Day: </span>$${car['price_per_day']}</h2>
				<h2 class="text-center text-lg"><span class="font-medium">Availabile: </span>${car['availability'] ? 'Yes' : 'No'}</h2>
			</div>
		`)
	}
	console.log(cars)
});