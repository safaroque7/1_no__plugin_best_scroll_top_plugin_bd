<?php

/**
 * Plugin Name:         Best Scroll Top Plugin BD 
 * Plugin URL:          https://wordpress.org/plugins/search/best-scroll-top-wp-plugin-bd/
 * Description:         It is a simple bottom to top plugin, but best.
 * Version:             1.0.0
 * Requires at least:   5.2
 * Requires PHP:        7.2        
 * Author:              S A Faroque
 * Author URI:          https://webnewsdesign.com
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         bstpb
 */





/**
 * Plugin Option Page function
 */
function bstpb_add_theme_page()
{
    add_menu_page("Best Scroll to Top Plugin", "Scroll To Top", "manage_options", "bstpb-plugin-option", "bstpb_create_page", "dashicons-arrow-up-alt", 102);
}
add_action("admin_menu", "bstpb_add_theme_page");

// Plugin Option Page Style
function bstpb_add_css()
{
    wp_enqueue_style("bstpb-admin-style", plugins_url("css/bstpb-admin-style.css", __FILE__), false, "1.0.0");
}
add_action("admin_enqueue_scripts", "bstpb_add_css");

/**
 * Plugin callback
 */
function bstpb_create_page()
{ ?>

    <div class="bstpb_main_area">
        <div class="bstpb_body_area">
            <h3 id="title" class="bstpb_title_design"> <?php print esc_attr("Best Scroll to top Customizer"); ?> </h3>
            <form action="options.php" method="post">
                <?php wp_nonce_field("update-options"); ?>

                <!-- Primary Color -->
                <label for="bstpb-primary-color" name="bstpb-primary-color"> <?php print esc_attr("Primary Color"); ?> </label>
                <small> Add your Primary color </small>
                <input type="color" name="bstpb-primary-color" value="<?php print get_option("bstpb-primary-color"); ?>">

                <!-- Position Button -->
                <label for="bstpb-image-position"> <?php echo esc_attr(__("Button Position")); ?> </label>
                <small> Where do you wish to show your button position? </small>
                <select name="bstpb-image-position" id="bstpb-image-position">

                    <option value="true" <?php if (get_option("bstpb-image-position") == "true") {
                                                echo 'selected="selected"';
                                            } ?>> Left </option>



                    <option value="false" <?php if (get_option("bstpb-image-position") == "false") {
                                                echo 'selected="selected"';
                                            } ?>> Right </option>
                </select>

                <!-- Round Corner -->
                <label for="bstpb-round-corner"> <?php print esc_attr(__("Round Corner")); ?> </label>
                <small> What do you want round or square button? </small>
                <label class="radios">
                    <input type="radio" name="bstpb-round-corner" id="bstpb-round-corner-no" value="false" <?php if (get_option("bstpb-round-corner") == "false") {
                                                                                                                echo 'checked="checked"';
                                                                                                            } ?>> <span> Yes </span>
                </label>
                <label class="radios">
                    <input type="radio" name="bstpb-round-corner" id="bstpb-round-corner-yes" value="true" <?php if (get_option("bstpb-round-corner") == "true") {
                                                                                                                echo 'checked = "Checked" ';
                                                                                                            } ?>> <span> No </span>
                </label>

                <!-- Submit Button -->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="page_options" value="bstpb-primary-color, bstpb-image-position, bstpb-round-corner">
                <input type="submit" name="submit" class="button button-primary" value="<?php _e("Save Changes", "bstpb"); ?>">

            </form>
        </div>

        <div class="bstpb_sidebar" class="bstpb_title_design">
            <h3 id="title" class="bstpb_title_design"> <?php print esc_attr('About Author'); ?> </h3>
            <div class="bstpb_author_profile">
                <a href="https://www.buymeacoffee.com/safaroque" target="_blank">
                    <img src="<?php print plugin_dir_url(__FILE__) . '/images/s_a_faroque.jpg' ?>" alt="donate button">
                </a>
            </div>
            <p> I am S A FAroque. I am a Graphic Designer, WordPress Developer and Plugin Developer. My website address is <a href="https://webnewsdesign.com" target="_blank"> webnewsdesign.com. </a> Basically I develop Online News Portal, Official website, School College website, Personal website, Organization website. You can hire me to develop your website and plugin. </p>
            <p> I also am expert at Graphic designing. Such as News Paper design by QuarkXpress and Illustrator. I have been doing this job for 18 years. </p>

            <p>
                <a href="https://www.buymeacoffee.com/safaroque" target="_blank">
                    <img src="<?php print plugin_dir_url(__FILE__) . '/images/byumeacoffee.png' ?>" alt="donate button">
                </a>
            </p>

            <p> Social Media Links: </p>
            <ul>
                <li> <a href="https://facebook.com/faroque.computer" target="_blank"> Facebook </a> </li>
                <li> <a href="https://facebook.com/faroque.computer" target="_blank"> Twitter </a> </li>
                <li> <a href="https://facebook.com/faroque.computer" target="_blank"> Linkedin </a> </li>
                <li> <a href="mailto: faroque.computer@gmail.com" target="_blank"> faroque.computer@gmail.com </a> </li>

            </ul>
        </div>
    </div>
<?php }


//Including CSS
function bstpb_enqueue_style()
{
    wp_enqueue_style('bstpb-style', plugins_url('css/bstpb-style.css', __FILE__));
}
add_action("wp_enqueue_scripts", "bstpb_enqueue_style");

// Including Javascript
function bstpb_enqueue_scripts()
{
    wp_enqueue_script('jQuery');
    wp_enqueue_script('bstpb-plugin', plugins_url("js/bstpb-plugin.js", __FILE__), array(), "1.0.0", "true");
}

add_action("wp_enqueue_scripts", "bstpb_enqueue_scripts");

// jQuery Plugin Setting Activation
function bstpb_scroll_script()
{ ?>
    <script>
        jQuery(document).ready(function() {
            jQuery.scrollUp();
        });
    </script>
<?php }
add_action("wp_footer", "bstpb_scroll_script");


// Theme CSS Customization
function bstpb_scroll_top_color_css()
{ ?>
    <style>
        #scrollUp {
            background-color: <?php print get_option("bstpb-primary-color") ?> !important;
            <?php if (get_option("bstpb-round-corner") == "false") {
                echo "border-radius: 50px !important";
            } else {
                echo "border-radius: 0 !important";
            } ?>;
            <?php if (get_option("bstpb-image-position") == "true") {
                echo "left: 5px; right: auto;";
            } else {
                echo "right: 5px";
            } ?>
        }
    </style>
<?php }
add_action("wp_head", "bstpb_scroll_top_color_css");


function bstpb_admin_css()
{ ?>
    <style>
        .bstpb_title_design {
            border-left: 7px solid <?php print get_option("bstpb-primary-color") ?> !important;
        }

        .bstpb_author_profile {
            border: 5px solid <?php print get_option("bstpb-primary-color") ?> !important;
        }
    </style>
<?php }

add_action("admin_init", "bstpb_admin_css");


/**
 * Plugin Redirect Feature
 */
register_activation_hook(__FILE__, "bstpb_plguin_activation");
function bstpb_plguin_activation()
{
    add_option("bstpb_plguin_do_activation_redirect", true);
}

add_action("admin_init", "bstpb_plguin_redirect");
function bstpb_plguin_redirect()
{
    if (get_option("bstpb_plguin_do_activation_redirect", false)) {
        delete_option("bstpb_plguin_do_activation_redirect");
        if (!isset($_GET["active-multi"])) {
            wp_safe_redirect('admin.php?page=bstpb-plugin-option');
            exit;
        }
    }
}
?>