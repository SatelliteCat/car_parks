$(document).ready(function() {
    $("select.users").val(0);
    $("select.users")
        .change(function() {
            $('.cars').val(0);
            $('select.cars option').hide();
            $('option[data-clientid=' + $(this).val() + ']').show();
        })
});