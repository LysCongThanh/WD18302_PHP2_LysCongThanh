import { postData } from "../services";
import Swal from 'sweetalert2';

if(document.querySelector('#form-login')) {
    Validator({
        form: '#form-login',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
    
        rules: [
            Validator.isRequired('input[name="email"]', 'Không được bỏ trống !'),
            Validator.isEmail('input[name="email"]', 'Vui long nhap email !'),
            Validator.isPassword('input[name="password"]')
        ],

        onSubmit: function(data, e) {
            const postResult = postData(`${webRoot}/api/login`, data);

            postResult.then((result) => {

                if(result.status === 'success') {
                    localStorage.setItem('user', JSON.stringify(result.user));
                    window.location.href = `${webRoot}`;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Có lỗi xảy ra !',
                        text: `${result.message}`
                    });
                }

            });
        }
    })
}