<?php

// Shortcode pour afficher la date du jour au format Day/Month/Year
function spwpbw_today_shortcode() {
    return '<span class="spwpbw-date-today">' . date_i18n('d/m/Y') . '</span>';
}
add_shortcode('today', 'spwpbw_today_shortcode');

// Shortcode pour afficher le mois en cours 
function spwpbw_month_shortcode() {
    return '<span class="spwpbw-date-month">' . date_i18n('F') . '</span>';
}
add_shortcode('month', 'spwpbw_month_shortcode');

// Shortcode pour afficher l'année en cours
function spwpbw_year_shortcode() {
    return '<span class="spwpbw-date-year">' . date('Y') . '</span>';
}
add_shortcode('year', 'spwpbw_year_shortcode');

// Filtrer le contenu des champs pour remplacer les shortcodes
function spwpbw_filter_content($content) {
    $content = preg_replace_callback('/\[(today|month|year)\]/', 'spwpbw_replace_shortcode', $content);

    return $content;
}
add_filter('the_title', 'spwpbw_filter_content');
add_filter('the_content', 'spwpbw_filter_content');
add_filter('widget_text_content', 'spwpbw_filter_content');

// Fonction de remplacement pour les shortcodes
function spwpbw_replace_shortcode($matches) {
    switch ($matches[1]) {
        case 'today':
            return spwpbw_today_shortcode();
        case 'month':
            return spwpbw_month_shortcode();
        case 'year':
            return spwpbw_year_shortcode();
    }
    return '';
}

// Fonction pour ajouter une classe CSS aux balises de texte
function spwpbw_add_date_classes($content) {
    // Balises dans lesquelles les shortcodes sont autorisées
    $allowed_tags = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'div', 'a', 'li', 'td', 'th');

    $content = preg_replace_callback('/<(' . implode('|', $allowed_tags) . ')(.*?)>(.*?)<\/\1>/s', 'spwpbw_add_date_class_callback', $content);

    return $content;
}
add_filter('the_title', 'spwpbw_add_date_classes');
add_filter('the_content', 'spwpbw_add_date_classes');
add_filter('widget_text_content', 'spwpbw_add_date_classes');

// Fonction de rappel pour ajouter la classe CSS aux balises
function spwpbw_add_date_class_callback($matches) {
    $tag     = $matches[1];
    $attr    = $matches[2];
    $content = $matches[3];

    // Vérifier si le contenu contient un shortcode
    if (strpos($content, '[today]') !== false || strpos($content, '[month]') !== false || strpos($content, '[year]') !== false) {
        return '<' . $tag . $attr . ' class="spwpbw-date">' . $content . '</' . $tag . '>';
    } else {
        return $matches[0];
    }
}
?>
