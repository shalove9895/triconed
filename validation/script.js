(function($) {
    $(function() {
        $(document).on('click',function(e)
        {
            if(!$(e.target).parents().addBack().is('.modal-content,button'))
            {
                $('.modal').css({'display':'none'})
            }
        })
        if ($('form').length > 0) {
            $.validator.addMethod("selectoption", function(value, element, arg) {
                return arg !== value;
            }, "Please select an option");
            
            $('form').each(function()
                {
                    $(this).validate({
                errorClass: "error",
                validClass: "success",
                errorElement: "em",
                onkeyup: true,
                onclick: true,
                onchange: true,
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    Password:{
                        required: true

                    },
                   


                    captcha: {
                        required: true
                    },
                    phone: {
                        required: true,digits:true
                    },
                    cname: {
                        required: true 
                    },
                   ser: {
                        required: true 
                    },
                     tname:{
                        required: true

                    },
                    lname:{
                        required: true

                    },
                    salary:{
                        required: true

                    },
                    job:{
                        required: true

                    },
                    Describe:{
                        required: true

                    },

                },
                messages: {
                    tname: {
                        required: "Please enter your title"
                    },
                    lname: {
                        required: "Please enter your location"
                    },
                    salary: {
                        required: "Please enter your salary"
                    },
                    job: {
                        required: "Please enter your job describtion"
                    },
                    name: {
                        required: "Please enter your name"
                    },

                    email: {
                        required: "Please enter your email id"
                    },
                    phone: {
                        required: "Please enter your Phone Number"
                    },
                      Password: {
                        required: "Please enter your Password"
                    },
                    captcha: {
                        required: "Please enter your captcha"
                    },
                     cname: {
                        required: "Please enter your Company Name"
                    },
                     ser: {
                        required: "Please enter your Service"
                    },
                    Describe: {
                        required: "Please enter your Describtion"
                    },
                   
                   
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        beforeSubmit: function() {
                            $(form).addClass('focused')
                            $('#Submit').val('Sending...')
                        },
                        error: function(xhr, status, error) {
                            $('#Submit').val('Re-Send')
                            if($('form.focused .result').length <= 0)
                            {
                                $('form.focused').append('<div class="result"/>')
                            }
                            $('form.focused .result').html('Sorry')
                            console.log(xhr.responseText)
                        },
                        success: function(response) {
                            $('#Submit').val('SEND')
                            $('form').resetForm();
                            if($('form.focused .result').length <= 0)
                            {
                                $('form.focused').append('<div class="result"/>')
                            }
                            $('form.focused .result').html(response)
                            setTimeout(function(){
                                $('form.focused .result').remove(); 
                            }, 4000)
                            $('form.focused .result').html('Thank You! Your Message Has Been Sent')
                             
                        }
                    });
                }
            });
                })
        }

    })
        
})(jQuery)