<html>
<head>
<title>Formulario de Ventas</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #e8f0fe; 
        color: #110202ff;
        margin: 30px;
    }
    h2 {
        text-align: center;
        color: #736cdaff;
    }
    form {
        background-color: #b9daffff;
        padding: 20px;
        margin: auto;
        max-width: 700px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #031322ff;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #51739bff;
        color: white;
    }
    input[type="number"] {
        width: 80px;
        padding: 5px;
        text-align: center;
        border: 1px solid #7199ceff;
        border-radius: 5px;
    }

    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }

    button {
        background-color: #9597ecff;
        color: white;
        border: none;
        padding: 10px 20px;
        margin-top: 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #64aaf0ff;
    }
    .totales {
        margin-top: 20px;
        text-align: right;
    }
</style>
</head>
<body>

<h2>Formulario de Ventas</h2>

<form method="POST" action="">
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>

        <?php
        
        $productos = [
            ["nombre" => "Computadora", "precio" => 10000],
            ["nombre" => "Impresora", "precio" => 2500],
            ["nombre" => "Teclado", "precio" => 150],
            ["nombre" => "Ratón", "precio" => 100]
        ];

        $subtotal = 0;

        foreach ($productos as $i => $producto) {
            
            $cantidad = isset($_POST["cantidad"][$i]) ? (float)$_POST["cantidad"][$i] : 0;
            $precio = isset($_POST["precio"][$i]) ? (float)$_POST["precio"][$i] : $producto["precio"];
            $total = $cantidad * $precio;
            $subtotal += $total;

            echo "<tr>
                    <td>{$producto['nombre']}</td>
                    <td><input type='number' name='cantidad[]' min='0' value='$cantidad'></td>
                    <td><input type='number' name='precio[]' value='$precio'></td>
                    <td>$" . number_format($total, 2) . "</td>
                  </tr>";
        }
        ?>
    </table>

    <div style="text-align:center;">
        <button type="submit">Calcular Total</button>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $iva = $subtotal * 0.16;
        $totalFinal = $subtotal + $iva;

        echo "<div class='totales'>
                <p>Subtotal: $" . number_format($subtotal, 2) . "</p>
                <p>IVA (16%): $" . number_format($iva, 2) . "</p>
                <p><b>Total a pagar: $" . number_format($totalFinal, 2) . "</b></p>
              </div>";
    }
    ?>
</form>

</body>
</html>

