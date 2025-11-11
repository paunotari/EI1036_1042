function mostrarFoto(nodo, imagen) {
  var reader = new FileReader();
  reader.addEventListener("load", function () { //Cuando se cargue la imagen, muestrala (imagen.src = reader.result;)
    imagen.src = reader.result;
  });
  reader.readAsDataURL(nodo.files[0]); //leer --> después de crear escuchador (si orden al revés podria cargar antes que se cree escuchador)
}

function getMousePos(canvas, evt) {
  var rect = canvas.getBoundingClientRect();
  return {
    x: evt.clientX - rect.left,
    y: evt.clientY - rect.top,
  };
}

function limpiar(context, canvas) {
  context.clearRect(0, 0, canvas.width, canvas.height);
}

function dibuja(context) {
  context.fillStyle = "rgb(200,0,0)";
  context.fillRect(20, 20, 100, 100); 
  context.clearRect(50, 50, 40, 40); // Añadido para testear
  //Crea un marco (margenes con huco en medio
}
function dibujaEnRaton(context, coors) {
  context.fillStyle = "rgb(200,200,0)";
  context.fillRect(coors.x, coors.y, 20, 20);
}
function activarCanvas(imagen){
   var canvas = document.querySelector("#sketchpad");
   var context = canvas.getContext("2d");
   canvas.addEventListener("click", function (evt) {
     coors = getMousePos(canvas, evt);
     dibujaEnRaton(context, coors);
   });
 
   document.querySelector("#dibujar").addEventListener("click", function () {
     dibuja(context);
   });
   document.querySelector("#copiar").addEventListener("click", function () {
     context.drawImage(imagen, 0, 0, 600, 500);
   });
   document.querySelector("#limpiar").addEventListener("click", function () {
     limpiar(context, canvas);
   });
   document.querySelector("#guardar").addEventListener("click", function () {
     imagen.src = canvas.toDataURL("image/png");
   });
}
function ready() {
  var imagen = null;
  var fichero = document.querySelector("#foto");
  var child = document.createElement("img");
  child.setAttribute("width", "600px");
  child.setAttribute("hight", "500px");
  child.setAttribute("background-color", "lightblue");
  child.setAttribute("id", "imagen");
  imagen = fichero.parentNode.appendChild(child);
  fichero.addEventListener("change", function (event) {  // igual que: (event) => {...} (pero el "this" es distinto en cada caso --> revisar)
    if (fichero.files[0]["type"] == "image/png") 
      {mostrarFoto(this, imagen);  //this, referencia al evento que disparó el event listener
      }
    else alert("Seleccione una imagen PNG");
  });
  activarCanvas(imagen);


}

ready();
