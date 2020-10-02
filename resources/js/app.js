/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import autosize from 'autosize';
import Confirm from './confirm';

/**
 * Globals
 */
const BASE_URL = window.location.origin

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

/**
 * Functions
 */

$.fn.isInView = function isScrolledIntoView() {
    let docViewTop = $(window).scrollTop();
    let docViewBottom = docViewTop + $(window).height();

    let elemTop = $(this).offset().top;
    let elemBottom = elemTop + $(this).height();

    //return ((elemBottom < docViewBottom) && (elemTop > docViewTop));
    return true;
}

/*
    When the document is ready
 */

$(document).ready(() => {
    fadeInElements('.hidden')
    showScrollToTop()

    $(window).scroll((e) => {
        fadeInElements('.hidden')
        showScrollToTop()
    })

    //autosize textarea elements
    autosize($('textarea'))
});

function showScrollToTop() {
    let div = $('.scroll-top');
    if (window.scrollY > $('nav').height() * 2) {
        div.addClass('opacity-1')
        div.find('button').prop('disabled', false)
    } else {
        div.removeClass('opacity-1')
        div.find('button').prop('disabled', true)
    }
}

function fadeInElements(tag) {
    try {
        $(tag).each(function (index) {
            //console.log($(this))
            if ($(this).isInView()) {
                $(this).addClass('fade-in-bottom');
                $(this).removeClass("hidden");
            }
        })
    } catch (err) {
        //if(err.type == TypeError);
    }
}

$(".btn-delete-tweet").click(function () {
    Confirm.open({
        title: 'Delete',
        message: 'Are you sure to delete this tweet?',
        okText: 'Yes',
        cancelText: 'No',
        onok: () => {
            const id = $(this).data('id');
            const token = $(this).data('token');
            $.ajax({
                url: BASE_URL + '/tweets/delete/' + id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(`Something went wrong: {}`, thrownError)
                }
            })
            $(this).closest('.tweet-box').remove()
        }
    })
})

$(".btn-delete-comment").click(function () {
    console.log("Deleted!")
    //$(this.closest(comment))
})

$(".post-tweet").find('textarea').keydown(function (e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        e.preventDefault()
        $(this).closest('form').submit()
    }
})

$(".comments-box").find('textarea').keydown(function (e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        e.preventDefault()
        $(this).closest('.post-comment').find('button').click()
    }
})

$('[aria-expanded]').change(function () {
    console.log("changed!")
})

$('#toggleDarkMode').change(function () {
    if ($(this).prop("checked")) {
        $('html').addClass('dark-mode')
    } else {
        $('html').removeClass('dark-mode')
    }
})

$('.btn-scroll-top').click(() => {
    window.scrollTo({
        top: 0,
        left: 270,
        behavior: "smooth"
    })
})

$('.btn-post-comment').click(function (e) {
    const div = $(this).closest('.comments-box').find('div')[0]
    const tweetId = $(this).data('tweet-id')
    const userId = $(this).data('user-id')
    const token = $(this).data('token')
    const msg = $(this).parent().find('textarea').val()
    $.ajax({
        url: BASE_URL + "/comments/store",
        type: "post",
        dataType: "JSON",
        data: {
            "tweet_id": tweetId,
            "user_id": userId,
            "message": msg,
            "_method": 'POST',
            "_token": token
        },
        success: function () {
            window.location.reload(true)
        },
        error: function (err, vm, info) {
            console.log(info)
        }
    })
})
