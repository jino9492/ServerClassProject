var ctrlDown;
var copiedDiv = new Array();

document.addEventListener('keydown', event => {

    if (event.keyCode >= 65 && event.keyCode <= 90 && !ctrlDown)
        if (document.getElementsByClassName('selected').length !== 0) {
            delAllEditableSelectedDiv();
        }

    if (event.key === 'Backspace') {
        backspace(event);
    }

    if (event.key !== 'Enter' && event.key !== 'Control' && event.key !== 'c' && event.key !== 'v'){
        var selectedDiv = Array.from(document.getElementsByClassName('selected')).slice();

        for(var i = 0; i < selectedDiv.length; i++)
            selectedDiv[i].setAttribute('class', 'editable-wrapper');
    }

    if (event.key === 'Enter' && document.activeElement.className == 'editable') {
        var selectedDiv = Array.from(document.getElementsByClassName('selected')).slice();

        for (var i = 0; i < selectedDiv.length; i++)
            selectedDiv[i].remove();
        
        enterkey();
        event.preventDefault();
    }
    else if (event.key === 'Enter') {
        event.preventDefault();
    }

    if (event.key === 'ArrowUp')
        upArrow();
    

    if (event.key === 'ArrowDown')
        downArrow();

    if (event.key === 'Control')
        ctrlDown = true;
    
    if (ctrlDown){
        if (event.key === 'a'){
            ctrlA();
        }
        var selectedDiv = Array.from(document.getElementsByClassName('selected')).slice();

        if (event.key === 'c' && selectedDiv.length > 0){
            ctrlC();
            event.preventDefault();
        } 
        else if (event.key === 'c'){
            copiedDiv.length = 0;
        }

        if (event.key === 'v' && copiedDiv.length > 0){
            ctrlV();
            event.preventDefault();
        }
    }
    
    if (document.getElementById('text-area').childElementCount > 0)
        setColumnNubmer();
})

document.addEventListener('keyup', event => {
    if( event.key === 'Control')
        ctrlDown = false;
})

function enterkey() {
    var div = createDiv();

    var parentDiv = document.getElementById('text-area');

    if (parentDiv.childElementCount == 0)
        linkParentChild(parentDiv, div);
    else{
        var thisTextAreaDiv = document.activeElement.parentElement;
        thisTextAreaDiv.insertAdjacentElement('afterend', div);
    }

    div.childNodes[1].focus();

    delAllEditableSelectedDiv();
    
}

function backspace(e) {
    var thisTextAreaDiv = document.activeElement.parentElement;
    var prevTextAreaDiv = thisTextAreaDiv.previousElementSibling;
    var isEmpty;

    isEmpty = false;

    delAllEditableSelectedDiv();

    if (document.getElementById('text-area').childElementCount == 1)
        isEmpty = true;
    

    if (thisTextAreaDiv.hasAttribute('class', 'editable') && window.getSelection().focusOffset == 0 && !isEmpty){
        caretSetEndPos(prevTextAreaDiv.childNodes[1]);

        thisTextAreaDiv.remove();
        e.preventDefault();
    }
    
    
}

function upArrow(){
    var thisTextAreaDiv = document.activeElement.parentElement;
    var prevTextAreaDiv = thisTextAreaDiv.previousElementSibling;
    if (thisTextAreaDiv.hasAttribute('class', 'editable'))
        caretSetEndPos(prevTextAreaDiv.childNodes[1]);
}

function downArrow(){
    var thisTextAreaDiv = document.activeElement.parentElement;
    var nextTextAreaDiv = thisTextAreaDiv.nextElementSibling;
    if (thisTextAreaDiv.hasAttribute('class', 'editable'))
        caretSetEndPos(nextTextAreaDiv.childNodes[1]);
}

function ctrlA(){
    var editableDiv = document.getElementsByClassName("editable-wrapper");

    for(var i = 0; i < editableDiv.length; i++)
        editableDiv[i].setAttribute('class', 'editable-wrapper selected');
}

function ctrlC(){
    var selectedDiv = Array.from(document.getElementsByClassName('selected')).slice();
    copiedDiv.length = 0;
    
    selectedDiv.forEach(element => {
        var div = element.cloneNode(true);
        copiedDiv.push(div);
    })

    console.log(copiedDiv);
}

function ctrlV(){
    delAllEditableSelectedDiv();

    var parent = document.getElementById("text-area");
    var thisTextAreaDiv = document.activeElement.parentElement;
    
    console.log(copiedDiv);

    for (var i = 0; i < copiedDiv.length; i++){
        if (parent.childElementCount == 0){
            linkParentChild(parent, copiedDiv[i]);
            thisTextAreaDiv = parent.childNodes[0];
            continue;
        }

        thisTextAreaDiv.insertAdjacentElement('afterend', copiedDiv[i]);
        thisTextAreaDiv = thisTextAreaDiv.nextElementSibling;

        copiedDiv[i] = thisTextAreaDiv.cloneNode(true);
    }

    var selectedDiv = Array.from(document.getElementsByClassName('selected')).slice();
    for (var i = 0; i < selectedDiv.length; i++){
        selectedDiv[i].setAttribute('class', 'editable-wrapper');
    }

    caretSetEndPos(copiedDiv[copiedDiv.length - 1].childNodes[1])
}