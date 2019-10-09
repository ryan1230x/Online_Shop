$(document).ready(function(){

    $(".button-collapse").sideNav();
    $(".slider").slider({indicators: false});
    $(".modal").modal();

    $("#registerLink").on("click", () => {
        $("#login").css({'display': 'none'})        
        $("#register").css({'display': 'block'})
    });
    $("#loginLink").on("click", () => {
        $("#register").css({'display': 'none'})
        $("#login").css({'display': 'block'})
    });
});
