jQuery(document).ready(function($) {
    $('#submit').click(function(event) {
        event.preventDefault(); // Prevent default form submission
        // Get the Form Values
        var name = $('#name').val();
        var email = sanitizeEmail($('#email').val());
        var phone = sanitizePhone($('#phone').val());
        var people = $('#people').val();
        var date = $('#date').val(); 
        var time = $('#time').val();
        var message =$('#message').val();

       //console.log("Sanitized Inputs:", { name, email, phone, people, date, time, message });

        // Get the Notice Elements
        var loading = $('#b_loading'),
            error_message = $('#b_error'),
            sent_message = $('#b_message');
            sent_message.addClass("ds-block");

        if (name && email && phone && people && date && time && message) {
            if (!loading.hasClass('ds-block')) {
                loading.addClass('ds-block');
                sent_message.removeClass('ds-block');
                $.ajax({
                    type: 'POST',
                    url: yummy_ajax_object.ajax_url,
                    data: {
                        action: 'booking_ajax_action', // Must match the PHP action
                        name: name,
                        email: email,
                        phone: phone,
                        people: people,
                        date: date,
                        time: time,
                        message: message
                    },
                    success: function(response) {
                    if(response.data.message == true){
                        loading.removeClass('ds-block');
                        sent_message.addClass('ds-block');
                       
                    }else{
                        loading.removeClass('ds-block');
                        error_message.text('Please fill all the fields correctly');
                        error_message.addClass('ds-block');
                        removeNotice(error_message);
                    }
                }
                });
            } else {
                loading.removeClass('ds-block');
            }
        } else {
            if (!error_message.hasClass('ds-block')) {
                error_message.addClass('ds-block');
                error_message.text('Please fill all the fields correctly');
                removeNotice(error_message);
            } else {
                error_message.removeClass('ds-block');
                
            }
            if(sent_message.hasClass('ds-block')){
                sent_message.removeClass('ds-block');
            }
            
        }
        event.preventDefault();
    });
    $("#msubmit").click(function(event){
        event.preventDefault(); // Prevent default form submission
        var contact_name  = $("#contact_name").val();
        var contact_email = $("#contact_email").val();
        var contact_subject = $("#contact_subject").val();
        var contact_message = $("#contact_message").val();
        //console.log("Sanitized Inputs:", {contact_name , contact_email, contact_subject, contact_message });
        // Get The Notice Elements
        var con_loading = $("#con_loading");
        var con_error = $("#con_error");
        var con_message = $("#con_message");
        if(contact_name && contact_email && contact_subject && contact_message){
            if(!con_loading.hasClass('ds-block')){
                con_loading.addClass('ds-block');
                $.ajax({
                    type:'POST',
                    url:yummy_ajax_object.ajax_url,
                    data: {
                        action: 'contact_form_ajax_action', // Must match the PHP action
                        contact_name: contact_name,
                        contact_email: contact_email,
                        contact_subject: contact_subject,
                        contact_message: contact_message
    
                    },
                    success: function(response) {
                        console.log(response.data.message);
                            if(response.data.message == true){
                                con_loading.removeClass('ds-block');
                                con_message.addClass('ds-block');
                               
                            }else{
                                con_loading.removeClass('ds-block');
                                con_error.addClass('ds-block');
                                con_error.text('System error! Please try again.'); 
                                removeNotice(con_error);                                                             
                            } 
                    }   
                });

            }else {
                con_loading.removeClass('ds-block');
            }
        } else {
            if (!con_error.hasClass('ds-block')) {
                con_error.addClass('ds-block');
                con_error.text('Please fill all the fields correctly');
                removeNotice(con_error);
            } else {
                con_error.removeClass('ds-block');
                
            }
            if(con_message.hasClass('ds-block')){
                con_message.removeClass('ds-block');
            }
            
        }
        
    });

    function removeNotice($element) {
        setTimeout(function() {
            $element.removeClass('ds-block');
        }, 3000);
    }
    // Sanitize Phone Number
    function sanitizePhone(phone) {
       // phone = phone.replace(/[^0-9+()-\s]/g, ""); // Remove invalid characters
        phone = phone.trim(); // Remove leading & trailing spaces
        if (!/^\+?[0-9]+$/.test(phone)) {
            return ""; // Return empty if no digits are present
        }
        return phone;
    }

    // Sanitize Email Address
    function sanitizeEmail(email) {
        email = email.trim(); // Remove spaces
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {   
            return "";
        }
        return email;
    }
});

