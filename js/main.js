$(document).ready(function(){

if (window.innerWidth > 600) {
    $(".card.card-image > img").addClass("img-height");
}

$(".button-collapse").sideNav();

$(".slider").slider({
indicators: false
});

$('select').material_select();

$(".modal").modal();

$("#te").sideNav({
    edge: 'right'
});

/*-------------------- AJAX -------------------*/

$("#order_btn").on("click", (event) => {
    event.preventDefault();
    let color = $("#color").val();
    let size = $("#size").val();
    let item = $("#hidden").val();
    $.ajax({
        type:"POST",
        url: "setCart.php",
        data: {
            color: color,
            size: size,
            item: item
        },
        complete: () => {
            Materialize.toast('Added to Shopping Cart', 3000)
        },
        error: () => {
            Materialize.toast('Error', 3000)
        }
    })
});

$(".likeIcon").on("click", (e) => {
    e.preventDefault();
    let input = $(e.currentTarget).next().val();
    $.ajax({
        type: "POST",
        url: "setLike.php",
        data: {
            item: input
        },
        complete: () => {
            Materialize.toast('Added to Favorites', 3000)
        },
        error: () => {
            Materialize.toast('Please try again', 3000)
        }
    })

});

$(".deleteBtn").on("click", (e) => {
    e.preventDefault();
    let data = $(e.currentTarget).next().val();
    $.ajax({
        type: "POST",
        url: "ajax/unSetCart.php",
        data: {
            item: data
        },
        complete: () => {
            Materialize.toast('Product Deleted', 3000)
        },
        error: () => {
            Materialize.toast('Please try again', 3000)
        }
    });
});

$(".unLike").on("click", (e) => {
    e.preventDefault();
    let data = $(e.currentTarget).next().val();
    $.ajax({
        type: "POST",
        url: "unSetWish.php",
        data: {
            item: data
        },
        complete: () => {
            Materialize.toast('Product Deleted', 3000)
        },
        error: () => {
            Materialize.toast('Please try again', 3000)
        }
    });
});

$("#orderSubmit").on("click", (e) => {
    e.preventDefault();
    let address = $("#address").val();
    let town = $("#town").val();
    let mob = $("#mob").val(); 
    let item = $("#item > input").val();
    let color = $("#color > input").val();
    let size = $("#sizeitem > input").val();
    $.ajax({
        type: "POST",
        url: "shopping-cart-order.php",
        data: {
            item: item,
            color: color,
            size: size,
            address: address,
            town: town,
            mob: mob
        },
        complete: () => {
            Materialize.toast('Your Order Has Been Placed', 6000);
            // alert("Your Order Has Been Placed");
        },
        error: () => {
            Materialize.toast('Please Try Again', 3000);
        }
    });
});

$("#submitNewsletter").on("click", (e) => {
    e.preventDefault();
    let email = $("#email").val();
    $.ajax({
        type: "POST",
        url: "setNewsletter.php",
        data: {
            userEmail: email
        },
        complete: () => {
            Materialize.toast('Thank You For Signing Up', 8000);
        },
        error: () => {
            Materialize.toast('Please Try Again', 8000);
        }
    });
});




}) // end
