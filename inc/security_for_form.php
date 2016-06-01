<?php
/*
 * We can use this function to convert html entities into row text, for security reasons.
 * For example if i use e(<script>alert(1)</script>) the javascript code will not be executed because it will
 * be converted into this: &lt;script&gt;alert(1);&lt;/script&gt;
 */
function e($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}