<?php

// Obtiene una instancia del modelo y de la vista de tareas
class usuariosView {

    // Muestra la lista de tareas
    public function mostrarLista($tareas) {
        // Genera una tabla con las tareas
        echo '<table>';
        echo '<tr><th>Título</th><th>Completada</th></tr>';
        foreach ($tareas as $tarea) {
            echo '<tr>';
            echo '<td>' . $tarea['titulo'] . '</td>';
            echo '<td>' . ($tarea['completada'] ? 'Sí' : 'No') . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
     public function mostrarFormulario() {

        // Genera el formulario
        echo '<form action="index.php?controller=Tareas&action=procesarFormulario" method="POST">';
        echo '<label>Título:</label>';
        echo '<input type="text" name="titulo"">';
        echo '<br>';
        echo '<label>Completada:</label>';
        echo '<input type="checkbox" name="completada">';
        echo '<br>';
        echo '<input type="submit" value="Guardar">';
        echo '</form>';
    }
}
