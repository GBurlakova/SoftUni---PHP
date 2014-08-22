var languageIndex = 1;
var removeBtn = document.getElementById('removeSpeakingLang');
var addBtn = document.getElementById('addSpeakingLang');

addBtn.addEventListener('click', function addLanguage(){
    languageIndex += 1;
    var parent = document.getElementById('parentForSpeakingLanguages');
    var language = document.createElement('DIV');
    language.setAttribute('id', 'speakingLang'+languageIndex);
    parent.appendChild(language);
    $(language).load('htmlFiles/speakingLanguageInnerHTML.html');
});



removeBtn.addEventListener('click', function removeLanguage(){
    if(languageIndex > 1){
        var parent = document.getElementById('parentForSpeakingLanguages');
        var childToRemove = document.getElementById('speakingLang'+languageIndex);
        parent.removeChild(childToRemove);
        languageIndex -= 1;
    }
});