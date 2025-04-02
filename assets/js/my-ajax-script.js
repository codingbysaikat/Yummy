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

      //  console.log("Sanitized Inputs:", { name, email, phone, people, date, time, message });

        // Get the Notice Elements
        var loading = $('.loading'),
            error_message = $('.error-message'),
            sent_message = $('.sent-message');

        if (name && email && phone && people && date && time && message) {
            if (!loading.hasClass('ds-block')) {
                loading.addClass('ds-block');
                sent_message.removeClass('ds-block');
                $.ajax({
                    type: 'POST',
                    url: my_ajax_object.ajax_url,
                    data: {
                        action: 'my_ajax_action', // Must match the PHP action
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
                        sent_message.addClass('ds-block');
                        loading.removeClass('ds-block');
                    }else{
                        error_message.addClass('ds-block');
                        error_message.text('Please fill all the fields correctly');
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

        function removeNotice($element) {
            setTimeout(function() {
                $element.removeClass('ds-block');
            }, 3000);
        }
        event.preventDefault();
    });


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

