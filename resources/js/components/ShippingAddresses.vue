<script>
var Vue = require('vue');
var axios = require('axios');
var VueFormState = require('vue-form-state');

Vue.use(VueFormState);

export default {
    props: {
        initial_shipping_addresses: Array
    },
    data() {
        return {
            baseShippingAddressUrl: '/user/shipping-addresses/',
            formData: new FormData(),
            shipping_addresses: this.initial_shipping_addresses,
            headers: {
                    'Content-Type': 'multipart/form-data'
                },
            edit: false
        }
    },
    mounted() {
         for(var key in this.shipping_addresses[0]) {
            this.formData.append(key, '')
        }
    },
    methods: {
    }
}

</script>

<template>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form class="form-horizontal new-content"
            role="form"
            enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>ship_to_name</p>
                        <input id="ship_to_name"
                        name="ship_to_name"
                        class="form-control input"
                        type="text"
                        v-model="shipping_addresses.ship_to_name">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <p>address_1:</p>
                        <input id="chuckers_paradise"
                        name="address_1"
                        class="form-control input"
                        type="text"
                        placeholder="Address Line 1"
                        v-model="shipping_addresses.address_1">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>address_2:</p>
                        <input id="address_2"
                        name="address_2"
                        class="form-control input"
                        type="text"
                        placeholder="Address Line 2"
                        :value="shipping_addresses.address_2">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>city:</p>
                        <input id="city"
                        name="city"
                        class="form-control input"
                        type="text"
                        placeholder="City"
                        :value="shipping_addresses.city">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>state:</p>
                        <input id="state"
                        name="state"
                        class="form-control input"
                        type="text"
                        placeholder="State"
                        v-model="shipping_addresses.state">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>country:</p>
                        <input id="country"
                        name="country"
                        class="form-control input"
                        type="text"
                        placeholder="country"
                        v-model="shipping_addresses.country">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>postcode:</p>
                        <input id="postcode"
                        name="postcode"
                        class="form-control input"
                        type="text"
                        placeholder="postcode"
                        v-model="shipping_addresses.postcode">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="public">Make Profile Public?</label>
                        <input v-model="shipping_addresses.public" type="checkbox" name="public" id="public" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button style="width:100%;" class="btn btn-primary" v-on:click.prevent.stop="updateProfile()">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


