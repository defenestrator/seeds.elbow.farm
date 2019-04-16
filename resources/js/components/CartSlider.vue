<script>
import store from '../store'
import Cart from '../Cart'
import Client from '../Client'

export default {
    props:{
        initial_user: String
    },
    store,
    mixins: [Cart, Client],
    data() {
        return {
            cartActive: false,
            cartSlider: null,
            cartSliderButton: null
        }
    },
   methods: {
        toggleCartSlider() {
            if (this.cartSlider.offsetWidth === 0) {
                this.cartActive = true
            } else {
                this.cartActive = false
            }
        }
    },

    watch: {
        cartActive: function (val) {
            if (val === true) {
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

    mounted() {
        this.cartSlider = document.getElementById('cart-slider')
        this.cartSliderButton = document.getElementById('cart-slider-button')

    }

}
</script>

<template>
<div class="d-flex flex-row-reverse cart-slider-wrapper">
    <div id="cart-slider" class="cart-slider">
        <div class="container cart-slider-contents">
            <h4>Shopping Cart</h4>
            <p>Your cart is empty.</p>
        </div>
    </div>
    <i class="fa fa-lg fa-dark fa-shopping-cart cart-slider-button" id="cart-slider-button"
        v-on:click="toggleCartSlider()"></i>
</div>
</template>
