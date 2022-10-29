function deleteFromCart(model){
	$.post("/php/deleteFromCart.php", {"model":model}, function(result){
		let response = JSON.parse(result)
		if(response.message){
			$("#row-"+model).remove()
		}else{
			alert('Unable to connect to Database.')
		}
		
	});
}

function clearCart(){
	$.post("/php/clearCart.php", function(result){
		let response = JSON.parse(result)
		if(response.message){
			$("tbody").empty()
		}else{
			alert('Unable to connect to Database.')
		}
		
	});
}

function checkoutCart(){
	var valid = true;
	
	if($("tbody").children().length == 0){
		alert("Your cart is empty. Please add a vehicle before checking out.");
		valid = false;
	}

	$( "input" ).each(function( index ) {
		if(valid){
			if($(this).val() <= 0){
				alert("Rental days must be at least 1.");
				valid = false;
			}
		}
	});

	if(valid){
	location.href="/php/customerDetails.php";
	}
}

$( document ).ready(function() {
	$( "input" ).each(function( index ) {
		//When a quantity is updated, update the php session details
		$(this).change(function(){
			if($(this).val() > 0){
				// Get the mode name from the rows ID
				const model = $(this).parent().parent().attr("id").split("-")[1]
				const amount = $(this).val();
				$.post("/php/changeQuantity.php", {"model":model,"amount":amount}, function(result){
					let response = JSON.parse(result)
					if(!response.message){
						alert('Unable to connect to Database.')
					}
				});
			}
		})
	});
})