<script>
var Vue = require('vue');
var axios = require('axios');
var VueFormState = require('vue-form-state');

Vue.use(VueFormState);

export default {
    props: {
        invoices: Object,
    },
    data() {
        return {
            baseUrl: '/user/profile',
            public: false,
            image: null
        }
    },
    methods: {
        getProfile() {

        },
        previewFile() {
            var file = this.image = this.$refs.avatar.files[0];
            var preview = document.querySelector('#preview');
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result
                preview.style = 'width:100%;'
                preview.classList = 'info'
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    }
}

</script>

<template>
<div class="container">
    <div class="row">
        <div class="col-md-4 info">
            <img id="preview" :src="profile.avatar" />
        </div>
        <div class="col-md-8">
            <form class="form-horizontal new-content"
            role="form"
            enctype="multipart/form-data"
            method="POST"
            :action="baseUrl">
                <div class="form-group row col-md-12">
                    <label class="btn btn-warning btn-file">
                        Choose Image
                        <input ref="avatar" type="file" style="display: none;" v-on:change="previewFile()" name="image">
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>User Title:</p>
                        <input id="user_title"
                        name="user_title" class="form-control input" type="text" :value="profile.user_title">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>RollItUp.org user name:</p>
                        <input id="riu_username" name="riu_username" class="form-control input" type="text" placeholder="RIU User name"
                            :value="profile.riu_username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="public">Make Profile Public?</label>
                        <input v-model="public" type="checkbox" name="public" id="public" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button style="width:100%;" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


