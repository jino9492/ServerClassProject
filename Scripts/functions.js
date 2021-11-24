function linkParentChild(parent, child) {
    if (isIterable(child))
        for (var i = 0; i < child.length; i++)
            parent.appendChild(child[i]);
    else
        parent.appendChild(child);
}

function isIterable(obj) {
    if (obj == null) {
        return false;
    }
    return typeof obj[Symbol.iterator] === 'function';
}

function delAllEditableSelectedDiv(){
    var selectedTextAreaDiv = Array.from(document.getElementsByClassName('selected')).slice();

    for (var i = 0; i < selectedTextAreaDiv.length; i++)
        selectedTextAreaDiv[i].remove();
    
    var div = createDiv();
    var wrapperDiv = document.getElementById('text-area');

    if (wrapperDiv.childElementCount == 0) {
        linkParentChild(wrapperDiv, div);

        div.childNodes[1].focus();
    }
}

function createDiv(){
    var editableDivNumber = document.createElement('div');
    editableDivNumber.setAttribute('class', 'editable-number');
    editableDivNumber.innerHTML = (document.getElementById('text-area').childNodes.length + 1);

    var editableDiv = document.createElement("div");
    editableDiv.setAttribute('class', 'editable');
    editableDiv.setAttribute('placeholder', 'Type Here');
    editableDiv.setAttribute('contenteditable', 'true')

    var div = document.createElement('div');
    div.setAttribute('class', 'editable-wrapper');
    linkParentChild(div, editableDivNumber);
    linkParentChild(div, editableDiv)

    return div;
}

function caretSetEndPos(prevTextAreaDiv){
    var startContainer = prevTextAreaDiv.childNodes[0];
        if (startContainer != null)
            var startOffset = prevTextAreaDiv.childNodes[0].length;
        else{
            startContainer = prevTextAreaDiv;
            var startOffset = 0;
        }
        
        const newRange = document.createRange();
        newRange.setStart(startContainer, startOffset);
        newRange.collapse(true);

        // Selection에 전달
        const selection = document.getSelection();
        selection.removeAllRanges();
        selection.addRange(newRange);
}

function setColumnNubmer(){
    var count = 1;

    var textArea = document.getElementById('text-area');

    for (var i = 0; i < textArea.childElementCount; i++){
        textArea.children[i].setAttribute('id', 'editable-wrapper-id-' + count);
        textArea.children[i].children[0].setAttribute('id', 'editable-number-id-' + count);
        textArea.children[i].children[0].innerHTML = count;
        textArea.children[i].children[1].setAttribute('id', 'editable-id-' + count);

        count++;
    }

    // document.getElementById('text-area').childNodes.forEach(element => {
    //     element.setAttribute('id', 'editable-wrapper-id-' + count);
    //     element.childNodes[0].setAttribute('id', 'editable-number-id-' + count);
    //     element.childNodes[0].innerHTML = count;
    //     element.childNodes[1].setAttribute('id', 'editable-id-' + count);

    //     count++;
    // });
}