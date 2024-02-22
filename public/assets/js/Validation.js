// Đối tượng `Validator`
function Validator(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var selectorRules = {};

    // Hàm thực hiện validate
    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
        var errorMessage;

        // Lấy ra các rules của selector
        var rules = selectorRules[rule.selector];

        // Lặp qua từng rule & kiểm tra
        // Nếu có lỗi thì dừng việc kiểm
        for (var i = 0; i < rules.length; ++i) {
            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
            inputElement.classList.add('is-invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
            inputElement.classList.remove('is-invalid');
            // inputElement.classList.add('is-valid');
        }

        return !errorMessage;
    }

    // Lấy element của form cần validate
    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function (e) {
            e.preventDefault();

            var isFormValid = true;
            var errorTab = null;

            if (options.tabs) {
                var hasError = false; // To track if there's an error

                options.rules.forEach(function (rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    if (!isValid && !errorTab) {
                        hasError = true; // Set the hasError flag
                        isFormValid = false;
                        // Remove 'active' class from the current active tab link
                        var activeTabLink = formElement.querySelector('.nav-link.active');
                        if (activeTabLink) {
                            activeTabLink.classList.remove('active');
                        }
                        inputElement.scrollIntoView({ behavior: 'smooth', block: 'end', inline: 'nearest' });

                        errorTab = inputElement.closest('.tab-pane');
                    }
                });
                // Remove 'show' and 'active' classes from all tabs
                var allTabs = formElement.querySelectorAll('.tab-pane');
                allTabs.forEach(function (tab) {
                    tab.classList.remove('show', 'active');
                });

                if (errorTab) {
                    // Activate and show only the tab with errors
                    errorTab.classList.add('show', 'active');

                    // Activate the corresponding tab link in the <ul> by its aria-controls attribute
                    var tabLink = formElement.querySelector('[aria-controls="' + errorTab.id + '"]');
                    if (tabLink) {
                        tabLink.classList.add('active');
                    }
                }

                // Scroll to the top of the page if there's an error
                if (hasError) {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            } else {
                // Validation for non-tabbed form
                options.rules.forEach(function (rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    if (!isValid) {
                        isFormValid = false;
                    }
                });
            }


            if (isFormValid) {

                if (typeof options.onSubmit === "function") {
                    var enableInputs = formElement.querySelectorAll("[name]");
                    var formValues = Array.from(enableInputs).reduce(function (values, input) {
                        switch (input.type) {
                            case "radio":
                                if (input.matches(":checked")) {
                                    values[input.name] = input.value;
                                }
                                break;
                            case "checkbox":
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                if (input.matches(":checked")) {
                                    values[input.name].push(input.value);
                                }
                                break;
                            case "file":
                                values[input.name] = input.files;
                                break;
                            case "select-one":  // Handle single select (Choices.js)
                                values[input.name] = input.value;
                                break;
                            case "select-multiple":  // Handle multiple select (Choices.js)
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                var choicesSelect = input.closest('.choices');
                                if (choicesSelect) {
                                    var nativeSelect = choicesSelect.querySelector('select'); // Get the underlying select element
                                    var selectedOptions = Array.from(nativeSelect.selectedOptions);
                                    if (selectedOptions.length > 0) {
                                        values[input.name] = selectedOptions.map(option => option.value);
                                    }
                                }
                                break;

                            default:
                                values[input.name] = input.value;
                        }

                        return values;
                    }, {});

                    // Pass an object containing formValues and the event
                    options.onSubmit(formValues, event);
                } else {
                    formElement.submit();
                }
            }
        }

        options.rules.forEach(function (rule) {

            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }

                inputElement.oninput = function () {
                    var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                    inputElement.classList.remove('is-invalid');
                }
            });
        });
    }

    //Clear error when closing modal
    const modalElement = document.querySelector(options.modal);
    if (modalElement) {
        modalElement.addEventListener('hidden.bs.modal', () => {
            options.rules.forEach((rule) => {
                const inputElement = document.querySelector(rule.selector);
                const errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                errorElement.innerText = '';
                getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                inputElement.classList.remove('is-invalid');
            });
        });
    }

}

ValidatorFormsModal = (options) => {
    const modalGroup = document.querySelector(options.modalGroup);
    const modalElements = modalGroup.querySelectorAll(options.modalEles);
    modalElements.forEach((modalEle, key) => {
        const getIdFormElement = modalEle.querySelector('form').getAttribute('id');
        const getIdModalElement = modalEle.getAttribute('id');
        Validator({
            form: `#${getIdFormElement}`,
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            modal: `#${getIdModalElement}`,
            rules: options.rules,
        });
    })
}

Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value && value.trim() !== '' ? undefined : message || 'Vui lòng nhập trường này';
        }
    };
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là email';
        }
    };
}

Validator.isPassword = (selector, min = null, max = null) => {
    return {
        selector: selector,
        test: (value) => {

            if (value.length === 0) {
                return 'Không được bỏ trống';
            }

            if (min !== null && max !== null) {
                return value.length >= min && value.length <= max ? undefined : `Mật khẩu tối thiểu từ ${min} - ${max}`;
            }
        }
    }
}


Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    };
}

Validator.isConfirmed = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}

Validator.isNumber = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            if (value.length === 0) {
                return message || 'Không được bỏ trống';
            }

            if (isNaN(value)) {
                return message || '* Vui lòng nhập số !';
            }
        }
    }
}

Validator.isDiscount = function (selector, getCost, message) {
    return {
        selector: selector,
        test: function (value) {
            if (isNaN(value)) {
                return '* Vui lòng nhập số !';
            }

            if (getCost()) {
                if (value >= getCost()) {
                    return message || '* Giá giảm phải nhỏ hơn giá gốc !';
                }
            }
        }
    }
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {

            let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!regex.test(value)) {
                return message || "* Vui lòng nhập email !";
            }

        }
    }
}