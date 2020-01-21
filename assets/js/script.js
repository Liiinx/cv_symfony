$(function() {

// cacher la navbar après click sur mobile

    $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });

// ajax pour formulaire de contact

    $('#contact-form').submit(function(e){

        // ne pas traiter le form avec le champ action du form, empêche les actions par default.
        e.preventDefault();

        $('.comments').empty();
        let postdata = $('#contact-form').serialize();
        // console.log(postdata);

        $.ajax({
            type: 'POST',
            url: '/',
            data: postdata,
            dataType: 'json',
            success: function(result) {

                if(result.isSuccess){
                    $("#contact-form").append("<p class='thank-you'>Votre message a bien été envoyé. Merci</p>");
                    $("#contact-form")[0].reset();
                    $(".thank-you").delay(3000).slideUp(1000);
                    // setTimeout(function() {
                    //     $('.thank-you').remove();
                    // }, 3000);
                    grecaptcha.reset();
                } else {
                    $("#firstname + .comments").html(result.firstnameError);
                    $("#name + .comments").html(result.nameError);
                    $("#email + .comments").html(result.emailError);
                    $("#phone + .comments").html(result.phoneError);
                    $("#message + .comments").html(result.messageError);
                    $(".g-recaptcha + .comments").html(result.captchaError);
                    grecaptcha.reset();

                }
            }
        });
    });
});
