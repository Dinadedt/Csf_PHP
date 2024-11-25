<?php

/**
 * Función principal que determina si una cadena es un palíndromo
 * @param string $texto Texto a verificar
 * @param bool $considerarEspacios Si se deben considerar espacios y signos de puntuación
 * @return bool|string Retorna true si es palíndromo, false si no lo es, o un mensaje de error
 */
function esPalindromo($texto, $considerarEspacios = false) {
    // Validar que la entrada no esté vacía
    if (empty($texto)) {
        return "El texto no puede estar vacío";
    }

    // Validar que la entrada sea una cadena
    if (!is_string($texto)) {
        return "La entrada debe ser una cadena de texto";
    }

    // Si no consideramos espacios, limpiamos la cadena
    if (!$considerarEspacios) {
        // Convertir a minúsculas
        $texto = mb_strtolower($texto, 'UTF-8');
        
        // Eliminar acentos
        $texto = eliminarAcentos($texto);
        
        // Eliminar espacios, signos de puntuación y caracteres especiales
        $texto = preg_replace('/[^a-z0-9]/', '', $texto);
    }

    // Obtener la longitud del texto
    $longitud = mb_strlen($texto, 'UTF-8');
    
    // Comparar caracteres desde ambos extremos hacia el centro
    for ($i = 0; $i < $longitud / 2; $i++) {
        if (mb_substr($texto, $i, 1, 'UTF-8') !== mb_substr($texto, $longitud - 1 - $i, 1, 'UTF-8')) {
            return false;
        }
    }
    
    return true;
}

/**
 * Función auxiliar para eliminar acentos de una cadena
 * @param string $texto Texto con posibles acentos
 * @return string Texto sin acentos
 */
function eliminarAcentos($texto) {
    $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
    $reemplazar = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'n', 'N');
    return str_replace($buscar, $reemplazar, $texto);
}

/**
 * Función para mostrar el análisis detallado de un palíndromo
 * @param string $texto Texto a analizar
 */
function analizarPalindromo($texto) {
    echo "Análisis de: '$texto'\n";
    
    // Verificar considerando espacios y puntuación
    $resultadoConEspacios = esPalindromo($texto, true);
    echo "1. Considerando espacios y puntuación: ";
    echo ($resultadoConEspacios === true) ? "ES palíndromo\n" : "NO es palíndromo\n";
    
    // Verificar sin considerar espacios ni puntuación
    $resultadoSinEspacios = esPalindromo($texto);
    echo "2. Sin considerar espacios ni puntuación: ";
    echo ($resultadoSinEspacios === true) ? "ES palíndromo\n" : "NO es palíndromo\n";
    
    // Mostrar la cadena limpia
    $textoLimpio = mb_strtolower($texto, 'UTF-8');
    $textoLimpio = eliminarAcentos($textoLimpio);
    $textoLimpio = preg_replace('/[^a-z0-9]/', '', $textoLimpio);
    echo "3. Texto procesado para verificación: '$textoLimpio'\n";
    echo "4. Texto invertido: '" . strrev($textoLimpio) . "'\n";
    echo "-------------------\n";
}

// Ejemplos de uso
$ejemplos = array(
    "Anita lava la tina",
    "A man, a plan, a canal: Panama!",
    "Yo hago yoga hoy",
    "¿Será lodo o dólares?",
    "No es palíndromo",
    "Áábócó"
);

echo "Probando diferentes palíndromos:\n\n";

foreach ($ejemplos as $ejemplo) {
    analizarPalindromo($ejemplo);
}

// Ejemplo de uso directo de la función
$texto = "Anita lava la tina";
if (esPalindromo($texto)) {
    echo "\nLa frase '$texto' ES un palíndromo";
} else {
    echo "\nLa frase '$texto' NO es un palíndromo";
}

?>