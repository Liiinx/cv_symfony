// Create a back to top button
//Get the button:
mybutton = document.getElementById("toTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// end back to top button

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
        var postdata = $('#contact-form').serialize();
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
