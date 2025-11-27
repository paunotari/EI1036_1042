
async function detectores(){
    let url_meteoro="https://api.open-meteo.com/v1/forecast?latitude=39.9857&longitude=-0.0493&current=temperature_2m,precipitation,weather_code";
    
    let placeholder = document.querySelector("#placeholder");

    let fetch_response = await fetch(url_meteoro);
    let data = await fetch_response.json();

    p = document.createElement("p");
    p.innerHTML = `<b> fecha</b>: ${data["current"]["time"]}<br><b> temperatura</b>: ${data.current.temperature_2m}<br>`;
    placeholder.appendChild(p);

}


 detectores();