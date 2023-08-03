<?php

//fonction pour stocker la date dans un champ personaliser lors de la publication de l'article
function spwpbw_save_custom_date($post_id) {
    if (get_post_type($post_id) === 'post') {
        if (empty(get_post_meta($post_id, 'spwpbw_custom_date', true))) {
            update_post_meta($post_id, 'spwpbw_custom_date', get_the_time('Y-m-d H:i:s', $post_id));

        }
    }
}
add_action('save_post', 'spwpbw_save_custom_date');


//fonction pour tester si  la date est plus vielle que 10 jous
function spwpbw_update_custom_date () {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'meta_query'     => array(
            array(
                'key'     => 'spwpbw_custom_date',
                'value'   => date('Y-m-d H:i:s', strtotime('-10 days')),
                'compare' => 's',
                'type'    => 'DATETIME'
            )
        )
    );
    $posts = get_posts($args);

    foreach ($posts as $post) {
        $random_days = rand(1, 7);
        $new_date = date('Y-m-d H:i:s', strtotime("+$random_days days"));
        update_post_meta($post->ID, 'spwpbw_custom_date', $new_date);
    }
}
add_action('init', 'spwpbw_update_custom_date');


?>
