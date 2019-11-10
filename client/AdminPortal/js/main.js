$(document).ready(function(){
    $(".button-collapse").sideNav();
    $(".modal").modal();

    // # Helper function

    // Validate Strings
    function validationString(e) {
        e.preventDefault();
        let value, target, label;

        value = e.currentTarget.value;
        target = e.target;
        label = target.nextSibling.nextSibling;            

        if(value.match("^[A-Z a-z]+$")) {
            label.setAttribute("data-success", "Correct!");
            target.classList.remove("invalid");
            target.classList.add("valid");
        } else if(value === '') {
            label.setAttribute("data-error", "Please Fill in Field");
            target.classList.remove("valid");
            target.classList.add("invalid");
        } else {
            label.setAttribute("data-error", "Invalid Characters");
            target.classList.remove("valid");
            target.classList.add("invalid");
        }      
    }

    // Validate Numbers
    function validationNumber(e) {
        e.preventDefault();
        let value, target, label;

        value = e.currentTarget.value;
        target = e.target;
        label = target.nextSibling.nextSibling;        

        if(value.match("^[0-9]+$")) {
            label.setAttribute("data-success", "Correct!");
            target.classList.remove("invalid");
            target.classList.add("valid");
        } else if(value === '') {
            label.setAttribute("data-error", "Please Fill in the Field");
            target.classList.remove("valid");
            target.classList.add("invalid");
        } else {
            label.setAttribute("data-error", "Invalid Characters");
            target.classList.remove("valid");
            target.classList.add("invalid");
        }   
    }

    // EventListeners
    //  Variables for form inputs
    var title = $("#title");
    var price = $("#price");
    var description = $("#description");
    const inputArr = [title,price, description];

    // Keyup Event Listeners for the input fields
    title.on("keyup", validationString);
    price.on("keyup", validationNumber);
    description.on("keyup", validationString);
    
    // Event Listener for form submit
    $("#modal-form").submit(function(e) {
        e.preventDefault();
        
                
        const url = "http://localhost/projects/WJGarmentsV2/api/routes/products.php";

        // Variables with the form data
        let title = $("#title").val();
        let price = $("#price").val();
        let description = $("#description").val();
        //let photo_file = $("#file").val();        
        

        // Data from the form stored in a JSON object
        const data = {
            "title": title,
            "price": price,
            "about": description,
            //"file": photo_file,
        }

        $.ajax({
            type: "POST",
            url: url,
            data: JSON.stringify(data),
            contentType: 'application/json, multipart/form-data, image/jpg',
        })
        .done(function(data = JSON.parse(`{ "message": ${data.message} }`)) {

            if(data.message === 'The Product has been added') {

                $("#msg").text(null);
                inputArr.map(x => x.val(null));
                $("#msg").css({
                    'padding': '3px',
                    'background-color': 'teal',
                    'text-align': 'center',
                    'margin': '20px 0',
                    'border-radius': '3px',
                    'color': '#fff'
                })
                .fadeIn()
                .append(`<p>${data.message}</p>`);
                
            } else {
            
                $("#msg").text(null);
                inputArr.map(x => x.val(null)); 
                $("#msg").css({
                    'padding': '3px',
                    'background-color': 'red',
                    'text-align': 'center',
                    'margin': '20px 0',
                    'border-radius': '3px',
                    'color': '#fff'
                })
                .append(`<p>${data.message}</p>`);                             
            }

        });
    });

}) // End of jQuery
