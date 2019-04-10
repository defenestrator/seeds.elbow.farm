<script>
var Vue = require('vue');
var axios = require('axios');
var VueFormState = require('vue-form-state');

Vue.use(VueFormState);

export default {
    props: {
        initial_profile: Object
    },
    data() {
        return {
            baseUrl: '/user/profile/',
            avatarUpdate: '/user/image',
            image: null,
            profile: this.initial_profile,
            headers: {
                    'Content-Type': 'multipart/form-data'
                }
        }
    },
    mounted() {

    },
    methods: {
        getProfile() {
            window.location.href='/home'
        },
        updateProfile() {
            let formData = new FormData()
            formData.append('avatar', this.profile.avatar)
            formData.append('user_title', this.profile.user_title)
            formData.append('chuckers_paradise', this.profile.chuckers_paradise)
            formData.append('facebook_url', this.profile.facebook_url)
            formData.append('riu_username', this.profile.riu_username)
            formData.append('instagram_handle', this.profile.instagram_handle)
            formData.append('public', this.profile.public)
            formData.append('user_id', this.profile.user_id)
            axios.post(this.baseUrl, formData, this.headers)
            .then(response => {
                Promise.resolve(response)
                return response.data
            })
            .catch(error => {
                Promise.reject(error)
                console.log(error)
            })
        },
        updateAvatar() {
            let formData = new FormData()
            this.image = this.$refs.avatar.files[0];
            formData.append('image', this.image)
            formData.append('imageable_type', "Heisen\\Profile")
            formData.append('imageable_id', this.profile.id)
            this.previewFile()
            axios.post(this.avatarUpdate, formData, this.headers)
            .then(response => {
                this.profile.avatar = response.data.small
                Promise.resolve(response)
                updateProfile
                return response.data
            })
            .catch(error => {
                console.log(error)
                Promise.reject(error)

            })
        },
        previewFile() {
            var preview = document.querySelector('#preview');
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result
                preview.style = 'width:100%;'
                preview.classList = 'info'
            }, false);

            if (this.image) {
                reader.readAsDataURL(this.image);
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
            enctype="multipart/form-data">
                <div class="form-group row col-md-12">
                    <label class="btn btn-warning btn-file">
                        Choose Image
                        <input ref="avatar"
                        type="file"
                        style="display: none;"
                        v-on:change="updateAvatar()"
                        name="image">
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>User Title:</p>
                        <input id="user_title"
                        name="user_title"
                        class="form-control input"
                        type="text"
                        v-model="profile.user_title">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Chucker's Paradise user name:</p>
                        <input id="chuckers_paradise"
                        name="chuckers_paradise"
                        class="form-control input"
                        type="text"
                        v-model="profile.chuckers_paradise">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Facebook URL</p>
                        <input id="facebook_url"
                        name="facebook_url"
                        class="form-control input"
                        type="text"
                        placeholder="Facebook URL"
                        :value="profile.facebook_url">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Instagram handle:</p>
                        <input id="instagram_handle"
                        name="instagram_handle"
                        class="form-control input"
                        type="text"
                        placeholder="Instagram Handle"
                        :value="profile.instagram_handle">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>RollItUp.org user name:</p>
                        <input id="riu_username"
                        name="riu_username"
                        class="form-control input"
                        type="text"
                        placeholder="RIU User name"
                        v-model="profile.riu_username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="public">Make Profile Public?</label>
                        <input v-model="profile.public" type="checkbox" name="public" id="public" />
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


