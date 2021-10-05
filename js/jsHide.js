	document.onkeydown = function(e){
    event = (event || window.event);
    if(event.keyCode == 123){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        return false;
    }else if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        return false;
    }else if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
        return false;
    }
}
document.onmousedown = function(e){
    event = (event || window.event);
    if(event.keyCode == 123){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        return false;
    }else if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        return false;
    }else if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
        return false;
    }
}
document.onkeypress = function(e){
    event = (event || window.event);
    if(event.keyCode == 123){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        return false;
    }else if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        return false;
    }else if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
        return false;
    }
}