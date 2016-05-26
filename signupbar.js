    
jQuery(document).ready(function ($) { // wait until the document is ready
    $('#send2').click(function(){ // when the button is clicked the code executes
        $('.error').fadeOut('slow'); // reset the error messages (hides them)

        var error = false; // we will set this true if the form isn't valid

        // var email_compare = /^([a-z0-9_.-]+)@([da-z.-]+).([a-z.]{2,6})$/; // Syntax to compare against input
        function validEmail(v) {
            var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
            return (v.match(r) == null) ? false : true;
            }
        var email = $('input#email2').val().toLowerCase(); // get the value of the input field
        if (email == "" || email == " ") { // check if the field is empty
            $('#err-email2').fadeIn('slow'); // error - empty
            error = true;
        }else if (!validEmail(email)) { // if it's not empty check the format against our email_compare variable
            $('#err-emailvld2').fadeIn('slow'); // error - not right format
            error = true;
        }

        var data_string = $('#ajax-form2').serialize(); // Collect data from form

        $.ajax({
            type: "POST",
            url: $('#ajax-form2').attr('action'),
            data: data_string,
            timeout: 6000,
            error: function(request,error) {
                if (error == "timeout") {
                    $('#err-timedout').slideDown('slow');
                }
                else {
                    $('#err-state2').slideDown('slow');
                    $("#err-state2").html('An error occurred: ' + error + '');
                }
            },
            success: function() {
                $('#ajax-form2').slideUp('slow');
                $('#ajaxsuccess2').slideDown('slow');
                setTimeout(function() {
                    $('.header-signup').hide('slow');
                    $('.header-top').animate( {
                        top:"-=35"
                    }, 'fast');
                },2000);
            }
        });

        return false; // stops user browser being directed to the php file
    }); // end click function
});
