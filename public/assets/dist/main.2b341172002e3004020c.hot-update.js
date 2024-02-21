/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
self["webpackHotUpdatemvc_from_scratch"]("main",{

/***/ "./public/assets/src/pages/login-page.js":
/*!***********************************************!*\
  !*** ./public/assets/src/pages/login-page.js ***!
  \***********************************************/
/***/ (() => {

eval("if(document.querySelector('#form-login')) {\r\n    Validator({\r\n        form: '#form-login',\r\n        formGroupSelector: '.form-group',\r\n        errorSelector: '.form-message',\r\n    \r\n        rules: [\r\n            Validator.isRequired('input[name=\"email\"]', 'Không được bỏ trống !'),\r\n            Validator.isEmail('input[name=\"email\"]', 'Vui long nhap email !'),\r\n            Validator.isRequired('input[name=\"password\"]', 'Không được bỏ trống !')\r\n        ],\r\n\r\n        onSubmit: function(data) {\r\n            const formLogin = document.querySelector(this.form);\r\n            console.log(data)\r\n        }\r\n    })\r\n}\n\n//# sourceURL=webpack://mvc-from-scratch/./public/assets/src/pages/login-page.js?");

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("8e7f32c871e38e6b7d24")
/******/ })();
/******/ 
/******/ }
);