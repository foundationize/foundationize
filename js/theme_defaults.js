jQuery(document).ready(function($) {
    /*========= Add websites base url to the logo link. ============*/
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    $(".top_bar_logo_link").attr("href", baseUrl);
});