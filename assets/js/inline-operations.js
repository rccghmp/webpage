var jQ = jQuery.noConflict();

jQ(document).ready(function(){
    $(document).on("submit", "form.enquiry-form", function(e){
        e.preventDefault();

        var contact_name = jQ('.enquiry-form .contact-name').val();
        var email = jQ('.enquiry-form .email').val();
        var phone_no = jQ('.enquiry-form .phone-no').val();
        var contact_message = jQ('.enquiry-form .contact-message').val();
        var submission_url = jQ('.enquiry-form .submission-url').val();

        if ((contact_name == '') || (email == '') || (phone_no == '') || (contact_message == '')) {
            var warning_msg = '*All fields are compulsory';
            jQ('form .message-displayer').css('display', 'block');
            jQ('form .message-displayer').html(warning_msg);
        } else {
            var pRating = jQ.ajax({
                url: submission_url,
                type: 'POST',
                data: {
                    contact_name: contact_name,
                    email: email,
                    phone_no: phone_no,
                    contact_message: contact_message,
                },
                beforeSend: function () {
                    jQ('.enquiry-form .loader-').css("display", "inline-block");
                }
            })
                    .done(function () {
                        window.form_full_response = pRating.responseText;

                        var data = "";
                        jQ('.enquiry-form .loader-').css("display", "none");

                        try{
                            data = JSON.parse(window.form_full_response);

                            if(data['status'] === true) {
                                var msg = "Enquiry received! Thank You.";
                                var color = "#60b044";
                            } else {
                                var msg = "Oops! Something went wrong";
                                var color = "#e97770";
                            }
                        }
                        catch(e){}

                        jQ('form .message-displayer').css('display', 'block');
                        jQ('form .message-displayer').css('color', color);
                        jQ('form .message-displayer').html(msg);
                        clearForm();
                    })
                    .fail(function () {
                        jQ('.enquiry-form .loader-').css("display", "none");
                        jQ('form .message-displayer').css('display', 'none');
                    })
                    .always(function () {
                        //jQ('.enquiry-form .loader-').css("display", "none");
                    });
        }
    });

    jQ('.enquiry-form .submit-reset').click(function(){
        jQ('.enquiry-form .loader-').css("display", "none");
    });

});

function clearForm() {
    jQ('.enquiry-form .contact-name').val('');
    jQ('.enquiry-form .email').val('');
    jQ('.enquiry-form .phone-no').val('');
    jQ('.enquiry-form .contact-message').val('');
}