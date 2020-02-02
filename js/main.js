var toggles = document.querySelectorAll(".toggle");
toggles = [].slice.call(toggles);
toggles.map(function(elemento){
    elemento.onclick = function(){
        var bloco = document.getElementById(elemento.getAttribute("toggle"));
        bloco.style.left=elemento.offsetLeft+"px";
        bloco.style.top = elemento.offsetTop+elemento.offsetHeight+3+"px";
        toggleClass(bloco,"invisivel");
    };
}, toggles);

function toggleClass(element, className) {
    var arrayClass = element.className.split(" ");
    var index = arrayClass.indexOf(className);

    if (index === -1) {
        if (element.className !== "") {
            element.className += ' '
        }
        element.className += className;
    } else {
        arrayClass.splice(index, 1);
        element.className = "";
        for (var i = 0; i < arrayClass.length; i++) {
            element.className += arrayClass[i];
            if (i < arrayClass.length - 1) {
                element.className += " ";
            }
        }
    }
}