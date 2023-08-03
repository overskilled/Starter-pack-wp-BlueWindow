<?php
//function pour generer le tableau
function spwpbw_generate_table () {
    $table_data = array(
        array(
            'Cellule 1, Ligne 1',
            'Cellule 2, Ligne 1',
        ),
        array(
            'Cellule 1, Ligne 2',
            'Cellule 2, Ligne 2',
        ),
        array(
            'Cellule 1, Ligne 3',
            'Cellule 2, Ligne 3',
        ),
        array(
            'Cellule 1, Ligne 4',
            'Cellule 2, Ligne 4',
        ),
    );

    //Generer le code HTML du tableau
    $table_html = '<table>';
    foreach ($table_data as $row) {
        $table_html .= '<tr>';
        foreach ($row as $cell) {
            $table_html .= '<td>' . $cell . '</td>';
        }
        $table_html .= '</tr>';
    }
    $table_html .= '</table>';

    return $table_html;
}

//Shortcode pour generer le tableau
function spwpbw_table_shortcode() {
    return spwpbw_generate_table();
}
add_shortcode('table', 'spwpbw_table_shortcode');
