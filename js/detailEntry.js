function validForm(){
	if($.trim($("#name").val()) == ''){
		alert("Please enter the name of the customer.");
		return false;
	}
	if($.trim($("#street").val()) == ''){
		alert("Please a valid street address.");
		return false;
	}
	if($.trim($("#postcode").val()) == ''){
		alert("Please a valid postcode.");
		return false;
	}
	if($.trim($("#suburb").val()) == ''){
		alert("Please enter a valid suburb.");
		return false;
	}
	if($.trim($("#email").val()) == '' || $("#email").val().includes("@") == false || $("#email").val().split("@")[1].includes(".") == false){
		alert("Please enter a valid email address.");
		return false;
	}
	return true;
}

$( document ).ready(function() {
	$("#purchaseButton").click(function() {
		if(validForm()){
			$("#purchaseForm").submit();
		}
	});
})