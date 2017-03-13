$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            // get values from FORM
            var name = $("input#name").val();
            var email = $("input#email").val();
            var contact = $("input#contact").val();
            var message = $("textarea#message").val();

            $.ajax({
                url: '/digitalpenph-website/DigitalPenPhController/contactus',
                type: "POST",
                data: {
                    name: name,
                    contact: contact,
                    email: email,
                    message: message
                },
                dataType: "json",
                cache: false,
                success: function() {
                            //alert(stat.error);
	                    $("#btnSubmit").attr("disabled", false);
	                    $('#success').html("<div class='alert alert-success'>");
	                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
	                        .append("</button>");
	                    $('#success > .alert-success')
	                        .append("<strong>Your message has been sent. </strong>");
	                    $('#success > .alert-success')
	                        .append('</div>');

	                    //clear all fields
	                    $('#contactForm').trigger("reset");

                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + name + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                   // console.log(err);
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
