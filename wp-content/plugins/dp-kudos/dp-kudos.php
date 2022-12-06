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

class DPKudos {
    public function __construct() {
        register_deactivation_hook( __FILE__, array( $this, 'deactivate_kudos' ) );
    }

    public function deactivate_kudos() {
        unregister_post_type( 'kudos_cpt' );
    }

    public function init_kudos_cpt() {
        register_post_type( 'kudos_cpt',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Kudos' ),
                    'singular_name' => __( 'Kudo' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'kudos'),
                'show_in_rest' => true,
            )
        );
    }
    add_action( 'init', 'init_kudos_cpt' );


    public function create_new_kudos_post($comment, $recipient) {
        $name = get_user_meta( $recipient, 'first_name', true );
    
        $postId = wp_insert_post(
            array(
                'post_type' => 'kudos_cpt',
                'post_title' => 'Kudos! to: ' . $name,
                'post_content' =>  $comment,
                'post_status' => 'publish',
            )
        );
    }

    public function kudos_form_shortcode($args = []) {
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

}
new DPKudos();