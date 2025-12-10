<html>
<head>
  <title>Principal</title>
  <style>
    body {
      background-color: #f0f8ff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #5f5f5f;
      text-align: center;
      padding: 60px;
      margin: 0;
    }

    h1 {
      font-size: 42px;
      color: #ffb3d9;
      margin-bottom: 20px;
    }

    h2 {
      color: #6a5c7e;
      font-size: 20px;
      margin-bottom: 30px;
    }

    img {
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      margin-top: 20px;
    }

    .boton-ingresar {
      padding: 14px 28px;
      font-size: 18px;
      background-color: #ffb3d9;
      color: white;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .boton-ingresar:hover {
      background-color: #ff80b3;
    }

    .botones-contenedor {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      margin-top: 40px;
    }

    .boton-categoria {
      background-color: #e0f7fa;
      border: 2px solid #b3e0ff;
      border-radius: 20px;
      padding: 20px;
      width: 200px;
      text-align: center;
      font-size: 16px;
      color: #5f5f5f;
      cursor: pointer;
      text-decoration: none;
      transition: transform 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .boton-categoria:hover {
      transform: scale(1.05);
      background-color: #b3e0ff; 
    }

    .boton-categoria img {
      width: 80px;
      height: 80px;
      margin-top: 10px;
    }

    .boton-categoria span {
      display: block;
      font-weight: bold;
      font-size: 18px;
    }

  </style>
</head>
<body>
  <center>
    <h1>BIENVENIDO A PAPELERÍA MONWEN</h1>
    <img src="papelerialogop3.jpg" width="150" height="150" alt="Logo Papelería"><br><br>

    <h2>Consulta nuestros productos por categoría</h2>
    <h2>Haz clic en un botón para continuar</h2>

    <div class="botones-contenedor">
      <a href="materialesescolaresp3.php" class="boton-categoria">
        <span>ESCOLARES</span>
        <img src="escolar.jpg" alt="Escolar">
      </a>

      <a href="oficinap3.php" class="boton-categoria">
        <span>OFICINA</span>
        <img src="oficinap3.jpg" alt="Oficina">
      </a>

      <a href="manualidadesp3.php" class="boton-categoria">
        <span>MANUALIDADES</span>
        <img src="MANUALIDADESP3.jpg" alt="Manualidades">
      </a>
    </div>

    <br><br>
    <a href="redes.php">
      <button class="boton-ingresar">REDES Y UBICACION</button>
      <a href="pago.php">
      <button class="boton-ingresar">METODO DE PAGO</button>
    </a>
  </center>
</body>
</html>
