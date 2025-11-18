var form = document.querySelector(".form-activitat");
var image = document.querySelector("#foto");
var container = document.querySelector("#display-container");
var preview = document.querySelector("#preview-img");
var button = document.querySelector("#continue-button");

//Interceptar el submit
form.addEventListener("submit", function(evt){
    evt.preventDefault(); //Evitar que submit se comporte como debería por defecto
    var sended_img = image.files[0];

    if(!sended_img){
        alert("No se ha seleccionado una imgen! Selecciona una");
        return;
    }

    //mostrar la preview
    var reader = new FileReader(); //objeto fileReader --> leer archivos locales(ej. <input type="file"...>) - eer archivos como data URLs, texto o ArrayBuffers
    reader.onload = function(evt){ //define función que se ejecuta cuando la lectura del archivo se completa - evt -> evento que se dispara cuando termina la lectura
        preview.src = evt.target.result; //e.target.result contiene los datos del archivo ya leídos --> como Data URL
            //target -> propiedad del evento -> apunta al objeto que disparo el evento (FileReader que terminó de leer el archivo)
            //result -> propiedad del FileReader -> contenido del archivo ya leído, en el formato pedido (readAsDataURL) -> puede ir al src
        container.style.display = "block"; //pasa de display: none -> a visible
    }
    reader.readAsDataURL(sended_img);
});


//Cuando user boton confirmar -> envia form 
button.addEventListener("click", function(){
    container.style.display = "none";
    form.submit();
});
