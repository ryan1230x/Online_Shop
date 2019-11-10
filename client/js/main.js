$(document).ready(function(){

    $(".button-collapse").sideNav();
    $(".slider").slider({indicators: false});
    $(".modal").modal();
    
    // Clear div helper function
    function clearDiv(...$var) {
        $var.map(item => item.text(null).css({'padding': '0px'}));        
    }

    // Open login form on modal helper function
    function showLogin() {
        $("#login").css({'display': 'block'})        
        $("#register").css({'display': 'none'})
        clearDiv($("#err-div"));
    }
    // Open registration form on modal, helper function
    function showRegister() {
        $("#register").css({'display': 'block'});
        $("#login").css({'display': 'none'});
        clearDiv($("#err-div"));
    } 
    
    // Event Listeners    
    $("#loginLink").on("click", showLogin);
    $("#registerLink").on("click", showRegister);
    
    // Event listenter for login form submit
    $("#login").submit((e) => {
        const baseUrl = "http://localhost/projects/WJGarmentsV2/api/routes/auth.php";        
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
            contentType: 'application/json',
            async: false,
        })
        .done(function(data = JSON.parse(`{ "message": ${data.message} }`)) {   
            
            if(data.message === "user logged in") {
                $("#loginModal").modal('close');
                clearDiv($("#err-div"));

                $("#nav-icons").prepend(`Hello, ${data.username}`);
                
                $("#slide-out:last-child")
                .append(`<li><a href="#" style="padding: 0 15px;" id="logout-btn">Logout<i class="material-icons">logout</i></a></li>`);

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

    // Event listener for register form submit
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
                })
                .fadeIn()
                .append(`<p>${data.message}</p>`);

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

    // Event Listener for logout user
    $("#logout-btn").on("click", (e) => {
        // e.preventDefault();
        const baseUrl = "http://localhost/projects/WJGarmentsV2/api/routes/auth.php";
        $.ajax({
            type: "GET",
            url: baseUrl,                      
            async: false,
        })
        .done(function(data = JSON.parse(`{ "message": ${data.message} }'`)) {
            $(".button-collapse").sideNav('hide');
            const elementsToHide = [$("#logout-btn"), $("#nav-icons span"), $("#portalBtn")];
            elementsToHide.map(x => x.hide());
            
            $("#logout-div")
            .addClass("card-panel blue-grey").css({'margin': '20px','color':'#fff'})
            .append(`<p>You Are Now ${data.message}.</p>`);            
            
            
                
        })
    });


}); // end of JQuery