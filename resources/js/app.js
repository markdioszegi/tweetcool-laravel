/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Confirm from './confirm';

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
    $(window).scroll(() => {
        fadeInElements('.hidden')
    })
});

$(document).on('click', '#scrollToTop', (e) => {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        left: 270,
        behavior: "smooth"
    })
})

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
            const baseUrl = 'http://localhost:8000/';
            $.ajax({
                url: baseUrl + 'tweets/delete/' + id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token
                },
            })
            $(this).closest('.tweet-box').remove()
        }
    })
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
