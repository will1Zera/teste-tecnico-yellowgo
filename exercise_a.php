<?php
// Initializing the array to store the elements
$elements = [];

// Replace the count() method 
function countElements($array){
    $count = 0;
    foreach ($array as $element) {
        $count++;
    }
    return $count;
}

// Replace the print_r() method
function showElements($array) {
    $count = countElements($array);
    for ($i = 0; $i < $count; $i++) {
        echo "[$i] => " . $array[$i] . "\n";
    }
}

while(true) {

    // Options menu
    echo "\nEscolha uma opção:\n \n";
    echo "1 - Adicionar elemento\n";
    echo "2 - Listar elementos\n";
    echo "3 - Excluir elemento\n";
    echo "4 - Ver a quantidade de elementos registrados\n";
    echo "5 - Listar elementos na ordem inversa\n";
    echo "6 - Sair\n \n";

    $option = readline("Opção: ");

    switch($option) {

        case 1:
            // Stores the elements
            $element = intval(readline("\nInforme o elemento: "));
            if($element >= 0) {
                $elements[] = $element;
                echo "Elemento registrado com sucesso!\n";
            } else {
                echo "Não é permitido registrar elementos negativos.\n";
            }
            break;

        case 2:
            // Use the function to display elements
            echo "\nElementos registrados:\n";
            showElements($elements);
            break;

        case 3:
            // Replace the array_splice() method to remove an element from the array
            $indice = intval(readline("Informe o índice do elemento a ser excluído: "));
            if(isset($elements[$indice])) {
                $newElements = [];
                $elementCount = countElements($elements);
                for ($i = 0; $i < $elementCount; $i++) {
                    if ($i != $indice) {
                        $newElements[] = $elements[$i];
                    }
                }
                $elements = $newElements;
                echo "Elemento excluído com sucesso!\n";
            } else {
                echo "Índice inválido.\n";
            }
            break;

        case 4:
            // Use the function to count the elements
            $elementCount = countElements($elements);
            echo "Quantidade de elementos registrados: $elementCount\n";
            break;

        case 5:
            // Replace the array_reverse() method to display elements in reverse order
            echo "Elementos registrados na ordem inversa:\n";
            $inverseElements = [];
            $elementCount = countElements($elements) -1;
            for ($i = $elementCount; $i >= 0; $i--) {
                $inverseElements[] = $elements[$i];
            }
            showElements($inverseElements);
            break;

        case 6:
            echo "Programa finalizado com sucesso.\n";
            exit();

        default:
            echo "Opção inválida. Tente novamente.\n";
    }
}
?>
