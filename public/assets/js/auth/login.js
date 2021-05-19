let loading_asset = $('#loading_asset').html();
let login_caption = $('#login').text();
let disableLoginButton = function(){
    $('#login').prop('disabled', true);
    $('#login').html(loading_asset);

    $('.print-error-msg').hide();
    $('.message-success').hide();
    $('.message-failed').hide();
}
let enableLoginButton = function(){
    $('#login').prop('disabled', false);
    $('#login').html(login_caption);
}

function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}

$(document).ready(function(){
    $("form").submit(function(e){
        e.preventDefault();

        disableLoginButton();

        let _token = $("input[name='_token']").val();
        let username = $("input[name='username']").val();
        let password = $("input[name='password']").val();

        $.ajax({
            url: login_url,
            type:'POST',
            data: {_token:_token, username:username, password:password},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    if(data.is_success_login){
                        $('message-success').html('Successfully logged in.');

                        setTimeout(function(){
                            window.location.href = logged_in_url;
                        },1000);
                    }else{
                        $('message-failed').html('Failed to login.');
                    }
                }else{
                    printErrorMsg(data.error);
                }
            }
        }).always(function() {
            enableLoginButton();
        })
        .fail(function() {
            alert('server error');
        });
    });
});
