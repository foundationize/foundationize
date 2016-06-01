<?php ob_start();

/* Important! To use header("Location: thankyou.html") you have to place ob_start() at the top. */

function foundationize_contact_form($atts)
{
    $mail_subject = get_option('mail_subject');
    $mail_receiver_mail = get_option('mail_receiver_mail');
    $mail_redirect = get_option('mail_redirect');
    $redirect_url = !empty($mail_redirect) ? $mail_redirect : get_the_permalink();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $to = !empty($mail_receiver_mail) ? $mail_receiver_mail : 'karadusisv@hotmail.com';
        $subject = !empty($mail_subject) ? $mail_subject : 'Contact form submission';
        $name = $_POST['the_name'];
        $email = $_POST['the_email'];
        $message = $_POST['the_message'];
        $content = 'Name: '.$name.'<br>Email: '.$email.'<br>Message: '.$message;
        $sent = wp_mail($to,$subject,$content);
        if ($sent) {
            wp_redirect($redirect_url);
        } else {
            // Redirect to the sorry page.
        }
        exit;
    }
    ob_start();
    ?>
    <!-- For some reason if i use common names such as name, email etc, the form will not work. -->
    <div class="my_contact_form_wrapper">
        <form action="<?php the_permalink(); ?>" method="post" data-abide novalidate>
            <div class="">
                <label>Name
                    <input type="text" class="form-control" name="the_name" id="name-input-id" placeholder="Name"
                        value="" required>
                    <span class="form-error">
                        This field is required.
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label>Email address
                    <input type="email" class="form-control" name="the_email" id="email-input" placeholder="Email" value=""
                           required>
                    <span class="form-error">
                        This field is required.
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="message-input-id">Message</label>
                <textarea class="form-control" id="message-input-id" name="the_message" rows="3" placeholder="Message"
                          style="resize: vertical"></textarea>
            </div>
            <button type="submit" value="Submit" class="button">Submit</button>
        </form>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('my_contact_form', 'foundationize_contact_form');

/*================================================ Foundation tags ===================================================*/

/*
 * Example usage: [div class1='classa_one classa_two' style='margin: 0 auto;'][/div]
 */
function div ($atts, $content = null) {
    $a = shortcode_atts(array(
        'class' => '',
        'style' => ''
    ), $atts);
    return '<div class="' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">'
    . do_shortcode($content) . '</div>';
}add_shortcode('div', 'div');

/*
 * Example usage: [row class1='classa_one classa_two' style='margin: 0 auto;'][/row]
 */
function row ($atts, $content = null) {
    $a = shortcode_atts(array(
        'class' => 'row',
        'style' => ''
    ), $atts);
    return '<div class="' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">'
    . do_shortcode($content) . '</div>';
}add_shortcode('row', 'row');

/*
 * Example usage: [column class1='classa_one classa_two' style='margin: 0 auto;'][/column]
 */
function column ($atts, $content = null) {
    $a = shortcode_atts(array(
        'class' => 'column',
        'style' => ''
    ), $atts);
    return '<div class="' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">'
    . do_shortcode($content) . '</div>';
}add_shortcode('column', 'column');

/*
 * Example usage: [column2 class1='classa_one classa_two' style='margin: 0 auto;'][/column]
 */
function column2 ($atts, $content = null) {
    $a = shortcode_atts(array(
        'class' => 'column',
        'style' => ''
    ), $atts);
    return '<div class="' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">'
    . do_shortcode($content) . '</div>';
}add_shortcode('column2', 'column2');

/*
 * Example usage: [row2 class1='classa_one classa_two' style='margin: 0 auto;'][/row2]
 */
function row2 ($atts, $content = null) {
    $a = shortcode_atts(array(
        'class' => 'row',
        'style' => ''
    ), $atts);
    return '<div class="' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">'
    . do_shortcode($content) . '</div>';
}add_shortcode('row2', 'row2');

/*
 * Example usage: [button class1='classa_one classa_two' style='margin: 0 auto;'][/button]
 */
function button ($atts, $content = null) {
    $a = shortcode_atts(array(
        'class' => '',
        'style' => '',
        'href' => ''
    ), $atts);
    return '<a href="' . esc_attr($a['href']) . '" class="button ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">'
    . do_shortcode($content) . '</a>';
}add_shortcode('button', 'button');

/*
 * Example usage: [form class1='classa_one classa_two' style='margin: 0 auto;'][/form]
 */
function example_form ($atts) {
    ob_start();
    ?>
    <form>
        <div class="row">
            <div class="large-12 columns">
                <label>Input Label</label>
                <input type="text" placeholder="large-12.columns">
            </div>
        </div>
        <div class="row">
            <div class="large-4 medium-4 columns">
                <label>Input Label</label>
                <input type="text" placeholder="large-4.columns">
            </div>
            <div class="large-4 medium-4 columns">
                <label>Input Label</label>
                <input type="text" placeholder="large-4.columns">
            </div>
            <div class="large-4 medium-4 columns">
                <label>Input Label</label>
                <div class="input-group">
                    <input type="text" placeholder="small-9.columns" class="input-group-field">
                    <span class="input-group-label">.com</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>Select Box</label>
                <select>
                    <option value="husker">Husker</option>
                    <option value="starbuck">Starbuck</option>
                    <option value="hotdog">Hot Dog</option>
                    <option value="apollo">Apollo</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="large-6 medium-6 columns">
                <label>Choose Your Favorite</label>
                <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Radio 1</label>
                <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Radio 2</label>
            </div>
            <div class="large-6 medium-6 columns">
                <label>Check these out</label>
                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>Textarea Label</label>
                <textarea placeholder="small-12.columns"></textarea>
            </div>
        </div>
    </form>
    <?php
    return ob_get_clean();
}add_shortcode('example_form', 'example_form');
