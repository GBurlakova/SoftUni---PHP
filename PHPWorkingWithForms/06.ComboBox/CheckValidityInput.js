function check(element){
    var validInput = element.validity.valid;
    if(validInput){
        var form= document.getElementById('userForm');
        setTimeout(form.submit(), 900);
    }
}