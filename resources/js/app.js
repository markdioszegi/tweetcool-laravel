/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
import Confirm from './confirm'
import autosize from 'autosize'
import { ajax } from 'jquery'
import { method } from 'lodash'

/**
 * Globals
 */
const BASE_URL = window.location.origin
let UNSAVED_CHANGES = false
let EDIT_MODE = false

//window.Vue = require('vue')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * Bootstrap init
 */

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

// Add slideDown animation to Bootstrap dropdown when expanding.
$('.dropdown').on('show.bs.dropdown', function() {
    $(this)
        .find('.dropdown-menu')
        .first()
        .stop(true, true)
        .slideDown('fast')
})

// Add slideUp animation to Bootstrap dropdown when collapsing.
$('.dropdown').on('hide.bs.dropdown', function() {
    $(this)
        .find('.dropdown-menu')
        .first()
        .stop(true, true)
        .slideUp('fast')
})

/**
 * Functions
 */

$.fn.isInView = function isScrolledIntoView() {
    let docViewTop = $(window).scrollTop()
    let docViewBottom = docViewTop + $(window).height()

    let elemTop = $(this).offset().top
    let elemBottom = elemTop + $(this).height()

    //return ((elemBottom < docViewBottom) && (elemTop > docViewTop));
    return true
}

/*
    When the document is ready
 */

document.addEventListener('DOMContentLoaded', () => {
    fadeInElements('.hidden')
    showScrollToTop()

    $(window).scroll(e => {
        fadeInElements('.hidden')
        showScrollToTop()
    })

    // Autosize textarea elements
    autosize($('textarea'))
})

function showScrollToTop() {
    let div = $('.scroll-top')
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
        $(tag).each(function(index) {
            //console.log($(this))
            if ($(this).isInView()) {
                $(this).addClass('fade-in-bottom')
                $(this).removeClass('hidden')
            }
        })
    } catch (err) {
        //if(err.type == TypeError);
    }
}

$('.btn-delete-tweet').click(function() {
    Confirm.open({
        title: 'Delete',
        message: 'Are you sure you want to delete this tweet?',
        okText: 'Yes',
        cancelText: 'No',
        onok: () => {
            const id = $(this).data('id')
            const token = $(this).data('token')
            $.ajax({
                url: BASE_URL + '/tweets/delete/' + id,
                type: 'DELETE',
                dataType: 'JSON',
                data: {
                    id: id,
                    _method: 'DELETE',
                    _token: token,
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(`Something went wrong: {}`, thrownError)
                },
            })
            $(this)
                .closest('.tweet-box')
                .remove()
        },
    })
})

$('.btn-delete-comment').click(function() {
    Confirm.open({
        title: 'Delete',
        message: 'Are you sure you want to delete this comment?',
        okText: 'Yes',
        cancelText: 'No',
        onok: () => {
            let id = $(this).data('id')
            let token = $(this).data('token')
            EDIT_MODE = false
            $.ajax({
                url: BASE_URL + '/comments/delete/' + id,
                method: 'DELETE',
                dataType: 'JSON',
                data: {
                    id: id,
                    _token: token,
                },
            })
            $(this)
                .closest('.comment')
                .remove()
        },
    })
})

$('.post-tweet')
    .find('textarea')
    .keydown(function(e) {
        if (e.keyCode == 13 && !e.shiftKey) {
            e.preventDefault()
            $(this)
                .closest('form')
                .submit()
        }
    })

$('.comments-container')
    .find('textarea')
    .keydown(function(e) {
        if (e.keyCode == 13 && !e.shiftKey) {
            e.preventDefault()
            $(this)
                .closest('.post-comment')
                .find('button')
                .click()
        }
    })

$('[aria-expanded]').change(function() {
    console.log('changed!')
})

$('#toggleDarkMode').change(function() {
    if ($(this).prop('checked')) {
        $.ajax({
            method: 'POST',
            data: {
                toggle: true,
                _token: $(this).data('token'),
            },
            url: BASE_URL + '/profile/toggleDarkMode',
            success: function(data) {
                console.log(data)
            },
        })
        $('body').addClass('dark-mode')
    } else {
        $.ajax({
            method: 'POST',
            data: {
                toggle: false,
                _token: $(this).data('token'),
            },
            url: BASE_URL + '/profile/toggleDarkMode',
            success: function(data) {
                console.log(data)
            },
        })
        $('body').removeClass('dark-mode')
    }
})

$('.btn-scroll-top').click(() => {
    window.scrollTo({
        top: 0,
        left: 270,
        behavior: 'smooth',
    })
})

$('.btn-post-comment').click(function(e) {
    const div = $(this)
        .closest('.comments-box')
        .find('div')[0]
    const tweetId = $(this).data('tweet-id')
    const userId = $(this).data('user-id')
    const token = $(this).data('token')
    const msg = $(this)
        .parent()
        .find('textarea')
        .val()
        .trim()
    if (!msg) console.log('Empty text!')
    $.ajax({
        url: BASE_URL + '/comments/store',
        type: 'post',
        dataType: 'JSON',
        data: {
            tweet_id: tweetId,
            user_id: userId,
            message: msg,
            _method: 'POST',
            _token: token,
        },
        success: function() {
            window.location.reload(true)
        },
        error: function(err, vm, info) {
            console.log(info)
        },
    })
})

$('.btn-edit-comment').on('click', function() {
    let $message = $(this)
        .closest('.comment')
        .find('.message')
    let $button = $(this)
    let textEle = document.createElement('span')

    if (EDIT_MODE) {
        alert('You are already in edit mode!')
    } else {
        //console.log('Entering edit mode...')
        $message.attr('contenteditable', 'true')
        $message.addClass('editing')

        textEle = document.createElement('span')
        textEle.innerHTML = `<i class="fas fa-info mr-3 mt-3"></i>Press enter to save or esc to cancel`

        $message.parent().append(textEle)

        // Handle enter key event
        $message.on('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                let id = $button.data('id')
                let token = $button.data('token')
                let msg = $.trim($message.text())

                console.log(msg)

                e.preventDefault()
                $message.attr('contenteditable', false)
                $message.removeClass('editing')
                textEle.remove()
                EDIT_MODE = false
                // Ajax
                $.ajax({
                    url: BASE_URL + '/comments/' + id,
                    type: 'PUT',
                    data: {
                        id: id,
                        message: msg,
                        _token: token,
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.error(errorThrown)
                    },
                })
            }
        })

        // Handle cancel when pressing the esc key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape' && EDIT_MODE) {
                //console.log('Exiting edit mode...')
                $message.attr('contenteditable', false)
                $message.removeClass('editing')
                textEle.remove()
                EDIT_MODE = false
            }
        })

        EDIT_MODE = true
    }
})
