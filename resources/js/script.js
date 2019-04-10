
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import swal from 'sweetalert';

window.Vue = require('vue');

import { currency } from './currency'

import store from './store'

const mainFont = document.createElement('link');
        mainFont.href ='https://fonts.googleapis.com/css?family=Great+Vibes|Roboto+Condensed:300';
        mainFont.rel = 'stylesheet';
        document.getElementsByTagName('head')[0].appendChild(mainFont)
        // Async loading of css.
        const fa=document.createElement('link');
        fa.href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css';
        fa.rel='stylesheet';
        const swa=document.createElement('link');
        swa.href='htps://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.1/sweetalert2.min.css';
        swa.rel='stylesheet';
        document.getElementsByTagName('head')[0].appendChild(fa);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


const files = require.context('./components/', true, /\.vue$/i)

files.keys().map(key => {
    return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import Cart from './Cart'

const app = new Vue({
    el: '#app',
    store,
    mixins: [Cart],
    swal,
    currency,
    created() {

        this.products = [...document.getElementsByClassName('add-to-cart')];
    },
    data() {
        return {
            cart: {},
        }
    }
});
