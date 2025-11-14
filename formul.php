
<?php
if (isset($_GET['cantidad-camiseta']) && $_GET['cantidad-camiseta'] !== '') {
$cantidadCamiseta = intval($_GET['cantidad-camiseta']);
$precioCamiseta = 1200.00;
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
        Tienda de Ropa <br>
        Equipo:<br>
        TREJO IBARRA EDGAR FERNANDO<br>
        MENEZ TORRES DIEGO JOSUE<br>
    </footer>
</body>
</html>