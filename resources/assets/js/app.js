
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

    var socket  =   io.connect('127.0.0.1:3000');
    var baseurl = $('#BASE_URL').val();

    $('.me-thread-list').find('ul').slimScroll({
        height: '100%'
    });

    $('.conversation-thread').slimScroll({
        height: '100%'
    });

    socket.on('ajxUsers', function() {
        $.ajax({
            url :baseurl + '/getUsers',
            type: 'get',
            success: function (response) {

                var arr = [];

                $.each(response, function (i, v) {
                    arr.push('<li><img src="'+ baseurl +'/img/default-photo-45px.png" alt="avatar-image"/ ><p>'+ v['firstname'] +'</p><i>Online</i></li>');
                });

                $('.me-thread-list').find('ul').html(arr);
            }
        });
    });

});