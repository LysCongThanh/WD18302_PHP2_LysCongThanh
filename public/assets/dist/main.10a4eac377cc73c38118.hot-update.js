/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
self["webpackHotUpdatemvc_from_scratch"]("main",{

/***/ "./public/assets/src/pages/index.js":
/*!******************************************!*\
  !*** ./public/assets/src/pages/index.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   LoginPage: () => (/* reexport default from dynamic */ _login_page__WEBPACK_IMPORTED_MODULE_0___default.a)\n/* harmony export */ });\n/* harmony import */ var _login_page__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./login-page */ \"./public/assets/src/pages/login-page.js\");\n/* harmony import */ var _login_page__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_login_page__WEBPACK_IMPORTED_MODULE_0__);\n\r\n\r\n\n\n//# sourceURL=webpack://mvc-from-scratch/./public/assets/src/pages/index.js?");

/***/ }),

/***/ "./public/assets/src/pages/login-page.js":
/*!***********************************************!*\
  !*** ./public/assets/src/pages/login-page.js ***!
  \***********************************************/
/***/ (() => {

eval("if(document.querySelector('#form-login')) {\r\n    Validator({\r\n        form: '#form-login',\r\n        formGroupSelector: '.form-group',\r\n        errorSelector: '.form-message',\r\n    \r\n        rules: [\r\n            Validator.isRequired('input[name=\"email\"]', 'Không được bỏ trống !'),\r\n            Validator.isEmail('input[name=\"email\"]', 'Vui long nhap email !'),\r\n            Validator.isRequired('input[name=\"password\"]', 'Không được bỏ trống !')\r\n        ],\r\n\r\n        onSubmit: function(data) {\r\n            const formLogin = document.querySelector(this.form);\r\n            console.log(data)\r\n        }\r\n    })\r\n}\n\n//# sourceURL=webpack://mvc-from-scratch/./public/assets/src/pages/login-page.js?");

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/compat get default export */
/******/ (() => {
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = (module) => {
/******/ 		var getter = module && module.__esModule ?
/******/ 			() => (module['default']) :
/******/ 			() => (module);
/******/ 		__webpack_require__.d(getter, { a: getter });
/******/ 		return getter;
/******/ 	};
/******/ })();
/******/ 
/******/ /* webpack/runtime/define property getters */
/******/ (() => {
/******/ 	// define getter functions for harmony exports
/******/ 	__webpack_require__.d = (exports, definition) => {
/******/ 		for(var key in definition) {
/******/ 			if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 				Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 			}
/******/ 		}
/******/ 	};
/******/ })();
/******/ 
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("25f33e53fdd4c47be440")
/******/ })();
/******/ 
/******/ /* webpack/runtime/make namespace object */
/******/ (() => {
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = (exports) => {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/ })();
/******/ 
/******/ }
);