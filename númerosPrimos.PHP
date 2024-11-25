<?php

/**
 * Función que determina si un número es primo
 * @param int $numero Número a verificar
 * @return bool|string Retorna true si es primo, false si no lo es, o un mensaje de error
 */
function esPrimo($numero) {
    // Validar que el número sea un entero positivo
    if (!is_int($numero) || $numero <= 0) {
        return "El número debe ser un entero positivo";
    }
    
    // 1 no es considerado primo por definición
    if ($numero == 1) {
        return false;
    }
    
    // 2 es el único número primo par
    if ($numero == 2) {
        return true;
    }
    
    // Si es par y no es 2, no es primo
    if ($numero % 2 == 0) {
        return false;
    }
    
    // Verificar divisibilidad solo hasta la raíz cuadrada del número
    // Solo necesitamos verificar números impares hasta la raíz cuadrada
    $limite = sqrt($numero);
    for ($i = 3; $i <= $limite; $i += 2) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    
    return true;
}

/**
 * Función para mostrar los factores de un número no primo
 * @param int $numero Número a factorizar
 * @return array Array con los factores del número
 */
function obtenerFactores($numero) {
    $factores = array();
    for ($i = 1; $i <= $numero; $i++) {
        if ($numero % $i == 0) {
            $factores[] = $i;
        }
    }
    return $factores;
}

// Función para probar varios números
function probarNumeros($inicio, $fin) {
    for ($i = $inicio; $i <= $fin; $i++) {
        $resultado = esPrimo($i);
        echo "Número $i: ";
        if ($resultado === true) {
            echo "ES PRIMO\n";
        } elseif ($resultado === false) {
            echo "NO es primo. Sus factores son: ";
            echo implode(", ", obtenerFactores($i)) . "\n";
        } else {
            echo $resultado . "\n";
        }
    }
}

// Ejemplos de uso
echo "Probando números individuales:\n";
$numero = 17;
if (esPrimo($numero)) {
    echo "$numero es primo\n";
} else {
    echo "$numero no es primo\n";
}

echo "\nProbando un rango de números del 1 al 20:\n";
probarNumeros(1, 20);
?>