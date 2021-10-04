// Wait for the DOM to be ready
$(function() {

    var siteUrl = $('#site_url_path_for_external_js').val();

    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );


    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='update_admin_profile']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstname:{
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            lastname:{
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,
            },
            mobile: {
                required: true,
                number: true,
                rangelength: [7, 13]
            },
            address:{
                required: true
            },
            city:{
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            zip:{
                required: true,
                number: true,
                rangelength: [5, 7]
            },
            country:{
                required: true
            },
            state:{
                required: true
            },
        },

        // Specify validation error messages
        messages: {
            firstname: {
                required:"Please enter first name",
                regex: "Sorry! No special characters or numbers"
            },
            lastname: {
                required:"Please enter last name",
                regex: "Sorry! No special characters or numbers"
            },
            mobile: {
                required: "Please enter valid phone number",
                rangelength: "Please provide phone number between 7 to 13 characters"
            },
            address: {
                required: "Please enter valid address",
            },
            city: {
                required: "Please enter valid city name",
                regex: "Sorry! No special characters or numbers"
            },
            zip: {
                required: "Please enter valid postal address",
                rangelength: "Please provide phone number between 5 to 7 characters"
            },
            country: {
                required: "Please select valid country name",
            },
            state: {
                required: "Please select valid state name",
            },
            email: {
                required: "Please enter an email address",
                email: "Please enter valid email address",
                remote: 'Email id already used'
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='update_admin_password']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            curr_password:{
                required: true,
            },
            newpwd: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            confirmnewpwd: {
                equalTo: "#change_password"
            }
        },

        // Specify validation error messages
        messages: {
            curr_password: {
                required:"Please enter current password",
            },
            newpwd: {
                required: "Please provide a password",
                regex: "Password must contain 8 characters with at least one lower case letter, one capital case letter, one special character and one digit"
            },
            confirmnewpwd: {
                equalTo: "Password & Confirm Password doesn't match"
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });




    // Initialize form validation on the login form.
    // It has the name attribute "login"
    $("form[name='addCategoryModal']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            title: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                remote:{
                    url: siteUrl+"/admin/checkCategoryName",
                    type: "post",
                    data: {
                        name: function(){ return $("#category_name").val(); }
                    }
                }
            },
            image: {
                required: true,
            }
        },

        // Specify validation error messages
        messages: {           
            
            title: {
                required: "Please provide a category name",
                remote: 'Category name already used'
            },            
            image: {
                required: "Please provide a category image",
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });




    // Initialize form validation on the login form.
    // It has the name attribute "login"
    $("form[name='addSubCategoryModal']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            title: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                remote:{
                    url: siteUrl+"/admin/checkSubCategoryName",
                    type: "post",
                    data: {
                        name: function(){ return $("#subcategory_name").val(); }
                    }
                }
            },
            image: {
                required: true,
            }
        },

        // Specify validation error messages
        messages: {           
            
            title: {
                required: "Please provide a sub category name",
                remote: 'Sub category name already used'
            },            
            image: {
                required: "Please provide a sub category image",
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });































































    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='company_registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            company_legal_name: {
                required: true,

                remote:{
                    url: siteUrl+"/authentication/checkComapnyLegalName",
                    type: "post",
                    data: {
                        legalName: function(){ return $("#company_register_legal_name").val(); }
                    }
                }
            },
            founded_year: {
                required: true
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,

                remote:{
                    url: siteUrl+"/authentication/checkEmail",
                    type: "post",
                    data: {
                        email: function(){ return $("#company_register_email").val(); }
                    }
                }
            },
            username: {
                required: true,
                regex: "^[a-z0-9._]+$",
                rangelength: [5, 15],

                remote:{
                    url: siteUrl+"/authentication/checkUsername",
                    type: "post",
                    data: {
                        username: function(){ return $("#company_register_username").val(); }
                    }
                }
            },
            password: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            cpassword: {
                equalTo: "#company_password"
            },
            phone_number: {
                required: true,
                number: true,
                rangelength: [7, 13]
            },
            tax_id: {
                required: true,
                regex: "^[a-zA-Z0-9-]+$",
                rangelength: [5, 20],

                remote:{
                    url: siteUrl+"/authentication/checkComapnyTaxId",
                    type: "post",
                    data: {
                        company_register_tax_id: function(){ return $("#company_register_tax_id").val(); }
                    }
                }
            },
            registration_number: {
                required: true,
                regex: "^[a-zA-Z0-9-]+$",
                rangelength: [5, 20],

                remote:{
                    url: siteUrl+"/authentication/checkComapnyRegistrationNumber",
                    type: "post",
                    data: {
                        company_register_number: function(){ return $("#company_register_number").val(); }
                    }
                }
            },
            bank_name: {
                regex: "^[a-zA-Z ]+$",
                rangelength: [3, 20]
            },
            account_holder_name: {
                regex: "^[a-zA-Z ]+$",
                rangelength: [2, 20]
            },
            account_number: {
                number: true,
                rangelength: [10, 15]
            },
            ifsc: {
                regex: "^[A-Z0-9]+$",
                rangelength: [7, 15]
            },
            company_file: {
                required: true
            },
            term_agreement_checkbox: "required"
        },

        // Specify validation error messages
        messages: {
            company_legal_name: {
                required: "Please enter company legal name",
                remote: 'Company legal Name already used'
            },
            founded_year: {
                required: "Please select company year of establishment"
            },
            email: {
                required: "Please enter an email address",
                email: "Please enter valid email address",
                remote: 'Email id already used'
            },
            username: {
                required: "Please enter username",
                regex: "Username must contain lower case alphabets, numbers, dot or underscore only",
                rangelength: "Please provide username between 5 to 15 characters",
                remote: 'Username id already used'
            },
            password: {
                required: "Please provide a password",
                regex: "Password must contain 8 characters with at least one lower case letter, one capital case letter, one special character and one digit"
            },
            cpassword: {
                equalTo: "Password & Confirm Password doesn't match"
            },
            phone_number: {
                required: "Please enter valid phone number",
                rangelength: "Please provide phone number between 7 to 13 characters"
            },
            tax_id: {
                required: "Please enter tax id",
                regex: "Please enter valid tax id",
                rangelength: "Please provide tax id between 5 to 20 characters",
                remote: 'Taxid already used'
            },
            registration_number: {
                required: "Please enter registration number",
                regex: "Please enter valid registration number",
                rangelength: "Please provide registration number between 5 to 20 characters",
                remote: 'Registration numver already used'
            },
            bank_name: {
                regex: "Bank name must contain alphabets and spaces only",
                rangelength: "Please provide bank name between 3 to 20 characters"
            },
            account_holder_name: {
                regex: "Account holder name must contain alphabets and spaces only",
                rangelength: "Please provide account holder name between 2 to 20 characters"
            },
            account_number: {
                number: "Please provide valid account number",
                rangelength: "Account number must be 10 to 15 digits long"
            },
            ifsc: {
                regex: "IFS code must contain capital letters and numbers only",
                rangelength: "Please provide account holder name between 7 to 15 characters"
            },
            company_file: {
                required: "Please upload legal documents"
            },
            term_agreement_checkbox: {
                required: "Please check the checkbox"
            }
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });



    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='freelancer_registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            fname: "required",
            lname: "required",
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,

                remote:{
                    url: siteUrl+"/authentication/checkEmail",
                    type: "post",
                    data: {
                        email: function(){ return $("#freelancer_register_email").val(); }
                    }
                } 
            },
            username: {
                required: true,
                regex: "^[a-z0-9._]+$",
                rangelength: [5, 15],

                remote:{
                    url: siteUrl+"/authentication/checkUsername",
                    type: "post",
                    data: {
                        username: function(){ return $("#freelancer_register_username").val(); }
                    }
                } 
            },
            password: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            cpassword: {
                equalTo: "#freelancer_password"
            }
        },

        // Specify validation error messages
        messages: {
            fname: "Please enter your first name",
            lname: "Please enter your last name",
            username: {
                required: "Please enter username",
                regex: "Username must contain lower case alphabets, numbers, dot or underscore only",
                rangelength: "Please provide username between 5 to 15 characters",
                remote: 'Username already used'
            },
            password: {
                required: "Please provide a password",
                regex: "Password must contain 8 characters with at least one lower case letter, one capital case letter, one special character and one digit"
            },
            cpassword: {
                equalTo: "Password & Confirm Password doesn't match"
            },
            email: {
                required: 'Email address is required',
                email: 'Please enter a valid email address',
                remote: 'Email id already used'
            }
        },
        
        submitHandler: function (form) {
            form.submit();
        }
    });




    $("form[name='reset_password_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            password: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            cnfrmpassword: {
                equalTo: "#reset_password"
            }
        },

        // Specify validation error messages
        messages: {
            password: {
                required: "Please provide a password",
                regex: "Password must contain 8 characters with at least one lower case letter, one capital case letter, one special character and one digit"
            },
            cnfrmpassword: {
                equalTo: "Password & Confirm Password doesn't match"
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });




    $("form[name='change_password_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            newpwd: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            confirmnewpwd: {
                equalTo: "#change_password"
            }
        },

        // Specify validation error messages
        messages: {
            newpwd: {
                required: "Please provide a password",
                regex: "Password must contain 8 characters with at least one lower case letter, one capital case letter, one special character and one digit"
            },
            confirmnewpwd: {
                equalTo: "Password & Confirm Password doesn't match"
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });



    $("form[name='customer_profile_update_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            telecom_number: {
                required: true,
                number: true,
                rangelength: [7, 13]
            }
        },

        // Specify validation error messages
        messages: {
            telecom_number: {
                required: "Please enter valid phone number",
                rangelength: "Please provide phone number between 7 to 13 characters"
            }
        },

        submitHandler: function(form) {
            // form.submit();
            // var formData = new FormData(this);

            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) 
                {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            parent.scrollTo(0, 0);
                            // $(".employee_profile_image").load(location.href + " .employee_profile_image");
                            toastr.success('Your Profile is updated successfully');
                        }            
                    });
                }            
            });
        }
    });



    $("form[name='customer_bank_detail_update_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            bank_name: {
                regex: "^[a-zA-Z ]+$",
                rangelength: [3, 20]
            },
            account_holder_name: {
                regex: "^[a-zA-Z ]+$",
                rangelength: [2, 20]
            },
            account_number: {
                number: true,
                rangelength: [10, 15]
            },
            ifsc: {
                number: true,
                rangelength: [7, 15]
            }
        },

        // Specify validation error messages
        messages: {
            bank_name: {
                regex: "Bank name must contain alphabets and spaces only",
                rangelength: "Please provide bank name between 3 to 20 characters"
            },
            account_holder_name: {
                regex: "Account holder name must contain alphabets and spaces only",
                rangelength: "Please provide account holder name between 2 to 20 characters"
            },
            account_number: {
                number: "Please provide valid account number",
                rangelength: "Account number must be 10 to 15 digits long"
            },
            ifsc: {
                number: "Please provide valid ifsc number",
                rangelength: "ifsc number must be 7 to 15 digits long"
            }
        },

        submitHandler: function(form) {
            form.submit();
        }
    });


    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='freelancer_edit_profile']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            fname: {
                required: true,
            },
            experience: {
                required: true,
            },
            telecom_number: {
                required: true,
                number: true,
                rangelength: [7, 13]
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            address: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },

        },

        // Specify validation error messages
        messages: {

            fname: {
                required: "Please enter Name",
            },
            experience: {
                required: "Please select Experience",
            },
            telecom_number: {
                required: "Please enter  Contact Number",
                rangelength: "Please provide phone number of 10 characters"
            },
            email: {
                required: "Please enter an Email Address",
                email: "Please enter valid Email Address"
            },
            address: {
                required: "Please enter Address  ",
            },
            country: {
                required: "Please select Country  ",
            },
            state: {
                required: "Please select State  ",
            },
            city: {
                required: "Please enter City  ",
            },
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            // form.submit();
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) 
                {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            parent.scrollTo(0, 0);
                            // $(".employee_profile_image").load(location.href + " .employee_profile_image");
                            toastr.success('Your Profile is updated successfully');
                        }            
                    });
                }            
            });
        }
    });


    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='company_edit_profile']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            company_name: {
                required: true,
            },
            established_in: {
                required: true,
            },
            telecom_number: {
                required: true,
                number: true,
                rangelength: [7, 13]
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            address: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },

        },

        // Specify validation error messages
        messages: {

            fname: {
                required: "Please enter Company Name",
            },
            established_in: {
                required: "Please Select Established Year",
            },
            telecom_number: {
                required: "Please Enter  Contact Number",
                rangelength: "Please provide phone number of 10 characters"
            },
            email: {
                required: "Please Enter an Email Address",
                email: "Please enter valid Email Address"
            },
            address: {
                required: "Please Enter Address  ",
            },
            country: {
                required: "Please Select Country  ",
            },
            state: {
                required: "Please Select State  ",
            },
            city: {
                required: "Please Enter City  ",
            },
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });



    $("form[name='post_job_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            job_title:{
                required: true,
            },
            job_description:{
                required: true,
            },
            budget: {
                required: true,
                number: true,
            },
            estimated_duration: {
                required: true,
                number: true,
            },
            address_line_1:{
                required: true,
            },
            city:{
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            state:{
                required: true,
            },
        },

        // Specify validation error messages
        messages: {
            job_title: {
                required:"Please enter job title",
            },
            job_description: {
                required:"Please enter job details",
            },
            budget: {
                required:"Please enter job budget",
                number: "Please enter only number",
            },
            estimated_duration: {
                required:"Please provide job estimated duration",
                number: "Please enter only number",
            },
            address_line_1: {
                required:"Please enter address details",
            },
            city: {
                required:"Please enter city name",
                regex: "Sorry! No special characters or numbers"
            },
            state: {
                required:"Please Select state",
            },
        },

        submitHandler: function(form) {
            form.submit();
        }
    });



    $("form[name='edit_job_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            job_title:{
                required: true,
            },
            job_description:{
                required: true,
            },
            budget: {
                required: true,
                number: true,
            },
            estimated_duration: {
                required: true,
                number: true,
            },
            address_line_1:{
                required: true,
            },
            city:{
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            state:{
                required: true,
            },
        },

        // Specify validation error messages
        messages: {
            job_title: {
                required:"Please enter job title",
            },
            job_description: {
                required:"Please enter job details",
            },
            budget: {
                required:"Please enter job budget",
                number: "Please enter only number",
            },
            estimated_duration: {
                required:"Please provide job estimated duration",
                number: "Please enter only number",
            },
            address_line_1: {
                required:"Please enter address details",
            },
            city: {
                required:"Please enter city name",
                regex: "Sorry! No special characters or numbers"
            },
            state: {
                required:"Please Select state",
            },
        },

        submitHandler: function(form) {
            form.submit();
        }
    });





    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='invite_freelancer_company_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            invite_email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,

                remote:{
                    url: siteUrl+"/authentication/checkFreelancerEmail",
                    type: "post",
                    data: {
                        email: function(){ return $("#invite_freelancer_email").val(); }
                    }
                }
            },
            invite_role: {
                required: true,
            },
            invite_salary: {
                required: true,
            },
            invite_agreement: {
                required: true,
            },
        },

        // Specify validation error messages
        messages: {

            invite_email: {
                required: "Please Enter an Email Address",
                email: "Please enter valid Email Address",
                remote: 'Freelancer is not present, Please register this email as a freelancer first'
            },
            invite_role: {
                required: "Please select role",
            },
            invite_salary: {
                required: "Please enter offered salary",
            },
            invite_agreement: {
                required: "Please enter agreement details ",
            },
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });








    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='forget_password_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,

                remote:{
                    url: siteUrl+"/authentication/checkEmailAvailability",
                    type: "post",
                    data: {
                        email: function(){ return $("#forget_password_email").val(); }
                    }
                }
            }
        },

        // Specify validation error messages
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter valid email address",
                remote: 'Please enter valid email id'
            }
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });





});