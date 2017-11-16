window.onunload = function(){};

$(document).ready(function() {
    $("button[type=submit]").click(function() {
        $(this).addClass('is-loading');
    });
});