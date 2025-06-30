<?php

// Lista de tareas 
$tareas = [];

//agregar una nueva tarea
function agregarTarea(&$tareas, $descripcion) {
    $tareas[] = [
        'descripcion' => $descripcion,
        'completada' => false
    ];
}

//listar todas las tareas
function listarTareas($tareas) {
    if (empty($tareas)) {
        echo "No hay tareas registradas.\n";
        return;
    }

    foreach ($tareas as $indice => $tarea) {
        $estado = $tarea['completada'] ? '✔ Completada' : '✗ Pendiente';
        echo "{$indice}. {$tarea['descripcion']} - {$estado}\n";
    }
}

//marcar una tarea como completada
function completarTarea(&$tareas, $indice) {
    if (isset($tareas[$indice])) {
        $tareas[$indice]['completada'] = true;
        echo "Tarea marcada como completada.\n";
    } else {
        echo "Índice inválido.\n";
    }
}

// Menú 
do {
    echo "\nGestor de Tareas\n";
    echo "1) Agregar tarea\n";
    echo "2) Listar tareas\n";
    echo "3) Completar tarea\n";
    echo "4) Salir\n";
    echo "Seleccione una opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            echo "Descripción de la tarea: ";
            $descripcion = trim(fgets(STDIN));
            agregarTarea($tareas, $descripcion);
            break;

        case '2':
            listarTareas($tareas);
            break;

        case '3':
            echo "Ingrese el número de la tarea a completar: ";
            $indice = intval(trim(fgets(STDIN)));
            completarTarea($tareas, $indice);
            break;

        case '4':
            echo "Saliendo del programa...\n";
            break;

        default:
            echo "Opción no válida. Intente nuevamente.\n";
    }
} while ($opcion !== '4');

#Variables y estructuras de datos: Uso de un array $tareas para almacenar las tareas.
#Entrada/salida: Se utiliza fgets(STDIN) y echo para interacción.
#Condicionales y bucles: Uso de switch, if, y do-while para la lógica.
#Funciones: agregarTarea, listarTareas, y completarTarea para modularizar el código.

?>