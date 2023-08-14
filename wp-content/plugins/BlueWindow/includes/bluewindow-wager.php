<?php
add_action('init','generate_short_code');

function generate_short_code(){
    function wager_short_code($atts){
        extract( shortcode_atts(
            array(
                'langue' => 'FR'
            ),$atts
        ));
        return apparence();

    }
    add_shortcode('wager-plugin-settings','wager_short_code');
}
function wager_plugin_admin_menu() {
    add_menu_page(
        'Parametre',
        'Parametre-wager',
        'manage_options',
        'wager-plugin-settings',
        'wager_plugin_settings_page'
    );
}
add_action('admin_menu', 'wager_plugin_admin_menu');

function wager_plugin_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Vérifie si le formulaire a été soumis
    if ( isset( $_POST['wager_percentage_submit'] ) ) {
        $wager_percentage = sanitize_text_field( $_POST['wager_percentage'] );
        update_option( 'wager_percentage', $wager_percentage );
        echo '<div class="notice notice-success"><p>Valeur du wager enregistrée avec succès !</p></div>';
    }

    // Récupère la valeur actuelle du wager depuis les options
    $wager_percentage = get_option( 'wager_percentage', '' );

    echo '<div class="wrap">';
    echo '<h1>Wager Plugin Settings</h1>';
    echo '<form method="post" action="">';
    echo '<label for="wager_percentage">Valeur du wager :</label>';
    echo '<input type="text" id="wager_percentage" name="wager_percentage" value="' . esc_attr( $wager_percentage ) . '" />';
    echo '<p><input type="submit" name="wager_percentage_submit" class="button button-primary" value="Enregistrer" /></p>';
    echo '</form>';
    echo '<p>shortcode: [wager-plugin-settings]</p>';
    echo '</div>';
}

$first_deposit;
$wager_percent;

// Gérer le CSS
//function affectation_css() {
//    wp_enqueue_style( 'my-style', plugins_url( './styles.css', FILE ) );
//}
//add_action( 'wp_enqueue_scripts', 'affectation_css' );

// Afficher le cadre
function apparence() {
    $wager_percent = get_option( 'wager_percentage', '' );

    echo '<table class="container">';
    echo '<tr>';
    echo '<td class="content-1">';
    echo '<form>';
    echo '<input class="content-1" id="content-1" type="text">';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '+';
    echo '</td>';
    echo '<td class="content-2">';
    echo '' . $wager_percent;
    echo '</td>';
    echo '<td>=</td>';
    echo '<td class="content-3"></td>';
    echo '<td><i>Vous devez parier <span class="wager-amount" id="wager_amount">0</span> avant de faire une demande de retrait.</i></td>';
    echo '</tr>';
    echo '</table>';

    // JavaScript pour mettre à jour le montant du wager
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    var wagerPercentage = ' . $wager_percent . ';';
    echo '    var inputField = document.getElementById("content-1");';
    echo '    var wagerAmountElement = document.getElementById("wager_amount");';
    echo '    ';
    echo '    inputField.addEventListener("input", function() {';
    echo '        var inputValue = parseFloat(inputField.value);';
    echo '        var wagerAmount = inputValue * wagerPercentage;';
    echo '        wagerAmountElement.textContent = wagerAmount;';
    echo '    });';
    echo '});';
    echo '</script>';
}
//add_action( 'wp_head', 'apparence' );
?>
