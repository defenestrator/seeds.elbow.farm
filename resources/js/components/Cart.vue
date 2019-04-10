<script>
export default {
    props:{
        cart: String
    },
    data() {
        return {

        }
    },
    methods: {


    },

}
</script>

<template>
<div class="d-flex flex-row-reverse cart-slider-wrapper">
            <div id="cart-slider" class="cart-slider">
                <div class="container cart-slider-contents">
                    <h4>Shopping Cart</h4>
                    <p>is currently under development.</p>
                </div>
            </div>
            <i class="fa fa-lg fa-dark fa-shopping-cart cart-slider-button" id="cart-slider-button"
                v-on:click="toggleCartSlider()"></i>
        </div>
</template>
