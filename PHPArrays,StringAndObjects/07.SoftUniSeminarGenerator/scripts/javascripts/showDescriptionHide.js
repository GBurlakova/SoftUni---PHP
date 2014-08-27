var aTags = document.getElementsByTagName('a');
for(var id = 1; id <= aTags.length; id++){
    var currentATag = $('#' + id);
    currentATag.mouseenter(function(){
        var div = document.getElementById('description' + this.id);
        var left = (function(e){
            return e.clientX || e.pageX;
        })(event);
        $(div).css({
            display: 'block',
            position: 'absolute',
            left: left + 'px'
        })
    }).stop(true, true).slideUp(400);
    currentATag.mouseleave(function(){
        var div = document.getElementById('description' + this.id);
        $(div).css({
            display: 'none'
        })
    }).stop(true, true).slideDown(400);
}