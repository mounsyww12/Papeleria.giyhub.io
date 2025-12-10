<html>
<head>
  <title>Ticket de Compra</title>
  <style>
    body {
      background-image: url('geo2.jpg');
      background-size: cover;
      font-family: 'Arial Rounded MT Bold', sans-serif;
      color: #4a4a4a;
      text-align: center;
    }

    .ticket {
      margin: 50px auto;
      padding: 30px;
      background-color: #fff0fa;
      width: 60%;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    h1 {
      color: #a678b2;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      margin: 8px 0;
    }

    .boton-regresar {
      margin-top: 20px;
      padding: 12px 25px;
      font-size: 16px;
      background-color: #c9a3e3;
      color: white;
      border: none;
      border-radius: 12px;
      cursor: pointer;
    }

    .boton-regresar:hover {
      background-color: #ad84c7;
    }
  </style>
</head>
<body>

<script>
  alert("¡Bienvenido a tu Ticket de Compra en Papelería P3!");

  let confirmar = confirm("¿Deseas confirmar tu compra?");
  
  if (confirmar) {
    let productos = [];
    let seguir = true;

    while (seguir) {
    let producto = prompt("¿Qué producto deseas comprar? \n °Mochila \n °Marcadores \n °Cuadenos Escolares \n °Lapiceras \n °Pinturas Vinci \n °Pinceles  ");
      let cantidad = prompt("¿Cuántos deseas comprar?");
      let precio = prompt("¿Cuál es el precio por unidad? \n °Mochila: $300 \n °Marcadores: $140 \n °Cuadenos Escolares: $75 \n °Lapiceras: $60\n °Pinturas Vinci: $25\n °Pinceles: $10 ");

      if (producto && cantidad && precio && !isNaN(cantidad) && !isNaN(precio)) {
        productos.push({
          nombre: producto,
          cantidad: Number(cantidad),
          precio: Number(precio)
        });
        seguir = confirm("¿Deseas agregar otro producto?");
      } else {
        alert("Datos inválidos. Ese producto no se agregó.");
        seguir = confirm("¿Deseas intentar agregar otro producto?");
      }
    }

    let total = 0;
    for (let i = 0; i < productos.length; i++) {
      total += productos[i].cantidad * productos[i].precio;
    }

    document.write('<div class="ticket">');
    document.write('<h1>Ticket de Compra:</h1>');
    document.write('<h1>Escolar</h1>');
    document.write('<p><strong>*********************************************</p></strong>');
    document.write('<p><strong>Fue atendido por:</strong> Monserrat Guzman</p>');
    document.write('<hr style="border: 1px dashed #ccc;">');
    for (let i = 0; i < productos.length; i++) {
      let subTotal = productos[i].cantidad * productos[i].precio;
      document.write('<p><strong>Producto:</strong> ' + productos[i].nombre + '</p>');
      document.write('<p><strong>Cantidad:</strong> ' + productos[i].cantidad + '</p>');
      document.write('<p><strong>Precio unitario:</strong> $' + productos[i].precio.toFixed(2) + '</p>');
      document.write('<p><strong>Subtotal:</strong> $' + subTotal.toFixed(2) + '</p>');
      document.write('<hr style="border: 1px dashed #ccc;">');
    }
    document.write('<p><strong>Total a pagar:</strong> <span style="color:#a94cb0;">$' + total.toFixed(2) + '</span></p>');
    document.write('<p><strong>*********************************************</p></strong>');
    document.write('<p><strong>Hora de impresión del ticket:</strong></p>');
    let hora = new Date().toLocaleTimeString();
    document.write('<p><span style="color:#a94cb0;">' + hora + '</span></p>');
    document.write('<p><strong>Gracias por su Compra</strong></p>');
    document.write('<p><span style="color:#a94cb0;">¡VUELVA PRONTO!</span></p>');
    document.write('<p><strong>*********************************************</p></strong>');
    document.write('</div>');
    document.write('<button class="boton-regresar" onclick="window.location.href=\'principalp3.php\'">Regresar a Principal</button>');

  } else {
    alert("Compra cancelada. Regresando al menú principal.");
    window.location.href = "principalp3.php";
  }
</script>

</body>
</html>