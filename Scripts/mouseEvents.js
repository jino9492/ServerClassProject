document.addEventListener('mousedown', event => {
    var selectedDiv = Array.from(document.getElementsByClassName('selected')).slice();
    
    for(var i = 0; i < selectedDiv.length; i++){
        selectedDiv[i].setAttribute('class', 'editable-wrapper');
    }
});