<?php

//Function pour generer la table des matieres
function spwpbw_genrerate_toc ($atts, $content = null) {
    global $post;

    //verifier si le contenue de la page est vide
    if (empty($content)) {
        return '';
    }

    // Utiliser la librairie Parsedown pour analyser le contenu en Markdown
    require_once plugin_dir_path(__FILE__) . 'parsedown/Parsedown.php';
    $parsedown = new Parsedown();
    $parsed_content = $parsedown->text($content);

    // Extraire les titres de H2 à H6 avec leurs ancres personnalisées
    preg_match_all('/<(h[2-6]) id="(.*?)">(.*?)<\/h[2-6]>/i', $parsed_content, $matches);

    if (issest($matches[0]) && count($matches[0]) > 0) {
        $toc_html = '<div class ="spwpbw-table-of-contents"><ul>';

        foreach ($matches[0] as $index  => $heading) {
            $tag = $matches[1][$index];
            $anchor = $matches[2][$index];
            $title = strip_tags($matches[3][$index]);

            $toc_html .= '<li><a href="#' . $anchor . '">' . $title . '</a></li>';
        }
        $toc_html .= '</ul></div>';

        return $toc_html;
    }
    return '';
}
add_shortcode('bwtoc', 'spwpbw_genrerate_toc');

?>
