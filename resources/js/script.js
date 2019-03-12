
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// import swal from 'sweetalert';

window.Vue = require('vue');
// import { currency } from './currency'
// import store from './store'

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

const app = new Vue({
    store,
    el: '#app',
    data() {
        return {
            cart: {},
            cartActive: false,
            cartSlider: null,
            cartSliderButton: null
        }
    },
    created () {
    },
    methods: {
        addToCart(e) {
            let productId = e.target.id.split('-')[3]
            let selectedPack = 6
            console.log(productId)
            let pack = this.selectedPack

            console.log(pack)

        },
        toggleCartSlider() {
            if(this.cartSlider.offsetWidth === 0) {
                this.cartActive = true
            } else {
            this.cartActive = false
            }
        }
    },
    watch: {
    cartActive: function (val) {
        if(val === true) {
                this.cartSlider.classList.add('cart-slider-active')
                this.cartSliderButton.classList.remove('fa-shopping-cart')
                this.cartSliderButton.classList.add('fa-window-close')
                this.cartSliderButton.style.backgroundColor = 'transparent'
            } else {
                this.cartSliderButton.classList.remove('fa-window-close')
                this.cartSliderButton.classList.add('fa-shopping-cart')
                this.cartSlider.classList.remove('cart-slider-active')
                this.cartSliderButton.style.backgroundColor = 'hsla(212,25%, 27%, 0.95)'
            }
        }
    },
    created() {
        this.products = [...document.getElementsByClassName('add-to-cart')];
    },
    mounted () {
        this.cartSlider = document.getElementById('cart-slider')
        this.cartSliderButton = document.getElementById('cart-slider-button')

    }
});
