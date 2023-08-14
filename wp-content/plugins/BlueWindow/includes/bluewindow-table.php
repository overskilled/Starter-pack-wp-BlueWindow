<?php
//function pour generer le tableau
function spwpbw_table_shortcode ($atts, $content = null) {
    //definir les attribute du tableau
   $atts = shortcode_atts(array (
    'columns' => 2,
    'rows'     => 4,
    'border'  => 1,
   ), $atts);

   //diviser en lignes et colonnes
   $rows       = explode("\n", $content);
   $table_data = array();
   foreach ($rows as $row) {
    $table_data[] = explode(",", $row);
   }

   //Generer le tableau
   $table_html = '<table border"' . $atts['border'] . '">';
   for ($i = 0; $i < $atts['rows']; $i++) {
        $table_html .= '<tr>';
        for ($j = 0; $j < $atts['columns']; $j++) {
            if (isset($table_data[$i][$j])) {
                $table_html .= '<td>' . $table_data[$i][$j] . '</td>';
            } else {
                $table_html .= '<td></td>';
            }
        }
        $table_html .= '</tr>';
   }
   $table_html .= '</table>';

   return $table_html;
}
add_shortcode('table', 'spwpbw_table_shortcode');
