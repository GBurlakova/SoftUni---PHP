var languageIndex = 1;
var removeBtn = document.getElementById('removeProgLang');
var addBtn = document.getElementById('addProgLang');

addBtn.addEventListener('click', function addLanguage(){
    languageIndex += 1;
    var parent = document.getElementById('parentForLanguages');
    var language = document.createElement('DIV');
    language.setAttribute('id', 'progLang'+languageIndex);
    parent.appendChild(language);
    $(language).load('htmlFiles/programmingLanguageInnerHTML.html');
});

removeBtn.addEventListener('click', function removeLanguage(){
    if(languageIndex > 1){
        var parent = document.getElementById('parentForLanguages');
        var childToRemove = document.getElementById('progLang'+languageIndex);
        parent.removeChild(childToRemove);
        languageIndex -= 1;
    }
});