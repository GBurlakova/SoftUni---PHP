function check(id) {
    var input = document.getElementById(id);
    var inputContent = input.value;
    var regex = /\D/g;
    if (regex.test(inputContent)) {
        error(input);
        input.value = inputContent.replace(regex, '');

    }
}

function changeBackgroundColor(color, input) {
    input.style.backgroundColor = color;
}

function error(input) {
    changeBackgroundColor('#F00', input);
    setTimeout(function(){changeBackgroundColor('#FFF',input);}, 200);
}

