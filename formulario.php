<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../imagenes/flor12.ico">
    <title>Tienda de Ropa - Productos</title>
</head>
<body>
    
    <header>
        <h1>Tienda</h1>
    </header>
    
    <main>
        <section id="productos">
            <div class="contenedor-principal">
                <div class="formulario-compra">
                    <form action="" method="GET">
                        <h1>Nuestra Ropa</h1>
                        <p>Ofrecemos una variedad de prendas de vestir para todas las ocasiones.</p>
                        <div class="productos">
                            <div class="producto">     
                               
                                <h2>Vestido de Gala</h2>
                                <p>Ideal para tu noche.</p>
                                <p><strong>COSTO: $920.00</strong></p>
                                <div class="producto-form">
                                    <label for="cantidad-camiseta">Cantidad:</label>
                                    <input type="number" id="cantidad-camiseta" name="cantidad-camiseta" min="0" value="<?php echo isset($_GET['cantidad-camiseta']) ? htmlspecialchars($_GET['cantidad-camiseta']) : '0'; ?>">

                                
                                </div>
                            </div>
                        </div>
                        
                        <div class="acciones-formulario">
                            <button type="submit" class="btn-confirmar">Calcular Precio</button>
                            <button type="reset" class="btn-cancelar">Limpiar</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="resultado-compra">
<?php
if (isset($_GET['cantidad-camiseta']) && $_GET['cantidad-camiseta'] !== '') {
$cantidadCamiseta = intval($_GET['cantidad-camiseta']);
$precioCamiseta = 920.00;
$subtotal = $precioCamiseta * $cantidadCamiseta;

if ($cantidadCamiseta >= 3 || $subtotal > 500) {
$descuento = 0.20;
$tipoDescuento = "20% (por compra de 3+ camisetas o total mayor a $500)";
} else {
$descuento = 0.10;
$tipoDescuento = "10% (descuento estándar)";
}

$montoDescuento = $subtotal * $descuento;
$total = $subtotal - $montoDescuento;

echo '<h2>Detalle de la Compra</h2>';
echo '<div class="detalles-compra">';
echo '<p><strong>Producto:</strong> Camiseta Básica</p>';
echo '<p><strong>Cantidad:</strong> '.$cantidadCamiseta.'</p>';
echo '<p><strong>Precio Unitario:</strong> $'.number_format($precioCamiseta, 2).'</p>';
echo '<p><strong>Subtotal:</strong> $'.number_format($subtotal, 2).'</p>';
echo '<p><strong>Descuento:</strong> '.$tipoDescuento.' (-$'.number_format($montoDescuento, 2).')</p>';
echo '<h3><strong>Total a Pagar:</strong> $'.number_format($total, 2).'</h3>';
echo '</div>';
echo '<div class="acciones">';
echo '<a href="?" class="btn btn-confirmar">Nueva Compra</a>';
echo '</div>';
} else {
echo '<h2>Resumen de Compra</h2>';
echo '<p>Ingrese la cantidad deseada y haga clic en "Calcular Precio"</p>';
}
                    ?>
                </div>
            </div>
        </section>
    </main>
    
   
       <footer>
        Integrantes:
        Mondragon Arredondo Joselyn <br>
        Guzmán Velazquéz Yazú Italia <br>
        Bennis Mojica Barrios <br>
    </footer>
    
</body>
</html>