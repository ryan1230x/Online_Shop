$(document).ready(function(){
    $("select").material_select();
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
        

}) // End of jQuery
