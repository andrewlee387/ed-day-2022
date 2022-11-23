<?php
/**
 * DP Kudos
 *
 * @package     DP Kudos
 * @author      Andrew Lee
 * @copyright   2020 Andrew Lee
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: DP Kudos
 * Description: This plugin prints "DP Kudos" inside an admin page.
 * Version:     1.0.0
 * Author:      Andrew Lee
 * Text Domain: hello-world
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// require_once( plugin_dir_path( __FILE__ ) . 'page-kudos.php');

// add_action('wp_ajax_my_new_action', 'make_a_post');


function make_kudos_post($comment, $recipient) {
    $name = get_user_meta( $recipient, 'first_name', true );

    $postId = wp_insert_post(
        array(
            'post_title' => 'Kudos! to: ' . $name,
            'post_content' =>  $comment,
            'post_status' => 'publish',
            'post_category' => ['943']
        )
    );
    
    set_post_thumbnail( $postId, 4974 );
}


function kudos_form_shortcode($args = []) {
    // $atts = shortcode_atts(array(
    //     'post_id' => null,
    // ), $args);
    ?>
        <style>
            .kudos {
                display: flex;
                flex-direction: column;
                max-width: 190px;
                gap: 4px;
            }
            .flex {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .kudos button {
                background-color: #FF7E00;
                border-radius: 4px;
                padding: 4px;
                outline: none;
                color: white;
                cursor: pointer;
                border: none;
                margin-left: 4px;
            }
            .kudos button:hover {
                background-color: #E66500;
            }
        </style>
        <script>
            window.addEventListener('load', function() {
                const submitted = document.getElementById('submitted');
                setTimeout(() => {
                    if (submitted) {
                        submitted.style = "display: none";

                    }
                }, 1000);
            }, false);
        </script>
        <form action="" method="POST">
            <div class="kudos">
                <textarea name="comment"></textarea>
                <div class="flex">
                    <?php 
                    wp_dropdown_users(array(
                        'show_option_none' => 'Select',
                        'name' => 'recipient',
                        'selected' => null
                    ));
                    ?>
                
                    <button type="submit">Kudos!</button>
                </div>
            </div>
        </form>
    <?php
    if(isset($_POST['comment']) && isset($_POST['recipient'])) {
        $comment = $_POST['comment'];
        $recipient = $_POST['recipient'];
        if ($comment != null && $recipient != -1) {
            make_kudos_post($comment, $recipient);
            echo '<div id="submitted">You Rock!</div>';
        } else {
            // echo 'try again';
        }
    }
}
add_shortcode('kudos_form', 'kudos_form_shortcode');

function exclude_category_home( $query ) {
    if ( $query->is_home() ) {
        $query->set( 'cat', '-943' );
    }
    return $query;
    }
 
add_filter( 'pre_get_posts', 'exclude_category_home' );

function kudos_featured_image( $html ) {
    return 'https://placekitten.com/g/600/600';
    // $id = get_post_thumbnail_id();
    
    // // $alt_text = get_post_meta( $id, '_wp_attachment_image_alt', true );

    // $html = str_replace( 'alt=', 'title="' . 'andrewtest' . '" alt=', $html );

    // return '<img src="https://placekitten.com/g/600/600" alt="kitten">';
        // return 'itworked' + $html;

}
    
// add_filter( 'wp_get_attachment_url', 'kudos_featured_image' );
add_filter( 'post_thumbnail_html', 'kudos_featured_image' );
