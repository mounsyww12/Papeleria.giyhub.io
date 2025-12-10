<?php
session_start();

$products = [
    1 => ["name"=>"Mochila", "desc"=>"Mochiia de excelente calidad, ideal para estudiantes y uso diario.", "price"=>300],
    2 => ["name"=>"Marcadores", "desc"=>" excelente  calidad.", "price"=>140.00, ],
    3 => ["name"=>"Cuadernos escolares", "desc"=>" calidad exelente.", "price"=>380.00, ],
    4 => ["name"=>"Lápiceras #2", "desc"=>"excelente calidad y gran espacio.", "price"=>60.00, ],
    5 => ["name"=>"Pinturas", "desc"=>"excelente pigmentacon.", "price"=>110.00, ],
    6 => ["name"=>"Pinceles", "desc"=>"Pincel de dibujo  ideal para estudiantes.", "price"=>90.00, ]
];


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['action']) && $_POST['action'] === 'add' && isset($_POST['product_id'])) {
        $pid = intval($_POST['product_id']);
        $qty = isset($_POST['qty']) ? max(1, intval($_POST['qty'])) : 1;
        if (isset($products[$pid])) {
            if (!isset($_SESSION['cart'][$pid])) {
                $_SESSION['cart'][$pid] = 0;
            }
            $_SESSION['cart'][$pid] += $qty;
            $message = "Producto agregado: " . htmlspecialchars($products[$pid]['name']);
        }
    }

    
    if (isset($_POST['action']) && $_POST['action'] === 'remove' && isset($_POST['product_id'])) {
        $pid = intval($_POST['product_id']);
        if (isset($_SESSION['cart'][$pid])) {
            unset($_SESSION['cart'][$pid]);
            $message = "Producto eliminado del carrito.";
        }
    }

    
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        if (isset($_POST['quant']) && is_array($_POST['quant'])) {
            foreach ($_POST['quant'] as $pid => $q) {
                $pid = intval($pid);
                $q = max(0, intval($q));
                if ($q > 0) {
                    $_SESSION['cart'][$pid] = $q;
                } else {
                    unset($_SESSION['cart'][$pid]);
                }
            }
            $message = "Carrito actualizado.";
        }
    }

    
    if (isset($_POST['action']) && $_POST['action'] === 'empty') {
        $_SESSION['cart'] = [];
        $message = "Carrito vaciado.";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>★★ 🎀 𝑀❀𝓃𝒲𝑒𝓃 - 𝒫𝒶𝓅𝑒𝓁𝑒𝓇í𝒶 🎀 ★★</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="styles.css">

</head>
<body color="#72d3ecff;" <p style="color: -#0e8cc2ff;"></p>

<header class="site-header">
    <h1>                        .★·.·´¯`·.·★ 𝓑𝓲𝓮𝓷𝓿𝓮𝓷𝓲𝓭𝓸𝓼 𝓪 𝓟𝓪𝓹𝓮𝓵𝓮𝓻í𝓪 ★·.·´¯`·.·★. <span class="brand"> 🎀 𝑀❀𝓃𝒲𝑒𝓃 - 𝒫𝒶𝓅𝑒𝓁𝑒𝓇í𝒶 🎀 </span></h1>
    <p class="subtitle">𝑀𝒶𝓉𝑒𝓇𝒾𝒶𝓁 𝑒𝓈𝒸𝑜𝓁𝒶𝓇 𝓎 𝒹𝑒 𝑜𝒻𝒾𝒸𝒾𝓃𝒶— 𝒞𝒶𝓁𝒾𝒹𝒶𝒹 𝓅𝒶𝓇𝒶 𝑒𝓈𝓉𝓊𝒹𝒾𝒶𝓃𝓉𝑒𝓈</p>
    <nav class="nav">
        <a href="materialesescolaresp3.php">C̳a̳t̳á̳l̳o̳g̳o̳</a> |
        <a href="#carrito">C͢a͢r͢r͢i͢t͢o͢(<?php echo array_sum($_SESSION['cart']); ?>)</a>
    </nav>
</header>

<main class="container">
    <?php if (!empty($message)): ?>
        <div class="notice"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <section id="catalogo" class="catalog">
        <?php foreach ($products as $id => $p): ?>
            <article class="card">
                
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <p class="desc"><?php echo htmlspecialchars($p['desc']); ?></p>
                <p class="price">$ <?php echo number_format($p['price'], 2); ?></p>

                <form method="post" class="add-form">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <label> Cantidad:
                        <input type="number" name="qty" value="1" min="1" class="qty-input">
                    </label>
                    <button type="submit" class="btn add-btn">Agregar</button>
                </form>
            </article>
        <?php endforeach; ?>
    </section>

    <section id="carrito" class="cart">
        <h2>Carrito de Compras</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <form method="post" class="cart-form">
                <input type="hidden" name="action" value="update">
                <table class="cart-table">
                    <thead>
                        <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Quitar</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0.0;
                    foreach ($_SESSION['cart'] as $pid => $qty):
                        if (!isset($products[$pid])) continue;
                        $prod = $products[$pid];
                        $subtotal = $prod['price'] * $qty;
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($prod['name']); ?></td>
                            <td>$ <?php echo number_format($prod['price'],2); ?></td>
                            <td>
                                <input type="number" name="quant[<?php echo $pid; ?>]" value="<?php echo $qty; ?>" min="0" class="qty-input-small">
                            </td>
                            <td>$ <?php echo number_format($subtotal,2); ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="product_id" value="<?php echo $pid; ?>">
                                    <button type="submit" class="btn remove-btn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="cart-actions">
                    <button type="submit" class="btn">Actualizar cantidades</button>
                </div>
            </form>

            <div class="summary">
                <p><strong>Total:</strong> $ <?php echo number_format($total,2); ?></p>
                <form method="post" action="ticket.php" action="pago.php"  class="finalize-form">
                    
                    <?php foreach ($_SESSION['cart'] as $pid => $qty): ?>
                        <input type="hidden" name="cart[<?php echo $pid; ?>]" value="<?php echo $qty; ?>">
                    <?php endforeach; ?>
                    <button type="submit" class="btn primary">♥╣[-_-]╠♥ Finalizar Venta ♥╣[-_-]╠♥(Generar Ticket)</button>
                </form>

               <form method="post" style="display:inline;">
    <input type="hidden" name="action" value="empty">
    <button type="submit" class="btn danger">Vaciar carrito</button>
</form>


    <a href="catalogo.php">Catálogo</a>
                </form>
            </div>
        <?php endif; ?>
    </section>
</main>

<footer class="site-footer">
    <p>🍇 ⋆ 🍧 🎀 𝒫𝒶𝓅𝑒𝓁𝑒𝓇í𝒶 𝑀🌺𝓃𝒲𝑒𝓃 🎀 🍧 ⋆ 🍇 — Atención Cecytem · &copy; <?php echo date("Y"); ?></p>
</footer>
</body>
</html>
<?php



