<script>
var Vue = require('vue');
var axios = require('axios');

export default {
    props: {
        initial_addresses: Array,
        initial_user: Object
    },
    data() {
        return {
            baseShippingAddressUrl: '/shipping_addresses/',
            shipping_addresses: this.initial_addresses,
            headers: {
                    'Content-Type': 'application/json'
                },
            user: this.initial_user,
            edit: false,
            currentAddress: {
                'id': null,
                'user_id': this.initial_user.id,
                'address_1': '',
                'address_2': '',
                'city': '',
                'state': '',
                'country': '',
                'postcode': '',
                'ship_to_name': '',
            }
        }
    },
    mounted() {

    },
    methods: {
        editShippingAddress(id) {
            axios.get(this.baseShippingAddressUrl+id, this.headers)
                .then(response => {
                    this.currentAddress = response.data
                    this.edit = true
                    return Promise.resolve(response)
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },
        updateAddress() {
            axios.put(this.baseShippingAddressUrl, this.currentAddress, this.headers)
                .then(response => {
                    this.currentAddress = response.data
                    this.edit = false
                    swal({
                        title: 'Updated',
                        text: 'Shipping Addresses'
                    })
                    this.getAddresses()
                    return Promise.resolve(response)
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },
        newAddress() {this.edit = true},
        deleteAddress() {

            axios.delete(this.baseShippingAddressUrl + this.currentAddress.id, this.headers)
                .then(response => {
                    this.cancelEdit()
                    this.getAddresses()
                    this.$emit('update:initial_addresses', this.addresses)
                    return Promise.resolve(response)
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },
        async getAddresses() {
            await axios.get(this.baseShippingAddressUrl, this.headers)
                .then(response => {
                    this.shipping_addresses = response.data
                    return Promise.resolve(response)
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },
        async doneEditing() {
            await this.updateAddress()
            await this.getAddresses()
            this.edit = false
            this.currentAddress = {
                'id': null,
                'user_id': this.initial_user.id,
                'address_1': '',
                'address_2': '',
                'city': '',
                'state': '',
                'country': '',
                'postcode': '',
                'ship_to_name': '',
            }
        },
        cancelEdit() {
            this.edit = false
            this.currentAddress = {
                'id': null,
                'user_id': this.initial_user.id,
                'address_1': '',
                'address_2': '',
                'city': '',
                'state': '',
                'country': '',
                'postcode': '',
                'ship_to_name': '',
            }
        }
    }
}

</script>

<template>
<div class="container">
    <hr>
    <div v-if="edit === false">
        <div class="col-12"><button class="btn btn-primary" style="margin:1em;" v-on:click.prevent.stop="newAddress()">Add Shipping Address</button></div>
        <div style="margin-bottom:1em; border-bottom:1px solid #ccc;" class="row" v-bind:key="address.id" v-for="address in shipping_addresses">
        <div class="col-8">
                <p style="margin-bottom: 0.2em;">{{address.ship_to_name}}</p>
                <p style="margin-bottom: 0.2em;">{{address.address_1 }} - {{ address.address_2 }} </p>
                <p style="margin-bottom: 0.2em;">{{address.country}}</p>
                <p style="margin-bottom: 0.2em;">{{address.state}}  {{address.city}} {{address.postcode}}</p>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary" v-on:click="editShippingAddress(address.id)">Edit</button>
        </div>
        </div>
    </div>

    <div class="row" v-else>
        <button class="btn btn-primary" style="margin:1em;" v-on:click.prevent.stop="updateAddress()">Save</button>
        <button class="btn btn-secondary" style="margin:1em;" v-on:click.prevent.stop="doneEditing()">Done Editing</button>
        <button v-if="currentAddress.id !== null" class="btn btn-danger" style="margin:1em;" v-on:click.prevent.stop="deleteAddress()">Delete</button>
        <button class="btn btn-warning" style="margin:1em;" v-on:click.prevent.stop="cancelEdit()">Cancel</button>

        <div class="col-12">
            <form class="form-horizontal new-content">
                <div class="form-group row">
                    <div class="col-12">
                        <p>ship_to_name</p>
                        <input id="ship_to_name"
                        name="ship_to_name"
                        class="form-control input"
                        type="text"
                        placeholder="Ship to this name"
                        v-model="currentAddress.ship_to_name">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <p>address_1:</p>
                        <input id="chuckers_paradise"
                        name="address_1"
                        class="form-control input"
                        type="text"
                        placeholder="Address Line 1"
                        v-model="currentAddress.address_1">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <p>address_2:</p>
                        <input id="address_2"
                        name="address_2"
                        class="form-control input"
                        type="text"
                        placeholder="Address Line 2"
                        v-model="currentAddress.address_2">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <p>City:</p>
                        <input id="city"
                        name="city"
                        class="form-control input"
                        type="text"
                        placeholder="City"
                        v-model="currentAddress.city">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <p>state:</p>
                        <input id="state"
                        name="state"
                        class="form-control input"
                        type="text"
                        placeholder="State"
                        v-model="currentAddress.state">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <p>country:</p>
                        <input id="country"
                        name="country"
                        class="form-control input"
                        type="text"
                        placeholder="country"
                        v-model="currentAddress.country">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <p>postcode:</p>
                        <input id="postcode"
                        name="postcode"
                        class="form-control input"
                        type="text"
                        placeholder="postcode"
                        v-model="currentAddress.postcode">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button style="width:100%;"
                        class="btn btn-primary" v-on:click.prevent.stop="updateAddress()">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


