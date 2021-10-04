// Wait for the DOM to be ready
$(function () {

    var siteUrl = $('#site_url_path_for_external_js').val();

    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Por favor, verifique sua entrada"
    );

    $.validator.addMethod("noSpace", function(value, element) { 
      return value.indexOf(" ") < 2 && value != ""; 
    }, "No space please and don't leave it empty");


    $("form[name='add_cart_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            user_product_quantity: {
                required: true,
                remote: {
                    url: siteUrl + "/user_controller/checkQuantity",
                    type: "post",
                    data: {
                        quantity: function () {
                            return $("#add_quantity").val();
                        }
                    }
                }
            }
        },

        // Specify validation error messages
        messages: {

            user_product_quantity: {
                required: "Digite uma quantidade",
                remote: "A quantidade não deve ser 0"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            // form.submit();
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    toastr.success('Serviço adicionado com sucesso');
                    $("#header").load(location.href + " #header");
                    $("#add_to_cart_form").load(location.href + " #add_to_cart_form");
                }
            });
        }
    });


    $("form[name='review_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: {
                required: true
            },
            subject: {
                required: true
            },
            simple_message: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {

            name: {
                required: "Por favor insira um nome"
            },
            subject: {
                required: "Por favor insira um assunto"
            },
            simple_message: {
                required: "Por favor insira a sua mensagem"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='checkout_billing_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            telephone: {
                required: true,
                number: true
            },

            email2: {
                required: true,
                email: true
            },

            // password3:{
            //     required: true
            // },
            address1: {
                required: true
            },
            city: {
                required: true
            },
            country: {
                required: true
            },
            // region: {
            //     required: true,
            // },

            privacy: "required"
        },

        // Specify validation error messages
        messages: {
            firstname: {
                required: "Por favor, entre com seu nome completo"
            },
            lastname: {
                required: "Por favor, entre com seu último nome"
            },
            telephone: {
                required: "Por favor, entre com seu telefone",
                number: "Por favor, entre com seu número de telefone"
            },

            email2: {
                required: "Por favor, entre com seu email",
                email: "Por favor, entre com um e-mail válido"
            },

            address1: {
                required: "Por favor, entre com um endereço"
            },
            city: {
                required: "Por favor, entre com uma cidade"
            },
            country: {
                required: "Por favor, selecione um país"
            },
            // region: {
            //     required: "Please select state/region",
            // },
            privacy: {
                required: "Por favor, marque a caixa de seleção"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='add_product_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
             product_category: {
                required: true
            },
            address: {
                required: true
            },
            product_name: {
                required: true
            },
            price: {
                required: true,
            },
            contact_number: {
                required: true,
            },
            budget: {
                required: true,
            },
            product_subcategory: {
                required: true,
            },
            payment_method: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },
            facebook_link: {
                required: false,
                url: true
            },
            instagram_link: {
                required: false,
                url: true
            },
            productprice: {
                required: true,
                number: true
            },
            product_availability: {
                required: true
            },
            productcode: {
                required: true
            },
            productbrand: {
                required: true
            },
            product_billing_method: {
                required: true
            },
            product_description: {
                required: true
            },
            contact_for_product: {
                required: true,
                number: true
            }
        },

        // Specify validation error messages
        messages: {
            price: {
                required: "Por favor, use ponto ao invés de vírgula nos seus preços"
            },
            contact_number: {
                required: "O número de contato é obrigatório"
            },
            address: {
                required:"O endereço é obrigatório"
            },
            budget: {
                required:"Digite Precisa ou Não precisa neste campo",
            },
            product_subcategory: {
                required:"Por favor, verifique sua entrada",
            },
            payment_method: {
                required:"Por favor, verifique sua entrada",
            },
            state: {
                required:"Por favor, verifique sua entrada",
            },
            city: {
                required:"Por favor, verifique sua entrada",
            },
            facebook_link: {
                required: "A página deve conter https:// antes do domínio",
                url: "A página deve conter https:// antes do domínio"
            },
            instagram_link: {
                required: "A página deve conter https:// antes do domínio",
                url: "A página deve conter https:// antes do domínio"
            },
            product_category: {
                required: "Por favor, selecione uma categoria"
            },
            product_name: {
                required: "Por favor, selecione um nome de serviço"
            },
            productprice: {
                required: "Digite o preço do serviço",
                number: "Por favor, digite um valor"
            },
            product_availability: {
                required: "Selecione um status"
            },
            productcode: {
                required: "Digite um código de serviço"
            },
            productbrand: {
                required: "Por favor, selecione um país"
            },
            product_billing_method: {
                required: "Digite o método de pagamento"
            },
            product_description: {
                required: "Forneça uma descrição do serviço"
            },
            contact_for_product: {
                required: "Por favor, entre com um número de contato",
                number: "Por favor, entre com um número de contato"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='edit_product_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            product_category: {
                required: true
            },
            address: {
                required: true
            },
            product_name: {
                required: true
            },
            price: {
                required: true,
            },
            contact_number: {
                required: true,
            },
            budget: {
                required: true,
            },
            product_subcategory: {
                required: true,
            },
            payment_method: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },
            facebook_link: {
                required: false,
                url: true
            },
            instagram_link: {
                required: false,
                url: true
            },
            productprice: {
                required: true,
                number: true
            },
            product_availability: {
                required: true
            },
            productcode: {
                required: true
            },
            productbrand: {
                required: true
            },
            product_billing_method: {
                required: true
            },
            product_description: {
                required: true
            },
            contact_for_product: {
                required: true,
                number: true
            }
        },

        // Specify validation error messages
        messages: {
            price: {
                required: "Por favor, use ponto ao invés de vírgula nos seus preços"
            },
            contact_number: {
                required: "O número de contato é obrigatório"
            },
            address: {
                required:"O endereço é obrigatório"
            },
            budget: {
                required:"Digite Precisa ou Não precisa neste campo",
            },
            product_subcategory: {
                required:"Por favor, verifique sua entrada",
            },
            payment_method: {
                required:"Por favor, verifique sua entrada",
            },
            state: {
                required:"Por favor, verifique sua entrada",
            },
            city: {
                required:"Por favor, verifique sua entrada",
            },
            facebook_link: {
                required: "A página deve conter https:// antes do domínio",
                url: "A página deve conter https:// antes do domínio"
            },
            instagram_link: {
                required: "A página deve conter https:// antes do domínio",
                url: "A página deve conter https:// antes do domínio"
            },
            product_category: {
                required: "Por favor, selecione uma categoria"
            },
            product_name: {
                required: "Por favor, selecione um nome de serviço"
            },
            productprice: {
                required: "Digite o preço do serviço",
                number: "Por favor, digite um valor"
            },
            product_availability: {
                required: "Selecione um status"
            },
            productcode: {
                required: "Digite um código de serviço"
            },
            productbrand: {
                required: "Por favor, selecione um país"
            },
            product_billing_method: {
                required: "Digite o método de pagamento"
            },
            product_description: {
                required: "Forneça uma descrição do serviço"
            },
            contact_for_product: {
                required: "Por favor, entre com um número de contato",
                number: "Por favor, entre com um número de contato"
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
    $("form[name='user_registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstname: {
                required: true,
                regex: "^[a-zA-Z]"
            },
            username: {
                required: true,

                remote: {
                    url: siteUrl + "/authentication/checkUsername",
                    type: "post",
                    data: {
                        username: function () {
                            return $("#username").val();
                        }
                    }
                }
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true,

                remote: {
                    url: siteUrl + "/authentication/checkEmail",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }
                }
            },
            telecom: {
                required: true,
                rangelength: [7, 18]
            },
            address1: {
                required: true
            },
            city: {
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            postcode: {
                required: true,
                number: false,
                rangelength: [4, 14]
            },
            country: {
                required: true
            },
            region: {
                required: true
            },
            privacy_policy_checkbox: {
                required: true
            },

            password: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            cpassword: {
                equalTo: "#password"
            }
        },

        // Specify validation error messages
        messages: {
            firstname: {
                required: "Digite seu nome completo",
                regex: "Desculpa! Nenhum caractere ou número especial"
            },
            username: {
                required: "Digite um nome de usuário",
                remote: 'O nome de usuário já está em uso, por favor escolha outro'
                // regex: "Sorry! No special characters or numbers"
            },
            telecom: {
                required: "Digite um número de telefone válido",
                rangelength: "Forneça um número de telefone entre 7 e 18 caracteres"
            },
            address1: {
                required: "Digite um endereço válido"
            },
            city: {
                required: "Digite o nome da cidade válido",
                regex: "Desculpa! Nenhum caractere ou número especial"
            },
            postcode: {
                required: "Digite um CEP válido",
                rangelength: "Forneça um CEP entre 4 e 14 caracteres"
            },
            country: {
                required: "Por favor selecione o país"
            },
            region: {
                required: "Por favor selecione o estado"
            },
            privacy_policy_checkbox: {
                required: " Leia a política de privacidade"
            },
            password: {
                required: "Por favor, forneça uma senha",
                regex: "A senha deve conter 8 caracteres com pelo menos uma letra minúscula, uma maiúscula, um caractere especial e um dígito"
            },
            email: {
                required: "Por favor insira um endereço de e-mail",
                email: "Por favor insira um endereço de e-mail válido",
                remote: 'ID de email já usado'
            },
            cpassword: {
                 required: "Forneça a mesma senha novamente",
                equalTo: "A senha e confirmar senha não correspondem"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='registerd_customer']").validate({
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
                remote: {
                    url: siteUrl + "/authentication/checkRegisteredEmail",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }
                }
            },
            password: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {

            password: {
                required: "Por favor, forneça uma senha"
            },
            email: {
                required: "Por favor, insira um e-mail",
                email: "Por favor, insira um e-mail válido",
                remote: "O usuário não existe"
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
    $("form[name='user_login_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            password: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {

            password: {
                required: "Por favor, insira uma senha"
            },
            email: {
                required: "Por favor, insira um e-mail",
                email: "Por favor, insira um e-mail válido"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    // Initialize form validation on the basic info form.

    $("form[name='basic_info_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            firstname: {
                required: true
            },
            telecom: {
                required: true,
                rangelength: [7, 18]
            },
            username: {
                required: true,

                remote: {
                    url: siteUrl + "/authentication/checkUsername",
                    type: "post",
                    data: {
                        username: function () {
                            return $("#username").val();
                        }
                    }
                }
            },
        },

        // Specify validation error messages
        messages: {

            firstname: {
                required: "Por favor, insira um nome completo"
            },
            telecom: {
                required: "Insira uma operadora",
                rangelength: "Por favor, insira um número com 7 á 18 caracteres"
            },
            username: {
                required: "Digite um nome de usuário",
                 remote: 'O nome de usuário já está em uso, por favor escolha outro'

            },
            // middlename: {
            //     required: "Please provide a Middle Name",
            // },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {

            // form.submit();
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            toastr.success('Perfil atualizado com sucesso');
                        }
                    });
                }
            });
        }
    });

    // Initialize form validation on the address info form.

    $("form[name='address_info_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            address1: {
                required: true
            },
            city: {
                required: true
            },
            postcode: {
                required: true,
                number: true,
                rangelength: [5, 8]
            },
            country: {
                required: true
            },
            region: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {

            address1: {
                required: "Por favor, insira um endereço"
            },
            city: {
                required: "Escolha uma cidade"
            },

            postcode: {
                required: "Por favor, insira um CEP",
                number: "Por favor, insira um CEP",
                rangelength: "Por favor, insira um número de telefone com 5 á 7 caracteres"
            },
            country: {
                required: "Escolha um país"
            },
            region: {
                required: "Escolha um estado"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            // form.submit();
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            toastr.success('Seu perfil foi atualizado com sucesso');
                        }
                    });
                }
            });
        }
    });


    // Initialize form validation on the login info form.
    $("form[name='login_info_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            currentpassword: {
                required: true
            },
            password: {
                required: true,
                regex: "^(?=.*\\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}$"
            },
            cpassword: {
                equalTo: "#new_password"
            }
        },

        // Specify validation error messages
        messages: {
            currentpassword: {
                required: "Insira a senha atual"
            },
            password: {
                required: "Insira uma senha",
                regex: "A senha deve conter 8 caracteres com pelo menos uma letra minúscula, uma maiúscula, um caractere especial e um dígito"
            },
            cpassword: {
                required: "Insira uma senha",
                equalTo: "A senha e confirmar senha não correspondem"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            // form.submit();
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    var site_url = $('meta[name="site_url"]').attr('content');

                    if(response === 'SUCCESS') {
                        toastr.success('Senha atualizada com sucesso');
                        window.location.href = site_url+"home/Entrar";
                    } else if(response === 'OLD-PASSWORD')  {
                        toastr.error('A senha antiga não corresponde');
                    }
                },
                error: function () {
                    toastr.error('Ocorreu um erro ao atualizar a senha do usuário');
                }
            });
        }
    });


    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='contact_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            contactname: {
                required: true,
                regex: "^[a-zA-Z ]+$"
            },
            contactemail: {
                required: true,
                email: true
            },
            contactsubject: {
                required: true
            },
            contactmessage: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {
            contactname: {
                required: "Digite um nome"
            },
            contactemail: {
                required: "Por favor, entre com um e-mail",
                email: "Por favor, entre com um e-mail válido"
            },
            contactsubject: {
                required: "Por favor, descreva seu assunto"
            },
            contactmessage: {
                required: "Por favor, descreva seu comentário"
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
    $("form[name='email_reset_password_form']").validate({
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

                remote: {
                    url: siteUrl + "/authentication/checkEmailAvailability",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }
                }
            }
        },

        // Specify validation error messages
        messages: {

            email: {
                required: "Por favor, entre com um e-mail",
                email: "Por favor, entre com um e-mail válido",
                remote: 'E-mail não encontrado, digite um endereço de e-mail válido'
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
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
            con_password: {
                equalTo: "#reset_password"
            }
        },

        // Specify validation error messages
        messages: {
            password: {
                required: "Por favor, forneça uma senha",
                regex: "A senha deve conter 8 caracteres com pelo menos uma letra minúscula, uma maiúscula, um caractere especial e um dígito"
            },
            con_password: {
                equalTo: "A senha e confirmar senha não correspondem"
            }
        },

        submitHandler: function (form) {
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

                remote: {
                    url: siteUrl + "/authentication/checkEmail",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#freelancer_register_email").val();
                        }
                    }
                }
            },
            username: {
                required: true,
                regex: "^[a-z0-9._]+$",
                rangelength: [5, 15],

                remote: {
                    url: siteUrl + "/authentication/checkUsername",
                    type: "post",
                    data: {
                        username: function () {
                            return $("#freelancer_register_username").val();
                        }
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
            fname: "Por favor entre com o seu nome completo",
            lname: "Por favor entre com o seu último nome",
            username: {
                required: "Ecolha um nome de usuário, pode ser nome comum ou marca",
                regex: "O nome de usuário deve conter apenas letras minúsculas, números, pontos ou sublinhados",
                rangelength: "Forneça um nome de usuário entre 5 e 15 caracteres",
                remote: 'Esse nome de usuário já está em uso, por favor escolha outro'
            },
            password: {
                required: "Por favor, forneça uma senha",
                regex: "A senha deve conter 8 caracteres com pelo menos uma letra minúscula, uma maiúscula, um caractere especial e um dígito"
            },
            cpassword: {
                equalTo: "A senha e confirmar senha não correspondem"
            },
            email: {
                required: 'É necessário um endereço de e-mail',
                email: 'Por favor insira um endereço de e-mail válido',
                remote: 'Esse endereço de e-mail já está em uso'
            }
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
                required: "Por favor, forneça uma senha",
                regex: "A senha deve conter 8 caracteres com pelo menos uma letra minúscula, uma maiúscula, um caractere especial e um dígito"
            },
            confirmnewpwd: {
                equalTo: "A senha e confirmar senha não correspondem"
            }
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
                required: "Digite um número de telefone válido",
                rangelength: "Forneça um número de telefone entre 7 e 13 caracteres"
            }
        },

        submitHandler: function (form) {
            // form.submit();
            // var formData = new FormData(this);

            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            parent.scrollTo(0, 0);
                            // $(".employee_profile_image").load(location.href + " .employee_profile_image");
                            toastr.success('Seu perfil foi atualizado com sucesso');
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
                regex: "O nome do banco deve conter apenas letras do alfabeto e espaços",
                rangelength: "Forneça o nome do banco entre 3 e 20 caracteres"
            },
            account_holder_name: {
                regex: "O nome do titular da conta deve conter apenas letras do alfabeto e espaços",
                rangelength: "Forneça o nome do titular da conta entre 2 e 20 caracteres"
            },
            account_number: {
                number: "Forneça uma conta válida",
                rangelength: "O número da conta deve ter entre 10 e 15 dígitos"
            },
            ifsc: {
                number: "Forneça um número ifsc válido",
                rangelength: "O número ifsc deve ter entre 7 e 15 dígitos"
            }
        },

        submitHandler: function (form) {
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
                required: true
            },
            experience: {
                required: true
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
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            }

        },

        // Specify validation error messages
        messages: {

            fname: {
                required: "Digite um nome"
            },
            experience: {
                required: "Por favor, selecione uma experiência"
            },
            telecom_number: {
                required: "Digite um número de contato",
                rangelength: "Forneça um número de telefone com 10 caracteres"
            },
            email: {
                required: "Por favor, insira um endereço de e-mail",
                email: "Por favor insira um endereço de e-mail válido"
            },
            address: {
                required: "Digite um endereço  "
            },
            country: {
                required: "Por favor, selecione um país  "
            },
            state: {
                required: "Por favor, selecione um estado  "
            },
            city: {
                required: "Por favor, selecione uma cidade  "
            }
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            // form.submit();
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            parent.scrollTo(0, 0);
                            // $(".employee_profile_image").load(location.href + " .employee_profile_image");
                            toastr.success('Seu perfil foi atualizado com sucesso');
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
                required: true
            },
            established_in: {
                required: true
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
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            }

        },

        // Specify validation error messages
        messages: {

            fname: {
                required: "Digite o nome da empresa"
            },
            established_in: {
                required: "Por favor selecione o ano"
            },
            telecom_number: {
                required: "Digite o número do contato",
                rangelength: "Forneça um número de telefone com 10 caracteres"
            },
            email: {
                required: "Por favor insira um endereço de e-mail",
                email: "Por favor insira um endereço de e-mail válido"
            },
            address: {
                required: "Digite o endereço  "
            },
            country: {
                required: "Por favor, selecione o país  "
            },
            state: {
                required: "Por favor, selecione o estado  "
            },
            city: {
                required: "Digite a cidade  "
            }
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='post_job_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            job_title: {
                required: true
            },
            job_description: {
                required: true
            },
            budget: {
                required: true,
                number: true
            },
            estimated_duration: {
                required: true,
                number: true
            },
            address_line_1: {
                required: true
            },
            city: {
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            state: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {
            job_title: {
                required: "Digite o título do serviço"
            },
            job_description: {
                required: "Digite os detalhes do serviço"
            },
            budget: {
                required: "Digite o orçamento do serviço",
                number: "Digite apenas o número"
            },
            estimated_duration: {
                required: "Forneça a duração estimada do serviço",
                number: "Digite apenas o número"
            },
            address_line_1: {
                required: "Digite o endereço"
            },
            city: {
                required: "Digite o nome da cidade",
                regex: "Desculpa! Nenhum caractere ou número especial"
            },
            state: {
                required: "Selecione o estado"
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    });


    $("form[name='edit_job_form']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            job_title: {
                required: true
            },
            job_description: {
                required: true
            },
            budget: {
                required: true,
                number: true
            },
            estimated_duration: {
                required: true,
                number: true
            },
            address_line_1: {
                required: true
            },
            city: {
                required: true,
                regex: "^[a-zA-Z]+$"
            },
            state: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {
            job_title: {
                required: "Digite o título do serviço"
            },
            job_description: {
                required: "Digite os detalhes do serviço"
            },
            budget: {
                required: "Digite o orçamento do serviço",
                number: "Digite apenas o número"
            },
            estimated_duration: {
                required: "Forneça a duração estimada do serviço",
                number: "Digite apenas o número"
            },
            address_line_1: {
                required: "Digite os detalhes de endereço"
            },
            city: {
                required: "Digite o nome da cidade",
                regex: "Desculpa! Nenhum caractere ou número especial"
            },
            state: {
                required: "Selecione o estado"
            }
        },

        submitHandler: function (form) {
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

                remote: {
                    url: siteUrl + "/authentication/checkFreelancerEmail",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#invite_freelancer_email").val();
                        }
                    }
                }
            },
            invite_role: {
                required: true
            },
            invite_salary: {
                required: true
            },
            invite_agreement: {
                required: true
            }
        },

        // Specify validation error messages
        messages: {

            invite_email: {
                required: "Por favor, insira um endereço de e-mail",
                email: "Por favor, insira o endereço de e-mail válido",
                remote: 'O freelancer não está presente, primeiro, registre este e-mail como freelancer'
            },
            invite_role: {
                required: "Por favor, selecione a função"
            },
            invite_salary: {
                required: "Digite o salário oferecido"
            },
            invite_agreement: {
                required: "Digite os detalhes de contrato "
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

                remote: {
                    url: siteUrl + "/authentication/checkEmailAvailability",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#forget_password_email").val();
                        }
                    }
                }
            }
        },

        // Specify validation error messages
        messages: {
            email: {
                required: "Por favor insira um endereço de e-mail",
                email: "Por favor insira o endereço de e-mail válido",
                remote: 'Digite o ID de e-mail válido'
            }
        },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


});