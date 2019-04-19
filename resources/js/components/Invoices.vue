<script>
var Vue = require('vue');
var axios = require('axios');

export default {
    props: {
        initial_invoices: Array,
    },
    data() {
        return {
            baseUrl: '/invoices',
            invoices: this.initial_invoices
        }
    },
    methods: {
        getInvoices() {
            axios.get(baseUrl)
            .then( response => {
                return Promise.resolve(response)
            })
            .catch(error =>{
                return Promise.reject(error)
            })
        }
    }
}

</script>

<template>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row" v-for="invoice in invoices">
                <div class="col-md-12">
                    {{invoice}}
                </div>
            </div>
        </div>
    </div>
</div>


