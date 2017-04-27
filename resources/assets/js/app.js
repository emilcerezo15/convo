
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

    var socket          =   io.connect('127.0.0.1:3000');
    var baseurl         = $('#BASE_URL').val();
    var meThread_list   = $('.me-thread-list');
    var token           = $('input[name=_token]').val();

    meThread_list.find('ul').slimScroll({
        height: '100%'
    });

    $('.conversation-thread').slimScroll({
        height: '100%'
    });

    meThread_list.on('click', 'li', function () {
        var id  = $(this).find('p').data('id');
        var msg = [];

        $.ajax({
            url :baseurl + '/getThread',
            type: 'get',
            data : {
                "_token"    :   token,
                "id"        :   id
            },
            success: function (response) {

                $.each(response, function(i, v) {
                    msg.push('<div class="bubble '+ (v['user_status'] == 0 ? ' me-bubble right' : 'other-bubble left') +'">' +
                        '<div class="'+ (v['user_status'] == 0 ? 'right-arrow-bubble' : 'left-arrow-bubble') +'"></div>' +
                        '<div class="conversation-content">' +
                        '<p>' + v['body'] + '</p>' +
                        '</div>' +
                        '</div>');
                });

                $('.conversation-thread').find('.row').html(msg);

            }

        });
    });

    socket.on('ajxUsers', function() {

        $.ajax({
            url :baseurl + '/getUsers',
            type: 'get',
            success: function (response) {
                var arr = [];

                $.each(response, function (i, v) {
                    arr.push('<li>' +
                        '<img src="'+ baseurl +'/img/default-photo-v2-45px.png" alt="avatar-image"/ >' +
                        '<p data-id="' + v['id'] + '">'+ v['name'] +'</p>' +
                        '<i>Online</i>' +
                        '</li>');
                });

                $('.me-thread-list').find('ul').html(arr);
            }

        });
    });

    $('.login.carousel').carousel({fullWidth: true});

    var option = {
        success:function (response) {
            if(response) {
                var finalStep = '' +
                    '<input type="password" class="validate" id="password" name="password"/>' +
                    '<label for="password" data-error="Invalid e-mail">Password</label>';

                $('.next-step').html(finalStep).fadeIn(2000);
            }
        }
    };

   $('#validateUser').ajaxForm(option);

});