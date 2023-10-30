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

// Replace the sort() and rsort() methods 
function bubbleSort(&$array) {
    $n = countElements($array);
    for($i = 0; $i < $n - 1; $i++) {
        for($j = 0; $j < $n - $i - 1; $j++) {
            if($array[$j] > $array[$j + 1]) {
                // Change element
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
}

while (true) {

    // Options menu
    echo "\nEscolha uma opção:\n \n";
    echo "1 - Adicionar elementos\n";
    echo "2 - Ordenar elementos (crescente)\n";
    echo "3 - Ordenar elementos (decrescente)\n";
    echo "4 - Sair\n \n";

    $option = readline("Opção: ");

    switch($option) {

        case 1:
            // Stores the elements
            $element = intval(readline("Informe o elemento: "));
            if($element >= 0) {
                $elements[] = $element;
                echo "Elemento registrado com sucesso!\n";
            } else {
                echo "Não é permitido registrar elementos negativos.\n";
            }
            break;

        case 2:
            // Use the function to display elements in ascrending order
            bubbleSort($elements);
            echo "\nElementos ordenados em ordem crescente:\n";
            showElements($elements);
            break;

        case 3:
            // Use the function to display elements in descending order
            $inverseElements = [];
            $copyElements = $elements;
            bubbleSort($copyElements);
            $elementCount = countElements($copyElements) -1;
            for ($i = $elementCount; $i >= 0; $i--) {
                $inverseElements[] = $copyElements[$i];
            }
            echo "\nElementos ordenados em ordem decrescente:\n";
            showElements($inverseElements);
            break;

        case 4:
            echo "Programa finalizado com sucesso.\n";
            exit();

        default:
            echo "Opção inválida. Tente novamente.\n";
    }
}
?>
