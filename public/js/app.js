/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

//const app = new Vue({
//    el: '#app'
//});

$(document).ready(function () {

    var socket = io.connect('127.0.0.1:3000');
    var baseurl = $('#BASE_URL').val();
    var meThread_list = $('.me-thread-list');
    var token = $('input[name=_token]').val();

    meThread_list.find('ul').slimScroll({
        height: '100%'
    });

    $('.conversation-thread').slimScroll({
        height: '100%'
    });

    meThread_list.on('click', 'li', function () {
        var id = $(this).find('p').data('id');
        var msg = [];

        $.ajax({
            url: baseurl + '/getThread',
            type: 'get',
            data: {
                "_token": token,
                "id": id
            },
            success: function success(response) {

                $.each(response, function (i, v) {
                    msg.push('<div class="bubble ' + (v['user_status'] == 0 ? ' me-bubble right' : 'other-bubble left') + '">' + '<div class="' + (v['user_status'] == 0 ? 'right-arrow-bubble' : 'left-arrow-bubble') + '"></div>' + '<div class="conversation-content">' + '<p>' + v['body'] + '</p>' + '</div>' + '</div>');
                });

                $('.conversation-thread').find('.row').html(msg);
            }

        });
    });

    socket.on('ajxUsers', function () {

        $.ajax({
            url: baseurl + '/getUsers',
            type: 'get',
            success: function success(response) {
                var arr = [];

                $.each(response, function (i, v) {
                    arr.push('<li><img src="' + baseurl + '/img/default-photo-45px.png" alt="avatar-image"/ ><p data-id="' + v['id'] + '">' + v['name'] + '</p><i>Online</i></li>');
                });

                $('.me-thread-list').find('ul').html(arr);
            }

        });
    });

    var option = {
        success: function success(response) {
            alert(response);
            if (response) {
                var finalStep = '' + '<input type="password" class="validate" id="password" name="password"/>' + '<label for="password" data-error="Invalid e-mail">Password</label>';

                $('.next-step').html(finalStep).fadeIn(2000);
            }
        }
    };

    $('#validateUser').ajaxForm(option);
});

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
module.exports = __webpack_require__(1);


/***/ })
/******/ ]);