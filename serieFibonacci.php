<?php

/**
 * Función que genera los primeros n términos de la serie Fibonacci
 * @param int $n Número de términos a generar
 * @return array Array con la serie Fibonacci
 */
function generarFibonacci($n) {
    // Validar que el número sea positivo
    if ($n <= 0) {
        return "El número debe ser positivo";
    }
    
    // Inicializar el array con los dos primeros números
    $fibonacci = array();
    
    // Si n es 1, solo retornamos el primer número
    if ($n == 1) {
        $fibonacci[] = 0;
        return $fibonacci;
    }
    
    // Los dos primeros números de la serie
    $fibonacci[] = 0;
    $fibonacci[] = 1;
    
    // Generar los siguientes números de la serie
    for ($i = 2; $i < $n; $i++) {
        // Cada número es la suma de los dos anteriores
        $fibonacci[] = $fibonacci[$i-1] + $fibonacci[$i-2];
    }
    
    return $fibonacci;
}

// Ejemplo de uso
$n = 10;
$resultado = generarFibonacci($n);

// Mostrar el resultado
echo "Los primeros $n términos de la serie Fibonacci son: \n";
print_r($resultado);

// Ejemplo de uso alternativo mostrando los números en línea
echo "\nSerie Fibonacci: ";
foreach ($resultado as $numero) {
    echo $numero . " ";
}
?>