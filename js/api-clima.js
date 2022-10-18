var xhttp2 = new XMLHttpRequest();

        // 1º -> tres parametros: TIPO DE PETICION, URL A LA CUAL VAMOS A REALIZAR DICHA PETICION, TRUE -> INDICA QUE ES UN PETICION DE TIPO ASICRONA
        xhttp2.open("GET", "https://api.openweathermap.org/data/2.5/weather?lat=-34.61315&lon=-58.37723&lang=es&units=metric&appid=600d4eb24a837bcce4f7233e1ebf7ef7", true);

        xhttp2.send();

  
        xhttp2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            let respuesta = JSON.parse(this.responseText);
        
            let tempActual = respuesta.main.temp;
            let icono = respuesta.weather[0].icon;

            document.querySelector("#tempActual").textContent = tempActual+"°";
            document.querySelector("#imgClima").src = "http://openweathermap.org/img/w/"+icono+".png";         


        }
        };