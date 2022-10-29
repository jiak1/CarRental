<!doctype html>
<html>

<head>
	<title>14256034 - Task 2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="/js/jquery.js"></script>
	<script src="/js/tailwind.js"></script>
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700&display=swap" />
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						main: '#8e2de2',
						dark: '#4a00e0',
						secondary: '#ff0a72'
					}
				}
			}
		}
	</script>
	<script src="/js/.js"></script>
</head>

<body>
	<div class="h-screen w-screen md:overflow-x-hidden">
		<div class="bg-main drop-shadow-lg flex justify-center">
			<h1 class="text-center text-white text-center text-2xl pt-6 pb-6 font-medium">Car Rentals</h1>
			<a href="/index.html"><button class="absolute right-10 mt-6 px-4 py-2 font-semibold text-sm bg-white hover:bg-purple-200 text-black rounded shadow-sm">View
					Cars</button></a>
		</div>
		<div id="browsePanel" class="w-fit h-fit pl-8 pr-8 pt-8 ml-auto mr-auto block">
			<h1 class="text-3xl text-black font-bold pt-4 pb-4 text-center">Order Summary</h1><br>
			<?php echo $body; ?>
			<div class="w-fit max-w-11/12 ml-auto mr-auto overflow-x-auto shadow-md sm:rounded-lg mb-6">
				<table id="cartTable" class="text-sm text-left text-gray-500">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50">
						<tr>
							<th scope="col" class="px-6 py-3">Thumbnail</th>
							<th scope="col" class="px-6 py-3">Vehicle</th>
							<th scope="col" class="px-6 py-3">Price Per Day</th>
							<th scope="col" class="px-6 py-3">Rental Days</th>
							<th scope="col" class="px-6 py-3">Cost</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $table; ?>
					</tbody>
				</table>
			</div>
			<br><br>
		</div>

	</div>
</body>

</html>