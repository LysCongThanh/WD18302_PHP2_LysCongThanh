Validator({
    form: '#form-login',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('input[name="email"]', 'Không được bỏ trống !'),
        Validator.isEmail('input[name="email"]', 'Vui long nhap email !'),
        Validator.isRequired('input[name="password"]', 'Không được bỏ trống !')
    ]
})