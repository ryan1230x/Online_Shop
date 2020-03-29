$(document).ready(function(){

    $(".button-collapse").sideNav();
    $(".slider").slider({indicators: false});
    $(".modal").modal();
	
	// Add a product to wishlist
	$("#setWishlist").submit((e) => {
		e.preventDefault();
		const url="https://ryanwilliamharper.com/online_shop/api/routes/products.php";
		const product_id=$("#product_id").val();
		const currentUser=$("#current_user").val();
		const data={
			"product_id":product_id,
			"user":currentUser,
		};
		$.ajax({
			type:"POST",
			url:url,
			data:JSON.stringify(data),
			contentType:"application/json"
		})
		.done(function(data=JSON.parse(`{"message":${data.Message}}`)) {
			Materialize.toast(`${data.Message}`, 4000);
		});
	});
    
    

}); // end of JQuery
