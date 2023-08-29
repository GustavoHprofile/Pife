<?php
// Função para comprar uma carta usando a pilha em Java
function comprarCarta() {
    $carta = null;
    exec('java -jar pilha.jar comprar', $output);
    if (!empty($output)) {
        $carta = $output[0];
    }
    return $carta;
}

$cartaComprada = comprarCarta();
echo $cartaComprada;
?>
