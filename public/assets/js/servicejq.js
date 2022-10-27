$(document).ready(function() {
    $('.servicetab').click(function() {
        $('.servicetab').removeClass("active");
        $('.servicenew').removeClass("account-settings__content--active");
        $(this).addClass("active");
        $('.' + this.id).addClass("account-settings__content--active");
    });
})