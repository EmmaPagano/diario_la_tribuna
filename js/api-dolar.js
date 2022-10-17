        var xhttp = new XMLHttpRequest();

        // 1º -> tres parametros: TIPO DE PETICION, URL A LA CUAL VAMOS A REALIZAR DICHA PETICION, TRUE -> INDICA QUE ES UN PETICION DE TIPO ASICRONA
        xhttp.open("GET", "https://www.dolarsi.com/api/api.php?type=valoresprincipales", true);

        xhttp.send();

  
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            let respuesta = JSON.parse(this.responseText);
            console.log(respuesta);

            let dolarOficialCompra = respuesta[0].casa.compra;
            let dolarOficialVenta = respuesta[0].casa.venta;

            document.querySelector('#oficialCompra').textContent = '$'+dolarOficialCompra;
            document.querySelector('#oficialVenta').textContent = '$'+dolarOficialVenta;

            let dolarBlueCompra = respuesta[1].casa.compra;
            let dolarBlueVenta = respuesta[1].casa.venta;

            document.querySelector('#blueCompra').textContent = '$'+dolarBlueCompra;
            document.querySelector('#blueVenta').textContent = '$'+dolarBlueVenta;

        }
        };

