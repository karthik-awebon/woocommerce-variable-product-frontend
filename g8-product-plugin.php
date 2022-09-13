<?php
/**
 * @package G8 Product Plugin V1
 */
/*
Plugin Name: G8 Product Plugin V1
Description: This Plugin adds product form to the frontend
Author: Karthikeyan Balasubramanian
Author URI: https://www.linkedin.com/in/karthikawebon/
*/
add_action('wp_enqueue_scripts', 'g8_plugin_front_scripts');
function g8_plugin_front_scripts()
{
    wp_enqueue_style('g8_plugin-style', plugin_dir_url(__FILE__)  . 'css/style.css', array(), 1.5, 'all');
}

add_action('admin_menu', 'add_g8_plugin_submenu_pages');

function add_g8_plugin_submenu_pages()
{
    add_submenu_page(
        'woocommerce',
        'Gold Product Settings',
        'Gold Product Settings',
        'manage_options',
        'ge-gold-product-setttings',
        'ge_gold_product_setttings_handler'
    );
    add_submenu_page(
        'woocommerce',
        'Diamond Product Settings',
        'Diamond Product Settings',
        'manage_options',
        'ge-diamond-product-setttings',
        'ge_diamond_product_setttings_handler'
    );
    add_submenu_page(
        'woocommerce',
        'Watch Product Settings',
        'Watch Product Settings',
        'manage_options',
        'ge-watch-product-setttings',
        'ge_watch_product_setttings_handler'
    );
}

function ge_gold_product_setttings_handler()
{
    if (current_user_can('edit_users')) {
        $g8_gold_settings_form_nonce = wp_create_nonce('g8_gold_settings_form_nonce'); ?>
<div class="wrap woocommerce">
    <form method="post" id="mainform"
        action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
        enctype="multipart/form-data">

        <h2>Gold Product Settings</h2>
        <div id="g8_gold_product_module_options-description">
            <div style="padding: 15px;background-color: #ffffff;color: #000000">Use
                <strong>[g8_gold_product_new]</strong>
                shortcode to add gold product from frontend.
            </div>
        </div>
        <h2>Options</h2>
        <div id="g8_gold_product_options-description">
            <p><em>Title</em> field is always enabled and required.</p>
        </div>
        <table class="form-table">
            <tbody>
                <tr valign="top" class="">
                    <th scope="row" class="titledesc">Add Fields</th>
                    <td class="forminp forminp-checkbox">
                        <fieldset>
                            <label for="g8_gold_product_desc_enabled">
                                <input name="g8_gold_product_desc_enabled" id="g8_gold_product_desc_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_gold_product_desc_enabled')==='yes'?'checked=checked':''); ?>>
                                Description </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_short_desc_enabled">
                                <input name="g8_gold_product_short_desc_enabled" id="g8_gold_product_short_desc_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_gold_product_short_desc_enabled')==='yes'?'checked=checked':''); ?>>
                                Short Description </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_regular_price_enabled">
                                <input name="g8_gold_product_regular_price_enabled"
                                    id="g8_gold_product_regular_price_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_gold_product_regular_price_enabled')==='yes'?'checked=checked':''); ?>>
                                Regular Price </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_sale_price_enabled">
                                <input name="g8_gold_product_sale_price_enabled" id="g8_gold_product_sale_price_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_gold_product_sale_price_enabled')==='yes'?'checked=checked':''); ?>>
                                Sale Price </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_cats_enabled">
                                <input name="g8_gold_product_cats_enabled" id="g8_gold_product_cats_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_gold_product_cats_enabled')==='yes'?'checked=checked':''); ?>>
                                Categories </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_tags_enabled">
                                <input name="g8_gold_product_tags_enabled" id="g8_gold_product_tags_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_gold_product_tags_enabled')==='yes'?'checked=checked':''); ?>>
                                Tags </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_image_enabled">
                                <input name="g8_gold_product_image_enabled" id="g8_gold_product_image_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_gold_product_image_enabled')==='yes'?'checked=checked':''); ?>>
                                Image </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_gold_product_image_gallery_enabled">
                                <input name="g8_gold_product_image_gallery_enabled"
                                    id="g8_gold_product_image_gallery_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_gold_product_image_gallery_enabled')==='yes'?'checked=checked':''); ?>>
                                Image Gallery </label>
                        </fieldset>


                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 1</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_gold_product_1_attribute_enabled" id="g8_gold_product_1_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_1=get_option('g8_gold_product_1_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <?=($attribute_1==$key)?"selected":""?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 2</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_gold_product_2_attribute_enabled" id="g8_gold_product_2_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_2=get_option('g8_gold_product_2_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <?php if ($attribute_2==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 3</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_gold_product_3_attribute_enabled" id="g8_gold_product_3_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_3=get_option('g8_gold_product_3_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <?php if ($attribute_3==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 1</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_gold_product_custom_taxonomy_1_id" id="g8_gold_product_custom_taxonomy_1_id"
                            type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_gold_product_custom_taxonomy_1_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_gold_product_custom_taxonomy_1_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_gold_product_custom_taxonomy_1_title"
                            id="g8_gold_product_custom_taxonomy_1_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_gold_product_custom_taxonomy_1_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 2</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_gold_product_custom_taxonomy_2_id" id="g8_gold_product_custom_taxonomy_2_id"
                            type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_gold_product_custom_taxonomy_2_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_gold_product_custom_taxonomy_2_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_gold_product_custom_taxonomy_2_title"
                            id="g8_gold_product_custom_taxonomy_2_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_gold_product_custom_taxonomy_2_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 3</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_gold_product_custom_taxonomy_3_id" id="g8_gold_product_custom_taxonomy_3_id"
                            type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_gold_product_custom_taxonomy_3_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_gold_product_custom_taxonomy_3_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_gold_product_custom_taxonomy_3_title"
                            id="g8_gold_product_custom_taxonomy_3_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_gold_product_custom_taxonomy_3_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <button name="save" class="button-primary woocommerce-save-button" type="submit" value="Save changes">Save
                changes</button>
            <input type="hidden" value="g8_gold_settings_action" name="action">
            <input type="hidden" name="g8_gold_settings_form_nonce"
                value="<?php echo $g8_gold_settings_form_nonce ?>" />
        </p>
    </form>
</div>
<?php
    }
}

add_action('admin_post_g8_gold_settings_action', 'save_g8_gold_settings');

function save_g8_gold_settings()
{
    if (isset($_POST['g8_gold_settings_form_nonce']) && wp_verify_nonce($_POST['g8_gold_settings_form_nonce'], 'g8_gold_settings_form_nonce')) {

        // sanitize the input
        $g8_gold_product_desc_enabled = sanitize_text_field($_POST['g8_gold_product_desc_enabled']);
        $g8_gold_product_short_desc_enabled = sanitize_text_field($_POST['g8_gold_product_short_desc_enabled']);
        $g8_gold_product_regular_price_enabled = sanitize_text_field($_POST['g8_gold_product_regular_price_enabled']);
        $g8_gold_product_sale_price_enabled = sanitize_text_field($_POST['g8_gold_product_sale_price_enabled']);
        $g8_gold_product_cats_enabled = sanitize_text_field($_POST['g8_gold_product_cats_enabled']);
        $g8_gold_product_tags_enabled = sanitize_text_field($_POST['g8_gold_product_tags_enabled']);
        $g8_gold_product_image_enabled = sanitize_text_field($_POST['g8_gold_product_image_enabled']);
        $g8_gold_product_image_gallery_enabled = sanitize_text_field($_POST['g8_gold_product_image_gallery_enabled']);
        $g8_gold_product_1_attribute_enabled = sanitize_text_field($_POST['g8_gold_product_1_attribute_enabled']);
        $g8_gold_product_2_attribute_enabled = sanitize_text_field($_POST['g8_gold_product_2_attribute_enabled']);
        $g8_gold_product_3_attribute_enabled = sanitize_text_field($_POST['g8_gold_product_3_attribute_enabled']);
        $g8_gold_product_custom_taxonomy_1_id = sanitize_text_field($_POST['g8_gold_product_custom_taxonomy_1_id']);
        $g8_gold_product_custom_taxonomy_1_title = sanitize_text_field($_POST['g8_gold_product_custom_taxonomy_1_title']);
        $g8_gold_product_custom_taxonomy_2_id = sanitize_text_field($_POST['g8_gold_product_custom_taxonomy_2_id']);
        $g8_gold_product_custom_taxonomy_2_title = sanitize_text_field($_POST['g8_gold_product_custom_taxonomy_2_title']);
        $g8_gold_product_custom_taxonomy_3_id = sanitize_text_field($_POST['g8_gold_product_custom_taxonomy_3_id']);
        $g8_gold_product_custom_taxonomy_3_title = sanitize_text_field($_POST['g8_gold_product_custom_taxonomy_3_title']);

        // do the processing
        update_option('g8_gold_product_desc_enabled', $g8_gold_product_desc_enabled?'yes':'no');
        update_option('g8_gold_product_short_desc_enabled', $g8_gold_product_short_desc_enabled?'yes':'no');
        update_option('g8_gold_product_regular_price_enabled', $g8_gold_product_regular_price_enabled?'yes':'no');
        update_option('g8_gold_product_sale_price_enabled', $g8_gold_product_sale_price_enabled?'yes':'no');
        update_option('g8_gold_product_cats_enabled', $g8_gold_product_cats_enabled?'yes':'no');
        update_option('g8_gold_product_tags_enabled', $g8_gold_product_tags_enabled?'yes':'no');
        update_option('g8_gold_product_image_enabled', $g8_gold_product_image_enabled?'yes':'no');
        update_option('g8_gold_product_image_gallery_enabled', $g8_gold_product_image_gallery_enabled?'yes':'no');
        update_option('g8_gold_product_1_attribute_enabled', $g8_gold_product_1_attribute_enabled);
        update_option('g8_gold_product_2_attribute_enabled', $g8_gold_product_2_attribute_enabled);
        update_option('g8_gold_product_3_attribute_enabled', $g8_gold_product_3_attribute_enabled);
        update_option('g8_gold_product_custom_taxonomy_1_id', $g8_gold_product_custom_taxonomy_1_id);
        update_option('g8_gold_product_custom_taxonomy_1_title', $g8_gold_product_custom_taxonomy_1_title);
        update_option('g8_gold_product_custom_taxonomy_2_id', $g8_gold_product_custom_taxonomy_2_id);
        update_option('g8_gold_product_custom_taxonomy_2_title', $g8_gold_product_custom_taxonomy_2_title);
        update_option('g8_gold_product_custom_taxonomy_3_id', $g8_gold_product_custom_taxonomy_3_id);
        update_option('g8_gold_product_custom_taxonomy_3_title', $g8_gold_product_custom_taxonomy_3_title);
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) {
            $g8_gold_product_custom_attr = sanitize_text_field($_POST['g8_gold_product_'.$key.'_attribute_enabled']);
            update_option('g8_gold_product_'.$key.'_attribute_enabled', $g8_gold_product_custom_attr?'yes':'no');
        }
        header("Location: admin.php?page=ge-gold-product-setttings");
        exit;
    } else {
        wp_die(__('Invalid nonce specified', 'ge-gold-product-setttings'), __('Error', 'ge-gold-product-setttings'), array(
                    'response' 	=> 403,
                    'back_link' => 'admin.php?page=ge-gold-product-setttings',

            ));
    }
}

add_shortcode('g8_gold_product_new', 'g8_gold_product_new_handler');
function g8_gold_product_new_handler($atts)
{
    $header_html       = '';
    $notice_html       = '';
    $input_fields_html = '';
    $footer_html       = '';
    $custom_field_1 =  get_option('g8_gold_product_custom_taxonomy_1_id');
    $custom_field_2 =  get_option('g8_gold_product_custom_taxonomy_2_id');
    $custom_field_3 =  get_option('g8_gold_product_custom_taxonomy_3_id');

    $args = array(
            'title'             => isset($_REQUEST['g8_add_new_gold_product_title'])         ? $_REQUEST['g8_add_new_gold_product_title']         : '',
            'desc'              => isset($_REQUEST['g8_add_new_gold_product_desc'])          ? $_REQUEST['g8_add_new_gold_product_desc']          : '',
            'short_desc'        => isset($_REQUEST['g8_add_new_gold_product_short_desc'])    ? $_REQUEST['g8_add_new_gold_product_short_desc']    : '',
            'image'             => isset($_FILES['g8_add_new_gold_product_image'])           ? $_FILES['g8_add_new_gold_product_image']           : '',
            'regular_price'     => isset($_REQUEST['g8_add_new_gold_product_regular_price']) ? $_REQUEST['g8_add_new_gold_product_regular_price'] : '',
            'sale_price'        => isset($_REQUEST['g8_add_new_gold_product_sale_price'])    ? $_REQUEST['g8_add_new_gold_product_sale_price']    : '',
            'cats'              => isset($_REQUEST['tax_input']['product_cat'])          ? $_REQUEST['tax_input']['product_cat']          : array(),
            'tags'              => isset($_REQUEST['g8_add_new_product_g8_gold_product_tags'])          ? $_REQUEST['g8_add_new_gold_product_g8_gold_product_tags']          : array(),
            $custom_field_1 => isset($_REQUEST[$custom_field_1])? $_REQUEST[$custom_field_1] : '',
            $custom_field_2 => isset($_REQUEST[$custom_field_2])? $_REQUEST[$custom_field_2] : '',
            $custom_field_3 => isset($_REQUEST[$custom_field_3])? $_REQUEST[$custom_field_3] : '',
            
      );
    $get_attrubute=g8_get_attributes();
    if (isset($_REQUEST['tax_input'])) {
        foreach ($get_attrubute as $key => $value) {
            // $args+=array($key=> implode("|",$_REQUEST['tax_input']['pa_'.$key]));
            $args+=array($key."_array"=> $_REQUEST['tax_input']['pa_'.$key]);
        }
    }
    if (isset($_REQUEST['g8_gold_new_product'])) {
        $result = g8_add_new_product($args, [$custom_field_1,$custom_field_2,$custom_field_3]);
        if (0 == $result) {
            // Error
            $notice_html .= '<div class="woocommerce"><ul class="woocommerce-error"><li>' . __('Error!', 'g8-product-plugin') . '</li></ul></div>';
        } else {
            // Success
            $notice_html .= '<div class="woocommerce"><div class="woocommerce-message">' .
                            str_replace(
                                '%product_title%',
                                $args['title'],
                                get_option('g8_product_by_user_message_product_successfully_added', __('"%product_title%" successfully added!', 'g8-product-plugin'))
                            ) .
                            '</div></div>';
        }
    }

    $header_html .= '<h3>';
    $header_html .=  __('Add Gold Product', 'g8-product-plugin');
    $header_html .= '</h3>';
    $header_html .= '<form method="post" action="' . remove_query_arg(array( 'g8_edit_product_image_delete', 'g8_delete_product' )) .
            '" enctype="multipart/form-data">';

    $table_data = array();
    $input_style = 'width:100%;';
    $table_data[] = array(
            '<label for="g8_add_new_gold_product_title">' . __('Title', 'g8-product-plugin')  . '</label>',
            '<input required type="text" style="' . $input_style . '" id="g8_add_new_gold_product_title" name="g8_add_new_gold_product_title" value="">'
        );
    if ('yes' === get_option('g8_gold_product_desc_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_desc">' . __('Description', 'g8-product-plugin') . '</label>',
                '<textarea' . ' style="' . $input_style . '" id="g8_add_new_gold_product_desc" name="g8_add_new_gold_product_desc">'. '</textarea>'
            );
    }
    if ('yes' === get_option('g8_gold_product_short_desc_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_short_desc">' . __('Short Description', 'g8-product-plugin') . '</label>',
                '<textarea' . ' style="' . $input_style . '" id="g8_add_new_gold_product_short_desc" name="g8_add_new_gold_product_short_desc">'. '</textarea>'
            );
    }
    if ('yes' === get_option('g8_gold_product_image_enabled')) {
        $new_image_field = '<input' . ' type="file" id="g8_add_new_gold_product_image" name="g8_add_new_gold_product_image" accept="image/*">';
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_image">' . __('Image', 'g8-product-plugin') . '</label>',
                $new_image_field
            );
    }
    if ('yes' === get_option('g8_gold_product_image_gallery_enabled')) {
        $new_image_field = '<input type="file" name="my_file_upload[]" multiple="multiple" >';
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_image_gallery">' . __('Image Gallery', 'g8-product-plugin') . '</label>',
                $new_image_field
            );
    }
    if ('yes' === get_option('g8_gold_product_regular_price_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_regular_price">' . __('Regular Price', 'g8-product-plugin') . '</label>',
                '<input' . ' type="number" min="0" id="g8_add_new_gold_product_regular_price" name="g8_add_new_gold_product_regular_price" value="">'
            );
    }
    if ('yes' === get_option('g8_gold_product_sale_price_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_sale_price">' . __('Sale Price', 'g8-product-plugin') . '</label>',
                '<input' . ' type="number" min="0" id="g8_add_new_gold_product_sale_price" name="g8_add_new_gold_product_sale_price" value="">'
            );
    }

    if (!empty(get_option('g8_gold_product_custom_taxonomy_1_id'))&& !empty(get_option('g8_gold_product_custom_taxonomy_1_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_sale_price">' . __(get_option('g8_gold_product_custom_taxonomy_1_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_gold_product_custom_taxonomy_1_id').'" name="'.get_option('g8_gold_product_custom_taxonomy_1_id').'" value="">'
            );
    }
    if (!empty(get_option('g8_gold_product_custom_taxonomy_2_id'))&& !empty(get_option('g8_gold_product_custom_taxonomy_2_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_sale_price">' . __(get_option('g8_gold_product_custom_taxonomy_2_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_gold_product_custom_taxonomy_2_id').'" name="'.get_option('g8_gold_product_custom_taxonomy_2_id').'" value="">'
            );
    }
    if (!empty(get_option('g8_gold_product_custom_taxonomy_3_id'))&& !empty(get_option('g8_gold_product_custom_taxonomy_3_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_sale_price">' . __(get_option('g8_gold_product_custom_taxonomy_3_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_gold_product_custom_taxonomy_3_id').'" name="'.get_option('g8_gold_product_custom_taxonomy_3_id').'" value="">'
            );
    }
    if ('yes' === get_option('g8_gold_product_cats_enabled')) {
        if (! function_exists('wp_category_checklist')) {
            include ABSPATH . 'wp-admin/includes/template.php';
        }
        $table_data[] = array(
                '<label for="g8_add_new_gold_product_desc">' . __('Category', 'g8-product-plugin') . '</label>',
               '<ul class="g8_product_cat">' .g8_product_checkList().'</ul>'
            );
    }
    $get_attrubute=g8_get_attributes();
    $g8_product_attributes=g8_product_attributes();
    foreach ($get_attrubute as $key => $value) {
        if ($key == get_option('g8_gold_product_1_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
        if ($key == get_option('g8_gold_product_2_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
        if ($key == get_option('g8_gold_product_3_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
    }
    // echo '<pre>';
    // $attr_get=g8_product_attributes();
    // print_r($attr_get['color']);
    // echo '</pre>';
    // $table_data[]= g8_product_attributes();
    // $table_data = maybe_add_taxonomy_field(
    //     $atts,
    //     $args,
    //     'g8_gold_product_cats',
    //     'product_cat',
    //     __('Categories', 'g8-product-plugin'),
    //     $input_style,
    //     $required_mark_html_template,
    //     $table_data
    // );
    $table_data = maybe_add_taxonomy_field(
        $atts,
        $args,
        'g8_gold_product_tags',
        'product_tag',
        __('Tags', 'g8-product-plugin'),
        $input_style,
        $required_mark_html_template,
        $table_data
    );

    $input_fields_html .= g8_get_table_html($table_data, array( 'table_class' => 'widefat', 'table_heading_type' => 'vertical', ));

    $footer_html .= '<input type="submit" class="button" name="g8_gold_new_product" value="' .
            __('Add', 'g8-product-plugin'). '">';
    $footer_html .= '</form>';

    return $notice_html . $header_html . $input_fields_html . $footer_html;
}


function maybe_add_taxonomy_field($atts, $args, $option_id, $taxonomy_id, $title, $input_style, $required_mark_html_template, $table_data)
{
    if ('yes' === get_option($option_id . '_enabled')) {
        $product_taxonomies = get_terms($taxonomy_id, 'orderby=name&hide_empty=0');
        if (is_wp_error($product_taxonomies)) {
            return $table_data;
        }
        $product_taxonomies_as_select_options = '';
        foreach ($product_taxonomies as $product_taxonomy) {
            $selected = '';
            if (! empty($current_product_taxonomies)) {
                foreach ($current_product_taxonomies as $current_product_taxonomy) {
                    if (is_object($current_product_taxonomy)) {
                        $current_product_taxonomy = $current_product_taxonomy->slug;
                    }
                    $selected .= selected($current_product_taxonomy, $product_taxonomy->slug, false);
                }
            }
            $product_taxonomies_as_select_options .= '<option value="' . $product_taxonomy->slug . '" ' . $selected . '>' . $product_taxonomy->name . '</option>';
        }
        $table_data[] = array(
         '<label for="g8_add_new_gold_product_' . $option_id . '">' . $title . $required_mark_html . '</label>',
         '<select' . $required_html . ' multiple style="' . $input_style . '" id="g8_add_new_product_' . $option_id . '" name="g8_add_new_gold_product_' . $option_id . '[]">' .
            $product_taxonomies_as_select_options .
         '</select>'
      );
    }
    return $table_data;
}



// Diamond shortcode

function ge_diamond_product_setttings_handler()
{
    if (current_user_can('edit_users')) {
        $g8_diamond_settings_form_nonce = wp_create_nonce('g8_diamond_settings_form_nonce'); ?>
<div class="wrap woocommerce">
    <form method="post" id="mainform"
        action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
        enctype="multipart/form-data">

        <h2>Diamond Product Settings</h2>
        <div id="g8_diamond_product_module_options-description">
            <div style="padding: 15px;background-color: #ffffff;color: #000000">Use
                <strong>[g8_diamond_product_new]</strong> shortcode to add diamond product from frontend.
            </div>
        </div>
        <h2>Options</h2>
        <div id="g8_diamond_product_options-description">
            <p><em>Title</em> field is always enabled and required.</p>
        </div>
        <table class="form-table">
            <tbody>
                <tr valign="top" class="">
                    <th scope="row" class="titledesc">Add Fields</th>
                    <td class="forminp forminp-checkbox">
                        <fieldset>
                            <label for="g8_diamond_product_desc_enabled">
                                <input name="g8_diamond_product_desc_enabled" id="g8_diamond_product_desc_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_diamond_product_desc_enabled')==='yes'?'checked=checked':''); ?>>
                                Description </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_short_desc_enabled">
                                <input name="g8_diamond_product_short_desc_enabled"
                                    id="g8_diamond_product_short_desc_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_diamond_product_short_desc_enabled')==='yes'?'checked=checked':''); ?>>
                                Short Description </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_regular_price_enabled">
                                <input name="g8_diamond_product_regular_price_enabled"
                                    id="g8_diamond_product_regular_price_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_diamond_product_regular_price_enabled')==='yes'?'checked=checked':''); ?>>
                                Regular Price </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_sale_price_enabled">
                                <input name="g8_diamond_product_sale_price_enabled"
                                    id="g8_diamond_product_sale_price_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_diamond_product_sale_price_enabled')==='yes'?'checked=checked':''); ?>>
                                Sale Price </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_cats_enabled">
                                <input name="g8_diamond_product_cats_enabled" id="g8_diamond_product_cats_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_diamond_product_cats_enabled')==='yes'?'checked=checked':''); ?>>
                                Categories </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_tags_enabled">
                                <input name="g8_diamond_product_tags_enabled" id="g8_diamond_product_tags_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_diamond_product_tags_enabled')==='yes'?'checked=checked':''); ?>>
                                Tags </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_image_enabled">
                                <input name="g8_diamond_product_image_enabled" id="g8_diamond_product_image_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_diamond_product_image_enabled')==='yes'?'checked=checked':''); ?>>
                                Image </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_diamond_product_image_gallery_enabled">
                                <input name="g8_diamond_product_image_gallery_enabled"
                                    id="g8_diamond_product_image_gallery_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_diamond_product_image_gallery_enabled')==='yes'?'checked=checked':''); ?>>
                                Image Gallery </label>
                        </fieldset>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 1</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_diamond_product_1_attribute_enabled"
                            id="g8_diamond_product_1_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_1=get_option('g8_diamond_product_1_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <i>
                                </i>
                                <!-- %pcs-comment-start#<?php if ($attribute_1==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 2</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_diamond_product_2_attribute_enabled"
                            id="g8_diamond_product_2_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_2=get_option('g8_diamond_product_2_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <i>
                                </i>
                                <!-- %pcs-comment-start#<?php if ($attribute_2==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 3</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_diamond_product_3_attribute_enabled"
                            id="g8_diamond_product_3_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_3=get_option('g8_diamond_product_3_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <i>
                                </i>
                                <!-- %pcs-comment-start#<?php if ($attribute_3==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 1</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_diamond_product_custom_taxonomy_1_id"
                            id="g8_diamond_product_custom_taxonomy_1_id" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_diamond_product_custom_taxonomy_1_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_diamond_product_custom_taxonomy_1_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_diamond_product_custom_taxonomy_1_title"
                            id="g8_diamond_product_custom_taxonomy_1_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_diamond_product_custom_taxonomy_1_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 2</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_diamond_product_custom_taxonomy_2_id"
                            id="g8_diamond_product_custom_taxonomy_2_id" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_diamond_product_custom_taxonomy_2_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_diamond_product_custom_taxonomy_2_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_diamond_product_custom_taxonomy_2_title"
                            id="g8_diamond_product_custom_taxonomy_2_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_diamond_product_custom_taxonomy_2_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 3</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_diamond_product_custom_taxonomy_3_id"
                            id="g8_diamond_product_custom_taxonomy_3_id" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_diamond_product_custom_taxonomy_3_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_diamond_product_custom_taxonomy_3_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_diamond_product_custom_taxonomy_3_title"
                            id="g8_diamond_product_custom_taxonomy_3_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_diamond_product_custom_taxonomy_3_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <button name="save" class="button-primary woocommerce-save-button" type="submit" value="Save changes">Save
                changes</button>
            <input type="hidden" value="g8_diamond_settings_action" name="action">
            <input type="hidden" name="g8_diamond_settings_form_nonce"
                value="<?php echo $g8_diamond_settings_form_nonce ?>" />
        </p>
    </form>
</div>
<?php
    }
}

add_action('admin_post_g8_diamond_settings_action', 'save_g8_diamond_settings');

function save_g8_diamond_settings()
{
    if (isset($_POST['g8_diamond_settings_form_nonce']) && wp_verify_nonce($_POST['g8_diamond_settings_form_nonce'], 'g8_diamond_settings_form_nonce')) {

        // sanitize the input
        $g8_diamond_product_desc_enabled = sanitize_text_field($_POST['g8_diamond_product_desc_enabled']);
        $g8_diamond_product_short_desc_enabled = sanitize_text_field($_POST['g8_diamond_product_short_desc_enabled']);
        $g8_diamond_product_regular_price_enabled = sanitize_text_field($_POST['g8_diamond_product_regular_price_enabled']);
        $g8_diamond_product_sale_price_enabled = sanitize_text_field($_POST['g8_diamond_product_sale_price_enabled']);
        $g8_diamond_product_cats_enabled = sanitize_text_field($_POST['g8_diamond_product_cats_enabled']);
        $g8_diamond_product_tags_enabled = sanitize_text_field($_POST['g8_diamond_product_tags_enabled']);
        $g8_diamond_product_image_enabled = sanitize_text_field($_POST['g8_diamond_product_image_enabled']);
        $g8_diamond_product_image_gallery_enabled = sanitize_text_field($_POST['g8_diamond_product_image_gallery_enabled']);
        $g8_diamond_product_1_attribute_enabled = sanitize_text_field($_POST['g8_diamond_product_1_attribute_enabled']);
        $g8_diamond_product_2_attribute_enabled = sanitize_text_field($_POST['g8_diamond_product_2_attribute_enabled']);
        $g8_diamond_product_3_attribute_enabled = sanitize_text_field($_POST['g8_diamond_product_3_attribute_enabled']);
        $g8_diamond_product_custom_taxonomy_1_id = sanitize_text_field($_POST['g8_diamond_product_custom_taxonomy_1_id']);
        $g8_diamond_product_custom_taxonomy_1_title = sanitize_text_field($_POST['g8_diamond_product_custom_taxonomy_1_title']);
        $g8_diamond_product_custom_taxonomy_2_id = sanitize_text_field($_POST['g8_diamond_product_custom_taxonomy_2_id']);
        $g8_diamond_product_custom_taxonomy_2_title = sanitize_text_field($_POST['g8_diamond_product_custom_taxonomy_2_title']);
        $g8_diamond_product_custom_taxonomy_3_id = sanitize_text_field($_POST['g8_diamond_product_custom_taxonomy_3_id']);
        $g8_diamond_product_custom_taxonomy_3_title = sanitize_text_field($_POST['g8_diamond_product_custom_taxonomy_3_title']);

        // do the processing
        update_option('g8_diamond_product_desc_enabled', $g8_diamond_product_desc_enabled?'yes':'no');
        update_option('g8_diamond_product_short_desc_enabled', $g8_diamond_product_short_desc_enabled?'yes':'no');
        update_option('g8_diamond_product_regular_price_enabled', $g8_diamond_product_regular_price_enabled?'yes':'no');
        update_option('g8_diamond_product_sale_price_enabled', $g8_diamond_product_sale_price_enabled?'yes':'no');
        update_option('g8_diamond_product_cats_enabled', $g8_diamond_product_cats_enabled?'yes':'no');
        update_option('g8_diamond_product_tags_enabled', $g8_diamond_product_tags_enabled?'yes':'no');
        update_option('g8_diamond_product_image_enabled', $g8_diamond_product_image_enabled?'yes':'no');
        update_option('g8_diamond_product_image_gallery_enabled', $g8_diamond_product_image_gallery_enabled?'yes':'no');
        update_option('g8_diamond_product_1_attribute_enabled', $g8_diamond_product_1_attribute_enabled);
        update_option('g8_diamond_product_2_attribute_enabled', $g8_diamond_product_2_attribute_enabled);
        update_option('g8_diamond_product_3_attribute_enabled', $g8_diamond_product_3_attribute_enabled);
        update_option('g8_diamond_product_custom_taxonomy_1_id', $g8_diamond_product_custom_taxonomy_1_id);
        update_option('g8_diamond_product_custom_taxonomy_1_title', $g8_diamond_product_custom_taxonomy_1_title);
        update_option('g8_diamond_product_custom_taxonomy_2_id', $g8_diamond_product_custom_taxonomy_2_id);
        update_option('g8_diamond_product_custom_taxonomy_2_title', $g8_diamond_product_custom_taxonomy_2_title);
        update_option('g8_diamond_product_custom_taxonomy_3_id', $g8_diamond_product_custom_taxonomy_3_id);
        update_option('g8_diamond_product_custom_taxonomy_3_title', $g8_diamond_product_custom_taxonomy_3_title);
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) {
            $g8_diamond_product_custom_attr = sanitize_text_field($_POST['g8_diamond_product_'.$key.'_attribute_enabled']);
            update_option('g8_diamond_product_'.$key.'_attribute_enabled', $g8_diamond_product_custom_attr?'yes':'no');
        }

        header("Location: admin.php?page=ge-diamond-product-setttings");
        exit;
    } else {
        wp_die(__('Invalid nonce specified', 'ge-diamond-product-setttings'), __('Error', 'ge-diamond-product-setttings'), array(
                    'response' 	=> 403,
                    'back_link' => 'admin.php?page=ge-diamond-product-setttings',

            ));
    }
}

add_shortcode('g8_diamond_product_new', 'g8_diamond_product_new_handler');
function g8_diamond_product_new_handler($atts)
{
    $header_html       = '';
    $notice_html       = '';
    $input_fields_html = '';
    $footer_html       = '';
    $custom_field_1 =  get_option('g8_diamond_product_custom_taxonomy_1_id');
    $custom_field_2 =  get_option('g8_diamond_product_custom_taxonomy_2_id');
    $custom_field_3 =  get_option('g8_diamond_product_custom_taxonomy_3_id');

    $args = array(
            'title'             => isset($_REQUEST['g8_add_new_diamond_product_title'])         ? $_REQUEST['g8_add_new_diamond_product_title']         : '',
            'desc'              => isset($_REQUEST['g8_add_new_diamond_product_desc'])          ? $_REQUEST['g8_add_new_diamond_product_desc']          : '',
            'short_desc'        => isset($_REQUEST['g8_diamond_product_short_desc_enabled'])    ? $_REQUEST['g8_diamond_product_short_desc_enabled']    : '',
            'regular_price'     => isset($_REQUEST['g8_add_new_diamond_product_regular_price']) ? $_REQUEST['g8_add_new_diamond_product_regular_price'] : '',
            'image'             => isset($_FILES['g8_add_new_diamond_product_image'])           ? $_FILES['g8_add_new_diamond_product_image']           : '',
            'sale_price'        => isset($_REQUEST['g8_diamond_product_sale_price_enabled'])    ? $_REQUEST['g8_diamond_product_sale_price_enabled']    : '',
            'cats'              => isset($_REQUEST['tax_input']['product_cat'])          ? $_REQUEST['tax_input']['product_cat']          : array(),
            'tags'              => isset($_REQUEST['g8_add_new_product_g8_diamond_product_tags'])          ? $_REQUEST['g8_add_new_diamond_product_g8_diamond_product_tags']          : array(),
            $custom_field_1 => isset($_REQUEST[$custom_field_1])? $_REQUEST[$custom_field_1] : '',
            $custom_field_2 => isset($_REQUEST[$custom_field_2])? $_REQUEST[$custom_field_2] : '',
            $custom_field_3 => isset($_REQUEST[$custom_field_3])? $_REQUEST[$custom_field_3] : '',
      );
    $get_attrubute=g8_get_attributes();
    if (isset($_REQUEST['tax_input'])) {
        foreach ($get_attrubute as $key => $value) {
            // $args+=array($key=> implode("|",$_REQUEST['tax_input']['pa_'.$key]));
            $args+=array($key."_array"=> $_REQUEST['tax_input']['pa_'.$key]);
        }
    }

    if (isset($_REQUEST['g8_diamond_new_product'])) {
        $result = g8_add_new_product($args, [$custom_field_1,$custom_field_2,$custom_field_3]);
        if (0 == $result) {
            // Error
            $notice_html .= '<div class="woocommerce"><ul class="woocommerce-error"><li>' . __('Error!', 'g8-product-plugin') . '</li></ul></div>';
        } else {
            // Success
            $notice_html .= '<div class="woocommerce"><div class="woocommerce-message">' .
                        str_replace(
                            '%product_title%',
                            $args['title'],
                            get_option('g8_product_by_user_message_product_successfully_added', __('"%product_title%" successfully added!', 'g8-product-plugin'))
                        ) .
                        '</div></div>';
        }
    }

    $header_html .= '<h3>';
    $header_html .=  __('Add Diamond Product', 'g8-product-plugin');
    $header_html .= '</h3>';
    $header_html .= '<form method="post" action="' . remove_query_arg(array( 'g8_edit_product_image_delete', 'g8_delete_product' )) .
            '" enctype="multipart/form-data">';

    $table_data = array();
    $input_style = 'width:100%;';
    $table_data[] = array(
            '<label for="g8_add_new_diamond_product_title">' . __('Title', 'g8-product-plugin')  . '</label>',
            '<input required type="text" style="' . $input_style . '" id="g8_add_new_diamond_product_title" name="g8_add_new_diamond_product_title" value="">'
        );
    if ('yes' === get_option('g8_diamond_product_desc_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_desc">' . __('Description', 'g8-product-plugin') . '</label>',
                '<textarea' . ' style="' . $input_style . '" id="g8_add_new_diamond_product_desc" name="g8_add_new_diamond_product_desc">'. '</textarea>'
            );
    }
    if ('yes' === get_option('g8_diamond_product_short_desc_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_short_desc">' . __('Short Description', 'g8-product-plugin') . '</label>',
                '<textarea' . ' style="' . $input_style . '" id="g8_add_new_diamond_product_short_desc" name="g8_add_new_diamond_product_short_desc">'. '</textarea>'
            );
    }

    if ('yes' === get_option('g8_diamond_product_image_enabled')) {
        $new_image_field = '<input' . ' type="file" id="g8_add_new_diamond_product_image" name="g8_add_new_diamond_product_image" accept="image/*">';
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_image">' . __('Image', 'g8-product-plugin') . '</label>',
                $new_image_field
            );
    }
    if ('yes' === get_option('g8_diamond_product_image_gallery_enabled')) {
        $new_image_field = '<input type="file" name="my_file_upload[]" multiple="multiple" >';
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_image_gallery">' . __('Image Gallery', 'g8-product-plugin') . '</label>',
                $new_image_field
            );
    }
    
    if ('yes' === get_option('g8_diamond_product_regular_price_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_regular_price">' . __('Regular Price', 'g8-product-plugin') . '</label>',
                '<input' . ' type="number" min="0" id="g8_add_new_diamond_product_regular_price" name="g8_add_new_diamond_product_regular_price" value="">'
            );
    }
    if ('yes' === get_option('g8_diamond_product_sale_price_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_sale_price">' . __('Sale Price', 'g8-product-plugin') . '</label>',
                '<input' . ' type="number" min="0" id="g8_add_new_diamond_product_regular_price" name="g8_add_new_diamond_product_regular_price" value="">'
            );
    }
    if (!empty(get_option('g8_diamond_product_custom_taxonomy_1_id'))&& !empty(get_option('g8_diamond_product_custom_taxonomy_1_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_sale_price">' . __(get_option('g8_diamond_product_custom_taxonomy_1_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_diamond_product_custom_taxonomy_1_id').'" name="'.get_option('g8_diamond_product_custom_taxonomy_1_id').'" value="">'
            );
    }
    if (!empty(get_option('g8_diamond_product_custom_taxonomy_2_id'))&& !empty(get_option('g8_diamond_product_custom_taxonomy_2_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_sale_price">' . __(get_option('g8_diamond_product_custom_taxonomy_2_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_diamond_product_custom_taxonomy_2_id').'" name="'.get_option('g8_diamond_product_custom_taxonomy_2_id').'" value="">'
            );
    }
    if (!empty(get_option('g8_diamond_product_custom_taxonomy_3_id'))&& !empty(get_option('g8_diamond_product_custom_taxonomy_3_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_sale_price">' . __(get_option('g8_diamond_product_custom_taxonomy_3_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_diamond_product_custom_taxonomy_3_id').'" name="'.get_option('g8_diamond_product_custom_taxonomy_3_id').'" value="">'
            );
    }
    if ('yes' === get_option('g8_diamond_product_cats_enabled')) {
        if (! function_exists('wp_category_checklist')) {
            include ABSPATH . 'wp-admin/includes/template.php';
        }
        $table_data[] = array(
                '<label for="g8_add_new_diamond_product_desc">' . __('Category', 'g8-product-plugin') . '</label>',
               '<ul class="g8_product_cat">' .g8_product_checkList().'</ul>'
            );
    }

    $get_attrubute=g8_get_attributes();
    $g8_product_attributes=g8_product_attributes();
    foreach ($get_attrubute as $key => $value) {
        if ($key == get_option('g8_diamond_product_1_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
        if ($key == get_option('g8_diamond_product_2_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
        if ($key == get_option('g8_diamond_product_3_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
    }
    // $table_data = maybe_add_taxonomy_field(
    //     $atts,
    //     $args,
    //     'g8_diamond_product_cats',
    //     'product_cat',
    //     __('Categories', 'g8-product-plugin'),
    //     $input_style,
    //     $required_mark_html_template,
    //     $table_data
    // );
    $table_data = maybe_add_taxonomy_field(
        $atts,
        $args,
        'g8_diamond_product_tags',
        'product_tag',
        __('Tags', 'g8-product-plugin'),
        $input_style,
        $required_mark_html_template,
        $table_data
    );

    $input_fields_html .= g8_get_table_html($table_data, array( 'table_class' => 'widefat', 'table_heading_type' => 'vertical', ));

    $footer_html .= '<input type="submit" class="button" name="g8_diamond_new_product" value="' .
            __('Add', 'g8-product-plugin'). '">';
    $footer_html .= '</form>';

    return $notice_html . $header_html . $input_fields_html . $footer_html;
}
// Watch shortcode

function ge_watch_product_setttings_handler()
{
    if (current_user_can('edit_users')) {
        $g8_watch_settings_form_nonce = wp_create_nonce('g8_watch_settings_form_nonce'); ?>
<div class="wrap woocommerce">
    <form method="post" id="mainform"
        action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
        enctype="multipart/form-data">

        <h2>Watch Product Settings</h2>
        <div id="g8_watch_product_module_options-description">
            <div style="padding: 15px;background-color: #ffffff;color: #000000">Use
                <strong>[g8_watch_product_new]</strong>
                shortcode to add watch product from frontend.
            </div>
        </div>
        <h2>Options</h2>
        <div id="g8_watch_product_options-description">
            <p><em>Title</em> field is always enabled and required.</p>
        </div>
        <table class="form-table">
            <tbody>
                <tr valign="top" class="">
                    <th scope="row" class="titledesc">Add Fields</th>
                    <td class="forminp forminp-checkbox">
                        <fieldset>
                            <label for="g8_watch_product_desc_enabled">
                                <input name="g8_watch_product_desc_enabled" id="g8_watch_product_desc_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_watch_product_desc_enabled')==='yes'?'checked=checked':''); ?>>
                                Description </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_short_desc_enabled">
                                <input name="g8_watch_product_short_desc_enabled"
                                    id="g8_watch_product_short_desc_enabled" type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_watch_product_short_desc_enabled')==='yes'?'checked=checked':''); ?>>
                                Short Description </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_regular_price_enabled">
                                <input name="g8_watch_product_regular_price_enabled"
                                    id="g8_watch_product_regular_price_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_watch_product_regular_price_enabled')==='yes'?'checked=checked':''); ?>>
                                Regular Price </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_sale_price_enabled">
                                <input name="g8_watch_product_sale_price_enabled"
                                    id="g8_watch_product_sale_price_enabled" type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_watch_product_sale_price_enabled')==='yes'?'checked=checked':''); ?>>
                                Sale Price </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_cats_enabled">
                                <input name="g8_watch_product_cats_enabled" id="g8_watch_product_cats_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_watch_product_cats_enabled')==='yes'?'checked=checked':''); ?>>
                                Categories </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_tags_enabled">
                                <input name="g8_watch_product_tags_enabled" id="g8_watch_product_tags_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_watch_product_tags_enabled')==='yes'?'checked=checked':''); ?>>
                                Tags </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_image_enabled">
                                <input name="g8_watch_product_image_enabled" id="g8_watch_product_image_enabled"
                                    type="checkbox" class="" value="1" <?php echo esc_attr(get_option('g8_watch_product_image_enabled')==='yes'?'checked=checked':''); ?>>
                                Image </label>
                        </fieldset>
                        <fieldset class="">
                            <label for="g8_watch_product_image_gallery_enabled">
                                <input name="g8_watch_product_image_gallery_enabled"
                                    id="g8_watch_product_image_gallery_enabled" type="checkbox" class="" value="1"
                                    <?php echo esc_attr(get_option('g8_watch_product_image_gallery_enabled')==='yes'?'checked=checked':''); ?>>
                                Image Gallery </label>
                        </fieldset>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 1</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_watch_product_1_attribute_enabled" id="g8_watch_product_1_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_1=get_option('g8_watch_product_1_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <i>
                                </i>
                                <!-- %pcs-comment-start#<?php if ($attribute_1==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 2</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_watch_product_2_attribute_enabled" id="g8_watch_product_2_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_2=get_option('g8_watch_product_2_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <i>
                                </i>
                                <!-- %pcs-comment-start#<?php if ($attribute_2==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Attribute 3</label>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="g8_watch_product_3_attribute_enabled" id="g8_watch_product_3_attribute_enabled">
                            <option value="">Select Attribute</option>
                            <?php
                                $attribute_3=get_option('g8_watch_product_3_attribute_enabled');
        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) { ?>
                            <option value="<?php echo $key;?>" <i>
                                </i>
                                <!-- %pcs-comment-start#<?php if ($attribute_3==$key) {
            echo "selected";
        }?>><?php echo $key;?>
                            </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 1</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_watch_product_custom_taxonomy_1_id" id="g8_watch_product_custom_taxonomy_1_id"
                            type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_watch_product_custom_taxonomy_1_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_watch_product_custom_taxonomy_1_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_watch_product_custom_taxonomy_1_title"
                            id="g8_watch_product_custom_taxonomy_1_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_watch_product_custom_taxonomy_1_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 2</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_watch_product_custom_taxonomy_2_id" id="g8_watch_product_custom_taxonomy_2_id"
                            type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_watch_product_custom_taxonomy_2_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_watch_product_custom_taxonomy_2_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_watch_product_custom_taxonomy_2_title"
                            id="g8_watch_product_custom_taxonomy_2_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_watch_product_custom_taxonomy_2_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label> Custom Field 3</label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_watch_product_custom_taxonomy_3_id" id="g8_watch_product_custom_taxonomy_3_id"
                            type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_watch_product_custom_taxonomy_3_id')) ?>"
                            class="" placeholder=""> <span class="description">ID</span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="g8_watch_product_custom_taxonomy_3_title"> </label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="g8_watch_product_custom_taxonomy_3_title"
                            id="g8_watch_product_custom_taxonomy_3_title" type="text" style=""
                            value="<?php echo esc_attr(get_option('g8_watch_product_custom_taxonomy_3_title')) ?>"
                            class="" placeholder=""> <span class="description">Title</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <button name="save" class="button-primary woocommerce-save-button" type="submit" value="Save changes">Save
                changes</button>
            <input type="hidden" value="g8_watch_settings_action" name="action">
            <input type="hidden" name="g8_watch_settings_form_nonce"
                value="<?php echo $g8_watch_settings_form_nonce ?>" />
        </p>
    </form>
</div>
<?php
    }
}

add_action('admin_post_g8_watch_settings_action', 'save_g8_watch_settings');

function save_g8_watch_settings()
{
    if (isset($_POST['g8_watch_settings_form_nonce']) && wp_verify_nonce($_POST['g8_watch_settings_form_nonce'], 'g8_watch_settings_form_nonce')) {

        // sanitize the input
        $g8_watch_product_desc_enabled = sanitize_text_field($_POST['g8_watch_product_desc_enabled']);
        $g8_watch_product_short_desc_enabled = sanitize_text_field($_POST['g8_watch_product_short_desc_enabled']);
        $g8_watch_product_regular_price_enabled = sanitize_text_field($_POST['g8_watch_product_regular_price_enabled']);
        $g8_watch_product_sale_price_enabled = sanitize_text_field($_POST['g8_watch_product_sale_price_enabled']);
        $g8_watch_product_cats_enabled = sanitize_text_field($_POST['g8_watch_product_cats_enabled']);
        $g8_watch_product_tags_enabled = sanitize_text_field($_POST['g8_watch_product_tags_enabled']);
        $g8_watch_product_image_enabled = sanitize_text_field($_POST['g8_watch_product_image_enabled']);
        $g8_watch_product_image_gallery_enabled = sanitize_text_field($_POST['g8_watch_product_image_gallery_enabled']);
        $g8_watch_product_1_attribute_enabled = sanitize_text_field($_POST['g8_watch_product_1_attribute_enabled']);
        $g8_watch_product_2_attribute_enabled = sanitize_text_field($_POST['g8_watch_product_2_attribute_enabled']);
        $g8_watch_product_3_attribute_enabled = sanitize_text_field($_POST['g8_watch_product_3_attribute_enabled']);
        $g8_watch_product_custom_taxonomy_1_id = sanitize_text_field($_POST['g8_watch_product_custom_taxonomy_1_id']);
        $g8_watch_product_custom_taxonomy_1_title = sanitize_text_field($_POST['g8_watch_product_custom_taxonomy_1_title']);
        $g8_watch_product_custom_taxonomy_2_id = sanitize_text_field($_POST['g8_watch_product_custom_taxonomy_2_id']);
        $g8_watch_product_custom_taxonomy_2_title = sanitize_text_field($_POST['g8_watch_product_custom_taxonomy_2_title']);
        $g8_watch_product_custom_taxonomy_3_id = sanitize_text_field($_POST['g8_watch_product_custom_taxonomy_3_id']);
        $g8_watch_product_custom_taxonomy_3_title = sanitize_text_field($_POST['g8_watch_product_custom_taxonomy_3_title']);


        // do the processing
        update_option('g8_watch_product_desc_enabled', $g8_watch_product_desc_enabled?'yes':'no');
        update_option('g8_watch_product_short_desc_enabled', $g8_watch_product_short_desc_enabled?'yes':'no');
        update_option('g8_watch_product_regular_price_enabled', $g8_watch_product_regular_price_enabled?'yes':'no');
        update_option('g8_watch_product_sale_price_enabled', $g8_watch_product_sale_price_enabled?'yes':'no');
        update_option('g8_watch_product_cats_enabled', $g8_watch_product_cats_enabled?'yes':'no');
        update_option('g8_watch_product_tags_enabled', $g8_watch_product_tags_enabled?'yes':'no');
        update_option('g8_watch_product_image_enabled', $g8_watch_product_image_enabled?'yes':'no');
        update_option('g8_watch_product_image_gallery_enabled', $g8_watch_product_image_gallery_enabled?'yes':'no');
        update_option('g8_watch_product_1_attribute_enabled', $g8_watch_product_1_attribute_enabled);
        update_option('g8_watch_product_2_attribute_enabled', $g8_watch_product_2_attribute_enabled);
        update_option('g8_watch_product_3_attribute_enabled', $g8_watch_product_3_attribute_enabled);
        update_option('g8_watch_product_custom_taxonomy_1_id', $g8_watch_product_custom_taxonomy_1_id);
        update_option('g8_watch_product_custom_taxonomy_1_title', $g8_watch_product_custom_taxonomy_1_title);
        update_option('g8_watch_product_custom_taxonomy_2_id', $g8_watch_product_custom_taxonomy_2_id);
        update_option('g8_watch_product_custom_taxonomy_2_title', $g8_watch_product_custom_taxonomy_2_title);
        update_option('g8_watch_product_custom_taxonomy_3_id', $g8_watch_product_custom_taxonomy_3_id);
        update_option('g8_watch_product_custom_taxonomy_3_title', $g8_watch_product_custom_taxonomy_3_title);

        $get_attrubute=g8_get_attributes();
        foreach ($get_attrubute as $key => $value) {
            $g8_watch_product_custom_attr = sanitize_text_field($_POST['g8_watch_product_'.$key.'_attribute_enabled']);
            update_option('g8_watch_product_'.$key.'_attribute_enabled', $g8_watch_product_custom_attr?'yes':'no');
        }
        header("Location: admin.php?page=ge-watch-product-setttings");
        exit;
    } else {
        wp_die(__('Invalid nonce specified', 'ge-watch-product-setttings'), __('Error', 'ge-watch-product-setttings'), array(
                    'response' 	=> 403,
                    'back_link' => 'admin.php?page=ge-watch-product-setttings',

            ));
    }
}

add_shortcode('g8_watch_product_new', 'g8_watch_product_new_handler');
function g8_watch_product_new_handler($atts)
{
    $header_html       = '';
    $notice_html       = '';
    $input_fields_html = '';
    $footer_html       = '';
    $custom_field_1 =  get_option('g8_watch_product_custom_taxonomy_1_id');
    $custom_field_2 =  get_option('g8_watch_product_custom_taxonomy_2_id');
    $custom_field_3 =  get_option('g8_watch_product_custom_taxonomy_3_id');

    $args = array(
            'title'             => isset($_REQUEST['g8_add_new_watch_product_title'])         ? $_REQUEST['g8_add_new_watch_product_title']         : '',
            'desc'              => isset($_REQUEST['g8_add_new_watch_product_desc'])          ? $_REQUEST['g8_add_new_watch_product_desc']          : '',
            'short_desc'        => isset($_REQUEST['g8_watch_product_short_desc_enabled'])    ? $_REQUEST['g8_watch_product_short_desc_enabled']    : '',
            'image'             => isset($_FILES['g8_add_new_watch_product_image'])           ? $_FILES['g8_add_new_watch_product_image']           : '',
            'regular_price'     => isset($_REQUEST['g8_add_new_watch_product_regular_price']) ? $_REQUEST['g8_add_new_watch_product_regular_price'] : '',
            'sale_price'        => isset($_REQUEST['g8_watch_product_sale_price_enabled'])    ? $_REQUEST['g8_watch_product_sale_price_enabled']    : '',
            'cats'              => isset($_REQUEST['g8_add_new_product_g8_watch_product_cats'])          ? $_REQUEST['g8_add_new_watch_product_g8_watch_product_cats']          : array(),
            'tags'              => isset($_REQUEST['g8_add_new_product_g8_watch_product_tags'])          ? $_REQUEST['g8_add_new_watch_product_g8_watch_product_tags']          : array(),
            $custom_field_1 => isset($_REQUEST[$custom_field_1])? $_REQUEST[$custom_field_1] : '',
            $custom_field_2 => isset($_REQUEST[$custom_field_2])? $_REQUEST[$custom_field_2] : '',
            $custom_field_3 => isset($_REQUEST[$custom_field_3])? $_REQUEST[$custom_field_3] : '',
      );
    $get_attrubute=g8_get_attributes();
    if (isset($_REQUEST['tax_input'])) {
        foreach ($get_attrubute as $key => $value) {
            // $args+=array($key=> implode("|",$_REQUEST['tax_input']['pa_'.$key]));
            $args+=array($key."_array"=> $_REQUEST['tax_input']['pa_'.$key]);
        }
    }
    if (isset($_REQUEST['g8_watch_new_product'])) {
        $result = g8_add_new_product($args, [$custom_field_1,$custom_field_2,$custom_field_3]);
        if (0 == $result) {
            // Error
            $notice_html .= '<div class="woocommerce"><ul class="woocommerce-error"><li>' . __('Error!', 'g8-product-plugin') . '</li></ul></div>';
        } else {
            // Success
            $notice_html .= '<div class="woocommerce"><div class="woocommerce-message">' .
                            str_replace(
                                '%product_title%',
                                $args['title'],
                                get_option('g8_product_by_user_message_product_successfully_added', __('"%product_title%" successfully added!', 'g8-product-plugin'))
                            ) .
                            '</div></div>';
        }
    }

    $header_html .= '<h3>';
    $header_html .=  __('Add Watch Product', 'g8-product-plugin');
    $header_html .= '</h3>';
    $header_html .= '<form method="post" action="' . remove_query_arg(array( 'g8_edit_product_image_delete', 'g8_delete_product' )) .
            '" enctype="multipart/form-data">';

    $table_data = array();
    $input_style = 'width:100%;';
    $table_data[] = array(
            '<label for="g8_add_new_watch_product_title">' . __('Title', 'g8-product-plugin')  . '</label>',
            '<input required type="text" style="' . $input_style . '" id="g8_add_new_watch_product_title" name="g8_add_new_watch_product_title" value="">'
        );
    if ('yes' === get_option('g8_watch_product_desc_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_desc">' . __('Description', 'g8-product-plugin') . '</label>',
                '<textarea' . ' style="' . $input_style . '" id="g8_add_new_watch_product_desc" name="g8_add_new_watch_product_desc">'. '</textarea>'
            );
    }
    if ('yes' === get_option('g8_watch_product_short_desc_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_short_desc">' . __('Short Description', 'g8-product-plugin') . '</label>',
                '<textarea' . ' style="' . $input_style . '" id="g8_add_new_watch_product_short_desc" name="g8_add_new_watch_product_short_desc">'. '</textarea>'
            );
    }
    
    if ('yes' === get_option('g8_watch_product_image_enabled')) {
        $new_image_field = '<input' . ' type="file" id="g8_add_new_watch_product_image" name="g8_add_new_watch_product_image" accept="image/*">';
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_image">' . __('Image', 'g8-product-plugin') . '</label>',
                $new_image_field
            );
    }
    if ('yes' === get_option('g8_watch_product_image_gallery_enabled')) {
        $new_image_field = '<input type="file" name="my_file_upload[]" multiple="multiple" >';
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_image_gallery">' . __('Image Gallery', 'g8-product-plugin') . '</label>',
                $new_image_field
            );
    }
    if ('yes' === get_option('g8_watch_product_regular_price_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_regular_price">' . __('Regular Price', 'g8-product-plugin') . '</label>',
                '<input' . ' type="number" min="0" id="g8_add_new_watch_product_regular_price" name="g8_add_new_watch_product_regular_price" value="">'
            );
    }
    if ('yes' === get_option('g8_watch_product_sale_price_enabled')) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_sale_price">' . __('Sale Price', 'g8-product-plugin') . '</label>',
                '<input' . ' type="number" min="0" id="g8_add_new_watch_product_regular_price" name="g8_add_new_watch_product_regular_price" value="">'
            );
    }


    if (!empty(get_option('g8_watch_product_custom_taxonomy_1_id'))&& !empty(get_option('g8_watch_product_custom_taxonomy_1_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_sale_price">' . __(get_option('g8_watch_product_custom_taxonomy_1_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_watch_product_custom_taxonomy_1_id').'" name="'.get_option('g8_watch_product_custom_taxonomy_1_id').'" value="">'
            );
    }
    if (!empty(get_option('g8_watch_product_custom_taxonomy_2_id'))&& !empty(get_option('g8_watch_product_custom_taxonomy_2_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_sale_price">' . __(get_option('g8_watch_product_custom_taxonomy_2_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_watch_product_custom_taxonomy_2_id').'" name="'.get_option('g8_watch_product_custom_taxonomy_2_id').'" value="">'
            );
    }
    if (!empty(get_option('g8_watch_product_custom_taxonomy_3_id'))&& !empty(get_option('g8_watch_product_custom_taxonomy_3_title'))) {
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_sale_price">' . __(get_option('g8_watch_product_custom_taxonomy_3_title'), 'g8-product-plugin') . '</label>',
                '<input required type="text" style="' . $input_style . '" id="'.get_option('g8_watch_product_custom_taxonomy_3_id').'" name="'.get_option('g8_watch_product_custom_taxonomy_3_id').'" value="">'
            );
    }
  
    if ('yes' === get_option('g8_watch_product_cats_enabled')) {
        if (! function_exists('wp_category_checklist')) {
            include ABSPATH . 'wp-admin/includes/template.php';
        }
        $table_data[] = array(
                '<label for="g8_add_new_watch_product_desc">' . __('Category', 'g8-product-plugin') . '</label>',
               '<ul class="g8_product_cat">' .g8_product_checkList().'</ul>'
            );
    }
    $get_attrubute=g8_get_attributes();
    $g8_product_attributes=g8_product_attributes();
    foreach ($get_attrubute as $key => $value) {
        if ($key == get_option('g8_watch_product_1_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
        if ($key == get_option('g8_watch_product_2_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
        if ($key == get_option('g8_watch_product_3_attribute_enabled')) {
            foreach ($g8_product_attributes as $k => $v) {
                if ($key==$k) {
                    $table_data[]=$v;
                }
            }
        }
    }
    // $table_data = maybe_add_taxonomy_field(
    //     $atts,
    //     $args,
    //     'g8_watch_product_cats',
    //     'product_cat',
    //     __('Categories', 'g8-product-plugin'),
    //     $input_style,
    //     $required_mark_html_template,
    //     $table_data
    // );
    $table_data = maybe_add_taxonomy_field(
        $atts,
        $args,
        'g8_watch_product_tags',
        'product_tag',
        __('Tags', 'g8-product-plugin'),
        $input_style,
        $required_mark_html_template,
        $table_data
    );

    $input_fields_html .= g8_get_table_html($table_data, array( 'table_class' => 'widefat', 'table_heading_type' => 'vertical', ));

    $footer_html .= '<input type="submit" class="button" name="g8_watch_new_product" value="' .
            __('Add', 'g8-product-plugin'). '">';
    $footer_html .= '</form>';

    return $notice_html . $header_html . $input_fields_html . $footer_html;
}
/**
 * Save a new product attribute from his name (slug).
 *
 * @since 3.0.0
 * @param string $name  | The product attribute name (slug).
 * @param string $label | The product attribute label (name).
 */
function save_product_attribute_from_name($name, $label='', $set=true)
{
    if (! function_exists('get_attribute_id_from_name')) {
        return;
    }

    global $wpdb;

    $label = $label == '' ? ucfirst($name) : $label;
    $attribute_id = get_attribute_id_from_name($name);

    if (empty($attribute_id)) {
        $attribute_id = null;
    } else {
        $set = false;
    }
    $args = array(
        'attribute_id'      => $attribute_id,
        'attribute_name'    => $name,
        'attribute_label'   => $label,
        'attribute_type'    => 'select',
        'attribute_orderby' => 'menu_order',
        'attribute_public'  => 0,
    );


    if (empty($attribute_id)) {
        $wpdb->insert("{$wpdb->prefix}woocommerce_attribute_taxonomies", $args);
        set_transient('wc_attribute_taxonomies', false);
    }

    if ($set) {
        $attributes = wc_get_attribute_taxonomies();
        $args['attribute_id'] = get_attribute_id_from_name($name);
        $attributes[] = (object) $args;
        //print_r($attributes);
        set_transient('wc_attribute_taxonomies', $attributes);
    } else {
        return;
    }
}

/**
 * Get the product attribute ID from the name.
 *
 * @since 3.0.0
 * @param string $name | The name (slug).
 */
function get_attribute_id_from_name($name)
{
    global $wpdb;
    $attribute_id = $wpdb->get_col("SELECT attribute_id
    FROM {$wpdb->prefix}woocommerce_attribute_taxonomies
    WHERE attribute_name LIKE '$name'");
    return reset($attribute_id);
}

/**
 * Create a new variable product (with new attributes if they are).
 * (Needed functions:
 *
 * @since 3.0.0
 * @param array $data | The data to insert in the product.
 */

function create_product_variation($data)
{
    if (! function_exists('save_product_attribute_from_name')) {
        return;
    }

    $postname = sanitize_title($data['title']);
    $author = empty($data['author']) ? '1' : $data['author'];

    $post_data = array(
        'post_author'   => $author,
        'post_name'     => $postname,
        'post_title'    => $data['title'],
        'post_content'  => $data['content'],
        'post_excerpt'  => $data['excerpt'],
        'post_status'   => 'draft',
        'ping_status'   => 'closed',
        'post_type'     => 'product',
        'guid'          => home_url('/product/'.$postname.'/'),
    );

    // Creating the product (post data)
    $product_id = wp_insert_post($post_data);

    // Get an instance of the WC_Product_Variable object and save it
    $product = new WC_Product_Variable($product_id);
    $product->save();

    ## ---------------------- Other optional data  ---------------------- ##
    ##     (see WC_Product and WC_Product_Variable setters methods)

    // THE PRICES (No prices yet as we need to create product variations)

    // IMAGES GALLERY
    if (! empty($data['gallery_ids']) && count($data['gallery_ids']) > 0) {
        $product->set_gallery_image_ids($data['gallery_ids']);
    }

    // SKU
    if (! empty($data['sku'])) {
        $product->set_sku($data['sku']);
    }

    // STOCK (stock will be managed in variations)
    $product->set_stock_quantity($data['stock']); // Set a minimal stock quantity
    $product->set_manage_stock(true);
    $product->set_stock_status('');

    // Tax class
    if (empty($data['tax_class'])) {
        $product->set_tax_class($data['tax_class']);
    }

    // WEIGHT
    if (! empty($data['weight'])) {
        $product->set_weight('');
    } // weight (reseting)
    else {
        $product->set_weight($data['weight']);
    }

    $product->validate_props(); // Check validation

    ## ---------------------- VARIATION ATTRIBUTES ---------------------- ##

    $product_attributes = array();

    foreach ($data['attributes'] as $key => $terms) {
        $taxonomy = wc_attribute_taxonomy_name($key); // The taxonomy slug
        $attr_label = ucfirst($key); // attribute label name
        $attr_name = (wc_sanitize_taxonomy_name($key)); // attribute slug

        // NEW Attributes: Register and save them
        if (! taxonomy_exists($taxonomy)) {
            save_product_attribute_from_name($attr_name, $attr_label);
        }

        $product_attributes[$taxonomy] = array(
            'name'         => $taxonomy,
            'value'        => '',
            'position'     => '',
            'is_visible'   => 0,
            'is_variation' => 1,
            'is_taxonomy'  => 1
        );

        foreach ($terms as $value) {
            $term_name = ucfirst($value);
            $term_slug = sanitize_title($value);

            // Check if the Term name exist and if not we create it.
            if (! term_exists($value, $taxonomy)) {
                wp_insert_term($term_name, $taxonomy, array('slug' => $term_slug ));
            } // Create the term

            // Set attribute values
            wp_set_post_terms($product_id, $term_name, $taxonomy, true);
        }
    }
    update_post_meta($product_id, '_product_attributes', $product_attributes);
    global $wpdb;
    foreach ($terms as $color) {
        $colorClean = preg_replace("/[^0-9a-zA-Z_-] +/", "", $color);
        $post_name = 'product-' . $product_id . '-color-' . $colorClean;
        $my_post = array(
            'post_title' => 'Color ' . $color . ' for #' . $product_id,
            'post_name' => $post_name,
            'post_status' => 'publish',
            'post_parent' => $product_id,
            'post_type' => 'product_variation',
            'guid' => home_url() . '/?product_variation=' . $post_name
        );
        $attID = $wpdb->get_var("SELECT count(post_title) FROM $wpdb->posts WHERE post_name like '$post_name'");
        if ($attID < 1) {
            $attID = wp_insert_post($my_post);
        }
        update_post_meta($attID, 'attribute_color', $color);
        update_post_meta($attID, '_price', $data['regular_price']);
        update_post_meta($attID, '_regular_price', $data['regular_price']);
        update_post_meta($attID, '_sale_price', $data['sale_price']);
        update_post_meta($attID, '_sku', $post_name);
        update_post_meta($attID, '_virtual', 'no');
        update_post_meta($attID, '_downloadable', 'no');
        update_post_meta($attID, '_manage_stock', 'no');
        update_post_meta($attID, '_stock_status', 'instock');
    }
    $product->save(); // Save the data
    return $product_id;
}
function g8_get_table_html($data, $args = array())
{
    $defaults = array(
            'table_class'        => '',
            'table_style'        => '',
            'row_styles'         => '',
            'table_heading_type' => 'horizontal',
            'columns_classes'    => array(),
            'columns_styles'     => array(),
        );
    $args = array_merge($defaults, $args);
    extract($args);
    $table_class = ('' == $table_class) ? '' : ' class="' . $table_class . '"';
    $table_style = ('' == $table_style) ? '' : ' style="' . $table_style . '"';
    $row_styles  = ('' == $row_styles)  ? '' : ' style="' . $row_styles  . '"';
    $html = '';
    $html .= '<table' . $table_class . $table_style . '>';
    $html .= '<tbody>';
    foreach ($data as $row_number => $row) {
        $row_class = 'g8-row g8-row' . $row_number;
        $row_class .= $row_number % 2 == 0 ? ' g8-row-even' : ' g8-row-odd';
        $html .= '<tr' . $row_styles . ' class="'.$row_class.'">';
        foreach ($row as $column_number => $value) {
            $th_or_td = ((0 === $row_number && 'horizontal' === $table_heading_type) || (0 === $column_number && 'vertical' === $table_heading_type)) ? 'th' : 'td';
            $column_class = (! empty($columns_classes) && isset($columns_classes[ $column_number ])) ? ' class="' . $columns_classes[ $column_number ] . '"' : '';
            $column_style = (! empty($columns_styles) && isset($columns_styles[ $column_number ])) ? ' style="' . $columns_styles[ $column_number ] . '"' : '';

            $html .= '<' . $th_or_td . $column_class . $column_style . '>';
            $html .= $value;
            $html .= '</' . $th_or_td . '>';
        }
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    return $html;
}
function g8_add_new_product($args, $customFields)
{
    $get_attrubute=g8_get_attributes();
    $article_name=$args['title'];
    $attribute_array=array();
    foreach ($get_attrubute as $key => $value) {
        if ($args[$key."_array"]) {
            $attr_label = '$key';
            $attr_slug = "pa_".$key;
            $av_attr[$key]=$args[$key."_array"];
        }
    }
    foreach ($av_attr as $k=>$v) {
        foreach ($v as $k1=>$v2) {
            $term = get_term_by('id', $v2, 'pa_'.$k);
            $av_attr[$k][$k1]=$term->name;
        }
    }
    // print_r($args);
    // die();
    $product_id= create_product_variation(array(
            'author'        => '', // optional
            'title'         => $args['title'],
            'content'       => $args['desc'],
            'excerpt'       => $args['short_desc'],
            'regular_price' => $args['regular_price'], // product regular price
            'sale_price'    => $args['sale_price'], // product sale price (optional)
            'attributes'    => $av_attr,
        ));
    $selectedCat = [];
    foreach ($args['cats'] as $cats) {
        $term = get_term_by('id', $cats, 'product_cat');
          
        $selectedCat[]= $term->term_id;
    }
    wp_set_object_terms($product_id, $selectedCat, 'product_cat');
    wp_set_object_terms($product_id, $args['tags'], 'product_tag');
    update_post_meta($product_id, '_visibility', 'visible');
    update_post_meta($product_id, '_stock_status', 'instock');
    if (!empty($args[$customFields[0]])) {
        update_post_meta($product_id, $customFields[0], $args[$customFields[0]]);
    }
    if (!empty($args[$customFields[1]])) {
        update_post_meta($product_id, $customFields[1], $args[$customFields[1]]);
    }
    if (!empty($args[$customFields[2]])) {
        update_post_meta($product_id, $customFields[2], $args[$customFields[2]]);
    }
    if ('' != $args['image'] && '' != $args['image']['tmp_name']) {
        $upload_dir = wp_upload_dir();
        $filename = $args['image']['name'];
        $file = (wp_mkdir_p($upload_dir['path'])) ? $upload_dir['path'] : $upload_dir['basedir'];
        $file .= '/' . $filename;

        move_uploaded_file($args['image']['tmp_name'], $file);

        $wp_filetype = wp_check_filetype($filename, null);
        $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title'     => sanitize_file_name($filename),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );
        $attach_id = wp_insert_attachment($attachment, $file, $product_id);
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);
        set_post_thumbnail($product_id, $attach_id);
    }

    if (! empty($_FILES['my_file_upload'])) {
        $files = $_FILES['my_file_upload'];
           
        foreach ($files['name'] as $key => $value) {
            if ($files['name'][$key]) {
                $file = array(
                        'name' => $files['name'][$key],
                        'type' => $files['type'][$key],
                        'tmp_name' => $files['tmp_name'][$key],
                        'error' => $files['error'][$key],
                        'size' => $files['size'][$key]
                        );
            }
            $_FILES = array("my_file_upload" => $file);
            $i=1;
            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                    __return_false();
                }
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
                                
                $attachment_id = media_handle_upload($file, $product_id);
                            
                $vv .= $attachment_id . ",";
                                
                $i++;
            }
            update_post_meta($product_id, '_product_image_gallery', $vv);
        }
    }
    
      

    return $product_id;
}

function g8_product_checkList()
{
    return wp_terms_checklist(0, ['taxonomy'=>'product_cat','echo'=>false]);
}
function g8_product_attributes()
{
    $attribute_taxonomies = wc_get_attribute_taxonomies();
    $taxonomy_terms = array();

    if ($attribute_taxonomies) :
        foreach ($attribute_taxonomies as $tax) :
        if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
            $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name');
    endif;
    endforeach;
    endif;
    $result="";

    foreach ($taxonomy_terms as $key => $value) {
        $arg= array(
            'descendants_and_self' => 0,
            'selected_cats'        => false,
            'popular_cats'         => false,
            'walker'               => null,
            'taxonomy'             => 'pa_'.$key,
            'checked_ontop'        => true,
            'echo'                 => 0,
        );
        $clist= wp_terms_checklist(0, $arg);
        $clist = str_replace("disabled='disabled'", '', $clist);
        $list='<ul class="g8_product_cat">'.str_replace('disabled="disabled"', '', $clist).'</ul>';
        $table_data[$key]=array('<label for="g8_add_new_gold_product_sale_price">' .$key. '</label>',$list);
    }
    return $table_data;
}
function g8_get_attributes()
{
    $attribute_taxonomies = wc_get_attribute_taxonomies();
    $taxonomy_terms = array();

    if ($attribute_taxonomies) :
        foreach ($attribute_taxonomies as $tax) :
        if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
            $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name');
    endif;
    endforeach;
    endif;
    return $taxonomy_terms;
}
function my_handle_attachment($file_handler, $post_id, $set_thu=false)
{
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
        __return_false();
    }
  
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  
    $attach_id = media_handle_upload($file_handler, $post_id);
  
    if (is_numeric($attach_id)) {
        update_post_meta($post_id, '_product_image_gallery', $attach_id);
    }
    return $attach_id;
}
