<?php
// Função para adicionar uma carta usando a pilha em Java
function adicionarCarta($carta) {
    exec('java -jar pilha.jar adicionar "'.$carta.'"');
}

if (isset($_POST['carta'])) {
    $carta = $_POST['carta'];
    adicionarCarta($carta);
}
?>
