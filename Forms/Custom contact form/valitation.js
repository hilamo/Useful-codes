jQuery(document).ready(function(){
        jQuery('#form_submit_btn').click(function(e){
            if(validateForm()){
                e.preventDefault();
            };
        });

        function validateForm(){

            var error = false;
            var nameReg = /^[A-Za-z]+$/;
            var numberReg =  /^[0-9]+$/;
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            var name = jQuery('input[name="full_name"]');
            var email = jQuery('input[name="email"]');
            var phone = jQuery('input[name="phone"]');
            var message = jQuery('input[name="message"]');

            var inputVal = new Array(name.val(), email.val(), phone.val(), message.val());
            var inputMessage = new Array("Full Name", "Email address", "Phone number", "Short message");
                
                //Full name
                if(inputVal[0] == ""){
                    name.before('<span class="error"> Please enter your ' + inputMessage[0] + '</span>');
                    error = true;
                }
                
                // email
                if(inputVal[1] == ""){
                    email.before('<span class="error"> Please enter your ' + inputMessage[1] + '</span>');
                    error = true;
                }else if(!emailReg.test(email.val())){
                    email.before('<span class="error"> Please enter a valid Email address (for example info@example.com).</span>');
                    error = true;
                }
                
                // phone
                if(inputVal[2] == ""){
                    phone.before('<span class="error"> Please enter your ' + inputMessage[2] + '</span>');
                    error = true;
                }else if(!numberReg.test(phone.val())){
                    phone.before('<span class="error"> Numbers only</span>');
                    error = true;
                }
                
                // message
                if(inputVal[3] == ""){
                    message.before('<span class="error"> Please enter your ' + inputMessage[3] + '</span>');
                    error = true;
                }
                
                //console.log(error);
            return error;          
        }  

    });