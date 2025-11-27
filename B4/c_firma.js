function ready() {
    var imagen = document.querySelector("#imagen");
    var canvas = document.querySelector("#sketchpad");
    var context = canvas.getContext('2d');
    //Posición del Ratón
    function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left, // = x: evt.offsetX
            y: evt.clientY - rect.top // = x: evt.offsetY
        };
    }
    var drawer = {
        isDrawing: false,
        mousedown: function (coors) { // mousedown: se activa cuando el botón del raton es presionado en un elemento
            context.beginPath(); // beginPath(): Canvas 2D comienza una nueva ruta vaciando la lista de sub-rutas. Invoca este método cuando quieras crear una nueva ruta.
            context.moveTo(coors.x, coors.y); 
            this.isDrawing = true;
        },
        mousemove: function (coors) {
            if (this.isDrawing) {
                context.lineTo(coors.x, coors.y); //define el trazo en el path (no visible)
                context.stroke(); //context.stroke() dibuja el trazado en el canvas
            }
        },
        mouseup: function (coors) {
            if (this.isDrawing) {
                this.mousemove(coors); // simplemente mueve el cursor a las coordenadas, funciona sin esto
                this.isDrawing = false;
            }
        }
    }
    canvas.addEventListener('mousedown', function (evt) {
        drawer[evt.type](getMousePos(canvas, evt)); // drawer[evt.type] --> cuando se quiere llamar dinámicamente a una función dependiendo del tipo de evento.
    }, false);
    canvas.addEventListener('mousemove', function (evt) {
        drawer[evt.type](getMousePos(canvas, evt));
    }, false);
    canvas.addEventListener('mouseup', function (evt) {
        drawer[evt.type](getMousePos(canvas, evt));
    }, false);
    document.querySelector("#guardar").addEventListener("click", function () {
        imagen.src = canvas.toDataURL();
    });
    //ADDED FOR DOWNLOAD
    document.querySelector("#download").addEventListener("click", function () {
        //hfer del elemento class download --> firma del canvas
        this.href = canvas.toDataURL();
    });
}

document.addEventListener("DOMContentLoaded", ready);