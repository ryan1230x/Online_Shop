$(document).ready(function(){

    $(".button-collapse").sideNav();
    $(".slider").slider({indicators: false});
    $(".modal").modal();

    
    function clearDiv(...$var) {
        $var.map(item => item.text(null).css({'padding': '0px'}));        
    }

    function showLogin() {
        $("#login").css({'display': 'block'})        
        $("#register").css({'display': 'none'})
        clearDiv($("#err-div"));
    }
    function showRegister() {
        $("#register").css({'display': 'block'});
        $("#login").css({'display': 'none'});
        clearDiv($("#err-div"));
    } 
    
    $("#loginLink").on("click", showLogin);
    $("#registerLink").on("click", showRegister);
    
    $("#login").submit((e) => {
        const baseUrl = "http://localhost/projects/WJGarmentsV2/api/routes/auth.php";
        e.preventDefault();
        clearDiv($("#err-div"));

        const uname = $("#uname").val();
        const pass = $("#pass").val();
        let data = {
            "username": uname,
            "password": pass
        }
        $.ajax({
            type: "POST",
            url: baseUrl,
            data: JSON.stringify(data),
            contentType: 'application/json'            
        })
        .done(function(data = JSON.parse(`{ "message": ${data.message} }`)) {   
            
            if(data.message === "user logged in") {
                $("#loginModal").modal('close');
                clearDiv($("#err-div"));

            } else {
                $("#err-div").css({
                    'padding': '3px',
                    'background-color': 'red',
                    'text-align': 'center',
                    'margin': '20px 0',
                    'border-radius': '3px',
                    'color': '#fff'
                }).append(`<p>${data.message}</p>`);            
                const inputFields= [$("#uname"), $("#pass")]
                inputFields.map(item => item.val(null));
            }
        })
    }); 

    $("#register").submit((e) => {
        const baseUrl = "http://localhost/projects/WJGarmentsV2/api/routes/users.php";
        e.preventDefault();
        clearDiv($("#err-div"));
        
        const uname = $("#name").val();
        const email = $("#email").val();
        const pass = $("#pwd").val();
        const password_repeat = $("#pwd-repeat").val();
        let data = {
            "username": uname,
            "email": email,
            "password": pass,
            "password_repeat": password_repeat
        }
        $.ajax({
            type: "POST",
            url: baseUrl,
            data: JSON.stringify(data),
            contentType: 'application/json',            
        })
        .done(function(data = JSON.parse(`{ "message": ${data.message} }'`)) {
        
            if(data.message === 'Use Your Credentials To Login') {
                showLogin();
                $("#success-div").css({
                    'padding': '3px',
                    'background-color': 'teal',
                    'text-align': 'center',
                    'margin': '20px 0',
                    'border-radius': '3px',
                    'color': '#fff'
                }).append(`<p>${data.message}</p>`);
                $("#err-div").css({'display': 'none'});                
                
            } else {
                $("#err-div").css({
                    'padding': '3px',
                    'background-color': 'red',
                    'text-align': 'center',
                    'margin': '20px 0',
                    'border-radius': '3px',
                    'color': '#fff'
                }).append(`<p>${data.message}</p>`);
            }

            const inputFields= [$("#name"), $("#email"),$("#pwd"), $("#pwd-repeat")]
            inputFields.map(item => item.val(null));
        })        
    });


}); // end of JQuery
