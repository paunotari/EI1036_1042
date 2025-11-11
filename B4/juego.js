

function solapaRect(rect1, rect2){
    return !(
        rect1.x + rect1.width < rect2.x || //rect2 a la dreta de rect1
        rect2.x + rect2.width < rect1.x || //rect1 a la dreta de rect2
        rect1.y + rect1.height < rect2.y || //rect1 damunt de rect2
        rect2.y + rect2.height < rect1.y //rect2 per damunt de rect1
    );
}


function seSolapa(recs, newRec){
    var solapa = false;
    for (var i = 0; i < recs.length; i++){
        if (solapaRect(recs[i], newRec)){
            solapa = true;
            break;
        }
    }
    return solapa;
}


function dibujaSuperpuesto(context, coors, recs){
    var newRec = {x:coors.x, y:coors.y, width:40, height:40};
    if (seSolapa(recs, newRec)){ 
        context.fillStyle = "red";
    }else{
        context.fillStyle = "green";
    }
    recs.push(newRec);
    context.fillRect(newRec.x, newRec.y, newRec.width, newRec.height);
}


function getMousePos(canvas, evt){
    var rect = canvas.getBoundingClientRect();
    return{
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    }
}


function limpiar(context, canvas){
    context.clearRect(0, 0, canvas.width, canvas.height);
    recs.length = 0; //Vacía array
}


function activarCanvas(){

    var canvas = document.querySelector("#sketchpad");
    var context = canvas.getContext("2d");

    canvas.addEventListener("click", function(evt){
        var coors = getMousePos(canvas, evt);
        dibujaSuperpuesto(context, coors, recs);
    })

    document.querySelector("#limpiar").addEventListener("click", function(){
        limpiar(context, canvas, recs);
    })
}
// Global
var recs = []; // Para almacenar las posiciones de lo rectangulos dibujados

activarCanvas();